<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;


use DB;
use PDO;
use Hash;
use Validator;
use JWTAuth;
use App\Models\Product;
use App\Models\ProductGallery;


class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
    */

    public function featured(Request $request)
    { 
          
          $products = DB::table('products')
          ->join('featured_products', 'products.id', '=', 'featured_products.product_id')                  
          ->where('products.status', '1')                
          ->select('products.id','products.parent_id')
          ->orderBy('products.priority','ASC')
          ->get()->toArray(); 
         
          $mainResult=$this->getVarient($products);          
          
          return response()->json(
             $mainResult,
          200);

    }    
 

    public function offers(Request $request)
    { 
          
          $products = DB::table('products')
          ->join('offer_products', 'products.id', '=', 'offer_products.product_id')                   
          ->where('products.status', '1')          
          ->select('products.id','products.parent_id')
          ->orderBy('products.priority','ASC')
          ->get()->toArray(); 
          
          
          $mainResult=$this->getVarient($products);
      
          
          return response()->json(
            $mainResult,
         200);       

    }


    public function products(Request $request)
    { 
          
          $query = DB::table('products')
          ->leftJoin('offer_products', 'products.id', '=', 'offer_products.product_id') 
          ->join('categories', 'categories.id', '=', 'products.category_id')          
          ->where('products.status', '1')          
          ->where('products.parent_id', '0') 
          ->select('products.id','products.parent_id')
          ->orderBy('products.priority','ASC');
         
          $category_id=$request->input('category');  
          if(isset($category_id)){
              $query->where('products.category_id',$category_id);
          }

          $products=$query->get()->toArray(); 
                
          $mainResult=$this->getVarient($products);
      
          
         return response()->json(
            $mainResult,
         200);           

    }



    public function newProducts(Request $request)
    { 
          
          $products = DB::table('products')
          ->join('popular_products', 'products.id', '=', 'popular_products.product_id') 
          ->leftJoin('offer_products', 'products.id', '=', 'offer_products.product_id')          
          ->join('categories', 'categories.id', '=', 'products.category_id')          
          ->where('products.status', '1')          
          ->select('products.id','products.title','categories.title as category')
          ->orderBy('products.priority','ASC')
          ->get()->toArray(); 
                
          $mainResult=$this->getVarient($products);
      
          
         return response()->json(
            $mainResult,
         200);           

    }


    public function details($id)
    { 
          
          $products = DB::table('products')
          ->leftJoin('offer_products', 'products.id', '=', 'offer_products.product_id') 
          ->join('categories', 'categories.id', '=', 'products.category_id')          
          ->where('products.id', $id)          
          ->select('products.id','products.parent_id')
          ->get();  
                
          $mainResult=$this->getVarient($products);     
          
           
      
          
         return response()->json(
            $mainResult,
         200);           

    }

      function getVarient($products){

        $mainResult=[];
                $existingProducts=[];
                if(isset($products)){
                  foreach($products as $mkey=>$mVal){
                      //$result[$key][]=(array)$p;               
                      if($mVal->parent_id>0){                   
                        $productId=$mVal->parent_id;                
                      }
                      else{                  
                        $productId=$mVal->id;
                      }  
                      
                      if(in_array($productId,$existingProducts)){
                        //skip already exists
                      }
                      else{  
                        $existingProducts[]=$productId;
                        $variants = DB::table('products')                  
                          ->leftJoin('offer_products', 'products.id', '=', 'offer_products.product_id')          
                          ->where('products.status', '1')
                          ->where('products.parent_id',$productId) 
                          ->orWhere('products.id', $productId)                          
                          ->select('products.id','products.parent_id','products.title','products.price','products.image','offer_products.offer_price')                  
                          ->orderBy('products.priority','ASC')
                          ->get()->toArray();        
                        
                        $result=[];
                        foreach($variants as $key=>$p){
                                $result[$key]=(array)$p;
                                $result[$key]['discount']=0;
                                if(isset($result[$key]['offer_price']) && $result[$key]['offer_price']>0){
                                    $result[$key]['sale_price']=$result[$key]['price'];
                                    $result[$key]['discount']=$result[$key]['offer_price'];
                                    $result[$key]['offer_price']=($result[$key]['price']*$result[$key]['offer_price'])/100;
                                }
                                else{
                                  $result[$key]['offer_price']=$result[$key]['price'];
                                  $result[$key]['sale_price']=$result[$key]['price'];
                                }

                                $result[$key]['image']=url('/')."/uploads/product/".$p->image;
                                $result[$key]['parent_id']=$productId;

                        }
                        $mainResult[]=$result;
        
                      }     
                    
                  }
                }

                
                return $mainResult;
      }


    

    


 
    
}
