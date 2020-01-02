<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Content;
use App\Models\ContentPosition;
use App\Models\ContentPositionRelations;
use App\Models\Menu;

use Excel;
use File;
use DB;
class ContentController extends AdminBaseController


{
    public function index(Request $request)
    { 
        
        
        $pageLimit=1000; 
        
       
        
        $query = Content::with('parent')->where('parent_id','0'); 
        if ($request->input('title')) {
            $query = $query->where('title','like', "%{$request->input('title')}%");
        }
        if ($request->input('position_id')) {
            $query = $query->where('position_id','=', "{$request->input('position_id')}");
        }
        $this->data['content']= $query->orderBy('title','DESC')->orderBy('title','ASC')->paginate($pageLimit);

        
        
        
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
        $user = Content::find($id);
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
        
        Content::find($id)->delete();         
        return redirect()->route($request->input('controller').'.index',['page'=>$request->input('page'),'ajax'=>$request->input('ajax'),'controller'=>$request->input('controller')])
            ->with('success','User status successfully');

        
    }

    public function status(Request $request ,$id)
    {
        $menu = Content::find($id);
        $menu->status=$menu->status=='1' ? '0' : '1';
        $menu->save();
        
        $page = $request->input('page');
        return redirect()->route($request->input('controller').'.index',['page'=>$page,'controller'=>$request->input('controller'),'ajax'=>$request->input('ajax')])
            ->with('success','User status successfully');

    }

    private function _form($request,$id=0){  
       
        if($id>0){
            $this->data['content'] = Content::find($id);            
        }  
        else{
            $this->data['content'] = new Content();
        }     
        
       
        $this->data['position'] =DB::select("select P.id,P.title,R.position_id from content_positions as P left join content_position_relations as R on P.id=R.position_id and R.content_id='$id'");
                
        $this->data['items'] = Content::with('childLevel1','childLevel1.childLevel2')->where('parent_id',0)->where('status',1)->get();
        $this->data['sections'] = Menu::where('show_in_fe',1)->get();
        return view('admin.'.$request->input('controller').'.form', $this->data);
    }

    private function _save($request,$id=0){ 
        


        $this->validate($request, [
            'title' => 'required', 
        ]);

        
        $input = $request->all();
        
        switch($input['link_type']){
            case 'C':
                $input['slug_url']=$this->formatSlug($input['title']);
            break;
            case 'S':
                $input['slug_url']=$this->formatSlug($input['section_url']);
            break;
        }
        
        $input['parent_id'] = isset($input['parent_id']) ? $input['parent_id']  : 0; 
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/content');
            $image->move($destinationPath, $name);
            $input['image'] =$name;
        }  

        //try {
                if($id>0){
                    $menu = Content::find($id);        
                    $menu->update($input);
                }    
                else{
                    $input['status'] =1;
                    $menu = Content::create($input);
                } 

                ContentPositionRelations::where('content_id',$menu->id)->delete();
                if($request->input('position_id')){
                    foreach($request->input('position_id') as $val){
                        ContentPositionRelations::create(array('content_id'=>$menu->id,'position_id'=>$val));
                    }
                }
             
        //} catch(\Illuminate\Database\QueryException $ex){ 
            
        //}       
        
        

    }




} 
