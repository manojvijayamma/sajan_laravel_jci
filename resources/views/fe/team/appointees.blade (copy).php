<?php 
use App\Models\Menu;
use App\Models\Team;


?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('fe.includes.seo')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  
   
    <link rel="stylesheet" href="{{ asset('fe_theme/css/bootstrap.min.css')}}">
   
    <link rel="stylesheet" href="{{ asset('fe_theme/css/core.css')}}">

    <link rel="stylesheet" href="{{ asset('fe_theme/css/shortcode/shortcodes.css')}}">
 
    <link rel="stylesheet" href="{{ asset('fe_theme/style.css')}}">
 
    <link rel="stylesheet" href="{{ asset('fe_theme/css/responsive.css')}}">
   
    <link rel="stylesheet" href="{{ asset('fe_theme/css/style-customizer.css')}}">
    
    
   
    <script src="{{ asset('fe_theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<style>


</style>
<body>
 
   
    <div class="wrapper">
       
        <header class="header-area">
            <div class="header-top blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 col-xs-12">
                          
                        </div>
                        <div class="col-md-6 col-sm-5 hidden-xs0">
                            <div class="header-top-right">
                                <div class="header-top-social f-right">
                                    
                                @include('fe.includes.top_menu')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="header-bottom stick-h2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <div class="logo">
                            @include('fe.includes.logo')
                            </div>
                        </div> 
                        
                        
                        <div class="col-md-6 col-sm-5 hidden-xs1">
                            <div class="header-top-right">
                                <div class="header-top-social f-right1">
                                    
                                @include('fe.includes.sub_menu')
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        
                        <div class="col-md-10 hidden-sm hidden-xs">
                            <div class="menu-area f-right">
                                <nav>
                                @include('fe.includes$menuApp=Menu::where('parent_id','20')->get()->toArray();
if($menuApp){
    
        $committeeData=Menu::where('parent_id',$menuApp[0]['id'])->get();
   
}.main_menu')
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
      
        
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                   
                        <div class="mobile-menu">
                            <nav id="dropdown">
                            @include('fe.includes.mobile_menu')
                            </nav>
                        </div>					
                    </div>
                </div>
            </div>
        </div>
      
        <div class="slider-area">
            <div class="slider-active">
            @include('fe.includes.sub_banner') 
               
            </div>
        </div>
       
        <div id="news">
	
    	<div id="head">
        <p>NEWS UPDATE</p>
        </div>
        <div id="content">
        <marquee> @include('fe.includes.news_update')</marquee>
        </div>
 
</div>
        
        <div class="categoris-area pb-80 pt-110">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h1 class="uppercase"><?php echo $content['title']?> <?php echo $year?></h1>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
               
                <?php if($history){?>
                <div class="row">
                @include('fe.includes.team_menu')
                </div>
                <?php } ?>
            
               
              
         
 
  
  
<?php 
        $teamData=Team::leftJoin('designations','designations.id','teams.designation_id')->select('teams.*','designations.title as designation_title')->where('teams.identifier',$commD->query_string)->where('teams.year',$year)->get();?>
    <h3><?php echo $commD->title?></h3>
   <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 appin">
                      <div class="col-sm-6">

                                <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position==1){?>
                                            <div class="president" style="background-image:url({{url('public/fe_theme/images/teambg.jpg')}})">
                                                <img src="<?php echo $teamD->image!='' ?  asset('uploads/team/'.$teamD->image) : asset('fe_theme/images/no_image.png');?>" style="width:150px">
                                                <a href="{{route('team.view',['id'=>$identifier,'vid'=>$teamD->id])}}"><h5><?php echo $teamD->title?></h5></a>
                                                <p><?php echo $teamD->designation_title?>
                                                
                                                <?php
                                                    if(isset($teamD->year) && ($showYear>0)){
                                                        echo $teamD->year;
                                                    }    
                                                ?>
                      </p>
                                            </div>
                                <?php } } }?> 

                      </div>
                     </div></div>
                     <div class="second">
                     <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    

                        <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position!=1){?>                        
                                        <div class="col-sm-3 thir2" style="background-image:url({{url('public/fe_theme/images/teambg.jpg')}})">
                                                <img src="<?php echo $teamD->image!='' ?  asset('uploads/team/'.$teamD->image) : asset('fe_theme/images/no_image.png');?>" style="width:150px">
                                                <a href="{{route('team.view',['id'=>$identifier,'vid'=>$teamD->id])}}"><h5><?php echo $teamD->title?></h5></a>
                                                <p><?php echo $teamD->designation_title?>
                                                <?php
                                                    if(isset($teamD->year) && ($showYear>0)){
                                                        echo $teamD->year;
                                                    }    
                                                ?>
                                                </p>
                                        </div>
                        <?php } } }?> 

                       


                     </div></div>
                     
                     </div>


























  
