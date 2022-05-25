module.exports = {
  purge: { layers: ['utilities'], content: ['./src/components/**/*.hbs'] },
  darkMode: false, // or 'media' or 'class'
  prefix: 'nw-',
  theme: {
    extend: {
      colors: {
        gray: {
          100: '#F2F2F2',
          200: '#D9D9D9',
          300: '#BFBFBF',
          400: '#999999',
          500: '#737373',
          600: '#4D4D4D',
          700: '#262626',
        },
        green: {
          400: '#41BCA7',
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
          '1-800': '#0070C0',
          '1-700': '#4A5568',
          '1-600': '#038ed5',
          '1-500': '#1F90D1',
          '2-400': '#495467',
          '2-300': '#41BCA7',
        },

        blue: '#41B7CC',
      },
      fontFamily: {
        body: ['Roboto', 'sans-serif'],
        roboto: ['Roboto', 'sans-serif'],
        montserrat: ['Montserrat', 'sans-serif'],
      },
      fontSize: {
        xs: '0.75rem',
        sm: '0.875rem',
        tiny: '1rem',
        base: '1.125rem',
        lg: '1.25rem',
        xl: '1.5rem',
        '2xl': '1.75rem',
      },
      spacing: {
        1: '0.5rem',
        2: '0.75rem',
        3: '1rem',
        4: '1.5rem',
        'teaser-width': '7.5rem',
        'teaser-height': '4.5rem',
        'video-height': '12.5rem',
      },
      width: {
        '200px': '12.5rem',
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['checked'],
      borderColor: ['checked'],
    },
  },
  plugins: [require('@tailwindcss/aspect-ratio')],
};
