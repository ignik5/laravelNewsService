<?php

namespace App\Adaptors;

use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class Adaptor
{
    public function getUserBySocId(UserOAuth $user, string $socName){

$userInSystem=User::query()
->where('id_in_soc',$user->id)
->where('type_auth',$socName)
->first();
if (is_null($userInSystem)){
    $userInSystem = new User();
    $userInSystem->fill([
    'name' => !empty($user->getname()) ? $user->getname(): '',
    'email' => $user->accessTokenResponseBody['email'],
    'password'=>'',
    'id_in_soc'=> !empty($user->getId()) ? $user->getId(): '',
    'type_auth'=>$socName,
    'avatar'=> !empty($user->getavatar()) ? $user->getavatar(): '',
    ]);
    $userInSystem->save();
}
return $userInSystem;

    }


}