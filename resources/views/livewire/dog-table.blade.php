<section>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Race</th>
                <th>Sexe</th>
                <th>Statut</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dogs as $dog)
                <tr>
                    <td>{{ $dog->name_affix }}</td>
                    <td>{{ $dog->breed->name }}</td>
                    <td>
                        @if ($dog->sex == 'male')
                            <i class="bi bi-gender-male"></i>
                        @else
                            <i class="bi bi-gender-female"></i>
                        @endif
                    </td>
                    <td>
                        @if ($dog->retirement == '0')
                            <span>Actif</span>
                        @else
                            <span>Retraité</span>
                        @endif
                    </td>
                    <td>
                        <a href="/back-chien/{{ $dog->id }}/edit">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('back.back-chien-destroy', $dog) }}" method="POST">
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