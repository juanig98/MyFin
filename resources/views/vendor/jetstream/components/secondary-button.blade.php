<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-200 border border-white rounded-md font-semibold text-xs text-black uppercase tracking-widest shadow-sm hover:text-black focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-white active:bg-red-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
