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
                <div class="flex flex-wrap justify-center sm:justify-normal">
                    <h2 class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize">
                        {{ __('Date de livraison') }}
                        <br />
                        <span class="text-gray-800 font-normal text-xl ">{{ $commande->date_livraison }}</span>
                    </h2>
                    <h2
                        class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                        {{ __('Adresse') }}
                        <br />
                        <span class="text-gray-800 font-normal text-xl ">
                            {{ ucfirst($commande->client->adresse->rue) }} <br />
                            {{ ucfirst($commande->client->adresse->ville->nom_ville) }} <br />
                            {{ $commande->client->adresse->codePostal->cp }}
                        </span>
                    </h2>
                    <h2 class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize">
                        {{ __('Etat du paiement') }}
                        <br />
                        <span class="text-gray-800 font-normal text-xl flex items-center justify-center">
                            @if ($commande->etat_paiement == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_paiement == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </span>
                    </h2>
                    <h2
                        class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                        {{ __('Etat de la livraison') }}
                        <br />
                        <span class="text-gray-800 font-normal text-xl flex items-center justify-center">
                            @if ($commande->etat_livraison == 'A')
                                <x-buttons.validated></x-buttons.validated>
                            @elseif ($commande->etat_livraison == 'W')
                                <x-buttons.pending></x-buttons.pending>
                            @else
                                <x-buttons.cancelled></x-buttons.cancelled>
                            @endif
                        </span>
                    </h2>
                </div>
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
