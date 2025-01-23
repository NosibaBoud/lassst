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
       $input = $request->input('login');
       $password = $request->input('password');

       // Determine if input is email or phone number
       $fieldType = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

       $credentials = [$fieldType => $input, 'password' => $password];

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
