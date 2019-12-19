<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;


use DB;
use PDF;
use PDO;
use Hash;
use Validator;
use JWTAuth;
use App\Models\Product;
use App\Models\ProductGallery;
use App\User;
use App\Models\Order;
use App\Models\OrderDetails;


class OrdersController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
    */

    public function save(Request $request)
    { 
          
            $input = $request->all(); 
            //print_r($input);
            $user = JWTAuth::toUser($request->bearerToken());       
            $userId=$user->id; 
            $userData=User::find($userId); 
                        

            
            
            
            $orderData['order_no']=date("Y").'/'.date("m").'/'.date("d").'/'.time();
            $orderData['order_date']=date("Y-m-d H:i:s");
            $orderData['user_id']=$userId;
            //$orderData['order_note']=$input['order_note']; 
            $orderData['status']='pending';             
            $orderData['firstname']=$input['shippingDetails']['firstname'];
            $orderData['lastname']=$input['shippingDetails']['lastname'];
            $orderData['phone']=$input['shippingDetails']['phone'];
            $orderData['email']=$input['shippingDetails']['email'];
            $orderData['address']=$input['shippingDetails']['address'];
            $orderData['country']=$input['shippingDetails']['country'];
            $orderData['town']=$input['shippingDetails']['town'];
            $orderData['state']=$input['shippingDetails']['state'];
            $orderData['postalcode']=$input['shippingDetails']['postalcode'];
            $orderData['grant_total']=0;
            
            
            $mailData['orderData']=$orderData;
            $orderData=Order::create($orderData); 

            $orderDetailsMail=[];
            
            if($input['product']){
                $order_total=0;
                foreach($input['product'] as $val){
                    //$productData=Product::find($val['product']['id']); 

                    $productData = DB::table('products')
                            ->leftJoin('offer_products', 'products.id', '=', 'offer_products.product_id')                            
                            ->where('products.id',$val['product']['id']) 
                            ->select('products.id','products.title','products.price','offer_products.offer_price','products.image')
                            ->first();


                    $orderDetails['order_id']=$orderData->id; 
                    $orderDetails['title']=$productData->title;   
                    $orderDetails['product_id']=$productData->id;       
                    $orderDetails['price']=$productData->price;
                    $orderDetails['offer_price']=$productData->offer_price;  
                    $price=$productData->offer_price>0 ? $productData->offer_price : $productData->price;   
                    $orderDetails['quantity']=$val['quantity']; 
                    $orderDetails['total_price']=$val['quantity']*$price;                     
                    //$orderDetails['grant_total']=$val['product']['grant_total']; 
                    $orderDetails['image']=$productData->image;  
                   

                    orderDetails::create($orderDetails);
                    $order_total+=$orderDetails['total_price'];
                    $orderDetailsMail[]=$orderDetails;
                } 
            }        

            $orderData->update(array('grant_total'=>$order_total));       
           
            
            $mailData['orderDetails']=$orderDetailsMail;
            $mailData['userData']=$userData;
          

            $fileattname='order_request_'.$orderData->id.'.pdf';
            $pdf = PDF::loadView('admin/emails/order', $mailData);       
            $pdf->save("uploads/orders/".$fileattname);
            
            //send email
            /*
            $headers = "From: " . strip_tags($userData['email']) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($userData['email']) . "\r\n";
            $headers .= "CC: susan@example.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $view = View('admin.emails.order',$mailData );        
            $contents = $view->render();        
            mail("manojvijayanaluva@gmail.com","Order from Website",$contents, $headers);
            */


            $name        = $userData['firstname'].' '.$userData['lastname'];
            $email       = $userData['email'];
            $to          = "$name <$email>";
            $from        = "Admin";
            $subject     = "New order - safeer tyres";
            $mainMessage = "Hi, <br> ".$name." has generated new order request. Please find the attached pdf." ;
            $fileatt     = "uploads/orders/".$fileattname; //file location
            $fileatttype = "application/pdf";
            $fileattname = $fileattname; //name that you want to use to send or you can use the same name
            $headers = "From: $from \r\n";
            $headers .= 'Cc: info@safeertyres.com, pious.pious@gmail.com, manojvijayanaluva@gmail.com\r\n';

            // File
            $file = fopen($fileatt, 'rb');
            $data = fread($file, filesize($fileatt));
            fclose($file);

            // This attaches the file
            $semi_rand     = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
            $headers      .= "\nMIME-Version: 1.0\n" .
            "Content-Type: multipart/mixed;\n" .
            " boundary=\"{$mime_boundary}\"";
            $message = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type: text/html; charset=\"iso-8859-1\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
            $mainMessage  . "\n\n";

            $data = chunk_split(base64_encode($data));
            $message .= "--{$mime_boundary}\n" .
            "Content-Type: {$fileatttype};\n" .
            " name=\"{$fileattname}\"\n" .
            "Content-Disposition: attachment;\n" .
            " filename=\"{$fileattname}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
            $data . "\n\n" .
            "--{$mime_boundary}--\n";

            // Send the email
            if(mail($to, $subject, $message, $headers)) {

              // echo "The email was sent.";

            }
            else {

                //echo "There was an error sending the mail.";
            }

            
            return response()->json([
                'status'=>'success',
                'text'=>'Your order has been successfully placed.',
                'orderId'=>$orderData->id
            ], 200);

    }


    

    


 
    
}
