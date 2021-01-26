<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\category;

use img;
use Storage;
use App\news;
use Illuminate\Support\Facades\DB;


class indexcontroller extends Controller
{
    
    public function admin(){
        return view('admin.admin');
    }
   
    public function json1(){
        
        return response()->json(News::all())
        ->header('Content-Disposition','attacheent; filename ="json.txt"')
        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
       
    }
    public function savepicture(){
        return response()->download('123.jpg');
    }

   

    
}




