<x-layout-back>
    <div>
        <div class="md:flex md:justify-between md:items-center md:mb-4">
            <div>
                <h1 class="title">Contenus</h1>
                <h2 class="title-description">Gérez les articles et les posts pour les vidéos.</h2>
            </div>
            <a href="/back-content/create" class="btn-purple-normal back-button">+ Créer</a>
        </div>
    </div>

    <div class="md:mb-4">
        <livewire:filter-bar :options="[
            ['id' => '0', 'label' => 'Articles'],
            ['id' => '1', 'label' => 'Vidéos']
        ]" />
    </div>

    <livewire:content-table />
</x-layout-back>