@extends('layouts.app')

@section('title', 'Framework Documentation - Nucleus & Flux Engine')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        <!-- LEFT STICKY SIDEBAR TAB NAV -->
        <aside class="lg:col-span-1 space-y-6">
            <div class="sticky top-24 p-6 rounded-2xl glass-panel space-y-6">
                <div class="flex items-center space-x-3 border-b border-purple-500/15 pb-4">
                    <img src="/icon-transparent.svg" alt="Nucleus Logo" class="w-6 h-6">
                    <span class="font-extrabold text-white text-base">Nucleus Manual</span>
                </div>

                <nav class="space-y-1 text-xs font-semibold" id="docs-tab-nav">
                    <button onclick="showTab('security')" data-tab="security" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🔒</span>
                        <span>Security &amp; Bootstrapping</span>
                    </button>

                    <button onclick="showTab('directory')" data-tab="directory" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>📁</span>
                        <span>Directory Structure</span>
                    </button>

                    <button onclick="showTab('flux-engine')" data-tab="flux-engine" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>⚡</span>
                        <span>Flux Directives Guide</span>
                    </button>

                    <button onclick="showTab('components')" data-tab="components" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🧩</span>
                        <span>Flux UI Components</span>
                    </button>

                    <button onclick="showTab('asset-switcher')" data-tab="asset-switcher" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🎨</span>
                        <span>Frontend Asset Switcher</span>
                    </button>

                    <button onclick="showTab('cli-tools')" data-tab="cli-tools" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>💻</span>
                        <span>CLI Commands &amp; Flags</span>
                    </button>

                    <button onclick="showTab('routing')" data-tab="routing" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🌐</span>
                        <span>Routing &amp; Middleware</span>
                    </button>

                    <button onclick="showTab('orm')" data-tab="orm" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🗄️</span>
                        <span>Database &amp; ORM</span>
                    </button>

                    <button onclick="showTab('auth')" data-tab="auth" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🔑</span>
                        <span>Auth &amp; API Tokens</span>
                    </button>

                    <button onclick="showTab('helpers')" data-tab="helpers" class="tab-nav-btn w-full text-left flex items-center space-x-2.5 p-2 rounded-xl transition-all duration-200">
                        <span>🧰</span>
                        <span>Helpers, Storage &amp; Validation</span>
                    </button>
                </nav>

                <div class="pt-3 border-t border-purple-500/15 text-[11px] text-slate-400 space-y-1">
                    <div class="font-bold text-slate-300">CLI Help:</div>
                    <code class="text-purple-400 block font-mono">php nucleus command:list</code>
                </div>
            </div>
        </aside>

        <!-- MAIN TABBED CONTENT PANELS -->
        <main class="lg:col-span-3">

            <!-- TAB 1: SECURITY & BOOTSTRAPPING -->
            <div id="security" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🔒</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Security &amp; Bootstrapping</h2>
                            <p class="text-sm text-slate-400">Strict environment initialization, 32-byte encryption keys, and app boot lifecycle.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">Environment Verification (.env &amp; APP_KEY)</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Nucleus enforces zero-compromise security upon initialization. When an incoming web request or CLI invocation occurs, <code>bootstrap/app.php</code> verifies the presence of the <code>.env</code> file and validates that a 32-byte base64 <code>APP_KEY</code> is defined. If missing, the application halts execution immediately with an error log.
                    </p>

                    <div class="p-5 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-2">
                        <div class="text-slate-500"># 1. Initialize .env file &amp; generate encryption key</div>
                        <div class="flex items-center space-x-2">
                            <span class="text-purple-400">$</span>
                            <span class="text-white">php nucleus key:generate</span>
                        </div>
                        <div class="text-emerald-400">✓ Created .env file from .env.example.</div>
                        <div class="text-emerald-400">✓ Application key [base64:96mLSJzF+...] set successfully in .env.</div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">Environment Configuration Keys</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-mono">
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">APP_ENV</div>
                            <p class="font-sans text-slate-300">Options: <code>local</code>, <code>staging</code>, <code>production</code>.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">APP_DEBUG</div>
                            <p class="font-sans text-slate-300">Options: <code>true</code> (verbose stack traces), <code>false</code> (generic 500 error page).</p>
                        </div>
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">APP_KEY</div>
                            <p class="font-sans text-slate-300">32-byte Base64 key used for session encryption and CSRF hashing.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">FRONTEND_FRAMEWORK</div>
                            <p class="font-sans text-slate-300">Options: <code>tailwindcss</code> (default), <code>bootstrap</code>.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: DIRECTORY STRUCTURE -->
            <div id="directory" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">📁</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Application Directory Structure</h2>
                            <p class="text-sm text-slate-400">Complete architectural layout and file locations in a Nucleus project.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">Project Tree Layout</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Nucleus follows a clean, decoupled folder hierarchy separating core framework logic, application domain code, public entry points, and Flux templates.
                    </p>

                    <div class="p-5 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed overflow-x-auto">
