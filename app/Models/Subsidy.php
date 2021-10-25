<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidy extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_subsidy';

    public function farmers()
    {
        // return $this->belongsToMany(Farmer::class, 'subsidy_farmers', 'subsidy_id', 'farmer_id')
        //     ->withPivot('qty', 'price', 'status');
        return $this->belongsToMany(Farmer::class, 'subsidy_farmers', 'id_subsidy', 'id_farmer')
            ->withPivot('qty', 'price', 'status');
    }
}
