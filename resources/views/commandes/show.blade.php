<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail de la commande') }} n°{{ $commande->id }}
        </h1>
    </x-slot>
    {{-- @dd($commande); --}}
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <div class="flex flex-wrap justify-center sm:justify-normal">
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                {{ __('Date de commande') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">
                    {{ $commande->date_commande }}
                </span>
            </h2>
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                {{ __('Date de livraison') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">{{ $commande->date_livraison }}</span>
            </h2>
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
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
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/3">
                {{ __('Produits') }}
                <br />
                <span class="text-gray-800 font-normal text-xl flex flex-col">
                    @foreach ($commande->produits as $produit)
                        <span>{{ $produit->pivot->quantite_vente }} {{ $produit->nom_produit }} -
                            {{ $produit->prix_vente }} € l'unité</span>
                    @endforeach
                </span>
            </h2>
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/3">
                {{ __('Prix total') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">
                    @php($prixTotal = 0)
                    @if ($commande->frais_livraison)
                        @foreach ($commande->produits as $produit)
                            @php($prixTotal += $produit->prix_vente * $produit->pivot->quantite_vente + 2.99)
                        @endforeach
                    @else
                        @php($prixTotal += $produit->prix_vente * $produit->pivot->quantite_vente)
                    @endif
                    {{ $prixTotal }} €
                </span>
            </h2>

            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/3">
                {{ __('Lot gagné') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">
                    @if (isset($commande->loterie_id))
                        {{ ucfirst($commande->loterie->nom_lot) }}
                    @else
                        Aucun lot gagné
                    @endif
                </span>
            </h2>
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                {{ __('Client') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">
                    {{ ucfirst($commande->client->prenom_client) }} <br />
                    {{ ucfirst($commande->client->nom_client) }}
                </span>
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
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                {{ __('Email') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">{{ $commande->client->email }}</span>
            </h2>
            <h2
                class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize basis-full md:basis-1/2 xl:basis-1/4">
                {{ __('Téléphone') }}
                <br />
                <span class="text-gray-800 font-normal text-xl ">{{ $commande->client->tel }}</span>
            </h2>
        </div>
        <div class="flex flex-wrap justify-center sm:justify-end">
            <x-buttons.edit :href="route('commandes.edit', $commande->id)"></x-buttons.edit>
            <x-buttons.back :href="route('commandes.index')"></x-buttons.back>
            <x-buttons.destroy :action="route('commandes.destroy', $commande->id)"></x-buttons.destroy>
        </div>
    </div>
</x-app-layout>
