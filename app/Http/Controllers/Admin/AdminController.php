<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;


use App\Admin;
use App\Models\UserGroup;
use App\Models\Zone;

use DB;
use Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends AdminBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {  
        parent::__construct();      
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {   
        $this->data['loggedUser']=Auth::guard('admin')->user()->name;
        return view('admin/dashboard',$this->data);
    }

    public function welcome(){
        return view('admin.home.welcome',$this->data);
    }

    // show profile of logged in user
    public function profile(){
        $id=Auth::guard('admin')->id();
        $this->data['content'] = Admin::find($id);           
        return view('admin.home.profile', $this->data);
    }

    //show change password form
    public function password(){
        return view('admin.home.password');

    }

    
     public function profileUpdate(Request $request){
        $id=Auth::guard('admin')->id();
        $user=Admin::find($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->save();  
        
        return response()->json([
            'success'=>1,
            'text'=>'Successfully updated.'
        ], 200);
    }

    
    public function passwordUpdate(Request $request){
                
        if (!(Hash::check($request->get('current_password'), Auth::guard('admin')->user()->password))) {
            
            return response()->json([
                'error'=>1,
                'text'=>'Current password is not correct'
            ], 200);
        }
           //
        $newPassword=$request->get('new_password');
        $user = Auth::guard('admin')->user();//current logged in user

        $user->password =Hash::make($newPassword); 
        $user->save();
        
        return response()->json([
            'success'=>1,
            'text'=>'Successfully changed your password.'
        ], 200);
    
    }



    public function index(Request $request)
    { 
        $pageLimit=15; 
        
        
        $query = Admin::query(); 
        
       
        $this->data['content']= $query->orderBy('name','ASC')->paginate($pageLimit);

               
        
        if($request->input('ajax')){
            return view('admin.'.$request->input('controller').'.'.$request->input('ajax'),$this->data)->with('i', ($request->input('page', 1) - 1) * $pageLimit); 
        }

    } 

    public function create(Request $request)
    {   
        
        return $this->_form($request);

    }

    public function store(Request $request)
    {        
               
        $this->_save($request); 
        return response()->json([
            'success'=>1,
            'text'=>'Successfully saved'
         ], 200);          

    }
    
    public function show($id)
    {   
        $user = Admin::find($id);
        return view('admin.'.$request->input('controller').'.show',compact('user'));        

    }

    public function edit(Request $request, $id)
    {  
        
        return $this->_form($request, $id);       

    }

    public function update(Request $request, $id)
    {       
        $this->_save($request,$id);  
        return response()->json([
            'success'=>1,
            'text'=>'Successfully updated'
         ], 200);            
    }


    public function destroy(Request $request ,$id)
    {
        
        Admin::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Admin::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Admin::find($id);            
        }  
        else{
            $this->data['content'] = new Admin();
        }        
        
        $this->data['usergroups'] = UserGroup::where('status',1)->get();
        $this->data['zones'] = Zone::where('status',1)->get();
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){
        
        


        $this->validate($request, [
            'name' => 'required',                   
                          
                
                      
        ]);

        
        $input = $request->all();
        if(isset($input['password'])){
            $input['password']=bcrypt($input['password']);
        }
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/adminuser');
            $image->move($destinationPath, $name);
            $input['image'] =$name;
        }    

        if($id>0){
            $menu = Admin::find($id);      
            if(empty($input['password'])){
                $input['password']=$menu->password;
            }  
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
             $menu = Admin::create($input);
        }  

    }

   
}