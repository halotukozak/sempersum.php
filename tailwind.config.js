const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                128: '32rem',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
        width: ["responsive", "hover", "focus"],
        textColor: ['dark'],
    },

    darkMode: 'class',

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],

};

