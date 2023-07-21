const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{js,ts,jsx,tsx}",
    './resources/views/**/*.blade.php',
    './resources/css/*.css'
  ],
  theme: {
    ...defaultTheme,
    extend: {
      colors: {
        'orange': '#ff5935'
      }
    },
  },
  plugins: [],

  corePlugins: {
    preflight: false,
 }

}

