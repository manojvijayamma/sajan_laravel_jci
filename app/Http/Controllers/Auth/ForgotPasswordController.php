<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function index(Request $request)
    {
        
        $userData=User::where('email',$request->email)->first();
        if(!$userData){
                return response()->json([
                    'response' => 'failure',
                    'message' => "Invalid email."
                ], 200);
        }
        
        $token=str_random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token, //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $mailData=array('user'=>$userData,'token'=>$token);    
        
        $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";        
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $view = View('fe.emails.forgot', $mailData);        
        $contents = $view->render();        
        mail("manojvijayanaluva@gmail.com","Forgot password from mukuty.com",$contents, $headers);


        return response()->json([
            'response' => 'success',
            'message' => "Reset link is sent to your email."
        ], 200);
    }

    protected function form(Request $request , $id)
    {
        $this->data['status']="failure";
        if(isset($id)){
            $this->data['tokenData']=DB::table('password_resets')->where('token',$id)->first();
            $this->data['status']="Success";
        }
        else{
            $this->data['message']="Invalid user access";
        }

        return view('fe.user.forgot',$this->data);
    }  
    
    protected function update(Request $request)
    {
        $this->data['status']="failure";
        if(isset($this->input['token'])){
            $tokenData=DB::table('password_resets')->where('token',$this->input['token'])->first();
            $user=User::where('email',$tokenData['email'])->first();
            if(isset($user)){
                $user->password=bcrypt($this->input['password']);
                $user->save();
                DB::table('password_resets')->where('token',$id)->delete();

                $this->data['message']="Successfully Changed your password";
                $this->data['status']="Success";

            } 
            else{
                $this->data['message']="Invalid user access";
            }           
            
        }
        else{
            $this->data['message']="Invalid user access";
        }

        return view('fe.user.forgot',$this->data);

    }


}
