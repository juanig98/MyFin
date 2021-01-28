<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-gray-400 overflow-hidden space-x-4 flex shadow-xl sm:rounded-lg p-3">

                @livewire('table-transaction', ['user' => Auth::user()])

                <div class="w-2/3">
                    @livewire('form-transaction', ['user' => Auth::user()])
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
