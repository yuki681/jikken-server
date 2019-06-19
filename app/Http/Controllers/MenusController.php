<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function show($id){
        $menu = Menu::findOrFail($id);
        return view('menu.show', ['menu' => $menu]);
    }
}
