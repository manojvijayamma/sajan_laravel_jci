<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Zone;



use Excel;
use File;

class ZoneController extends Controller
{
    public function index(Request $request)
    { 
        $pageLimit=25; 
        
        
        $this->data['content']=Zone::orderBy('priority','ASC')->orderBy('title','ASC')->paginate($pageLimit);
        
        
               
        
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
        $user = Zone::find($id);
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
        
        Zone::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Zone::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Zone::find($id);            
        }  
        else{
            $this->data['content'] = new Zone();
        }        
        
        $this->data['mainZone'] = Zone::where('parent_id',0)->where('status',1)->get();
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){
        
        


        $this->validate($request, [
            'title' => 'required',                   
                          
                
                      
        ]);

        
        $input = $request->all();
       
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/Zone');
            $image->move($destinationPath, $name);
            $input['image'] =$name;
        }    

        if($id>0){
            $menu = Zone::find($id);        
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
             $menu = Zone::create($input);
        }  

    }


    public function priority(Request $request){
        $input = $request->all();
        $menu = Zone::find($input['id']);        
        $menu->update(array('priority'=>$input['priority']));

        return response()->json([
            'success'=>1,
            'text'=>'Successfully updated the priority'
         ], 200);
    }
 

}
