<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidy extends Model
{
    protected $guarded = [];

    public function farmers()
    {
        return $this->belongsToMany(Farmer::class, 'subsidy_farmers', 'subsidy_id', 'farmer_id')
            ->withPivot('qty', 'price', 'status');
    }
}
