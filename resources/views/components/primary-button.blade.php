<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary rounded-pill fw-bold border border-0']) }}>
    {{ $slot }}
</button>
