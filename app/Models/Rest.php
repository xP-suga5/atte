<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rest extends Model
{
    use HasFactory;

    protected $guarded  = [
        'id',
    ];

    public static $rules = array();

    public function getTotalRestTime()
    {
        return DB::table('rests')
            ->select(DB::raw(
                "attendance_id, 
                sec_to_time(sum(time_to_sec(SUBTIME(end_rest, start_rest)))) as total_rest_time"
            ))
            ->groupBy('attendance_id')
            ->get();
    }


    public function attendance()
    {
        return $this->belongsTo('App\Models\Attendance');
    }
}
