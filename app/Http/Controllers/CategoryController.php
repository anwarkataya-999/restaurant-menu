<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        // la yjble kl shi mn table l categories
        $categories = Category::all();
        // l yfth index.blade.php b alb folder l categories w (compact...) hy lahta yb3tlha l data lb2al l $categories
        return view('categories.index' , compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    // request hiyi lahata laravel yst2bl mn 5ilela l data l jeyi mn l form
    public function store(Request $request)
{
    //hy mtl t2kid eno bdna name ejbare w ykun string w max 255 harf  w eno description fi ykun fade w huwi string
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
    // store in database
    //hon 3m nzid record lal categories(y3ne bs n3abe l form bythfzo bl shakl l hatito bl table)
    Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'is_active' => $request->has('is_active'),
    ]);
    // hata yrj3 la 3nd /categories
    return redirect('/categories');
}
}
