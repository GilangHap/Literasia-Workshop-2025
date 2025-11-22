import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'literasia': {
                    'teal': '#5EA38B',
                    'teal-dark': '#4A8F78',
                    'mustard': '#DDAF54',
                    'leaf': '#AFCF8B',
                    'turquoise': '#7EB396',
                },
            },
        },
    },

    plugins: [forms],
};
