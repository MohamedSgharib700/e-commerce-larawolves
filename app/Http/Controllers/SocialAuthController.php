<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Provider;
use App\User;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $selectProvider = Provider::where('provider_id', $user->getId() )->first();
        // check if user not exist
        if (! $selectProvider) {
        // check if user's real email not exist
        
        	$userGetReal= User::where('email', $user->getEmail())->first();

        	if (! $userGetReal) {
        	// create new user is Users Table
        		$userGetReal = new User();
        		$userGetReal->name 		= 	$user->getName();
        		$userGetReal->email 	= 	$user->getEmail();
        		$userGetReal->save();
        	}

        	// create new user is Users Table

        		$newProvider = new Provider();
        		$newProvider->provider_id 		= 	$user->getId();
        		$newProvider->provider 			= 	$provider;
        		$newProvider->user_id 		= 	$userGetReal->id;
        		$newProvider->save();


        } else {

        	// Login
        	$userGetReal = User::find($selectProvider->user_id);
        }	
        	
        	auth()->login($userGetReal);
        	return redirect('/home');

    }
}

