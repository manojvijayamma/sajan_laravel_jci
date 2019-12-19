<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Auth;
use Validator;
use JWTAuth;
use App\Http\Requests\RegisterAuthRequest;
use App\User;

class ApiLoginController extends ApiController
{
    public function __construct()
    {
       
        //$user = auth()->guard('admin')->user();
       
        //$this->middleware('guest:admin',['except' => ['login','showLoginForm','logout']]);
    }  
    
    
    public function register(RegisterAuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
 
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


    //function to login admins
    public function login(Request $request) {     
       
        $credentials = $request->only('email', 'password');
       // print_r($credentials);
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);


        
        $rules = array (            
             'email' => 'required|email',
             'password' => 'required',            
        );

        //echo $request->ip();
        /*
        $data=$request->json()->all();    
          
        $validator = Validator::make($data, $rules);            
        if ($validator-> fails()){            
              return $this->respondValidationError('Fields Validation Failed.', $validator->errors());            
        }
        else{
                   // $credentials=array('email'=>'mnjvijayan@gmail.com','password'=>'mnjvijayan@gmail.com');
                    $credentials=array('email'=>$data['email'],'password'=>$data['password']);
                    $token = JWTAuth::attempt($credentials);
                    $response['user']=array("name"=>"m","token"=>$token,'Authorization'=>'');
                    return $this->respond([                
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'Login successful!',    
                            'user'=>array("name"=>"m","token"=>$token,'Authorization'=>'')                
                
                    ]);
        }
         */           
        
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
}