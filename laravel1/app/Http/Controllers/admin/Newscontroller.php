<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;
use App\news;
use App\category;

class Newscontroller extends Controller
{
    public function index(){
        $news = news::query()
        ->paginate(5);
return view('admin.index',['news'=>$news]);
    }
    public function create(News $news){
        return view('admin.createnews',[
        'news'=>$news,
        'categories'=>category::query()->select(['id','category'])->get(),
    
        ]);
    }

    public function edit(request $request, news $news){
    return view('admin.createnews', [
        'news'=>$news,
        'categories'=>category::query()->select(['id','category'])->get(),
    ]);

    }
    public function destroy(news $news){
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'новость успешно удалена');
        
        
    }
    public function update(request $request, news $news){
        
           
          
        
           
      
            $url = null;
            if (($request->file('image'))){
                $path = Storage::putFile("public/images", $request->file('image'));
                $url = Storage::url($path);
                $news->image = asset($url);
                
            }
           
           $this->validate($request, news::rules(),[] ,News::attributenames());

            $result = $news -> fill($request -> only('title', 'text','isprivate','category_id'),$news ->image)->save();
         


        if($result){
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена');
        }
        else{
            $request->flash();
            return redirect()->route('admin.news.createnews')->with('error', 'Ошибка добавления новости');
        

        }
    
    
    }

    
    public function store(Request $request){
        $news = new news();

     
         $url = null;
         if (($request->file('image'))){
             $path = Storage::putFile("public/images", $request->file('image'));
             $url = Storage::url($path);
             $news->image = asset($url);
             
         }
         
          $this->validate($request, News::rules(), [], News::attributeNames());
         
         $result = $news->fill($request -> only('title', 'text','isprivate','category_id'),$news ->image)->save();
         
         
        
        //DB::table('news')->insert($data);
 
 
        if($result){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана');
            }
            else{
                $request->flash();
                return redirect()->route('admin.news.createnews')->with('error', 'Ошибка добавления новости');
            
    
            }
        
     
      
         
 
 
         
     }
}
