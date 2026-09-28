<x-layout>
    <div>
        <h2>Race</h2>
        <h1>Nos chiots</h1>
        <h3>Découvrez l'ensemble de nos chiots futures naissances programmées et historique de nos portées passées.</h3>
    </div>
    <section>
        <livewire:filter-bar :options="[
                ['id' => 'en cours', 'label' => 'Nos chiots disponibles'],
                ['id' => 'futur', 'label' => 'Nos futurs portées'],
                ['id' => 'passée', 'label' => 'Nos portées passées'],
            ]" />
        <livewire:litter-table :slug="$slug" />
    </section>
    <x-footer-dossier />
</x-layout>