<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tout les produits') }}
        </h1>
    </x-slot>
    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="mb-4">
            <thead>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Type de produit') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Prix de vente') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Catégorie') }}</th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Ajouté le') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">{{ __('Modifié le') }}
                    <br />
                    (Année-Mois-Jour Heure)
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 text-center">
                    {{ __('Composé des fleurs') }}
                </th>
                <th class="sm:p-2 text-sm font-semibold text-gray-600 max-w-xs">
                    <div class="flex justify-between items-center pl-16">
                        {{ __('ACTIONS') }}<x-buttons.create :href="route('produits.create')"></x-buttons.create>
                    </div>
                </th>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($produit->typeProduit->nom_type_produit) }}</td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $produit->prix_vente }} €
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ ucfirst($produit->categorie->nom_categorie) }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $produit->date_creation }}
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            {{ $produit->date_modif }}
                            @if (isset($produit->date_modif))
                                {{ $produit->date_modif }}
                            @else
                                Jamais
                            @endif
                        </td>
                        <td class="sm:p-2 text-sm font-medium text-gray-800 text-center">
                            <div class="flex flex-col">
                                @if (count($produit->fleurs))
                                    @foreach ($produit->fleurs as $fleur)
                                        <span>
                                            {{ ucfirst($fleur->nom_fleur) }}
                                            {{ $fleur->couleur->nom_couleur }}
                                        </span>
                                    @endforeach
                                @else
                                    Aucun
                                @endif
                            </div>
                        </td>
                        <td class="sm:p-3 text-sm font-medium max-w-xs">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <x-buttons.edit :href="route('produits.edit', $produit->id)"></x-buttons.edit>
                                <x-buttons.show :href="route('produits.show', $produit->id)"></x-buttons.show>
                                <x-buttons.destroy :action="route('produits.destroy', $produit->id)"></x-buttons.destroy>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
