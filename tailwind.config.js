// tailwind.config.js
export default {
  content: ["./resources/**/*.blade.php","./resources/js/**/*.js"],
  theme: {
    extend: {
      colors: {
        brand: {
          lavender: "#c9c3d8",
          lavenderDark: "#b3acc9",
          text: "#6c6a7a"
        }
      },
      container: { center: true, screens: { xl: "1200px" } }
    }
  }
}
