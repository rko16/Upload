<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['solar_id', 'user_id', 'is_visit', 'quotation_status', 'visited_date', 'design_plan', 'milestone_plan', 'info', 'status', 'is_active', 'quoted_date', 'design_img', 'quotation'];

    public function solardata()
    {
        return $this->belongsTo('App\Models\Solar', 'solar_id');
    }

    public function userdata()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
