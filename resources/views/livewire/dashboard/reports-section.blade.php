<div class="container mx-auto p-10">
    <table wire:loading.delay.class="opacity-50" class="table-auto w-full bg-white rounded-md">
        @unless ($reports->isEmpty())
            <thead>
            <th class="px-4 py-2 bg-gray-200">Temat</th>
            <th class="px-4 py-2 bg-gray-200">Treść</th>
            <th class="px-4 py-2 bg-gray-200">Id użytkownika</th>
            <th class="px-4 py-2 bg-gray-200">Data złożenia wniosku</th>
            <th class="px-4 py-2 bg-gray-200">Gotowe</th>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td class=" px-4 py-2">{{ $report->subject }}</td>
                    <td class=" px-4 py-2">{{ $report->body }}</td>
                    <td class=" px-4 py-2">{{ $report->user_id }}</td>
                    <td class=" px-4 py-2">{{ $report->created_at->diffForHumans() }}</td>
                    <td class=" px-4 py-2">
                        <x-button-icon-green wire:click="setDone({{$report->id}})" icon="fas fa-check">Zrobione
                        </x-button-icon-green>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @else
            <div class="max-w-s mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 p-5">
                <div class="px-4 py-2">
                    <h1 class="text-3xl font-bold text-gray-800 uppercase dark:text-white">Brawo Bartek...</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Ogarnąłeś wszystkie wnioski</p>
                </div>
            </div>
        @endunless
    </table>

</div>

