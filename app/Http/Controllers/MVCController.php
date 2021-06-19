<?php

namespace App\Http\Controllers;

use App\Models\view_3d;

class MVCController extends Controller
{
    public function index(){

        $all_table_rows = view_3d::all();

        return view("MVC.index", ["data" => $all_table_rows]);
    }
}
