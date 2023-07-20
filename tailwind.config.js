/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            backgroundColor: {
                'primary': '#006aac',
                'secondary': '#b7da35',
            },
            textColor: {
                'primary': '#006aac',
                'secondary': '#b7da35',
            },
        }
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
