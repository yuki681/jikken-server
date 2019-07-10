<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Menu extends Model
{
    protected $table = 'menus';

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
