<?php

$autoloadPath = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($autoloadPath)) {
    http_response_code(500);
    echo '<!DOCTYPE html>
<html lang="en" class="h-full bg-[#05010a]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composer Install Required - Nucleus Framework</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    <style>body { font-family: "Plus Jakarta Sans", sans-serif; } code { font-family: "Fira Code", monospace; }</style>
</head>
<body class="h-full flex items-center justify-center p-6 text-slate-300 antialiased">
    <div class="max-w-lg w-full p-8 rounded-3xl bg-[#0e051c] border border-purple-500/30 shadow-2xl space-y-6 text-center">
        <div class="w-16 h-16 rounded-2xl bg-purple-950/60 border border-purple-500/30 flex items-center justify-center mx-auto text-3xl">
            ⚡
        </div>
        <div class="space-y-2">
            <h1 class="text-2xl font-extrabold text-white">Composer Install Required</h1>
            <p class="text-sm text-slate-400">The core framework dependencies have not been installed yet for this Nucleus project.</p>
        </div>
        <div class="p-4 rounded-2xl bg-[#05010a] border border-purple-500/20 text-center font-mono text-sm space-y-2">
            <div class="text-slate-400 text-xs font-bold uppercase tracking-wider">Run this command in your terminal</div>
            <div class="text-purple-300 font-bold text-base">composer install</div>
        </div>
    </div>
</body>
</html>';
    exit;
}

require_once __DIR__ . '/../bootstrap/app.php';

use Core\Routing\Route;
use Core\Routing\Router;

require_once __DIR__ . '/../routes/web.php';

Route::group(['prefix' => 'api'], function () {
    require_once __DIR__ . '/../routes/api.php';
});

Router::dispatch();
