(function () {
  'use strict';

  var TOS_HTML = '\
    <div class="legal-important">\
      <p class="legal-important-title">Por favor, lee esto atentamente:</p>\
      <p>Al registrar una cuenta, acceder o interactuar con el servidor CoRe Legacy y sus servicios asociados (sitio web, foro, Discord, etc.), aceptas de manera incondicional estar sujeto a los presentes Términos del Servicio. Si no estás de acuerdo con alguna de estas pautas, te solicitamos que te abstengas de utilizar nuestros servicios.</p>\
    </div>\
    <h3>1. Naturaleza del Proyecto y Exención de Responsabilidad</h3>\
    <p>CoRe Legacy es un proyecto educativo, de investigación y de emulación sin fines de lucro basado en la expansión <em>Wrath of the Lich King (v3.3.5a)</em> de World of Warcraft. <strong>No estamos afiliados, asociados, autorizados ni respaldados de ninguna manera por Blizzard Entertainment</strong> ni por ninguna de sus filiales. Todas las marcas comerciales, nombres de juegos e imágenes utilizadas pertenecen a sus respectivos propietarios legales. Este proyecto existe estrictamente bajo el propósito de preservar el software histórico y con fines comunitarios de desarrollo de código abierto.</p>\
    <h3>2. Elegibilidad y Registro de Cuentas</h3>\
    <p>Al crear una cuenta en nuestra plataforma, te comprometes a cumplir con las siguientes directrices esenciales:</p>\
    <ul>\
      <li><strong>Responsabilidad de la cuenta:</strong> Eres el único responsable de mantener la confidencialidad de tus credenciales de acceso. CoRe Legacy no se hará responsable por pérdidas de personajes, ítems o accesos debido a negligencias en la seguridad de tu contraseña o por compartir cuentas.</li>\
      <li><strong>Transacciones de dinero real (RMT):</strong> Está estrictamente prohibida la venta, compra o intercambio de cuentas, personajes, oro o ítems virtuales por dinero real. Cualquier intento detectado resultará en el baneo permanente de todas las cuentas involucradas.</li>\
    </ul>\
    <h3>3. Código de Conducta y Comportamiento</h3>\
    <p>Para garantizar una experiencia de juego justa y un ambiente sano para toda la comunidad, se imponen las siguientes reglas básicas de comportamiento:</p>\
    <ul>\
      <li><strong>Uso de Software de Terceros:</strong> El uso de trucos (hacks), programas de automatización (bots), scripts, exploits de texturas o cualquier modificación de software que otorgue una ventaja injusta sobre otros jugadores resultará en una suspensión inmediata y permanente.</li>\
      <li><strong>Comportamiento Comunitario:</strong> No se tolerará el acoso, lenguaje discriminatorio, racismo, difamación o toxicidad extrema en ninguno de nuestros canales de comunicación.</li>\
      <li><strong>Canales de Chat Oficiales:</strong> El uso de canales globales, especialmente el canal general de la comunidad (<code>/entrar Taberna</code> o <code>/join Taberna</code>), debe respetar las normas de convivencia y enfocarse en la organización de grupos, hermandades, comercio dentro del juego o debate sano. El spam o la alteración del orden de este canal conllevará sanciones acumulativas en el chat.</li>\
    </ul>\
    <h3>4. Donaciones Voluntarias e Incentivos</h3>\
    <p>El mantenimiento de la infraestructura técnica de CoRe Legacy (servidores dedicados, bases de datos, mitigación de ataques DDoS, copias de seguridad) es costoso. Los usuarios tienen la opción de realizar aportaciones económicas bajo las siguientes condiciones:</p>\
    <ul>\
      <li>Las donaciones son <strong>completamente voluntarias</strong> y no representan un requisito para experimentar el contenido del juego.</li>\
      <li>Al realizar una donación, comprendes que se trata de un acto de apoyo financiero al proyecto y que <strong>todas las donaciones son finales y no reembolsables</strong> bajo ninguna circunstancia.</li>\
      <li>Las recompensas o "puntos de tienda" otorgados son un gesto de agradecimiento de carácter virtual y de conveniencia (cosméticos, monturas, servicios de cuenta). No representan una compra de bienes reales y pueden ser modificados o retirados si el equilibrio del servidor lo requiere.</li>\
    </ul>\
    <h3>5. Continuidad del Servicio y Pérdida de Datos</h3>\
    <p>Dado que CoRe Legacy es un proyecto de emulación mantenido por voluntarios, <strong>no garantizamos la disponibilidad ininterrumpida del servicio técnico</strong>. Los servidores pueden experimentar caídas imprevistas, periodos de mantenimiento programado o pérdidas accidentales de datos debido a fallos de hardware o software. Al jugar aquí, aceptas que el personal no está obligado a indemnizar ni restaurar pérdidas de datos fortuitas ajenas a las herramientas internas de recuperación estándar.</p>\
    <h3>6. Modificación de los Términos y Derecho de Admisión</h3>\
    <p>El equipo de administración de CoRe Legacy se reserva el derecho exclusivo de modificar, expandir o recortar estos Términos del Servicio en cualquier momento. Las modificaciones entrarán en vigor inmediatamente tras su publicación en nuestros medios oficiales. Asimismo, nos reservamos el <strong>derecho de admisión</strong> y la potestad de suspender cualquier cuenta que actúe en perjuicio directo del proyecto o de su comunidad de manera reiterada.</p>\
    <p class="legal-footer-note">Última actualización: Junio de 2026</p>';

  var PRIVACY_HTML = '\
    <div class="legal-important">\
      <p class="legal-important-title">Compromiso de Privacidad:</p>\
      <p>En CoRe Legacy nos tomamos muy en serio la seguridad y la privacidad de nuestros jugadores. Esta Política de Privacidad describe de manera transparente qué datos recopilamos, cómo los tratamos y las medidas que tomamos para protegerlos dentro de nuestro entorno de emulación.</p>\
    </div>\
    <h3>1. Información que recopilamos</h3>\
    <p>Para poder ofrecer acceso al juego y gestionar la comunidad, solicitamos y registramos exclusivamente los datos estrictamente necesarios:</p>\
    <ul>\
      <li><strong>Datos de Registro de Cuenta:</strong> Nombre de usuario, dirección de correo electrónico y contraseña. <em style="color:#7f8c8d;">(Nota: Las contraseñas se almacenan de forma encriptada mediante algoritmos hash seguros y nunca son visibles para el personal del servidor).</em></li>\
      <li><strong>Datos de Conexión:</strong> Direcciones IP utilizadas durante el registro, el inicio de sesión en la web y la conexión al reino de juego.</li>\
      <li><strong>Registros de Juego (Logs):</strong> Historial de chat dentro del juego, acciones de personajes, transacciones comerciales (comercio de ítems/oro), y registros de combate. Estos datos son necesarios para resolver disputas, errores técnicos y detectar trampas.</li>\
      <li><strong>Datos de Donaciones:</strong> No recopilamos ni almacenamos información de tarjetas de crédito o cuentas bancarias. Todas las donaciones voluntarias se procesan a través de pasarelas de pago externas seguras (como PayPal o Stripe). Solo recibimos la confirmación del pago y el ID de transacción para asignar los puntos virtuales.</li>\
    </ul>\
    <h3>2. Uso de la Información</h3>\
    <p>Los datos recopilados se utilizan únicamente para los siguientes propósitos:</p>\
    <ul>\
      <li>Garantizar el correcto funcionamiento de tu cuenta de juego y permitirte el acceso a los reinos de CoRe Legacy.</li>\
      <li>Monitorear la seguridad del servidor, prevenir ataques informáticos (DDoS, fuerza bruta) y auditar infracciones a las reglas (como el uso de bots o hacks).</li>\
      <li>Recuperar cuentas en caso de pérdida de contraseña a través del correo electrónico vinculado.</li>\
      <li>Enviar notificaciones cruciales sobre el estado del servidor, mantenimiento programado o actualizaciones mayores (puedes darte de baja de los correos comunitarios en cualquier momento).</li>\
    </ul>\
    <h3>3. Almacenamiento y Protección de Datos</h3>\
    <p>Aplicamos medidas técnicas estándar de la industria para proteger tu información contra accesos no autorizados, alteraciones o destrucción. Las conexiones a nuestra plataforma web están cifradas mediante protocolos SSL/HTTPS. El acceso a las bases de datos de caracteres y cuentas está estrictamente restringido a los administradores principales del proyecto mediante credenciales de alta seguridad.</p>\
    <h3>4. Intercambio de Datos con Terceros</h3>\
    <p>CoRe Legacy <strong>no vende, alquila, comercializa ni transfiere bajo ningún concepto</strong> tus datos personales a terceras empresas o individuos externos. Al tratarse de un proyecto comunitario sin ánimo de lucro, no existen fines comerciales detrás de la recolección de tus datos.</p>\
    <h3>5. Uso de Cookies</h3>\
    <p>Nuestro sitio web y panel de usuario utilizan cookies técnicas esenciales. Estas son pequeños archivos de texto que se guardan en tu navegador para recordar tu sesión iniciada, tus preferencias de idioma y garantizar una navegación fluida. No utilizamos cookies de seguimiento publicitario ni de empresas de analítica externas que invadan tu privacidad.</p>\
    <h3>6. Derechos del Usuario (Modificación y Eliminación)</h3>\
    <p>Como usuario, tienes pleno derecho sobre la información que nos proporcionas:</p>\
    <ul>\
      <li>Puedes actualizar tu dirección de correo electrónico o cambiar tu contraseña en cualquier momento a través del panel de control de nuestra web.</li>\
      <li>Si deseas la <strong>eliminación total de tu cuenta</strong> y de todos los datos asociados de forma permanente, puedes solicitarlo abriendo un ticket de soporte oficial en nuestro canal de Discord o mediante el sistema de soporte web. Una vez procesada la solicitud, la cuenta y sus personajes se borrarán de la base de datos de manera irreversible.</li>\
    </ul>\
    <h3>7. Cambios en esta Política</h3>\
    <p>Nos reservamos el derecho de actualizar esta Política de Privacidad a medida que el proyecto CoRe Legacy evolucione o se añadan nuevas características web. Cualquier cambio se verá reflejado en esta página con su respectiva fecha de actualización.</p>\
    <p class="legal-footer-note">Última actualización: Junio de 2026</p>';

  var ABOUT_HTML = '\
    <h3>CoRe Legacy nace con un objetivo claro</h3>\
    <p>CoRe Legacy nace con un objetivo claro: recuperar la esencia de una de las etapas más recordadas de WoW CoRe y llevarla a una nueva dimensión.</p>\
    <p>Tras años de experiencia y después de haber formado parte del equipo que hizo historia en WoW CoRe, antiguos miembros del staff se han reunido nuevamente para poner en marcha un proyecto que busca recuperar aquella experiencia que marcó a toda una generación de jugadores.</p>\
    <p>Al frente del proyecto se encuentra <strong style="color:#d4af37;">Homenixx</strong>, antiguo administrador y una de las figuras vinculadas a aquella etapa, acompañado por antiguos integrantes del equipo que comparten una misma visión: crear un servidor que permita volver a disfrutar de la esencia de WoW CoRe, pero incorporando las posibilidades y mejoras que ofrecen las tecnologías actuales.</p>\
    <h3>El legado de WoW CoRe vuelve</h3>\
    <p>CoRe Legacy pretende ser mucho más que un servidor basado en el recuerdo.</p>\
    <p>La intención es recuperar la esencia, identidad y filosofía de juego que caracterizaron a WoW CoRe durante su denominada era dorada, ofreciendo a los antiguos jugadores la oportunidad de regresar a un mundo que muchos dejaron atrás, reencontrarse con viejos compañeros, amigos, rivales y aliados, y volver a vivir experiencias que forman parte de la historia de la comunidad.</p>\
    <p>Pero esta vez, el pasado se encuentra con el futuro.</p>\
    <p>El proyecto parte de aquella experiencia para construir algo nuevo, incorporando nuevas mecánicas, sistemas propios y numerosas mejoras de calidad de vida (QoL) destinadas a hacer que la experiencia de juego sea más cómoda, dinámica y atractiva sin perder la esencia que hizo especial a aquella época.</p>\
    <h3>Nuevas mecánicas y mejoras de calidad de vida</h3>\
    <p>Uno de los pilares de CoRe Legacy es evolucionar la experiencia de juego sin convertirla en algo completamente diferente.</p>\
    <p>El servidor incorpora nuevas mecánicas diseñadas para aportar profundidad y variedad al gameplay, junto con diferentes sistemas de Quality of Life (QoL) que buscan reducir tareas repetitivas, mejorar la accesibilidad de determinadas funciones y facilitar la interacción del jugador con el mundo.</p>\
    <p>La filosofía es sencilla: mantener aquello que funcionaba y mejorar aquello que la tecnología y la experiencia actual permiten mejorar.</p>\
    <p>De esta manera, CoRe Legacy pretende ofrecer una experiencia familiar para quienes vivieron WoW CoRe, pero suficientemente renovada para sorprender también a quienes descubran el proyecto por primera vez.</p>\
    <h3>Inteligencia Artificial: una nueva forma de vivir Azeroth</h3>\
    <p>Uno de los elementos más innovadores y diferenciales del proyecto es la incorporación de Inteligencia Artificial en un entorno como World of Warcraft.</p>\
    <p>La IA abre la puerta a nuevas posibilidades dentro de un MMORPG clásico: personajes y sistemas capaces de ofrecer interacciones más dinámicas, experiencias más personalizadas y nuevas formas de relacionarse con el mundo del juego.</p>\
    <p>La incorporación de esta tecnología supone un paso más allá de los sistemas tradicionales utilizados en servidores privados y plantea una pregunta interesante:</p>\
    <p style="font-style:italic;color:#8dd6f5;">¿Qué ocurre cuando la Inteligencia Artificial entra en Azeroth?</p>\
    <p>CoRe Legacy busca explorar precisamente ese territorio, utilizando las nuevas posibilidades tecnológicas para enriquecer la experiencia del jugador y crear situaciones que difícilmente podían plantearse durante la época original de WoW CoRe.</p>\
    <h3>Volver a encontrarse</h3>\
    <p>Más allá de las mecánicas y de la tecnología, CoRe Legacy tiene un componente especialmente importante: la comunidad.</p>\
    <p>Para muchos jugadores, WoW CoRe no fue simplemente un servidor. Fue el lugar donde conocieron a sus amigos, crearon hermandades, participaron en batallas, conquistaron territorios, compartieron noches de juego y construyeron recuerdos que permanecen muchos años después.</p>\
    <p>CoRe Legacy pretende recuperar precisamente esa sensación.</p>\
    <p>El reencuentro con antiguos jugadores y miembros de la comunidad constituye una parte fundamental de este nuevo capítulo. Viejos nombres, viejas alianzas y viejas rivalidades pueden volver a encontrarse en un Azeroth conocido, pero al mismo tiempo renovado.</p>\
    <h3>Un legado que mira hacia el futuro</h3>\
    <p>CoRe Legacy representa el encuentro entre nostalgia, experiencia y tecnología.</p>\
    <p>Es el intento de recuperar la esencia de una época considerada por muchos como la era dorada de WoW CoRe, pero sin limitarse a reproducir el pasado.</p>\
    <p>Antiguos miembros del equipo, encabezados por <strong style="color:#d4af37;">Homenixx</strong>, vuelven a ponerse al frente de un proyecto que busca demostrar que el legado de aquella comunidad todavía puede tener un futuro.</p>\
    <p>El mundo que conocimos puede volver a abrir sus puertas.</p>\
    <p>Los viejos amigos pueden volver a encontrarse.</p>\
    <p>Y esta vez, Azeroth contará con algo que nunca tuvo antes: Inteligencia Artificial.</p>\
    <p style="font-style:italic;color:#8dd6f5;">CoRe Legacy no pretende simplemente recordar la era dorada de WoW CoRe. Pretende construir su siguiente capítulo.</p>';

  var TOS_META = {
    title: 'Términos de Servicio — CoRe Legacy | Servidor privado de WoW WotLK 3.3.5a',
    description: 'Términos de Servicio de CoRe Legacy, servidor privado de World of Warcraft (WoW) Wrath of the Lich King 3.3.5a. Reglas de cuenta, código de conducta, donaciones voluntarias, continuidad del servicio y derechos de la administración.'
  };

  var PRIVACY_META = {
    title: 'Política de Privacidad — CoRe Legacy | Protección de datos en servidor WoW',
    description: 'Política de Privacidad de CoRe Legacy, servidor privado de World of Warcraft (WoW) WotLK 3.3.5a. Qué datos recopilamos, cómo los protegemos, uso de cookies y tus derechos como usuario.'
  };

  var ABOUT_META = {
    title: 'Sobre nosotros — CoRe Legacy | El legado de WoW CoRe vuelve',
    description: 'Conoce quiénes somos, de dónde venimos y hacia dónde va CoRe Legacy: un proyecto creado por antiguos miembros de WoW CoRe que une nostalgia, nuevas mecánicas, calidad de vida e inteligencia artificial.'
  };

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

  function openModal(modal, meta) {
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (meta) {
      document.title = meta.title;
      updateMetaDescription(meta.description);
    }
  }

  var MODAL_MAP = {
    tos:     { id: 'legalTosModal',     meta: TOS_META,     path: '/terminos-de-servicio' },
    privacy: { id: 'legalPrivacyModal', meta: PRIVACY_META, path: '/politica-de-privacidad' },
    about:   { id: 'legalAboutModal',   meta: ABOUT_META,   path: '/sobre-nosotros' }
  };

  function openModalByName(name) {
    var entry = MODAL_MAP[name];
    if (!entry) return;
    var modal = document.getElementById(entry.id);
    if (modal) openModal(modal, entry.meta);
  }

  function handleDeepLink() {
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path === '/terminos-de-servicio') openModalByName('tos');
    else if (path === '/politica-de-privacidad') openModalByName('privacy');
    else if (path === '/sobre-nosotros') openModalByName('about');
  }

  function closeModal(modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
    document.title = originalTitle;
    updateMetaDescription(originalDescription);
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path === '/terminos-de-servicio' || path === '/politica-de-privacidad' || path === '/sobre-nosotros') {
      history.pushState({}, '', '/');
    }
  }

  function initLegal() {
    var tosModal = document.getElementById('legalTosModal');
    var privacyModal = document.getElementById('legalPrivacyModal');
    var aboutModal = document.getElementById('legalAboutModal');
    if (!tosModal || !privacyModal) return;

    var tosBody = tosModal.querySelector('.legal-modal-body');
    var privacyBody = privacyModal.querySelector('.legal-modal-body');
    var aboutBody = aboutModal ? aboutModal.querySelector('.legal-modal-body') : null;

    if (tosBody) tosBody.innerHTML = TOS_HTML;
    if (privacyBody) privacyBody.innerHTML = PRIVACY_HTML;
    if (aboutBody) aboutBody.innerHTML = ABOUT_HTML;

    document.querySelectorAll('[data-legal="tos"]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        openModal(tosModal, TOS_META);
        history.pushState({ legal: 'tos' }, '', '/terminos-de-servicio');
      });
    });

    document.querySelectorAll('[data-legal="privacy"]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        openModal(privacyModal, PRIVACY_META);
        history.pushState({ legal: 'privacy' }, '', '/politica-de-privacidad');
      });
    });

    document.querySelectorAll('[data-legal="about"]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        if (aboutModal) {
          openModal(aboutModal, ABOUT_META);
          history.pushState({ legal: 'about' }, '', '/sobre-nosotros');
        }
      });
    });

    var allModals = [tosModal, privacyModal, aboutModal].filter(Boolean);

    allModals.forEach(function (modal) {
      var closeBtn = modal.querySelector('.legal-modal-close');
      var acceptBtn = modal.querySelector('.legal-modal-accept');
      if (closeBtn) closeBtn.addEventListener('click', function () { closeModal(modal); });
      if (acceptBtn) acceptBtn.addEventListener('click', function () { closeModal(modal); });
      modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal(modal);
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        allModals.forEach(function (modal) {
          if (modal.classList.contains('open')) closeModal(modal);
        });
      }
    });

    handleDeepLink();

    window.addEventListener('popstate', function () {
      allModals.forEach(function (modal) {
        if (modal.classList.contains('open')) closeModal(modal);
      });
      handleDeepLink();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLegal);
  } else {
    initLegal();
  }
})();
