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

    public static $rules = array();

    //-----scope--------
    public function scopeUseId($query, $user)
    {
        return $query->where('user_id', $user);
    }

    public function scopeDate($query, $date)
    {
        return $query->whereDate('date', '=', $date);
    }

    public function scopeRow($query)
    {
        return $query->selectRaw('
        *,
        sec_to_time(time_to_sec(SUBTIME(end_time, start_time))) as work_time,
        sec_to_time((time_to_sec(SUBTIME(sec_to_time(time_to_sec(SUBTIME(end_time, start_time))), total_rest_time)))) as total_work_time');
    }

    //-------------\\\\\\
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function rests()
    {
        return $this->hasMany("App\Models\Rest");
    }
}
