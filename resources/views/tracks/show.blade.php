<dt>Catégorie</dt>
<dd>
    <a href="{{ route('app.categories.show', ['category' => $track->category->id ?? 0]) }}" class="link">
        {{ $track->category->name ?? 'Aucune catégorie' }}
    </a>
</dd>
