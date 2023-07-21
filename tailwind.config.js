/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{js,ts,jsx,tsx}",
    './resources/views/**/*.blade.php',
    './resources/css/*.css'
  ],
  theme: {
    colors: {
      'orange': '#ff5935'
    },
    extend: {},
  },
  plugins: [],
}

