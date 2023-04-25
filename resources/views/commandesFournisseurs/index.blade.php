<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les commandes') }}
        </h1>
    </x-slot>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="mb-4">
            <thead>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Type commmande') }}</th>
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
                        {{ __('ACTIONS') }}<x-buttons.create :href="route('commandes.create')"></x-buttons.create>
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @dump($commande)
                            @if ($commande)
                            @else
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commande->date_commande }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commande->date_livraison }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($commande->etat_paiement == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_paiement == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            @if ($commande->etat_livraison == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_livraison == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        {{-- <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $commande->date_modif }}
                            @if (isset($commande->date_modif))
                                {{ $commande->date_modif }}
                            @else
                                Jamais
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            <div class="flex flex-col">
                                @if (count($commande->fleurs))
                                    @foreach ($commande->fleurs as $fleur)
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
                                <x-buttons.show :href="route('commandes.show', $commande->id)"></x-buttons.show>
                                <x-buttons.destroy :action="route('commandes.destroy', $commande->id)"></x-buttons.destroy>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
