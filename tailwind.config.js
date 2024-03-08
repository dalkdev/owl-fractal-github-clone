module.exports = {
    content: [
        './src/components/**/*.hbs',
        './src/components/**/*.json'
    ],
    darkMode: 'media', // or 'media' or 'class'
    prefix: 'nw-',
    theme: {
        extend: {
            colors: {
                gray: {
                    100: '#F2F2F2',
                    '150': '#F2F5F9',
                    200: '#D9D9D9',
                    300: '#BFBFBF',
                    400: '#999999',
                    500: '#737373',
                    600: '#4D4D4D',
                    700: '#262626',
                },
                green: {
                    400: '#41BCA7',
                    500: '#6EB783',
                    600: '#77A79B',
                },
                red: {
                    100: '#E1B9BA',
                    200: '#DD8D8F',
                    300: '#D96165',
                    400: '#D5353A',
                    500: '#D20A11',
                    600: '#B3080E',
                    700: '#8C070B',
                },
                custom: {
                    '1-800': '#0063AF',
                    '1-700': '#4A5568',
                    '1-600': '#038ed5',
                    '1-500': '#1F90D1',
                    '2-400': '#495467',
                    '2-300': '#41BCA7',
                    '2-200': '#485199',
                    '1-200': '#414B5C',
                    'erwinteaser-bg': '#1f114c',
                    'erwinteaser-font-big': '#9dcde3',
                    'lesepaten-bg': '#F1F2F8',
                },
                blue: '#41B7CC',
                hk: {
                    'nw-blue-100': '#00B4D1',
                },
                lz: {
                    'nw-yellow-100': '#FFDC09',
                },
            },
            fontFamily: {
                body: ['Roboto', 'sans-serif'],
                roboto: ['Roboto', 'sans-serif'],
                montserrat: ['Montserrat', 'sans-serif'],
            },
            fontSize: {
                md: '1.125rem',
                '2.5xl': '1.75rem',
            },
            width: {
                '200px': '12.5rem',
            },
            minWidth: {
                '1/10': '10%',
                '2/10': '20%',
                '3/10': '30%',
                '4/10': '40%',
                '5/10': '50%',
                '6/10': '60%',
                '7/10': '70%',
                '8/10': '80%',
                '9/10': '90%',
                '1/12': '8.333333%',
                '2/12': '16.666667%',
                '3/12': '25%;',
                '4/12': '33.333333%',
                '5/12': '41.666667',
                '6/12': '50%',
                '7/12': '58.333333%',
                '8/12': '66.666667',
                '9/12': '75%',
                '10/12': '83.333333%',
                '11/12': '91.666667%',

            },
        },
    },
    safelist: [
        'bg-green-500',
        'nw-bg-green-500'
    ],
    variants: {
        extend: {
            backgroundColor: ['checked'],
            borderColor: ['checked'],
        },
    },
    plugins: [require('@tailwindcss/aspect-ratio')],
};
