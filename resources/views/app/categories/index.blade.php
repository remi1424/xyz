<x-app title="Catégories">
    <main class="container-wide space-y-8">
        <section>
            <h1>Toutes les catégories</h1>

            @if($categories->isNotEmpty())
                <div class="grid">
                    @foreach($categories as $category)
                    <a href="{{ route('app.categories.show', ['category' => $category->name]) }}" class="block">
                        <div class="description">
                            <h2>{{ $category->name }}</h2>
                            {{-- Nous ne pouvons pas afficher le nombre de pistes ici sans une base de données --}}
                        </div>
                    </a>
                    @endforeach
                </div>
            @else
                <p>Aucune catégorie n'a été trouvée.</p>
            @endif
        </section>
    </main>
</x-app>