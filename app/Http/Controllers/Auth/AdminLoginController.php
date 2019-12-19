<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        //$user = auth()->guard('admin')->user();
       
        $this->middleware('guest:admin',['except' => ['login','showLoginForm','logout']]);
    }
    //function to show admin login form
    public function showLoginForm() {
        //echo Hash::make("9847483390");
        return view('admin.login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to admin dashboard
            //$user = auth()->guard('admin')->user();
            //dd($user);

            return redirect()->intended(route('admin.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}