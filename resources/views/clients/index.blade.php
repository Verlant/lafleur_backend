<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les clients') }}
        </h1>
    </x-slot>

    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="w-4/5">
            <thead>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('ID') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Nom') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Prénom') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Mail') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Téléphone') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Inscrit depuis') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 flex justify-between items-center max-w-xs">
                    {{ __('ACTIONS') }}<x-buttons.create :href="route('clients.create')"></x-buttons.create>
                </td>
                <!-- <td class="sm:p-2 text-sm font-semibold"></td> -->
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->id }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->nom_personne }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->prenom_personne }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->email }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->tel }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $client->date_creation }}
                        </td>
                        <td class="flex flex-col sm:flex-row justify-between sm:p-3 text-sm font-medium max-w-xs">
                            <x-buttons.edit :href="route('clients.edit', $client->id)"></x-buttons.edit>
                            <x-buttons.show :href="route('clients.show', $client->id)"></x-buttons.show>
                            <x-buttons.destroy :action="route('clients.destroy', $client->id)"></x-buttons.destroy>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
