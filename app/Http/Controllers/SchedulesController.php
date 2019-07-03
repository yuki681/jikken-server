<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function show($id){
        $schedule = Schedule::join('menus', 'schedules.menu_id', '=', 'menus.id')->findOrFail($id);
        return view('schedule.show', ['schedule' => $schedule]);
    }
}
