<x-layout-back>
    <div>
        <div class="md:flex md:justify-between md:items-center md:mb-4">
            <div>
                <h1 class="title">Chiots</h1>
                <h2 class="title-description">Gérez les portées et les chiots associés.</h2>
            </div>
            <a href="/back-litter/create" class="btn-purple-normal back-button">+ Ajouter une portée</a>
        </div>
    </div>

    <div class="md:mb-4">
        <livewire:filter-bar :options="[
            ['id' => 'en cours', 'label' => 'En cours'],
            ['id' => 'passée', 'label' => 'Passés'],
            ['id' => 'futur', 'label' => 'Futur']
        ]" />
    </div>

    <livewire:puppy-table />
</x-layout-back>