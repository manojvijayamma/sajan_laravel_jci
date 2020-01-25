<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Content;
use App\Models\Event;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
 
    public function index(Request $request, $id) { 
        $this->data['content']=Content::where('slug_url',SECTION_SLUG_COURSE)->first(); 
        $this->data['content']['image_path']="event";
        $this->setMetaData($this->data['content']);  

        $query=Event::query();        
        if($id){
            $query=$query->where('identifier',$id);
        }
        $this->data['listData']=$query->where('status',1)->orderBy('title')->get();       
        return view('fe.event.index',$this->data);
    }
   



   



   

    

   
}