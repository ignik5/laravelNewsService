<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class profilecontroller extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $errors=[];

        if($request->isMethod('post')){
            
      //  $this->validate($request, $this->validaterules(),[] ,$this->attributenames());
            if(Hash::check($request->post('password'), $user->password)){
                $user->fill([
                    'name'=>$request->post('name'),
                    'password'=>Hash::make($request->post('newpassword')),
                    'email'=>$request->post('email')

                ]);
                $user->save();
                $request->session()->flash('success','Данные пользователя изменены');
            }
else{
    $errors['password'][]="неверно введен текущий пароль";
    
}
return redirect()->route('updateprofile')->withErrors($errors);
        }




        return view("profile",[
            'user'=>$user
        ]);
    }
    public static function validaterules(){
       
            return [
            'name'=>'required|string|max:15',
            'email'=>'required|email|unique:users.email'. Auth::id(),
            "password"=>"required",
            'newpassword'=>'required|string|min:8'
            ];
        }
        public static function attributenames(){
       
            return [

            'newpassword'=>'новый пароль'
            ];
        }
}
