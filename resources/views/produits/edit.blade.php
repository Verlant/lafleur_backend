<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le produit') }} {{ $produit->typeProduit->nom_type_produit }}
        </h1>
    </x-slot>
    <div class="max-w-7xl mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('produits.update', $produit->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                {{-- Input prix de vente --}}
                <label for="prix-vente-produit" class="text-gray-800 mb-1 font-bold">
                    {{ __('Prix de vente') }}
                </label>
                <input type="text" name="prix-vente-produit" id="prix-vente-produit" value="{{ $produit->prix_vente }}"
                    class="rounded border-gray-400 mb-1">
                @error('prix-vente-produit')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div class="flex gap-1 items-center mt-4">
                    {{-- Select nom produit --}}
                    <label for="type-produit" class="text-gray-800 mb-1 font-bold self-center">
                        {{ __('Type de produit') }}
                    </label>
                    <select name="type-produit" id="type-produit" class="rounded border-gray-400 select2">
                        <option value="{{ $produit->type_produit_id }}">
                            {{ $produit->typeProduit->nom_type_produit }}</option>
                        @foreach ($typeProduits as $typeProduit)
                            <option value="{{ $typeProduit->id }}">{{ $typeProduit->nom_type_produit }}</option>
                        @endforeach
                    </select>
                    {{-- Select catégorie --}}
                    <label for="categorie-produit" class="text-gray-800 ml-5 mb-1 font-bold self-center">
                        {{ __('Catégorie') }}
                    </label>
                    <select name="categorie-produit" id="categorie-produit" class="rounded border-gray-400 select2">
                        <option value="{{ $produit->categorie_id }}">{{ $produit->categorie->nom_categorie }}</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4 flex justify-end">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('produits.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
    <div class="max-w-7xl mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <h2 class="text-gray-800 mb-1 font-bold">
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
        <h2 class="text-gray-800 mb-1 font-bold">
            {{ __('Ajouter / Modifier des fleurs au produit') }}
        </h2>
        <form action="{{ route('produits.attach', $produit->id) }}" method="POST" class="mt-2">
            @method('POST')
            @csrf
            {{-- Select fleur --}}
            <label for="fleur-produit" class="text-gray-800 mb-1 font-bold self-center">
                {{ __('Fleur') }}
            </label>
            <select name="fleur-produit[]" id="fleur-produit" multiple class="rounded border-gray-400 select2">
                @foreach ($fleurs as $fleur)
                    <option value="{{ $fleur->id }}">{{ $fleur->nom_fleur }} {{ $fleur->couleur->nom_couleur }}
                    </option>
                @endforeach
            </select>
            {{-- Input prix de vente --}}
            <label for="quantite-fleur-produit" class="text-gray-800 ml-4 mb-1 font-bold">
                {{ __('Quantité de fleurs') }}
            </label>
            <input type="text" name="quantite-fleur-produit" id="quantite-fleur-produit"
                class="rounded border-gray-400 mb-1 mr-4">
            @error('quantite-fleur-produit')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <x-buttons.reset></x-buttons.reset>
            <x-buttons.submit></x-buttons.submit>
        </form>
    </div>
</x-app-layout>
