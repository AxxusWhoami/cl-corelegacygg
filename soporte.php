<?php
require_once __DIR__ . '/params.php';
$turnstileKey = $TURNSTILE_SITE_KEY;
?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Centro de Soporte — CoRe Legacy</title>
  <meta name="description" content="Centro de Soporte de CoRe Legacy. Busca respuestas rápidas a tus dudas, abre un ticket con un MJ o reporta un bug. ¿En qué podemos ayudarte, héroe?" />
  <meta name="keywords" content="soporte core legacy, ayuda wow wotlk, ticket mj core legacy, reportar bug wow, preguntas frecuentes core legacy, soporte servidor privado wow, contacto core legacy, faq wow 3.3.5a" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="CoRe Legacy" />
  <meta name="publisher" content="CoRe Legacy" />
  <meta name="language" content="es-ES" />
  <meta name="revisit-after" content="7 days" />
  <meta name="theme-color" content="#050d18" />
  <link rel="canonical" href="https://corelegacy.gg/soporte" />
  <link rel="alternate" hreflang="es-ES" href="https://corelegacy.gg/soporte" />
  <link rel="alternate" hreflang="es-419" href="https://corelegacy.gg/soporte" />
  <link rel="alternate" hreflang="x-default" href="https://corelegacy.gg/soporte" />

  <meta property="og:title" content="Centro de Soporte — CoRe Legacy" />
  <meta property="og:description" content="Busca respuestas rápidas a tus dudas, abre un ticket con un MJ o reporta un bug. ¿En qué podemos ayudarte, héroe?" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://corelegacy.gg/soporte" />
  <meta property="og:site_name" content="CoRe Legacy" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:locale:alternate" content="es_419" />
  <meta property="og:image" content="https://corelegacy.gg/assets/corelegacy_og-fb_images.png" />
  <meta property="og:image:alt" content="CoRe Legacy — Centro de Soporte" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Centro de Soporte — CoRe Legacy" />
  <meta name="twitter:description" content="Busca respuestas rápidas a tus dudas, abre un ticket con un MJ o reporta un bug." />
  <meta name="twitter:image" content="https://corelegacy.gg/assets/corelegacy_og-fb_images.png" />
  <meta name="twitter:image:alt" content="CoRe Legacy — Centro de Soporte" />

  <link rel="preload" as="image" href="/assets/logotipo_corelegacy.webp" fetchpriority="high" />
  <link rel="preconnect" href="https://accounts.corelegacy.gg" />
  <link rel="dns-prefetch" href="https://www.googletagmanager.com" />
  <link rel="preconnect" href="https://www.googletagmanager.com" />
  <link rel="dns-prefetch" href="https://www.google-analytics.com" />
  <link rel="preconnect" href="https://www.google-analytics.com" crossorigin />
  <link rel="preconnect" href="https://challenges.cloudflare.com" crossorigin />
  <script defer src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=spTurnstileCallback" async defer></script>

  <script defer src="https://www.googletagmanager.com/gtag/js?id=G-29RVG4TWST"></script>
  <script defer>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-29RVG4TWST');
  </script>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Centro de Soporte — CoRe Legacy",
    "description": "Busca respuestas rápidas a tus dudas, abre un ticket con un MJ o reporta un bug. ¿En qué podemos ayudarte, héroe?",
    "url": "https://corelegacy.gg/soporte",
    "inLanguage": "es-ES",
    "isPartOf": { "@type": "WebSite", "name": "CoRe Legacy", "url": "https://corelegacy.gg/" }
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Inicio", "item": "https://corelegacy.gg/" },
      { "@type": "ListItem", "position": 2, "name": "Centro de Soporte", "item": "https://corelegacy.gg/soporte" }
    ]
  }
  </script>

  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="CoRe Legacy" />
  <link rel="manifest" href="/site.webmanifest" />

  <link rel="preload" href="/assets/tailwind.css" as="style" />
  <link rel="stylesheet" href="/assets/tailwind.css" />
  <link rel="stylesheet" href="/assets/core.css" />
  <style>
    .nav-link {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 0.8rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--ice-200);
      padding: 0.6rem 1.2rem;
      position: relative;
      transition: color 0.3s ease, text-shadow 0.3s ease;
      cursor: pointer;
      white-space: nowrap;
      text-decoration: none;
    }
    .nav-link:hover {
      color: var(--frost);
      text-shadow: 0 0 12px var(--ice-300);
      text-decoration: underline;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--ice-300), transparent);
      transition: width 0.3s ease, left 0.3s ease;
    }
    .nav-link:hover::after {
      width: 80%;
      left: 10%;
    }
    .nav-link.active {
      color: var(--frost);
      text-shadow: 0 0 12px var(--ice-300);
    }
    .nav-link.active::after {
      width: 80%;
      left: 10%;
    }

    .support-hero {
      position: relative;
      overflow: hidden;
      background-image: url('/public/hero-citadel.webp');
      background-size: cover;
      background-position: center;
      background-attachment: scroll;
    }
    .support-hero-overlay {
      position: absolute;
      inset: 0;
      pointer-events: none;
      background: linear-gradient(to bottom, rgba(0,10,25,0.5) 0%, rgba(0,5,15,0.3) 40%, rgba(5,13,24,0.98) 100%);
    }
    .support-content-wrap {
      background: linear-gradient(180deg, #050d18 0%, #081420 50%, #050d18 100%);
    }

    /* ===== Search Bar ===== */
    .search-container {
      position: relative;
      max-width: 640px;
      margin: 0 auto;
    }
    .search-input-wrap {
      position: relative;
      display: flex;
      align-items: center;
    }
    .search-input-wrap svg {
      position: absolute;
      left: 1.25rem;
      width: 22px;
      height: 22px;
      color: #4bbde8aa;
      pointer-events: none;
      z-index: 2;
    }
    .search-input {
      width: 100%;
      padding: 1.1rem 1.25rem 1.1rem 3.25rem;
      font-family: 'Cinzel', Georgia, serif;
      font-size: 1rem;
      color: #d4f0ff;
      background: linear-gradient(180deg, rgba(8,20,36,0.95) 0%, rgba(5,13,24,0.98) 100%);
      border: 1px solid #1a3a5a66;
      border-radius: 14px;
      outline: none;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 0 30px rgba(77,189,232,0.08), 0 8px 32px rgba(0,0,0,0.4);
    }
    .search-input::placeholder {
      color: #4bbde877;
      letter-spacing: 0.03em;
    }
    .search-input:focus {
      border-color: #4bbde8;
      box-shadow: 0 0 36px rgba(77,189,232,0.22), 0 8px 32px rgba(0,0,0,0.5);
    }
    .search-results {
      position: absolute;
      top: calc(100% + 0.5rem);
      left: 0;
      right: 0;
      background: linear-gradient(180deg, rgba(8,20,36,0.98) 0%, rgba(5,13,24,0.99) 100%);
      border: 1px solid #1a3a5a66;
      border-radius: 12px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.5), 0 0 30px rgba(77,189,232,0.1);
      overflow: hidden;
      z-index: 50;
      display: none;
    }
    .search-results.visible { display: block; }
    .search-result-item {
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
      padding: 0.85rem 1.25rem;
      cursor: pointer;
      border-bottom: 1px solid rgba(26,58,90,0.3);
      transition: background 0.2s ease;
    }
    .search-result-item:last-child { border-bottom: none; }
    .search-result-item:hover {
      background: rgba(77,189,232,0.08);
    }
    .search-result-icon {
      flex-shrink: 0;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
      background: rgba(77,189,232,0.1);
      border: 1px solid rgba(77,189,232,0.2);
      font-size: 1.1rem;
    }
    .search-result-text { flex: 1; min-width: 0; }
    .search-result-title {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 0.9rem;
      color: #d4f0ff;
      margin-bottom: 0.15rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .search-result-desc {
      font-size: 0.78rem;
      color: #7da8c4;
      line-height: 1.4;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .search-no-results {
      padding: 1.25rem;
      text-align: center;
      font-family: 'Cinzel', Georgia, serif;
      font-size: 0.85rem;
      color: #7da8c4;
    }

    /* ===== Support Panels ===== */
    .support-panel {
      position: relative;
      border: 1px solid #1a3a5a44;
      border-radius: 14px;
      overflow: hidden;
      background: linear-gradient(180deg, rgba(8,20,36,0.92) 0%, rgba(5,13,24,0.96) 100%);
      box-shadow: 0 0 25px rgba(26,159,212,0.08), 0 12px 40px rgba(0,0,0,0.5), inset 0 0 20px rgba(77,189,232,0.03);
    }
    .support-panel::before {
      content: ''; position: absolute; inset: -2px; border-radius: 16px;
      background: linear-gradient(135deg, rgba(77,189,232,0.2) 0%, rgba(26,159,212,0.08) 50%, rgba(13,110,168,0.15) 100%);
      z-index: -1; opacity: 0.5; pointer-events: none;
    }
    .support-panel-header {
      display: flex; align-items: center; gap: 0.75rem;
      padding: 1rem 1.25rem;
      background: linear-gradient(180deg, rgba(26,159,212,0.12) 0%, rgba(5,13,24,0.3) 100%);
      border-bottom: 1px solid #1a3a5a33;
    }
    .support-panel-title {
      font-family: 'Cinzel Decorative','Cinzel',Georgia,serif;
      font-weight: 700; font-size: 1rem; color: var(--frost);
      letter-spacing: 0.06em; text-shadow: 0 0 10px rgba(77,189,232,0.3);
    }
    .support-panel-body {
      padding: 2rem 2.5rem 2.5rem;
    }

    .skip-link {
      position: fixed; top: -100px; left: 1rem; z-index: 10000;
      padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #1a9fd4, #0d6ea8);
      color: #fff; font-family: 'Cinzel', Georgia, serif; font-size: 0.85rem;
      letter-spacing: 0.1em; text-transform: uppercase; border-radius: 0 0 10px 10px;
      border: 1px solid #7dd8f8; border-top: none; text-decoration: none;
      transition: top 0.25s ease;
    }
    .skip-link:focus { top: 0; }
    a:focus-visible, button:focus-visible, [tabindex]:focus-visible {
      outline: 2px solid #7dd8f8; outline-offset: 2px; border-radius: 4px;
    }
    .reading-progress {
      position: fixed; top: 0; left: 0; width: 0%; height: 3px; z-index: 9999;
      background: linear-gradient(90deg, #1a9fd4 0%, #7dd8f8 50%, #c8f0ff 100%);
      box-shadow: 0 0 10px #56c8f088; transition: width 0.1s linear; pointer-events: none;
    }

    .btn-cta-primary, .btn-cta-secondary {
      position: relative;
      overflow: hidden;
    }
    .btn-cta-primary::after, .btn-cta-secondary::after {
      content: '';
      position: absolute;
      top: 50%; left: 50%;
      width: 0; height: 0;
      border-radius: 50%;
      background: rgba(255,255,255,0.3);
      transform: translate(-50%, -50%);
      transition: width 0.5s ease, height 0.5s ease;
      pointer-events: none;
    }
    .btn-cta-primary:active::after, .btn-cta-secondary:active::after {
      width: 300px; height: 300px;
    }

    @media (max-width: 768px) {
      .support-panel-body { padding: 1.5rem 1.25rem 2rem; }
      .search-input { font-size: 0.9rem; padding: 0.9rem 1rem 0.9rem 3rem; }
    }

    /* ===== Category grid ===== */
    .cat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 1rem;
    }
    .cat-card {
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      gap: 0.5rem; padding: 1.5rem 1rem; border-radius: 12px;
      border: 1px solid #1a3a5a44; background: linear-gradient(180deg, rgba(8,20,36,0.6) 0%, rgba(5,13,24,0.8) 100%);
      cursor: pointer; transition: all 0.3s ease; text-align: center;
    }
    .cat-card:hover {
      border-color: #4bbde866; box-shadow: 0 0 16px rgba(77,189,232,0.12); transform: translateY(-3px);
    }
    .cat-card-icon { font-size: 2rem; filter: drop-shadow(0 0 8px rgba(77,189,232,0.3)); }
    .cat-card:hover .cat-card-icon { filter: drop-shadow(0 0 12px rgba(77,189,232,0.5)); }
    .cat-card-title {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.78rem; color: #b8d4e8;
      letter-spacing: 0.04em; line-height: 1.3;
    }
    .cat-card:hover .cat-card-title { color: #d4f0ff; }

    /* ===== FAQ Panel ===== */
    .faq-panel { display: none; }
    .faq-panel.open { display: block; }
    .faq-panel-inner { position: relative; }
    .faq-back {
      display: inline-flex; align-items: center; gap: 0.4rem;
      font-family: 'Cinzel', Georgia, serif; font-size: 0.8rem; color: #7da8c4;
      background: none; border: none; cursor: pointer; margin-bottom: 1.5rem;
      transition: color 0.3s ease;
    }
    .faq-back:hover { color: #7dd8f8; }
    .faq-item { border-bottom: 1px solid #1a3a5a33; padding: 1rem 0; }
    .faq-q {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.9rem; color: #d4f0ff; cursor: pointer;
      display: flex; justify-content: space-between; align-items: center; gap: 1rem;
      transition: color 0.3s ease;
    }
    .faq-q:hover { color: #8dd6f5; }
    .faq-q .faq-arrow { transition: transform 0.3s ease; flex-shrink: 0; }
    .faq-item.open .faq-q .faq-arrow { transform: rotate(180deg); }
    .faq-a {
      max-height: 0; overflow: hidden; transition: max-height 0.4s ease;
      font-family: 'Cinzel', Georgia, serif; font-size: 0.82rem; line-height: 1.7; color: #a8c8d8;
    }
    .faq-item.open .faq-a { max-height: 500px; padding-top: 0.75rem; }

    .ayuda-ticket-btn {
      display: inline-flex; align-items: center; justify-content: center; gap: 0.6rem; width: 100%;
      font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700; font-size: 0.85rem;
      letter-spacing: 0.05em; padding: 0.8rem 1.5rem; border-radius: 10px;
      border: 1px solid #4bbde8; cursor: pointer; color: #d4f0ff;
      background: linear-gradient(180deg, rgba(77,189,232,0.2) 0%, rgba(13,110,168,0.1) 100%);
      transition: all 0.3s ease;
    }
    .ayuda-ticket-btn:hover { box-shadow: 0 0 20px rgba(77,189,232,0.3); transform: translateY(-2px); }
    .ayuda-ticket-btn svg { flex-shrink: 0; }
    .ayuda-bug-btn {
      display: inline-flex; align-items: center; justify-content: center; gap: 0.6rem; width: 100%;
      font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700; font-size: 0.85rem;
      letter-spacing: 0.05em; padding: 0.8rem 1.5rem; border-radius: 10px;
      border: 1px solid #a08050; cursor: pointer; color: #f0d8a8;
      background: linear-gradient(180deg, rgba(160,128,80,0.15) 0%, rgba(100,70,30,0.08) 100%);
      transition: all 0.3s ease;
    }
    .ayuda-bug-btn:hover { box-shadow: 0 0 20px rgba(160,128,80,0.3); transform: translateY(-2px); }
    .ayuda-bug-btn svg { flex-shrink: 0; }

    /* ===== Modal styles ===== */
    .hl-modal-backdrop {
      position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center;
      background: rgba(2,10,20,0.85); backdrop-filter: blur(6px);
      opacity: 0; visibility: hidden; transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    .hl-modal-backdrop.open { opacity: 1; visibility: visible; }
    .hl-modal {
      position: relative; width: min(680px, 94vw); max-height: 88vh;
      background: linear-gradient(180deg, #0a1828 0%, #050d18 100%);
      border: 1px solid rgba(77,189,232,0.25); border-radius: 14px;
      box-shadow: 0 0 40px rgba(77,189,232,0.15), 0 20px 60px rgba(0,0,0,0.6);
      display: flex; flex-direction: column; overflow: hidden;
      transform: scale(0.94); transition: transform 0.3s cubic-bezier(0.16,1,0.3,1);
    }
    .hl-modal-backdrop.open .hl-modal { transform: scale(1); }
    .hl-modal-header {
      display: flex; align-items: center; justify-content: space-between; padding: 1.1rem 1.5rem;
      background: linear-gradient(180deg, rgba(77,189,232,0.12) 0%, rgba(4,10,20,0.3) 100%);
      border-bottom: 1px solid rgba(77,189,232,0.2);
    }
    .hl-modal-title {
      margin: 0; font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700;
      font-size: 1rem; color: var(--ice-100); letter-spacing: 0.04em; text-shadow: 0 0 10px rgba(77,189,232,0.3);
    }
    .hl-modal-close {
      background: none; border: none; color: var(--ice-200); font-size: 1.5rem;
      cursor: pointer; padding: 0 0.5rem; line-height: 1; transition: color 0.3s ease;
    }
    .hl-modal-close:hover { color: var(--frost); }
    .hl-modal-body {
      padding: 1.5rem 2rem 2rem; overflow-y: auto;
      scrollbar-width: thin; scrollbar-color: #4bbde855 transparent;
    }
    .hl-modal-body::-webkit-scrollbar { width: 8px; }
    .hl-modal-body::-webkit-scrollbar-track { background: transparent; }
    .hl-modal-body::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #4bbde855, #1a9fd433); border-radius: 4px;
    }
    .hl-form { display: flex; flex-direction: column; gap: 0.85rem; }
    .hl-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.85rem; }
    @media (max-width: 600px) { .hl-form-row { grid-template-columns: 1fr; } }
    .hl-field { display: flex; flex-direction: column; gap: 0.3rem; }
    .hl-field label {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.75rem; color: #6a8a98; letter-spacing: 0.05em;
    }
    .hl-field input, .hl-field textarea, .hl-field select {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.85rem; color: #d4f0ff;
      background: rgba(4,12,22,0.6); border: 1px solid #4bbde833; border-radius: 8px;
      padding: 0.6rem 0.75rem; outline: none;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .hl-field input:focus, .hl-field textarea:focus, .hl-field select:focus {
      border-color: #4bbde8; box-shadow: 0 0 10px rgba(77,189,232,0.15);
    }
    .hl-field textarea { resize: vertical; min-height: 70px; }
    .hl-field select { cursor: pointer; }
    .hl-field select option { background: #081420; color: #d4f0ff; }
    .hl-file-area { display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap; }
    .hl-file-area input[type=file] {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.82rem; color: #d4f0ff;
      background: rgba(4,12,22,0.6); border: 1px solid #4bbde833; border-radius: 8px;
      padding: 0.5rem 0.6rem; cursor: pointer; max-width: 260px; transition: border-color 0.3s ease;
    }
    .hl-file-area input[type=file]:hover { border-color: #4bbde866; }
    .hl-file-hint {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.72rem; color: #6a8a98; letter-spacing: 0.04em;
    }
    .hl-submit {
      font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700; font-size: 0.85rem;
      letter-spacing: 0.06em; padding: 0.7rem 1.5rem; border-radius: 8px;
      border: 1px solid #4bbde8; cursor: pointer; color: #d4f0ff;
      background: linear-gradient(180deg, rgba(77,189,232,0.2) 0%, rgba(13,110,168,0.1) 100%);
      transition: all 0.3s ease; align-self: flex-start;
    }
    .hl-submit:hover { box-shadow: 0 0 16px rgba(77,189,232,0.25); transform: translateY(-1px); }
    .hl-submit:disabled { opacity: 0.5; cursor: not-allowed; }
    .hl-msg {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.8rem; padding: 0.6rem 0.75rem;
      border-radius: 8px; letter-spacing: 0.03em; display: none;
    }
    .hl-msg.success { display: block; background: rgba(93,216,168,0.1); border: 1px solid #5dd8a844; color: #5dd8a8; }
    .hl-msg.error { display: block; background: rgba(160,80,80,0.1); border: 1px solid #a0505044; color: #a07070; }
    .hl-input-error { border-color: #a05050 !important; box-shadow: 0 0 8px rgba(160,80,80,0.2) !important; }
    .hl-field-error {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.72rem; color: #e08080;
      letter-spacing: 0.03em; margin-top: 0.15rem;
    }
    .hl-disclaimer { margin-top: 14px; font-size: 12px; line-height: 1.6; color: #8a8a8a; text-align: center; }
    .cf-turnstile { min-height: 65px; display: flex; align-items: flex-start; }
    .cf-turnstile iframe { border-radius: 6px; }

    /* ===== Bug report categories ===== */
    .bug-cat-grid { display: flex; flex-direction: column; gap: 0.6rem; margin-bottom: 1.25rem; }
    .bug-cat-card {
      border: 1px solid #4bbde833; border-radius: 10px; padding: 0.85rem 1rem; cursor: pointer;
      background: linear-gradient(180deg, rgba(8,22,36,0.5) 0%, rgba(4,12,22,0.5) 100%);
      transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    }
    .bug-cat-card:hover { border-color: #4bbde866; box-shadow: 0 0 12px rgba(77,189,232,0.1); transform: translateX(3px); }
    .bug-cat-card.selected {
      border-color: #4bbde8; background: linear-gradient(180deg, rgba(77,189,232,0.12) 0%, rgba(13,110,168,0.06) 100%);
      box-shadow: 0 0 16px rgba(77,189,232,0.15);
    }
    .bug-cat-title {
      font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700; font-size: 0.82rem;
      color: var(--ice-100); letter-spacing: 0.04em; margin-bottom: 0.25rem;
      display: flex; align-items: center; gap: 0.5rem;
    }
    .bug-cat-check {
      width: 1.1rem; height: 1.1rem; border-radius: 50%; border: 1.5px solid #4bbde855;
      flex-shrink: 0; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;
    }
    .bug-cat-card.selected .bug-cat-check {
      border-color: #4bbde8; background: #4bbde8; box-shadow: 0 0 8px rgba(77,189,232,0.4);
    }
    .bug-cat-card.selected .bug-cat-check::after { content: ''; width: 5px; height: 5px; border-radius: 50%; background: #050d18; }
    .bug-cat-desc {
      font-family: 'Cinzel', Georgia, serif; font-size: 0.72rem; line-height: 1.6;
      color: #8a9aa8; letter-spacing: 0.02em; padding-left: 1.6rem;
    }
    .bug-form-section { display: none; flex-direction: column; gap: 0.85rem; }
    .bug-form-section.visible { display: flex; }
    .bug-step-label {
      margin-top: 0; font-family: 'Cinzel Decorative','Cinzel',Georgia,serif; font-weight: 700;
      font-size: 0.85rem; color: #8dd6f5; letter-spacing: 0.06em; text-transform: uppercase;
      margin-bottom: 0.75rem; padding-bottom: 0.5rem; border-bottom: 1px solid #4bbde833;
    }
  </style>

  <script type="application/ld+json" id="faqJsonLd">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": []
  }
  </script>
</head>
<body>
  <a href="#support-content" class="skip-link">Saltar al contenido</a>

  <div id="snowContainer"></div>

  <!-- ===== Header ===== -->
  <header class="fixed top-0 left-0 right-0 z-40 transition-all duration-300" id="header"
    style="background: linear-gradient(180deg, rgba(2,14,30,0.92) 0%, rgba(2,14,30,0.6) 80%, transparent 100%); backdrop-filter: blur(6px); border-bottom: 1px solid transparent;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">

        <a href="/" class="flex items-center gap-3 shrink-0">
          <img src="/assets/logotipo_corelegacy.webp" alt="CoRe Legacy" width="1352" height="1005" decoding="async" class="h-12 w-auto" style="filter: drop-shadow(0 0 8px #56c8f066);" />
        </a>

        <nav class="hidden md:flex items-center gap-1" id="navMenu">
          <a class="nav-link" href="/" data-section="inicio">Inicio</a>
          <a class="nav-link" href="/noticias">Noticias</a>
          <a class="nav-link" href="/comunidad">Comunidad</a>
          <a class="nav-link" href="/info-changelog">Server y Changelog</a>
          <a class="nav-link" href="/soporte">Soporte</a>
          <a class="nav-link" href="https://accounts.corelegacy.gg" target="_blank" rel="noopener noreferrer">Cuenta y Tienda</a>
        </nav>

        <div class="flex items-center gap-3">
          <button id="mobileToggle" class="md:hidden text-ice-200 p-2" type="button" aria-label="Menú">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
          </button>
        </div>
      </div>

      <div id="mobileNav" class="md:hidden hidden pb-4 flex-col gap-1" style="display:none;">
        <a class="nav-link block" href="/">Inicio</a>
        <a class="nav-link block" href="/noticias">Noticias</a>
        <a class="nav-link block" href="/comunidad">Comunidad</a>
        <a class="nav-link block" href="/info-changelog">Server y Changelog</a>
        <a class="nav-link block" href="/soporte">Soporte</a>
        <a class="nav-link block" href="https://accounts.corelegacy.gg" target="_blank" rel="noopener noreferrer">Cuenta y Tienda</a>
      </div>
    </div>
  </header>

  <main>
  <!-- ===== Hero with Search ===== -->
  <section class="support-hero relative flex flex-col items-center justify-center overflow-hidden" style="min-height: 60vh;">
    <div class="support-hero-overlay"></div>
    <div class="max-w-7xl mx-auto relative z-10 w-full" style="padding: 8rem 1rem 3rem;">
      <div class="text-center reveal">
        <h1 style="font-family:'Cinzel Decorative','Cinzel',Georgia,serif; font-weight:900;
          font-size: clamp(2rem,5.5vw,4.5rem); line-height:1.1;
          background: linear-gradient(180deg,#fff 0%,#d4f0ff 15%,#8dd6f5 30%,#4bbde8 50%,#1a9fd4 70%,#0d6ea8 85%,#063d6b 100%);
          -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;
          animation: textGlow 3s ease-in-out infinite; margin-bottom:0.75rem;">Centro de Soporte</h1>
        <div class="frost-divider" style="width:120px; margin:0 auto 1.5rem;"></div>
        <p style="font-family:'Cinzel',Georgia,serif; font-size:1.05rem; line-height:1.85; color:#b8d4e8; margin-bottom:2.5rem;">
          ¿En qué podemos ayudarte, héroe?
        </p>

        <!-- ===== Smart Search Bar ===== -->
        <div class="search-container">
          <div class="search-input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="11" cy="11" r="8"/>
              <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" id="faqSearch" class="search-input" placeholder="Busca una pregunta o escribe tu duda..."
              autocomplete="off" aria-label="Buscar en la base de conocimientos" aria-expanded="false" aria-controls="faqSearchResults" />
          </div>
          <div class="search-results" id="faqSearchResults" role="listbox" aria-label="Resultados de búsqueda"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Category Cards ===== -->
  <section id="support-content" class="support-content-wrap relative pt-16 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <div class="text-center reveal" style="margin-bottom: 2rem;">
        <h2 style="font-family:'Cinzel Decorative','Cinzel',Georgia,serif; font-weight:800; font-size: clamp(1.2rem,2.5vw,1.6rem); color: #d4f0ff; letter-spacing: 0.04em; margin-bottom: 0.5rem;">Explora la Base de Conocimiento</h2>
        <div class="frost-divider" style="width: 80px; margin: 0 auto;"></div>
        <p style="font-family:'Cinzel',Georgia,serif; font-size: 0.8rem; color: #7da8c4; letter-spacing: 0.1em; text-transform: uppercase; margin-top: 0.75rem;">Selecciona una categoría</p>
      </div>
      <div class="cat-grid reveal">
        <div class="cat-card" data-faq="primeros-pasos"><div class="cat-card-icon">🧭</div><div class="cat-card-title">Primeros pasos</div></div>
        <div class="cat-card" data-faq="personajes-clases"><div class="cat-card-icon">🧙</div><div class="cat-card-title">Personajes y clases</div></div>
        <div class="cat-card" data-faq="combate-mecanicas"><div class="cat-card-icon">⚔️</div><div class="cat-card-title">Combate y mecánicas</div></div>
        <div class="cat-card" data-faq="niveles-progresion"><div class="cat-card-icon">📈</div><div class="cat-card-title">Niveles y progresión</div></div>
        <div class="cat-card" data-faq="mundo-exploracion"><div class="cat-card-icon">🗺️</div><div class="cat-card-title">Mundo y exploración</div></div>
        <div class="cat-card" data-faq="misiones"><div class="cat-card-icon">📜</div><div class="cat-card-title">Misiones</div></div>
        <div class="cat-card" data-faq="mazmorras-raids"><div class="cat-card-icon">🏰</div><div class="cat-card-title">Mazmorras y Raids</div></div>
        <div class="cat-card" data-faq="pvp"><div class="cat-card-icon">🛡️</div><div class="cat-card-title">PvP</div></div>
        <div class="cat-card" data-faq="economia"><div class="cat-card-icon">💰</div><div class="cat-card-title">Economía</div></div>
        <div class="cat-card" data-faq="profesiones"><div class="cat-card-icon">🔨</div><div class="cat-card-title">Profesiones</div></div>
        <div class="cat-card" data-faq="objetos-equipamiento"><div class="cat-card-icon">🎒</div><div class="cat-card-title">Objetos y equipamiento</div></div>
        <div class="cat-card" data-faq="talentos-builds"><div class="cat-card-icon">🏹</div><div class="cat-card-title">Talentos y builds</div></div>
        <div class="cat-card" data-faq="comunidad"><div class="cat-card-icon">👥</div><div class="cat-card-title">Comunidad</div></div>
        <div class="cat-card" data-faq="interfaz-addons"><div class="cat-card-icon">🖥️</div><div class="cat-card-title">Interfaz y AddOns</div></div>
      </div>
    </div>
  </section>

  <!-- ===== Ayuda y soporte (botones) ===== -->
  <section class="support-content-wrap relative px-4 sm:px-6 lg:px-8" style="padding-top:0; padding-bottom:3rem;">
    <p style="max-width:600px; margin:0 auto 1.25rem; text-align:center; font-family:'Cinzel',Georgia,serif; font-size:0.9rem; line-height:1.6; color:#a8c4d4; letter-spacing:0.02em;">
      Antes de abrir un ticket, echa un vistazo a las preguntas frecuentes de arriba &mdash; la mayoria de dudas se resuelven en segundos sin esperar a un MJ.
    </p>
    <div style="display:flex; flex-direction:row; align-items:center; justify-content:center; gap:1rem; max-width:600px; margin:0 auto;">
      <button type="button" class="ayuda-ticket-btn" id="tkOpenModal">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        Contactar con un MJ (Abrir Ticket)
      </button>
      <button type="button" class="ayuda-bug-btn" id="bgOpenModal">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><line x1="9" y1="9" x2="15" y2="15"/><line x1="15" y1="9" x2="9" y2="15"/></svg>
        Reportar Bug
      </button>
    </div>
  </section>

  <!-- ===== SEO: Static FAQ content for crawlers (noscript fallback) ===== -->
  <noscript>
  <section id="seo-faqs" style="max-width:800px; margin:0 auto; padding:2rem 1rem;">
    <h2>Preguntas frecuentes de CoRe Legacy</h2>
    <h3>¿Qué es CoRe Legacy?</h3>
    <p>CoRe Legacy es un servidor privado de World of Warcraft basado en Wrath of the Lich King 3.3.5a.</p>
    <h3>¿Cómo puedo reportar un bug?</h3>
    <p>Utiliza el sistema oficial de Reportar Bug disponible en la sección de soporte de CoRe Legacy.</p>
    <h3>¿Cómo puedo contactar con un MJ?</h3>
    <p>CoRe Legacy dispone de un sistema de tickets para contactar con un MJ.</p>
  </section>
  </noscript>

  <!-- ===== FAQ Panel ===== -->
  <section id="faqPanel" class="support-content-wrap relative px-4 sm:px-6 lg:px-8" style="padding-top: 0; padding-bottom: 4rem;">
    <div class="max-w-5xl mx-auto">
      <div class="faq-panel" id="faqPanelContent">
        <div class="faq-panel-inner">
          <button class="faq-back" id="faqBackBtn" type="button">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
            Volver a categorías
          </button>
          <div id="faqCategoryContent"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Modal de contacto con MJ (ticket) ===== -->
  <div id="tkModal" class="hl-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="tkModalTitle">
    <div class="hl-modal">
      <div class="hl-modal-header">
        <h1 class="hl-modal-title" id="tkModalTitle">Contactar con un MJ (Abrir Ticket)</h1>
        <button class="hl-modal-close" type="button" aria-label="Cerrar">&times;</button>
      </div>
      <div class="hl-modal-body">
        <form class="hl-form" id="tkForm">
          <div class="hl-form-row">
            <div class="hl-field">
              <label for="tkPlayerName">Nombre del personaje</label>
              <input type="text" id="tkPlayerName" name="player_name" maxlength="32" required placeholder="Tu nombre en el servidor" />
            </div>
            <div class="hl-field">
              <label for="tkAccount">Cuenta</label>
              <input type="text" id="tkAccount" name="account" maxlength="32" required placeholder="Nombre de tu cuenta" />
            </div>
          </div>
          <div class="hl-form-row">
            <div class="hl-field">
              <label for="tkEmail">Email de contacto</label>
              <input type="email" id="tkEmail" name="email" maxlength="120" required placeholder="tucorreo@ejemplo.com" />
            </div>
            <div class="hl-field">
              <label for="tkCategory">Categoría</label>
              <select id="tkCategory" name="category" required>
                <option value="">Selecciona una categoría</option>
                <option value="general">Consulta general</option>
                <option value="account">Problema de cuenta</option>
                <option value="stuck">Personaje atascado</option>
                <option value="harassment">Denuncia de jugador</option>
                <option value="collab">Colaboración o aportaciones</option>
                <option value="other">Otro</option>
              </select>
            </div>
          </div>
          <div class="hl-field">
            <label for="tkSubject">Asunto</label>
            <input type="text" id="tkSubject" name="subject" maxlength="120" required placeholder="Resumen breve de tu consulta" />
          </div>
          <div class="hl-field">
            <label for="tkDescription">Descripción</label>
            <textarea id="tkDescription" name="description" maxlength="1000" required placeholder="Describe tu problema o consulta con el mayor detalle posible..."></textarea>
          </div>
          <div class="hl-field">
            <label for="tkScreenshots">Capturas de pantalla (opcional, hasta 10). Mantén pulsada la tecla Ctrl para seleccionar múltiples imágenes.</label>
            <div class="hl-file-area">
              <input type="file" id="tkScreenshots" name="screenshots[]" accept="image/jpeg,image/png,image/gif,image/webp" multiple />
              <span class="hl-file-hint" id="tkFileHint">JPG, PNG, GIF o WebP · máx. 10 MB por imagen · hasta 10 imágenes</span>
            </div>
          </div>
          <div class="hl-field">
            <label>Verificación de seguridad</label>
            <div class="cf-turnstile" id="tkTurnstile" data-sitekey="<?php echo htmlspecialchars($turnstileKey); ?>" data-action="ticket_submit" data-theme="dark"></div>
          </div>
          <button type="submit" class="hl-submit" id="tkSubmit">Abrir ticket</button>
          <div class="hl-msg" id="tkMsg"></div>
        </form>
      </div>
    </div>
  </div>

  <!-- ===== Modal de reporte de bugs ===== -->
  <div id="bgModal" class="hl-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="bgModalTitle">
    <div class="hl-modal" style="width:min(720px,94vw);">
      <div class="hl-modal-header">
        <h1 class="hl-modal-title" id="bgModalTitle">Reportar Bug</h1>
        <button class="hl-modal-close" type="button" aria-label="Cerrar">&times;</button>
      </div>
      <div class="hl-modal-body">
        <h2 class="bug-step-label">Paso 1 — Selecciona la categoría del bug</h2>
        <div class="bug-cat-grid" id="bgCatGrid">
          <div class="bug-cat-card" data-cat="quests"><div class="bug-cat-title"><span class="bug-cat-check"></span>Misiones (Quests)</div><div class="bug-cat-desc">Misiones que no se pueden entregar, objetivos bugueados, eventos atascados o NPCs de misión desaparecidos.</div></div>
          <div class="bug-cat-card" data-cat="spells"><div class="bug-cat-title"><span class="bug-cat-check"></span>Clases y Hechizos</div><div class="bug-cat-desc">Talentos que no se aplican bien, daño o curación incorrectos, auras/buffos que no funcionan, o mecánicas de mascota rotas.</div></div>
          <div class="bug-cat-card" data-cat="pve"><div class="bug-cat-title"><span class="bug-cat-check"></span>Mazmorras y Bandas (PvE)</div><div class="bug-cat-desc">Mecánicas de jefes (bosses) rotas, puertas que no se abren, scripts de banda que no se inician, o problemas con los bloqueos (saves).</div></div>
          <div class="bug-cat-card" data-cat="pvp"><div class="bug-cat-title"><span class="bug-cat-check"></span>Campos de Batalla y Arenas (PvP)</div><div class="bug-cat-desc">Problemas de emparejamiento, cálculo de índices (MMR), o fallos en las mecánicas de captura de banderas o bases.</div></div>
          <div class="bug-cat-card" data-cat="loot"><div class="bug-cat-title"><span class="bug-cat-check"></span>Objetos y Botín (Loot)</div><div class="bug-cat-desc">Tasas de drop incorrectas, objetos que no otorgan las estadísticas indicadas, o problemas con las profesiones.</div></div>
          <div class="bug-cat-card" data-cat="npc"><div class="bug-cat-title"><span class="bug-cat-check"></span>NPCs y Entorno</div><div class="bug-cat-desc">Enemigos cayendo por debajo del mapa, rutas de patrulla erráticas, o personajes atascados (stuck).</div></div>
          <div class="bug-cat-card" data-cat="bots"><div class="bug-cat-title"><span class="bug-cat-check"></span>IA de Playerbots y Chat</div><div class="bug-cat-desc">Comportamiento errático de los bots del servidor, fallos al darles órdenes, o respuestas inesperadas/rotas en el sistema de chat integrado.</div></div>
          <div class="bug-cat-card" data-cat="web"><div class="bug-cat-title"><span class="bug-cat-check"></span>Cuenta y Tienda Web</div><div class="bug-cat-desc">Problemas al recibir objetos comprados, fallos en el sistema de donaciones/votos, o errores al iniciar sesión en el panel.</div></div>
          <div class="bug-cat-card" data-cat="exploits"><div class="bug-cat-title"><span class="bug-cat-check"></span>Exploits o Abuso</div><div class="bug-cat-desc">Una categoría discreta para que los jugadores reporten a otros aprovechándose de bugs o usando programas externos.</div></div>
          <div class="bug-cat-card" data-cat="other"><div class="bug-cat-title"><span class="bug-cat-check"></span>Otros</div><div class="bug-cat-desc">Cualquier problema menor que no encaje en las categorías anteriores.</div></div>
        </div>
        <div class="bug-form-section" id="bgFormSection">
          <h2 class="bug-step-label">Paso 2 — Describe el bug</h2>
          <form class="hl-form" id="bgForm">
            <div class="hl-form-row">
              <div class="hl-field">
                <label for="bgPlayerName">Nombre del personaje</label>
                <input type="text" id="bgPlayerName" name="player_name" maxlength="32" required placeholder="Tu nombre en el servidor" />
              </div>
              <div class="hl-field">
                <label for="bgAccount">Cuenta</label>
                <input type="text" id="bgAccount" name="account" maxlength="32" required placeholder="Nombre de tu cuenta" />
              </div>
            </div>
            <div class="hl-field">
              <label for="bgEmail">Email de contacto</label>
              <input type="email" id="bgEmail" name="email" maxlength="120" required placeholder="tucorreo@ejemplo.com" />
            </div>
            <div class="hl-field">
              <label for="bgSubject">Asunto</label>
              <input type="text" id="bgSubject" name="subject" maxlength="120" required placeholder="Resumen breve del bug" />
            </div>
            <div class="hl-field">
              <label for="bgDescription">Descripción del bug</label>
              <textarea id="bgDescription" name="description" maxlength="2000" required placeholder="Describe el bug con el mayor detalle posible: qué ocurrió, qué esperabas que ocurriera, pasos para reproducirlo, y cualquier información relevante..."></textarea>
            </div>
            <div class="hl-field">
              <label for="bgScreenshots">Capturas de pantalla (opcional, hasta 10). Mantén pulsada la tecla Ctrl para seleccionar múltiples imágenes.</label>
              <div class="hl-file-area">
                <input type="file" id="bgScreenshots" name="screenshots[]" accept="image/jpeg,image/png,image/gif,image/webp" multiple />
                <span class="hl-file-hint" id="bgFileHint">JPG, PNG, GIF o WebP · máx. 10 MB por imagen · hasta 10 imágenes</span>
              </div>
            </div>
            <div class="hl-field">
              <label>Verificación de seguridad</label>
              <div class="cf-turnstile" id="bgTurnstile" data-sitekey="<?php echo htmlspecialchars($turnstileKey); ?>" data-action="bug_report" data-theme="dark"></div>
            </div>
            <button type="submit" class="hl-submit" id="bgSubmit">Enviar reporte</button>
            <div class="hl-msg" id="bgMsg"></div>
            <p class="hl-disclaimer">Al enviar este formulario, tu reporte se almacena y se añade a nuestra cola de reportes. No respondemos a estos formularios salvo que necesitemos más información sobre el bug.</p>
          </form>
        </div>
      </div>
    </div>
  </div>

  </main>

  <footer class="site-footer">
    <div class="site-footer-bg">
      <div class="site-footer-content">
        <p class="site-footer-disclaimer">
          CoRe Legacy es un servidor privado de World of Warcraft: Wrath of the Lich King 3.3.5a.
          Todo el contenido relacionado con WoW es propiedad de Blizzard Entertainment.
        </p>
        <div class="site-footer-links">
          <button class="site-footer-link" data-legal="tos">Términos de Servicio</button>
          <span class="site-footer-sep">·</span>
          <button class="site-footer-link" data-legal="privacy">Política de Privacidad</button>
          <span class="site-footer-sep">·</span>
          <a class="site-footer-link" href="/sobre-nosotros">Sobre nosotros</a>
        </div>
        <div class="site-footer-social">
          <a class="site-footer-social-link" href="https://www.facebook.com/corelegacygg" target="_blank" rel="noopener noreferrer nofollow" aria-label="Facebook de CoRe Legacy">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </a>
          <a class="site-footer-social-link" href="https://discord.gg/9AJ23YwDV" target="_blank" rel="noopener noreferrer nofollow" aria-label="Discord de CoRe Legacy">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
            </svg>
          </a>
          <a class="site-footer-social-link" href="https://www.instagram.com/corelegacygg/" target="_blank" rel="noopener noreferrer nofollow" aria-label="Instagram de CoRe Legacy">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.012-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.058-1.69-.072-4.949-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <a class="site-footer-social-link" href="https://www.youtube.com/@CoReLegacygg" target="_blank" rel="noopener noreferrer nofollow" aria-label="YouTube de CoRe Legacy">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
          </a>
        </div>
        <p class="site-footer-copy">© 2026 CoRe Legacy. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- ===== Legal Modals ===== -->
  <div id="legalTosModal" class="legal-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="legalTosTitle">
    <div class="legal-modal">
      <div class="legal-modal-header">
        <h1 class="legal-modal-title" id="legalTosTitle">Términos de Servicio</h1>
        <button class="legal-modal-close" type="button" aria-label="Cerrar">&times;</button>
      </div>
      <div class="legal-modal-body"></div>
      <div class="legal-modal-footer">
        <span class="legal-modal-note">CoRe Legacy — Términos de Servicio</span>
        <button class="legal-modal-accept" type="button">Entendido</button>
      </div>
    </div>
  </div>
  <div id="legalPrivacyModal" class="legal-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="legalPrivacyTitle">
    <div class="legal-modal">
      <div class="legal-modal-header">
        <h1 class="legal-modal-title" id="legalPrivacyTitle">Política de Privacidad</h1>
        <button class="legal-modal-close" type="button" aria-label="Cerrar">&times;</button>
      </div>
      <div class="legal-modal-body"></div>
      <div class="legal-modal-footer">
        <span class="legal-modal-note">CoRe Legacy — Política de Privacidad</span>
        <button class="legal-modal-accept" type="button">Entendido</button>
      </div>
    </div>
  </div>

  <script src="/assets/core.js"></script>
  <script src="/assets/legal.js"></script>

  <div class="reading-progress" id="readingProgress" aria-hidden="true"></div>

  <button class="back-to-top" type="button" aria-label="Volver arriba">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="18 15 12 9 6 15"></polyline></svg>
  </button>

  <script>
  (function () {
    'use strict';

    /* ===== Reading Progress ===== */
    var bar = document.getElementById('readingProgress');
    if (bar) {
      function updateProgress() {
        var st = window.scrollY || document.documentElement.scrollTop;
        var sh = document.documentElement.scrollHeight - window.innerHeight;
        var pct = sh > 0 ? (st / sh) * 100 : 0;
        bar.style.width = pct + '%';
      }
      window.addEventListener('scroll', updateProgress, { passive: true });
      updateProgress();
    }

    /* ===== FAQ Knowledge Base ===== */
    var faqArticles = [
      { icon: '📥', title: '¿Cómo descargo e instalo el cliente?', desc: 'Guía paso a paso para descargar el cliente de CoRe Legacy y empezar a jugar en minutos.', keywords: 'descargar instalar cliente conexion realmlist wow.exe' },
      { icon: '🖥️', title: '¿Cuáles son los requisitos de hardware?', desc: 'Conoce los requisitos mínimos y recomendados para jugar a CoRe Legacy sin problemas.', keywords: 'requisitos hardware ram cpu gpu grafica requisitos minimos' },
      { icon: '🤖', title: '¿Qué son los Playerbots y cómo funcionan?', desc: 'Descubre cómo jugar WoW en solitario con compañeros controlados por inteligencia artificial.', keywords: 'playerbots bots ia companions solitario jugar solo' },
      { icon: '🎮', title: '¿Cómo uso el addon MultiBot?', desc: 'Guía completa del addon MultiBot para controlar tus altbots de forma visual e intuitiva.', keywords: 'multibot addon altbots interfaz control grupo' },
      { icon: '⚔️', title: '¿Cómo funciona el addon DungeonClear?', desc: 'Aprende a usar DungeonClear para que un bot tanque limpie mazmorras de forma autónoma.', keywords: 'dungeonclear addon mazmorra tanque bot limpiar' },
      { icon: '⚡', title: '¿Cómo aumento los FPS con DXVK y Vulkan?', desc: 'Optimiza el rendimiento del juego con DXVK y Vulkan. Perfiles listos para descargar.', keywords: 'fps dxvk vulkan rendimiento optimizar lag stuttering' },
      { icon: '🔑', title: '¿Cómo creo una cuenta?', desc: 'Crea tu cuenta gratuita en CoRe Legacy y empieza tu aventura en Rasganorte.', keywords: 'crear cuenta registro registrarse nueva cuenta' },
      { icon: '🔒', title: '¿Cómo recupero mi contraseña?', desc: 'Restablece tu contraseña si has olvidado la de tu cuenta de CoRe Legacy.', keywords: 'contraseña recuperar olvidar resetear restablecer password' },
      { icon: '🛒', title: '¿Cómo funciona la tienda?', desc: 'Información sobre la tienda de CoRe Legacy, métodos de pago y productos disponibles.', keywords: 'tienda pagar compra productos donacion vip' },
      { icon: '🧊', title: '¿El servidor está online? ¿Cómo veo el estado?', desc: 'Consulta el estado del reino y los tiempos de mantenimiento programado.', keywords: 'servidor online estado down caido mantenimiento reinicio' },
      { icon: '📜', title: '¿Cuáles son las normas del servidor?', desc: 'Lee las reglas de CoRe Legacy sobre comportamiento, exploits y sanciones.', keywords: 'normas reglas baneo sancion comportamiento exploits' },
      { icon: '💬', title: '¿Cómo hablo con los bots por chat?', desc: 'Aprende a comunicarte con tus playerbots mediante susurros y el chat de grupo.', keywords: 'chat bots susurro hablar comunicacion whisper grupo' },
      { icon: '🏰', title: '¿Cómo participo en bandas y mazmorras?', desc: 'Únete a mazmorras heroicas y bandas con tus bots o con otros jugadores reales.', keywords: 'bandas raid mazmorras heroicas grupo dungeon raid' },
      { icon: '🏆', title: '¿Cómo funcionan los rankings de arena?', desc: 'Consulta los rankings de arena PvP y los primeros del reino de CoRe Legacy.', keywords: 'arena pvp ranking primeros reino ratings' },
      { icon: '🗺️', title: '¿Cómo busco playerbots para mi grupo?', desc: 'Usa el comando /who y los filtros para encontrar bots del nivel y clase que necesitas.', keywords: 'buscar playerbots who comando filtrar nivel clase zona' },
      { icon: '🐛', title: '¿Cómo reporto un bug?', desc: 'Reporta errores del juego para que el equipo pueda corregirlos lo antes posible.', keywords: 'bug reportar error glitch fallo reporte' },
      { icon: '🎫', title: '¿Cómo abro un ticket con un MJ?', desc: 'Contacta con el equipo de soporte abriendo un ticket para recibir ayuda personalizada.', keywords: 'ticket mj soporte ayuda contacto abrir' },
      { icon: '🔄', title: '¿Cómo cambio de especialización o talentos?', desc: 'Usa la calculadora de talentos para planificar tu build y cambia de spec en el juego.', keywords: 'talentos spec especializacion build calculadora cambiar' }
    ];

    /* ===== Smart Search ===== */
    var searchInput = document.getElementById('faqSearch');
    var searchResults = document.getElementById('faqSearchResults');

    if (!searchInput || !searchResults) return;

    function normalize(s) {
      return s.toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '');
    }

    function renderResults(query) {
      if (query.trim() === '') {
        searchResults.classList.remove('visible');
        searchResults.innerHTML = '';
        searchInput.setAttribute('aria-expanded', 'false');
        return;
      }

      var nq = normalize(query);
      var scored = [];

      faqArticles.forEach(function (article) {
        var nt = normalize(article.title);
        var nd = normalize(article.desc);
        var nk = normalize(article.keywords);
        var score = 0;

        if (nt.indexOf(nq) !== -1) score += 10;
        if (nk.indexOf(nq) !== -1) score += 8;
        if (nd.indexOf(nq) !== -1) score += 4;

        nq.split(/\s+/).forEach(function (word) {
          if (word.length < 2) return;
          if (nt.indexOf(word) !== -1) score += 3;
          if (nk.indexOf(word) !== -1) score += 2;
          if (nd.indexOf(word) !== -1) score += 1;
        });

        if (score > 0) scored.push({ article: article, score: score });
      });

      scored.sort(function (a, b) { return b.score - a.score; });

      if (scored.length === 0) {
        searchResults.innerHTML = '<div class="search-no-results">No se encontraron resultados para "' + escapeHtml(query) + '". Prueba con otras palabras clave.</div>';
        searchResults.classList.add('visible');
        searchInput.setAttribute('aria-expanded', 'true');
        return;
      }

      var html = '';
      var max = Math.min(scored.length, 6);
      for (var i = 0; i < max; i++) {
        var a = scored[i].article;
        html += '<div class="search-result-item" role="option" tabindex="0" data-title="' + escapeHtml(a.title) + '">'
          + '<div class="search-result-icon">' + a.icon + '</div>'
          + '<div class="search-result-text">'
          + '<div class="search-result-title">' + escapeHtml(a.title) + '</div>'
          + '<div class="search-result-desc">' + escapeHtml(a.desc) + '</div>'
          + '</div>'
          + '</div>';
      }

      searchResults.innerHTML = html;
      searchResults.classList.add('visible');
      searchInput.setAttribute('aria-expanded', 'true');

      var items = searchResults.querySelectorAll('.search-result-item');
      items.forEach(function (item) {
        item.addEventListener('click', function () {
          searchInput.value = this.getAttribute('data-title');
          searchResults.classList.remove('visible');
          searchInput.setAttribute('aria-expanded', 'false');
        });
        item.addEventListener('keydown', function (e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            this.click();
          }
        });
      });
    }

    function escapeHtml(str) {
      var div = document.createElement('div');
      div.textContent = str;
      return div.innerHTML;
    }

    var debounceTimer;
    searchInput.addEventListener('input', function () {
      clearTimeout(debounceTimer);
      var val = this.value;
      debounceTimer = setTimeout(function () { renderResults(val); }, 150);
    });

    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        searchResults.classList.remove('visible');
        this.setAttribute('aria-expanded', 'false');
      }
    });

    document.addEventListener('click', function (e) {
      if (!searchResults.contains(e.target) && e.target !== searchInput) {
        searchResults.classList.remove('visible');
        searchInput.setAttribute('aria-expanded', 'false');
      }
    });
  })();
  </script>

  <script>
  (function () {
    'use strict';

    var faqData = {
      'primeros-pasos': {
        title: 'Primeros pasos',
        items: [
          { q: '¿Cómo descargo e instalo el cliente?', a: 'Visita la sección de descargas en nuestra web y descarga el cliente preparado de WoW 3.3.5a. Descomprime el archivo, ejecuta Wow.exe e introduce tu usuario y contraseña.' },
          { q: '¿Necesito cambiar el realmlist?', a: 'No. El cliente preparado ya incluye el realmlist configurado (logon.corelegacy.gg). No necesitas modificar ningún archivo.' },
          { q: '¿Cómo creo una cuenta?', a: 'Ve a la sección de Cuenta en nuestra web, pulsa en Registrarse y rellena el formulario con tu usuario, email y contraseña. Podrás jugar inmediatamente.' },
          { q: '¿El juego es gratis?', a: 'Sí. CoRe Legacy es un servidor privado gratuito. No necesitas suscripción de Blizzard para jugar.' }
        ]
      },
      'personajes-clases': {
        title: 'Personajes y clases',
        items: [
          { q: '¿Qué clases están disponibles?', a: 'Todas las clases de WotLK están disponibles: Guerrero, Paladín, Cazador, Pícaro, Sacerdote, Caballero de la Muerte, Chamán, Mago, Brujo, Monje (no disponible en 3.3.5a), y Druida.' },
          { q: '¿Puedo tener varios personajes?', a: 'Sí, puedes crear hasta 10 personajes por cuenta en distintos reinos.' },
          { q: '¿Cómo cambio de especialización?', a: 'Visita a un instructor de clase en cualquier ciudad capital y solicita un cambio de especialización. También puedes usar la calculadora de talentos en nuestra web.' }
        ]
      },
      'combate-mecanicas': {
        title: 'Combate y mecánicas',
        items: [
          { q: '¿Cómo funciona el combate en WotLK?', a: 'El combate sigue las mecánicas clásicas de WoW 3.3.5a: auto-ataques, habilidades con tiempo de reutilización, recursos (rabia, maná, energía, runas) y posicionamiento.' },
          { q: '¿Qué son los cooldowns?', a: 'Los cooldowns son tiempos de reutilización de habilidades. Algunas habilidades potentes tienen cooldowns largos para equilibrar el juego.' }
        ]
      },
      'niveles-progresion': {
        title: 'Niveles y progresión',
        items: [
          { q: '¿Cuál es el nivel máximo?', a: 'El nivel máximo en WotLK es 80. Puedes subir de nivel haciendo misiones, mazmorras, PvP o matando criaturas.' },
          { q: '¿Puedo subir al 80 directamente?', a: 'Sí, CoRe Legacy ofrece una promoción de bienvenida con subida gratuita al nivel 80 que incluye equipo inicial, oro y montura.' }
        ]
      },
      'mundo-exploracion': {
        title: 'Mundo y exploración',
        items: [
          { q: '¿Qué zonas están disponibles?', a: 'Todas las zonas de WotLK están disponibles: Rasganorte (Norte de Azeroth), los Reinos del Este, Kalimdor, y las nuevas zonas de Wrath of the Lich King.' },
          { q: '¿Cómo viajo entre continentes?', a: 'Puedes viajar en barco, zepelín o usando portales en ciudades capitales.' }
        ]
      },
      'misiones': {
        title: 'Misiones',
        items: [
          { q: '¿Cómo encuentro misiones?', a: 'Los NPCs con misiones tienen un símbolo de exclamación dorado sobre su cabeza. También puedes usar el rastreador de misiones del mapa.' },
          { q: '¿Puedo hacer misiones en grupo?', a: 'Sí, muchas misiones de grupo requieren varios jugadores. Con el sistema de Playerbots puedes completarlas incluso jugando solo.' }
        ]
      },
      'mazmorras-raids': {
        title: 'Mazmorras y Raids',
        items: [
          { q: '¿Qué mazmorras están disponibles?', a: 'Todas las mazmorras de WotLK están disponibles: Naxxramas, Ulduar, Prueba del Cruzado, Ciudadela de la Corona de Hielo y más.' },
          { q: '¿Cómo entro en una raid?', a: 'Las raids requieren grupos de 10 o 25 jugadores. Puedes unirte a un grupo existente o usar Playerbots para completarlas.' }
        ]
      },
      'pvp': {
        title: 'PvP',
        items: [
          { q: '¿Qué modalidades PvP hay?', a: 'Campos de batalla (Warsong Gulch, Arathi Basin, Alterac Valley, Eye of the Storm, Strand of the Ancients, Isle of Conquest), Arenas (2v2, 3v3, 5v5) y PvP al aire libre.' },
          { q: '¿Cómo funcionan los rankings de arena?', a: 'Los equipos de arena ganan o pierden puntos de MR según sus victorias y derrotas. Consulta las estadísticas en nuestra sección de Tops.' }
        ]
      },
      'economia': {
        title: 'Economía',
        items: [
          { q: '¿Cómo gano oro?', a: 'Puedes ganar oro completando misiones, vendiendo objetos a NPCs, en la casa de subastas, o mediante profesiones de recolección.' },
          { q: '¿Hay casa de subastas?', a: 'Sí, hay casas de subastas en las ciudades capitales donde puedes comprar y vender objetos con otros jugadores.' }
        ]
      },
      'profesiones': {
        title: 'Profesiones',
        items: [
          { q: '¿Qué profesiones hay?', a: 'Hay profesiones de recolección (Minería, Herboristería, Desuello), de producción (Herrería, Joyería, Ingeniería, Alquimia, Encantamiento, Sastrería, Peletería) y secundarias (Cocina, Pesca, Primeros Auxilios).' },
          { q: '¿Puedo tener varias profesiones?', a: 'Puedes tener 2 profesiones principales y todas las secundarias.' }
        ]
      },
      'objetos-equipamiento': {
        title: 'Objetos y equipamiento',
        items: [
          { q: '¿Cómo consigo mejor equipo?', a: 'Puedes conseguir equipo en mazmorras, raids, PvP, misiones, la casa de subastas o la tienda de CoRe Legacy.' },
          { q: '¿Qué son los conjuntos de equipo?', a: 'Los conjuntos (sets) otorgan bonificaciones adicionales cuando equipas varias piezas del mismo conjunto. Se consiguen principalmente en raids.' }
        ]
      },
      'talentos-builds': {
        title: 'Talentos y builds',
        items: [
          { q: '¿Cómo funcionan los talentos?', a: 'Cada clase tiene tres árboles de talentos. Subes de nivel y ganas puntos de talento que puedes asignar en cada árbol para especializar tu personaje.' },
          { q: '¿Puedo cambiar mis talentos?', a: 'Sí, puedes visitar a un instructor de clase para resetear tus talentos. También puedes usar la calculadora de talentos en nuestra web para planificar tu build.' }
        ]
      },
      'comunidad': {
        title: 'Comunidad',
        items: [
          { q: '¿Cómo contacto con un MJ?', a: 'Puedes abrir un ticket usando el botón "Contactar con un MJ" en esta página. Proporciona toda la información posible sobre tu problema.' },
          { q: '¿Cómo reporto un bug?', a: 'Usa el botón "Reportar Bug" en esta página, selecciona la categoría y describe el problema con el mayor detalle posible.' },
          { q: '¿Dónde puedo hablar con la comunidad?', a: 'Únete a nuestro Discord y síguenos en Facebook, Instagram y YouTube. Los enlaces están en el pie de página.' }
        ]
      },
      'interfaz-addons': {
        title: 'Interfaz y AddOns',
        items: [
          { q: '¿Puedo usar addons?', a: 'Sí, CoRe Legacy soporta addons compatibles con WoW 3.3.5a. Incluye addons propios como MultiBot y DungeonClear.' },
          { q: '¿Cómo instalo un addon?', a: 'Coloca la carpeta del addon en la carpeta Interface/AddOns dentro de tu directorio de WoW. Asegúrate de activar los addons en la pantalla de selección de personaje.' }
        ]
      }
    };

    var catCards = document.querySelectorAll('.cat-card');
    var faqPanel = document.getElementById('faqPanelContent');
    var faqBackBtn = document.getElementById('faqBackBtn');
    var faqContent = document.getElementById('faqCategoryContent');
    if (!catCards.length || !faqPanel) return;

    function renderFaqCategory(catId) {
      var cat = faqData[catId];
      if (!cat) return;
      var html = '<h2 style="font-family:\'Cinzel Decorative\',\'Cinzel\',Georgia,serif; font-weight:800; font-size:1.3rem; color:#d4f0ff; margin-bottom:1rem;">' + cat.title + '</h2>';
      cat.items.forEach(function (item) {
        html += '<div class="faq-item open">'
          + '<div class="faq-q">' + item.q + '<svg class="faq-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg></div>'
          + '<div class="faq-a"><p style="margin:0; padding-right:1.5rem;">' + item.a + '</p></div>'
          + '</div>';
      });
      faqContent.innerHTML = html;

      faqContent.querySelectorAll('.faq-item').forEach(function (item) {
        var q = item.querySelector('.faq-q');
        q.addEventListener('click', function () { item.classList.toggle('open'); });
      });

      var jsonLdEl = document.getElementById('faqJsonLd');
      if (jsonLdEl) {
        var allFaqs = [];
        cat.items.forEach(function (item) {
          allFaqs.push({ '@type': 'Question', name: item.q, acceptedAnswer: { '@type': 'Answer', text: item.a } });
        });
        jsonLdEl.textContent = JSON.stringify({ '@context': 'https://schema.org', '@type': 'FAQPage', mainEntity: allFaqs });
      }
    }

    catCards.forEach(function (card) {
      card.addEventListener('click', function () {
        var catId = this.getAttribute('data-faq');
        if (faqData[catId]) {
          renderFaqCategory(catId);
          faqPanel.classList.add('open');
          faqPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });

    if (faqBackBtn) {
      faqBackBtn.addEventListener('click', function () {
        faqPanel.classList.remove('open');
        document.getElementById('support-content').scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    }
  })();
  </script>

  <script>
  (function () {
    'use strict';
    window.spTurnstileCallback = function () {};

    var openBtn = document.getElementById('tkOpenModal');
    var modal = document.getElementById('tkModal');
    var form = document.getElementById('tkForm');
    var msgEl = document.getElementById('tkMsg');
    var submitBtn = document.getElementById('tkSubmit');
    var turnstileContainer = document.getElementById('tkTurnstile');
    if (!openBtn || !modal || !form) return;

    var turnstileWidgetId = null;
    var turnstileReady = false;
    var MAX_SIZE = 10 * 1024 * 1024;
    var MAX_FILES = 10;
    var IMG_ACCEPT = ['image/jpeg','image/png','image/gif','image/webp'];
    var fileInput = document.getElementById('tkScreenshots');
    var fileHint = document.getElementById('tkFileHint');
    var FILE_HINT = 'JPG, PNG, GIF o WebP · máx. 10 MB por imagen · hasta 10 imágenes';

    if (fileInput) {
      fileInput.addEventListener('change', function () {
        clearError(fileInput);
        var files = fileInput.files;
        if (files && files.length > 0) { fileHint.textContent = files.length + ' imagen(es) seleccionada(s)'; }
        else { fileHint.textContent = FILE_HINT; }
      });
    }

    function renderTurnstile() {
      if (turnstileWidgetId !== null || !turnstileContainer) return;
      if (typeof window.turnstile === 'undefined') return;
      turnstileWidgetId = window.turnstile.render(turnstileContainer, {
        sitekey: turnstileContainer.getAttribute('data-sitekey'),
        theme: 'dark', action: 'ticket_submit',
        callback: function () { turnstileReady = true; },
        'expired-callback': function () { turnstileReady = false; },
        'error-callback': function () { turnstileReady = false; }
      });
    }
    function resetTurnstile() {
      turnstileReady = false;
      if (turnstileWidgetId !== null && typeof window.turnstile !== 'undefined') { window.turnstile.reset(turnstileWidgetId); }
    }
    function openModal() {
      modal.classList.add('open'); document.body.style.overflow = 'hidden'; renderTurnstile();
      if (window.location.pathname !== '/abrir-ticket') { history.pushState({ modal: 'abrir-ticket' }, '', '/abrir-ticket'); }
    }
    function closeModal() {
      modal.classList.remove('open'); document.body.style.overflow = '';
      msgEl.className = 'hl-msg'; msgEl.textContent = ''; clearErrors(); resetTurnstile();
      if (window.location.pathname === '/abrir-ticket') { history.pushState({ modal: null }, '', '/soporte'); }
    }
    function showError(el, msg) {
      el.classList.add('hl-input-error');
      var hint = el.parentNode.querySelector('.hl-field-error');
      if (!hint) { hint = document.createElement('span'); hint.className = 'hl-field-error'; el.parentNode.appendChild(hint); }
      hint.textContent = msg;
    }
    function clearError(el) {
      el.classList.remove('hl-input-error');
      var hint = el.parentNode.querySelector('.hl-field-error');
      if (hint) hint.remove();
    }
    function clearErrors() {
      form.querySelectorAll('.hl-input-error').forEach(function (el) { el.classList.remove('hl-input-error'); });
      form.querySelectorAll('.hl-field-error').forEach(function (el) { el.remove(); });
    }
    function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

    openBtn.addEventListener('click', openModal);
    modal.querySelector('.hl-modal-close').addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && modal.classList.contains('open')) closeModal(); });
    window.addEventListener('popstate', function () {
      if (window.location.pathname === '/abrir-ticket') { openModal(); }
      else if (modal.classList.contains('open')) {
        modal.classList.remove('open'); document.body.style.overflow = '';
        msgEl.className = 'hl-msg'; msgEl.textContent = ''; clearErrors(); resetTurnstile();
      }
    });
    if (window.location.pathname === '/abrir-ticket') { openModal(); }

    form.addEventListener('submit', function (e) {
      e.preventDefault(); clearErrors(); msgEl.className = 'hl-msg'; msgEl.textContent = '';
      var nameInput = document.getElementById('tkPlayerName');
      var accountInput = document.getElementById('tkAccount');
      var emailInput = document.getElementById('tkEmail');
      var categoryInput = document.getElementById('tkCategory');
      var subjectInput = document.getElementById('tkSubject');
      var descInput = document.getElementById('tkDescription');
      var valid = true;
      if (!nameInput.value.trim()) { showError(nameInput, 'Introduce el nombre de tu personaje.'); valid = false; } else { clearError(nameInput); }
      if (!accountInput.value.trim()) { showError(accountInput, 'Introduce el nombre de tu cuenta.'); valid = false; } else { clearError(accountInput); }
      if (!emailInput.value.trim()) { showError(emailInput, 'Introduce tu email de contacto.'); valid = false; } else if (!isValidEmail(emailInput.value.trim())) { showError(emailInput, 'El email no tiene un formato válido.'); valid = false; } else { clearError(emailInput); }
      if (!categoryInput.value) { showError(categoryInput, 'Selecciona una categoría.'); valid = false; } else { clearError(categoryInput); }
      if (!subjectInput.value.trim()) { showError(subjectInput, 'Introduce un asunto.'); valid = false; } else { clearError(subjectInput); }
      if (!descInput.value.trim()) { showError(descInput, 'Describe tu problema o consulta.'); valid = false; } else { clearError(descInput); }
      if (fileInput && fileInput.files && fileInput.files.length > 0) {
        if (fileInput.files.length > MAX_FILES) { showError(fileInput, 'Solo puedes adjuntar un máximo de 10 imágenes.'); valid = false; }
        else {
          for (var fi = 0; fi < fileInput.files.length; fi++) {
            var sf = fileInput.files[fi];
            if (IMG_ACCEPT.indexOf(sf.type) === -1) { showError(fileInput, 'El formato de "' + sf.name + '" no es válido.'); valid = false; break; }
            else if (sf.size > MAX_SIZE) { showError(fileInput, '"' + sf.name + '" supera el tamaño máximo de 10 MB.'); valid = false; break; }
          }
          if (valid) clearError(fileInput);
        }
      }
      var turnstileToken = turnstileWidgetId !== null && typeof window.turnstile !== 'undefined' ? window.turnstile.getResponse(turnstileWidgetId) : '';
      if (!turnstileToken) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Completa la verificación de seguridad antes de enviar.'; return; }
      if (!valid) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Revisa los campos marcados antes de enviar.'; return; }
      submitBtn.disabled = true; submitBtn.textContent = 'Enviando...';
      var fd = new FormData(form); fd.append('cf_turnstile_response', turnstileToken);
      var xhr = new XMLHttpRequest(); xhr.open('POST', '/api/ticket.php', true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState !== 4) return;
        submitBtn.disabled = false; submitBtn.textContent = 'Abrir ticket'; resetTurnstile();
        try {
          var data = JSON.parse(xhr.responseText);
          if (data && data.ok) {
            msgEl.className = 'hl-msg success'; msgEl.textContent = data.message || 'Ticket enviado.';
            form.reset(); if (fileHint) fileHint.textContent = FILE_HINT; resetTurnstile(); setTimeout(closeModal, 2500);
          } else { msgEl.className = 'hl-msg error'; msgEl.textContent = (data && data.message) || 'Error al enviar.'; }
        } catch (err) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Error de conexión.'; }
      };
      xhr.send(fd);
    });
  })();
  </script>

  <script>
  (function () {
    'use strict';

    var openBtn = document.getElementById('bgOpenModal');
    var modal = document.getElementById('bgModal');
    var form = document.getElementById('bgForm');
    var msgEl = document.getElementById('bgMsg');
    var submitBtn = document.getElementById('bgSubmit');
    var turnstileContainer = document.getElementById('bgTurnstile');
    var catCards = document.querySelectorAll('.bug-cat-card');
    var formSection = document.getElementById('bgFormSection');
    if (!openBtn || !modal || !form) return;

    var selectedCategory = '';
    var turnstileWidgetId = null;
    var turnstileReady = false;
    var MAX_SIZE = 10 * 1024 * 1024;
    var MAX_FILES = 10;
    var IMG_ACCEPT = ['image/jpeg','image/png','image/gif','image/webp'];
    var fileInput = document.getElementById('bgScreenshots');
    var fileHint = document.getElementById('bgFileHint');
    var FILE_HINT = 'JPG, PNG, GIF o WebP · máx. 10 MB por imagen · hasta 10 imágenes';

    if (fileInput) {
      fileInput.addEventListener('change', function () {
        clearError(fileInput);
        var files = fileInput.files;
        if (files && files.length > 0) { fileHint.textContent = files.length + ' imagen(es) seleccionada(s)'; }
        else { fileHint.textContent = FILE_HINT; }
      });
    }

    function renderTurnstile() {
      if (turnstileWidgetId !== null || !turnstileContainer) return;
      if (typeof window.turnstile === 'undefined') return;
      turnstileWidgetId = window.turnstile.render(turnstileContainer, {
        sitekey: turnstileContainer.getAttribute('data-sitekey'),
        theme: 'dark', action: 'bug_report',
        callback: function () { turnstileReady = true; },
        'expired-callback': function () { turnstileReady = false; },
        'error-callback': function () { turnstileReady = false; }
      });
    }
    function resetTurnstile() {
      turnstileReady = false;
      if (turnstileWidgetId !== null && typeof window.turnstile !== 'undefined') { window.turnstile.reset(turnstileWidgetId); }
    }
    function openModal() {
      modal.classList.add('open'); document.body.style.overflow = 'hidden';
      if (window.location.pathname !== '/reportar-bug') { history.pushState({ modal: 'reportar-bug' }, '', '/reportar-bug'); }
    }
    function closeModal() {
      modal.classList.remove('open'); document.body.style.overflow = '';
      msgEl.className = 'hl-msg'; msgEl.textContent = ''; clearErrors(); resetTurnstile();
      if (window.location.pathname === '/reportar-bug') { history.pushState({ modal: null }, '', '/soporte'); }
    }
    function showError(el, msg) {
      el.classList.add('hl-input-error');
      var hint = el.parentNode.querySelector('.hl-field-error');
      if (!hint) { hint = document.createElement('span'); hint.className = 'hl-field-error'; el.parentNode.appendChild(hint); }
      hint.textContent = msg;
    }
    function clearError(el) {
      el.classList.remove('hl-input-error');
      var hint = el.parentNode.querySelector('.hl-field-error');
      if (hint) hint.remove();
    }
    function clearErrors() {
      form.querySelectorAll('.hl-input-error').forEach(function (el) { el.classList.remove('hl-input-error'); });
      form.querySelectorAll('.hl-field-error').forEach(function (el) { el.remove(); });
    }
    function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

    openBtn.addEventListener('click', openModal);
    modal.querySelector('.hl-modal-close').addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && modal.classList.contains('open')) closeModal(); });
    window.addEventListener('popstate', function () {
      if (window.location.pathname === '/reportar-bug') { openModal(); }
      else if (modal.classList.contains('open')) {
        modal.classList.remove('open'); document.body.style.overflow = '';
        msgEl.className = 'hl-msg'; msgEl.textContent = ''; clearErrors(); resetTurnstile();
      }
    });
    if (window.location.pathname === '/reportar-bug') { openModal(); }

    catCards.forEach(function (card) {
      card.addEventListener('click', function () {
        catCards.forEach(function (c) { c.classList.remove('selected'); });
        card.classList.add('selected');
        selectedCategory = card.getAttribute('data-cat');
        if (!formSection.classList.contains('visible')) { formSection.classList.add('visible'); renderTurnstile(); }
        msgEl.className = 'hl-msg'; msgEl.textContent = '';
      });
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault(); clearErrors(); msgEl.className = 'hl-msg'; msgEl.textContent = '';
      if (!selectedCategory) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Selecciona una categoría de bug antes de enviar.'; return; }
      var nameInput = document.getElementById('bgPlayerName');
      var accountInput = document.getElementById('bgAccount');
      var emailInput = document.getElementById('bgEmail');
      var subjectInput = document.getElementById('bgSubject');
      var descInput = document.getElementById('bgDescription');
      var valid = true;
      if (!nameInput.value.trim()) { showError(nameInput, 'Introduce el nombre de tu personaje.'); valid = false; } else { clearError(nameInput); }
      if (!accountInput.value.trim()) { showError(accountInput, 'Introduce el nombre de tu cuenta.'); valid = false; } else { clearError(accountInput); }
      if (!emailInput.value.trim()) { showError(emailInput, 'Introduce tu email de contacto.'); valid = false; } else if (!isValidEmail(emailInput.value.trim())) { showError(emailInput, 'El email no tiene un formato válido.'); valid = false; } else { clearError(emailInput); }
      if (!subjectInput.value.trim()) { showError(subjectInput, 'Introduce un asunto.'); valid = false; } else { clearError(subjectInput); }
      if (!descInput.value.trim()) { showError(descInput, 'Describe el bug.'); valid = false; } else { clearError(descInput); }
      if (fileInput && fileInput.files && fileInput.files.length > 0) {
        if (fileInput.files.length > MAX_FILES) { showError(fileInput, 'Solo puedes adjuntar un máximo de 10 imágenes.'); valid = false; }
        else {
          for (var fi = 0; fi < fileInput.files.length; fi++) {
            var sf = fileInput.files[fi];
            if (IMG_ACCEPT.indexOf(sf.type) === -1) { showError(fileInput, 'El formato de "' + sf.name + '" no es válido.'); valid = false; break; }
            else if (sf.size > MAX_SIZE) { showError(fileInput, '"' + sf.name + '" supera el tamaño máximo de 10 MB.'); valid = false; break; }
          }
          if (valid) clearError(fileInput);
        }
      }
      var turnstileToken = turnstileWidgetId !== null && typeof window.turnstile !== 'undefined' ? window.turnstile.getResponse(turnstileWidgetId) : '';
      if (!turnstileToken) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Completa la verificación de seguridad antes de enviar.'; return; }
      if (!valid) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Revisa los campos marcados antes de enviar.'; return; }
      submitBtn.disabled = true; submitBtn.textContent = 'Enviando...';
      var fd = new FormData(form); fd.append('category', selectedCategory); fd.append('cf_turnstile_response', turnstileToken);
      var xhr = new XMLHttpRequest(); xhr.open('POST', '/api/bugreport.php', true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState !== 4) return;
        submitBtn.disabled = false; submitBtn.textContent = 'Enviar reporte'; resetTurnstile();
        try {
          var data = JSON.parse(xhr.responseText);
          if (data && data.ok) {
            msgEl.className = 'hl-msg success'; msgEl.textContent = data.message || 'Reporte enviado.';
            form.reset(); catCards.forEach(function (c) { c.classList.remove('selected'); });
            selectedCategory = ''; formSection.classList.remove('visible');
            if (fileHint) fileHint.textContent = FILE_HINT; resetTurnstile(); setTimeout(closeModal, 2500);
          } else { msgEl.className = 'hl-msg error'; msgEl.textContent = (data && data.message) || 'Error al enviar.'; }
        } catch (err) { msgEl.className = 'hl-msg error'; msgEl.textContent = 'Error de conexión.'; }
      };
      xhr.send(fd);
    });
  })();
  </script>
</body>
</html>
