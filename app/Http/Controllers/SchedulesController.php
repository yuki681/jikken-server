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
        
        if($schedule->is_on_sale){
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

    public function cancel_soldout($id){
        $schedule = Schedule::findOrFail($id);

        if($schedule->is_sold_out){
            $schedule->sold_time = null;
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
  public function index()
  {
    $date = date("Y-n-j");
    if(isset($_GET["date"])){
      $date = $_GET["date"];
    }
    $menus = \App\Schedule::where('date', '=', $date)->leftjoin('menus', 'schedules.menu_id', '=', 'menus.id')->get();
    $date_before = date("Y-n-j", strtotime($date.'-1day'));
    $date_after = date("Y-n-j", strtotime($date.'+1day'));
    foreach ($menus as $menu) {
      switch($menu->type){
        case "A":
          $a_menu = $menu;
          break;
        case "B":
          $b_menu = $menu;
        break;
      }
    }

    $menus = $menus->where("id", "!=", $a_menu->id)->where("id", "!=", $b_menu->id);
    return view('schedules.index', compact('menus', 'a_menu', 'b_menu', 'date', 'date_before', 'date_after'));
  }
}
