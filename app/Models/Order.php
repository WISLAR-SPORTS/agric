<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_address',
        'district',
        'total_amount',
        'payment_method',
        'status',
        'notes',
        'order_date',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // ✅ MUST be inside class
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_date = now();
        });
    }
}