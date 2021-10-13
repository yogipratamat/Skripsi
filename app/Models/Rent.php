<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_rent';

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id', 'id_farmer');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id_tool');
    }
}
