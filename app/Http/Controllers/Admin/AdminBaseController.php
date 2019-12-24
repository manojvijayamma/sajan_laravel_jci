<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;

class AdminBaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $data;
    public function __construct()
    {
        
        $this->data['adminMenuTeam']=Menu::where('show_in_admin',1)->where('category','T')->orderBy('priority','ASC')->get(); 
        $this->data['adminMenuContent']=Menu::where('show_in_admin',1)->where('category','C')->orderBy('priority','ASC')->get(); 
        $this->data['adminMenuMaster']=Menu::where('show_in_admin',1)->where('category','M')->orderBy('priority','ASC')->get();      
        
        
    }

    public function formatSlug($title){
        $title=str_replace(" ","-",$title);
        $title=str_replace("/","-",$title);
        $title=str_replace("'","-",$title);
        return $title;
    }

    public function checkUserLevel($user_group_id){   
            echo $user_group_id;exit;        
            $userGroupData=UserGroup::find($user_group_id);
            return $userGroupData['level'];
    }
    
    
}