@php
    $raceTitles = [
        'samoyede' => 'Samoyèdes',
        'berger-americain' => 'Berger Américains',
        'staffordshire-bull-terrier' => 'Staffordshire Bull Terriers',
    ];

    $displayTitle = $raceTitles[$slug] ?? ucwords(str_replace('-', ' ', $slug));
@endphp
<x-layout>
    <div class="md:py-10 py-4 xl:px-40 md:px-5 max-md:px-2">
        <h2 class="sub-title">{{$displayTitle}}</h2>
        <h1 class="title">Nos chiots</h1>
        <h3 class="title-description">Découvrez l'ensemble de nos chiots futures naissances programmées et historique de nos portées passées.</h3>
    </div>
    <section class="md:px-5 max-md:px-2 xl:px-40">
        <livewire:filter-bar :options="[
                ['id' => 'en cours', 'label' => 'Nos chiots disponibles'],
                ['id' => 'futur', 'label' => 'Nos futurs portées'],
                ['id' => 'passée', 'label' => 'Nos portées passées'],
            ]" />
        <livewire:litter-table :slug="$slug" />
    </section>
    <x-footer-dossier />
</x-layout> 