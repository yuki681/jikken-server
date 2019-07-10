<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function schedule(){
      return $this->belongsTo('App\Schedule');
    }
}
