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

    public function soldout($id){
        $schedule = Schedule::findOrFail($id);
        
        if(is_null($schedule->sold_time)){
            $schedule->sold_time = now();
            if($schedule->save()){
                return redirect("/schedule/{$id}")->with('status', 'success');
            }
            else{
                return redirect("/schedule/{$id}")->with('status', 'failed');
            }
        }
        else{
            return redirect("/schedule/{$id}")->with('status', 'failed');
        }
    }
}
