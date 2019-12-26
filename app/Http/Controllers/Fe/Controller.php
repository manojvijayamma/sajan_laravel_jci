<?php

namespace App\Http\Controllers\Fe;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Support\Facades\Auth;
use Route;
use DB;

use App\Models\Content;
use App\Models\Banner;
use App\Models\News;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $data;
    public function __construct()
    {        
        //get logged user data
        $this->middleware(function ($request, $next) {            
            $this->data['loggedUser']=Auth::user();            
            return $next($request);
        });


        //check home page
        if (Route::getCurrentRoute()->uri() == '/')
        {
            $ids=array(WIDGET_WHY_WANT_TO_CHOOSE, WIDGET_YOU_HAVE_TRAINING_NEEDS_WE_HAVE_SOLUTION, WIDGET_HOW_IT_WORKS, WIDGET_BENEFITS_OF_PURCHASING_OUR_PRODUCTS, WIDGET_FREE_RESOURCE, WIDGET_WHY_BUY_OUR_TRAINING_COURSE_MATERIAL_PACKAGES, WIDGET_OUR_UNIQUENESS, WIDGET_OUR_COURSE_KIT_CONTAINS, WIDGET_ABOUT_TRAINING_MATERIAL, WIDGET_HAVE_A_QUESTION);
                  
        }
        else{
            $ids= array( WIDGET_ABOUT_TRAINING_MATERIAL);     
        }


        $this->data['widgetContents'] = DB::table('contents')
                    ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
                    ->whereIN('content_position_relations.position_id', $ids)
                    ->where('contents.status', '1')
                    ->where('contents.parent_id',0)->where('contents.is_widget','0')
                    ->select('contents.id','contents.title','contents.link_type','contents.slug_url',DB::raw('substr(contents.details, 1, '.SUB_STRING_COUNT.') as details') ,'content_position_relations.position_id','contents.section_url','contents.image')
                    ->orderBy('contents.priority','ASC')
                    ->orderBy('contents.title','ASC')
                    ->get(); 
                    

        if($this->data['widgetContents']){
            $result=[];
            foreach($this->data['widgetContents'] as $val){                
                $result[$val->position_id]=$val;
            }
            $this->data['widgetContents']=$result;
        } 


        
        $this->data['topLevel1Menu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '1')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)->where('contents.is_widget','0')
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get();


        $this->data['topLevel2Menu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '2')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)->where('contents.is_widget','0')
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get();


        $this->data['mainMenu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '3')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)->where('contents.is_widget','0')
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get(); 
        

        $this->data['footerMenu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '4')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)->where('contents.is_widget','0')
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get(); 

      
        $this->data['newsUpdates'] = News::get();
       
    }

    public function setMetaData($content=null){
        $this->data['defaultmeta']=Content::where('slug_url',SECTION_SLUG_HOME)->select('seo_title','seo_keywords','seo_description')->first(); 
        
        
        //slug_url='home';
        $this->data['seo_title']=$this->data['defaultmeta']['seo_title'];
        $this->data['seo_keywords']=$this->data['defaultmeta']['seo_keywords'];
        $this->data['seo_description']=$this->data['defaultmeta']['seo_description'];
        if($this->data['defaultmeta']['image']){
            $this->data['banner_image']="uploads/content/".$this->data['defaultmeta']['image'];
        }    


        if(isset($content['seo_title'])){
            $this->data['seo_title']=$content['seo_title'];
        }
        
        if(isset($content['seo_keywords'])){
            $this->data['seo_keywords']=$content['seo_keywords'];
        }
        
        if(isset($content['seo_description'])){
            $this->data['seo_description']=$content['seo_description'];
        }       
       
        if(isset($content['image']) && !empty($content['image'])){
            $this->data['banner_image']="../uploads/".$content['image_path']."/".$content['image'];
        }


        //defaut hardcode
        if(empty($this->data['seo_title'])){
            $this->data['seo_title']="BGAS & CSWP Training | API & ISO Training | Blastline Institute";
        }

        if(empty($this->data['seo_keywords'])){
            $this->data['seo_keywords']="BGAS & CSWP Training | API & ISO Training | Blastline Institute";
        }

        if(empty($this->data['seo_description'])){
            $this->data['seo_description']="BGAS & CSWP Training | API & ISO Training | Blastline Institute";
        }
        //echo $this->data['banner_image'];
        if(empty($this->data['banner_image'])){
            $this->data['banner_image']=asset('fe_theme/img/subt-bg.png');
        }


    }
}
