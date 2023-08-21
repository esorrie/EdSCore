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
        'orange': '#ff5935',
        'grey': '#ffffff80',
        'darkgrey': '#3C3C3C',
        'black': '#000000',
        'fadegrey': '#4a4a4a69',
      },
      gridTemplateColumns: {
        '11': 'repeat(11,minmax(0, 1fr))',
        '15': 'repeat(15,minmax(0, 1fr))'
      },
      spacing: {
        '840': '52.5rem',
        '448': '448px'
      },
      
    },
  },
  plugins: [],

  corePlugins: {
    preflight: false,
 }

}

