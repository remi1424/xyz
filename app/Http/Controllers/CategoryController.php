<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryNames = [
            'Soul',
            'Ambient',
            'Pop',
            'Rap',
            'Funk',
            'Rock',
            'Reggae / Dub',
            'Techno',
            'Electro'
        ];

        // Récupérer les catégories existantes de la base de données
        $existingCategories = Category::all();

        // Créer les catégories manquantes
        foreach ($categoryNames as $name) {
            if (!$existingCategories->contains('name', $name)) {
                Category::create(['name' => $name]);
            }
        }

        // Récupérer toutes les catégories avec le nombre de pistes
        $categories = Category::withCount('tracks')->get();

        return view('app.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $tracks = $category->tracks()
            ->with(['user', 'week', 'likes'])
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->paginate(10);

        return view('app.categories.show', compact('category', 'tracks'));
    }
}