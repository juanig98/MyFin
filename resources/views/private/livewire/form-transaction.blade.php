<div>
    <x-simple-card>


        <x-jet-validation-errors class="mb-4" />

        <form wire:submit.prevent="clicked">

            <div class="flex space-x-3">

                <div class="w-1/2">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input wire:model="transaction.title" id="title" class="block my-2 w-full" type="text"
                        name="title" required autofocus />
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-textarea wire:model="transaction.description" id="description" class="block my-2 w-full"
                        type="text" name="description" />

                    <x-jet-label for="type"  value="{{ __('Transaction type') }}" />
                    <div class="block mt-1 mb-2">
                        <label class="inline-flex items-center">
                            <input name="type" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Input" required checked>
                            <span class="ml-1 mr-8  text-white ">{{ __('Input') }}</span>
                            <input name="type" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Output" required>
                            <span class="ml-1 mr-8  text-white ">{{ __('Output') }}</span>
                            <input name="type" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Transfer" required>
                            <span class="ml-1 mr-8  text-white ">{{ __('Transfer') }}</span>
                        </label>
                    </div>

                    <x-jet-label for="modality"  value="{{ __('Modality') }}" />
                    <div class="block mt-1 mb-2">
                        <label class="inline-flex items-center">
                            <input name="modality" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Common" required checked>
                            <span class="ml-1 mr-4  text-white ">{{ __('Common') }}</span>
                            <input name="modality" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Extraordinary" required>
                            <span class="ml-1 mr-4  text-white ">{{ __('Extraordinary') }}</span>
                            <input name="modality" type="radio"
                                class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                value="Permanent" required>
                            <span class="ml-1 mr-4  text-white ">{{ __('Permanent') }}</span>
                        </label>
                    </div>


                </div>

                <div class="w-1/2">
                    <x-jet-label for="amount" value="{{ __('Amount') }}" />
                    <x-jet-input wire:model="transaction.amount" id="amount" class="block my-2 w-full" type="number"
                        step="0.01" name="amount" required autofocus />

                    <x-jet-label for="wallet" value="{{ __('Wallet') }}" />
                    <select wire:model="transaction.wallet" id="wallet" name="wallet" required autofocus
                        class='block my-2 w-full text-black bg-gray-200 border-gray-300
                            focus:border-yellow-200 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm'>
                        @foreach ($wallets as $o)
                        <option value="{{$o->value}}">{{$o->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-label for="badge" value="{{ __('Badge') }}" />
                    <select wire:model="transaction.badge" id="badge" name="badge" required autofocus
                        class='block my-2 w-full text-black bg-gray-200 border-gray-300
                            focus:border-yellow-200 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm'>
                        @foreach ($badges as $o)
                        <option value="{{$o->value}}">{{$o->name . " (" . $o->shot_name.")"}}</option>
                        @endforeach
                    </select>
                    <x-jet-button class="mx-3 my-5 float-right" type="submit">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>

        </form>

    </x-simple-card>

</div>
