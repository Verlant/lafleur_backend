<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les commandesClients') }}
        </h1>
    </x-slot>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="mb-4">
            <thead>
                {{-- @dd($commandesClients); --}}
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Client') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Date commande') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Date livraison') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi paiement') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi livraison') }}</th>
                {{-- <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Modifié le') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">
                    {{ __('Composé des fleurs') }}
                </th> --}}
                <th class="sm:p-2 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="flex justify-between items-center pl-4">
                        {{ __('ACTIONS') }}<x-buttons.create :href="route('commandesClients.create')"></x-buttons.create>
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($commandesClients as $commandeClient)
                    {{-- @dd($commandeClient) --}}
                    <tr>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($commandeClient)
                            @else
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->date_commande }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->date_livraison }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($commandeClient->etat_paiement == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commandeClient->etat_paiement == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($commandeClient->etat_livraison == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commandeClient->etat_livraison == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        {{-- <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->date_modif }}
                            @if (isset($commandeClient->date_modif))
                                {{ $commandeClient->date_modif }}
                            @else
                                Jamais
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            <div class="flex flex-col">
                                @if (count($commandeClient->fleurs))
                                    @foreach ($commandeClient->fleurs as $fleur)
                                        <span>
                                            {{ $fleur->nom_fleur }}
                                            {{ $fleur->couleur->nom_couleur }}
                                        </span>
                                    @endforeach
                                @else
                                    Aucun
                                @endif
                            </div>
                        </td> --}}
                        <td class="sm:p-3 text-sm font-medium max-w-xs">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <x-buttons.show :href="route('commandesClients.show', $commandeClient->commande_id)"></x-buttons.show>
                                <x-buttons.destroy :action="route('commandesClients.destroy', $commandeClient->commande_id)"></x-buttons.destroy>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
