@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-primary-500 focus:ring-primary-500/20 rounded-xl shadow-sm py-3 px-4 transition-all duration-200 placeholder:text-slate-300']) }}>
