<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_farmer';

    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id', 'id_user');
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function groupFarm()
    {
        // return $this->belongsTo(GroupFarm::class, 'group_farm_id', 'id_group_farm');
        return $this->belongsTo(GroupFarm::class, 'id_group_farm', 'id_group_farm');
    }

    public function subsidies()
    {
        // return $this->belongsToMany(Subsidy::class, 'subsidy_farmers', 'farmer_id', 'subsidy_id');
        return $this->belongsToMany(Subsidy::class, 'subsidy_farmers', 'id_farmer', 'id_subsidy');
    }
}
