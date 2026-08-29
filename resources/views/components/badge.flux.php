@php
    $type = $type ?? 'purple';
    $styles = [
        'purple' => 'bg-purple-950/60 text-purple-300 border-purple-500/30',
        'info' => 'bg-sky-950/60 text-sky-300 border-sky-500/30',
        'success' => 'bg-emerald-950/60 text-emerald-300 border-emerald-500/30',
        'warning' => 'bg-amber-950/60 text-amber-300 border-amber-500/30',
        'danger' => 'bg-rose-950/60 text-rose-300 border-rose-500/30',
    ][$type] ?? 'bg-purple-950/60 text-purple-300 border-purple-500/30';
@endphp
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold border {{ $styles }}">
    {{ $slot ?: ($text ?? 'Badge') }}
</span>
