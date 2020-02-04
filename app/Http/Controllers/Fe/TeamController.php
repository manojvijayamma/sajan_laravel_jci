<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


use App\User;
use App\Models\Content;
use App\Models\Team;
use App\Models\Menu;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public $year;
    public $history;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function history(Request $request, $id) { 
        $this->year=$id;
        $this->history=1;
        $id=$request->input('t') ? $request->input('t') : "national-governing-board";
        return $this->index($request,$id);
    }

    public function index(Request $request, $id) { 
        $this->data['year']=$this->year>0 ? $this->year : date("Y");
        $this->data['history']=$this->history>0 ? $this->history : 0;
        $this->data['content']=Content::where('slug_url',$id)->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']); 
        
         

        $query=Team::leftJoin('designations','designations.id','teams.designation_id');
        $query=$query->select('teams.*','designations.title as designation_title');
        
        $viewPage="fe.team.index";
        $this->data['identifier']=$id;
        $this->data['activeTab']=$id;
        $this->data['showYear']='';
        if($id){
            switch($id){
                case 'national-governing-board':                    
                    //echo $wherein;
                    $query=$query->where(function ($q) {
                        $q->orWhere('teams.identifier', 'national-executive-committee');
                        $q->orWhere('teams.identifier', 'national-directors');
                        $q->orWhere('teams.identifier', 'zone-presidents');
                    });

                    
                    $query=$query->where('teams.year',$this->data['year']);
                    $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
                    return view($viewPage,$this->data);
                    
                break; 
                case 'national-appointees':   

                        return view('fe.team.appointees',$this->data);
                break;

                case 'past-national-presidents':  
                    $this->data['showYear']=1;
                    $query=$query->where('teams.year','<',$this->data['year']);                             
                    $query=$query->where('teams.identifier',$id);

                    $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
                    return view('fe.team.index',$this->data);

                break;

                default:
                    $query=$query->where('teams.year',$this->data['year']);
                    if($id=='national-executive-committee' || $id=='national-directors' || $id=='zone-presidents'){
                         $this->data['activeTab']="national-governing-board";
                    }
                    $query=$query->where('teams.identifier',$id);

                    $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
                    return view('fe.team.index',$this->data);

                break;
            }
            
        } 
        
    }
   

    public function view(Request $request, $id,$vid) { 
        $this->data['content']=Content::where('slug_url',$id)->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  

        $this->data['viewData']=Team::leftJoin('designations as c','c.id','teams.designation_id')
                ->leftJoin('designations as p','p.id','teams.previous_designation_id')
                ->select('teams.*','c.title as current_designation','p.title as previous_designation')
                ->where('teams.id',$vid)->first();       
        return view('fe.team.view',$this->data);
    }
   

   



   

    

   
}