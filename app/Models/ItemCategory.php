<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ItemCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ItemCategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'is_active'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
