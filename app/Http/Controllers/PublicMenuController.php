<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PublicMenuController extends Controller
{
    /**
     * Display the public restaurant menu.
     */
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->with([
                'menuItems' => function ($query) {
                    $query->where('is_available', true)
                        ->latest();
                }
            ])
            ->orderBy('name')
            ->get();

        return view('menu.index', compact('categories'));
    }
}