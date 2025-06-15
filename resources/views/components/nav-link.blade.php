@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-2 pt-1 border-b-2 border-[#1db954] text-base font-semibold leading-5 text-[#1db954] focus:outline-none focus:border-[#1db954] transition duration-150 ease-in-out'
    : 'inline-flex items-center px-2 pt-1 border-b-2 border-transparent text-base font-semibold leading-5 text-white/80 hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:text-[#1db954] focus:border-[#1db954] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
