<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'unit_price'])]
class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    protected $fillable = ['name', 'unit_price', 'quantity', 'category_id'];
    
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function getTotalItems(){
        return $this->count();
    }

    public function getMostSoldItem(){

    }
}
