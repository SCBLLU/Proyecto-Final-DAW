<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2 bg-[#1db954] text-black rounded-full font-bold hover:bg-white hover:text-[#1db954] border border-[#1db954] transition']) }}>
    {{ $slot }}
</button>
