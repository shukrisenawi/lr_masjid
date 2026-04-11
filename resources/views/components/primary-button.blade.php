<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-xl bg-primary-600 px-5 py-3 text-xs font-bold uppercase tracking-widest text-white transition-all duration-200 hover:bg-primary-700 hover:shadow-lg hover:shadow-primary-500/25 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
