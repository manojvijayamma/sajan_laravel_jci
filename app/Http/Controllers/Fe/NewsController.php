<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\News;
use App\Models\Content;


use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
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
        $this->data['content']=Content::where('slug_url',"news")->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  

        $this->data['listData']=News::where('status',1)->orderBy('priority')->orderBy('title')->get();       
        return view('fe.news.index',$this->data);
    }


    public function view(Request $request, $id) { 
        $this->data['content']=Content::where('slug_url',"news")->first(); 
        $this->data['content']['image_path']="content";
        $this->setMetaData($this->data['content']);  

        $this->data['viewData']=News::where('slug_url',$id)->first();       
        return view('fe.news.view',$this->data);
    }
   



   



   

    

   
}