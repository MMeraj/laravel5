<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bear;
use App\Fish;
use App\Picnic;
use App\Http\Requests;;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Session;
use DB;

class TableController extends Controller
{
    public function index(){

        $bear = Bear::where('name', '=', 'Cerms' )->first();
        $bear = $bear->picnic;
        
        echo "<pre>";
        print_r($bear);
        die;
        
        foreach ($bear->picnic as $picnic) {
        echo $picnic->name . ' ' . $picnic->taste_level;
        }
        
        
        
        
       //One to many
//        foreach ($bear->fish as $fish){
//            
//        echo $fish->weight . ' ' . $fish->bear_id;
//        
//         
//        }
        //
 // one to one
//        $fish = $bear->fish;
//        echo "<pre>";
//        echo $fish->weight;
//        echo "<br>".$fish->bear_id;
        
   
        die;
    }
}
