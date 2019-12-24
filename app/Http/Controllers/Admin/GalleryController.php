<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\Category;
use Excel;
use File;
use Image;

class GalleryController extends AdminBaseController
{

    public function __construct()
    {  
        parent::__construct();      
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    { 
        $pageLimit=15; 
        
        $query = Gallery::query();  
        if ($request->input('identifier')) {
            $query = $query->where('identifier','=', $request->input('identifier'));
        }
        if ($request->input('title')) {
            $query = $query->where('title','like', "%{$request->input('title')}%");
        }
        if ($request->input('position_id')) {
            $query = $query->where('position_id','=', "{$request->input('position_id')}");
        }
        $this->data['content']= $query->orderBy('title','ASC')->paginate($pageLimit);

        
        
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
        $user = Gallery::find($id);
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
        
        Gallery::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Gallery::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Gallery::find($id);            
        }  
        else{
            $this->data['content'] = new Gallery();
        }    
            
        $this->data['category'] = Category::where('status',1)->where('identifier','gallery')->get();
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){
        
        


        $this->validate($request, [
            'title' => 'required',                   
                          
                
                      
        ]);

        
        $input = $request->all();
       
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "gallery_".time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product');

            $img = Image::make($image->getRealPath());

            $img->resize(100, 100, function ($constraint) {    
                $constraint->aspectRatio();    
            })->save($destinationPath.'/thumb_'.$name);  
            
            $image->move($destinationPath, $name);
            $input['image'] =$name;
        }  
        
        if ($request->hasFile('large_image')) {
            $image = $request->file('large_image');
            $name = "gallery_".time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product');
            $image->move($destinationPath, $name);
            $input['large_image'] =$name;
        }  

        if($request->input('type')=='V'){
            $parts = parse_url($request->input('video'));                      
            if(isset($parts['query'])){
                parse_str($parts['query'], $query);
                $input['video']=$query['v'];
            }
        }

        if($id>0){
            $menu = Gallery::find($id);        
            $menu->update($input);
        }    
        else{
            $input['status'] =1;
             $menu = Gallery::create($input);
        }  

    }




}
