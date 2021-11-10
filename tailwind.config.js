module.exports = {
  purge: { layers: ['utilities'], content: ['./src/components/**/*.hbs'] },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'nw-gray': {
          100: '#F2F2F2',
          200: '#C8C8C8',
          300: '#999999',
          400: '#737373',
          500: '#4D4D4D',
        },
        'nw-red': {
          100: '#D20A11',
          200: '#D1050C',
        },
        'nw-blue': '#41B7CC',
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
  variants: {},
  plugins: [require('@tailwindcss/aspect-ratio')],
};
