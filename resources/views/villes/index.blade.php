<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les villes') }}
        </h1>
    </x-slot>
    @if (session('message'))
        <div class="max-w-7xl w-fit mt-4 p-4 mx-4 sm:mx-auto bg-white rounded shadow">
            {{ session('message') }}
        </div>
    @endif
    <x-stock-alert :fleurs="$fleurs"></x-stock-alert>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2">
        <table class="mb-4 mx-auto">
            <thead>
                <th class="p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Nom') }}</th>
                <th class="p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Livrable') }}</th>
                <th class="p-2 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="text-center">
                        {{ __('ACTIONS') }}
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($villes as $ville)
                    <tr>
                        <td class="p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($ville->nom_ville) }}</td>
                        <td class="p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($ville->est_livrable)
                                <x-buttons.deliverable></x-buttons.deliverable>
                            @else
                                <x-buttons.not-deliverable></x-buttons.not-deliverable>
                            @endif
                        </td>
                        <td class="p-3 text-sm font-medium max-w-xs">
                            <div class="flex flex-col sm:flex-row sm:justify-between w-max sm:w-auto">
                                <x-buttons.edit :href="route('villes.edit', $ville->id)"></x-buttons.edit>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
