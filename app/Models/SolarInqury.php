<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarInqury extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'monthlyBill', 'electricityCost' ,'generation' ,'capacity', 'space', 'greenEnergy', 'annualSavings', 'price', 'is_ordered', 'place_date', 'is_visited', 'visited_date', 'is_quotation', 'quotation_date', 'design_plan', 'milestone_plan', 'info', 'design_img', 'quotation', 'order_date', 'solar_name', 'maintenancestartdate', 'mainclosedate', 'proposal_date', 'finalamount', 'rejectreason', 'city_id', 'state_id'];

    public function userdata()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function statename()
    {
        return $this->belongsTo('App\Models\state', 'generation', 'generation');
    }

    
    public function statedata()
    {
        return $this->belongsTo('App\Models\state', 'state_id', 'id');
    }


    public function citydata()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }

    protected $casts = [
        'maintenancestartdate' => 'datetime',
        'mainclosedate' => 'datetime',
        'proposal_date' => 'datetime',
    ];

    // public function getPlaceDateAttribute($value){
    //      if (is_null($value) || $value === '' || $value === '0000-00-00') {
    //         return null;
    //     }
    //     return date("d-M-Y", strtotime($value));
    // }
    // public function getVisitedDateAttribute($value){
    //      if (is_null($value) || $value === '' || $value === '0000-00-00') {
    //         return null;
    //     }
    //     return date("d-M-Y", strtotime($value));
    // }
    // public function getQuotationDateAttribute($value){
    //      if (is_null($value) || $value === '' || $value === '0000-00-00') {
    //         return null;
    //     }
    //     return date("d-M-Y", strtotime($value));
    // }
}
