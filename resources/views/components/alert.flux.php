<div class="p-6 bg-slate-800 rounded-xl border border-slate-700 shadow-lg space-y-3">
    @isset($header)
        <div class="border-b border-slate-700 pb-3 mb-3 font-bold text-sky-300">
            {{ $header }}
        </div>
    @endisset

    <div class="text-slate-200">
        {{ $slot }}
    </div>
</div>