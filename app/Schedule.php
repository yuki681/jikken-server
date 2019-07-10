<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $dates = ['date'];

    public function getIsOnSaleAttribute(){
        return is_null($this->sold_time);
    }

    public function getIsSoldOutAttribute(){
        return !is_null($this->sold_time);
    }
}
