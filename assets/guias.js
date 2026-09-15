(function () {
  'use strict';

  var GUIDES = {
    'guia-de-descarga-e-inicio-rapido': {
      title: 'Guía de Descarga e Inicio Rápido',
      icon: '📥'
    },
    'requisitos-de-hardware': {
      title: 'Requisitos de Hardware',
      icon: '🖥️'
    },
    'guia-playerbots-ia-wow-wotlk-solitario': {
      title: 'Guía Definitiva de Playerbots: Cómo Jugar WoW WotLK en Solitario con IA',
      icon: '🤖'
    },
    'guia-practica-avanzada-multibot': {
      title: 'Guía Práctica y Avanzada de MultiBot',
      icon: '🎮'
    },
    'guia-addon-dungeonclear': {
      title: 'Guía de Uso del Addon: DungeonClear',
      icon: '🤖'
    }
  };

  function initGuias() {
    var body = document.getElementById('guiasBody');
    if (!body) return;

    var html = '';
    var keys = Object.keys(GUIDES);
    for (var i = 0; i < keys.length; i++) {
      var slug = keys[i];
      var guide = GUIDES[slug];
      html +=
        '<a class="guia-card" href="/guias/' + slug + '">' +
          '<span class="guia-card-icon">' + guide.icon + '</span>' +
          '<span class="guia-card-title">' + guide.title + '</span>' +
          '<span class="guia-card-arrow">→</span>' +
        '</a>';
    }
    body.innerHTML = html;
    body.classList.add('guias-populated');
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGuias);
  } else {
    initGuias();
  }
})();
