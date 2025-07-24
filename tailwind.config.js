// Add this line at the very top of your tailwind.config.js file
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // Your black and yellow palette
                'dark-primary': '#1a1a1a',          // Main dark background
                'dark-secondary': '#2c2c2c',        // Lighter dark for elements like responsive menu or slightly elevated cards
                'dark-hover': '#3a3a3a',            // Darker hover state for background elements
                'yellow-accent': '#ffd700',         // Your primary vibrant yellow (Gold)
                'yellow-accent-light': '#ffe64d',   // Lighter yellow for hover states
                'yellow-accent-dark': '#e0b800',    // Darker yellow for active states or borders
                'yellow-accent-dark-focus-ring': '#bf9e00', // Even darker yellow for focus rings/active borders
            },
            fontFamily: {
                // This line now correctly uses the imported defaultTheme
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'), // Make sure this is also imported if you're using `forms`
    ],
};
