<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['price', 'created_by', 'served_by', 'served_at'];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected function casts(): array
    {
        return [
            'served_at' => 'datetime',
        ];
    }

    public function isServed(): bool {
        return $this->served_at !== null || $this->served_by !== null;
    }
}
