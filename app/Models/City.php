<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'state_id'];

    public function states()
    {
        return $this->belongsTo('App\Models\state', 'state_id');
    }
}
