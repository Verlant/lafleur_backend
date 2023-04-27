<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la commande') }} {{ $commande->id }}
        </h1>
    </x-slot>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                {{-- Input prix de vente --}}
                {{-- <label for="prix-vente-commande" class="text-gray-800 mb-1 font-bold text-center md:text-left">
                    {{ __('Prix de vente') }}
                </label>
                <input type="text" name="prix-vente-commande" id="prix-vente-commande" value="{{ $commande->prix_vente }}"
                    class="rounded border-gray-400 mb-1">
                @error('prix-vente-commande')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror --}}
                {{-- Input nom commande --}}
                {{-- <label for="nom-commande" class="text-gray-800 mb-1 font-bold text-center md:text-left">
                    {{ __('Nom du commande') }}
                </label>
                <input type="text" name="nom-commande" id="nom-commande" value="{{ $commande->nom_produit }}"
                    class="rounded border-gray-400 mb-1">
                @error('nom-commande')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror --}}
                <div class="flex flex-col gap-1 items-center mt-4 md:flex-row">
                    {{-- Select etat paiement --}}
                    <label for="etat-livraison" class="text-gray-800 mb-1 font-bold self-center">
                        {{ __('Suivi paiement') }}
                    </label>
                    <select name="etat-paiement" id="etat-paiement" class="rounded border-gray-400 select2">
                        <option value="A">
                            <x-buttons.validated></x-buttons.validated>
                        </option>
                        <option value="W">
                            <x-buttons.pending></x-buttons.pending>
                        </option>
                        <option value="B">
                            <x-buttons.cancelled></x-buttons.cancelled>
                        </option>
                    </select>
                    {{-- Select etat livraison --}}
                    <label for="etat-livraison" class="text-gray-800 sm:ml-4 mb-1 font-bold self-center">
                        {{ __('Suivi livraison') }}
                    </label>
                    <select name="etat-livraison" id="etat-livraison" class="rounded border-gray-400 select2">
                        <option value="A">
                            <x-buttons.validated></x-buttons.validated>
                        </option>
                        <option value="W">
                            <x-buttons.pending></x-buttons.pending>
                        </option>
                        <option value="B">
                            <x-buttons.cancelled></x-buttons.cancelled>
                        </option>
                    </select>
                </div>
                <div class="mt-4 max-w-fit md:max-w-none flex flex-col justify-end md:flex-row mx-auto md:mx-0">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.back :href="route('commandes.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
