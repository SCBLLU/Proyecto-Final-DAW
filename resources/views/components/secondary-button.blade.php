<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-2 bg-white text-black border border-[#1db954] rounded-full font-bold hover:bg-[#1db954] hover:text-white transition']) }}>
    {{ $slot }}
</button>
