'use strict';
const ENV_DEV = process.env.NODE_ENV === 'dev';
const HMR_PORT = process.env.HMR_PORT;
const HMR_URL = process.env.REPLIT_DOMAIN || 'localhost';

/* Create a new Fractal instance and export it for use elsewhere if required */
const fractal = (module.exports = require('@frctl/fractal').create());

// require the Mandelbrot theme module
const mandelbrot = require('@frctl/mandelbrot');

// require momentjs for date formatting
const moment = require('moment');
moment.locale('de');

const hbs = require('@frctl/handlebars')({
  helpers: {
    // Expose env vars to hbs
    IS_DEV: () => ENV_DEV,
    HMR_PORT: () => HMR_PORT,
    HMR_URL: () => HMR_URL,
  },
});

/**
 * Set component template engine.
 * @default hbs
 */
fractal.components.engine(hbs);
/**
 * Set docs template engine.
 * @default hbs
 */
fractal.docs.engine(hbs);

// global settings for easier usage
const settings = {
  title: 'Neue Westfälische Fractal',
  colors: {
    companyCi: '#D1050C',
    companyCiComplement: '#F2F2F2',
    linkColor: '#0093CA',
  },
  showPackageVersion: true,
  showGitCommit: true,
  showGeneratedDate: true,
  showUeUrl: true,
  gitlabRepoUrl: 'https://gitlab.com/technik-owl-digital/owl-fractal',
};

// get commit hash via console
let commitHash = '';

if (settings.showGitCommit) {
  try {
    commitHash = require('child_process')
      .execSync('git rev-parse --short HEAD')
      .toString();
  } catch (error) {
    console.log('could not get commit hash');
  }
}

const informationPanelContent = [];

settings.showPackageVersion &&
  informationPanelContent.push({
    label: 'Version',
    value: require('./package.json').version,
  });

settings.showGitCommit &&
  informationPanelContent.push({
    label: 'Commit',
    value: `
<a href='${settings.gitlabRepoUrl}/-/commit/${commitHash}' target='_blank'>
  ${commitHash}
</a>`,
  });

settings.showGeneratedDate &&
  informationPanelContent.push({
    label: 'Generiert am',
    value: new Date(),
    type: 'time', // Outputs a <time></time> HTML tag
    format: value => moment(value).format('DD.MM.YYYY, HH:mm'),
  });

settings.showGeneratedDate &&
  informationPanelContent.push({
    label: 'Umsetzung',
    value: `
<a href='https://www.nw.de/' target='_blank'>
NW.de
</a>
 / 
<a href='https://www.ueberbit.de/' target='_blank'>
ueberbit
</a>`,
  });

// create a new instance with custom config options
const myCustomisedTheme = mandelbrot({
  styles: [
    '/themes/mandelbrot/css/default.css',
    ENV_DEV
      ? `http://${HMR_URL}:${HMR_PORT}/src/css/fractal-custom.css`
      : '/fractal-custom.scss',
  ],
  skin: {
    name: 'default',
    accent: settings.colors.companyCi,
    complement: settings.colors.companyCiComplement,
    links: settings.colors.linkColor,
  },
  nav: ['search', 'docs', 'components', 'information'],
  panels: ['notes', 'html', 'info'],
  lang: 'de',
  labels: {
    info: 'Informationen',
    builtOn: 'Generiert am',
    search: {
      label: 'Suchen',
      placeholder: 'Suchen…',
      clear: 'Suche löschen',
    },
    tree: {
      collapse: 'Alles einklappen',
    },
    components: {
      docs: 'Dokumentation',
      handle: 'Handle',
      tags: 'Tags',
      variants: 'Varianten',
      context: {
        empty: 'Kein Kontext vorhanden.',
      },
      notes: {
        empty: 'Keine Notizen vorhanden.',
      },
      preview: {
        label: 'Vorschau',
        withLayout: 'Mit Layout',
        componentOnly: 'Nur Komponente',
      },
      path: 'Pfad im Dateisystem',
      references: 'Referenzen',
      referenced: 'Referenziert von',
      resources: {
        file: 'Datei',
        content: 'Inhalt',
        previewUnavailable:
          'Vorschauen werden bei diesem Dateitypen aktuell nicht unterstützt.',
        url: 'URL',
        path: 'Pfad im Dateisystem',
        size: 'Größe',
      },
    },
    panels: {
      html: 'HTML',
      view: 'Ansicht',
      context: 'Kontext',
      resources: 'Ressourcen',
      info: 'Info',
      notes: 'Notizen',
    },
  },
  information: informationPanelContent,
});

// tell Fractal to use the configured theme by default
fractal.web.theme(myCustomisedTheme);

/* Set the title of the project */
fractal.set('project.title', settings.title);

fractal.set('project.author', 'UEBERBIT GmbH');

/* Tell Fractal where the components will live */
fractal.components.set('path', __dirname + '/src/components');
fractal.components.set('label', 'Komponenten');

// set statuses for components
fractal.components.set('statuses', {
  wip: {
    label: 'Work in Progress',
    description:
      'Noch nicht implementiert oder in der Implementierungsphase. Nicht repräsentativ.',
    color: '#FF3333',
  },
  qm: {
    label: 'Testing',
    description: 'Freigegeben zum Testen.',
    color: '#ffbc11',
  },
  ready: {
    label: 'Ready',
    description: 'Getestet und freigegeben.',
    color: '#29CC29',
  },
});
fractal.components.set('default.status', 'wip');

/* Tell Fractal where the documentation pages will live */
fractal.docs.set('path', __dirname + '/src/docs');
fractal.docs.set('label', 'Dokumentation');
fractal.docs.set('indexLabel', 'Allgemein');

/* Tell Fractal where the files are located */
fractal.web.set('static.path', __dirname + '/dist');

/* Virtual path prefix for the files that are served from the static asset directory specified in the static.path option. */
// fractal.web.set('static.mount', 'project-assets');

/* Set the static HTML build destination */
fractal.web.set('builder.dest', __dirname + '/build');

fractal.web.set('server.syncOptions', {
  reloadDelay: 0,
  files: ['src/components/**/*.hbs'],
});
