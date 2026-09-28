<x-layout>
    <div>
        <h2>Races</h2>
        <h1>Nos reproducteurs</h1>
        <h3>Découvrez l'ensemble de nos reproducteurs actifs et nos chiens retraités  </h3>
    </div>
    <section>
        <livewire:filter-bar :options="[
        ['id' => 'male', 'label' => 'Nos mâles'],
        ['id' => 'female', 'label' => 'Nos femelles'],
        ['id' => 'future', 'label' => 'Nos futurs reproducteurs'],
        ['id' => 'retired', 'label' => 'Nos retraités'],
    ]" />
        <livewire:reproducteur-table :slug="$slug" />
    </section>
    <x-footer-dossier />
</x-layout>