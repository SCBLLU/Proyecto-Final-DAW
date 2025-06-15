@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[#1db954]']) }}>
        {{ $status }}
    </div>
@endif
