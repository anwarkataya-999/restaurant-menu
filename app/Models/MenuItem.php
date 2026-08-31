<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'image',
        'is_available',
    ];
    //kl menu item btenteme la one category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
