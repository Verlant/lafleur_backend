<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les fleurs') }}
        </h1>
    </x-slot>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="mb-4">
            <thead>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Nom') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Quantite') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Dernier inventaire') }}
                    <br /> (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Couleur') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Unité') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="flex justify-between items-center pl-16">
                        {{ __('ACTIONS') }}<x-buttons.create :href="route('fleurs.create')"></x-buttons.create>
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($fleurs as $fleur)
                    <tr>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($fleur->nom_fleur) }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">{{ $fleur->quantite_stock }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $fleur->date_inventaire }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($fleur->couleur->nom_couleur) }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($fleur->unite->nom_unite) }}
                        </td>
                        <td class="sm:p-3 text-sm font-medium max-w-xs">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <x-buttons.edit :href="route('fleurs.edit', $fleur->id)"></x-buttons.edit>
                                <x-buttons.show :href="route('fleurs.show', $fleur->id)"></x-buttons.show>
                                <x-buttons.destroy :action="route('fleurs.destroy', $fleur->id)"></x-buttons.destroy>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
