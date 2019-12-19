<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function showLoginForm() {
        //echo Hash::make("9847483390");
        return view('fe.login');
    }

    public function login(Request $request) {
        
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to admin dashboard
            $user = auth()->guard('web')->user();
            //dd($user); 
            //echo $request->ajax();exit;   
            
            
            if($request->ajax()){
                return response()->json([
                    'response' => 'success'  ,
                    'user'=>$user                 
                ]);
            }
            else{
                if(isset($request->redirect_url)){
                    
                    return redirect()->intended(($request->redirect_url));
                }
                else{
                    return redirect()->intended(route('dashboard'));
                }
                
            }
            
            
        }
       
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
