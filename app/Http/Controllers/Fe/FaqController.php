<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Faq;
use App\Models\Content;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
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
        $this->data['content']['image_path']="faq";
        $this->setMetaData($this->data['content']);  

        $this->data['listData']=Faq::where('status',1)->orderBy('title')->get();       
        return view('fe.faq.index',$this->data);
    }
   



   



   

    

   
}