<x-layout>
    <div class="md:py-10 py-4 xl:px-40 md:px-5 max-md:px-2">
        <h2 class="sub-title">Nos conseils</h2>
        <h1 class="title">Nos conseils en texte, et en vidéo</h1>
        <h3 class="title-description">Des conseils pratiques pour accueillir, éduquer et prendre soin de votre chiot. Disponibles en format court
            sur TikTok, avec le compte ‘l’école de suna’ et aussi en texte ici.</h3>
    </div>
    <section class="md:px-5 max-md:px-2 xl:px-40">
        <livewire:filter-bar :options="$categories->map(fn($category) => ['id' => $category->id, 'label' => $category->name])->toArray()" />
        <livewire:content-card />
    </section>
    <x-footer-dossier />
</x-layout>