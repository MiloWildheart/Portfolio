/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      emerald: colors.emerald,
      indigo: colors.indigo,
      yellow: colors.yellow,
      slate: colors.slate,
      green: colors.green,
      red: colors.red,
      orange: colors.orange,
      ash: '#C7D1C8',
      ash2: '#DDE3DE',
      ash3: '#A4B6A7',
    extend: {},
  },
},
  plugins: [],
}

