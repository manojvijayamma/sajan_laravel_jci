<?php

namespace App\Http\Controllers\Fe;

use Illuminate\Http\Request;

use App\User;

use DB;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //$user = auth()->guard('web')->user();
       // dd($user); 
      
       $this->data['user']=User::find($this->data['loggedUser']->id);
        return view('fe.user.dashboard', $this->data); 
    }

    public function profile(Request $request)
    { 
          
            $input = $request->all();            
         

            $userData=User::find($this->data['loggedUser']->id);

            if(!$userData){
                return response()->json([
                    'response' => 'failure',
                    'message' => "Invalid access."
                ], 401);
            }

            if(isset($input['firstname'])){
                $userData->firstname=$input['firstname'];    
            }
            if(isset($input['email'])){
                $userData->email=$input['email'];    
            }
            if(isset($input['mobile'])){
                $userData->mobile=$input['mobile'];    
            }
            if(isset($input['password'])){
                $userData->password=bcrypt($input['password']);    
            }

            if(isset($input['gender'])){
                $userData->gender=$input['gender'];     
            }
            
            $userData->save();
           
            return redirect('dashboard');
      
    }

    public function registerForm() {
        //echo Hash::make("9847483390");
        return view('fe.user.register', $this->data);
    }

    public function loginForm() {
        //echo Hash::make("9847483390");
        return view('fe.user.login', $this->data);
    }



    
}
