// Descarga silenciosa — registra cada clic en enlaces del CDN sin mostrar nada en la web.
// Detecta automáticamente si el enlace apunta al cliente normal (1) o HD (2).
(function () {
  'use strict';

  function trackDownload(clientType) {
    try {
      fetch('/api/download.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ client_type: clientType })
      }).catch(function () {});
    } catch (e) {}
  }

  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href]');
    if (!link) return;

    var href = link.getAttribute('href') || '';
    if (href.indexOf('cdn.corelegacy.gg') === -1) return;

    if (href.indexOf('CoRe_Legacy_HD.zip') !== -1) {
      trackDownload(2);
    } else if (href.indexOf('CoRe_Legacy.zip') !== -1) {
      trackDownload(1);
    }
  }, { passive: true });
})();
