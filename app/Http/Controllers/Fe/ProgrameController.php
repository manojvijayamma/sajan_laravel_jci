<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Programe;
use App\Models\Content;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class ProgrameController extends Controller
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
        $this->data['content']=Content::where('slug_url',SECTION_SLUG_COURSE)->first(); 
        $this->data['content']['image_path']="news";
        $this->setMetaData($this->data['content']);  

        $this->data['listData']=Programe::where('status',1)->orderBy('title')->get();       
        return view('fe.programe.index',$this->data);
    }

    public function view(Request $request, $id) { 
        $this->data['content']=Content::where('slug_url',SECTION_SLUG_COURSE)->first(); 
        $this->data['content']['image_path']="news";
        $this->setMetaData($this->data['content']);  

        $this->data['viewData']=Programe::where('slug_url',$id)->first();       
        return view('fe.programe.index',$this->data);
    }
   



   



   

    

   
}