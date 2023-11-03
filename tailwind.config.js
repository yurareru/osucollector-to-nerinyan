/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.vue",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        aoa: {
          primary: "#641ae6",
          secondary: "#d926a9",
          accent: "#1fb2a6",
          neutral: "#1c1b22",
          "base-100": "#181a1b",
          info: "#3abff8",
          success: "#36d399",
          warning: "#fbbd23",
          error: "#f87272",
        },
      },
    ],
  },
};
