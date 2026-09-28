<div>
    @foreach ($contents as $content)
        @if ($content->is_video)
            <div>
                <div>
                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="photo de l'article {{ $content->title }}">
                    <span><i class="bi bi-tiktok"></i> TikTok</span>
                    <a href="{{ $content->video_url }}" target="_blank">
                        <span><i class="bi bi-play-fill"></i></span>
                    </a>
                </div>
                <h4>{{ $content->title }}</h4>
                <p>{{ $content->extract }}</p>
                <div>
                    <smal>{{ $content->publication_date->format('d/m/Y') }}</smal>
                    <a href="{{ $content->video_url }}" target="_blank">Voir la vidéo →</a>
                </div>
            </div>
        @else
            <div>
                <img src="{{ asset('storage/' . $content->image_path) }}" alt="photo de l'article {{ $content->title }}">
                <h4>{{ $content->title }}</h4>
                <p>{{ $content->extract }}</p>
                <div>
                    <smal>{{ $content->publication_date->format('d/m/Y') }}</smal>
                    <a href="{{ route('front.content.content-details', $content) }}">Lire l'article →</a>
                </div>
            </div>
        @endif
    @endforeach
</div>