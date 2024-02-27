<table class="w-full text-left shadow-2xl">
    <tr class="bg-gray-300">
        <th class="p-2">Publisher</th>
        <th class="p-2">Actions</th>
    </tr>
    @forelse ($publishers as $publisher)
        @include('publishers.includes.publisher-row')
    @empty
        <p>No Publishers added yet.</p>
    @endforelse
</table>
