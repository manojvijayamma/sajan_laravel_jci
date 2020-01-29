<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


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

        $query=Team::leftJoin('designations','designations.id','teams.designation_id');
        $query=$query->select('teams.*','designations.title as designation_title');
        $viewPage="fe.team.index";
       
        if($id){
            switch($id){
                case 'national-governing-board':
                    
                    //echo $wherein;
                    $query=$query->where(function ($q) {
                        $q->orWhere('teams.identifier', 'national-executive-committee');
                        $q->orWhere('teams.identifier', 'national-directors');
                        $q->orWhere('teams.identifier', 'zone-presidents');
                    });

                    $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
                    return view($viewPage,$this->data);
                    
                break; 
                case 'national-appointees':                               
                        return view('fe.team.appointees',$this->data);
                break;
                default:
                    $query=$query->where('teams.identifier',$id);

                    $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
                    return view('fe.team.index',$this->data);

                break;
            }
            
        }
        
    }
   



   



   

    

   
}