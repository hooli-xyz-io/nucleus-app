<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nucleus - Next-Gen PHP Framework')</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @fluxAssets
    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #07020d;
        }
        .glow-purple {
            box-shadow: 0 0 50px -10px rgba(168, 85, 247, 0.3);
        }
        .bg-mesh {
            background-image: 
                radial-gradient(at 0% 0%, rgba(126, 34, 206, 0.18) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(147, 51, 234, 0.15) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(88, 28, 135, 0.2) 0px, transparent 50%);
        }
        .glass-panel {
            background: rgba(15, 7, 26, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(168, 85, 247, 0.15);
        }
        .glass-panel:hover {
            border-color: rgba(168, 85, 247, 0.35);
        }
    </style>
</head>
<body class="text-slate-100 min-h-screen flex flex-col justify-between bg-mesh antialiased">
    
    <!-- Top Glass Navigation Bar -->
    <header class="sticky top-0 z-50 border-b border-purple-500/10 backdrop-blur-xl bg-[#07020d]/80 px-4 lg:px-8 py-3.5">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-purple-950/60 border border-purple-500/30 flex items-center justify-center group-hover:border-purple-400/60 transition-all duration-300">
                    <img src="/icon-transparent.svg" alt="Nucleus Logo" class="w-7 h-7">
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-extrabold tracking-wider text-white group-hover:text-purple-300 transition-colors">NUCLEUS</span>
                    <span class="text-[10px] font-bold tracking-widest text-purple-400 uppercase -mt-1">PHP Framework</span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-300">
                <a href="/#features" class="hover:text-purple-400 transition-colors">Features</a>
                <a href="/#flux" class="hover:text-purple-400 transition-colors">Flux Engine</a>
                <a href="/docs" class="hover:text-purple-400 transition-colors text-purple-300 font-bold flex items-center space-x-1">
                    <span>Documentation</span>
                    <span class="text-[10px] px-1.5 py-0.5 rounded bg-purple-500/20 text-purple-300 border border-purple-500/30">v1.0</span>
                </a>
                <a href="/docs#cli-tools" class="hover:text-purple-400 transition-colors">CLI Tools</a>
            </nav>

            <!-- Status & CTA -->
            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-950/40 border border-purple-500/20 text-purple-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    {{ env('FRONTEND_FRAMEWORK', 'tailwindcss') }}
                </div>
                <a href="#quickstart" class="px-4 py-2 text-xs font-bold text-white bg-purple-600 hover:bg-purple-500 rounded-xl shadow-lg shadow-purple-900/40 hover:shadow-purple-600/30 transition-all duration-200 transform hover:-translate-y-0.5">
                    Quickstart &rarr;
                </a>
            </div>

        </div>
    </header>

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-purple-500/10 py-12 px-4 bg-[#05010a]">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center space-x-3">
                <img src="/icon-transparent.svg" alt="Nucleus Logo" class="w-6 h-6">
                <span class="text-sm font-bold text-slate-300">Nucleus Framework &bull; Flux Engine</span>
            </div>
            <p class="text-xs text-slate-500">
                @yield('footer', 'Built for high performance, procedural compatibility, and modern UI execution.')
            </p>
            <div class="flex items-center space-x-4 text-xs font-mono text-purple-400">
                <span class="px-2.5 py-1 rounded-md bg-purple-950/60 border border-purple-500/20">v1.0.0</span>
            </div>
        </div>
    </footer>

</body>
</html>
