/* Remolquestitos — JS público */
(function () {
  'use strict';

  /* --- Menú móvil --- */
  var toggle = document.querySelector('.menu-toggle');
  var navList = document.querySelector('.nav__list');
  if (toggle && navList) {
    toggle.addEventListener('click', function () {
      navList.classList.toggle('is-open');
    });
  }

  /* --- Galería producto --- */
  var mainImg = document.querySelector('.gallery__main img');
  if (mainImg) {
    document.querySelectorAll('.gallery__thumbs img').forEach(function (t) {
      t.addEventListener('click', function () {
        mainImg.src = t.dataset.large || t.src;
        document.querySelectorAll('.gallery__thumbs img').forEach(function (x) { x.classList.remove('is-active'); });
        t.classList.add('is-active');
      });
    });
  }

  /* --- Pestañas --- */
  document.querySelectorAll('.tabs').forEach(function (tabs) {
    var buttons = tabs.querySelectorAll('.tabs__nav button');
    var panels = tabs.querySelectorAll('.tabs__panel');
    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('is-active'); });
        panels.forEach(function (p) { p.classList.remove('is-active'); });
        btn.classList.add('is-active');
        var panel = tabs.querySelector('#' + btn.dataset.target);
        if (panel) panel.classList.add('is-active');
      });
    });
  });

  /* --- Favoritos (localStorage) --- */
  var FAV_KEY = 'tr_favoritos';
  var FAV_SEL = '[data-fav-toggle], a.add_to_wishlist[data-product-id], a.add_to_wishlist[data-product_id]';
  function getFavs() {
    try {
      return JSON.parse(localStorage.getItem(FAV_KEY) || '[]').map(String);
    } catch (e) { return []; }
  }
  function setFavs(list) {
    try { localStorage.setItem(FAV_KEY, JSON.stringify(list.map(String))); } catch (e) {}
    updateFavCount();
  }
  function favRef(btn) {
    return String(
      btn.getAttribute('data-fav-toggle') ||
      btn.getAttribute('data-product-id') ||
      btn.getAttribute('data-product_id') || ''
    );
  }
  function updateFavCount() {
    var n = getFavs().length;
    document.querySelectorAll('[data-fav-count], .count_wishlist, .count-wishlist, .wishlist-count')
      .forEach(function (el) { el.textContent = n; });
  }
  function paintFavButtons() {
    var favs = getFavs();
    document.querySelectorAll(FAV_SEL).forEach(function (btn) {
      var on = favs.indexOf(favRef(btn)) !== -1;
      btn.classList.toggle('is-active', on);
      btn.setAttribute('aria-pressed', on);
      var wrap = btn.closest('.yith-wcwl-add-to-wishlist');
      if (wrap) wrap.classList.toggle('exists', on);
      var box = btn.closest('.button-wishlist');
      if (box) box.classList.toggle('exists', on);
    });
  }
  document.addEventListener('click', function (e) {
    var btn = e.target.closest(FAV_SEL);
    if (!btn) return;
    e.preventDefault();
    e.stopImmediatePropagation();
    var id = favRef(btn);
    if (!id) return;
    var favs = getFavs();
    var i = favs.indexOf(id);
    if (i === -1) { favs.push(id); } else { favs.splice(i, 1); }
    setFavs(favs);
    paintFavButtons();
    if (typeof window.__favRender === 'function') window.__favRender();
  }, true);
  updateFavCount();
  paintFavButtons();

  /* --- Página de favoritos (tabla YITH) --- */
  var favWrap = document.querySelector('[data-fav-list]');
  if (favWrap) {
    var body = favWrap.querySelector('.wishlist-items-wrapper') || favWrap;
    var addUrl = favWrap.getAttribute('data-add-url') || '/carrito/agregar';
    var token = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';

    function emptyRow() {
      body.innerHTML = '<tr class="no-products"><td colspan="6" class="wishlist-empty">Aún no has añadido productos a tu lista de deseos.</td></tr>';
    }

    function priceCell(p) {
      return p.regular
        ? '<ins>' + p.price + '&nbsp;€</ins> <del>' + p.regular + '&nbsp;€</del>'
        : p.price + '&nbsp;€';
    }

    function render() {
      var ids = getFavs();
      if (!ids.length) { emptyRow(); return; }
      fetch(favWrap.dataset.favList + '?ids=' + ids.map(encodeURIComponent).join(','))
        .then(function (r) { return r.json(); })
        .then(function (res) {
          var list = (res && res.items) || [];
          // purge des réfs orphelines (produits disparus) pour ne pas bloquer le compteur
          if (res && res.stale && res.stale.length) {
            var favs = getFavs().filter(function (x) { return res.stale.map(String).indexOf(String(x)) === -1; });
            setFavs(favs);
            paintFavButtons();
          }
          if (!list.length) { emptyRow(); return; }
          body.innerHTML = list.map(function (p) {
            return '<tr class="wishlist-item" data-row-id="' + p.id + '">' +
              '<td class="product-remove"><a href="#" class="remove" data-fav-toggle="' + p.ref + '" aria-label="Quitar">&times;</a></td>' +
              '<td class="product-thumbnail"><a href="' + p.url + '"><img src="' + p.image + '" alt=""></a></td>' +
              '<td class="product-name" data-title="Producto"><a href="' + p.url + '">' + p.name + '</a></td>' +
              '<td class="product-price" data-title="Precio"><span class="woocommerce-Price-amount amount">' + priceCell(p) + '</span></td>' +
              '<td class="product-stock-status" data-title="Disponibilidad">' +
                (p.in_stock ? '<span class="in-stock">En stock</span>' : '<span class="out-of-stock">Agotado</span>') + '</td>' +
              '<td class="product-add-to-cart">' +
                (p.in_stock
                  ? '<a href="' + addUrl + '" class="button add_to_cart_button ajax_add_to_cart" data-product_id="' + p.id + '" role="button">Añadir al carrito</a>'
                  : '<span class="button disabled" aria-disabled="true">No disponible</span>') +
              '</td></tr>';
          }).join('');
          paintFavButtons();
        })
        .catch(emptyRow);
    }

    // Re-render en temps réel après un retrait (le handler global appelle ce hook)
    window.__favRender = render;

    render();
  }
})();
