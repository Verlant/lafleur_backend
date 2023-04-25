<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un produit') }}
        </h1>
    </x-slot>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('produits.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="flex flex-col">
                {{-- Input prix de vente --}}
                <label for="prix-vente-produit" class="text-gray-800 mb-1 font-bold">
                    {{ __('Prix de vente') }}
                </label>
                <input type="text" name="prix-vente-produit" id="prix-vente-produit"
                    class="rounded border-gray-400 mb-4">
                @error('prix-vente-produit')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div class="flex gap-1 items-center my-4">
                    {{-- Select nom produit --}}
                    <label for="type-produit" class="text-gray-800 mb-1 font-bold self-center">
                        {{ __('Type de produit') }}
                    </label>
                    <select name="type-produit" id="type-produit" class="rounded border-gray-400">
                        @foreach ($typeProduits as $typeProduit)
                            <option value="{{ $typeProduit->id }}">{{ $typeProduit->nom_type_produit }}</option>
                        @endforeach
                    </select>
                    {{-- Select catégorie --}}
                    <label for="categorie-produit" class="text-gray-800 ml-5 mb-1 font-bold self-center">
                        {{ __('Catégorie') }}
                    </label>
                    <select name="categorie-produit" id="categorie-produit" class="rounded border-gray-400">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-1 items-center my-4">
                    {{-- Select fleur --}}
                    <label for="fleur-produit" class="text-gray-800 mb-1 font-bold self-center">
                        {{ __('Fleur') }}
                    </label>
                    <select name="fleur-produit[]" id="fleur-produit" multiple class="rounded border-gray-400 select2">
                        @foreach ($fleurs as $fleur)
                            <option value="{{ $fleur->id }}">{{ $fleur->nom_fleur }}
                                {{ $fleur->couleur->nom_couleur }}
                            </option>
                        @endforeach
                    </select>
                    {{-- Input quantite de fleur --}}
                    <label for="quantite-fleur-produit" class="text-gray-800 ml-4 mb-1 font-bold">
                        {{ __('Quantité de fleurs') }}
                    </label>
                    <input type="text" name="quantite-fleur-produit" id="quantite-fleur-produit"
                        class="rounded border-gray-400 mb-1 mr-4">
                    @error('quantite-fleur-produit')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-wrap justify-center sm:justify-end">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('fleurs.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
