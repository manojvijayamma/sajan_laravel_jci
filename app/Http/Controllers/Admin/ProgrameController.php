<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Programe;

use App\Models\Menu;
use App\Models\Zone;

use Excel;
use File;
use DB;
use Image;

class ProgrameController extends AdminBaseController


{
    public function __construct()
    {  
        parent::__construct();      
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    { 
        $pageLimit=50; 
        
        $query = Programe::query();  
        if ($request->input('title')) {
            $query = $query->where('title','like', "%{$request->input('title')}%");
        }
       
        $this->data['content']= $query->orderBy('priority','ASC')->orderBy('title','ASC')->paginate($pageLimit);
        
        
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
        $user = Programe::find($id);
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
        
        Programe::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Programe::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Programe::find($id);            
        }  
        else{
            $this->data['content'] = new Programe();
        } 
             
       
       
        
        $this->data['zones'] = Zone::where('status',1)->get();   
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){ 
        
        $input = $request->all();        

        $this->validate($request, [
            'title' => 'required', 
        ]);

        
        $input['slug_url']=$this->formatSlug($input['title']);    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'main_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/Programe');

            $img = Image::make($image->getRealPath());

            $img->resize(288, 190, function ($constraint) {    
                $constraint->aspectRatio();    
            })->save($destinationPath.'/thumb_'.$name); 
            
            $image->move($destinationPath, $name);
            $input['image'] =$name;           

        }    

        if($id>0){
            $menu = Programe::find($id);        
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
            $menu = Programe::create($input);
        } 
        
        

    }


    public function priority(Request $request){
        $input = $request->all();
        $menu = Programe::find($input['id']);        
        $menu->update(array('priority'=>$input['priority']));

        return response()->json([
            'success'=>1,
            'text'=>'Successfully updated the priority'
         ], 200);
    }




} 
