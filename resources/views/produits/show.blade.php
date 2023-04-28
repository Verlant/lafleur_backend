<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail du produit') }} {{ ucfirst($produit->nom_produit) }}
        </h1>
    </x-slot>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <div class="flex flex-wrap justify-center sm:justify-normal">
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Catégorie') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ ucfirst($produit->categorie->nom_categorie) }}</span>
            </h2>
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Prix de vente') }}
                <br />
                <span class="text-gray-800 font-normal text-xl text-center">{{ $produit->prix_vente }}</span>
            </h2>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Date création') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ date('d/m/Y H:i', strtotime($produit->date_creation)) }}</span>
            </h3>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Date modification') }}
                <br />
                @if (isset($produit->date_modif))
                    <span
                        class="text-gray-800 font-normal text-xl text-center">{{ date('d/m/Y H:i', strtotime($produit->date_modif)) }}</span>
                @else
                    <span class="text-gray-800 font-normal text-xl text-center">Jamais</span>
                @endif
            </h3>
        </div>
        @if (count($produit->fleurs))
            <div class="max-w-7xl mx-auto mt-6 py-6 px-4">
                <h2 class="mb-1 font-bold text-2xl text-gray-500">
                    {{ __('Liste des fleurs contenu dans le produit') }}
                </h2>
                <div class="flex flex-wrap mb-4">
                    @foreach ($produit->fleurs as $fleur)
                        <x-buttons.fleur>
                            <a class="hover:text-gray-50" href="{{ route('fleurs.show', $fleur->id) }}">
                                {{ $fleur->pivot->quantite_fleur }} {{ ucfirst($fleur->nom_fleur) }}
                                {{ ucfirst($fleur->couleur->nom_couleur) }}
                            </a>
                            <a href="{{ route('produits.detach', [$produit->id, $fleur->id]) }}">
                                <x-icon-detach></x-icon-detach>
                            </a>
                        </x-buttons.fleur>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="flex flex-wrap justify-center sm:justify-end">
            <x-buttons.edit :href="route('produits.edit', $produit->id)"></x-buttons.edit>
            <x-buttons.back :href="route('produits.index')"></x-buttons.back>
            <x-buttons.destroy :action="route('produits.destroy', $produit->id)"></x-buttons.destroy>
        </div>
    </div>
</x-app-layout>
