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
                sans: ['Plus Jakarta Sans', 'Outfit', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#eefbf4',
                    100: '#d7f4e3',
                    200: '#b3e9ca',
                    300: '#7fd8a8',
                    400: '#46bf7d',
                    500: '#249f61',
                    600: '#167f4b',
                    700: '#12653d',
                    800: '#105133',
                    900: '#0d432b',
                    950: '#052519',
                },
                accent: {
                    50: '#fbfaf7',
                    100: '#f5f2ea',
                    200: '#ece4d4',
                    300: '#dcccae',
                    400: '#c5ad7a',
                    500: '#b08f56',
                    600: '#997345',
                    700: '#7c5a38',
                    800: '#654a32',
                    900: '#543f2d',
                    950: '#2f2116',
                },
                sidebar: {
                    DEFAULT: '#0f261d',
                    active: '#249f61',
                    text: '#94b8a8',
                    hover: '#163428',
                },
                success: '#1f9d68',
                info: '#1d6f8a',
                warning: '#c68b2f',
                danger: '#c55252',
            },
        },
    },

    plugins: [forms],
};
