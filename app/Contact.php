<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $dates = ['birthday'];

    public function setBirthdayAttribute($birthday){
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }
    public function getBirthdayAttribute($birthday){
        return Carbon::parse($birthday)->format('m/d/Y');
    }
}
