import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue()
  ],
  build: {
    target: 'esnext',
  },
  optimizeDeps: {
    disabled: true, // Désactive complètement le regroupement des dépendances
    esbuildOptions: {
      target: 'esnext',
    }
  },
  resolve: {
    // Force Vite à n'utiliser qu'une seule instance de ces paquets
    dedupe: ['vue', 'vite', '@vite/client'],
  },
  server: {
    // Parfois, le système de fichiers (FS) crée des chemins doubles (casse différente)
    fs: {
      strict: true
    }
  }
},
)
