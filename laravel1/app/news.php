<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable=['title', 'text','image' ,'isprivate','category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
     public static function attributenames(){
         return [
        'title'=>'Заголовок новости',
        'text'=>'Текст новости',
        "category_id"=>"категория новости",
        'image'=>"изображения",
        'isprivate'=>'sometimes|1:0'
         ];
     }


    public static function rules(){
    $tablenamecategory = (new category())->getTable();
        return [
        'title'=>'required|min:5|max:100',
        'text'=>'required|min:25',
        "category_id"=>"required|exists:{$tablenamecategory},id",
        'image'=>'mimes:jpg,png|max:1000'
        ];
    }
}
