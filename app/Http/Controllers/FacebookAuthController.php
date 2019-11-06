<?php

namespace App\Http\Controllers;
use App\Customer;
use Auth;
use App\User;
use Socialite;

class FacebookAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $customer = Socialite::driver('facebook')->user();

   //     dd($user->avatar);
        $authCustomer = $this->findOrCreateCustomer($customer);


        if($authCustomer->active == 0){
            return view('block');
        }
        else{
            Auth::guard('customer')->login($authCustomer);
            return redirect()->route('homepage');
        }
    }

    private function findOrCreateCustomer($facebookUser){
        $authUser = Customer::where('provider_id', $facebookUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return Customer::create([
            'name' => $facebookUser->name,
            'username' => $facebookUser->email,
            'password' => $facebookUser->token,
            //'password'=>bcrypt(11111111),
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => $facebookUser->id,
            'avatar'=>$facebookUser->avatar,
        ]);
    }
}
