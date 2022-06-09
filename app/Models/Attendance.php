<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Attendance extends Model
{
    use HasFactory;

    protected $guarded  = [
        'id',
    ];

    public static $rules = array(

    );

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function rests(){
        return $this->hasMany("App\Models\Rest");
    }
}
