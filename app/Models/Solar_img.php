<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solar_img extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'solar_id'];
}
