<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id', 'state_id'];

    public function state()
    {
        return $this->belongsTo('App\Models\state', 'state_id');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
