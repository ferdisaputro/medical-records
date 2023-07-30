/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "vendor/laravel/framework/src/Illuminate/Pagination/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
