<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solar extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sizeinft', 'sizeinmtr', 'kw', 'cost', 'description', 'updated_at', 'created_at'];

    public $table = 'solar';

    public function solarimg()
    {
        return $this->hasMany('App\Models\Solar_img', 'solar_id', 'id');
    }
}
