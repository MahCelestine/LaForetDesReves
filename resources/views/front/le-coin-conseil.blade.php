<x-layout>
    <div>
        <h2>Nos conseils</h2>
        <h1>Nos conseils en texte, et en vidéo</h1>
        <h3>Des conseils pratiques pour accueillir, éduquer et prendre soin de votre chiot. Disponibles en format court
            sur TikTok, avec le compte ‘l’école de suna’ et aussi en texte ici.</h3>
    </div>
    <section>
        <livewire:filter-bar :options="$categories->map(fn($category) => ['id' => $category->id, 'label' => $category->name])->toArray()" />
        <livewire:content-card />
    </section>
    <x-footer-dossier />
</x-layout>