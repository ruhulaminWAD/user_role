<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function predirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handlePredirectToProvider($provider)
    {
        $user = Socialite::driver($provider)->user();
        // dd($user);
        $exisitingUser = User::whereEmail($user->getEmail())->first();
        // dd($exisitingUser);
        if ($exisitingUser) {
            Auth::login($exisitingUser);
        }else {
            $newUser = User::updateOrCreate([
                'role_id' => Role::where('role_slug', 'user')->first()->id,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make('123456789'),
                'is_active' => true,
            ]);
            Auth::login($newUser);
        }
        return redirect($this->redirectPath());
    }
}
