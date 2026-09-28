<x-layout>
    <section>
        <a href="/le-coin-conseil">← Toutes nos articles</a>
        <h1>{{ $content->title }}</h1>
    </section>
    <section>
        {!! $content->content !!}
    </section>
    <x-footer-dossier />
</x-layout>