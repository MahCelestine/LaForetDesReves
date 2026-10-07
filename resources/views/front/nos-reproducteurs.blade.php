<x-layout>
    <div class="site-breadcrumb md:py-10 pt-4 pb-2 xl:px-40 md:px-5 max-md:px-2" aria-label="Fil d'Ariane">
        <a href="/nos-races">Nos races</a>
        <span class="site-breadcrumb-sep">/</span>
        <a href="{{ route('front.breeds.show', $breed->slug) }}">{{ $breed->name }}</a>
        <span class="site-breadcrumb-sep">/</span>
        <span class="site-breadcrumb-current">Nos reproducteurs</span>
    </div>
    <div class="md:py-10 py-4 xl:px-40 md:px-5 max-md:px-2">
        <h2 class="sub-title">Races</h2>
        <h1 class="title">Nos reproducteurs</h1>
        <h3 class="title-description">Découvrez l'ensemble de nos reproducteurs actifs et nos chiens retraités  </h3>
    </div>
    <section class="md:px-5 max-md:px-2 xl:px-40">
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