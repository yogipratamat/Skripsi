<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupFarm extends Model
{
    protected $guarded = [];

    public function getPic()
    {

        $farmers = Farmer::where('group_farm_id', $this->id)->get();


        foreach ($farmers as $farmer) {
            if ($farmer->user->getRoleNames()[0] == 'admin') {
                return $farmer;
            }
        }
    }

    public function farmers()
    {
        return $this->hasMany(Farmer::class, 'group_farm_id', 'id');
    }
}
