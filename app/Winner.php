<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    
    protected $fillable = ['employee_id','prize_id'];

    public function employee()
    {
    return $this->belongsTo('App\Employee','employee_id');      
    }

    public function prize()
    {
    return $this->belongsTo('App\Prize','prize_id');      
    }
}
