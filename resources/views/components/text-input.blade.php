@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block mt-1 w-full h-10 bg-black border border-[#1db954]/30 text-white focus:border-[#1db954] focus:ring-[#1db954] rounded-md shadow-none transition']) }}>