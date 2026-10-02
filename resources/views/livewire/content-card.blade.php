<div class="contents-list my-4">
    @foreach ($contents as $content)
        @if ($content->is_video)
            <div class="content-card">
                <div class="content-card-media">
                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="photo de l'article {{ $content->title }}" class="content-card-img">
                    <span class="content-card-tiktok"><i class="bi bi-tiktok"></i> TikTok</span>
                    <a href="{{ $content->video_url }}" target="_blank" class="content-card-play">
                        <i class="bi bi-play-fill" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="content-card-body">
                    <div>
                        <h4 class="content-card-title">{{ $content->title }}</h4>
                        <p class="content-card-extract">{{ $content->extract }}</p>
                    </div>
                    <div class="content-card-footer">
                        <small class="content-card-date">{{ $content->publication_date->format('d/m/Y') }}</small>
                        <a href="{{ $content->video_url }}" target="_blank" class="link-purple-card-list">Voir la vidéo →</a>
                    </div>
                </div>
            </div>
        @else
            <div class="content-card">
                <div class="content-card-media">
                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="photo de l'article {{ $content->title }}" class="content-card-img">
                </div>
                <div class="content-card-body">
                    <div>
                        <h4 class="content-card-title">{{ $content->title }}</h4>
                        <p class="content-card-extract">{{ $content->extract }}</p>
                    </div>
                    <div class="content-card-footer">
                        <small class="content-card-date">{{ $content->publication_date->format('d/m/Y') }}</small>
                        <a href="{{ route('front.content.content-details', $content) }}" class="link-purple-card-list">Lire l'article →</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>