<div>
    <x-layout-back />
    <div>
        <h1>Chiots</h1>
        <div>
            <h2>Gérez les portées et les chiots associés.</h2>
            <a href="/back-litter/create">+ Ajouter une portée</a>
        </div>
    </div>
    <livewire:filter-bar :options="[
        ['id' => 'en cours', 'label' => 'En cours'],
        ['id' => 'passé', 'label' => 'Passés'],
        ['id' => 'futur', 'label' => 'Futur']
    ]" />

    <livewire:puppy-table />
</div>