
function addToCart(id,image,title,price,quantity){  
        
    addProductToBusket({'k':id,'i':image, 't':title, 'p':price,'q':quantity});

}


function updateCart(){    
    var vid= $('#vid_'+section+'_'+id).val();    
    var quantity= $('#quantity_'+section+'_'+id).val();
    addProductToBusket({'k':vid,'q':quantity,'update':'1'});
}


function removeProductFromBusket(productId){
   
    let storageProducts = JSON.parse(localStorage.getItem('products'));
    let products = storageProducts.filter(product => product.k !== productId );
    //console.log(products);
    localStorage.setItem('products', JSON.stringify(products));

}

function removeCart(id){
    removeProductFromBusket(id);
     //alert(id);
     getCart();
 }


 function addProductToBusket(item){
    let products = [];
    let exists = 0;
    if(localStorage.getItem('products')){
            products = JSON.parse(localStorage.getItem('products'));
                       
            $.each(products,function(i,v){       
              if (v.k == item.k) {
                  if(item.update=='1'){
                    v.q = parseInt(item.q);
                    exists=1;  
                  }
                  else{    
                    v.q = parseInt(v.q)+parseInt(item.q);
                    exists=1;
                    return false;
                  }  
              }
            });

           // console.log(products);
    }
    if(exists==0){
         products.push(item);
    }      
    localStorage.setItem('products', JSON.stringify(products));

    successMessage("Successfully added to cart");
}



function successMessage(msg){

    toastr.success(msg,{
        timeOut: 3000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    });
    }
    
    function errorMessage(msg){
    toastr.error(msg,{
        timeOut: 3000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    
    });
    }



    function getCart(){
        let storageProducts = JSON.parse(localStorage.getItem('products'));
        //console.log(storageProducts);
        var str="";
        var checkout_price_amount=0;
        var cart_count=0;
        if(storageProducts.length>0){
            
            //console.log(storageProducts);
            jQuery.each(storageProducts, function( key, value ) {
                //alert( key + ": " + value.k );
                if(value.k>0){
                   cart_count++;

                   str+='<div class="item">'+
                   '<div class="buttons">'+
                   ' <span class="delete-btn"></span>'+
                   '<span class="like-btn"></span>'+
                   ' </div>'+
           
                   '<div class="image">'+
                   ' <img src="images/pow1.png" alt="" />'+
                   '</div>'+
           
                   '<div class="description">'+
                   '<span>'+value.t+'</span>'+
                   ' <span><a href="javascript:void(0)" onclick="removeCart(\''+value.k+'\')">Remove </a>| <a href="#">View  </a>| <a href="#"> Save for later </a></span>'+
                   ' </div>'+
           
                   '<div class="quantity">'+
                   ' <button class="plus-btn" type="button" name="button">'+
                   '<img src="images/plus.svg" alt="" />'+
                   '</button>'+
                   '<input type="text" name="name" value="'+value.q+'">'+
                   '<button class="minus-btn" type="button" name="button">'+
                   ' <img src="images/minus.svg" alt="" />'+
                   '</button>'+
                   ' </div>'+
           
                   '<div class="total-price">$'+value.p+'</div>'+
                   ' </div>';
                   
                    checkout_price_amount+=parseInt(value.p)*parseInt(value.q);
                }
            });
            
            
        }
        $('.checkout_price_amount').html(checkout_price_amount);
        $('#cartPanel').html(str);
        $('.cart_number').html(cart_count);
   
   
        if(checkout_price_amount>0){
            $('.place_order_outer').show();
        }
        else{
            $('.place_order_outer').hide();
        }
    }



 getCart();


 $('.minus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value > 1) {
        value = value - 1;
    } else {
        value = 0;
    }

$input.val(value);

});

$('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value < 100) {
      value = value + 1;
    } else {
        value =100;
    }

    $input.val(value);
});

$('.like-btn').on('click', function() {
$(this).toggleClass('is-active');
});



