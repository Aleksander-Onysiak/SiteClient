import { defineConfig } from "vite";

export default defineConfig({
  base: "/wp-content/themes/siteclient/dist/",
  build: {
    manifest: true,
    assetsInlineLimit: 0,
    target: ["es2015"],
    rollupOptions: {
      input: {
        js: "./wp-content/themes/siteclient/src/js/main.js",
        css: "./wp-content/themes/siteclient/src/css/style.scss", // css compilé (via vite ou postcss)
      },
      output: {
        dir: "./wp-content/themes/siteclient/dist",
        entryFileNames: "assets/js-[name].[hash].js",     // JS dans assets/
        assetFileNames: "assets/[name].[hash].[ext]",
      },
    },
  },
});
