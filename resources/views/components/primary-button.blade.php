<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-primary-700 border border-transparent rounded-xl font-semibold text-sm text-white tracking-widest hover:bg-primary-800 focus:bg-primary-800 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-primary-200/50']) }}>
    {{ $slot }}
</button>
