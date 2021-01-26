<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\news;
use Illuminate\Support\Facades\Auth;

class newscontroller extends Controller
{
    
    public function news(){
     //   $news= DB::select('SELECT * FROM news');
        //dd($news);
       // $news= news::all();
       if (Auth::check()){
        $news = News::query()
        
        ->paginate(3);
 
         return view('news.index')->with('news', $news);
       }
       else{
       $news = News::query()
       ->where('isprivate', false)
       ->paginate(3);

        return view('news.index')->with('news', $news);}
    }

    public function show($id){
     // $news= DB::select('SELECT * FROM news WHERE id=:id', ['id'=>$id]);
     $news =news::query('news')->find($id);
    
    if(!empty($news)){
        return view('news.one')->with('news', $news);
        }
        else {
            return redirect()->route('news.index');
        }
    }
}
