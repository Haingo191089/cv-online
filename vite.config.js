import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import fs from 'fs';

async function getFileNameByRegex (path, regexArr, prefix) {
    return await new Promise((resolve) => {
        const result = [];
        fs.readdir(path, (err, files) => {
            files.forEach(file => {
                let isMatchRegex = false;
                for (let i = 0; i < regexArr.length; i++) {
                    if (regexArr[i].test(file)) {
                        isMatchRegex = true;
                        break;
                    }
                }
                if (isMatchRegex) {
                    result.push(`${prefix}${file}`)
                }
            });
            resolve(result);
        });
    })
}

async function getListJSFileBuild () {
    const regexArr = [
        /^template\d+\.js$/i,
        /_page\.js$/i,
    ];
    const folderPath = './resources/js';
    const result = await getFileNameByRegex(folderPath, regexArr, 'resources/js/');
    return [
        'resources/js/app.js',
        ...result
    ];
}

async function getListScssFileBuild () {
    const regexArr = [
        /^template\d+\.scss$/i,
        /_page\.scss$/i,
    ];
    const folderPath = './resources/scss';
    const result = await getFileNameByRegex(folderPath, regexArr, 'resources/scss/');
    return [
        'resources/scss/app.scss',
        ...result
    ];
}

async function getInputConfig () {
    const jsFile = await getListJSFileBuild();
    const scssFile = await getListScssFileBuild();
    return [
        ...jsFile,
        ...scssFile
    ]
}

export default defineConfig(async ({ command, mode }) => {
    const inputConfig = await getInputConfig()
    return {
            plugins: [
                laravel({
                    input: [
                       ...inputConfig
                    ],
                    refresh: true,
                }),
            ],
            resolve: {
                alias: {
                    '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
                }
            },
        }
})