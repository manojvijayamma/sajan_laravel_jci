<?php
namespace App\Http\Controllers\Fe;
use Illuminate\Http\Request;


use App\User;
use App\Models\Content;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Category;

use DB;
use Hash;
use Mail;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
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
 

   

    public function view(Request $request, $id) {
        $this->data['content']=Content::where('slug_url',$id)->first();
        $this->data['title']= $this->data['content']['title'];
        $this->data['details']= $this->data['content']['details'];
        $this->data['content']['image_path']="content"; 
        $this->setMetaData($this->data['content']);
        //$this->setMetaData($this->data['content']); 
        
           
        
        return view('fe.content.view',$this->data);
    }

    public function enquiry() { 
        $this->data['content']=Content::where('slug_url',SECTION_SLUG_ENQUIRY)->first();
        $this->data['content']['image_path']="content"; 
        $this->setMetaData($this->data['content']);

        
        return view('fe.content.enquiry',$this->data);
    }

    public function enquirySend(Request $request) {        
        $input = $request->all();
        $code = $request->input('CaptchaCode');
        $isHuman = captcha_validate($code);
        

        if ($isHuman) {
            $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
            //$headers .= "CC: susan@example.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
            $view = View('fe.emails.enquiry', $input);        
            $contents = $view->render();        
            mail("manojvijayanaluva@gmail.com","Enquiry from blastlineindia.com",$contents, $headers);
    
    
            $menu = Enquiry::create($input);
    
            return redirect()->route('success')->with('success','Successfully sent');
        } else {
            //echo "invalid";
            $input['error']="Invalid code";
            return redirect()->route('enquiry')->with( ['data' => $input] );
        }


        
    }

    public function success() {        
        return view('fe.content.success',$this->data);
    }

   

    

   
}