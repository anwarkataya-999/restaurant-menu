<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    /**
     * Display a listing of menu items.
     */
    public function index()
    {
        $menuItems = MenuItem::with('category')
            ->latest()
            ->get();

        return view('menu_items.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('menu_items.create', compact('categories'));
    }

    /**
     * Store a newly created menu item.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_available' => 'boolean',
        ]);

        $menuItem = MenuItem::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'is_available' => $request->boolean('is_available'),
        ]);

        if ($request->hasFile('image')) {
            $menuItem->image = $request->file('image')
                ->store('menu-items', 'public');

            $menuItem->save();
        }

        return redirect()
            ->route('menu-items.index')
            ->with('success', 'Menu item created successfully.');
    }

    /**
     * Show the form for editing a menu item.
     */
    public function edit(MenuItem $menuItem)
    {
        $categories = Category::orderBy('name')->get();

        return view('menu_items.edit', compact('menuItem', 'categories'));
    }

    /**
     * Update the specified menu item.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_available' => 'boolean',
        ]);

        $menuItem->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'is_available' => $request->boolean('is_available'),
        ]);

        if ($request->hasFile('image')) {

            // Delete old image
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }

            // Store new image
            $menuItem->image = $request->file('image')
                ->store('menu-items', 'public');

            $menuItem->save();
        }

        return redirect()
            ->route('menu-items.index')
            ->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified menu item.
     */
    public function destroy(MenuItem $menuItem)
    {
        // Delete image from storage
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        // Delete menu item
        $menuItem->delete();

        return redirect()
            ->route('menu-items.index')
            ->with('success', 'Menu item deleted successfully.');
    }
}