<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
          
       $user = User::where('email', $request->email)
                    ->where('password', md5($request->password))
                    ->first();
       if($user != null)  {
            Auth::login($user);
            Toastr::success('login sucess', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect('/home');
        }
        else{
            Toastr::error('Login details are not valid', 'Title', ["positionClass" => "toast-top-right"]);  return redirect("login");
            return redirect("login");
        }
        Toastr::error('Login details are not valid', 'Title', ["positionClass" => "toast-top-right"]);  return redirect("login");
    
        return redirect("login");

       }
}
