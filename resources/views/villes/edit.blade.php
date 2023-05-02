<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la ville') }} {{ $ville->id }}
        </h1>
    </x-slot>
    <x-stock-alert :fleurs="$fleurs"></x-stock-alert>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('villes.update', $ville->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <div class="flex flex-col flex-wrap justify-center items-center md:flex-row sm:justify-normal">
                    <h2 class="p-5 text-gray-500 font-bold text-2xl text-center first-letter:capitalize">
                        {{ __('Nom') }}
                        <br />
                        <span class="text-gray-800 font-normal text-xl ">{{ ucfirst($ville->nom_ville) }}</span>
                    </h2>
                    <h2 class="p-5 text-gray-500 font-bold text-2xl text-center">
                        <span class="text-gray-800 font-normal text-xl flex items-center justify-center">
                            @if ($ville->est_livrable)
                                <x-buttons.deliverable></x-buttons.deliverable>
                            @else
                                <x-buttons.not-deliverable></x-buttons.not-deliverable>
                            @endif
                        </span>
                    </h2>
                    <div class="flex flex-col justify-center items-center m-4 md:flex-row">
                        {{-- Input est_livrable --}}
                        <select name="est-livrable" id="est-livrable" class="rounded border-gray-400 select2">
                            @if ($ville->est_livrable)
                                <option value=1>
                                    <x-buttons.deliverable></x-buttons.deliverable>
                                </option>
                                <option value=0>
                                    <x-buttons.not-deliverable></x-buttons.not-deliverable>
                                </option>
                            @else
                                <option value=0>
                                    <x-buttons.not-deliverable></x-buttons.not-deliverable>
                                </option>
                                <option value=1>
                                    <x-buttons.deliverable></x-buttons.deliverable>
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="mt-4 max-w-fit md:max-w-none flex flex-col justify-end md:flex-row mx-auto md:mx-0">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.back :href="route('villes.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
