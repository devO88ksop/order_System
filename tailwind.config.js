import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/admin/layout/masterL.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
// './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/tailwind.blade.php',
//         './vendor/laravel/jetstream/**/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/admin/layout/masterL.blade.php',
