<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail de la fleur') }} {{ $fleur->nom_fleur }}
        </h1>
    </x-slot>
    <x-stock-alert :fleurs="$fleurs"></x-stock-alert>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <div class="flex flex-wrap justify-center sm:justify-normal">
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Nom') }}
                <br />
                <span class="text-gray-800 font-normal text-xl text-center">{{ ucfirst($fleur->nom_fleur) }}</span>
            </h2>
            <h2 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Quantité en stock') }}
                <br />
                <span class="text-gray-800 font-normal text-xl text-center">{{ $fleur->quantite_stock }}</span>
            </h2>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Date du dernier inventaire') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ date('d/m/Y H:i', strtotime($fleur->date_inventaire)) }}</span>
            </h3>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Couleur') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ ucfirst($fleur->couleur->nom_couleur) }}</span>
            </h3>
            <h3 class="p-5 text-gray-500 font-bold text-2xl text-center sm:text-left first-letter:capitalize">
                {{ __('Unite') }}
                <br />
                <span
                    class="text-gray-800 font-normal text-xl text-center">{{ ucfirst($fleur->unite->nom_unite) }}</span>
            </h3>
        </div>
        <div class="flex flex-wrap justify-center sm:justify-end">
            <x-buttons.edit :href="route('fleurs.edit', $fleur->id, $fleur->titre)"></x-buttons.edit>
            <x-buttons.back :href="route('fleurs.index')"></x-buttons.back>
            <x-buttons.destroy :action="route('fleurs.destroy', $fleur->id)"></x-buttons.destroy>
        </div>
    </div>
</x-app-layout>
