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
        $this->data['content']['image_path']="team";
        $this->setMetaData($this->data['content']);  

        $query=Team::leftJoin('designations','designations.id','teams.designation_id');
        $query=$query->select('teams.*','designations.title as designation_title');
       
        if($id){
            switch($id){
                case 'national-governing-board':
                    $menuData=Menu::where('category','T')->where('query_string',$id)->first();
                    if($menuData){
                        $menuSub=Menu::where('category','T')->where('parent_id',$menuData->id)->get();
                        if($menuSub){
                            
                            foreach($menuSub as $val){                                
                                $query=$query->whereOr('teams.identifier',$val->query_string);
                            }
                            
                        }
                    }
                    
                break; 
                default:
                    $query=$query->where('teams.identifier',$id);
                break;
            }
            
        }
        $this->data['listData']=$query->where('teams.status',1)->orderBy('teams.priority')->orderBy('teams.title')->get();       
        return view('fe.team.index',$this->data);
    }
   



   



   

    

   
}