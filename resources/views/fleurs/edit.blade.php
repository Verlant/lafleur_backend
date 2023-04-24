<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la fleur') }} {{ $fleur->nom_fleur }}
        </h1>
    </x-slot>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('fleurs.update', $fleur->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                {{-- Input nom fleur --}}
                <label for="nom-fleur" class="text-gray-800 mb-1 font-bold">
                    {{ __('Nom') }}
                </label>
                <input type="text" name="nom-fleur" id="nom-fleur" value="{{ $fleur->nom_fleur }}"
                    class="rounded border-gray-400 mb-1">
                @error('nom-fleur')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                {{-- Input quantite stock --}}
                <label for="quantite-stock-fleur" class="text-gray-800 mb-1 font-bold">
                    {{ __('Quantité en stock') }}
                </label>
                <input type="text" name="quantite-stock-fleur" id="quantite-stock-fleur"
                    value="{{ $fleur->quantite_stock }}" class="rounded border-gray-400 mb-1">
                @error('quantite-stock-fleur')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                {{-- Select couleur --}}
                <div class="flex gap-1 items-center mt-4">
                    <label for="couleur-fleur" class="text-gray-800 mb-1 font-bold self-center">
                        {{ __('Couleur') }} :
                    </label>
                    <select name="couleur-fleur" id="couleur-fleur" class="rounded border-gray-400">
                        <option value="{{ $fleur->couleur_id }}">{{ $fleur->couleur->nom_couleur }}</option>
                        @foreach ($couleurs as $couleur)
                            <option value="{{ $couleur->id }}">{{ $couleur->nom_couleur }}</option>
                        @endforeach
                    </select>
                    {{-- Select unite --}}
                    <label for="unite-fleur" class="text-gray-800 ml-5 mb-1 font-bold self-center">
                        {{ __('Unite') }} :
                    </label>
                    <select name="unite-fleur" id="unite-fleur" class="rounded border-gray-400">
                        <option value="{{ $fleur->unite_id }}">{{ $fleur->unite->nom_unite }}</option>
                        @foreach ($unites as $unite)
                            <option value="{{ $unite->id }}">{{ $unite->nom_unite }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4 flex justify-end">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('fleurs.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
