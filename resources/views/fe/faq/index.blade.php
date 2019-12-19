@extends('fe.layouts.master')

@section('content')

<style>
  #form1
  {
  display:none;
  }
  #form2
  {
  display:none;
  }
  #form3
  {
  display:none;
  }
  .form1
  {
  display:none;
  }
  #form21
  {
  display:none;
  }
  </style>

<div class="container">


<h1>FAQ</h1>

<div class="menu1">
<p class="menup1"><a href='index.html'>Home</a>/<a href="checkout.html">FAQ</a></p>
</div>

<script>$(document).ready(function() {
  $(".box").click(function() {
   // $("#form1").toggle();
    $(this).next().toggle();
  });
});</script>

<?php if($faqs){
  foreach($faqs as $key=>$val){?>
  
          <div class="box">
            <p ><a class="formButton">+&nbsp;  <?php echo $val['title']?></a></p>
          </div>

          <form id="form1" class="form1">

              <?php echo $val['details']?>
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
            
<script>$(document).ready(function() {
  $("#check1").click(function() {
    $(".form1").toggle();
  });
});</script>

    
  
         
</div>
</div>

</div>

</div>
</div>

@endsection