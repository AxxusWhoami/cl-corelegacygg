#!/usr/bin/env node
/**
 * Generates sitemap.xml with automatic lastmod dates based on file modification times.
 * Run: node scripts/generate-sitemap.js
 */
const fs = require('fs');
const path = require('path');

const BASE_URL = 'https://corelegacy.gg';
const projectRoot = path.resolve(__dirname, '..');

const pages = [
  { url: '/', file: 'index.html', priority: '1.0', changefreq: 'daily' },
  { url: '/noticias', file: 'noticias.html', priority: '0.9', changefreq: 'daily' },
  { url: '/comunidad', file: 'comunidad.html', priority: '0.9', changefreq: 'weekly' },
  { url: '/info-changelog', file: 'info-changelog.html', priority: '0.8', changefreq: 'weekly' },
  { url: '/calculadora', file: 'calculadora.html', priority: '0.8', changefreq: 'weekly' },
  { url: '/tops', file: 'tops.html', priority: '0.6', changefreq: 'monthly' },
  { url: '/sobre-nosotros', file: 'sobre-nosotros.html', priority: '0.5', changefreq: 'monthly' },
  { url: '/soporte', file: 'soporte.php', priority: '0.8', changefreq: 'weekly' },
  { url: '/guias/guia-de-descarga-e-inicio-rapido', file: 'guias/guia-de-descarga-e-inicio-rapido.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/requisitos-de-hardware', file: 'guias/requisitos-de-hardware.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-playerbots-ia-wow-wotlk-solitario', file: 'guias/guia-playerbots-ia-wow-wotlk-solitario.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-de-cero-a-heroe-playerbots', file: 'guias/guia-de-cero-a-heroe-playerbots.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-practica-avanzada-multibot', file: 'guias/guia-practica-avanzada-multibot.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-buscar-playerbots-grupo-banda', file: 'guias/guia-buscar-playerbots-grupo-banda.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-addon-dungeonclear', file: 'guias/guia-addon-dungeonclear.html', priority: '0.7', changefreq: 'monthly' },
  { url: '/guias/guia-aumentar-fps-dxvk-vulkan', file: 'guias/guia-aumentar-fps-dxvk-vulkan.html', priority: '0.7', changefreq: 'monthly' },
];

let xml = '<?xml version="1.0" encoding="UTF-8"?>\n';
xml += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n';

for (const page of pages) {
  const filePath = path.join(projectRoot, page.file);
  const stat = fs.statSync(filePath);
  const lastmod = stat.mtime.toISOString().split('T')[0];

  xml += '  <url>\n';
  xml += `    <loc>${BASE_URL}${page.url}</loc>\n`;
  xml += `    <lastmod>${lastmod}</lastmod>\n`;
  xml += `    <changefreq>${page.changefreq}</changefreq>\n`;
  xml += `    <priority>${page.priority}</priority>\n`;
  xml += '  </url>\n';
}

xml += '</urlset>\n';

const sitemapPath = path.join(projectRoot, 'sitemap.xml');
fs.writeFileSync(sitemapPath, xml, 'utf-8');
console.log(`Sitemap generated at ${sitemapPath} with ${pages.length} URLs.`);
