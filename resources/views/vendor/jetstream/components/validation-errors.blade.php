@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'bg-red-500 rounded p-3 font-semibold']) }} >
        <div class="font-medium text-white">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-white">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
