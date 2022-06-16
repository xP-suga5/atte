<?php

namespace App\Http\Controllers;

use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $user = Auth::user();

        $conf_date = Attendance::where('user_id', $user->id)
            ->whereDate('date', '=', $today)->get();

        if ($conf_date->count() > 0) {
            $conf_rest = Rest::where('attendance_id', $conf_date[0]->id)
            ->orderBy('id', 'desc')
            ->get();
        } else {
            $conf_rest = [];
        }

        //dd($conf_rest);

        return view('index', [
            'conf_date' => $conf_date,
            'conf_rest' => $conf_rest
        ]);
    }

    public function getAttendance(Request $request)
    {
        $today = now()->format('Y-m-d');

        $date = $today;
        $keyword = $today;

        $this->rests = new Rest();
        $rests = $this->rests->getTotalRestTime();

        $attendances = Attendance::selectRaw('
            *,
            sec_to_time(time_to_sec(SUBTIME(end_time, start_time))) as work_time,
            sec_to_time((time_to_sec(SUBTIME(sec_to_time(time_to_sec(SUBTIME(end_time, start_time))), total_rest_time)))) as total_work_time
        ')
            ->from('attendances')
            ->leftJoinSub($rests, 'rests', function ($join) {
                $join->on('attendances.id', '=', 'rests.attendance_id');
            })
            ->whereDate('date', '=', $keyword)
            ->orderByRaw('user_id')
            ->paginate(5);

        return view('attendance', ['attendances' => $attendances, 'date' => $date]);
    }

    public function create()
    {
        $user = Auth::user();
        $today = now();

        Attendance::create([
            'user_id' => $user->id,
            'date' => $today->format('Y-m-d'),
            'start_time' => $today->format('H:i:s'),
        ]);
        return redirect('/');
    }

    public function update()
    {
        $user = Auth::user();
        $today = now();

        Attendance::where('user_id', $user->id)
            ->whereDate('date', '=', $today->format('Y-m-d'))
            ->update([
                'end_time' => $today->format('H:i:s'),
            ]);
        return redirect('/');
    }
}
