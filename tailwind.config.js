/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/views/**/*.blade.php',],
  theme: {
    extend: {
      colors: {
        'dark-teal': 'var(--dark-teal)',
        'teal': 'var(--teal)',
        'mint': 'var(--mint)',
        'ochre': 'var(--ochre)',
        'light-yellow': 'var(--light-yellow)',
        'light-green': 'var(--light-green)',
        'pale-green' : 'var(--pale-green)',
      },
    },
  },
  plugins: [],
}

