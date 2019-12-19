<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;


use DB;
use Hash;
use Validator;
use JWTAuth;
use App\Models\Banner;


class BannerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
    */

    

    public function banner(Request $request)
    {      
          $banner=Banner::where('status',1)->get()->toArray();  
          if($banner){
            foreach($banner as $key=>$val){
              $result[$key]=(array)$val;
              $result[$key]['image']=url('/')."/uploads/banner/".$val['image'];              
            }  
          }       
          return response()->json(
            $result,
          200);       

    }
    
}
