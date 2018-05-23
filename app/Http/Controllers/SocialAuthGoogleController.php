<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use Exception;


class SocialAuthGoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        $user = Socialite::driver('google')->user();
        echo $user->name;

            $existUser = User::where('email',$user->email)->first();
            if($existUser) {
                echo $existUser->name;
                echo $existUser->id;
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user->firstname = $user->user['name']['givenName'];
                $user->lastname = $user->user['name']['familyName'];
                $create['nom'] = $user->lastname;
                $create['prenom'] = $user->firstname;
                $create['email'] = $user->email;
                $create['google_id'] = $user->id;
                $create['password'] = md5(rand(1,10000));
                $userModel = new User;
                $createdUser = $userModel->addNew($create);
                Auth::loginUsingId($createdUser->id);
            }
        return redirect()->to('/home');

    }
}
