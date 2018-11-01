<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function dashboard(){
        $test = "Aspirins=>2:Paracitamol=>5:Alprazolam=>54:";
        $test2 = explode(":",$test);
        $total = 0;
            
        for($x = 0; $x <count($test2)-1; $x++){
            $test3 = explode("=>",$test2[$x]);
            $total = $total+$test3[1];
        }
        //return $test;
        return view('Dashboard/index');
    }
    
}
