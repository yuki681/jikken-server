<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function getMeansReputation(){
        $review = \App\Review::where('menu_id', '=', $this->menu_id);
        $means = $review->pluck('reputation')->avg();
        return $means;
    }
    protected $dates = ['date'];

    public function getIsOnSaleAttribute(){
        return is_null($this->sold_time);
    }

    public function getIsSoldOutAttribute(){
        return !is_null($this->sold_time);
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}
