<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Menu;

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
        $this->data['adminMenuTeam']=Menu::where('show_in_admin',1)->where('category','T')->get(); 
        $this->data['adminMenuContent']=Menu::where('show_in_admin',1)->where('category','C')->get(); 
        $this->data['adminMenuMaster']=Menu::where('show_in_admin',1)->where('category','M')->get(); 
        
    }

    public function formatSlug($title){
        $title=str_replace(" ","-",$title);
        $title=str_replace("/","-",$title);
        $title=str_replace("'","-",$title);
        return $title;
    }
    
    
}