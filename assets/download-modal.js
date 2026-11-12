(function () {
  'use strict';

  var NORMAL_URL = 'https://cdn.corelegacy.gg/CoRe_Legacy.zip';
  var HD_URL = 'https://cdn.corelegacy.gg/CoRe_Legacy_HD.zip';
  var HD_PAGE = '/descargar-wow-wotlk-hd';

  function trackDownload(clientType) {
    try {
      fetch('/api/download.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ client_type: clientType })
      }).catch(function () {});
    } catch (e) {}
  }

  function triggerDownload(url) {
    var a = document.createElement('a');
    a.href = url;
    a.download = '';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }

  var modalHtml =
    '<div id="downloadChoiceModal" style="display:none; position:fixed; inset:0; z-index:10000;'
    + ' background:rgba(2,8,18,0.88); backdrop-filter:blur(6px);'
    + ' align-items:center; justify-content:center;" role="dialog" aria-modal="true" aria-labelledby="downloadChoiceTitle">'
    + '<div style="max-width:640px; width:90vw; border-radius:16px; border:1px solid #4bbde855;'
    + ' box-shadow:0 0 50px rgba(77,189,232,0.15), 0 20px 60px rgba(0,0,0,0.7);'
    + ' background:linear-gradient(180deg, rgba(8,20,36,0.98) 0%, rgba(5,13,24,0.99) 100%);'
    + ' overflow:hidden;">'
    + '<div style="display:flex; align-items:center; justify-content:space-between; padding:1.5rem 2rem;'
    + ' border-bottom:1px solid #4bbde833;">'
    + '<h2 id="downloadChoiceTitle" style="font-family:\'Cinzel Decorative\',Georgia,serif; font-size:1.25rem;'
    + ' font-weight:800; margin:0; background:linear-gradient(180deg,#fff 0%,#d4f0ff 40%,#4bbde8 100%);'
    + ' -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;'
    + ' letter-spacing:0.03em;">Elige tu Cliente</h2>'
    + '<button type="button" id="downloadChoiceClose" aria-label="Cerrar"'
    + ' style="background:none; border:none; cursor:pointer; color:#7dd8f8; font-size:1.5rem; line-height:1;'
    + ' padding:0; transition:color 0.3s ease;">&times;</button>'
    + '</div>'
    + '<div style="display:flex; padding:1.75rem 2rem; gap:1.5rem; align-items:stretch;">'

    // Normal column
    + '<div style="flex:1; display:flex; flex-direction:column; align-items:center; text-align:center;'
    + ' padding:1.5rem 1rem; border:1px solid #1a3a5a44; border-radius:12px;'
    + ' background:linear-gradient(180deg, rgba(8,20,36,0.6) 0%, rgba(5,13,24,0.8) 100%);">'
    + '<div style="font-size:2rem; margin-bottom:0.5rem;">&#128187;</div>'
    + '<h3 style="font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif; font-size:1rem; font-weight:700;'
    + ' color:#d4f0ff; margin:0 0 0.35rem; letter-spacing:0.02em;">Cliente Normal</h3>'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; line-height:1.6; color:#b8d4e8;'
    + ' margin:0 0 1.25rem; flex:1;">Gráficos clásicos originales. Ideal para equipos modestos.</p>'
    + '<button type="button" data-dl="normal"'
    + ' style="display:inline-flex; align-items:center; justify-content:center; gap:0.4rem;'
    + ' padding:0.65rem 1.5rem; font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif;'
    + ' font-size:0.85rem; font-weight:700; letter-spacing:0.04em; color:#050d18;'
    + ' background:linear-gradient(135deg,#d4f0ff 0%,#8dd6f5 40%,#4bbde8 100%);'
    + ' border:1px solid #8dd8f5; border-radius:8px; cursor:pointer;'
    + ' box-shadow:0 0 16px rgba(77,189,232,0.25); transition:all 0.3s ease;">'
    + '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"'
    + ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
    + '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/>'
    + '<line x1="12" y1="15" x2="12" y2="3"/></svg>'
    + 'Descargar</button>'
    + '</div>'

    // Divider
    + '<div style="width:1px; align-self:stretch; background:linear-gradient(180deg, transparent, #4bbde844, transparent);"></div>'

    // HD column
    + '<div style="flex:1; display:flex; flex-direction:column; align-items:center; text-align:center;'
    + ' padding:1.5rem 1rem; border:1px solid #4bbde866; border-radius:12px;'
    + ' background:linear-gradient(180deg, rgba(13,110,168,0.1) 0%, rgba(5,13,24,0.8) 100%);'
    + ' box-shadow:0 0 20px rgba(77,189,232,0.08);">'
    + '<div style="font-size:2rem; margin-bottom:0.5rem;">&#127918;</div>'
    + '<h3 style="font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif; font-size:1rem; font-weight:700;'
    + ' color:#7dd8f8; margin:0 0 0.35rem; letter-spacing:0.02em; text-shadow:0 0 8px rgba(77,189,232,0.2);">Cliente HD</h3>'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; line-height:1.6; color:#b8d4e8;'
    + ' margin:0 0 1.25rem; flex:1;">Texturas HD, agua moderna, iluminación avanzada y más FPS.</p>'
    + '<a href="' + HD_PAGE + '" data-dl="hd"'
    + ' style="display:inline-flex; align-items:center; justify-content:center; gap:0.4rem;'
    + ' padding:0.65rem 1.5rem; font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif;'
    + ' font-size:0.85rem; font-weight:700; letter-spacing:0.04em; color:#050d18;'
    + ' background:linear-gradient(135deg,#d4f0ff 0%,#8dd6f5 40%,#4bbde8 100%);'
    + ' border:1px solid #8dd8f5; border-radius:8px; cursor:pointer; text-decoration:none;'
    + ' box-shadow:0 0 16px rgba(77,189,232,0.25); transition:all 0.3s ease;">'
    + '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"'
    + ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
    + '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/>'
    + '<line x1="12" y1="15" x2="12" y2="3"/></svg>'
    + 'Descargar</a>'
    + '</div>'

    + '</div>'
    + '</div>'
    + '</div>';

  var modal = null;
  var closeBtn = null;

  function ensureModal() {
    if (modal) return;
    var wrapper = document.createElement('div');
    wrapper.innerHTML = modalHtml;
    modal = wrapper.firstElementChild;
    document.body.appendChild(modal);
    closeBtn = modal.querySelector('#downloadChoiceClose');

    closeBtn.addEventListener('click', close);
    modal.addEventListener('click', function (e) {
      if (e.target === modal) close();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.style.display === 'flex') close();
    });

    var normalBtn = modal.querySelector('[data-dl="normal"]');
    normalBtn.addEventListener('click', function () {
      triggerDownload(NORMAL_URL);
      trackDownload(1);
      close();
    });

    var hdLink = modal.querySelector('[data-dl="hd"]');
    hdLink.addEventListener('click', function () {
      trackDownload(2);
      close();
    });
  }

  function open() {
    ensureModal();
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function close() {
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }

  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href]');
    if (!link) return;
    var href = link.getAttribute('href') || '';
    if (href.indexOf('cdn.corelegacy.gg/CoRe_Legacy.zip') === -1) return;
    if (link.textContent.trim().indexOf('Descargar WoW 3.3.5') === -1) return;
    e.preventDefault();
    open();
  });
})();
