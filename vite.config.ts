import { defineConfig } from 'vite';
import istanbul from 'vite-plugin-istanbul';

export default defineConfig({
  plugins: [
    istanbul({
      include: 'src/*',
      exclude: ['node_modules', 'tests'],
      extension: ['.js', '.ts', '.vue'],
      requireEnv: true // nur aktiv, wenn COVERAGE=true gesetzt ist
    })
  ]
});