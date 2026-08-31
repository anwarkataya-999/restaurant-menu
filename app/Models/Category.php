<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ // lahata y3rf shu lby2dar y3abiha (ho mrbutin bl 3mlto bl migration)
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];
    // one category:many menu items   
    public function menuItems() {
        return $this->hasMany(MenuItem::class);
    }
}
