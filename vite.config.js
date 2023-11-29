import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import dotenv from 'dotenv';
import fs from 'fs';

const envPath = path.resolve(__dirname, '.env');
if (!fs.existsSync(envPath)) {
    throw new Error('.env file not found at ' + envPath);
}

const dotEnv = dotenv.parse(fs.readFileSync(envPath));

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
    build: {
        outDir: path.resolve(__dirname, `public/${dotEnv['COURSE_CANONICAL']}`),
    },
});
