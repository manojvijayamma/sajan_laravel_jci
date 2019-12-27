<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PresidentCorner;
use App\Models\Category;
use Excel;
use File;
use Image;

class PresidentCornerController extends AdminBaseController
{

    public function __construct()
    {  
        parent::__construct();      
        $this->middleware('auth:admin');
    }

    

    public function store(Request $request)
    {        
               
        $this->_save($request); 
        return response()->json([
            'success'=>1,
            'text'=>'Successfully saved'
         ], 200);          

    }
    
  

    public function edit(Request $request)
    {  
        $id=1;
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
        
        PresidentCorner::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = PresidentCorner::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = PresidentCorner::find($id);            
        }  
        else{
            $this->data['content'] = new PresidentCorner();
        }    
            
        
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){
        
        


        $this->validate($request, [
            'title' => 'required',                   
                          
                
                      
        ]);

        
        $input = $request->all();
       
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "PresidentCorner_".time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/president');

            $img = Image::make($image->getRealPath());

            $img->resize(100, 100, function ($constraint) {    
                $constraint->aspectRatio();    
            })->save($destinationPath.'/thumb_'.$name);  
            
            $image->move($destinationPath, $name);
            $input['image'] =$name;
        }  
        
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = "PresidentCorner_".time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/president');
            $image->move($destinationPath, $name);
            $input['logo'] =$name;
        }  

       

        if($id>0){
            $menu = PresidentCorner::find($id);        
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
             $menu = PresidentCorner::create($input);
        }  

    }




}
