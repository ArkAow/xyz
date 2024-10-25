<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show all categories.
     */
    public function index()
    {
        $categories = Category::withCount('tracks')->get();
        return view('app.categories.index', compact('categories'));
    }

    /**
     * Show details on a categorie.
     */
    public function show($categoryId)
    {
        $category = Category::with('tracks')->findOrFail($categoryId);
        $tracks = $category->tracks()->with('user', 'week')->paginate(10);
        return view('app.categories.show', [
            'category' => $category,
            'tracks' => $tracks,
        ]);
    }
}
