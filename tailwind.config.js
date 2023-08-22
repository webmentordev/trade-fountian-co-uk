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
            screens: {
                "1260px":{
                    "max": "1260px"
                },
                "1140":{
                    "max": "1140px"
                },
                "1000":{
                    "max": "1000px"
                },
                "980px":{
                    "max": "980px"
                },
                "970":{
                    "max": "970px"
                },
                "940":{
                    "max": "940px"
                },
                "870px":{
                    "max": "870px"
                },
                "815px":{
                    "max": "815px"
                },
                "810px":{
                    "max": "810px"
                },
                "785px":{
                    "max": "785px"
                },
                "780":{
                    "max": "780px"
                },
                "720":{
                    "max": "720px"
                },
                "660":{
                    "max": "660px"
                },
                "555":{
                    "max": "555px"
                },
                "500":{
                    "max": "500px"
                },
                "490px":{
                    "max": "490px"
                },
                "460px":{
                    "max": "460px"
                },
                "440px":{
                    "max": "440px"
                },
                "410px":{
                    "max": "410px"
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
