@props(['fleurs'])
@foreach ($fleurs as $fleur)
    @if ($fleur->quantite_stock <= 100)
        <div class="max-w-7xl w-fit mt-4 p-4 mx-4 sm:mx-auto bg-white rounded shadow">
            <p class=" text-red-500 p-2 w-fit mx-auto">Le stock de la fleur {{ ucfirst($fleur->nom_fleur) }}
                est bientôt épuisé, il reste actuellement {{ $fleur->quantite_stock }} fleurs.
            </p>
            <div class="flex flex-col sm:flex-row mx-auto sm:justify-center w-max sm:w-auto">
                <x-buttons.edit :href="route('fleurs.edit', $fleur->id)"></x-buttons.edit>
                <x-buttons.show :href="route('fleurs.show', $fleur->id)"></x-buttons.show>
                <x-buttons.destroy :action="route('fleurs.destroy', $fleur->id)"></x-buttons.destroy>
            </div>
        </div>
    @endif
@endforeach
