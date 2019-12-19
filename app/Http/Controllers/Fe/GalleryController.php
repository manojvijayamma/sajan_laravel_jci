<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\Content;

use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
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
        $this->data['content']=Content::where('slug_url',SECTION_SLUG_GALLERY)->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  
        
        $this->data['listData']=Gallery::where('status','1')->get(); 

       
        return view('fe.gallery.index',$this->data);
    }
   



   
}