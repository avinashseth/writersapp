<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleProviderCallback() { 
        
        $user = Socialite::driver('google')->user();

        $savedUser = User::where('email', $user->email)->first(); 
        
        if($savedUser) { 
        
            Auth::login($savedUser); 
            return redirect('/home'); 
        
        } else { 
            
            $newUser = User::create([ 
                'name' => $user->name,
                'email' => $user->email,
                'password' => '123455',
                'email_verified_at' => \Carbon\Carbon::now()
            ]);

            Auth::login($newUser);
            return redirect('/home');

        }
    }

}
