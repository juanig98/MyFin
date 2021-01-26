<div class="container mx-auto py-10 flex h-screen">
    <div class="w-2/3 pl-4 h-full flex flex-col">
        <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300">
            {{ __('Transactions')}}
        </div>

        <div class="w-full h-full overflow-auto shadow bg-white" id="journal-scroll">

            <table class="w-full">
                <tbody class="">
                    @foreach ($transactions as $item)
                    <tr
                        class="relative transform scale-100 text-xs py-1 border-b-2 border-yellow-100 cursor-default bg-gray-200 bg-opacity-25">
                        <td class="pl-5 pr-3 whitespace-no-wrap">

                            <div class="text-gray-400">{{ $item->date }}</div>
                            <div>{{ $item->date }}</div>
                        </td>

                        <td class="px-2 py-2 whitespace-no-wrap">
                            <div class="leading-5 text-gray-500 font-medium">{{ $item->title }}</div>
                            <div class="leading-5 text-gray-900"> {{ $item->description }}
                                <a class="text-blue-500 hover:underline" href="#">
                                    {{ $item->badge_symbol . " " .  $item->amount }}</a></div>
                            <div class="leading-5 text-gray-800">Hello message</div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