<pre class="text-purple-300">nucleus-app/
├── app/
│   ├── Controllers/        <span class="text-slate-500"># Application HTTP &amp; API Controllers</span>
│   ├── Middleware/         <span class="text-slate-500"># Request processing &amp; Auth Pipeline</span>
│   └── Models/             <span class="text-slate-500"># Database ORM Entity Models</span>
├── bootstrap/
│   └── app.php             <span class="text-slate-500"># Application bootstrapper &amp; .env verifier</span>
├── core/                   <span class="text-slate-500"># Nucleus Core Kernel (do not edit)</span>
│   ├── auth/               <span class="text-slate-500"># Auth guards &amp; API Token engines</span>
│   ├── cli/                <span class="text-slate-500"># Nucleus CLI runner &amp; generators</span>
│   ├── database/           <span class="text-slate-500"># Database Connection &amp; Schema Blueprint</span>
│   ├── http/               <span class="text-slate-500"># Request, Response &amp; Middleware Pipeline</span>
│   ├── routing/            <span class="text-slate-500"># Web &amp; API Router Engine</span>
│   ├── support/            <span class="text-slate-500"># Storage, Env &amp; Helpers.php</span>
│   ├── validation/         <span class="text-slate-500"># Input Validator Engine</span>
│   └── view/               <span class="text-slate-500"># FluxEngine &amp; FluxCompiler</span>
├── database/
│   └── migrations/         <span class="text-slate-500"># Timestamped Database Migration Files</span>
├── public/
│   ├── index.php           <span class="text-slate-500"># Front Controller HTTP Entry Point</span>
│   ├── favicon.svg         <span class="text-slate-500"># App Favicon Asset</span>
│   └── logo-transparent.svg <span class="text-slate-500"># Brand Assets</span>
├── resources/
│   └── views/              <span class="text-slate-500"># Flux View Templates (.flux.php)</span>
│       ├── components/     <span class="text-slate-500"># Flux UI Components (&lt;x-tag&gt;)</span>
│       ├── layouts/        <span class="text-slate-500"># Master App Layout Templates</span>
│       └── welcome.flux.php <span class="text-slate-500"># Landing Page Template</span>
├── routes/
│   ├── api.php             <span class="text-slate-500"># API JSON Route Definitions</span>
│   └── web.php             <span class="text-slate-500"># Web Route Definitions</span>
├── storage/
│   └── views/              <span class="text-slate-500"># Compiled Flux PHP Views Cache</span>
├── .env                    <span class="text-slate-500"># Environment Configuration &amp; APP_KEY</span>
├── .env.example            <span class="text-slate-500"># Environment Template File</span>
└── nucleus                 <span class="text-slate-500"># CLI Executable Command Runner</span></pre>
                    </div>
                </div>
            </div>

            <!-- TAB 3: FLUX DIRECTIVES GUIDE -->
            <div id="flux-engine" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">⚡</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Flux Directives Guide</h2>
                            <p class="text-sm text-slate-400">Complete syntax, explanations, and usage examples for every Flux directive.</p>
                        </div>
                    </div>
                </div>

                <!-- Directive 1: Conditionals -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-3">
                        <h3 class="text-base font-bold text-purple-300">1. @@if, @@elseif, @@else, @@endif</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-300 font-mono">Conditionals</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Evaluates conditional PHP expressions. Only renders inner content if the evaluated expression is truthy.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed">
                        <div>@@if($role === 'admin')</div>
                        <div class="pl-4 text-emerald-300">&lt;p&gt;Welcome Administrator!&lt;/p&gt;</div>
                        <div>@@elseif($role === 'editor')</div>
                        <div class="pl-4 text-emerald-300">&lt;p&gt;Welcome Editor!&lt;/p&gt;</div>
                        <div>@@else</div>
                        <div class="pl-4 text-emerald-300">&lt;p&gt;Welcome User!&lt;/p&gt;</div>
                        <div>@@endif</div>
                    </div>
                </div>

                <!-- Directive 2: Unless -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-3">
                        <h3 class="text-base font-bold text-purple-300">2. @@unless, @@endunless</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-300 font-mono">Conditionals</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Inverse of <code>@@if</code>. Renders content when the condition evaluates to <strong>false</strong>.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed">
                        <div>@@unless($isSubscribed)</div>
                        <div class="pl-4 text-amber-300">&lt;a href="/subscribe"&gt;Upgrade to Pro Plan&lt;/a&gt;</div>
                        <div>@@endunless</div>
                    </div>
                </div>

                <!-- Directive 3: Isset & Empty -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-3">
                        <h3 class="text-base font-bold text-purple-300">3. @@isset, @@endisset / @@empty, @@endempty</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-400 font-mono">Variables</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Checks if a variable is set (not null) via <code>@@isset</code> or empty via <code>@@empty</code>.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3">
                        <div>
                            <div>@@isset($user['avatar'])</div>
                            <div class="pl-4 text-white">&lt;img src="&#123;&#123; $user['avatar'] &#125;&#125;" /&gt;</div>
                            <div>@@endisset</div>
                        </div>
                        <div>
                            <div>@@empty($notifications)</div>
                            <div class="pl-4 text-slate-400">&lt;p&gt;No unread notifications.&lt;/p&gt;</div>
                            <div>@@endempty</div>
                        </div>
                    </div>
                </div>

                <!-- Directive 4: Auth & Guest -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-4">
                        <h3 class="text-base font-bold text-purple-300">4. @@auth, @@endauth / @@guest, @@endguest</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-400 font-mono">Authentication</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Renders content conditionally based on user session authentication state.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3">
                        <div>
                            <div>@@auth</div>
                            <div class="pl-4 text-emerald-300">&lt;a href="/dashboard"&gt;Go to Dashboard&lt;/a&gt;</div>
                            <div>@@endauth</div>
                        </div>
                        <div>
                            <div>@@guest</div>
                            <div class="pl-4 text-amber-300">&lt;a href="/login"&gt;Log In&lt;/a&gt;</div>
                            <div>@@endguest</div>
                        </div>
                    </div>
                </div>

                <!-- Directive 5: Forelse & Loops -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-4">
                        <h3 class="text-base font-bold text-purple-300">5. @@forelse, @@empty, @@endforelse</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-400 font-mono">Loops</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Iterates over an array or collection. If the collection is empty, renders the fallback <code>@@empty</code> block cleanly.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 leading-relaxed">
                        <div>@@forelse($projects as $project)</div>
                        <div class="pl-4 text-white">&lt;div class="card"&gt;&#123;&#123; $project-&gt;title &#125;&#125;&lt;/div&gt;</div>
                        <div>@@empty</div>
                        <div class="pl-4 text-slate-400">&lt;p&gt;No projects active yet.&lt;/p&gt;</div>
                        <div>@@endforelse</div>
                    </div>
                </div>

                <!-- Directive 6: Layout Inheritance & Includes -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <div class="flex justify-between items-center border-b border-purple-500/15 pb-4">
                        <h3 class="text-base font-bold text-purple-300">6. @@extends, @@section, @@yield, @@include</h3>
                        <span class="text-xs px-2.5 py-0.5 rounded bg-purple-950 text-purple-400 font-mono">Layouts</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Inherit master template layouts and inject dynamic content sections or include reusable sub-views.
                    </p>
                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3">
                        <div>
                            <div class="text-slate-500">// In layout view (layouts/app.flux.php)</div>
                            <div>@@yield('content', 'Default Content')</div>
                        </div>
                        <div>
                            <div class="text-slate-500">// In child view (welcome.flux.php)</div>
                            <div>@@extends('layouts.app')</div>
                            <div>@@section('content')</div>
                            <div class="pl-4 text-white">&lt;h1&gt;Page Content&lt;/h1&gt;</div>
                            <div>@@endsection</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- TAB 4: FLUX UI COMPONENTS -->
            <div id="components" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🧩</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Flux UI Components</h2>
                            <p class="text-sm text-slate-400">Custom HTML component tags, named slots, and dynamic attribute evaluation.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-6">
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Flux supports HTML component tags (e.g. <code>&lt;x-card&gt;</code> or <code>&lt;x-navigation.header&gt;</code>). Component template files are stored in <code>resources/views/components/</code>.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-slate-500">// 1. Container Component with Props &amp; Named Slots</div>
                        <div class="text-purple-400">&lt;x-card <span class="text-amber-300">title=</span><span class="text-emerald-300">"Dashboard"</span> <span class="text-amber-300">:active=</span><span class="text-emerald-300">"true"</span>&gt;</div>
                        <div class="pl-4 text-purple-300">&lt;x-slot <span class="text-amber-300">name=</span><span class="text-emerald-300">"header"</span>&gt;</div>
                        <div class="pl-8 text-white">&lt;h3&gt;Card Title Header&lt;/h3&gt;</div>
                        <div class="pl-8 text-purple-300">&lt;x-badge <span class="text-amber-300">type=</span><span class="text-emerald-300">"success"</span> <span class="text-amber-300">text=</span><span class="text-emerald-300">"Active"</span> /&gt;</div>
                        <div class="pl-4 text-purple-300">&lt;/x-slot&gt;</div>
                        
                        <div class="pl-4 text-slate-300">Main body content automatically binds to $slot variable.</div>
                        <div class="text-purple-400">&lt;/x-card&gt;</div>

                        <div class="pt-3 text-slate-500">// 2. Self-Closing Component Tag</div>
                        <div class="text-purple-400">&lt;x-badge <span class="text-amber-300">type=</span><span class="text-emerald-300">"info"</span> <span class="text-amber-300">text=</span><span class="text-emerald-300">"v1.0"</span> /&gt;</div>
                    </div>
                </div>
            </div>

            <!-- TAB 5: FRONTEND ASSET SWITCHER -->
            <div id="asset-switcher" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🎨</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Frontend Asset Switcher</h2>
                            <p class="text-sm text-slate-400">Single-setting environment CSS framework switcher.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Flux reads <code>FRONTEND_FRAMEWORK</code> from <code>.env</code> and injects the corresponding CDN assets via <code>@@fluxAssets</code> or the <code>flux_assets()</code> helper function.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-2">
                        <div class="text-slate-500"># Set in your .env file</div>
                        <div class="text-white">FRONTEND_FRAMEWORK=tailwindcss <span class="text-slate-500"># Options: tailwindcss (default), bootstrap</span></div>
                    </div>
                </div>
            </div>

            <!-- TAB 6: CLI COMMANDS & FLAGS -->
            <div id="cli-tools" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">💻</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">CLI Commands &amp; Flags Reference</h2>
                            <p class="text-sm text-slate-400">Complete, categorized reference of all Nucleus CLI commands, available flags, arguments, and usage options.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    
                    <!-- Group 1: Environment & System -->
                    <div class="p-6 rounded-2xl glass-panel space-y-4">
                        <h3 class="text-base font-bold text-purple-300 flex items-center space-x-2">
                            <span>⚙️</span>
                            <span>1. System &amp; Environment Commands</span>
                        </h3>

                        <div class="space-y-4 font-mono text-xs">
                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus key:generate</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Environment</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Generates a 32-byte base64 encryption key and writes <code>APP_KEY=base64:...</code> into <code>.env</code>. Automatically copies <code>.env.example</code> if <code>.env</code> is missing.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Arguments / Flags:</strong> None</div>
                            </div>

                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus serve</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Server</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Launches the built-in PHP development server targeting <code>public/index.php</code> at <code>http://127.0.0.1:8000</code>.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Arguments / Flags:</strong> None</div>
                            </div>
                        </div>
                    </div>

                    <!-- Group 2: Code Generators -->
                    <div class="p-6 rounded-2xl glass-panel space-y-4">
                        <h3 class="text-base font-bold text-purple-300 flex items-center space-x-2">
                            <span>🛠️</span>
                            <span>2. Code &amp; Template Generators (make:*)</span>
                        </h3>

                        <div class="space-y-4 font-mono text-xs">
                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus make:view &lt;name&gt;</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Generator</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Generates a new Flux view template under <code>resources/views/&lt;name&gt;.flux.php</code>.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Arguments:</strong> <code>&lt;name&gt;</code> (required)</div>
                            </div>

                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus make:component &lt;name&gt;</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Generator</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Generates a Flux UI component template under <code>resources/views/components/&lt;name&gt;.flux.php</code>.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Arguments:</strong> <code>&lt;name&gt;</code> (required)</div>
                            </div>

                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus make:controller &lt;name&gt; [--api|--web]</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Generator</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Generates a controller class under <code>app/Controllers/</code>.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Flags:</strong> <code>--api</code> (JSON response stub), <code>--web</code> (View response stub)</div>
                            </div>

                            <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                                <div class="flex justify-between items-center text-purple-300 font-bold">
                                    <span>php nucleus make:model &lt;name&gt;</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-950 text-purple-400">Generator</span>
                                </div>
                                <div class="font-sans text-slate-300 text-xs">Generates an ORM model class under <code>app/Models/&lt;Name&gt;.php</code>.</div>
                                <div class="text-slate-400 text-[11px]"><strong class="text-purple-400 font-mono">Arguments:</strong> <code>&lt;name&gt;</code> (required)</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TAB 7: ROUTING & MIDDLEWARE -->
            <div id="routing" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🌐</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Routing &amp; Middleware Pipeline</h2>
                            <p class="text-sm text-slate-400">HTTP verbs, parameters, route groups, fluent options, and middleware.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">1. Route Verbs &amp; Parameter Matching</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Declare Web routes in <code>routes/web.php</code> or API routes in <code>routes/api.php</code>.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Routing\Route;</div>
                        <div class="text-purple-400">use</div> <div class="text-white">App\Controllers\UserController;</div>
                        
                        <div class="pt-2 text-slate-500">// Basic Verbs</div>
                        <div><span class="text-purple-400">Route::get</span>(<span class="text-emerald-300">'/users'</span>, [UserController::class, <span class="text-emerald-300">'index'</span>]);</div>
                        <div><span class="text-purple-400">Route::post</span>(<span class="text-emerald-300">'/users'</span>, [UserController::class, <span class="text-emerald-300">'store'</span>]);</div>
                        <div><span class="text-purple-400">Route::put</span>(<span class="text-emerald-300">'/users/{id}'</span>, [UserController::class, <span class="text-emerald-300">'update'</span>]);</div>
                        <div><span class="text-purple-400">Route::delete</span>(<span class="text-emerald-300">'/users/{id}'</span>, [UserController::class, <span class="text-emerald-300">'destroy'</span>]);</div>

                        <div class="pt-2 text-slate-500">// Route Parameters (Required {id} and Optional {slug?})</div>
                        <div><span class="text-purple-400">Route::get</span>(<span class="text-emerald-300">'/posts/{id}'</span>, <span class="text-purple-400">function</span>(<span class="text-amber-300">$request</span>, <span class="text-amber-300">$id</span>) {</div>
                        <div class="pl-4 text-white"><span class="text-purple-400">return</span> <span class="text-emerald-300">"Post ID: "</span> . <span class="text-amber-300">$id</span>;</div>
                        <div>});</div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">2. Route Groups &amp; Middleware Pipeline</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Group routes fluently with shared prefixes, middleware pipelines, or name spaces.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-slate-500">// Fluent Group Declaration</div>
                        <div>Route::prefix(<span class="text-emerald-300">'/api/v1'</span>)-&gt;middleware(<span class="text-emerald-300">'auth'</span>)-&gt;group(<span class="text-purple-400">function</span>() {</div>
                        <div class="pl-4">Route::get(<span class="text-emerald-300">'/profile'</span>, [ProfileController::class, <span class="text-emerald-300">'show'</span>]);</div>
                        <div class="pl-4">Route::get(<span class="text-emerald-300">'/orders'</span>, [OrderController::class, <span class="text-emerald-300">'index'</span>]);</div>
                        <div>});</div>

                        <div class="pt-2 text-slate-500">// Registering Custom Middleware Alias</div>
                        <div>Route::aliasMiddleware(<span class="text-emerald-300">'auth'</span>, \App\Middleware\AuthMiddleware::class);</div>
                    </div>
                </div>
            </div>

            <!-- TAB 8: DATABASE & ORM -->
            <div id="orm" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🗄️</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Database &amp; ORM</h2>
                            <p class="text-sm text-slate-400">Model entity definitions, conventions, fluent query builder, and migrations.</p>
                        </div>
                    </div>
                </div>

                <!-- 1. Model Conventions -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">1. Model Definition &amp; Conventions</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Models extend <code>Core\Database\Model</code> and map to database tables. By default, model names in singular PascalCase map to plural snake_case table names (e.g. <code>User</code> maps to <code>users</code>).
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-2 overflow-x-auto">
                        <div class="text-purple-400">namespace</div> <div class="text-white">App\Models;</div>
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Database\Model;</div>
                        
                        <div class="pt-2"><span class="text-purple-400">class</span> <span class="text-white">User</span> <span class="text-purple-400">extends</span> <span class="text-white">Model</span> {</div>
                        <div class="pl-4 text-slate-500">// Custom table &amp; primary key overrides (optional)</div>
                        <div class="pl-4"><span class="text-purple-400">protected</span> <span class="text-amber-300">$table</span> = <span class="text-emerald-300">'users'</span>;</div>
                        <div class="pl-4"><span class="text-purple-400">protected</span> <span class="text-amber-300">$primaryKey</span> = <span class="text-emerald-300">'id'</span>;</div>
                        <div class="pl-4"><span class="text-purple-400">public</span> <span class="text-amber-300">$timestamps</span> = <span class="text-purple-400">true</span>;</div>
                        
                        <div class="pl-4 pt-2 text-slate-500">// Mass-assignable attributes</div>
                        <div class="pl-4"><span class="text-purple-400">protected</span> <span class="text-amber-300">$fillable</span> = [<span class="text-emerald-300">'name'</span>, <span class="text-emerald-300">'email'</span>, <span class="text-emerald-300">'password'</span>, <span class="text-emerald-300">'status'</span>];</div>
                        <div>}</div>
                    </div>
                </div>

                <!-- 2. CRUD Query Operations -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">2. Fluent Query Builder &amp; CRUD</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Nucleus ORM provides a fluent static interface for fetching, filtering, creating, updating, and deleting records.
                    </p>

                    <div class="space-y-4 font-mono text-xs">
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                            <div class="text-purple-300 font-bold">A. Retrieving Records</div>
                            <div class="text-white"><span class="text-amber-300">$allUsers</span> = User::all(); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Get all records</span></div>
                            <div class="text-white"><span class="text-amber-300">$user</span> = User::find(<span class="text-emerald-300">1</span>); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Find by primary key (or null)</span></div>
                            <div class="text-white"><span class="text-amber-300">$user</span> = User::findOrFail(<span class="text-emerald-300">1</span>); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Find or throw 404 Exception</span></div>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                            <div class="text-purple-300 font-bold">B. Where Clauses &amp; Filtering</div>
                            <div class="text-white"><span class="text-amber-300">$active</span> = User::where(<span class="text-emerald-300">'status'</span>, <span class="text-emerald-300">'active'</span>)-&gt;get();</div>
                            <div class="text-white"><span class="text-amber-300">$firstAdmin</span> = User::where(<span class="text-emerald-300">'role'</span>, <span class="text-emerald-300">'admin'</span>)-&gt;first();</div>
                            <div class="text-white"><span class="text-amber-300">$verified</span> = User::whereIn(<span class="text-emerald-300">'id'</span>, [<span class="text-emerald-300">1, 2, 3</span>])-&gt;get();</div>
                            <div class="text-white"><span class="text-amber-300">$recent</span> = User::orderBy(<span class="text-emerald-300">'created_at'</span>, <span class="text-emerald-300">'desc'</span>)-&gt;take(<span class="text-emerald-300">10</span>)-&gt;get();</div>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                            <div class="text-purple-300 font-bold">C. Aggregates</div>
                            <div class="text-white"><span class="text-amber-300">$count</span> = User::count(); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Total record count</span></div>
                            <div class="text-white"><span class="text-amber-300">$maxScore</span> = User::max(<span class="text-emerald-300">'score'</span>); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Maximum column value</span></div>
                        </div>
                    </div>
                </div>

                <!-- 3. Schema Migrations -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">3. Migrations &amp; Schema Blueprint</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Migrations allow you to define and alter database table structures programmatically using <code>Core\Database\Schema</code> and <code>Blueprint</code>.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-2 overflow-x-auto">
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Database\Schema;</div>
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Database\Blueprint;</div>

                        <div class="pt-2"><span class="text-purple-400">return new class</span> {</div>
                        <div class="pl-4"><span class="text-purple-400">public function</span> <span class="text-white">up</span>(): <span class="text-purple-400">void</span> {</div>
                        <div class="pl-8 text-white">Schema::create(<span class="text-emerald-300">'users'</span>, <span class="text-purple-400">function</span> (Blueprint <span class="text-amber-300">$table</span>) {</div>
                        <div class="pl-12 text-slate-300"><span class="text-amber-300">$table</span>-&gt;id();</div>
                        <div class="pl-12 text-slate-300"><span class="text-amber-300">$table</span>-&gt;string(<span class="text-emerald-300">'name'</span>);</div>
                        <div class="pl-12 text-slate-300"><span class="text-amber-300">$table</span>-&gt;string(<span class="text-emerald-300">'email'</span>)-&gt;unique();</div>
                        <div class="pl-12 text-slate-300"><span class="text-amber-300">$table</span>-&gt;timestamps();</div>
                        <div class="pl-8 text-white">});</div>
                        <div class="pl-4">}</div>
                        <div>};</div>
                    </div>
                </div>

                <!-- 4. ORM Relationships & Associations -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">4. ORM Relationships &amp; Associations</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Define model entity associations using <code>hasOne</code>, <code>hasMany</code>, <code>belongsTo</code>, and <code>belongsToMany</code> relationship methods.
                    </p>

                    <div class="space-y-4 font-mono text-xs">
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                            <div class="text-purple-300 font-bold">A. One-To-Many (hasMany / belongsTo)</div>
                            <div><span class="text-purple-400">public function</span> <span class="text-white">posts</span>() { <span class="text-purple-400">return</span> <span class="text-amber-300">$this</span>-&gt;hasMany(Post::class); }</div>
                            <div><span class="text-amber-300">$userPosts</span> = User::find(<span class="text-emerald-300">1</span>)-&gt;posts;</div>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-2">
                            <div class="text-purple-300 font-bold">B. Eager Loading Relationships (with)</div>
                            <div><span class="text-amber-300">$users</span> = User::with([<span class="text-emerald-300">'posts'</span>, <span class="text-emerald-300">'roles'</span>])-&gt;get();</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 9: AUTHENTICATION & API TOKENS -->
            <div id="auth" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🔑</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Authentication &amp; API Tokens</h2>
                            <p class="text-sm text-slate-400">Session guard authentication, user login, and bearer token generation.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">1. Web Session Guard (Auth)</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Authenticate users in controllers using the <code>Core\Auth\Auth</code> facade.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Auth\Auth;</div>

                        <div class="pt-2 text-slate-500">// Attempt user login credentials</div>
                        <div><span class="text-purple-400">if</span> (Auth::attempt([<span class="text-emerald-300">'email'</span> =&gt; <span class="text-amber-300">$email</span>, <span class="text-emerald-300">'password'</span> =&gt; <span class="text-amber-300">$password</span>])) {</div>
                        <div class="pl-4 text-emerald-300">// Authentication successful</div>
                        <div class="pl-4"><span class="text-amber-300">$currentUser</span> = Auth::user();</div>
                        <div>}</div>

                        <div class="pt-2 text-slate-500">// Check authentication status &amp; logout</div>
                        <div><span class="text-purple-400">if</span> (Auth::check()) { Auth::logout(); }</div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">2. API Bearer Tokens (HasApiTokens &amp; ApiAuth)</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Issue personal access bearer tokens for stateless REST API consumers using <code>HasApiTokens</code> trait.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-slate-500">// In App\Models\User.php</div>
                        <div><span class="text-purple-400">use</span> <span class="text-white">Core\Auth\HasApiTokens;</span></div>
                        <div><span class="text-purple-400">class</span> <span class="text-white">User</span> <span class="text-purple-400">extends</span> <span class="text-white">Model</span> { <span class="text-purple-400">use</span> HasApiTokens; }</div>

                        <div class="pt-2 text-slate-500">// In ApiController (Generate Token)</div>
                        <div><span class="text-amber-300">$token</span> = <span class="text-amber-300">$user</span>-&gt;createToken(<span class="text-emerald-300">'mobile-app'</span>)-&gt;plainTextToken;</div>

                        <div class="pt-2 text-slate-500">// Inspect Authenticated API User</div>
                        <div><span class="text-amber-300">$apiUser</span> = \Core\Auth\ApiAuth::user();</div>
                    </div>
                </div>
            </div>

            <!-- TAB 10: HELPERS, STORAGE & VALIDATION -->
            <div id="helpers" class="tab-content space-y-8 hidden">
                <div class="border-b border-purple-500/20 pb-4">
                    <div class="flex items-center space-x-3">
                        <span class="text-3xl">🧰</span>
                        <div>
                            <h2 class="text-2xl font-extrabold text-white">Helpers, Storage &amp; Validation</h2>
                            <p class="text-sm text-slate-400">Global helper functions, filesystem storage disks, and input validation.</p>
                        </div>
                    </div>
                </div>

                <!-- Helpers -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">1. Global Helper Functions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-mono">
                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">env($key, $default)</div>
                            <p class="font-sans text-slate-300">Retrieves value from <code>.env</code> with fallback default.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">view($name, $data)</div>
                            <p class="font-sans text-slate-300">Renders a Flux template view from <code>resources/views/</code>.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">flux_assets()</div>
                            <p class="font-sans text-slate-300">Renders CDN assets for Tailwind CSS or Bootstrap 5.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 space-y-1">
                            <div class="text-purple-300 font-bold">storage_path($path)</div>
                            <p class="font-sans text-slate-300">Returns absolute filesystem path to <code>storage/</code> directory.</p>
                        </div>
                    </div>
                </div>

                <!-- Storage Disk -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">2. Filesystem Storage API</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Read, write, check existence, and delete local filesystem files via <code>storage()</code> helper.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-2 overflow-x-auto">
                        <div>storage()-&gt;put(<span class="text-emerald-300">'uploads/avatar.jpg'</span>, <span class="text-amber-300">$fileContent</span>);</div>
                        <div><span class="text-amber-300">$content</span> = storage()-&gt;get(<span class="text-emerald-300">'uploads/avatar.jpg'</span>);</div>
                        <div><span class="text-purple-400">if</span> (storage()-&gt;exists(<span class="text-emerald-300">'uploads/avatar.jpg'</span>)) { storage()-&gt;delete(<span class="text-emerald-300">'uploads/avatar.jpg'</span>); }</div>
                    </div>
                </div>

                <!-- Validation -->
                <div class="p-6 rounded-2xl glass-panel space-y-4">
                    <h3 class="text-lg font-bold text-purple-300">3. Request Input Validation</h3>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Validate HTTP request payloads using <code>Core\Validation\Validator</code>.
                    </p>

                    <div class="p-4 rounded-xl bg-[#090312] border border-purple-500/20 font-mono text-xs text-purple-200 space-y-3 overflow-x-auto">
                        <div class="text-purple-400">use</div> <div class="text-white">Core\Validation\Validator;</div>

                        <div><span class="text-amber-300">$validator</span> = Validator::make(<span class="text-amber-300">$request</span>-&gt;all(), [</div>
                        <div class="pl-4"><span class="text-emerald-300">'email'</span> =&gt; <span class="text-emerald-300">'required|email'</span>,</div>
                        <div class="pl-4"><span class="text-emerald-300">'password'</span> =&gt; <span class="text-emerald-300">'required|min:8'</span></div>
                        <div>]);</div>

                        <div class="pt-2"><span class="text-purple-400">if</span> (<span class="text-amber-300">$validator</span>-&gt;fails()) {</div>
                        <div class="pl-4 text-rose-300"><span class="text-amber-300">$errors</span> = <span class="text-amber-300">$validator</span>-&gt;errors();</div>
                        <div>} <span class="text-purple-400">else</span> {</div>
                        <div class="pl-4 text-emerald-300"><span class="text-amber-300">$validatedData</span> = <span class="text-amber-300">$validator</span>-&gt;validated();</div>
                        <div>}</div>
                    </div>
                </div>
            </div>

        </main>

    </div>
