<x-layout>
    <section class="relative w-full min-h-[60vh] flex flex-col justify-end overflow-hidden">
        <div>
            <img src="{{ asset('storage/' . $content->image_path) }}" alt="Illustration de l'article : {{ $content->title }}"
                class="absolute inset-0 w-full h-full object-cover object-[center_15%]" />
        </div>
        <div class="absolute inset-0 bg-dark-purple/65 backdrop-blur-[2.5px]"></div>
        <div class="relative justify-end mb-8 max-md:px-4 md:px-5 xl:ml-40">
            <a href="/le-coin-conseil" class="link-grey" aria-label="Retour à tous nos articles"><span aria-hidden="true">←</span> Tous nos articles</a>
            <h1 class="race-title-des">{{ $content->title }}</h1>
        </div>
    </section>
    <section class="xl:mx-40 max-md:my-2 md:my-4">
        {!! $content->content !!}
    </section>
    <x-footer-dossier />
</x-layout>