<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_order';

    public function farmer()
    {
        // return $this->belongsTo(Farmer::class, 'farmer_id', 'id_farmer');
        return $this->belongsTo(Farmer::class, 'id_farmer', 'id_farmer');
    }

    public function products()
    {
        // return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
        //     ->withPivot('qty', 'price', 'total_price');
        return $this->belongsToMany(Product::class, 'order_products', 'id_order', 'id_product')
            ->withPivot('qty', 'price', 'total_price');
    }
}
