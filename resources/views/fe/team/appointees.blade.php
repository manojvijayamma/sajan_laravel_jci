<?php 
use App\Models\Menu;
use App\Models\Team;

$menuApp=Menu::where('parent_id','20')->get()->toArray();
if($menuApp){
    
        $committeeData=Menu::where('parent_id',$menuApp[0]['id'])->get();
   
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>jci india</title>
    <meta name="description" content="">
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
                                @include('fe.includes.main_menu')
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
                    <h1 class="uppercase"><?php echo $content['title']?></h1>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
               
               
            
               
              
             <div class="buttons">
  <a href="#" class="mnu" onclick="toggleVisibility('Menu1');"><?php echo $menuApp[0]['title']?></a>
  <a href="#" class="mnu1" onclick="toggleVisibility('Menu2');"><?php echo $menuApp[1]['title']?></a>
  
</div>
 
  <div id="Menu1">
  
<?php if($committeeData){
    foreach($committeeData as $commD){
        $teamData=Team::where('identifier',$commD->query_string)->get();?>
    <h3><?php echo $commD->title?></h3>
   <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 appin">
                      <div class="col-sm-6">

                                <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position==1){?>
                                            <div class="president">
                                                <img src="{{asset('uploads/team/'.$teamD->image)}}" style="width:150px">
                                                <h5><?php echo $teamD->title?></h5>
                                                <p><?php echo $teamD->designation_title?></p>
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
                                        <div class="col-sm-3 thir2">
                                                <img src="{{asset('uploads/team/'.$teamD->image)}}" style="width:150px">
                                                <h5><?php echo $teamD->title?></h5>
                                                <p><?php echo $teamD->designation_title?></p>
                                        </div>
                        <?php } } }?> 

                       


                     </div></div>
                     
                     </div>
                
<?php }} ?>

                
               
  
<!-- menu 1 -->

  <div id="Menu2" style="display: none;">
  
    <?php
        $teamData=Team::where('identifier',$menuApp[1]['query_string'])->get();?>
    ?>
    <div class="second">
                     <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                    
                     <?php if($teamData){
                                    foreach($teamData as $teamD){                                        
                                        if($teamD->position!=1){?>  
                                        <div class="col-sm-3 thir22">
                                        <img src="{{asset('uploads/team/'.$teamD->image)}}" style="width:150px">
                                        <h5><?php echo $teamD->title?></h5>
                                        <p><?php echo $teamD->designation_title?></p>
                                        </div>
                             <?php } } }?> 

                      
                     
                     
                     
                     </div></div>
                     </div>
  
  
  
  
  
  
  </div>
  <!-- menu2 -->
  




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
	var divs = ["Menu1", "Menu2", "Menu3", "Menu4"];
var visibleDivId = null;
function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    //visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
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