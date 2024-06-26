<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Non categorizzato'}}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        <span class="badge badge-primary text-dark">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('article.show', compact ('article')) }}" class="btn btn-primary btn-sm">Leggi l'articolo</a>
                    <a href="{{ route('article.edit', compact ('article')) }}" class="btn btn-warning btn-sm">Modifica l'articolo</a>
                    <form action="{{route('article.destroy', compact('article'))}}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler cancellare questo articolo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina l'articolo</button>
                    </form>
                </td>
            </tr>
        @endforeach
                
    </tbody>
</table>