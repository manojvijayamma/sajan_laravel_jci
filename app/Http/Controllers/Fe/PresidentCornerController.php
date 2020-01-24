<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Content;
use App\Models\Enquiry;
use App\Models\PresidentCorner;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class PresidentCornerController extends Controller
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
 

   

    public function index(Request $request) {
        $id="XXXXXXX";
        $this->data['content']=Content::where('slug_url',$id)->first();
        $this->data['content']['title']= "President Corner";
        $this->data['content']['details']= "Coming Soon";
        $this->data['content']['image_path']="content"; 
        $this->setMetaData($this->data['content']);
        //$this->setMetaData($this->data['content']); 
        
        $this->data['presidentData']=PresidentCorner::where('id','1')->first();
           
        
        return view('fe.president.view',$this->data);
    }

    

   

    

   
}