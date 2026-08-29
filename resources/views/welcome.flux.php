@extends('layouts.app')

@section('title', 'Nucleus Framework - Next-Gen PHP Framework & Flux Engine')

@section('content')
<div class="space-y-24 py-8">

    <!-- HERO SECTION -->
    <section class="relative pt-12 pb-8 max-w-5xl mx-auto text-center space-y-8 px-4">
        
        <!-- Glowing Announcement Badge -->
        <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-purple-950/50 border border-purple-500/30 text-purple-300 text-xs font-bold tracking-wide shadow-lg shadow-purple-950/50 hover:border-purple-400/50 transition-all cursor-pointer">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
            </span>
            <span>⚡ Introducing Flux Engine v1.0 — Blade-like UI &amp; Component Power</span>
            <span class="text-purple-400">&rarr;</span>
        </div>

        <!-- Headline -->
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight">
            The Next-Gen PHP Framework for <span class="bg-gradient-to-r from-purple-400 via-fuchsia-400 to-indigo-400 bg-clip-text text-transparent">Modern Developers</span>
        </h1>

        <!-- Subtitle -->
        <p class="max-w-2xl mx-auto text-base sm:text-lg text-slate-300 font-medium leading-relaxed">
            Nucleus pairs lightweight core architecture with <strong>Flux Engine</strong> — featuring Blade-like components, layout inheritance, and single-setting <code>.env</code> frontend switching between <strong>Tailwind CSS</strong> &amp; <strong>Bootstrap 5</strong>.
        </p>

        <!-- CTA Action Buttons & CLI Snippet -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <div class="flex items-center space-x-3 px-5 py-3 rounded-2xl bg-purple-950/80 border border-purple-500/40 text-slate-200 text-sm font-mono shadow-xl glow-purple">
                <span class="text-purple-400 font-bold">$</span>
                <code class="text-purple-200">php nucleus key:generate</code>
            </div>
            <a href="#features" class="px-6 py-3 text-sm font-bold text-slate-200 hover:text-white bg-slate-800/80 hover:bg-slate-800 rounded-2xl border border-slate-700 hover:border-purple-500/40 transition-all duration-200">
                Explore Features
            </a>
        </div>

        <!-- Simulated SaaS Interactive Terminal Preview Card -->
        <div id="quickstart" class="pt-8 max-w-4xl mx-auto">
            <div class="rounded-2xl border border-purple-500/30 bg-[#0c0517]/90 shadow-2xl overflow-hidden text-left glass-panel">
                <!-- Terminal Title Bar -->
                <div class="px-4 py-3 bg-[#07020d] border-b border-purple-500/20 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                        <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                        <span class="text-xs font-mono text-slate-400 ml-3">nucleus-cli &mdash; bash</span>
                    </div>
                    <div class="text-[11px] font-mono text-purple-400/80">FRONTEND_FRAMEWORK={{ env('FRONTEND_FRAMEWORK', 'tailwindcss') }}</div>
                </div>
                <!-- Terminal Code Window -->
                <div class="p-6 font-mono text-xs sm:text-sm text-slate-300 space-y-3 leading-relaxed overflow-x-auto">
                    <div class="text-slate-500"># Initialize your application environment</div>
                    <div class="flex items-center space-x-2">
                        <span class="text-purple-400">$</span>
                        <span class="text-white">php nucleus key:generate</span>
                    </div>
                    <div class="text-emerald-400">✓ Application key [base64:96mLSJzF+...] generated successfully.</div>

                    <div class="pt-2 text-slate-500"># Generate a Flux UI component instantly</div>
                    <div class="flex items-center space-x-2">
                        <span class="text-purple-400">$</span>
                        <span class="text-white">php nucleus make:component card</span>
                    </div>
                    <div class="text-emerald-400">✓ Component [card] created at [resources/views/components/card.flux.php].</div>

                    <div class="pt-2 text-slate-500"># Serve application locally</div>
                    <div class="flex items-center space-x-2">
                        <span class="text-purple-400">$</span>
                        <span class="text-purple-300">php nucleus serve</span>
                    </div>
                    <div class="text-purple-400">⚡ Server running on http://127.0.0.1:8000</div>
                </div>
            </div>
        </div>

    </section>

    <!-- METRICS & HIGHLIGHTS BANNER -->
    <section class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 rounded-3xl glass-panel text-center">
            <div class="space-y-1">
                <div class="text-3xl font-extrabold text-white">&lt; 1ms</div>
                <div class="text-xs font-semibold text-purple-400">Request Latency</div>
            </div>
            <div class="space-y-1 border-l border-purple-500/20">
                <div class="text-3xl font-extrabold text-white">100%</div>
                <div class="text-xs font-semibold text-purple-400">Component Support</div>
            </div>
            <div class="space-y-1 border-l border-purple-500/20">
                <div class="text-3xl font-extrabold text-white">Zero</div>
                <div class="text-xs font-semibold text-purple-400">Config Overhead</div>
            </div>
            <div class="space-y-1 border-l border-purple-500/20">
                <div class="text-3xl font-extrabold text-white">Strict</div>
                <div class="text-xs font-semibold text-purple-400">.env &amp; APP_KEY Security</div>
            </div>
        </div>
    </section>

    <!-- FEATURES GRID SECTION -->
    <section id="features" class="max-w-7xl mx-auto px-4 space-y-12">
        
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <h2 class="text-xs font-extrabold tracking-widest text-purple-400 uppercase">Architecture Highlights</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-white">Engineered for Developer Superpowers</p>
            <p class="text-slate-400 text-sm">Everything you need to ship high-performance web apps without bloated dependencies.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1: Flux Engine -->
            <a href="/docs#flux-engine" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">⚡</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">Flux Template Engine</span>
                        </div>
                        <x-badge type="info" text="Core" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Write clean <code>.flux.php</code> templates with Blade-like directives (<code>@@if</code>, <code>@@forelse</code>, <code>@@extends</code>, <code>@@yield</code>) and automatic compiled PHP caching.
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

            <!-- Card 2: HTML Components -->
            <a href="/docs#components" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">🧩</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">Blade-Style UI Components</span>
                        </div>
                        <x-badge type="success" text="New" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Build reusable UI blocks with <code>&lt;x-card&gt;</code>, <code>&lt;x-badge&gt;</code>, props, and named slots (<code>&lt;x-slot name="header"&gt;</code>).
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

            <!-- Card 3: Dynamic CSS Switcher -->
            <a href="/docs#asset-switcher" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">🎨</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">Dynamic Asset Switcher</span>
                        </div>
                        <x-badge type="warning" text=".env" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Set <code>FRONTEND_FRAMEWORK=tailwindcss</code> or <code>bootstrap</code> in <code>.env</code>. Flux injects optimal CDN assets via <code>@@fluxAssets</code> automatically.
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

            <!-- Card 4: Type-Safe CLI -->
            <a href="/docs#cli-tools" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">💻</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">Nucleus CLI Tooling</span>
                        </div>
                        <x-badge type="info" text="CLI" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Generate models, controllers, middleware, views, and components instantly using <code>php nucleus make:component</code> and <code>make:view</code>.
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

            <!-- Card 5: Strict Security -->
            <a href="/docs#security" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">🔒</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">Strict .env &amp; APP_KEY</span>
                        </div>
                        <x-badge type="danger" text="Security" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Enforces valid <code>.env</code> file existence and 32-byte <code>APP_KEY</code> encryption keys on application boot.
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

            <!-- Card 6: High Performance ORM & Router -->
            <a href="/docs#routing-orm" class="block group">
                <x-card>
                    <x-slot name="header">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">🌐</span>
                            <span class="text-base font-bold text-white group-hover:text-purple-300 transition-colors">API &amp; Web Routing</span>
                        </div>
                        <x-badge type="success" text="Ready" />
                    </x-slot>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Expressive route declarations, middleware pipeline execution, and database ORM built for speed.
                    </p>
                    <div class="pt-2 text-xs font-bold text-purple-400 group-hover:text-purple-300 flex items-center space-x-1">
                        <span>Read Docs</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </x-card>
            </a>

        </div>
    </section>

    <!-- LIVE FLUX CODE SHOWCASE SECTION -->
    <section id="flux" class="max-w-7xl mx-auto px-4">
        <div class="p-8 sm:p-12 rounded-3xl glass-panel space-y-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-purple-500/20 pb-6">
                <div>
                    <h3 class="text-2xl font-bold text-white">Flux Component &amp; Directive Syntax</h3>
                    <p class="text-sm text-slate-400">Clean, expressive templating syntax without complex compilation setups.</p>
                </div>
                <x-badge type="info" text="welcome.flux.php" />
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Code Sample Left -->
                <div class="p-5 rounded-2xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed overflow-x-auto">
                    <div class="text-slate-500 mb-2">// 1. Using Flux Components &amp; Slots</div>
                    <div class="text-purple-400">&lt;x-card&gt;</div>
                    <div class="pl-4 text-purple-300">&lt;x-slot <span class="text-amber-300">name=</span><span class="text-emerald-300">"header"</span>&gt;</div>
                    <div class="pl-8 text-white">⚡ Dynamic Styling Switcher</div>
                    <div class="pl-4 text-purple-300">&lt;/x-slot&gt;</div>
                    <div class="pl-4 text-slate-200">Current Framework: &#123;&#123; env('FRONTEND_FRAMEWORK') &#125;&#125;</div>
                    <div class="text-purple-400">&lt;/x-card&gt;</div>
                </div>

                <!-- Code Sample Right -->
                <div class="p-5 rounded-2xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed overflow-x-auto">
                    <div class="text-slate-500 mb-2">// 2. Layout Inheritance &amp; Directives</div>
                    <div><span class="text-purple-400">@@extends</span>(<span class="text-emerald-300">'layouts.app'</span>)</div>
                    <div class="pt-1"><span class="text-purple-400">@@section</span>(<span class="text-emerald-300">'title'</span>, <span class="text-emerald-300">'Dashboard'</span>)</div>
                    <div class="pt-1"><span class="text-purple-400">@@forelse</span>(<span class="text-amber-300">$users</span> <span class="text-purple-400">as</span> <span class="text-amber-300">$user</span>)</div>
                    <div class="pl-4 text-white">&lt;p&gt;Hello &#123;&#123; $user-&gt;name &#125;&#125;&lt;/p&gt;</div>
                    <div><span class="text-purple-400">@@empty</span></div>
                    <div class="pl-4 text-slate-400">No users found.</div>
                    <div><span class="text-purple-400">@@endforelse</span></div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
