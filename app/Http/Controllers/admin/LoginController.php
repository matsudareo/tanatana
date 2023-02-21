<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    // use AuthenticatesUsers {                                
    //     logout as performLogout;                    
    // }    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/fail_register.php';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');  //変更
    }

    protected function guard()                            
    {                                      
        return Auth::guard('admin');                   
    }                                                  
    public function logout(Request $request)                
    {                                    
        Auth::guard('admin')->logout();  
        $request->session()->flush();
        $request->session()->regenerate();                   
        return redirect('/admin/login');                     
    }   
    
}
