@include('fe.includes.header')
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
            <div class="col-lg-4 subside">
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
       <h3 class="subhead"><?php echo $content->title?></h3>
       <br><br/><br/>
   
<!-- <div class="media-bodysub1">-->
           
             <div class="row gallery">
						 
						 <?php if($gallery){
							 foreach($gallery as $val){?>
								<div class="col-sm-3 gal1">
								<img src="uploads/gallery/<?php echo $val->image?>">
								</div>&nbsp;
						 <?php }} ?>

						 
						 

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