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
use App\Models\Programe;



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
            $ids=array(WIDGET_ABOUT_JCI_INDIA,WIDGET_WHY_JCI_INDIA, WIDGET_FOUNDERS_PERSPECTIVE, WIDGET_JCI_MISSION_VISION, WIDGET_JCI_VALUES, WIDGET_CONTACT_US, WIDGET_NATCON_2018_PROMOTION, WIDGET_SUSTAINABLE_DEVELOPMENT, WIDGET_ONLINE_GD_MRF, WIDGET_FOOD_GRAIN_DISTRIBUTION, WIDGET_ACHIEVEMENTS );
                  
        }
        else{
            $ids= array( WIDGET_CONTACT_US, WIDGET_NATCON_2018_PROMOTION, WIDGET_SUSTAINABLE_DEVELOPMENT, WIDGET_ONLINE_GD_MRF, WIDGET_FOOD_GRAIN_DISTRIBUTION);     
        }


        $this->data['widgetContents'] = DB::table('contents')
                    ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
                    ->whereIN('content_position_relations.position_id', $ids)
                    ->where('contents.status', '1')
                    ->where('contents.parent_id',0)
                    ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.short_description','content_position_relations.position_id','contents.section_url','contents.image')
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
        ->where('contents.parent_id',0)
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get();


        $this->data['topLevel2Menu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '2')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get();


        $this->data['mainMenu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '3')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get(); 
        

        $this->data['footerMenu'] = DB::table('contents')
        ->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
        ->where('content_position_relations.position_id', '6')
        ->where('contents.status', '1')
        ->where('contents.parent_id',0)
        ->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')
        ->orderBy('contents.priority','ASC')
        ->orderBy('contents.title','ASC')
        ->get(); 

      
        $this->data['newsUpdates'] = News::where('featured',1)->where('status',1)->get();
        $this->data['programmeData']=Programe::where('status',1)->where('featured',1)->get();
       
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
            $this->data['banner_image']=asset("uploads/".$content['image_path']."/".$content['image']);
        }


        //defaut hardcode
        if(empty($this->data['seo_title'])){
            $this->data['seo_title']="jciindia | Be Better";
        }

        if(empty($this->data['seo_keywords'])){
            $this->data['seo_keywords']="jciindia | Be Better";
        }

        if(empty($this->data['seo_description'])){
            $this->data['seo_description']="jciindia | Be Better";
        }
        //echo $this->data['banner_image'];
        if(empty($this->data['banner_image'])){
            $this->data['banner_image']=asset('fe_theme/images/default_banner.jpg');
        }


    }
}
