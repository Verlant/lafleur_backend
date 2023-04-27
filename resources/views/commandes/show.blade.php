<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail de la commande') }} {{ $commande->id }}
        </h1>
    </x-slot>
    @dd($commande);
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <div class="flex flex-wrap justify-center sm:justify-normal">
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Catégorie') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ ucfirst($commande->categorie->nom_categorie) }}</span>
            </h2>
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Prix de vente') }}
                <br />
                <span class="text-gray-800 font-normal text-xl text-center">{{ $commande->prix_vente }}</span>
            </h2>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Date création') }}
                <br />
                <span class="text-gray-800 font-normal text-xl text-center">{{ $commande->date_creation }}</span>
            </h3>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Date modification') }}
                <br />
                @if (isset($commande->date_modif))
                    <span class="text-gray-800 font-normal text-xl text-center">{{ $commande->date_modif }}</span>
                @else
                    <span class="text-gray-800 font-normal text-xl text-center">Jamais</span>
                @endif
            </h3>
        </div>
        <div class="flex flex-wrap justify-center sm:justify-end">
            <x-buttons.edit :href="route('commandes.edit', $commande->id)"></x-buttons.edit>
            <x-buttons.back :href="route('commandes.index')"></x-buttons.back>
            <x-buttons.destroy :action="route('commandes.destroy', $commande->id)"></x-buttons.destroy>
        </div>
    </div>
</x-app-layout>
