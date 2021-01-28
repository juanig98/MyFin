<div class="pl-4 w-auto flex py-5 h-screen  ">
    <div class="flex flex-col">
        <div class="overflow-auto shadow sm:rounded-lg bg-white">
            <table>
                <thead>
                    <td colspan="2"
                        class="bg-black text-md text-center text-white font-bold px-2 py-1 shadow border-b border-gray-300">
                        {{ __('Transactions')}}
                    </td>
                </thead>

                <tbody >
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
