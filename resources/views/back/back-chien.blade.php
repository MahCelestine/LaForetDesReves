<div>
    <x-layout-back />
    <div>
        <h1>Chiens</h1>
        <div>
            <h2>Gérez les reproducteurs et les retraités toutes races confondus.</h2>
            <a href="/back-chien/create">Ajouter un chien</a>
        </div>
    </div>
    <livewire:filter-bar :options="$breeds->map(fn($b) => ['id' => $b->id, 'label' => $b->name])->toArray()" />
    <livewire:dog-table />
</div>