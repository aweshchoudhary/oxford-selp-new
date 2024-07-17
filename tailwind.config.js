/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: "hsl(var(--primary))",
      },
      fontFamily: {
        tnr: ["Times New Roman", "serif"],
      },
      fontWeight: {
        "tnr-normal": "400", // Regular font weight
        "tnr-bold": "700", // Bold font weight
      },
    },
  },
  daisyui: {
    themes: ["light"],
  },
  plugins: [require("daisyui")],
};
