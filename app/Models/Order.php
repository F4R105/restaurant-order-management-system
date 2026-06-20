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

    public function isServed(): bool
    {
        return $this->served_at !== null || $this->served_by !== null;
    }

    public function getTotal()
    {
        return $this->count();
    }

    public function getTotalSales()
    {
        return $this->sum('price');
    }

    public function getTotalServed()
    {
        return $this
            ->whereNot('served_by', null)
            ->orWhereNot('served_at', null)
            ->count();
    }

    public function getTotalPending()
    {
        return $this
            ->where('served_by', null)
            ->orWhere('served_at', null)
            ->count();
    }
}
