<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
   // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
       // $this->middleware('guest')->except('logout');
        //$this->middleware('auth')->only('logout');
   // }
   public function login(Request $request)
   {
    $credentials = $request->only('login', 'password');

    // Check if login input is email or phone number
    $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

    if (Auth::attempt([$fieldType => $credentials['login'], 'password' => $credentials['password']])) {
        // Login successful
        return redirect()->intended('/welcome/page');
    }

    // Login failed, redirect back with error
    return back()->withErrors(['login' => 'Invalid email/phone number or password.'])->withInput();


       if (Auth::attempt($credentials)) {
        {
            $role=Auth()->user()->role;
            if($role=='patient'){
                return view('home');
            }
        else if($role=='admin')
        {
            return view('admindashboard.welcomepage');
        }
        else return view('superadmin.welcome');
            }
        }
       return redirect()->back()->withErrors([
           'login' => 'These credentials do not match our records.',
       ]);}
       
}
