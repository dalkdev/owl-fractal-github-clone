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
                    0: '#F2F2F2', // 100 .. wurde geändert
                    100: '#D9D9D9', // 200
                    200: '#BFBFBF', // 300
                    300: '#999999', // 400
                    400: '#737373', // 500
                    500: '#4D4D4D', // 600
                    600: '#262626', // 700
                },
                green: {
                    0: '#85DE9F', // neu
                    100: '#6EB783', // war 500
                    200: '#579168', // neu
                    300: '#406B4D', // neu
                    400: '#41BCA7', // slate-0 wurde geänder
                    500: '#6EB783',  // ist 100 geworden
                    600: '#77A79B', // sky-0 wurde geänder
                },
                red: {
                    0: '#D20A11',  // war red-500
                    100: '#AB080E', // war #E1B9BA
                    200: '#85060B', // war #DD8D8F
                    300: '#5E0408', // war #D96165
                    400: '#D5353A',  // war #D5353A
                    500: '#D20A11',  // ist red-0 geworden
                    600: '#B3080E',  // ist red-100 geworden
                    700: '#8C070B',  // ist red-200 geworden
                },
                yellow: {
                    0: '#FEF3C7',  // neu
                    100: '#FDE68A',  // neu
                    200: '#FCD34D',  // neu
                    300: '#FBBF24',  // neu
                },
                slate: {
                    0: '#9CB3DB', // neu
                    100: '#8194B5',  // neu
                    200: '#66758F', // neu
                    300: '#4A5568',  // war custom-1-700
                },
                light: {
                    0: '#F2F5F9',  // neu
                    100: '#CED0D4', // neu
                    200: '#A9ABAD', // neu
                },
                sky: {
                    0: '#4F46E5',  // neu
                    100: '#352F99',  // neu
                    200: '#1A174D',  // neu
                },
                custom: {
                    '1-800': '#0063AF',  // ist sky-0 geworden
                    '1-700': '#4A5568',  // ist slate-300 geworden
                    '1-600': '#038ed5',  // ist slate-100 geworden
                    '1-500': '#1F90D1', // ist slate-0 geworden
                    '2-400': '#495467', // bleibt
                    '2-300': '#41BCA7', // bleibt
                    '2-200': '#485199', // bleibt
                    '1-200': '#414B5C', // bleibt
                    'erwinteaser-bg': '#1f114c', // bleibt
                    'erwinteaser-font-big': '#9dcde3', // bleibt
                    'lesepaten-bg': '#F1F2F8', // bleibt
                },
                blue: '#41B7CC', // nicht benutzt
                hk: {
                    'nw-blue-100': '#00B4D1', // bleibt
                },
                lz: {
                    'nw-yellow-100': '#FFDC09', // bleibt
                },
            },
            borderWidth: {
                '0.5': '0.5px',
                '6': '6px',
            },
            fontFamily: {
                body: ['Roboto', 'sans-serif'],
                roboto: ['Roboto', 'sans-serif'],
                montserrat: ['Montserrat', 'sans-serif'],
            },
            fontSize: {
                xs: ['0.75rem', {
                    lineHeight: '1.25rem',
                }],
                sm: ['0.875rem', {
                    lineHeight: '1.375rem',
                }],
                base: ['1rem', {
                    lineHeight: '1.5rem',
                }],
                md: ['1.125rem', {
                    lineHeight: '1.625rem',
                }],
                lg: ['1.25rem', {
                    lineHeight: '1.75rem',
                }],
                xl: ['1.5rem', {
                    lineHeight: '2rem',
                }],
                '2xl': ['1.75rem', {
                    lineHeight: '2.25rem',
                }],
                '3xl': ['2rem', {
                    lineHeight: '2.5rem',
                }],
                '4xl': ['2.5rem', {
                    lineHeight: '3rem',
                }],
                '5xl': ['3rem', {
                    lineHeight: '3.5rem',
                }],

            },
            height: {
                '4.5': '1.125rem',
            },
            width: {
                '200px': '12.5rem',
                '4.5': '1.125rem',
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
                '16': '4rem',
                '26': '6.5rem',
                '32': '8rem',
                '40': '10rem',

            },
        },
    },
    safelist: [
        'bg-green-100',
        'nw-bg-green-100'
    ],
    variants: {
        extend: {
            backgroundColor: ['checked'],
            borderColor: ['checked'],
        },
    },
    plugins: [require('@tailwindcss/aspect-ratio')],
};
