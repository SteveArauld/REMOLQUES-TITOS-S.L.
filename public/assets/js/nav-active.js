/**
 * Met en évidence l'entrée du menu correspondant à la page courante.
 * Le menu du thème est du HTML statique (aucune classe active dynamique) :
 * ce script nettoie l'état hérité et marque le bon <li>.
 */
(function () {
	'use strict';

	function normalize(path) {
		try {
			path = decodeURIComponent(path);
		} catch (e) {}
		if (path.length > 1) path = path.replace(/\/+$/, '');
		return path || '/';
	}

	function run() {
		var here = normalize(location.pathname);
		var menus = document.querySelectorAll(
			'.elementor-nav-menu--main, #tbay-mobile-menu-navbar, #main-mobile-menu-mmenu-wrapper, ' +
			'#tbay-mega-menu, .main-menu, .zota-menu, .menu-main-menu-container, nav ul.menu, ul.nav'
		);
		if (!menus.length) menus = [document];

		var ACTIVE = ['current-menu-item', 'current_page_item', 'active', 'current-menu-ancestor'];

		menus.forEach(function (menu) {
			// 1) On repart d'un état propre.
			menu.querySelectorAll('li').forEach(function (li) {
				ACTIVE.forEach(function (c) { li.classList.remove(c); });
			});

			// 2) Meilleure correspondance : href identique, sinon préfixe le plus long.
			var best = null, bestLen = -1;
			menu.querySelectorAll('a[href]').forEach(function (a) {
				var raw = (a.getAttribute('href') || '').trim();
				// Liens "vides" (parents de sous-menu, ancres) : ignorés.
				if (!raw || raw === '#' || raw.charAt(0) === '#' ||
					/^(javascript:|mailto:|tel:)/i.test(raw)) return;
				var url;
				try { url = new URL(raw, location.origin); } catch (e) { return; }
				if (url.origin !== location.origin) return;
				var p = normalize(url.pathname);
				if (p === '/' && here !== '/') return;            // "Inicio" seulement sur l'accueil
				var match = (p === here) || (p !== '/' && here.indexOf(p + '/') === 0);
				if (match && p.length > bestLen) { best = a; bestLen = p.length; }
			});

			if (!best && here === '/') {
				best = menu.querySelector('a[href="/"], a[href="' + location.origin + '/"]');
			}
			if (!best) return;

			// 3) On marque le <li> et ses parents <li> (sous-menus).
			var li = best.closest('li');
			var first = true;
			while (li && menu.contains(li)) {
				li.classList.add(first ? 'current-menu-item' : 'current-menu-ancestor');
				li.classList.add('active');
				if (first) li.classList.add('current_page_item');
				first = false;
				li = li.parentElement ? li.parentElement.closest('li') : null;
			}
		});
	}

	// Style de repli pour garantir un rendu visible.
	var css = document.createElement('style');
	css.textContent =
		'.current-menu-item > a, .current-menu-ancestor > a, li.active > a,' +
		'.current-menu-item > a.elementor-item, .current-menu-ancestor > a.elementor-item{' +
		'color:var(--e-global-color-accent,var(--tbay-primary-color,#e2001a))!important;font-weight:700}' +
		'.elementor-nav-menu--main .current-menu-item > a.elementor-item::after,' +
		'.elementor-nav-menu--main .current-menu-ancestor > a.elementor-item::after,' +
		'.menu-item.current-menu-item > a::after, .menu-item.current-menu-ancestor > a::after{' +
		'content:"";display:block;height:2px;background:currentColor;margin-top:3px;border-radius:2px}';
	(document.head || document.documentElement).appendChild(css);

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', run);
	} else {
		run();
	}
})();

/* Barre de recherche mobile : ouverture/fermeture via le bouton loupe. */
(function () {
	'use strict';
	function ready(fn) {
		if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
		else fn();
	}
	ready(function () {
		var wrap = document.querySelector('.topbar-device-mobile .search-device');
		var btn = wrap && wrap.querySelector('.tr-search-toggle');
		if (!wrap || !btn) return;

		function close() {
			wrap.classList.remove('is-open');
			btn.setAttribute('aria-expanded', 'false');
		}
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			var open = wrap.classList.toggle('is-open');
			btn.setAttribute('aria-expanded', open ? 'true' : 'false');
			if (open) {
				var input = wrap.querySelector('input[name="s"]');
				if (input) setTimeout(function () { input.focus(); }, 30);
			}
		});
		document.addEventListener('click', function (e) {
			if (wrap.classList.contains('is-open') && !wrap.contains(e.target)) close();
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') close();
		});
	});
})();
