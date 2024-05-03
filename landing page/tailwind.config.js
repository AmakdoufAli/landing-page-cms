/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {
      boxShadow: {
        'rounded': '0px 0px 10px rgba(0,0,0,0.3)',
        'tr': '3px 0px 8px rgba(0,0,0,0.3)',
      },
      backgroundColor: {

      },
      screens: {
        'sr': '310px',
        'ml': '900px',
      },
      colors: {
        'blue-1': 'rgb(52, 87, 225)',
        'gray-1': 'rgba(25,	35,	53)',
        'pink-1': 'rgb(255, 230, 226)',
        'blue-2': 'rgb(227, 248, 251)',
        'orange-1': 'rgb(255, 249, 223)',
        'purpal-1': 'rgb(245, 230, 253)',
        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
      },
      borderColor: {

      },
      fontSize: {
        '16': '16px',
        '22': '22px',
        '32': '32px',
        '42': '42px',
        '50': '50px',
      },
      fontFamily: {
        'body': [
          'Inter',
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'system-ui',
          'Segoe UI',
          'Roboto',
          'Helvetica Neue',
          'Arial',
          'Noto Sans',
          'sans-serif',
          'Apple Color Emoji',
          'Segoe UI Emoji',
          'Segoe UI Symbol',
          'Noto Color Emoji'
        ],
        'sans': [
          'Inter',
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'system-ui',
          'Segoe UI',
          'Roboto',
          'Helvetica Neue',
          'Arial',
          'Noto Sans',
          'sans-serif',
          'Apple Color Emoji',
          'Segoe UI Emoji',
          'Segoe UI Symbol',
          'Noto Color Emoji'
        ]
      }
    },
  },
  plugins: [],
}

