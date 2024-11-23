@props(['messages'])

@if ($messages)
    <ul style="list-style-type: none;" {{ $attributes->merge(['class' => 'fs-6 text-danger space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif