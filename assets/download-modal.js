(function () {
  'use strict';

  var NORMAL_URL = 'https://cdn.corelegacy.gg/CoRe_Legacy.zip';
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

  /* ---- Download choice modal ---- */
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
    + ' letter-spacing:0.03em;">Clientes de World of Warcraft</h2>'
    + '<button type="button" id="downloadChoiceClose" aria-label="Cerrar"'
    + ' style="background:none; border:none; cursor:pointer; color:#7dd8f8; font-size:1.5rem; line-height:1;'
    + ' padding:0; transition:color 0.3s ease;">&times;</button>'
    + '</div>'
    + '<div style="display:flex; padding:1.75rem 2rem; gap:1.5rem; align-items:stretch;">'

    // Normal column
    + '<div style="flex:1; position:relative; display:flex; flex-direction:column; align-items:center; text-align:center;'
    + ' padding:1.5rem 1rem; border:1px solid #1a3a5a44; border-radius:12px;'
    + ' background:linear-gradient(180deg, rgba(8,20,36,0.6) 0%, rgba(5,13,24,0.8) 100%);">'
    + '<span style="position:absolute; top:0.6rem; right:0.6rem; display:inline-flex; align-items:center; gap:0.25rem;'
    + ' padding:0.15rem 0.55rem; font-family:\'Cinzel\',Georgia,serif; font-size:0.65rem; font-weight:700;'
    + ' color:#d4f0ff; background:rgba(77,189,232,0.12); border:1px solid #4bbde844; border-radius:999px;'
    + ' letter-spacing:0.03em; white-space:nowrap;">'
    + '<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"'
    + ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
    + '<path d="M22 12H2"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>'
    + '<line x1="6" y1="16" x2="6.01" y2="16"/><line x1="10" y1="16" x2="10.01" y2="16"/></svg>'
    + '16,5 GB</span>'
    + '<div style="font-size:2rem; margin-bottom:0.5rem;">&#128187;</div>'
    + '<h3 style="font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif; font-size:1rem; font-weight:700;'
    + ' color:#d4f0ff; margin:0 0 0.35rem; letter-spacing:0.02em;">Cliente Normal</h3>'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; line-height:1.6; color:#b8d4e8;'
    + ' margin:0 0 1.25rem; flex:1;">Gr\u00e1ficos cl\u00e1sicos originales. Ideal para equipos modestos.</p>'
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
    + '<button type="button" data-req="normal"'
    + ' style="background:none; border:none; cursor:pointer; margin-top:0.75rem;'
    + ' font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; font-weight:700; color:#f0c850;'
    + ' text-decoration:underline; text-underline-offset:3px; letter-spacing:0.04em;'
    + ' transition:color 0.3s ease;">Requisitos</button>'
    + '<span aria-hidden="true" style="margin-top:0.5rem; font-size:0.8rem; line-height:1.6; visibility:hidden;">Ver caracter\u00edsticas</span>'
    + '</div>'

    // Divider
    + '<div style="width:1px; align-self:stretch; background:linear-gradient(180deg, transparent, #4bbde844, transparent);"></div>'

    // HD column
    + '<div style="flex:1; position:relative; display:flex; flex-direction:column; align-items:center; text-align:center;'
    + ' padding:1.5rem 1rem; border:1px solid #4bbde866; border-radius:12px;'
    + ' background:linear-gradient(180deg, rgba(13,110,168,0.1) 0%, rgba(5,13,24,0.8) 100%);'
    + ' box-shadow:0 0 20px rgba(77,189,232,0.08);">'
    + '<span style="position:absolute; top:0.6rem; left:0.6rem; display:inline-flex; align-items:center;'
    + ' gap:0.2rem; padding:0.15rem 0.5rem; font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif;'
    + ' font-size:0.62rem; font-weight:900; color:#1a1205; background:linear-gradient(135deg,#f0c850 0%,#d4a843 100%);'
    + ' border:1px solid #f0d870; border-radius:999px; letter-spacing:0.06em; text-transform:uppercase;'
    + ' white-space:nowrap; box-shadow:0 0 10px rgba(212,168,67,0.4);">'
    + 'Nuevo</span>'
    + '<span style="position:absolute; top:0.6rem; right:0.6rem; display:inline-flex; align-items:center; gap:0.25rem;'
    + ' padding:0.15rem 0.55rem; font-family:\'Cinzel\',Georgia,serif; font-size:0.65rem; font-weight:700;'
    + ' color:#f0c850; background:rgba(212,168,67,0.12); border:1px solid #d4a84344; border-radius:999px;'
    + ' letter-spacing:0.03em; white-space:nowrap;">'
    + '<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"'
    + ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
    + '<path d="M22 12H2"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>'
    + '<line x1="6" y1="16" x2="6.01" y2="16"/><line x1="10" y1="16" x2="10.01" y2="16"/></svg>'
    + '35,2 GB</span>'
    + '<div style="font-size:2rem; margin-bottom:0.5rem;">&#127918;</div>'
    + '<h3 style="font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif; font-size:1rem; font-weight:700;'
    + ' color:#7dd8f8; margin:0 0 0.35rem; letter-spacing:0.02em; text-shadow:0 0 8px rgba(77,189,232,0.2);">Cliente HD</h3>'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; line-height:1.6; color:#b8d4e8;'
    + ' margin:0 0 1.25rem; flex:1;">Texturas HD, agua moderna, iluminaci\u00f3n avanzada y m\u00e1s FPS.</p>'
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
    + '<button type="button" data-req="hd"'
    + ' style="background:none; border:none; cursor:pointer; margin-top:0.75rem;'
    + ' font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; font-weight:700; color:#f0c850;'
    + ' text-decoration:underline; text-underline-offset:3px; letter-spacing:0.04em;'
    + ' transition:color 0.3s ease;">Requisitos</button>'
    + '<a href="https://corelegacy.gg/descargar-wow-wotlk-hd" target="_blank" rel="noopener"'
    + ' style="margin-top:0.5rem; font-family:\'Cinzel\',Georgia,serif; font-size:0.8rem; font-weight:700;'
    + ' color:#4bbde8; text-decoration:underline; text-underline-offset:3px; letter-spacing:0.04em;'
    + ' transition:color 0.3s ease;">Ver caracter\u00edsticas</a>'
    + '</div>'

    + '</div>'

    + '<div style="display:flex; align-items:center; justify-content:center; gap:0.5rem; padding:1rem 2rem 1.75rem;'
    + ' font-family:\'Cinzel\',Georgia,serif; font-size:0.85rem; font-weight:700; color:#39ff14;'
    + ' letter-spacing:0.04em; text-shadow:0 0 8px rgba(57,255,20,0.5);">'
    + '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"'
    + ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="filter:drop-shadow(0 0 4px rgba(57,255,20,0.6));">'
    + '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/></svg>'
    + 'Descarga directa a m\u00e1xima velocidad</div>'
    + '</div>';

  /* ---- Normal client requirements modal (blue theme) ---- */
  var reqNormalHtml =
    '<div id="reqNormalModal" style="display:none; position:fixed; inset:0; z-index:10001;'
    + ' background:rgba(2,8,18,0.88); backdrop-filter:blur(6px);'
    + ' align-items:center; justify-content:center;" role="dialog" aria-modal="true" aria-labelledby="reqNormalTitle">'
    + '<div style="max-width:680px; width:90vw; max-height:85vh; overflow-y:auto; border-radius:16px;'
    + ' border:1px solid #4bbde855; box-shadow:0 0 50px rgba(77,189,232,0.15), 0 20px 60px rgba(0,0,0,0.7);'
    + ' background:linear-gradient(180deg, rgba(8,20,36,0.98) 0%, rgba(5,13,24,0.99) 100%);">'
    + '<div style="display:flex; align-items:center; justify-content:space-between; padding:1.5rem 2rem;'
    + ' border-bottom:1px solid #4bbde833;">'
    + '<h2 id="reqNormalTitle" style="font-family:\'Cinzel Decorative\',Georgia,serif; font-size:1.25rem;'
    + ' font-weight:800; margin:0; background:linear-gradient(180deg,#fff 0%,#d4f0ff 40%,#4bbde8 100%);'
    + ' -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;'
    + ' letter-spacing:0.03em;">Requisitos del Sistema (Cliente Normal)</h2>'
    + '<button type="button" id="reqNormalClose" aria-label="Cerrar"'
    + ' style="background:none; border:none; cursor:pointer; color:#7dd8f8; font-size:1.5rem; line-height:1;'
    + ' padding:0; transition:color 0.3s ease;">&times;</button>'
    + '</div>'
    + '<div style="padding:1.75rem 2rem;">'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.88rem; line-height:1.75; color:#b8d4e8;'
    + ' margin:0 0 1.5rem;">Para disfrutar de World of Warcraft: Wrath of the Lich King 3.3.5a con un rendimiento estable, recomendamos el siguiente hardware:</p>'
    + '<table style="width:100%; border-collapse:collapse; font-family:\'Cinzel\',Georgia,serif;">'
    + '<thead><tr>'
    + '<th style="text-align:left; padding:0.75rem 1rem; font-size:0.8rem; font-weight:700; color:#4bbde8;'
    + ' letter-spacing:0.05em; text-transform:uppercase; border-bottom:2px solid #4bbde844;">Componente</th>'
    + '<th style="text-align:left; padding:0.75rem 1rem; font-size:0.8rem; font-weight:700; color:#4bbde8;'
    + ' letter-spacing:0.05em; text-transform:uppercase; border-bottom:2px solid #4bbde844;">Requisitos Recomendados para WoW 3.3.5</th>'
    + '</tr></thead><tbody>'
    + '<tr style="border-bottom:1px solid #4bbde822;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4f0ff; font-weight:600;">Sistema Operativo</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8d4e8; line-height:1.6;">Windows Vista / Windows 7 / Windows 10 (Se requieren 64-bit para aprovechar el parche)</td></tr>'
    + '<tr style="border-bottom:1px solid #4bbde822;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4f0ff; font-weight:600;">Procesador (CPU)</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8d4e8; line-height:1.6;">Intel Pentium D o AMD Athlon 64 X2 (o superior)</td></tr>'
    + '<tr style="border-bottom:1px solid #4bbde822;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4f0ff; font-weight:600;">Memoria RAM</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8d4e8; line-height:1.6;">8 GB de RAM (El cliente necesita 4 GB dedicados)</td></tr>'
    + '<tr style="border-bottom:1px solid #4bbde822;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4f0ff; font-weight:600;">Tarjeta Gr\u00e1fica (GPU)</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8d4e8; line-height:1.6;">Tarjeta gr\u00e1fica 3D con 256 MB de VRAM (NVIDIA GeForce 8600 / ATI Radeon HD 2600 o superior)</td></tr>'
    + '<tr><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4f0ff; font-weight:600;">Almacenamiento</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8d4e8; line-height:1.6;">~25 GB de espacio libre</td></tr>'
    + '</tbody></table>'
    + '</div>'
    + '</div>'
    + '</div>';

  /* ---- HD client requirements modal (golden theme, matching HD page) ---- */
  var reqHdHtml =
    '<style>'
    + '#reqHdModal > div::-webkit-scrollbar { width:8px; }'
    + '#reqHdModal > div::-webkit-scrollbar-track { background:rgba(212,168,67,0.06); border-radius:4px; }'
    + '#reqHdModal > div::-webkit-scrollbar-thumb { background:linear-gradient(180deg,#f0c850,#d4a843); border-radius:4px; }'
    + '#reqHdModal > div::-webkit-scrollbar-thumb:hover { background:linear-gradient(180deg,#f0d870,#d4b853); }'
    + '#reqHdModal > div { scrollbar-width:thin; scrollbar-color:#d4a843 rgba(212,168,67,0.06); }'
    + '</style>'
    + '<div id="reqHdModal" style="display:none; position:fixed; inset:0; z-index:10001;'
    + ' background:rgba(2,8,18,0.88); backdrop-filter:blur(6px);'
    + ' align-items:center; justify-content:center;" role="dialog" aria-modal="true" aria-labelledby="reqHdTitle">'
    + '<div style="max-width:680px; width:90vw; max-height:85vh; overflow-y:auto; border-radius:16px;'
    + ' border:1px solid #d4a84355; box-shadow:0 0 50px rgba(212,168,67,0.15), 0 20px 60px rgba(0,0,0,0.7);'
    + ' background:linear-gradient(180deg, rgba(20,16,8,0.98) 0%, rgba(8,6,2,0.99) 100%);">'
    + '<div style="display:flex; align-items:center; justify-content:space-between; padding:1.5rem 2rem;'
    + ' background:linear-gradient(180deg, rgba(212,168,67,0.18) 0%, rgba(212,168,67,0.06) 100%);'
    + ' border-bottom:2px solid #d4a84366;">'
    + '<h2 id="reqHdTitle" style="font-family:\'Cinzel Decorative\',Georgia,serif; font-size:1.25rem;'
    + ' font-weight:800; margin:0; background:linear-gradient(180deg,#fff7e0 0%,#f0c850 50%,#d4a843 100%);'
    + ' -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;'
    + ' letter-spacing:0.03em;">Requisitos del Sistema (Versi\u00f3n HD)</h2>'
    + '<button type="button" id="reqHdClose" aria-label="Cerrar"'
    + ' style="background:none; border:none; cursor:pointer; color:#d4c080; font-size:1.5rem; line-height:1;'
    + ' padding:0; transition:color 0.3s ease;">&times;</button>'
    + '</div>'
    + '<div style="padding:1.75rem 2rem;">'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.88rem; line-height:1.75; color:#d4c080;'
    + ' margin:0 0 1.5rem;">Para disfrutar de todos los beneficios gr\u00e1ficos, el nuevo motor de agua y la iluminaci\u00f3n avanzada sin sacrificar los FPS (especialmente en JcJ masivo o bandas), recomendamos el siguiente hardware:</p>'
    + '<table style="width:100%; border-collapse:collapse; font-family:\'Cinzel\',Georgia,serif;">'
    + '<thead><tr>'
    + '<th style="text-align:left; padding:0.75rem 1rem; font-size:0.8rem; font-weight:700; color:#f0c850;'
    + ' letter-spacing:0.05em; text-transform:uppercase; border-bottom:2px solid #d4a84344;">Componente</th>'
    + '<th style="text-align:left; padding:0.75rem 1rem; font-size:0.8rem; font-weight:700; color:#f0c850;'
    + ' letter-spacing:0.05em; text-transform:uppercase; border-bottom:2px solid #d4a84344;">Requisitos Recomendados para HD</th>'
    + '</tr></thead><tbody>'
    + '<tr style="border-bottom:1px solid #d4a84322;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4c080; font-weight:600;">Sistema Operativo</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8a060; line-height:1.6;">Windows 10 / Windows 11 (64-bit)</td></tr>'
    + '<tr style="border-bottom:1px solid #d4a84322;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4c080; font-weight:600;">Procesador (CPU)</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8a060; line-height:1.6;">Procesador Quad Core moderno (Intel Core i3/i5 o AMD Ryzen 3/5)</td></tr>'
    + '<tr style="border-bottom:1px solid #d4a84322;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4c080; font-weight:600;">Memoria RAM</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8a060; line-height:1.6;">8 GB de RAM (El cliente necesita 4 GB dedicados)</td></tr>'
    + '<tr style="border-bottom:1px solid #d4a84322;"><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4c080; font-weight:600;">Tarjeta Gr\u00e1fica (GPU)</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8a060; line-height:1.6;">Tarjeta gr\u00e1fica dedicada con soporte para API modernas (NVIDIA GTX Serie 1050+ / AMD RX Serie 400+ o superior)</td></tr>'
    + '<tr><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#d4c080; font-weight:600;">Almacenamiento</td><td style="padding:0.75rem 1rem; font-size:0.85rem; color:#b8a060; line-height:1.6;">~40 GB de espacio libre (Recomendado encarecidamente SSD / NVMe para reducir tiempos de carga)</td></tr>'
    + '</tbody></table>'
    + '<div style="margin-top:1.5rem; padding:1.25rem 1.5rem; background:rgba(212,168,67,0.06);'
    + ' border:1px solid #d4a84333; border-radius:10px;">'
    + '<p style="font-family:\'Cinzel\',Georgia,serif; font-size:0.82rem; line-height:1.7; color:#b8a060; margin:0;">'
    + '<strong style="color:#f0c850;">\u00bfEl cliente no se abre?</strong> Prueba a eliminar los archivos '
    + '<strong style="color:#d4c080;">d3d9.dll</strong>, <strong style="color:#d4c080;">dxgi.dll</strong> y '
    + '<strong style="color:#d4c080;">dxvk.conf</strong> de la carpeta del juego. Si a\u00fan as\u00ed no arranca o tienes '
    + 'problemas de rendimiento, deber\u00e1s usar la versi\u00f3n normal del cliente para jugar.</p>'
    + '</div>'
    + '</div>'
    + '</div>'
    + '</div>';

  var modal = null;
  var reqNormalModal = null;
  var reqHdModal = null;

  function ensureModals() {
    if (modal) return;

    var w1 = document.createElement('div');
    w1.innerHTML = modalHtml;
    modal = w1.firstElementChild;
    document.body.appendChild(modal);

    var w2 = document.createElement('div');
    w2.innerHTML = reqNormalHtml;
    reqNormalModal = w2.firstElementChild;
    document.body.appendChild(reqNormalModal);

    var w3 = document.createElement('div');
    w3.innerHTML = reqHdHtml;
    reqHdModal = w3.querySelector('#reqHdModal');
    document.body.appendChild(w3);

    // Choice modal
    modal.querySelector('#downloadChoiceClose').addEventListener('click', closeChoice);
    modal.addEventListener('click', function (e) { if (e.target === modal) closeChoice(); });

    modal.querySelector('[data-dl="normal"]').addEventListener('click', function () {
      triggerDownload(NORMAL_URL);
      trackDownload(1);
      closeChoice();
    });
    modal.querySelector('[data-dl="hd"]').addEventListener('click', function () {
      trackDownload(2);
      closeChoice();
    });
    modal.querySelector('[data-req="normal"]').addEventListener('click', function () {
      openReq(reqNormalModal);
    });
    modal.querySelector('[data-req="hd"]').addEventListener('click', function () {
      openReq(reqHdModal);
    });

    // Requirements modals
    reqNormalModal.querySelector('#reqNormalClose').addEventListener('click', function () { closeReq(reqNormalModal); });
    reqNormalModal.addEventListener('click', function (e) { if (e.target === reqNormalModal) closeReq(reqNormalModal); });

    reqHdModal.querySelector('#reqHdClose').addEventListener('click', function () { closeReq(reqHdModal); });
    reqHdModal.addEventListener('click', function (e) { if (e.target === reqHdModal) closeReq(reqHdModal); });

    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      if (reqNormalModal.style.display === 'flex') { closeReq(reqNormalModal); return; }
      if (reqHdModal.style.display === 'flex') { closeReq(reqHdModal); return; }
      if (modal.style.display === 'flex') { closeChoice(); return; }
    });
  }

  function openChoice() {
    ensureModals();
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeChoice() {
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }

  function openReq(m) {
    m.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeReq(m) {
    m.style.display = 'none';
    if (modal && modal.style.display === 'flex') return;
    document.body.style.overflow = '';
  }

  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href]');
    if (!link) return;
    var href = link.getAttribute('href') || '';
    if (href.indexOf('cdn.corelegacy.gg/CoRe_Legacy.zip') === -1) return;
    if (link.textContent.trim().indexOf('Descargar WoW 3.3.5') === -1) return;
    e.preventDefault();
    openChoice();
  });
})();
