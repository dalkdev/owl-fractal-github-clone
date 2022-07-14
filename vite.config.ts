import { defineConfig } from 'vite';

const HMR_PORT = parseInt(process.env.HMR_PORT);

// https://vitejs.dev/config/
export default defineConfig({
  build: {
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
    port: HMR_PORT,
  },
});
