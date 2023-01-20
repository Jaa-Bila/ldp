<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-amber-500 hover:bg-blue-600 text-white whitespace-nowrap']) }}>
    {{ $slot }}
</button>
