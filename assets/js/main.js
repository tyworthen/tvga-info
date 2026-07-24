/**
 * TVGA theme — minimal front-end JavaScript.
 * Only handles the mobile nav toggle and closing submenus on outside click.
 * No frameworks, no build step.
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var header = document.getElementById('site-header');
    var toggle = document.getElementById('navToggle');
    if (!header || !toggle) return;

    toggle.addEventListener('click', function () {
      var open = header.classList.toggle('nav-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    });

    // Close the mobile menu after a top-level link is chosen.
    var links = header.querySelectorAll('.main-nav > ul > li > a');
    links.forEach(function (link) {
      link.addEventListener('click', function () {
        header.classList.remove('nav-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Tap-to-open behavior for dropdown sub-menus on touch/mobile.
    var parents = header.querySelectorAll('.main-nav li.menu-item-has-children');
    parents.forEach(function (item) {
      var link = item.querySelector('a');
      if (!link) return;
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 900) {
          if (!item.classList.contains('menu-open')) {
            e.preventDefault();
            parents.forEach(function (p) { p.classList.remove('menu-open'); });
            item.classList.add('menu-open');
          }
        }
      });
    });
  });
})();
