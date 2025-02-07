import defaultTheme from 'tailwindcss/defaultTheme';
import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'selector',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // primary: {
                //     '50': '#fcfaf0',
                //     '100': '#f7f2dd',
                //     '200': '#eee2ba',
                //     '300': '#e3cc8e',
                //     '400': '#d9b56b',
                //     '500': '#cd9a42',
                //     '600': '#bf8337',
                //     '700': '#9f692f',
                //     '800': '#80542c',
                //     '900': '#684626',
                //     '950': '#372313',
                // },
                'primary': {
                    '50': '#f9f6ed',
                    '100': '#f2eacf',
                    '200': '#e6d4a2',
                    '300': '#d6b76b',
                    '400': '#ca9e45',
                    '500': '#ba8a38',
                    '600': '#a06c2e',
                    '700': '#815027',
                    '800': '#6c4327',
                    '900': '#5d3926',
                    '950': '#351e13',
                },
                gray: {
                    '50': '#f7f8f8',
                    '100': '#edeef1',
                    '200': '#d8dbdf',
                    '300': '#b6bac3',
                    '400': '#8e95a2',
                    '500': '#6b7280',
                    '600': '#5b616e',
                    '700': '#4a4e5a',
                    '800': '#40444c',
                    '900': '#383a42',
                    '950': '#25272c',
                },
            },
        },
    },
    plugins: [],
};
