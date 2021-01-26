<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;
use App\news;
use App\category;
use Illuminate\Support\Facades\Validator;
class categorycontroller extends Controller
{
    

    public function crate(Request $request){
       
        if($request->isMethod('post')){
        $category = new category();
       
            
        //  $this->validate($request, $this->validaterules(),[] ,$this->attributenames());

                  $category->fill([
                      'name'=>$request->post('name'),
                      'category'=>$request->post('category')
  
                  ]);
                  $this->validate($request, category::rules1(),[] ,category::attributenames1());
               $category->save();
            
                  $result= $request->session();

                  if($result){
                    return redirect()->route('admin.news.index')->with('success', 'Категория успешно создана');
                    }
                else{
                        
                        return redirect()->route('admin.category')->with('error', 'Ошибка добавления категории');
                    
            
                    }
     
        }   else{ return view('admin.createcategory');} 
     }
    }


