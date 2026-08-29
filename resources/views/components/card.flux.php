<div class="p-6 rounded-2xl glass-panel shadow-xl space-y-4 transition-all duration-300 transform hover:-translate-y-1">
    @isset($header)
        <div class="border-b border-purple-500/15 pb-3.5 font-bold text-slate-100 flex justify-between items-center">
            {!! $header !!}
        </div>
    @endisset

    <div class="text-slate-300 text-sm space-y-2 leading-relaxed">
        {!! $slot !!}
    </div>

    @isset($footer)
        <div class="border-t border-purple-500/15 pt-3.5 text-xs text-slate-400">
            {!! $footer !!}
        </div>
    @endisset
</div>
