@props(['value'])
<label {{ $attributes->merge(['form-label' => 'form-label']) }}>
    {{ $value ?? $slot }}
</label>
