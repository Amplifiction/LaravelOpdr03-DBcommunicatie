<tr class="even:bg-gray-100 odd:bg-gray-200">
    <td class="p-2">
        @if($game->completed)
            <span class="text-green-500 font-semibold">&checkmark;</span>
        @else
            <span class="text-red-500 font-semibold">&times;</span>
        @endif
    </td>
    <td class="p-2 text-lg">
        <a href="{{ route('games.show', $game) }}" class="hover:underline">{{$game->name}}</a>
    </td>
    <td class="p-2 text-gray-500">
        <a href="{{ route('publishers.show', ['publisher' => $game->publisher]) }}" class="hover:underline">{{$game->publisher->name}}</a>
    </td>
    <td class="p-2">
        <a href="{{ route('games.show', $game) }}" class="px-4 py-1 bg-blue-200 hover:bg-blue-300 text-blue-500 hover:text-blue-600">View</a>
        @include('games.includes.actions')
    </td>
</tr>
