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

  var TOS_META = {
    title: 'Términos de Servicio — CoRe Legacy | Servidor privado de WoW WotLK 3.3.5a',
    description: 'Términos de Servicio de CoRe Legacy, servidor privado de World of Warcraft (WoW) Wrath of the Lich King 3.3.5a. Reglas de cuenta, código de conducta, donaciones voluntarias, continuidad del servicio y derechos de la administración.'
  };

  var PRIVACY_META = {
    title: 'Política de Privacidad — CoRe Legacy | Protección de datos en servidor WoW',
    description: 'Política de Privacidad de CoRe Legacy, servidor privado de World of Warcraft (WoW) WotLK 3.3.5a. Qué datos recopilamos, cómo los protegemos, uso de cookies y tus derechos como usuario.'
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

  function openModalByName(name) {
    var modal = name === 'tos' ? document.getElementById('legalTosModal')
              : name === 'privacy' ? document.getElementById('legalPrivacyModal')
              : null;
    var meta = name === 'tos' ? TOS_META
             : name === 'privacy' ? PRIVACY_META
             : null;
    if (modal) openModal(modal, meta);
  }

  function handleDeepLink() {
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path === '/terminos-de-servicio') openModalByName('tos');
    else if (path === '/politica-de-privacidad') openModalByName('privacy');
  }

  function closeModal(modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
    document.title = originalTitle;
    updateMetaDescription(originalDescription);
    var path = window.location.pathname.replace(/\/+$/, '');
    if (path === '/terminos-de-servicio' || path === '/politica-de-privacidad') {
      history.pushState({}, '', '/');
    }
  }

  function initLegal() {
    var tosModal = document.getElementById('legalTosModal');
    var privacyModal = document.getElementById('legalPrivacyModal');
    if (!tosModal || !privacyModal) return;

    var tosBody = tosModal.querySelector('.legal-modal-body');
    var privacyBody = privacyModal.querySelector('.legal-modal-body');

    if (tosBody) tosBody.innerHTML = TOS_HTML;
    if (privacyBody) privacyBody.innerHTML = PRIVACY_HTML;

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

    [tosModal, privacyModal].forEach(function (modal) {
      var closeBtn = modal.querySelector('.legal-modal-close');
      var acceptBtn = modal.querySelector('.legal-modal-accept');
      var backdrop = modal.querySelector('.legal-modal-backdrop');

      if (closeBtn) closeBtn.addEventListener('click', function () { closeModal(modal); });
      if (acceptBtn) acceptBtn.addEventListener('click', function () { closeModal(modal); });
      if (backdrop) backdrop.addEventListener('click', function (e) {
        if (e.target === backdrop) closeModal(modal);
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        if (tosModal.classList.contains('open')) closeModal(tosModal);
        if (privacyModal.classList.contains('open')) closeModal(privacyModal);
      }
    });

    handleDeepLink();

    window.addEventListener('popstate', function () {
      if (tosModal.classList.contains('open')) closeModal(tosModal);
      if (privacyModal.classList.contains('open')) closeModal(privacyModal);
      handleDeepLink();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLegal);
  } else {
    initLegal();
  }
})();
