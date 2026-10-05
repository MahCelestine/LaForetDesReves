<x-layout-back>
<div>
    <div>
        <h1 class="title">Chiens</h1>
        <div class="md:flex md:justify-between md:items-center md:mb-4">
            <h2 class="title-description w-[50%]">Gérez les reproducteurs et les retraités toutes races confondus.</h2>
            <a href="/back-chien/create" class="btn-purple-normal back-button">Ajouter un chien</a>
        </div>
    </div>
    <div class="md:mb-4">
    <livewire:filter-bar :options="$breeds->map(fn($b) => ['id' => $b->id, 'label' => $b->name])->toArray()" />
    </div>
    <livewire:dog-table />
</div>
</x-layout-back>