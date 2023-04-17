<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-xs text-center items-center px-8 py-2 bg-gray-800 border border-transparent rounded-md text-white uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
