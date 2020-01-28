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
        $this->data['content']=Content::where('slug_url',$id)->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  

        $query=Event::query();   
        $curDate=date("Y-m-d");     
        if($id){
            
            switch($id){
                case 'upcoming_events' :
                    $this->data['identifier']='upcoming_events';
                    $query=$query->where('identifier','event')->where('event_date','>=',$curDate);
                break;
                case 'past_events' :                    
                    $this->data['identifier']='past_events';
                    $query=$query->where('identifier','event')->where('event_date','<',$curDate);
                break;                 
                default :                    
                    $this->data['identifier']=$id;
                    $query=$query->where('identifier',$id);
                break; 
            }
            
        }
        $this->data['listData']=$query->where('status',1)->orderBy('priority')->orderBy('event_date')->get();       
        return view('fe.event.index',$this->data);
    }


    public function view(Request $request, $id,$eid) { 
        
        $this->data['content']=Content::where('slug_url',$id)->first(); 
        $this->data['content']['image_path']="event";
        $this->setMetaData($this->data['content']);  

        $this->data['viewData']=Event::where('slug_url',$eid)->first();       
        return view('fe.event.view',$this->data);
    }
   



   



   

    

   
}