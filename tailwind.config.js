/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    theme: {
        extend: {
            colors:{
                nolitcText: '#168753',
                adminSideColor: '#2c7b1f',
                headerColor: '#fff',
                hoverColor: '1f5b14'
            }
        },
    },
    plugins: [
    ],
}

