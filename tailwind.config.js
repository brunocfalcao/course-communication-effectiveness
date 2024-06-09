/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        fontFamily: {
            'sans': ['Titillium Web', 'ui-sans-serif', 'system-ui'],
            'serif': ['ui-serif', 'Georgia'],
            'mono': ['ui-monospace', 'SFMono-Regular'],
        },
        extend: {
            screens: {
                'xs': '480px',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}

