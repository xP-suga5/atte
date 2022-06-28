<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;


class RestController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $today = now();

        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', '=', $today)->first();

        Rest::create([
            'attendance_id' => $attendance->id,
            'start_rest' => $today->format('H:i:s'),
        ]);
        return redirect('/');
    }

    public function update()
    {
        $user = Auth::user();
        $today = now();

        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', '=', $today)->first();

        Rest::where('attendance_id', $attendance->id)
            ->orderBy('id', 'desc')
            ->first()
            ->update([
                'end_rest' => $today->format('H:i:s'),
            ]);
        return redirect('/');
    }
}
