<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function groupFarm(){
        return $this->belongsTo(GroupFarm::class, 'group_farm_id', 'id');
    }

}
