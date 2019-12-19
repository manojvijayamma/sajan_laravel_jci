
<style>
*{
    font-family:arial;

}
.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #ddd;
}

.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}

table {
    border-spacing: 0;
    border-collapse: collapse;
    width:100%;
}
th{
    background-color:#f1f1f1;
}

</style>


<div class="modal-body" >

                <div class="form-group row">
                
                <table class="table   table-hover" style="margin:0px;padding:0px;border-bottom:2px solid #ccc;">
                    
                            <tr>
                                <td style="width:33%;text-align:center" valign="top"><img src="{{ asset('images/inl1.png') }}" style="width:200px"></td>
                                <td style="width:33%;text-align:center" valign="top"><img src="{{ asset('images/inl2.png') }}" style="width:200px">
                               
                                </td>
                                <td style="width:30%;text-align:center" valign="top"><img src="{{ asset('images/inl3.png') }}" style="width:200px">
                                </td>
                            </tr>
                </table>                
                <br>
                <div style="text-align:center;font-weight:bold;font-size:25px;">Order Request<br></div>
                <table class="table table-striped table-bordered table-hover" style="margin:0px;padding:0px">
                    <thead>
                            <tr>
                                <th>Customer</th>


                                <th>Order Date</th>
                                <th>Order No</th>

                                
                               
                            </tr>
                            <tr>
                          
                                <td rowspan="3">
                                    <?php  echo $userData['firstname'].' '.$userData['lastname'];?>
                                    <br>
                                    <?php  echo $userData['address'];?>
                                </td>
                                   
                                 <td><?php  echo date("Y-m-d",strtotime($orderData['order_date']));?></td>
                                 <td><?php  echo $orderData['order_no'];?></td>

                                
                               
                            </tr>

                            <tr>                          
                                
                                <th>Tin No</th>   
                                <th>Vat No</th>
                                <th></th>                                
                                
                            </tr>

                            <tr>                          
                                
                                <td><?php  echo $userData['tin_no '];?></td>   
                                <td>100201507900003</td>
                                <td></td>                                
                                
                            </tr>
                    </thead>
                    </table>
<br>


                    <table class="table table-striped table-bordered table-hover" style="margin:0px;padding:0px">
     <thead>
            <tr>
                <th>SI</th>
                <th>Description</th>
                <th style="text-align:right">Price</th>
                <th style="text-align:right">Ord. Qty</th>
               
                
                
                <th style="text-align:right">Total</th>
            </tr>
     </thead>
     <tbody>
      
     <?php if($orderDetails){
                                                $subTotal=0;
                                                $vatTotal=0;
                                                $grant_total=0;
                                                $discount_amount=0;
                                                foreach($orderDetails as $key=>$val){
                                                    $subTotal+=$val['total_price'];
                                                  
                                                    $grant_total+=$val['total_price'];
                                              
                                                    ?>
                                            <tr>
                                                <td><?php echo ($key+1)?></td>
                                                <td><?php echo $val['title']?></td>
                                                <td style="text-align:right"><?php echo $val['price']?></td>
                                                <td style="text-align:right"><?php echo $val['quantity']?></td>
                                          
 
                                                <td style="text-align:right"><?php echo $val['total_price']?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="9" style="text-align:right"><b>Sub Total</b></td>
                                                <td style="text-align:right"><b><?php echo number_format($subTotal,2)?></b></td>
                                            </tr>
                                           

                                            <tr>
                                                <td colspan="9" style="text-align:right"><b>Total</b></td>
                                                <td style="text-align:right"><b><?php echo number_format(($grant_total),2)?></b></td>
                                            </tr>
                                                <?php } ?>
     </tbody>
    </table>
    <br>

                        
                        
                </div>

                <div class="form-group row">
                        <table class="table table-striped table-bordered table-hover" style="margin:0px;padding:0px">
                        <tr>
                             <th>Delivery Address:</th>                       
                        </tr>
                        <tr>
                            <td>

                                
                                
                                <?php echo $userData['address'];?>   <br>    
                                <?php echo $userData['city'];?>  <br> 
                                <?php echo $userData['pin'];?>  <br>  
                               
                            </td>                
                        </tr>
                        

                        </table>

                       
                </div>
                
</div>            
