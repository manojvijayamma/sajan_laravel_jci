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
use App\Models\Category;


class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
    */

    

    public function category(Request $request)
    { 
      
          $category=Category::with('childLevel1','childLevel1.childLevel2')->where('parent_id',0)->where('status',1)->get();          
          
          //$category[]=array("id"=>1,"title"=>"test"); 
          return response()->json(
            $category,
          200);       

    }

    public function subCategory(Request $request, $id)
    { 
      
          $category=Category::where('parent_id','!=',0)->where('status',1)->get();          
          return response()->json(
            $category ,
          200);       

    }
    
}
