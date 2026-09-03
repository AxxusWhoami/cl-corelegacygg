(function () {
  'use strict';

  var GUIDES = {
    'guia-de-descarga-e-inicio-rapido': {
      title: 'Guía de Descarga e Inicio Rápido',
      icon: '📥',
      metaTitle: 'Descargar e instalar World of Warcraft (WoW) WotLK 3.3.5a en CoRe Legacy | Guía rápida',
      metaDescription: 'Descarga el cliente de World of Warcraft (WoW) Wrath of the Lich King 3.3.5a en CoRe Legacy con Vulkan y parche 4K preinstalados. Sin instalación: descarga, descomprime y juega en minutos.',
      html:
        '<section class="guia-intro">' +
          '<p>¡Bienvenido! Empezar a jugar con nosotros es muy sencillo. Sigue estos rápidos pasos y estarás en el juego en cuestión de minutos.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">1. Descarga el Juego</h3>' +
          '<p>Puedes descargar nuestro cliente completo directamente y a la máxima velocidad desde nuestros servidores dedicados.</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Ve a la <strong>Página de Inicio</strong> de nuestro sitio web.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Haz clic en el botón principal de <strong>Descargar Juego</strong>.</p>' +
          '<p class="guia-note"><em>Nota: La descarga es directa, sin intermediarios.</em></p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">2. Preparación (¡No requiere instalación!)</h3>' +
          '<p>Nuestro cliente viene <strong>"Ready to Play"</strong> (Listo para jugar). No necesitas instalar nada complicado.</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Una vez finalizada la descarga, localiza el archivo comprimido (normalmente en tu carpeta de Descargas).</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Descomprime el archivo en la ubicación que prefieras de tu disco duro (por ejemplo, en <strong>C:\\Core Legacy</strong>).</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">3. ¡A Jugar!</h3>' +
          '<p>Si ya has creado tu cuenta en nuestra página web, ¡estás listo!</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Abre la carpeta donde descomprimiste el juego.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Haz doble clic en el archivo <strong>Wow.exe</strong>.</p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Ingresa con tu nombre de cuenta y contraseña, ¡y disfruta de la aventura!</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">¿Por qué nuestro cliente es especial?</h3>' +
          '<p>Hemos preparado este cliente pensando en la estabilidad y el máximo rendimiento. Por defecto, ya incluye:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Optimización Vulkan:</strong> Experimenta un rendimiento superior, mayor fluidez y mejores FPS.</li>' +
            '<li><strong>Parche 4K (4k patch):</strong> Soluciona el famoso error #132 del juego (muy común al pasar por zonas con muchos jugadores) permitiendo que el cliente utilice hasta 4 GB de RAM. <em>(Nota: Esta versión está pensada para el rendimiento clásico y no incluye gráficos o texturas HD).</em></li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">Preguntas Frecuentes (FAQ)</h3>' +
          '<div class="guia-faq" id="guiaFaq">' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>1. Ya he descargado el cliente, ¿dónde creo mi cuenta?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Para entrar a jugar necesitas una cuenta de juego. Puedes registrarte de forma rápida y gratuita directamente en <a href="https://accounts.corelegacy.gg/crear-cuenta" target="_blank" rel="noopener noreferrer" class="guia-link">nuestra página de registro</a>. Una vez completado el registro, utiliza ese nombre de usuario y contraseña al abrir el juego para iniciar sesión.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>2. He visto que el cliente incluye Vulkan y DXVK, ¿qué es exactamente?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>DXVK y Vulkan son herramientas de optimización de rendimiento que hemos preinstalado por ti. Básicamente, actúan como un puente que adapta los gráficos clásicos del juego para que sean procesados por la tecnología moderna (Vulkan) de tu tarjeta gráfica. Esto se traduce en un rendimiento mucho más fluido, eliminación de tirones y un aumento notable de FPS en equipos actuales.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>3. He jugado en otros servidores y siempre piden modificar el "realmlist". ¿Tengo que cambiar algo?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>¡Para nada! Hemos diseñado nuestro cliente para que sea "descargar y jugar". El archivo del realmlist ya viene preconfigurado de fábrica para conectarse automáticamente a CoRe Legacy. No tienes que editar textos ni buscar archivos ocultos; simplemente abre Wow.exe y estarás dentro.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>4. Si el servidor acaba de ser lanzado, ¿podré hacer contenido grupal fácilmente?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Sí. Sabemos que en los lanzamientos recientes la población se está construyendo poco a poco, por lo que CoRe Legacy cuenta con un sistema avanzado de Playerbots y chat interactivo. Podrás agrupar, hacer mazmorras y disfrutar de un mundo vivo y dinámico desde el primer minuto mientras la comunidad de jugadores reales sigue creciendo.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>5. Si uso el parche 4K, ¿necesito un ordenador muy potente?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>No te preocupes, el nombre "4K Patch" se refiere a la capacidad de memoria (4 GB), no a la resolución gráfica. No añade pesadas texturas en HD, por lo que los requisitos del juego siguen siendo los mismos de siempre, pero con la ventaja de que el juego será mucho más estable y no se cerrará inesperadamente en zonas con mucha carga.</p></div>' +
            '</div>' +
          '</div>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>'
    },
    'requisitos-de-hardware': {
      title: 'Requisitos de Hardware',
      icon: '🖥️',
      metaTitle: 'Requisitos mínimos y recomendados para jugar a World of Warcraft (WoW) WotLK 3.3.5a en CoRe Legacy',
      metaDescription: 'Requisitos de hardware para World of Warcraft (WoW) Wrath of the Lich King 3.3.5a en CoRe Legacy: CPU, RAM, GPU con Vulkan, almacenamiento y conexión a internet activa.',
      html:
        '<section class="guia-intro">' +
          '<p>Antes de lanzarte a la aventura, asegúrate de que tu equipo cumple con los requisitos mínimos para disfrutar de CoRe Legacy sin problemas. A continuación tienes una tabla con los requisitos mínimos operativos y los recomendados para una experiencia óptima.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">Tabla de Requisitos</h3>' +
          '<div class="guia-table-wrap">' +
            '<table class="guia-table">' +
              '<thead>' +
                '<tr>' +
                  '<th scope="col">Componente</th>' +
                  '<th scope="col">Mínimo operativo</th>' +
                  '<th scope="col">Recomendado</th>' +
                '</tr>' +
              '</thead>' +
              '<tbody>' +
                '<tr>' +
                  '<th scope="row">Sistema Operativo</th>' +
                  '<td>Windows 7 SP1 (64-bit)</td>' +
                  '<td>Windows 10 / 11 (64-bit)</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Procesador (CPU)</th>' +
                  '<td>Dual Core a 2.0 GHz</td>' +
                  '<td>Quad Core o superior</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Memoria RAM</th>' +
                  '<td>2 GB</td>' +
                  '<td>4 GB o más (para exprimir el parche 4K)</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Tarjeta gráfica (GPU)</th>' +
                  '<td>Compatible con Vulkan 1.1+ (Nvidia GTX serie 600+, AMD Radeon HD 7000+, Intel HD Graphics 500+)</td>' +
                  '<td>GPU dedicada moderna (Nvidia GTX serie 1050+, AMD RX serie 400+ o superior)</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Almacenamiento</th>' +
                  '<td>16 GB</td>' +
                  '<td>16 GB en disco de estado sólido (SSD)</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Conexión a internet</th>' +
                  '<td>Conexión activa a internet (banda ancha recomendada)</td>' +
                  '<td>Conexión estable de baja latencia (cableada o 5 GHz)</td>' +
                '</tr>' +
              '</tbody>' +
            '</table>' +
          '</div>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">Tarjetas gráficas antiguas sin soporte Vulkan</h3>' +
          '<p>Si un jugador cuenta con una tarjeta gráfica muy antigua que no admita drivers de Vulkan, bastará con retirar los archivos de <strong>DXVK</strong> (<strong>d3d9.dll</strong> y <strong>dxgi.dll</strong>) de la carpeta raíz para que el juego vuelva a ejecutarse mediante el renderizador <strong>DirectX 9 nativo</strong>.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">Conexión a internet</h3>' +
          '<p>CoRe Legacy es un juego en línea multijugador masivo (MMORPG), por lo que es <strong>imprescindible disponer de una conexión a internet activa y estable</strong> para poder jugar. Sin conexión no es posible iniciar sesión ni acceder al mundo del juego.</p>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>',
      jsonLd: {
        '@context': 'https://schema.org',
        '@type': 'VideoGame',
        name: 'World of Warcraft (WoW): Wrath of the Lich King (WotLK) en CoRe Legacy',
        description: 'Servidor privado de World of Warcraft: Wrath of the Lich King 3.3.5a con inteligencia artificial, PvE, PvP y mundo vivo. Requisitos mínimos: Windows 7 SP1 64-bit, Dual Core 2.0 GHz, 2 GB RAM, GPU compatible con Vulkan 1.1+, 16 GB almacenamiento y conexión a internet activa.',
        url: 'https://corelegacy.gg/',
        image: 'https://corelegacy.gg/assets/logotipo_corelegacy.webp',
        inLanguage: 'es',
        genre: ['MMORPG', 'RPG', 'PvP', 'PvE'],
        gamePlatform: 'PC',
        playMode: ['MultiPlayer', 'CoOp'],
        applicationCategory: 'Game',
        operatingSystem: 'Windows 7 SP1 (64-bit) o superior',
        softwareVersion: '3.3.5a',
        contentRating: 'PEGI 12',
        author: { '@type': 'Organization', name: 'CoRe Legacy', url: 'https://corelegacy.gg/' },
        publisher: { '@type': 'Organization', name: 'CoRe Legacy', url: 'https://corelegacy.gg/' },
        offers: { '@type': 'Offer', price: '0', priceCurrency: 'EUR', availability: 'https://schema.org/InStock' }
      }
    },
    'guia-addon-dungeonclear': {
      title: 'Guía de Uso del Addon: DungeonClear',
      icon: '🤖',
      metaTitle: 'Guía del Addon DungeonClear para WoW WotLK 3.3.5a en CoRe Legacy | Bot tanque automático',
      metaDescription: 'Aprende a usar el addon DungeonClear en CoRe Legacy: controla un bot tanque que limpia mazmorras de forma autónoma en World of Warcraft (WoW) WotLK 3.3.5a. Instalación, interfaz, modos de combate y comandos de chat.',
      html:
        '<section class="guia-intro">' +
          '<p>El addon <strong>DungeonClear</strong> es una interfaz gráfica integrada en el juego diseñada para controlar de forma sencilla a un bot tanque dentro de una mazmorra. En lugar de escribir constantemente comandos en el chat, este addon te proporciona un panel para que el tanque limpie la mazmorra de forma autónoma: caminará de jefe en jefe, limpiará los enemigos en el camino (trash), esquivará obstáculos, recogerá botín, abrirá puertas y se recuperará de atascos.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">1. Instalación y Preparación</h3>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Descarga el addon desde <a href="https://downloads.corelegacy.gg/DungeonClear.zip" target="_blank" rel="noopener noreferrer" class="guia-link">este enlace directo</a>.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Descomprime el archivo descargado directamente en la carpeta de addons de tu juego:</p>' +
          '<p class="guia-note"><code>World of Warcraft / Interface / AddOns /</code></p>' +
          '<p class="guia-note"><em>Nota: La carpeta ya viene nombrada correctamente como <strong>DungeonClear</strong>, por lo que no necesitas hacer ningún cambio adicional.</em></p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Inicia el juego y, en la pantalla de selección de personaje, asegúrate de activar el addon (marca la casilla "Cargar accesorios antiguos" o "Load out of date AddOns" en la esquina superior derecha si es necesario).</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">2. Interfaz y Botones Principales</h3>' +
          '<p>Para abrir o cerrar el panel del addon dentro del juego, escribe el comando <code>/dc</code> en el chat.</p>' +
          '<p class="guia-note"><em>Nota: Debes estar en un grupo que tenga un bot tanque activo para que los botones funcionen.</em></p>' +
          '<p>El panel principal cuenta con los siguientes controles:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>On (Encender):</strong> Inicia la ruta de la mazmorra. El tanque tomará el control y comenzará a avanzar.</li>' +
            '<li><strong>Off (Apagar):</strong> Detiene el avance de la mazmorra. El tanque y los demás bots volverán a seguirte normalmente.</li>' +
            '<li><strong>Skip (Omitir):</strong> Salta el jefe u objetivo actual para continuar con el siguiente.</li>' +
            '<li><strong>Pause / Resume (Pausar / Reanudar):</strong> Congela al tanque en su posición actual sin cancelar la ruta, permitiéndote reanudarla con un clic después.</li>' +
            '<li><strong>Go (Ir):</strong> Aparece al lado del nombre de cada jefe. Envía al tanque directamente hacia ese jefe específico.</li>' +
            '<li><strong>Tiny (Minimizar):</strong> Reduce el panel a una delgada barra de una sola línea para que no estorbe en tu pantalla.</li>' +
            '<li><strong>Close (X):</strong> Oculta la ventana.</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">3. Modos de Combate (Pull Modes)</h3>' +
          '<p>Puedes configurar cómo quieres que el tanque inicie los combates contra los grupos de enemigos (trash) en su camino a los jefes. Puedes cambiar esto antes de darle a "On".</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Dynamic (Dinámico - Por defecto):</strong> Decide la mejor estrategia grupo por grupo. Ataca de frente a los grupos sencillos a toda velocidad, y utiliza estrategias más defensivas para atraer hacia atrás a los grupos peligrosos o muy juntos. Es el modo más recomendado.</li>' +
            '<li><strong>Leeroy (Pull Off):</strong> El tanque caminará directo hacia cada grupo y peleará en el lugar. Es un modo muy rápido, pero sin margen de seguridad (ideal si tienes mucho más nivel o equipo que la mazmorra).</li>' +
            '<li><strong>Advanced (Pull On):</strong> El tanque atraerá a todos los enemigos hacia una posición segura (campamento) antes de luchar. Es un modo lento y cuidadoso, ideal para mazmorras difíciles o bandas (raids).</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">4. Estado y Lista de Jefes</h3>' +
          '<p>El panel te avisa en tiempo real de lo que ocurre sin generar "spam" molesto en tu chat:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Estado general:</strong> Te muestra si el bot está encendido (ON), apagado (OFF) o pausado (PAUSED).</li>' +
            '<li><strong>Actividad actual:</strong> Te describe qué está haciendo el tanque (avanzando, luchando contra un jefe, recogiendo botín, descansando o atascado en una puerta).</li>' +
            '<li><strong>Lista de Jefes:</strong> Enumera a todos los jefes de la mazmorra con sus estados:</li>' +
          '</ul>' +
          '<div class="guia-table-wrap">' +
            '<table class="guia-table">' +
              '<thead>' +
                '<tr>' +
                  '<th scope="col">Estado</th>' +
                  '<th scope="col">Significado</th>' +
                '</tr>' +
              '</thead>' +
              '<tbody>' +
                '<tr>' +
                  '<th scope="row">Alive (Vivo)</th>' +
                  '<td>El jefe sigue en pie (puedes presionar "Go" para ir a por él).</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Dead (Muerto)</th>' +
                  '<td>Derrotado durante la ruta actual.</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Skipped (Omitido)</th>' +
                  '<td>Lo saltaste, pero puedes regresar usando "Go".</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row">Missing (Desaparecido)</th>' +
                  '<td>Estaba vivo pero el objetivo ya no está (ej. el cadáver desapareció).</td>' +
                '</tr>' +
              '</tbody>' +
            '</table>' +
          '</div>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">5. El Modo Reducido (Tiny Mode)</h3>' +
          '<p>Al presionar el botón <strong>Tiny</strong>, el panel se convierte en una sola línea fácil de colocar en cualquier esquina de tu pantalla. Desde esta pequeña barra puedes:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Clic izquierdo en el punto de estado:</strong> Iniciar la ruta, pausarla o reanudarla.</li>' +
            '<li><strong>Clic izquierdo en el punto de modo (Pull):</strong> Alternar rápidamente entre los modos Dinámico, Leeroy o Avanzado.</li>' +
            '<li><strong>Clic derecho en la barra:</strong> Volver a expandir la ventana a su tamaño original.</li>' +
            '<li><strong>Arrastrar:</strong> Mover la barra por la pantalla.</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">6. Configuración Avanzada (Settings)</h3>' +
          '<p>El servidor tiene valores por defecto, pero puedes ajustar cómo se comporta tu tanque de forma personal:</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Presiona <strong>Escape</strong> para abrir el Menú del Juego.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Ve a <strong>Interfaz → AddOns → DungeonClear → Settings</strong>.</p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Aquí podrás ajustar opciones mediante deslizadores, como la calidad mínima para recoger botín, cuánto puede el tanque alejar a los enemigos, a qué distancia atrae al jefe, etc.</p>' +
          '<p class="guia-note"><em>Nota: Estos ajustes se guardan por personaje y se aplican automáticamente en tus propias rutas sin afectar a las configuraciones globales del servidor ni a otros jugadores.</em></p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h3 class="guia-step-title">7. Comandos Rápidos de Chat</h3>' +
          '<p>Si prefieres usar macros o el chat directamente, el addon soporta los siguientes comandos:</p>' +
          '<div class="guia-table-wrap">' +
            '<table class="guia-table">' +
              '<thead>' +
                '<tr>' +
                  '<th scope="col">Comando</th>' +
                  '<th scope="col">Acción</th>' +
                '</tr>' +
              '</thead>' +
              '<tbody>' +
                '<tr><td><code>/dc</code></td><td>Abre o cierra la ventana del addon.</td></tr>' +
                '<tr><td><code>/dc on</code></td><td>Inicia la ruta.</td></tr>' +
                '<tr><td><code>/dc off</code></td><td>Detiene la ruta.</td></tr>' +
                '<tr><td><code>/dc skip</code></td><td>Omite el objetivo.</td></tr>' +
                '<tr><td><code>/dc pause</code></td><td>Pausa o reanuda.</td></tr>' +
                '<tr><td><code>/dc status</code></td><td>Actualiza la línea de estado si hubo algún fallo visual.</td></tr>' +
                '<tr><td><code>/dc bosses</code></td><td>Actualiza la lista de jefes.</td></tr>' +
                '<tr><td><code>/dc go &lt;ID_del_jefe&gt;</code></td><td>Envía al tanque a un jefe usando su número de identificación (Entry ID).</td></tr>' +
              '</tbody>' +
            '</table>' +
          '</div>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>'
    }
  };

  var FAQ_DATA = [
    {
      q: '1. Ya he descargado el cliente, ¿dónde creo mi cuenta?',
      a: 'Para entrar a jugar necesitas una cuenta de juego. Puedes registrarte de forma rápida y gratuita directamente en nuestra página de registro (https://accounts.corelegacy.gg/crear-cuenta). Una vez completado el registro, utiliza ese nombre de usuario y contraseña al abrir el juego para iniciar sesión.'
    },
    {
      q: '2. He visto que el cliente incluye Vulkan y DXVK, ¿qué es exactamente?',
      a: 'DXVK y Vulkan son herramientas de optimización de rendimiento que hemos preinstalado por ti. Básicamente, actúan como un puente que adapta los gráficos clásicos del juego para que sean procesados por la tecnología moderna (Vulkan) de tu tarjeta gráfica. Esto se traduce en un rendimiento mucho más fluido, eliminación de tirones y un aumento notable de FPS en equipos actuales.'
    },
    {
      q: '3. He jugado en otros servidores y siempre piden modificar el "realmlist". ¿Tengo que cambiar algo?',
      a: '¡Para nada! Hemos diseñado nuestro cliente para que sea "descargar y jugar". El archivo del realmlist ya viene preconfigurado de fábrica para conectarse automáticamente a CoRe Legacy. No tienes que editar textos ni buscar archivos ocultos; simplemente abre Wow.exe y estarás dentro.'
    },
    {
      q: '4. Si el servidor acaba de ser lanzado, ¿podré hacer contenido grupal fácilmente?',
      a: 'Sí. Sabemos que en los lanzamientos recientes la población se está construyendo poco a poco, por lo que CoRe Legacy cuenta con un sistema avanzado de Playerbots y chat interactivo. Podrás agrupar, hacer mazmorras y disfrutar de un mundo vivo y dinámico desde el primer minuto mientras la comunidad de jugadores reales sigue creciendo.'
    },
    {
      q: '5. Si uso el parche 4K, ¿necesito un ordenador muy potente?',
      a: 'No te preocupes, el nombre "4K Patch" se refiere a la capacidad de memoria (4 GB), no a la resolución gráfica. No añade pesadas texturas en HD, por lo que los requisitos del juego siguen siendo los mismos de siempre, pero con la ventaja de que el juego será mucho más estable y no se cerrará inesperadamente en zonas con mucha carga.'
    }
  ];

  var GUIA_PATH_PREFIX = '/guias/';

  var originalTitle = document.title;
  var originalDescription = (function () {
    var tag = document.querySelector('meta[name="description"]');
    return tag ? tag.getAttribute('content') : '';
  })();

  function updateMetaDescription(content) {
    var tag = document.querySelector('meta[name="description"]');
    if (!tag) return;
    tag.setAttribute('content', content);
  }

  function openModal(modal) {
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
    var existingFaq = document.getElementById('faqJsonLd');
    if (existingFaq) existingFaq.remove();
    var existingGuide = document.getElementById('guideJsonLd');
    if (existingGuide) existingGuide.remove();
    document.title = originalTitle;
    updateMetaDescription(originalDescription);
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path.indexOf(GUIA_PATH_PREFIX) === 0) {
      history.pushState({}, '', '/comunidad');
    }
  }

  function openGuide(slug) {
    var guide = GUIDES[slug];
    var modal = document.getElementById('guiaModal');
    if (!guide || !modal) return;

    var titleEl = modal.querySelector('.guia-modal-title');
    var bodyEl = modal.querySelector('.guia-modal-body');
    if (titleEl) titleEl.textContent = guide.title;
    if (bodyEl) {
      bodyEl.innerHTML = guide.html;
      bodyEl.scrollTop = 0;
    }

    initAccordion(bodyEl);
    injectFaqJsonLd(guide.title);
    injectGuideJsonLd(guide);

    if (guide.metaTitle) document.title = guide.metaTitle;
    if (guide.metaDescription) updateMetaDescription(guide.metaDescription);

    openModal(modal);
  }

  function initAccordion(container) {
    var items = container.querySelectorAll('.guia-faq-item');
    items.forEach(function (item) {
      var btn = item.querySelector('.guia-faq-question');
      var answer = item.querySelector('.guia-faq-answer');
      if (!btn || !answer) return;
      btn.addEventListener('click', function () {
        var isOpen = item.classList.contains('open');
        items.forEach(function (other) { other.classList.remove('open'); });
        if (!isOpen) item.classList.add('open');
      });
    });
  }

  function injectGuideJsonLd(guide) {
    var existing = document.getElementById('guideJsonLd');
    if (existing) existing.remove();
    if (!guide.jsonLd) return;

    var script = document.createElement('script');
    script.type = 'application/ld+json';
    script.id = 'guideJsonLd';
    script.textContent = JSON.stringify(guide.jsonLd);
    document.head.appendChild(script);
  }

  function injectFaqJsonLd(guideTitle) {
    var existing = document.getElementById('faqJsonLd');
    if (existing) existing.remove();

    var faqEntities = FAQ_DATA.map(function (item) {
      return {
        '@type': 'Question',
        name: item.q,
        acceptedAnswer: { '@type': 'Answer', text: item.a }
      };
    });

    var script = document.createElement('script');
    script.type = 'application/ld+json';
    script.id = 'faqJsonLd';
    script.textContent = JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'FAQPage',
      mainEntity: faqEntities
    });
    document.head.appendChild(script);
  }

  function handleDeepLink() {
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path.indexOf(GUIA_PATH_PREFIX) === 0) {
      var slug = path.substring(GUIA_PATH_PREFIX.length);
      if (GUIDES[slug]) openGuide(slug);
    }
  }

  function initGuias() {
    var modal = document.getElementById('guiaModal');
    if (!modal) return;

    var body = document.getElementById('guiasBody');
    if (body) {
      var html = '';
      var keys = Object.keys(GUIDES);
      for (var i = 0; i < keys.length; i++) {
        var slug = keys[i];
        var guide = GUIDES[slug];
        html +=
          '<a class="guia-card" href="/guias/' + slug + '" data-guia="' + slug + '">' +
            '<span class="guia-card-icon">' + guide.icon + '</span>' +
            '<span class="guia-card-title">' + guide.title + '</span>' +
            '<span class="guia-card-arrow">→</span>' +
          '</a>';
      }
      body.innerHTML = html;
      body.classList.add('guias-populated');

      body.querySelectorAll('[data-guia]').forEach(function (card) {
        card.addEventListener('click', function (e) {
          e.preventDefault();
          var slug = card.getAttribute('data-guia');
          history.pushState({}, '', '/guias/' + slug);
          openGuide(slug);
        });
      });
    }

    var closeBtn = modal.querySelector('.guia-modal-close');
    var acceptBtn = modal.querySelector('.guia-modal-accept');
    var backdrop = modal;

    if (closeBtn) closeBtn.addEventListener('click', function () { closeModal(modal); });
    if (acceptBtn) acceptBtn.addEventListener('click', function () { closeModal(modal); });
    backdrop.addEventListener('click', function (e) {
      if (e.target === backdrop) closeModal(modal);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('open')) closeModal(modal);
    });

    window.addEventListener('popstate', function () { handleDeepLink(); });

    handleDeepLink();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGuias);
  } else {
    initGuias();
  }
})();
