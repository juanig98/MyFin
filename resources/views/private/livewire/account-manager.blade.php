<div>
    <x-flash-message />
    <div class="w-full bg-gray-400 overflow-hidden space-x-4 flex shadow-xl sm:rounded-lg p-3">

        <div class="pl-4 w-auto flex py-5 h-screen  ">
            <div class="flex flex-col">
                <div class="overflow-auto shadow sm:rounded-lg bg-white">
                    <table>
                        <thead>
                            <td colspan="2"
                                class="bg-black text-md text-center text-white font-bold px-2 py-1 shadow border-b border-gray-300">
                                {{ __('My Transactions')}}
                            </td>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $item)
                            <tr
                                class="relative py-2 transform scale-100 text-xs p-3 border-b-2 border-yellow-100 cursor-default bg-gray-200 bg-opacity-25 {{ ($item->type == 'Output') ? 'bg-red-300': 'bg-green-300' }}">
                                <td class="px-2 py-2">

                                    <div>{{ $item->date }}</div>
                                    <div class="text-gray-400">{{ $item->time }}</div>
                                </td>

                                <td class="px-2 py-2">
                                    <div class="leading-5 text-black text-base font-medium">{{ $item->title }} <span
                                            class="leading-5 text-lg font-bold text-gray-800">
                                            {{ $item->badge_symbol . " " .  $item->amount }}</span></div>
                                    @if($item->type == "Transfer")
                                    <div> <a class="text-blue-500 hover:underline" href="#">
                                            {{ $item->wallet_origin_name }}</a>
                                        <i class="fa fa-arrow-right text-green-500" aria-hidden="true"></i>
                                        <a class="text-blue-500 hover:underline" href="#">
                                            {{ $item->wallet_name }}</a>
                                    </div>
                                    @else
                                    <div class="leading-5 text-gray-500"> {{ $item->description }}
                                        <a class="text-blue-500 hover:underline" href="#">
                                            {{ $item->wallet_name }}</a></div>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

        <div class="w-2/3">

            <x-simple-card>


                <x-jet-validation-errors class="mb-4" />

                <form wire:submit.prevent="save">

                    <div class="flex space-x-3">

                        <div class="w-1/2">
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input wire:model="transaction.title" id="title" class="block my-2 w-full" type="text"
                                name="title" required autofocus />
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <x-textarea wire:model="transaction.description" id="description" class="block my-2 w-full"
                                type="text" name="description" />

                            <x-jet-label for="type" value="{{ __('Transaction type') }}" />
                            <div class="block mt-1 mb-2">
                                <label class="inline-flex items-center">
                                    <input name="type" wire:model="transaction.type" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Input" required checked>
                                    <span class="ml-1 mr-8  text-white ">{{ __('Input') }}</span>
                                    <input name="type" wire:model="transaction.type" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Output" required>
                                    <span class="ml-1 mr-8  text-white ">{{ __('Output') }}</span>
                                    <input name="type" wire:model="transaction.type" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Transfer" required>
                                    <span class="ml-1 mr-8  text-white ">{{ __('Transfer') }}</span>
                                </label>
                            </div>

                            <x-jet-label for="modality" value="{{ __('Modality') }}" />
                            <div class="block mt-1 mb-2">
                                <label class="inline-flex items-center">
                                    <input name="modality" wire:model="transaction.modality" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Common" required checked>
                                    <span class="ml-1 mr-4  text-white ">{{ __('Common') }}</span>
                                    <input name="modality" wire:model="transaction.modality" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Extraordinary" required>
                                    <span class="ml-1 mr-4  text-white ">{{ __('Extraordinary') }}</span>
                                    <input name="modality" wire:model="transaction.modality" type="radio"
                                        class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                                        value="Permanent" required>
                                    <span class="ml-1 mr-4  text-white ">{{ __('Permanent') }}</span>
                                </label>
                            </div>
                            balances_badges

                        </div>

                        <div class="w-1/2">
                            <x-jet-label for="date" value="{{ __('Date') }}" />
                            <x-jet-input wire:model="transaction.date" id="date" class="block my-2 w-full" type="date"
                                name="date" required autofocus />

                            <x-jet-label for="amount" value="{{ __('Amount') }}" />
                            <x-jet-input wire:model="transaction.amount" id="amount" class="block my-2 w-full"
                                type="number" step="0.01" name="amount" required autofocus />

                            <x-jet-label for="wallet" value="{{ __('Wallet') }}" />
                            <select wire:model="transaction.wallet_id" id="wallet" name="wallet" required autofocus
                                class='block my-2 w-full text-black bg-gray-200 border-gray-300
                        focus:border-yellow-200 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm'>
                                <option value="" readonly>{{ __('Choose')}}</option>
                                @foreach ($wallets as $o)
                                <option value="{{$o->value}}">{{$o->name}}</option>
                                @endforeach
                            </select>
                            <x-jet-label for="badge" value="{{ __('Badge') }}" />
                            <select wire:model="transaction.badge_id" id="badge" name="badge" required autofocus
                                class='block my-2 w-full text-black bg-gray-200 border-gray-300
                        focus:border-yellow-200 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm'>
                                <option value="" readonly>{{ __('Choose')}}</option>
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
            <x-simple-card class="bg-yellow-200">
                <div class="text-center">
                    <h3 class="text-black font-bold text-3xl"> {{ __('Balances') }} </h3>
                </div>

                <div class="grid gap-4 grid-cols-3">

                    @foreach ($balances['badges'] as $item)
                    <div class="inline-block">
                        <span class="text-black font-bold text-medium">{{ $item->name . " " . $item->total }}</span>
                    </div>
                    @endforeach

                    @foreach ($balances['wallets'] as $item)
                    <div class="text-center">
                        <span class="text-black font-bold text-medium">{{ $item->name . " " . $item->total }}</span>
                    </div>
                    @endforeach
                </div>


            </x-simple-card>
        </div>
    </div>
</div>
