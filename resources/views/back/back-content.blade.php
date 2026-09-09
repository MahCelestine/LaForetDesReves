<div>
    <x-layout-back />
    <div>
        <h1>Contenue</h1>
        <div>
            <h2>Gérez les article et les post pour les vidéos</h2>
            <a href="/back-content/create">+ Créer</a>
        </div>
    </div>
    <livewire:filter-bar :options="[
        ['id' => '0', 'label' => 'Articles'],
        ['id' => '1', 'label' => 'Vidéos']
    ]" />
    <livewire:content-table />
</div>