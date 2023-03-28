<?php

echo "***********************************************************\n";
echo "***********************************************************\n";
echo "****             CV ONLINE COMMANDS                    ****\n";
echo "**** clear       clear cache for app                   ****\n";
echo "**** build-app   generate key, migrate, seed DB        ****\n";
echo "**** run         run app at develop mode               ****\n";
echo "**** build       build script for preparing production ****\n";
echo "**** exit        return to CMD                         ****\n";
echo "***********************************************************\n";
echo "***********************************************************\n";

while (true) {
    $keyInput = readline("Keypress: ");
    switch ($keyInput) {
        case "clear":
            echo shell_exec(join(" && ", [
                "php artisan route:clear",
                "php artisan view:clear",
                "php artisan cache:clear",
                "php artisan config:clear",
                "php artisan env",
            ]));
            echo "Clear::Done!!!!\n";
            break;
        case "build-app":
            echo shell_exec(join(" && ", [
                "composer install",
                "npm install",
                "php artisan config:clear",
                "php artisan cache:clear",
                "php artisan env",
                "php artisan key:generate",
                "php artisan migrate",
                "php artisan db:seed",
                "php artisan storage:link",
            ]));
            echo "Rebuild::Done!!!!\n";
            break;
        case "run":
            echo system("cmd /c " . __DIR__ . "\\run_app.bat");
            echo "\n";
            break;
        case "build":
            echo shell_exec(join(" && ", [
                "npm run build",
            ]));
            break;
        case "exit":
            return;
        default:
            echo "Input Command not true\n";
            break;
    }
}
