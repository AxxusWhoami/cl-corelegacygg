(function () {
  'use strict';

  // ===== Snowfall =====
  (function snowfall() {
    var container = document.getElementById('snowContainer');
    if (!container) return;
    document.addEventListener('visibilitychange', function () {
      document.body.classList.toggle('page-hidden', document.hidden);
    });
    var isMobile = window.matchMedia('(max-width: 768px)').matches;
    var count = isMobile ? 12 : 28;
    for (var i = 0; i < count; i++) {
      var p = document.createElement('div');
      p.className = 'snow-particle';
      var size = Math.random() * 4 + 1;
      p.style.width = size + 'px';
      p.style.height = size + 'px';
      p.style.left = Math.random() * 100 + '%';
      p.style.top = Math.random() * 100 + '%';
      p.style.opacity = (Math.random() * 0.8 + 0.2).toString();
      p.style.animationDuration = (Math.random() * 8 + 5) + 's';
      p.style.animationDelay = (Math.random() * 10) + 's';
      container.appendChild(p);
    }
  })();

  // ===== Header scroll effect =====
  (function headerScroll() {
    var header = document.getElementById('header');
    if (!header) return;
    window.addEventListener('scroll', function () {
      if (window.scrollY > 60) {
        header.style.borderBottomColor = '#1a3a5a66';
        header.style.background = 'linear-gradient(180deg, rgba(2,14,30,0.95) 0%, rgba(2,14,30,0.85) 100%)';
      } else {
        header.style.borderBottomColor = 'transparent';
        header.style.background = 'linear-gradient(180deg, rgba(2,14,30,0.92) 0%, rgba(2,14,30,0.6) 80%, transparent 100%)';
      }
    });
  })();

  // ===== Mobile nav toggle =====
  (function mobileNav() {
    var toggle = document.getElementById('mobileToggle');
    var nav = document.getElementById('mobileNav');
    if (!toggle || !nav) return;
    toggle.addEventListener('click', function () {
      var isHidden = nav.style.display === 'none' || !nav.style.display;
      nav.style.display = isHidden ? 'flex' : 'none';
      nav.classList.toggle('hidden', !isHidden);
    });
  })();

  // ===== Reveal on scroll =====
  (function revealOnScroll() {
    var els = document.querySelectorAll('.reveal');
    if (els.length === 0) return;
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0, rootMargin: '0px 0px -50px 0px' });
    els.forEach(function (el) { obs.observe(el); });

    setTimeout(function () {
      els.forEach(function (el) { if (!el.classList.contains('visible')) el.classList.add('visible'); });
    }, 3000);

    var gong = document.querySelector('.gong-reveal');
    if (gong) {
      var gongObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('visible');
            gongObs.unobserve(e.target);
          }
        });
      }, { threshold: 0.25 });
      gongObs.observe(gong);
    }
  })();

  // ===== Back-to-top button =====
  (function backToTop() {
    var btn = document.querySelector('.back-to-top');
    if (!btn) return;
    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    });
    btn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  })();

  // ===== Meta Pixel (deferred for performance) =====
  (function metaPixel() {
    function load() {
      if (window.fbq) return;
      var n = window.fbq = function () {
        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
      };
      if (!window._fbq) window._fbq = n;
      n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
      var t = document.createElement('script');
      t.async = true;
      t.src = 'https://connect.facebook.net/en_US/fbevents.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(t, s);
      fbq('init', '1311164035421702');
      fbq('track', 'PageView');
    }
    if (document.readyState === 'complete') {
      load();
    } else {
      window.addEventListener('load', load);
    }
  })();
})();
