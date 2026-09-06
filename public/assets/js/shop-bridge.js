/* Pont thème statique WordPress <-> back Laravel.
   - « Ajouter au panier » : AJAX + notification (le panneau ne s'ouvre pas)
   - « Vista rápida » : modale chargée en AJAX
   - Suppression d'une ligne du mini-panier : AJAX
   Les handlers panier/quickview sont posés en phase de capture pour passer
   AVANT les handlers cassés du thème / de WooCommerce (endpoints WP absents). */
(function () {
  'use strict';

  var token = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';
  var H = { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json', 'X-CSRF-TOKEN': token };
  var origin = window.location.origin;

  function findProductId(el) {
    var node = el;
    while (node && node !== document) {
      if (node.dataset && (node.dataset.productId || node.dataset.product_id)) {
        return node.dataset.productId || node.dataset.product_id;
      }
      node = node.parentNode;
    }
    return (el.getAttribute && (el.getAttribute('data-product_id') || el.getAttribute('data-product-id'))) || null;
  }

  function paintCount(count) {
    var n = parseInt(count, 10) || 0;
    document.querySelectorAll('.mini-cart-items, .cart-count, .count-cart, .mini-cart-counter, .tbay-mini-cart .count, .cart_count')
      .forEach(function (el) {
        el.textContent = n;
        el.classList.toggle('is-empty', n === 0);
        el.style.display = n === 0 ? 'none' : '';
      });
  }

  function cartProductIds() {
    var ids = {};
    document.querySelectorAll('.widget_shopping_cart_content [data-product_id], .widget_shopping_cart_content [data-source_id]').forEach(function (el) {
      ['data-product_id', 'data-source_id'].forEach(function (a) {
        var v = el.getAttribute(a);
        if (v) ids[String(v)] = true;
      });
    });
    return ids;
  }

  function markInCart() {
    var ids = cartProductIds();
    document.querySelectorAll('a.add_to_cart_button, .add_to_cart_button, .single_add_to_cart_button').forEach(function (b) {
      var id = String(b.getAttribute('data-product_id') || '');
      var on = id && ids[id];
      b.classList.toggle('in-cart', !!on);
      if (on && !b.dataset.origLabel) b.dataset.origLabel = b.getAttribute('title') || '';
      if (on) b.setAttribute('title', 'Ya está en la cesta');
      else if (b.dataset.origLabel !== undefined) b.setAttribute('title', b.dataset.origLabel || '');
    });
  }

  function applyFragment(d) {
    if (!d) return;
    if (typeof d.count !== 'undefined') paintCount(d.count);
    if (typeof d.html === 'string') {
      document.querySelectorAll('.widget_shopping_cart_content, .tbay-topcart .dropdown-menu')
        .forEach(function (c) { c.innerHTML = d.html; });
    }
    markInCart();
  }

  function refreshFragment() {
    fetch('/carrito/fragmento', { headers: H })
      .then(function (r) { return r.json(); })
      .then(applyFragment)
      .catch(function () {});
  }

  /* ---------- Notification ---------- */
  var toastTimer;
  function toast(msg) {
    var t = document.getElementById('tr-toast');
    if (!t) {
      t = document.createElement('div');
      t.id = 'tr-toast';
      document.body.appendChild(t);
    }
    t.textContent = msg;
    t.classList.add('is-visible');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { t.classList.remove('is-visible'); }, 3200);
  }

  function addToCart(btn) {
    var pid = findProductId(btn);
    if (!pid || btn.classList.contains('loading')) return;
    var qtyInput;
    if (btn.getAttribute('data-quantity-target')) {
      var scope = btn.closest('.tr-qv, form, .product') || document;
      qtyInput = scope.querySelector(btn.getAttribute('data-quantity-target'));
    }
    if (!qtyInput) qtyInput = document.querySelector('form.cart input.qty, form.cart input[name="quantity"]');
    var qv = qtyInput ? parseInt(qtyInput.value, 10) : 1;
    if (!qv || qv < 1) qv = 1;
    var fd = new FormData();
    fd.append('_token', token);
    fd.append('product_id', pid);
    fd.append('quantity', qv);
    btn.classList.add('loading');
    fetch('/carrito/agregar', { method: 'POST', body: fd, headers: H })
      .then(function (r) { return r.ok ? r.json() : Promise.reject(r); })
      .then(function (d) {
        btn.classList.remove('loading');
        btn.classList.add('added');
        applyFragment(d);
        toast((d && d.added ? '«' + d.added + '» ' : 'Producto ') + 'añadido a la cesta.');
      })
      .catch(function () { btn.classList.remove('loading'); refreshFragment(); toast('No se pudo añadir el producto.'); });
  }

  /* ---------- Modale Quick View ---------- */
  var modal = document.getElementById('tbay-quickview-modal');
  function showModal() {
    if (!modal) return;
    modal.hidden = false;
    document.body.style.overflow = 'hidden';
  }
  function hideModal() {
    if (!modal) return;
    modal.hidden = true;
    document.body.style.overflow = '';
  }
  function quickView(link) {
    if (!modal) return;
    var href = (link.getAttribute('href') || '').replace(origin, '');
    var m = href.match(/\/producto\/[^/?#]+/);
    var ref = findProductId(link);
    var url;
    if (m) url = m[0] + '/quickview';
    else if (ref) url = '/vista-rapida/' + encodeURIComponent(ref);
    else return;
    var body = modal.querySelector('.modal-body');
    body.innerHTML = '<div class="qv-loading" style="padding:40px;text-align:center">Cargando&hellip;</div>';
    showModal();
    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function (r) { return r.ok ? r.text() : Promise.reject(r); })
      .then(function (html) {
        body.innerHTML = html;
        var main = body.querySelector('.tr-qv-main img');
        body.querySelectorAll('.tr-qv-thumbs img').forEach(function (t) {
          t.addEventListener('click', function () {
            if (main) main.src = t.dataset.full || t.src;
            body.querySelectorAll('.tr-qv-thumbs img').forEach(function (x) { x.classList.remove('is-active'); });
            t.classList.add('is-active');
          });
        });
      })
      .catch(function () { body.innerHTML = '<p style="padding:30px">No se pudo cargar la vista rápida.</p>'; });
  }

  /* ---------- Capture : on court-circuite le thème ---------- */
  document.addEventListener('click', function (e) {
    var addBtn = e.target.closest('a.add_to_cart_button, a.ajax_add_to_cart, .add_to_cart_button, .single_add_to_cart_button');
    if (addBtn && findProductId(addBtn)) {
      e.preventDefault();
      e.stopImmediatePropagation();
      addToCart(addBtn);
      return;
    }
    var qv = e.target.closest('a.qview-button');
    if (qv) {
      e.preventDefault();
      e.stopImmediatePropagation();
      quickView(qv);
      return;
    }
  }, true);

  /* ---------- Bulle : nos propres éléments ---------- */
  document.addEventListener('click', function (e) {
    var step = e.target.closest('.tr-qv-step');
    if (step) {
      e.preventDefault();
      var wrap = step.closest('.tr-qv-stepper');
      var inp = wrap && wrap.querySelector('.tr-qv-qty');
      if (inp) {
        var v = (parseInt(inp.value, 10) || 1) + (parseInt(step.getAttribute('data-step'), 10) || 0);
        inp.value = Math.min(99, Math.max(1, v));
      }
      return;
    }

    if (e.target.closest('.offcanvas-close')) {
      e.preventDefault();
      document.querySelectorAll('.tbay-dropdown-cart').forEach(function (p) { p.classList.remove('active'); });
      var wrap = document.getElementById('wrapper-container');
      if (wrap) wrap.classList.remove('offcanvas-right', 'offcanvas-left');
      return;
    }

    var qbtn = e.target.closest('.widget_shopping_cart_content .mini-qty-btn, .tbay-topcart .dropdown-menu .mini-qty-btn');
    if (qbtn) {
      e.preventDefault();
      var box = qbtn.closest('.mini-qty');
      if (!box || box.classList.contains('is-loading')) return;
      var pid = box.getAttribute('data-product_id');
      var cur = parseInt((box.querySelector('.mini-qty-val') || {}).textContent, 10) || 1;
      var next = Math.max(0, cur + (parseInt(qbtn.getAttribute('data-step'), 10) || 0));
      box.classList.add('is-loading');
      var fdq = new FormData();
      fdq.append('_token', token);
      fdq.append('product_id', pid);
      fdq.append('qty', next);
      fetch('/carrito/linea', { method: 'POST', body: fdq, headers: H })
        .then(function (r) { return r.json(); })
        .then(applyFragment)
        .catch(refreshFragment);
      return;
    }

    var rm = e.target.closest('.widget_shopping_cart_content .remove, .tbay-topcart .dropdown-menu .remove');
    if (rm) {
      e.preventDefault();
      var rid = findProductId(rm);
      if (!rid) return;
      var fd = new FormData();
      fd.append('_token', token);
      fd.append('product_id', rid);
      fetch('/carrito/eliminar', { method: 'POST', body: fd, headers: H })
        .then(function (r) { return r.json(); })
        .then(applyFragment)
        .catch(refreshFragment);
    }
  });

  if (modal) {
    modal.addEventListener('click', function (e) {
      if (e.target === modal || e.target.closest('[data-dismiss="modal"], .tr-qv-close')) hideModal();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !modal.hidden) hideModal();
    });
  }

  markInCart();
  refreshFragment();
})();
