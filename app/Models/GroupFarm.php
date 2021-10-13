<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupFarm extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_group_farm';

    public function getPic()
    {

        $farmers = Farmer::where('group_farm_id', $this->id_group_farm)->get();

        if ($farmers->count() > 0) {
            foreach ($farmers as $farmer) {
                if ($farmer->user->getRoleNames()[0] == 'admin') {
                    return $farmer;
                }
            }
        }

        return null;
    }

    public function farmers()
    {
        return $this->hasMany(Farmer::class, 'group_farm_id', 'id_group_farm');
    }
}
