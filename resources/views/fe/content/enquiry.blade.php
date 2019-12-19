@include('fe.includes.header')
<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<body>
	<!-- ================Offcanvus Menu Area =================-->
	<div class="side_menu">
  @include('fe.includes.menu')
	</div>
	<!--================End Offcanvus Menu Area =================-->

	<!--================Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
			<div class="float-right">
				<div class="toggle_icon" title="Menu Bar">
					<span></span>
				</div>
			</div>
		</div>
	</div>
	<!--================End Canvus Menu Area =================-->

  @include('fe.includes.banner_inner')

  <section class="service section-marginsub mb-5 pb-5">
		<div class="container">
			<div class="section-introsub1">
				<!--<h2 class="section-intro__titlesub1">Our Courses</h2>-->
				
			</div>

			<!--<div class="row">-->
       
            <div class="course1">
              <p>
  <section class="service section-margin mb-5 pb-5">
		<div class="container">
			<div class="section-introsub1">
				<!--/*<h2 class="section-intro__titlesub1">Our Courses</h2>*/-->
				
			</div>

			<!--<div class="row">-->
            <div class="row">
            <div class="col-lg-4">
        <div class="col-sm-6 col-lg-4">
          <div class="media service__singlesub">
            
          @include('fe.includes.career_possibilities_inner')

          </div>
        </div>
         
      
        <div class="col-sm-6 col-lg-4">
          <div class="media service__singlesub">
           
          @include('fe.includes.courses_inner')
          </div>
        </div>
       </div>
       <div class="col-lg-8">
       <div class="blastcnt">
       <h2><?php echo $content->title?></h2>

       <?php echo $content->details?>

    <!--<p class="cntp">For alternate email_id: Click here</p>-->
    </div>
    <br><br>
    <div class="blastenq">
    <p class="cntp">For more details, Please drop your details in the form given below.</p><br>
    <p class="cntp1">( Fields marked as *are mandatory )
</p>
       <form class="well form-horizontal" action="enquiry" method="post"  id="contact_form" onsubmit="return validation();">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<?php 
$sData=Session::get('data');

if(isset($sData['error'])){
    ?>
    <p class="cntp1">
      <?php 
    echo Session::get('data')['error'];
    ?>
    </p>
 <?php } ?>


<div class="form-group">
 
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" id="first_name" placeholder="Name" class="form-control"  type="text" value="<?php echo $sData['first_name']?>">
    </div>
  </div>
</div>


<div class="form-group"> 
 
    <div class="col-md-8 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select id="country" name="country" class="form-control selectpicker" >
      <option value=" " >Country</option>
      <option value="Alabama">Alabama</option>
      <option value="Alaska">Alaska</option>
      <option value="Arizona">Arizona</option>
      <option value="Arkansas">Arkansas</option>
      <option value="California">California</option>
      <option value="Colorado">Colorado</option>
      <option value="Connecticut">Connecticut</option>
      <option value="Delaware">Delaware</option>
      <option value="District of Columbia">District of Columbia</option>
      <option value="Florida"> Florida</option>
      <option value="Georgia">Georgia</option>
      <option value="Hawaii">Hawaii</option>
      <option value="daho">daho</option>
      <option value="Illinois">Illinois</option>
      <option value="Indiana">Indiana</option>
      <option value="Iowa">Iowa</option>
      <option value="Kansas"> Kansas</option>
      <option value="Kentucky">Kentucky</option>
      <option value="Louisiana">Louisiana</option>
      <option value="Maine">Maine</option>
      <option value="Maryland">Maryland</option>
      <option value="Mass"> Mass</option>
      <option value="Michigan">Michigan</option>
      <option value="Minnesota">Minnesota</option>
      <option value="Mississippi">Mississippi</option>
      <option value="Missouri">Missouri</option>
      <option value="Montana">Montana</option>
      <option value="Nebraska">Nebraska</option>
      <option value="Nevada">Nevada</option>
      <option value="New Hampshire">New Hampshire</option>
      <option value="New Jersey">New Jersey</option>
      <option value="New Mexico">New Mexico</option>
      <option value="New York">New York</option>
      <option value="North Carolina">North Carolina</option>
      <option value="North Dakota">North Dakota</option>

      <option value="Ohio">Ohio</option>
      <option value="Oklahoma">Oklahoma</option>
      <option value="Oregon">Oregon</option>
      <option value="Pennsylvania">Pennsylvania</option>
      <option value="Rhode Island">Rhode Island</option>
      <option value="South Carolina">South Carolina</option>
      <option value="South Dakota">South Dakota</option>
      <option value="Tennessee">Tennessee</option>
      <option value="Texas">Texas</option>
      <option value="Uttah"> Uttah</option>
      <option value="Vermont">Vermont</option>
      <option value="Virginia">Virginia</option>
      <option value="Washington">Washington</option>
      <option value="West Virginia">West Virginia</option>
      <option value="Wisconsin">Wisconsin</option>
      <option value="Wyoming">Wyoming</option>
    </select>
  </div>
</div>
</div>
<!-- Text input-->

 <div class="form-group">
   
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input id="email" name="email" placeholder="E-mail" class="form-control"  type="email" value="<?php echo $sData['email']?>">
    </div>
  </div>
</div>


<div class="form-group">
  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="phone" name="phone" placeholder="Phone" class="form-control"  type="text" value="<?php echo $sData['phone']?>">
    </div>
  </div>
</div>

<!-- Text input-->
      


<!-- Text input-->
       
<div class="form-group">
  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="mobile" name="mobile" placeholder="Mobile No" class="form-control" type="text" value="<?php echo $sData['mobile']?>">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <!-- <textarea id="comment" name="comment" placeholder="Comments.." class="form-control" ><?php echo $sData['comment']?></textarea> -->
  <select id="country" name="comment" class="form-control selectpicker" >
      <option value="">Interested In</option>
      <?php if(isset($leftSideCourses)){
        foreach($leftSideCourses as $val){?>
            <option value="<?php echo $val->title?>"><?php echo $val->title?></option>
     <?php  } }?>
</select>
    </div>
  </div>
</div>


<!-- Text input-->
<div class="form-group" >
 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
    {!! captcha_image_html('ExampleCaptcha') !!}
    <input type="text" id="CaptchaCode" name="CaptchaCode" class="form-control" style="width:250px;">
    
    </div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-8 control-label"></label>
  <div class="col-md-8 btnsub">
    <button type="submit" class="btn3 " >Submit <span class="glyphicon glyphicon-send"></span></button>
     <button type="submit" class="btn3" >Reset <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
    
    </div>
    
    
    
    



       </div></div>
			</div>
		</div>
  </section>
  

       
<div id="fixed-social1">
@include('fe.includes.social')
</div> 
 

	<footer class="footer footer-bgsub1">
  @include('fe.includes.footer')

  <script>
$(document).ready(function(){
    $("a[title ~= 'BotDetect']").removeAttr("style");
    $("a[title ~= 'BotDetect']").removeAttr("href");
    $("a[title ~= 'BotDetect']").css('visibility', 'hidden');

    $('#ExampleCaptcha_SoundLink').hide();
    $('#CaptchaCode').removeAttr("disabled");

});
</script>
  <script>
function validation(){
  var first_name=$('#first_name').val();
  var email=$('#email').val();
  var mobile=$('#mobile').val();

  if(first_name==""){
    alert("Please enter name");
    return false;
  }

  if(email==""){
    alert("Please enter email");
    return false;
  }

  if(mobile==""){
    alert("Please enter mobile");
    return false;
  }

  return true;

}


  </script>  