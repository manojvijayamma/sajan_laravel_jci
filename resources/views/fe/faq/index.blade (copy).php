@extends('fe.layouts.master')

@section('content')
<div class="container">


<h1>FAQ</h1>

<div class="menu1">
<p class="menup1"><a href='index.html'>Home</a>/<a href="checkout.html">FAQ</a></p>
</div>


 


<script>$(document).ready(function() {
  $(".box11").click(function() {
    $("#form21").toggle();
  });
});</script>

<?php if($faqs){
	foreach($faqs as $key=>$val){?>
<div class="box11">
<p ><a id="formButton"> <?php echo $val['title']?></a></p>
</div>
<form id="form21" class="form21">

<p><?php echo $val['details']?></p> 
</form>
<?php } } ?>

</div>


<!--right content-->


  

<!--end-->
</div>
<!--shipping-->

 <!--content-->
   















 <!--end-->
 
 </div>
</div>

<!--end-->

</div>
            


    
  
         
</div>
</div>

</div>

</div>
</div>


@endsection