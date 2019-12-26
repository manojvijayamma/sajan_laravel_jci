
@extends('fe.layouts.master')

@section('content')






  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  
		<ol class="carousel-indicators">
			<?php   foreach ($mainBanners as $key=>$banners) {?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $key?>" class="<?php echo $key==0 ? 'active' : '' ?>"></li>
			<?php } ?> 
		</ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  			<?php   foreach ($mainBanners as $key=>$banners) {?>
					<div class="item <?php echo $key==0 ? 'active' : '' ?>">
					<div class="quotes">
					<h2><?php echo $banners['title']?></h2>
					</div>
					<img src="{{asset('uploads/banner/'.$banners->image)}}" alt="" style="width:100%;">
					
					</div>

			<?php } ?> 
  
	
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span>
	<span class="sr-only">Next</span>
  </a>
</div>








<div class="container">
<div class="para">
<div class="row">
<div class="col-md-6 col-lg-6 col-sm-12 para1">
	<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_WHY_WANT_TO_CHOOSE])){?>
	<h3><?php echo $widgetContents[WIDGET_WHY_WANT_TO_CHOOSE]->title?></h3>

	<?php echo $widgetContents[WIDGET_WHY_WANT_TO_CHOOSE]->details?>
	<?php } ?>		
</div>


<div class="col-md-6 col-lg-6 col-sm-12 para2">
	<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_YOU_HAVE_TRAINING_NEEDS_WE_HAVE_SOLUTION])){?>
	<h3><?php echo $widgetContents[WIDGET_YOU_HAVE_TRAINING_NEEDS_WE_HAVE_SOLUTION]->title?></h3>
	<?php echo $widgetContents[WIDGET_YOU_HAVE_TRAINING_NEEDS_WE_HAVE_SOLUTION]->details?>
	<?php } ?>	
</div>
</div>
</div> 
</div>
<div id="third">
<div class="container">
<div class="row">
<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_HOW_IT_WORKS])){?>	
<div class="col-md-6 third">
<img src="{{ asset('uploads/content/'.$widgetContents[WIDGET_HOW_IT_WORKS]->image)}}" />
</div>
<div class="col-md-6 how">

		<h2><?php echo $widgetContents[WIDGET_HOW_IT_WORKS]->title?></h2>

		<?php echo $widgetContents[WIDGET_HOW_IT_WORKS]->details?>

</div>
<?php } ?>
</div></div></div>



<div id="fourth">
<div class="container">
<div class="row">
<div class="col-sm-12 thhh2">

<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_BENEFITS_OF_PURCHASING_OUR_PRODUCTS])){?>	
<h2><?php echo $widgetContents[WIDGET_BENEFITS_OF_PURCHASING_OUR_PRODUCTS]->title?></h2><br />

<?php echo $widgetContents[WIDGET_BENEFITS_OF_PURCHASING_OUR_PRODUCTS]->details?>

<?php } ?>


</div></div></div></div>



<!--section 5-->
<div id="fifth">
<div class="container">
<div class="row">
<div class="col-md-12">










<div class="col-sm-5">
<form id="frm_login" action="{{url('login')}}" method="post">
<p class="ff2">


		<input type="hidden" name="redirect_url" value="dashboard">
		{{ csrf_field() }}
		<input type="text" class="input-text" name="email" id="login_email" placeholder="Username or email"><br />
		<input type="password" class="input-text1" name="password" id="login_password" placeholder="Password">
		<input type="button" class="input-text2 login_btn" value="Login"  placeholder="Login">
</form>

<p class="form-row form-row-wide">	  
			  
		  
<div class="fff2">
<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_FREE_RESOURCE])){?>	
<h2><?php echo $widgetContents[WIDGET_FREE_RESOURCE]->title?></h2>
<?php echo $widgetContents[WIDGET_FREE_RESOURCE]->details?>
<?php }?>
</div>
<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_HAVE_A_QUESTION])){?>	
<h4><?php echo $widgetContents[WIDGET_HAVE_A_QUESTION]->title?>??</h4>
<?php echo $widgetContents[WIDGET_HAVE_A_QUESTION]->details?>
<?php } ?>
</div></div></div>
</div></div>

<!--section 5-->

<div id="six">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="col-md-3 si3">

<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_WHY_BUY_OUR_TRAINING_COURSE_MATERIAL_PACKAGES])){?>	
<h4><?php echo $widgetContents[WIDGET_WHY_BUY_OUR_TRAINING_COURSE_MATERIAL_PACKAGES]->title?></h4>
<?php echo $widgetContents[WIDGET_WHY_BUY_OUR_TRAINING_COURSE_MATERIAL_PACKAGES]->details?>

<?php } ?>


</div>

<div class="col-sm-6"> 
<div class="unique">

<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_OUR_UNIQUENESS])){?>	
<h3><?php echo $widgetContents[WIDGET_OUR_UNIQUENESS]->title?></h3>
<?php echo $widgetContents[WIDGET_OUR_UNIQUENESS]->details?>
<?php } ?>

<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_OUR_COURSE_KIT_CONTAINS])){?>
<h3><?php echo $widgetContents[WIDGET_OUR_COURSE_KIT_CONTAINS]->title?>:</h3>
<?php echo $widgetContents[WIDGET_OUR_COURSE_KIT_CONTAINS]->details?>
<?php } ?>

</div></div>



<div class="imgg">
<img src="{{asset('fe_theme/images/box_winxp_family_256-100x100.png')}}" />
<h5>Now Get The Complate Pack</h5></div>
</div></div></div></div>


<div class="container">
	  <div class="row">
		  <div class="col-md-12">
		
			  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
			   <h2>TESTIMONIALS</h2>
				  <!-- Carousel Slides / Quotes -->
				  <div class="carousel-inner text-center">
					  <!-- Quote 1 -->
					  

					 <?php foreach($testimonials as $key=>$val){?>
					  <div class="item <?php echo $key==0 ? 'active' : '' ?>">
					   
						  <blockquote>
							  <div class="row">
								  <div class="col-sm-8 col-sm-offset-2">
									  <p> <?php echo $val['details']?> </p>
									  <small><?php echo $val['title']?></small>
								  </div>
							  </div>
						  </blockquote>
					  </div>
					  <!-- Quote 2 -->
					 <?php } ?>


				


				  </div>
				  <!-- Bottom Carousel Indicators -->
				  <ol class="carousel-indicators">
					 
				  <?php foreach($testimonials as $key=>$val){?>
				  	<li data-target="#quote-carousel" data-slide-to="<?php echo $key?>" class="<?php echo $key==0 ? 'active' : '' ?>"><img class="img-responsive " src="{{asset('uploads/testimonials/'.$val->image)}}" alt="">
					  </li>
					  <?php } ?>
					


					  
				  </ol>

				  <!-- Carousel Buttons Next/Prev -->
				  <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
				  <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
			  </div>
		  </div>
	  </div>
	  
  </div>
  
  
  @endsection


  @section('javascript')
	<script src="{{asset('apps/login.js')}}"></script>
  @endsection