<?php 
        $teamData=Team::leftJoin('designations','designations.id','teams.designation_id')->select('teams.*','designations.title as designation_title')->where('teams.identifier',$commD->query_string)->where('teams.year',$year)->get();?>
    <h3><?php echo $commD->title?></h3>
   <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 appin">
                      <div class="col-sm-6">

                                <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position==1){?>
                                            <div class="president" style="background-image:url({{url('public/fe_theme/images/teambg.jpg')}})">
                                                <img src="<?php echo $teamD->image!='' ?  asset('uploads/team/'.$teamD->image) : asset('fe_theme/images/no_image.png');?>" style="width:150px">
                                                <a href="{{route('team.view',['id'=>$identifier,'vid'=>$teamD->id])}}"><h5><?php echo $teamD->title?></h5></a>
                                                <p><?php echo $teamD->designation_title?>
                                                
                                                <?php
                                                    if(isset($teamD->year) && ($showYear>0)){
                                                        echo $teamD->year;
                                                    }    
                                                ?>
                      </p>
                                            </div>
                                <?php } } }?> 

                      </div>
                     </div></div>
                     <div class="second">
                     <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    

                        <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position!=1){?>                        
                                        <div class="col-sm-3 thir2" style="background-image:url({{url('public/fe_theme/images/teambg.jpg')}})">
                                                <img src="<?php echo $teamD->image!='' ?  asset('uploads/team/'.$teamD->image) : asset('fe_theme/images/no_image.png');?>" style="width:150px">
                                                <a href="{{route('team.view',['id'=>$identifier,'vid'=>$teamD->id])}}"><h5><?php echo $teamD->title?></h5></a>
                                                <p><?php echo $teamD->designation_title?>
                                                <?php
                                                    if(isset($teamD->year) && ($showYear>0)){
                                                        echo $teamD->year;
                                                    }    
                                                ?>
                                                </p>
                                        </div>
                        <?php } } }?> 

                       


                     </div></div>
                     
                     </div>
                


                
                
  
<!-- menu 1 -->


  




</div>
               
               
               
               
             
    
        
        
        
        
        
        
        
       </div>
   </div>
       
       
                                </div>
                             
                      
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
       
        <div class="testimonial-area bg-10 bg-opacity bg-relative ptb-110">
            <div class="container">
                <div class="row">
                <h2 align="center" style="color:#fff;padding-bottom:20px;">JCI PROGRAMS</h2>
                    <div class="col-md-12">
                        <div class="testimonial-all slider-active2">
                            
                        @include('fe.includes.jci_programe')
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="fixed-social">
        @include('fe.includes.social_links')
</div>
     
      
        @include('fe.includes.footer')
      
        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>
        
        
      
    </div>
  
    
    
    
    <script>

function toggleVisibility(divId) {
   
  $('.tab_item').hide();
  $('#'+divId).show();
}

</script>
    
    
    
    
    

 
   
    <script src="{{ asset('fe_theme/js/vendor/jquery-1.12.0.min.js')}}"></script>
   
    <script src="{{ asset('fe_theme/js/bootstrap.min.js')}}"></script>
  
    <script src="{{ asset('fe_theme/js/ajax-mail.js')}}"></script>
    
    <script src="{{ asset('fe_theme/js/ajaxpage.js')}}"></script>
   
    <script src="{{ asset('fe_theme/js/plugins.js')}}"></script>
    <script src="{{ asset('fe_theme/js/main.js')}}"></script>

</body>



</html>

@include('fe.includes.common_footer')