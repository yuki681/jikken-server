<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SchedulesController extends Controller
{
    public function show($id){
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', ['schedule' => $schedule]);
    }

    public function soldout($id){
        $schedule = Schedule::findOrFail($id);
        
        if($schedule->is_on_sale){
            $schedule->sold_time = now();
            if($schedule->save()){
                return redirect("/schedule/{$id}")->with('success', '売り切れ情報を更新しました。');
            }
            else{
                return redirect("/schedule/{$id}")->with('failed', '売り切れ情報の更新に失敗しました。');
            }
        }
        else{
            return redirect("/schedule/{$id}")->with('failed', 'すでに販売中の状態です。');
        }
    }

    public function cancel_soldout($id){
        $schedule = Schedule::findOrFail($id);

        if($schedule->is_sold_out){
            $schedule->sold_time = null;
            if($schedule->save()){
                return redirect("/schedule/{$id}")->with('success', '売り切れ情報を更新しました。');
            }
            else{
                return redirect("/schedule/{$id}")->with('failed', '売り切れ情報の更新に失敗しました。');
            }
        }
        else{
            return redirect("/schedule/{$id}")->with('failed', 'すでに売り切れの状態です。');
        }
    }

    public function index()
    {
        try {
          $date = Carbon::parse($_GET['date']);
        } catch (\Throwable $th) {
          $date = Carbon::now();
        }

        $menus = \App\Schedule::where('date', '=', $date->toDateString())->orderBy('type', 'asc')->get();
        $date_before = \App\Schedule::where('date', '<', $date->toDateString())->max('date');
        $date_after = \App\Schedule::where('date', '>', $date->toDateString())->min('date');
        
        return view('schedule.index', compact('menus', 'date', 'date_before', 'date_after'));
    }
}
