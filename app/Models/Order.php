<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->withPivot('qty', 'price', 'total_price');
    }
}