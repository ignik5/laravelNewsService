<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = FALSE;
    protected $fillable=['category', 'name'];
    public function news(){
        return $this->hasMany(News::class,'category_id');
    }
    public static function rules1(){
        $tablenamecategory = (new category())->getTable();
            return [
            'category'=>'required|min:3|max:100',
            'name'=>'required|min:3|max:100'

            ];
        }
        public static function attributenames1(){
            return [
                'category'=>'название категории',
                'name'=>'категории',

            ];
        }
}