</div>

<!-- INTERACTIVE TAB SWITCHING SCRIPT -->
<script>
    function showTab(tabId) {
        // Hide all tab panels
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

        // Reset all sidebar buttons
        document.querySelectorAll('.tab-nav-btn').forEach(btn => {
            btn.classList.remove('bg-purple-600', 'text-white', 'shadow-lg', 'shadow-purple-900/40');
            btn.classList.add('text-slate-300', 'hover:bg-purple-950/40');
        });

        // Display selected tab panel
        const targetPanel = document.getElementById(tabId);
        if (targetPanel) {
            targetPanel.classList.remove('hidden');
        }

        // Highlight selected sidebar button
        const targetBtn = document.querySelector(`[data-tab="${tabId}"]`);
        if (targetBtn) {
            targetBtn.classList.add('bg-purple-600', 'text-white', 'shadow-lg', 'shadow-purple-900/40');
            targetBtn.classList.remove('text-slate-300', 'hover:bg-purple-950/40');
        }

        // Update URL hash for deep linking
        if (history.pushState) {
            history.pushState(null, null, `#${tabId}`);
        } else {
            location.hash = `#${tabId}`;
        }
    }

    // Initialize active tab on DOM content loaded
    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash.replace('#', '');
        if (hash && document.getElementById(hash)) {
            showTab(hash);
        } else {
            showTab('security');
        }
    });

    // Support back/forward browser navigation
    window.addEventListener('hashchange', () => {
        const hash = window.location.hash.replace('#', '');
        if (hash && document.getElementById(hash)) {
            showTab(hash);
        }
    });
</script>
@endsection
