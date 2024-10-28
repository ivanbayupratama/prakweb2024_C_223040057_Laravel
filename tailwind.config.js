/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            animation: {
                "loop-scroll": "loop-scroll 7s linear infinite",
            },
            keyframes: {
                "loop-scroll": {
                    from: { transform: "translateX(100%)" },
                    to: { transform: "translateX(-100%)" },
                },
            },
            fontFamily: {
                poppins: ["Poppins"],
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("@tailwindcss/typography")],
};
