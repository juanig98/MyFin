<div class="min-h-min m-2 flex-1 sm:pt-0 bg-dark">
    <div {!! $attributes->merge(['class' => "min-w-min mt-2 px-5 py-4 bg-black shadow-md overflow-hidden
        sm:rounded-lg"]) !!}>
        {{ $slot }}
    </div>
</div>
