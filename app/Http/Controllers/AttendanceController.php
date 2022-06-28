<?php

namespace App\Http\Controllers;

use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $user = Auth::user();

        $conf_date = Attendance::useid($user->id)->date($today)->get();

        if ($conf_date->count() > 0) {
            $conf_rest = Rest::attendanceid($conf_date[0]->id)->get();
        } else {
            $conf_rest = [];
        }

        $conf_contents = [
            'date_count' => $conf_date->count(),
            'date' => (isset($conf_date[0]->date)) ? $conf_date[0]->date : null,
            'start_time' => (isset($conf_date[0]->start_time)) ? $conf_date[0]->start_time : null,
            'end_time' => (isset($conf_date[0]->end_time)) ? $conf_date[0]->end_time : null,
            'start_rest' => (isset($conf_rest[0]->start_rest)) ? $conf_rest[0]->start_rest : null,
            'end_rest' => (isset($conf_rest[0]->end_rest)) ? $conf_rest[0]->end_rest : null,
        ];

        return view('index', compact('conf_contents'));
    }

    public function getAttendance(Request $request)
    {
        $today = now()->format('Y-m-d');
        $date = $date = $today;

        if ($request == "") {
            $date;
        } elseif ($request->pre_date != null) {
            $date = date("Y-m-d", strtotime("$request->pre_date"));
        } elseif ($request->post_date != null) {
            $date = date("Y-m-d", strtotime("$request->post_date"));
        }
        $keyword = $date;

        $this->rests = new Rest();
        $rests = $this->rests->getTotalRestTime();

        $attendances = Attendance::row()
            ->from('attendances')
            ->leftJoinSub($rests, 'rests', function ($join) {
                $join->on('attendances.id', '=', 'rests.attendance_id');
            })
            ->whereDate('date', '=', $keyword)
            ->orderByRaw('user_id')
            ->paginate(5)->withQueryString();

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
