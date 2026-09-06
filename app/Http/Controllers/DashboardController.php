<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'menu_items' => MenuItem::count(),
            'available_items' => MenuItem::where('is_available', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}