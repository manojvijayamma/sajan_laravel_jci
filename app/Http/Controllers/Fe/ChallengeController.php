<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\Content;

use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
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
 
    public function index() { 
        $this->data['content']=Content::where('slug_url','challenge')->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  
        
        $this->data['listData']=Challenge::where('status','1')->orderBy('priority')->get();       
        return view('fe.challenge.index',$this->data);
    }
   



   
}