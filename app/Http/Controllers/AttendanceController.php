<?php

namespace App\Http\Controllers;

use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getAttendance()
    {
        $today = now()->format('Y-m-d');
        $keyword = $today;

        $this->rests = new Rest();
        $rests = $this->rests->getTotalRestTime();

        $attendances = Attendance::selectRaw('*, sec_to_time(time_to_sec(SUBTIME(end_time, start_time))) as total_work_time')
        //->whereRaw('')
        ->paginate(5);
    
        //$attendances = Attendance::selectRaw('*,sec_to_time( time_to_sec(SUBTIME(end_time, start_time))) as total_work_time
        //')
        //->leftJoin('rests', 'attendances.id', '=', 'rests.attendance_id')
        //->paginate(3);
        //dd($attendances); 


        
        return view('attendance', ['attendances' => $attendances, 'rests' => $rests, 'today' => $today]);
    }

    public function create(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }
}
