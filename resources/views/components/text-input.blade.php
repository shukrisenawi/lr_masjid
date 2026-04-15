@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-2xl border-slate-200 bg-slate-50/70 px-4 py-3.5 shadow-sm transition-all duration-200 placeholder:text-slate-300 focus:border-primary-500 focus:bg-white focus:ring-primary-500/20']) }}>
