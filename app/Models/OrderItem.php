<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class OrderItem extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'unit_price', 'quantity', 'order_id'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function mostOrderedItem(){
        return $this::select('name', DB::raw('SUM(quantity) as total_quantity'))
                ->groupBy('name')
                ->orderBy('total_quantity', 'desc')
                ->first();
    }
}
