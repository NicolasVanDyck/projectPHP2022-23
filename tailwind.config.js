const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./vendor/laravel/jetstream/**/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Figtree", ...defaultTheme.fontFamily.sans],
        title: ["Roboto"],
        // Hier kunnen nog bijkomende fonts geplaats worden die we vaak gebruiken
      },
      backgroundImage: {
        "hero-pattern": ["url('/public/assets/background/wezeldrivers_upscale.jpg')"],
        "hero-pattern2": ["url('/public/assets/background/wezeldrivers_clublid.jpg')"],
        "hero-pattern3": ["url('/public/assets/background/wezeldrivers_admin.jpg')"],
      },
    },
  },

  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("tw-elements/dist/plugin.cjs"),
  ],
  darkMode: "class",
};
