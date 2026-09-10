(function () {
  'use strict';

  var GUIDES = {
    'guia-de-descarga-e-inicio-rapido': {
      title: 'Guía de Descarga e Inicio Rápido',
      icon: '📥',
      metaTitle: 'Guía para descargar WoW WotLK 3.3.5a | CoRe Legacy',
      metaDescription: 'Descarga el cliente de WoW WotLK 3.3.5a de CoRe Legacy con Vulkan y parche 4K preinstalados. Descomprime el archivo y empieza a jugar sin instalación.',
      html:
        '<section class="guia-intro">' +
          '<p>¡Bienvenido! Empezar a jugar con nosotros es muy sencillo. Sigue estos rápidos pasos y estarás en el juego en cuestión de minutos.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">1. Descarga el Juego</h2>' +
          '<p>Puedes descargar nuestro cliente completo directamente y a la máxima velocidad desde nuestros servidores dedicados.</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Ve a la <strong>Página de Inicio</strong> de nuestro sitio web.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Haz clic en el botón principal de <strong>Descargar Juego</strong>.</p>' +
          '<p class="guia-note"><em>Nota: La descarga es directa, sin intermediarios.</em></p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">2. Preparación (¡No requiere instalación!)</h2>' +
          '<p>Nuestro cliente viene <strong>"Ready to Play"</strong> (Listo para jugar). No necesitas instalar nada complicado.</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Una vez finalizada la descarga, localiza el archivo comprimido (normalmente en tu carpeta de Descargas).</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Descomprime el archivo en la ubicación que prefieras de tu disco duro (por ejemplo, en <strong>C:\\Core Legacy</strong>).</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">3. ¡A Jugar!</h2>' +
          '<p>Si ya has creado tu cuenta en nuestra página web, ¡estás listo!</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Abre la carpeta donde descomprimiste el juego.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Haz doble clic en el archivo <strong>Wow.exe</strong>.</p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Ingresa con tu nombre de cuenta y contraseña, ¡y disfruta de la aventura!</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">¿Por qué nuestro cliente es especial?</h2>' +
          '<p>Hemos preparado este cliente pensando en la estabilidad y el máximo rendimiento. Por defecto, ya incluye:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Optimización Vulkan:</strong> Experimenta un rendimiento superior, mayor fluidez y mejores FPS.</li>' +
            '<li><strong>Parche 4K (4k patch):</strong> Soluciona el famoso error #132 del juego (muy común al pasar por zonas con muchos jugadores) permitiendo que el cliente utilice hasta 4 GB de RAM. <em>(Nota: Esta versión está pensada para el rendimiento clásico y no incluye gráficos o texturas HD).</em></li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Preguntas Frecuentes (FAQ)</h2>' +
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
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>6. Le doy a ejecutar Wow.exe y el juego no se abre, ¿qué hago?</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Este problema se debe a tarjetas gráficas antiguas sin soporte Vulkan. Si tu tarjeta gráfica no admite drivers de Vulkan, bastará con retirar los archivos de <strong>DXVK</strong> (<strong>d3d9.dll</strong> y <strong>dxgi.dll</strong>) de la carpeta raíz del juego para que vuelva a ejecutarse mediante el renderizador <strong>DirectX 9 nativo</strong>.</p></div>' +
            '</div>' +
          '</div>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>'
    },
    'requisitos-de-hardware': {
      title: 'Requisitos de Hardware',
      icon: '🖥️',
      metaTitle: 'Requisitos para WoW WotLK 3.3.5a | CoRe Legacy',
      metaDescription: 'Requisitos mínimos y recomendados para jugar WoW WotLK 3.3.5a en CoRe Legacy: CPU, RAM, GPU con Vulkan, almacenamiento y conexión.',
      html:
        '<section class="guia-intro">' +
          '<p>Antes de lanzarte a la aventura, asegúrate de que tu equipo cumple con los requisitos mínimos para disfrutar de CoRe Legacy sin problemas. A continuación tienes una tabla con los requisitos mínimos operativos y los recomendados para una experiencia óptima.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Tabla de Requisitos</h2>' +
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
          '<h2 class="guia-step-title">Tarjetas gráficas antiguas sin soporte Vulkan</h2>' +
          '<p>Si un jugador cuenta con una tarjeta gráfica muy antigua que no admita drivers de Vulkan, bastará con retirar los archivos de <strong>DXVK</strong> (<strong>d3d9.dll</strong> y <strong>dxgi.dll</strong>) de la carpeta raíz para que el juego vuelva a ejecutarse mediante el renderizador <strong>DirectX 9 nativo</strong>.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Conexión a internet</h2>' +
          '<p>CoRe Legacy es un juego en línea multijugador masivo (MMORPG), por lo que es <strong>imprescindible disponer de una conexión a internet activa y estable</strong> para poder jugar. Sin conexión no es posible iniciar sesión ni acceder al mundo del juego.</p>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>',
      jsonLd: {
        '@context': 'https://schema.org',
        '@type': 'VideoGame',
        name: 'World of Warcraft (WoW): Wrath of the Lich King (WotLK) en CoRe Legacy',
        description: 'Servidor privado de World of Warcraft: Wrath of the Lich King 3.3.5a con inteligencia artificial, PvE, PvP y mundo vivo. Requisitos mínimos: Windows 7 SP1 64-bit, Dual Core 2.0 GHz, 2 GB RAM, GPU compatible con Vulkan 1.1+, 16 GB almacenamiento y conexión a internet activa.',
        url: 'https://corelegacy.gg/guias/requisitos-de-hardware',
        image: 'https://corelegacy.gg/assets/logotipo_corelegacy.webp',
        inLanguage: 'es-ES',
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
    'guia-playerbots-ia-wow-wotlk-solitario': {
      title: 'Guía Definitiva de Playerbots: Cómo Jugar WoW WotLK en Solitario con IA',
      icon: '🤖',
      metaTitle: 'Playerbots IA en WoW WotLK 3.3.5a | CoRe Legacy',
      metaDescription: 'Configura Playerbots con IA en CoRe Legacy: comandos, roles, estrategias y cómo superar mazmorras y bandas de WoW WotLK 3.3.5a.',
      html:
        '<section class="guia-intro">' +
          '<p>¿Alguna vez has querido explorar todo el contenido de Northrend pero no tenías un grupo disponible? En CoRe Legacy, el mejor servidor wow para jugar en solitario 3.3.5a, la falta de jugadores ya no es un obstáculo. Gracias a nuestro sistema avanzado de bots Azerothcore, puedes reclutar tu propio escuadrón y dominar Azeroth a tu ritmo.</p>' +
          '<p>En esta guía SEO optimizada, te enseñaremos cómo aprender a jugar WoW 3.3.5a solo con compañeros controlados por IA, desde la configuración básica hasta estrategias avanzadas para limpiar las bandas más difíciles sin depender de terceros.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">¿Qué son los Playerbots IA y por qué revolucionan el PvE?</h2>' +
          '<p>En CoRe Legacy, los bots no son simples scripts de seguimiento. Hablamos de NPCs impulsados por inteligencia artificial diseñados para simular de forma realista el comportamiento, los errores y los aciertos de jugadores humanos. Al aventurarte en nuestro servidor privado wow 3.3.5a npc con inteligencia artificial, tus compañeros:</p>' +
          '<ul class="guia-list">' +
            '<li>Ejecutan rotaciones de daño y curación óptimas analizando el estado del combate en tiempo real.</li>' +
            '<li>Tienen programación de bots que hacen mecánicas de bosses WotLK, apartándose del fuego y cambiando de objetivo cuando es necesario.</li>' +
            '<li>Cuentan con un cerebro propio, convirtiéndonos en el primer servidor WoW IA modelo de lenguaje integrado, lo que permite una interacción profunda y dinámica.</li>' +
          '</ul>' +
          '<p>Ya sea para subir de nivel con bots en wow wrath of the lich king o farmear reputaciones complejas, tu grupo de compañeros IA para misiones y farmeo WoW está siempre listo.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">El Cerebro del Grupo: Servidor WoW WotLK con Chat Interactivo</h2>' +
          '<p>Lo que realmente separa a CoRe Legacy del resto es nuestra integración de IA conversacional. No solo les das órdenes de combate; puedes hablar con ellos.</p>' +
          '<p>Disfruta de un chat de rol inmersivo con bots WoW WotLK. Escríbeles por el canal de grupo (<code>/p</code>) o mediante susurros (<code>/w</code>). El modelo de lenguaje interpretará tus palabras, responderá acorde a la raza y clase del bot, y te dará consejos tácticos. Si les preguntas "¿Queda mucho maná?" o "¡Cuidado con el jefe!", la IA procesará el contexto de la mazmorra y te responderá de forma natural, haciendo de este servidor wow wotlk chat interactivo con npcs la experiencia más inmersiva del panorama actual.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Comandos Esenciales para Controlar Playerbots WotLK</h2>' +
          '<p>Para comunicarte rápidamente en combate, hemos simplificado los comandos para controlar playerbots wotlk. Puedes escribirlos en el chat o utilizarlos en tus macros y scripts para bots azerothcore 3.3.5a.</p>' +
          '<p>Saber configurar la inteligencia artificial de playerbots WotLK empieza por estos atajos:</p>' +
          '<div class="guia-table-wrap">' +
            '<table class="guia-table">' +
              '<thead>' +
                '<tr>' +
                  '<th scope="col">Comando Básico</th>' +
                  '<th scope="col">Función de la IA</th>' +
                  '<th scope="col">Cuándo Utilizarlo</th>' +
                '</tr>' +
              '</thead>' +
              '<tbody>' +
                '<tr>' +
                  '<th scope="row"><code>.bot add [Nombre]</code></th>' +
                  '<td>El bot acepta instantáneamente la invitación.</td>' +
                  '<td>Para armar tu grupo antes de entrar a una mazmorra.</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row"><code>.bot remove [Nombre]</code></th>' +
                  '<td>Disuelve el vínculo con la IA.</td>' +
                  '<td>Si necesitas cambiar la composición de clases de tu equipo.</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row"><code>.bot stay</code></th>' +
                  '<td>Fuerza a los bots a ignorar su script de movimiento.</td>' +
                  '<td>Ideal para evitar áreas de daño (AoE) o emboscadas mortales.</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row"><code>.bot follow</code></th>' +
                  '<td>La IA reanuda el seguimiento del líder.</td>' +
                  '<td>Tras finalizar un combate, revivir o reposicionarte.</td>' +
                '</tr>' +
                '<tr>' +
                  '<th scope="row"><code>.bot attack</code></th>' +
                  '<td>Sobrescribe el objetivo actual de la IA.</td>' +
                  '<td>Para el pulling controlado o hacer focus de daño masivo.</td>' +
                '</tr>' +
              '</tbody>' +
            '</table>' +
          '</div>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">IA por Roles: Formando el Escuadrón Perfecto</h2>' +
          '<p>Para jugar mazmorras wotlk en solitario con bots y no morir en el intento, necesitas entender cómo nuestra IA procesa cada rol:</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Tanques: El Escudo Inteligente</h3>' +
          '<p>Los Guerreros, Paladines y usuarios con talentos caballero de la muerte tanque wotlk 3.3.5 están programados para mantener la amenaza (agro) en múltiples objetivos. Usarán sus habilidades defensivas (cooldowns) si prevén daño letal o su salud cae por debajo del 30%.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Sanadores: IA Reactiva</h3>' +
          '<p>Los healers gestionan su maná inteligentemente. Priorizan la salud del tanque y disipan perjuicios críticos (magias, maldiciones) en milisegundos, una ventaja que convierte hacer mazmorras heroicas wotlk con grupo de bots en una experiencia fluida.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">DPS: Daño Automatizado</h3>' +
          '<p>Los atacantes ejecutan rotaciones perfectas basadas en las mejores guías de clase wotlk 3.3.5a pve español. Magos, brujos y pícaros asisten con interrupciones (kicks) instantáneas cuando un enemigo lanza un hechizo peligroso.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Endgame IA: Hacer Bandas WotLK solo con Compañeros</h2>' +
          '<p>El mayor logro en CoRe Legacy es la progresión PvE en solitario servidor WoW WotLK. ¿Es posible limpiar ICC? Sí, pero la simulación de jugadores reales en servidor privado WoW requiere que lideres como un verdadero Raid Leader.</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Posicionamiento Táctico:</strong> Usa el comando <code>.bot stay</code> para dejar a tus rangos a 30 metros del jefe, evitando ataques de cono frontal.</li>' +
            '<li><strong>Gestión del Control de Masas:</strong> Marca enemigos con iconos (Calavera, Cruz). La IA reconoce estas marcas para enfocar el daño o aplicar Polimorfia.</li>' +
            '<li><strong>Equipamiento Estratégico:</strong> La IA es tan fuerte como su equipo. Fármea para mejorar las estadísticas de armadura tier 10 wotlk 3.3.5a de tus bots.</li>' +
          '</ul>' +
          '<p>Con táctica y macros, matar al rey exánime 3.3.5a en solitario será la prueba definitiva de tu habilidad como comandante de IA.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Macros de Supervivencia PvE con Bots</h2>' +
          '<p>Mejora tu tiempo de reacción con estas macros útiles para pve pvp wow 3.3.5a:</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Macro de Ataque Coordinado (Focus IA)</h3>' +
          '<pre class="guia-code-block"><code>/targetenemy [noharm][dead]\n/cast [Tu Habilidad de Inicio]\n/say .bot attack</code></pre>' +
          '<p>Esta macro lanza tu ataque inicial y fuerza a la IA a priorizar de forma agresiva a ese mismo objetivo, ignorando a otros enemigos.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Macro de Retirada Táctica / Posición Segura</h3>' +
          '<pre class="guia-code-block"><code>/stopcasting\n/say .bot stay\n/yell ¡Mantengan la posición! ¡Cuidado con el área!</code></pre>' +
          '<p>Un salvavidas absoluto. Al incluir <code>/stopcasting</code>, tu personaje reacciona al instante. La IA se anclará al suelo, permitiéndote salvar a tus bots de ataques AoE letales de jefes de banda, o esconderlos detrás de una pared para romper la línea de visión de hechiceros enemigos. Un simple <code>.bot follow</code> los devolverá a la acción.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Únete a la Revolución de la IA en CoRe Legacy</h2>' +
          '<p>Experimenta la evolución de los servidores privados. Si estás buscando descargar cliente wow wotlk 3.3.5a español y sumergirte en un ecosistema vivo donde nunca estarás solo, únete hoy.</p>' +
          '<ul class="guia-list">' +
            '<li><a href="https://accounts.corelegacy.gg/crear-cuenta" target="_blank" rel="noopener noreferrer" class="guia-link">Crear cuenta servidor wow wotlk gratis</a></li>' +
            '<li><a href="https://discord.gg/9AJ23YwDV" target="_blank" rel="noopener noreferrer" class="guia-link">Únete a nuestro Discord servidor wow core legacy español</a></li>' +
            '<li><a href="https://accounts.corelegacy.gg" target="_blank" rel="noopener noreferrer" class="guia-link">Visita nuestra tienda de recompensas web servidor wow wotlk</a></li>' +
          '</ul>' +
          '<p class="guia-note"><em>CoRe Legacy: Tu mundo, tu escuadrón, la mejor inteligencia artificial.</em></p>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>'
    },
    'guia-practica-avanzada-multibot': {
      title: 'Guía Práctica y Avanzada de MultiBot',
      icon: '🎮',
      metaTitle: 'Addon MultiBot para WoW WotLK 3.3.5a | CoRe Legacy',
      metaDescription: 'Aprende a usar el addon MultiBot en CoRe Legacy para controlar altbots, equipo, talentos, misiones, combate y formaciones en WoW WotLK 3.3.5a sin líos.',
      html:
        '<section class="guia-intro">' +
          '<p>¡Bienvenido a la guía definitiva de MultiBot! Este addon es mucho más que una simple herramienta; es tu centro de mando personalizado para liderar a tus <strong>altbots</strong> (los personajes secundarios de tu cuenta que utilizas como compañeros controlados por la IA) de forma completamente visual e intuitiva.</p>' +
          '<p>Atrás quedaron los días de escribir largos, complejos y tediosos comandos de texto en la ventana de chat, intentando recordar la sintaxis exacta en medio de un combate intenso. Con esta interfaz, tendrás el poder de orquestar a tu grupo como si fueras un director de orquesta. Podrás gestionar su equipo, configurar intrincadas combinaciones de talentos, completar misiones en masa y ejecutar complejas estrategias de combate en tiempo real con solo unos clics.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">Descarga e Instalación</h2>' +
          '<p>¿Aún no tienes el addon? Puedes descargar la versión más reciente de MultiBot desde <a href="https://downloads.corelegacy.gg/MultiBot.zip" target="_blank" rel="noopener noreferrer" class="guia-link">este enlace directo</a>.</p>' +
          '<p>Una vez descargado:</p>' +
          '<ul class="guia-list">' +
            '<li>Extrae el contenido del archivo comprimido (ZIP o RAR).</li>' +
            '<li>Copia la carpeta extraída.</li>' +
            '<li>Pégala dentro de la carpeta de tu juego en la siguiente ruta: <code>World of Warcraft/Interface/AddOns/</code>.</li>' +
          '</ul>' +
          '<p class="guia-note"><em>Nota: Asegúrate de que la carpeta se llame exactamente <strong>MultiBot</strong> sin guiones ni terminaciones como "-master".</em></p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">1. Primeros Pasos: ¿Cómo abrir y configurar MultiBot?</h2>' +
          '<p>Una vez dentro de CoRe Legacy y con tu personaje principal en el mundo, puedes abrir la interfaz principal de MultiBot de varias maneras:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Mediante comandos de chat rápidos:</strong> Escribiendo <code>/mb</code>, <code>/mbot</code> o <code>/multibot</code> y pulsando Enter.</li>' +
            '<li><strong>El botón del minimapa:</strong> Haciendo clic izquierdo en el botón con forma de engranaje (o el ícono de MultiBot) que aparecerá en el borde de tu minimapa, podrás abrir o cerrar la interfaz en un segundo. Si haces clic derecho en este mismo botón, accederás directamente al panel de opciones avanzadas.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Personalizando tu Interfaz (Layouts)</h3>' +
          '<p>¿Sientes que la barra principal te tapa la visión? No hay problema.</p>' +
          '<p class="guia-note"><em>💡 Consejo Pro: Puedes hacer clic derecho (o Ctrl + Clic derecho, según tu configuración) en cualquier zona vacía de la barra principal de MultiBot y arrastrarla para moverla a la parte de la pantalla que te resulte más cómoda.</em></p>' +
          '<p>En las opciones avanzadas, puedes habilitar el <strong>Auto-ocultado</strong>: la barra desaparecerá cuando no la uses y reaparecerá al pasar el ratón. Además, si logras la configuración de ventanas perfecta (con el inventario por aquí, los talentos por allá), puedes guardar ese "Diseño" (Layout) y cargarlo en cualquiera de tus otros personajes.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">2. Encontrando, Conectando e Invitando a tus Bots</h2>' +
          '<p>Para jugar con tu ejército personal, primero debes despertarlos. MultiBot organiza a los personajes en diferentes "Listas" (Rosters) sumamente prácticas. Puedes alternar entre ellas desde el menú desplegable situado en la interfaz principal:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Grupo (Activos):</strong> Es tu lista principal durante el combate. Muestra únicamente a los bots que actualmente están formando grupo o banda contigo.</li>' +
            '<li><strong>Mis Bots:</strong> La sala de espera. Aquí verás absolutamente todos los personajes de tu cuenta, sin importar si están conectados o desconectados.</li>' +
            '<li><strong>Hermandad / Amigos:</strong> Muestra a los miembros de tu hermandad o lista de amigos. Los que estén online aparecerán primero.</li>' +
            '<li><strong>Favoritos:</strong> Si tienes 30 personajes pero solo juegas con un equipo de 5 habitual, puedes marcar a esos 4 bots con una estrella. Solo ellos aparecerán en este filtro, ahorrándote mucho tiempo.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">El Ciclo de Vida del Bot: Conectar y Desconectar</h3>' +
          '<p>El sistema visual te indica el estado de tus bots: si un bot está apagado (desconectado), su barra aparecerá colapsada y atenuada.</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Para Conectar un bot:</strong> Ve a "Mis Bots", busca a tu personaje y haz clic izquierdo sobre su nombre. Magia: el personaje entrará al servidor en un instante y su barra se expandirá, revelando todos sus controles.</li>' +
            '<li><strong>Para Desconectar un bot:</strong> Simplemente haz clic derecho sobre el nombre de un bot que esté conectado. Se desconectará de forma segura.</li>' +
            '<li><strong>Botón de Pánico / Ahorro de tiempo:</strong> En la barra principal verás un botón general de "Alianza". Haz clic izquierdo para conectar a todos tus bots de golpe, o clic derecho para desconectarlos a todos a la vez.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Invitación Rápida y Formación de Grupos</h3>' +
          '<p>Crear un grupo manualmente es cosa del pasado. En la barra principal verás botones dorados para crear grupos instantáneamente. Puedes pulsar los botones de <strong>Grupo de 5</strong>, <strong>Banda de 10</strong>, <strong>Banda de 25</strong> o <strong>Banda de 40</strong>. Al pulsar uno de estos botones, el addon buscará en tu lista actual, conectará a los bots necesarios de forma transparente, y los invitará automáticamente hasta llenar ese cupo.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">3. La Barra de Acciones del Bot (EveryBar)</h2>' +
          '<p>Cuando un bot ya está vivo y en tu grupo, verás una barra llena de pequeños iconos junto a su nombre. Esta barra, conocida como "EveryBar", es el corazón del control individual. Aquí detallamos las herramientas de las que dispones para cada personaje, sin tener que cerrar tu sesión para entrar en la suya:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>⚔️ Combate:</strong> Abre el núcleo táctico del bot. Aquí defines si actuará como Tanque, Sanador o DPS, y qué estrategias de clase utilizará (lo veremos a fondo en la sección 4).</li>' +
            '<li><strong>📖 Libro de Hechizos (Spellbook):</strong> Abre literalmente el libro de hechizos de tu bot. ¿Quieres que lance un bufo específico ahora mismo? Haz clic izquierdo en el hechizo. ¿Quieres crear una macro para tu propia barra de acción que haga que el bot lance ese hechizo? Haz clic derecho.</li>' +
            '<li><strong>🌳 Talentos:</strong> Un panel completo donde puedes ver su rama actual, aplicarle plantillas prefabricadas (ej. Paladín Protección PvE, Mago Fuego PvP) o cambiar entre su especialización principal y secundaria al instante.</li>' +
            '<li><strong>🎒 Inventario:</strong> Visualiza todas las mochilas del bot, incluyendo su llavero. Desde aquí puedes obligarle a equipar un objeto, usar una poción, o vender su basura gris al vendedor más cercano.</li>' +
            '<li><strong>🛡️ AutoGear (Auto-Equipar):</strong> Un botón salvavidas. El bot evaluará todos los objetos de sus bolsas basándose en el GearScore (puntuación de equipo) y estadísticas, y se equipará automáticamente las mejores piezas disponibles para su clase.</li>' +
            '<li><strong>🔧 Mantenimiento (Maintenance):</strong> ¿Estáis en la ciudad? Pulsa este botón. El bot buscará automáticamente a su entrenador de clase para aprender hechizos nuevos, reparará su equipo en el herrero más cercano, y comprará munición o consumibles básicos. Todo en un segundo.</li>' +
            '<li><strong>🌀 Invocar (Summon):</strong> Si un bot se queda atascado detrás de una roca, se cae por un precipicio o se pierde por el camino, pulsa este botón. Será teletransportado exactamente a tus coordenadas actuales.</li>' +
            '<li><strong>💀 Wipe (Reinicio forzado):</strong> Si un bot se "bugea" por completo (no ataca, no se mueve), este botón lo matará y lo resucitará de inmediato para reiniciar completamente su inteligencia artificial.</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">4. Estrategias de Combate, Sinergias y Pulls</h2>' +
          '<p>El verdadero poder de MultiBot reside en cómo combaten tus personajes. Un grupo mal configurado morirá rápidamente, pero uno bien configurado puede hacer frente a jefes de banda.</p>' +
          '<p>Haz clic en el botón de Combate (las espadas cruzadas) de cualquier bot para ver sus opciones. Estas opciones son dinámicas y cambian según la clase:</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Sinergias de Clase Específicas</h3>' +
          '<p>No te limites a marcar "DPS" y olvidarte. Explora las estrategias exclusivas de cada clase para maximizar tu eficiencia:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Caballero de la Muerte (DK):</strong> Puedes forzar en qué Presencia luchan (Sangre para curarse/tanquear, Escarcha, Profano) y dictar si su daño en área se centrará en enfermedades (Profano-AOE) o explosiones heladas (Escarcha-AOE).</li>' +
            '<li><strong>Druidas y Paladines (Los Híbridos):</strong> Puedes asignarles el rol de OffHeal (harán daño, pero si el grupo baja de vida, lanzarán curas de emergencia) o Healer-DPS (su prioridad total es curar, pero si todos están al 100% de vida, lanzarán hechizos dañinos para ayudar).</li>' +
            '<li><strong>Cazadores:</strong> Tienes un control total sobre la mascota (Invocar, abandonar, poner en Agresivo/Pasivo). Una estrategia brillante es el Trapweave: el cazador disparará desde lejos, pero correrá rápidamente al cuerpo a cuerpo para soltar una trampa explosiva cuando sea seguro, y volverá a su posición.</li>' +
            '<li><strong>Chamanes:</strong> Su panel te permite elegir exactamente qué 4 tótems plantarán en el suelo al iniciar el combate (ej. Tótem de tremor para jefes que asustan, Tótem de corriente de sanación para daño constante).</li>' +
            '<li><strong>Magos y Brujos:</strong> A los magos puedes activarles Firestarter para que busquen aperturas de combate con hechizos instantáneos. A los brujos les puedes dictar exactamente qué maldición mantener activa sobre el jefe (Elementos, Agonía, Debilidad) y qué demonio invocar.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Controlando el Inicio del Combate (El "Pull")</h3>' +
          '<p>Imagina que estás frente a un grupo de 5 élites en una mazmorra. Si todos atacan a lo loco, el sanador generará amenaza (aggro), los monstruos irán a por él y moriréis. Para eso sirve el menú Pull en tu barra principal:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Safe Pull (Pull Seguro):</strong> La estrategia recomendada. Los bots esperarán a que tú (o tu bot tanque) deis el primer golpe. No harán absolutamente nada hasta que el combate haya iniciado oficialmente, e incluso puedes configurar un Wait Time (Tiempo de espera) de 3 a 5 segundos. Esto permite que el Tanque acumule amenaza antes de que los DPS magos o pícaros empiecen a hacer daño masivo, evitando que les roben la atención de los enemigos.</li>' +
            '<li><strong>AoE Pack:</strong> Ideal para farmear o limpiar pasillos con enemigos débiles. En el momento en que inicies el ataque, todos los bots que tengan habilidades de área (Ventisca, Lluvia de Fuego, Torbellino) las usarán simultáneamente.</li>' +
            '<li><strong>Single Target:</strong> Fuerza a todos a usar solo daño a un objetivo (DPS-Assist), ideal para enfocar daño en un jefe sin despertar a enemigos cercanos accidentalmente.</li>' +
            '<li><strong>Íconos RTI (Marcas de objetivo):</strong> Pon una Calavera sobre un médico enemigo y una Cruz sobre el mago. A través del menú RTI de MultiBot, puedes ordenar que todos los DPS enfoquen a la Calavera inmediatamente.</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">5. Gestión Profunda del Inventario, Bancos y Botín</h2>' +
          '<p>Manejar el espacio de las mochilas de 5 o 10 personajes es el mayor reto del multiboxing, pero MultiBot lo automatiza.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">El Inventario Multibot</h3>' +
          '<p>Al abrir la ventana de inventario de un bot, puedes arrastrar objetos de sus bolsas directamente a tu ventana de comercio para pasártelos. Los modos rápidos en la parte superior del inventario incluyen:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Vender todo lo gris / vendible:</strong> Con el bot seleccionado cerca de un comerciante, un solo clic venderá toda su chatarra de forma segura (las llaves y la Piedra de Hogar están protegidas por código, es imposible que el bot las destruya o venda).</li>' +
            '<li><strong>Bancos:</strong> Si el bot está cerca de un banquero, puedes abrir su banco personal (o el Banco de Hermandad) desde su panel e indicarle qué objetos depositar para ahorrar espacio.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">El Sistema de Botín (Loot)</h3>' +
          '<p>En la barra principal, el botón Loot define la codicia de tu grupo. Puedes decirles que no despojen nada (ideal para que tú recojas todo lo valioso), que recojan solo basura gris para hacer oro pasivo, o "Desencantar", donde se quedarán las armaduras para que tu alter encantador las rompa más tarde.</p>' +
          '<p><strong>Maestro Despojador (LootMaster):</strong> Si pones el botín de la banda en Maestro Despojador, cada vez que caiga un objeto Épico, MultiBot abrirá una ventana emergente especial. En ella, verás el objeto y a tus bots candidatos. Lo revolucionario de esta ventana es que te muestra el GearScore de cada bot y te indica si el objeto es una mejora matemática para ellos. Puedes asignar el objeto al tanque que más lo necesita con un solo clic, e incluso guardar "Preferencias" para que el addon asigne automáticamente objetos idénticos en el futuro.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">6. Misiones y Profesiones: Sincronización Total</h2>' +
          '<p>Subir de nivel en grupo es un placer gracias a la sincronización de misiones. No tienes que iniciar sesión en cada cuenta para aceptar la misma misión de recoger 10 pieles de lobo.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Gestor de Misiones Globales</h3>' +
          '<ul class="guia-list">' +
            '<li><strong>Hablar y Aceptar:</strong> Selecciona al PNJ que da la misión (NPC) y haz clic en "Aceptar Misiones" en el panel de MultiBot. Todos tus bots interactuarán con el PNJ simultáneamente y aceptarán todas las misiones disponibles.</li>' +
            '<li><strong>Entregar:</strong> Funciona igual. Selecciona al PNJ, haz clic en entregar, y recibe las recompensas masivamente. Si la misión ofrece varias opciones de equipo como recompensa, el Reward Selector de la barra principal te ayudará a elegir la mejor pieza para cada bot según su clase.</li>' +
            '<li><strong>Compartir:</strong> Si tú aceptas una misión por tu cuenta, abre tu registro, usa el panel del addon y pulsa "Compartir" para forzar a tus bots a aceptarla sin rechistar.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Profesiones y Fabricación Dirigida</h3>' +
          '<p>Tus bots son tus artesanos personales. En su panel de profesiones puedes ver las recetas de tu Herrero, Sastre o Alquimista. Si tienes un bot Encantador en tu grupo, no necesitas darle tus armas. Utiliza el <strong>Servicio de encantamiento</strong>: el addon abre una ventana de comercio especial, tú pones tu espada épica en la casilla de "no intercambiar", seleccionas el encantamiento en el menú del bot, y este aplicará la magia directamente a tu arma.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">7. Formaciones Tácticas y Posicionamiento Avanzado</h2>' +
          '<p>El posicionamiento es la diferencia entre la vida y la muerte en el WoW. Los bots por defecto te siguen como patitos en fila, lo cual es terrible si un dragón escupe fuego en área hacia tu posición.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Formaciones de Movimiento</h3>' +
          '<p>Desde la barra principal, puedes forzar configuraciones geométricas:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Flecha / Escudo:</strong> Los bots tanques y cuerpo a cuerpo se colocan por delante de ti para interceptar enemigos, mientras que los lanzadores de hechizos y sanadores se quedan rezagados a tus espaldas en una posición protegida.</li>' +
            '<li><strong>Círculo:</strong> Todos los bots te rodean mirando hacia afuera, ideal para proteger a tu personaje (si eres el sanador) de enemigos que aparezcan por los flancos (como emboscadas de pícaros).</li>' +
            '<li><strong>Tank Face:</strong> Esta orden hace que el bot que tenga la atención (aggro) del jefe, gire inmediatamente al enemigo para que le dé la espalda al resto del grupo. Crucial para evitar ataques de barrido frontal o alientos de dragón.</li>' +
          '</ul>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Herramientas de Supervivencia: Dispersión y Huida (Flee)</h3>' +
          '<p><strong>Dispersión (Disperse):</strong> Haz clic para que los bots rompan su formación actual y se separen inmediatamente unos de otros en todas direcciones. Esta herramienta es vital para la supervivencia de tu grupo frente a mecánicas de jefes que exigen movimiento rápido. Por ejemplo: si el jefe lanza zonas de fuego (Void Zones) bajo los pies del grupo, o empieza a conjurar una Cadena de relámpagos que rebota e inflige un daño letal si tus personajes están pegados. Puedes ajustar la distancia exacta de esta separación (desde una sutil corrección de 1 yarda hasta un pánico de 100 yardas) para garantizar que nadie reciba daño colateral mientras reorganizas el combate de forma segura.</p>' +
          '<p><strong>Huida (Flee):</strong> ¿El tanque ha muerto y el jefe va a por la retaguardia? Abre el menú Flee y ordena solo a los Sanadores o a los Ranged (personajes a distancia) que salgan corriendo en dirección opuesta para salvarse, mientras los pícaros o guerreros se quedan intentando rascar los últimos puntos de daño.</p>' +
          '<h3 class="guia-step-title" style="font-size:1.05rem; margin-top:1.5rem;">Control Estratégico en Tiempo Real (RTSC)</h3>' +
          '<p>Esta es una característica avanzada para jugadores tácticos. Activa el RTSC en la barra principal. Esto te permite usar una bengala (similar a las áreas de efecto) para marcar un punto X en el suelo. Una vez marcado, puedes enviar órdenes precisas: "Mandar a todos los Sanadores y Magos a esas coordenadas exactas". Ellos correrán hasta la marca y se quedarán plantados allí, ideal para mantenerlos a salvo en terrenos elevados o detrás de pilares para evitar la línea de visión de las habilidades enemigas.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">8. Solución de Problemas Frecuentes</h2>' +
          '<p>Incluso a los mejores comandantes se les atasca la radio de vez en cuando. Si algo no funciona como debería, revisa estos puntos:</p>' +
          '<div class="guia-faq" id="guiaFaq">' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>El addon no carga o no responde al hacer clic</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Verifica la ruta de instalación. Es obligatorio que la carpeta se llame exactamente <strong>MultiBot</strong> (sin guiones ni números extra) y esté ubicada en tu ruta de <code>World of Warcraft/Interface/AddOns/</code>. Si el nombre de la carpeta tiene un "-master" al final (algo común al descargar de GitHub), debes borrarlo.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>No veo a mis personajes en la lista</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Asegúrate de estar en la pestaña correcta ("Mis Bots"). Haz clic derecho en el filtro para forzar una actualización profunda con el servidor. Verifica también que no tengas puesto accidentalmente un Filtro de Clase (por ejemplo, buscar Brujos cuando solo tienes Guerreros).</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>Las estrategias de combate no se aplican (Los bots no hacen caso)</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Esto significa que hay un problema de conexión temporal con el sistema central del servidor (conocido como el "Bridge"). Normalmente se soluciona reiniciando la inteligencia de los bots. Usa el botón Reset Bots o dales un Wipe desde su menú individual para forzar su reinicio.</p></div>' +
            '</div>' +
            '<div class="guia-faq-item">' +
              '<button class="guia-faq-question" type="button">' +
                '<span>¡Sigo viendo mensajes de texto de los bots en el chat de grupo o susurros!</span>' +
                '<span class="guia-faq-icon">+</span>' +
              '</button>' +
              '<div class="guia-faq-answer"><p>Esto es completamente normal y no significa que el addon esté fallando. Aunque MultiBot fue diseñado específicamente para transformar tu experiencia en algo casi 100% visual y libre de comandos manuales, el sistema central del servidor en el que se basa (conocido históricamente como Playerbots) originalmente funcionaba de forma exclusiva a través de texto escrito. Por lo tanto, el servidor inteligente a veces sigue utilizando estos mensajes de chat como un sistema de respaldo o como "alertas de estado" orgánicas para informarte de eventos críticos que requieren tu atención urgente como líder del grupo. Ejemplos prácticos: es muy común que leas a tus bots avisándote por el chat de grupo diciendo "Me estoy quedando sin maná", si a tu cazador se le acabaron las flechas y susurra "No puedo atacar", si sus mochilas están completamente llenas al intentar despojar botín, o si te avisan de que no pueden curarte porque estás fuera de su línea de visión. En lugar de ver esto como un error del addon, considéralo como un canal de comunicación táctica inmersivo de tu equipo, como si realmente hablaran por radio. Si en algún momento sientes que la cantidad de texto es excesiva durante un combate de banda grande (40 bots hablando a la vez), recuerda que siempre puedes configurar una pestaña de chat separada en la interfaz predeterminada de WoW para agrupar los mensajes del grupo, o usar las "Opciones" en la barra principal de MultiBot para ajustar los límites de "Mensajes por segundo", manteniendo tu ventana de chat principal limpia y libre de spam.</p></div>' +
            '</div>' +
          '</div>' +
        '</section>' +
        '<p class="guia-footer">¡Nos vemos dentro del juego!</p>'
    },
    'guia-addon-dungeonclear': {
      title: 'Guía de Uso del Addon: DungeonClear',
      icon: '🤖',
      metaTitle: 'Addon DungeonClear para WoW WotLK 3.3.5a | CoRe Legacy',
      metaDescription: 'Usa DungeonClear en CoRe Legacy para controlar un bot tanque que limpia mazmorras: instalación, interfaz, combate y comandos paso a paso.',
      html:
        '<section class="guia-intro">' +
          '<p>El addon <strong>DungeonClear</strong> es una interfaz gráfica integrada en el juego diseñada para controlar de forma sencilla a un bot tanque dentro de una mazmorra. En lugar de escribir constantemente comandos en el chat, este addon te proporciona un panel para que el tanque limpie la mazmorra de forma autónoma: caminará de jefe en jefe, limpiará los enemigos en el camino (trash), esquivará obstáculos, recogerá botín, abrirá puertas y se recuperará de atascos.</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">1. Instalación y Preparación</h2>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Descarga el addon desde <a href="https://downloads.corelegacy.gg/DungeonClear.zip" target="_blank" rel="noopener noreferrer" class="guia-link">este enlace directo</a>.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Descomprime el archivo descargado directamente en la carpeta de addons de tu juego:</p>' +
          '<p class="guia-note"><code>World of Warcraft / Interface / AddOns /</code></p>' +
          '<p class="guia-note"><em>Nota: La carpeta ya viene nombrada correctamente como <strong>DungeonClear</strong>, por lo que no necesitas hacer ningún cambio adicional.</em></p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Inicia el juego y, en la pantalla de selección de personaje, asegúrate de activar el addon (marca la casilla "Cargar accesorios antiguos" o "Load out of date AddOns" en la esquina superior derecha si es necesario).</p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">2. Interfaz y Botones Principales</h2>' +
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
          '<h2 class="guia-step-title">3. Modos de Combate (Pull Modes)</h2>' +
          '<p>Puedes configurar cómo quieres que el tanque inicie los combates contra los grupos de enemigos (trash) en su camino a los jefes. Puedes cambiar esto antes de darle a "On".</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Dynamic (Dinámico - Por defecto):</strong> Decide la mejor estrategia grupo por grupo. Ataca de frente a los grupos sencillos a toda velocidad, y utiliza estrategias más defensivas para atraer hacia atrás a los grupos peligrosos o muy juntos. Es el modo más recomendado.</li>' +
            '<li><strong>Leeroy (Pull Off):</strong> El tanque caminará directo hacia cada grupo y peleará en el lugar. Es un modo muy rápido, pero sin margen de seguridad (ideal si tienes mucho más nivel o equipo que la mazmorra).</li>' +
            '<li><strong>Advanced (Pull On):</strong> El tanque atraerá a todos los enemigos hacia una posición segura (campamento) antes de luchar. Es un modo lento y cuidadoso, ideal para mazmorras difíciles o bandas (raids).</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">4. Estado y Lista de Jefes</h2>' +
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
          '<h2 class="guia-step-title">5. El Modo Reducido (Tiny Mode)</h2>' +
          '<p>Al presionar el botón <strong>Tiny</strong>, el panel se convierte en una sola línea fácil de colocar en cualquier esquina de tu pantalla. Desde esta pequeña barra puedes:</p>' +
          '<ul class="guia-list">' +
            '<li><strong>Clic izquierdo en el punto de estado:</strong> Iniciar la ruta, pausarla o reanudarla.</li>' +
            '<li><strong>Clic izquierdo en el punto de modo (Pull):</strong> Alternar rápidamente entre los modos Dinámico, Leeroy o Avanzado.</li>' +
            '<li><strong>Clic derecho en la barra:</strong> Volver a expandir la ventana a su tamaño original.</li>' +
            '<li><strong>Arrastrar:</strong> Mover la barra por la pantalla.</li>' +
          '</ul>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">6. Configuración Avanzada (Settings)</h2>' +
          '<p>El servidor tiene valores por defecto, pero puedes ajustar cómo se comporta tu tanque de forma personal:</p>' +
          '<p class="guia-substep"><strong>Paso 1:</strong> Presiona <strong>Escape</strong> para abrir el Menú del Juego.</p>' +
          '<p class="guia-substep"><strong>Paso 2:</strong> Ve a <strong>Interfaz → AddOns → DungeonClear → Settings</strong>.</p>' +
          '<p class="guia-substep"><strong>Paso 3:</strong> Aquí podrás ajustar opciones mediante deslizadores, como la calidad mínima para recoger botín, cuánto puede el tanque alejar a los enemigos, a qué distancia atrae al jefe, etc.</p>' +
          '<p class="guia-note"><em>Nota: Estos ajustes se guardan por personaje y se aplican automáticamente en tus propias rutas sin afectar a las configuraciones globales del servidor ni a otros jugadores.</em></p>' +
        '</section>' +
        '<section class="guia-section">' +
          '<h2 class="guia-step-title">7. Comandos Rápidos de Chat</h2>' +
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
    },
    {
      q: '6. Le doy a ejecutar Wow.exe y el juego no se abre, ¿qué hago?',
      a: 'Este problema se debe a tarjetas gráficas antiguas sin soporte Vulkan. Si tu tarjeta gráfica no admite drivers de Vulkan, bastará con retirar los archivos de DXVK (d3d9.dll y dxgi.dll) de la carpeta raíz del juego para que vuelva a ejecutarse mediante el renderizador DirectX 9 nativo.'
    }
  ];

  var GUIA_PATH_PREFIX = '/guias/';

  var originalTitle = document.title;
  var originalDescription = (function () {
    var tag = document.querySelector('meta[name="description"]');
    return tag ? tag.getAttribute('content') : '';
  })();
  var originalCanonical = (function () {
    var tag = document.querySelector('link[rel="canonical"]');
    return tag ? tag.getAttribute('href') : '';
  })();

  function updateMetaDescription(content) {
    var tag = document.querySelector('meta[name="description"]');
    if (!tag) return;
    tag.setAttribute('content', content);
  }

  function updateCanonical(href) {
    var tag = document.querySelector('link[rel="canonical"]');
    if (!tag) return;
    tag.setAttribute('href', href);
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
    updateCanonical(originalCanonical);
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
    if (slug === 'guia-de-descarga-e-inicio-rapido') injectFaqJsonLd();
    injectGuideJsonLd(guide);

    if (guide.metaTitle) document.title = guide.metaTitle;
    if (guide.metaDescription) updateMetaDescription(guide.metaDescription);
    updateCanonical('https://corelegacy.gg' + GUIA_PATH_PREFIX + slug);

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

  function injectFaqJsonLd() {
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
