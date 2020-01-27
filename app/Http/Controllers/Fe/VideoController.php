<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Course;
use App\Models\Video;
use App\Models\Content;

use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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
        $this->data['content']=Content::where('slug_url','video')->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  
        
        $query=Video::query();
        
        $this->data['listData']=$query->where('status','1')->orderBy('priority')->get();       
        return view('fe.video.index',$this->data);
    }
   



   
}