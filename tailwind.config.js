module.exports = {
  mode: 'jit',
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
        red: {
          100: '#E1B9BA',
          200: '#DD8D8F',
          300: '#D96165',
          400: '#D5353A',
          500: '#D20A11',
          600: '#B3080E',
        },
        custom: {
          '1-700': '#4A5568',
        },
        blue: '#41B7CC',
      },
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
        montserrat: ['Montserrat', 'sans-serif'],
      },
      fontSize: {
        xs: '12px',
        sm: '14px',
        tiny: '16px',
        base: '18px',
        lg: '20px',
        xl: '24px',
        '2xl': '28px',
      },
      spacing: {
        1: '8px',
        2: '12px',
        3: '16px',
        4: '24px',
        'teaser-width': '125px',
        'teaser-height': '72px',
        'video-height': '200px',
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
