<?php

namespace App\Http\Controllers;

use App\category;
use App\news;
use Illuminate\Http\Request;


class categorycontroller extends Controller
{
    public function index(){
        $categories=category::query()->select(['id','category','name'])->get();
        return view('news.categories')->with('categories',$categories);
    }
    public function show($name){
        
      $category = Category::query()->where('name',$name)->firstOrFail();
      $news = Category::query()->find($category->id)->news()->get();



        return view('news.category')->with('news',$news);
    }


    
}
