<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Models\Menu;


use Excel;
use File;
use DB;
use Image;

use App\Models\Team;
use App\Models\Zone;
use App\Models\Designation;

class TeamController extends AdminBaseController


{
    public function __construct()
    {  
        parent::__construct();      
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    { 
        $pageLimit=50; 
        
        $query = Team::query();  
        if ($request->input('identifier')) {
            $query = $query->where('identifier','=', $request->input('identifier'));
        }
       
        $this->data['content']= $query->orderBy('priority','ASC')->orderBy('title','ASC')->paginate($pageLimit);
        
        $this->data['qryStr']="identifier=".$request->input('identifier');
        $this->data['pageTitle']=ucwords(str_replace("-"," ",$request->input('identifier')));
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
        $user = Team::find($id);
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
        
        Team::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller') , 'identifier'=>$request->input('identifier')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Team::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax'), 'identifier'=>$request->input('identifier')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Team::find($id);            
        }  
        else{
            $this->data['content'] = new Team();
        }             
       
        for($i=date('Y'); $i>1950;$i--){
            $this->data['years'][]=$i;
        }
        
        $this->data['designations']=Designation::where('status',1)->get();
        $this->data['zones']=Zone::where('status',1)->get();

        $this->data['positions']=array("1"=>"In First Row","2"=>"In Second Row","3"=>"In Third Row");
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){ 
        
        $input = $request->all();        

        $this->validate($request, [
            'title' => 'required', 
        ]);

        
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'main_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/team');

            $img = Image::make($image->getRealPath());

            $img->resize(288, 190, function ($constraint) {    
                $constraint->aspectRatio();    
            })->save($destinationPath.'/thumb_'.$name); 
            
            $image->move($destinationPath, $name);
            $input['image'] =$name;           

        }    

        if($id>0){
            $menu = Team::find($id);        
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
            $menu = Team::create($input);
        } 
        
        

    }



    public function priority(Request $request){
        $input = $request->all();
        $menu = Team::find($input['id']);        
        $menu->update(array('priority'=>$input['priority']));

        return response()->json([
            'success'=>1,
            'text'=>'Successfully updated the priority'
         ], 200);
    }



} 
