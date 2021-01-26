<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Adaptors\Adaptor;

class logincontroller extends Controller
{
    public function loginVK(){
  if (Auth::check()){
     return redirect()->route('home');
    }
    return Socialite::with('vkontakte')->redirect();
    
    
     }
    public function responseVK(Adaptor $UserAdaptor){
        if (Auth::check()){
            return redirect()->route('home');
      
    } 
    $user = Socialite::driver('vkontakte')->user();
    $userInSystem = $UserAdaptor->getUserBySocId($user,'vk');
    Auth::login($userInSystem);
    return redirect()->route('home');

    }
}
