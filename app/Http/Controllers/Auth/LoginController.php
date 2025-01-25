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
    // Validate the input
    $request->validate([
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    // Determine whether the input is an email or phone number
    $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

    // Attempt to authenticate the user
    if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password])) {
        // Authentication successful
        $user = Auth::user(); // Get the authenticated user

        // Redirect based on role
        switch ($user->role) {
            case 'patient':
                return view('home'); // Render the patient's home view
            case 'admin':
                return view('admindashboard.welcomepage'); // Render the admin dashboard view
            case 'superadmin':
                return view('superadmin.welcome'); // Render the superadmin dashboard view
            default:
                // Handle cases where the role is undefined
                Auth::logout();
                return redirect()->route('login')->withErrors(['login' => 'Unauthorized role.']);
        }
    } else {
        // If authentication fails, redirect back with an error
        return back()->withErrors(['login' => 'Invalid email/phone number or password.'])->withInput();
    }
}
}
