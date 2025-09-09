import { defineConfig } from 'vite';

const HMR_PORT = parseInt(process.env.HMR_PORT) || 5000;

// https://vitejs.dev/config/
export default defineConfig({
  build: {
    assetsDir: 'fonts',
    manifest: false,
    rollupOptions: {
      input: ['src/js/app.ts', 'src/css/app.scss', 'src/css/fonts.scss'],
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },
  publicDir: 'src/static',
  plugins: [],
  server: {
    host: '0.0.0.0',
    port: HMR_PORT,
    hmr: {
      port: HMR_PORT,
      host: 'localhost'
    }
  },
});
