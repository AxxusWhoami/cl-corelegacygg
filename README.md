# CoRe Legacy — Sitio Web Oficial

[![Open in Bolt](https://bolt.new/static/open-in-bolt.svg)](https://bolt.new/~/sb1-cmghnodx)

Sitio web del servidor privado de World of Warcraft: Wrath of the Lich King (WotLK) 3.3.5a **CoRe Legacy**. Pagina de aterrizaje, comunidad, guias, registro de cuenta, estado del reino y changelog, con estetica visual de hielo y oro inspirada en Rasganorte.

## Tecnologia

- **HTML estatico** — sin framework de frontend (sin React, Vue, etc.)
- **Tailwind CSS 3.4** — compilado a `assets/tailwind.css` con PostCSS + Autoprefixer
- **JavaScript vanilla** — modulos IIFE en archivos independientes
- **PHP 7.4+** — API backend con MySQL (mysqli) y Redis para cache
- **Fuentes autoalojadas** — Cinzel y Cinzel Decorative (woff2)

## Estructura del Proyecto

```
.
├── index.html              # Pagina principal (landing page)
├── comunidad.html          # Comunidad: Muro de Primeros del Reino + Guias
├── info-changelog.html     # Informacion del servidor + Changelog
├── serve.json              # Config de rewrites para `npx serve`
├── .htaccess               # Rewrites para Apache (clean URLs, deep links)
├── tailwind.config.js      # Configuracion de Tailwind
├── postcss.config.js       # PostCSS con Tailwind + Autoprefixer
├── params.php              # Config central: credenciales MySQL y Redis
│
├── api/
│   ├── proxy.php           # Proxy CORS para assets del visor 3D (Wowhead/ZAM)
│   ├── realmfirst.php      # Logros "Realm First" con cache Redis
│   └── subscribe.php      # Newsletter de lanzamiento
│
├── assets/
│   ├── core.css            # Estilos globales (fuentes, colores, animaciones)
│   ├── core.js             # Efectos UI: nieve, scroll, nav movil, back-to-top
│   ├── tailwind-input.css  # Entrada de Tailwind (directivas @tailwind)
│   ├── tailwind.css        # Salida compilada (generada por build)
│   ├── guias.js            # Sistema de guias interactivas (modal + deep linking)
│   ├── legal.js            # Modales legales (TOS + Privacidad + deep linking)
│   ├── *.webp / *.png      # Imagenes del sitio (hero, features, iconos)
│   ├── *.woff2             # Fuentes Cinzel y Cinzel Decorative
│   └── icons/              # Iconos de logros y clases (small/medium/large)
│
├── lib/
│   └── wow-model-viewer/   # Visor 3D de personajes WoW
│
├── public/
│   └── *.webp              # Imagenes optimizadas (features, paneles)
│
├── sitemap.xml             # Sitemap (7 URLs)
├── robots.txt               # Allow all, disallow /api/, permite bots de IA
├── site.webmanifest        # PWA manifest
└── favicon.*               # Favicons (svg, ico, png)
```

## Paginas

### `index.html` — Landing Page
Pagina principal con SEO completo en espanol. Incluye:
- Hero con imagen de la Ciudadela de la Corona de Hielo
- Seccion de caracteristicas (11 features con tarjetas encadenadas)
- Enlaces a registro de cuenta (`accounts.corelegacy.gg`)
- Modales de newsletter y enlaces legales
- JSON-LD estructural: `WebSite`, `VideoGame`, `FAQPage`, `Organization`, etc.
- Redes sociales: Facebook y Discord

### `comunidad.html` — Comunidad
- **Muro de Primeros del Reino**: grilla de logros "Realm First" con datos en vivo desde `api/realmfirst.php`
- **Guias interactivas**: sistema de modales con deep linking (`/guias/<slug>`)
- Guias disponibles:
  - `guia-de-descarga-e-inicio-rapido` — Descarga e instalacion
  - `requisitos-de-hardware` — Requisitos del sistema
  - `guia-addon-dungeonclear` — Addon DungeonClear (bot tanque)

### `info-changelog.html` — Informacion y Changelog
- Tarjetas de informacion con 4 variantes de color (oro, escarcha, hielo, matriz)
- Panel de changelog desplazable
- JSON-LD: `VideoGame`, `SoftwareApplication`, `Organization`

## API

### `api/proxy.php`
Proxy CORS para assets del visor 3D de modelos WoW. Solo permite hosts de la lista de permitidos (`wow.zamimg.com`, `wotlk.murlocvillage.com`, `wotlk.evowow.com`, `nether.wowhead.com`). Metodo GET, cache de 24h.

### `api/realmfirst.php`
Devuelve logros "Realm First" desde la base de datos `acore_characters`. Usa Redis como cache (TTL 1h). Parametro `?refresh=1` para forzar consulta SQL y actualizar cache (uso de cron).

**Respuesta:**
```json
{
  "ok": true,
  "count": 42,
  "entries": [{ "achievement_id", "label", "name", "category", "icon_*", "character_name", "race", "class", "gender", "level", "date", "claimed" }],
  "updated_at": "2026-09-02T12:00:00Z"
}
```

### `api/subscribe.php`
Suscripcion al newsletter de lanzamiento. Metodo POST con JSON `{"email":"..."}`. Auto-crea la tabla `launch_newsletter` si no existe. Registra pais del visitante via header de Cloudflare. Previene duplicados con `ON DUPLICATE KEY UPDATE`.

## JavaScript

### `assets/core.js`
Efectos visuales del lado del cliente:
- Nieve animada (12 particulas en movil, 28 en escritorio)
- Cambio de estilo del header al hacer scroll
- Menu de navegacion movil
- Animaciones reveal al hacer scroll (IntersectionObserver)
- Boton volver arriba

### `assets/guias.js`
Sistema de guias interactivas:
- Objeto `GUIDES` con todas las guias (titulo, icono, HTML, meta SEO, JSON-LD)
- Renderizado automatico de tarjetas en la pagina de comunidad
- Apertura en modal con deep linking (`/guias/<slug>`)
- Acordeon FAQ con inyeccion de JSON-LD `FAQPage`
- Actualizacion dinamica de `document.title` y meta description

### `assets/legal.js`
Modales legales (TOS y Politica de Privacidad):
- Contenido HTML completo en espanol (fechado Junio 2026)
- Deep linking: `/terminos-de-servicio` y `/politica-de-privacidad`
- Apertura desde botones con `data-legal="tos"` / `data-legal="privacy"`
- Cierre con Escape, clic en backdrop, o boton aceptar

## Estilos

### `assets/core.css`
Hoja de estilos global con identidad visual WotLK:
- **Fuentes**: Cinzel (400-700) y Cinzel Decorative (700, 900)
- **Colores**: escala de hielo (`--ice-50` a `--ice-900`), `--gold`, `--frost`, `--bg: #050d18`
- **Animaciones**: `snowfall`, `float`, `iceGlow`, `textGlow`, `pulseGlow`, `shimmer`, `fadeInUp`, `scaleIn`
- **Componentes**: `.frost-divider`, `.nav-link`, `.reveal`, `.site-footer`, scrollbar personalizado

### Tailwind CSS
Compilado con `npm run build`. Entrada: `assets/tailwind-input.css` -> Salida: `assets/tailwind.css` (minificada). Configuracion en `tailwind.config.js` escanea `./*.html` y `./assets/*.js`.

## SEO

- Meta tags en espanol en todas las paginas
- JSON-LD estructural multipagina (`WebSite`, `VideoGame`, `Organization`, `FAQPage`, `BreadcrumbList`, `SpeakableSpecification`)
- Sitemap con 7 URLs y prioridades
- `robots.txt` permite bots de IA (GPTBot, ClaudeBot, PerplexityBot, Google-Extended)
- URLs limpias via `.htaccess` y `serve.json`

## URLs Limpias y Deep Linking

| URL | Destino | Mecanismo |
|---|---|---|
| `/` | `index.html` | Directo |
| `/comunidad` | `comunidad.html` | Rewrite |
| `/info-changelog` | `info-changelog.html` | Rewrite |
| `/guias/<slug>` | `comunidad.html` | Rewrite + JS abre modal |
| `/terminos-de-servicio` | `index.html` | Rewrite + JS abre modal |
| `/politica-de-privacidad` | `index.html` | Rewrite + JS abre modal |

## Comandos

```bash
npm run build    # Compila Tailwind CSS (tailwind-input.css -> tailwind.css)
npm run dev      # Servidor de desarrollo en http://localhost:5173
```

## Configuracion

### `params.php`
Configuracion central de backend con credenciales de MySQL y Redis. Utilizado por los endpoints de la API.

### Variables de entorno (`.env`)
El proyecto incluye un archivo `.env` con credenciales preconfiguradas para el entorno de desarrollo.

## PWA

El sitio incluye un manifest PWA (`site.webmanifest`) con:
- Nombre: "CoRe Legacy"
- Display: standalone
- Color de tema/fondo: `#050d18`
- Iconos: 192px y 512px (maskable)

## Licencia

CoRe Legacy. Todos los derechos reservados.
