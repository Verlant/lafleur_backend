<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les commandes') }}
        </h1>
    </x-slot>
    <x-stock-alert :fleurs="$fleurs"></x-stock-alert>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2">
        <table class="mb-4 mx-auto">
            <thead>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center sm:table-cell hidden">
                    {{ __('Date commande') }}
                    <br />
                </th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Date livraison') }}
                    <br />
                </th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi paiement') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center">{{ __('Suivi livraison') }}</th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 text-center sm:table-cell hidden">
                    {{ __('Prix total') }}
                </th>
                <th class="sm:p-2 p-1 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="text-center">
                        {{ __('ACTIONS') }}
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center sm:table-cell hidden">
                            {{ date('d/m/Y H:i', strtotime($commande->date_commande)) }}
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            {{ date('d/m/Y', strtotime($commande->date_livraison)) }}
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            @if ($commande->etat_paiement == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_paiement == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center">
                            @if ($commande->etat_livraison == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_livraison == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </td>
                        <td class="sm:p-2 p-1 text-sm font-medium text-gray-800 text-center sm:table-cell hidden">
                            @php($prixTotal = 0)
                            @if ($commande->frais_livraison)
                                @foreach ($commande->produits as $produit)
                                    @php($prixTotal += $produit->prix_vente * $produit->pivot->quantite_vente + 2.99)
                                @endforeach
                            @else
                                @foreach ($commande->produits as $produit)
                                    @php($prixTotal += $produit->prix_vente * $produit->pivot->quantite_vente)
                                @endforeach
                            @endif
                            {{ $prixTotal }} €
                        </td>
                        <td class="sm:p-3 text-sm font-medium max-w-xs">
                            <div class="flex flex-col justify-between">
                                @if (($commande->etat_paiement == 'A' && $commande->etat_livraison == 'A') || $commande->etat_paiement == 'B')
                                @else
                                    <x-buttons.edit :href="route('commandes.edit', $commande->id)"></x-buttons.edit>
                                @endif
                                <x-buttons.show :href="route('commandes.show', $commande->id)"></x-buttons.show>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
