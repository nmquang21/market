<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $customer = Socialite::driver('google')->user();

        $authCustomer = $this->findOrCreateUser($customer);


//        dd($user);

        Auth::guard('customer')->login($authCustomer);

        return redirect()->route('homepage');
    }

    private function findOrCreateUser($googleUser){
        $authUser = Customer::where('provider_id', $googleUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return Customer::create([
            'name' => $googleUser->name,
            'username'=>$googleUser->email,
            'password' => $googleUser->token,
            //'password'=>bcrypt(11111111),
            'email' => $googleUser->email,
            'provider_id' => $googleUser->id,
            'provider' => $googleUser->id,
            'avatar'=>$googleUser->avatar,
        ]);
    }
}
