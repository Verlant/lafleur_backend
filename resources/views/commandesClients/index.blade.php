<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les commandesClients') }}
        </h1>
    </x-slot>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2">
        <table class="mb-4 mx-auto">
            <thead>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Adresse') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Date commande') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Date livraison') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Prix') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi paiement') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi livraison') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="flex justify-center items-center">
                        {{ __('ACTIONS') }}
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($commandesClients as $commandeClient)
                    @dump($commandeClient)
                    <tr>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{-- {{ $commandeClient->adresse }} <br />
                            {{ $commandeClient->nom_ville }} <br />
                            {{ $commandeClient->cp }}
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->commande->date_commande }}</td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->commande->date_livraison }}
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->frais_livraison }}
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            @if ($commandeClient->commande->etat_paiement == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commandeClient->commande->etat_paiement == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            @if ($commandeClient->commande->etat_livraison == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commandeClient->commande->etat_livraison == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif --}}
                        </td>
                        {{-- <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{ $commandeClient->date_modif }}
                            @if (isset($commandeClient->date_modif))
                                {{ $commandeClient->date_modif }}
                            @else
                                Jamais
                            @endif
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
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
                                <x-buttons.edit :href="route('fleurs.edit', $commandeClient->commande_id)"></x-buttons.edit>
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
