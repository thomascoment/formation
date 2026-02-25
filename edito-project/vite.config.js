import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [vue()],
  // On force Vite à traiter les fichiers .js comme des sources à transformer
  esbuild: {
    include: /\.[jt]sx?$/,
    exclude: [],
  },
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    fs: {
      // Autorise l'accès aux fichiers en dehors de la racine si besoin
      strict: false 
    }
  }
})


