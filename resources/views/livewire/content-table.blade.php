    <section>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Publié</th>
                    <th>Date</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>
                            @if ($content->is_video)
                                <i class="bi bi-camera-video-fill"></i>
                            @else
                                <i class="bi bi-file-text-fill"></i>
                            @endif
                        </td>
                        <td>{{ $content->title }}</td>
                        <td>{{ $content->category->name }}</td>
                        <td>
                            @if ($content->is_published)
                                <span>Publié</span>
                            @else
                                <span>Brouillon</span>
                            @endif
                        </td>
                        <td>{{ $content->publication_date->format('d/m/Y') }}</td>
                        <td><a href="/back-content/{{ $content->id }}/edit"><i class="bi bi-pencil-fill"></i></a></td>
                        <td>
                            <form action="{{ route('back.back-content-destroy', $content) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>