<?php 
use App\Models\Zone;
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('fe.includes.seo')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
<!--    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
-->    
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('fe_theme/css/bootstrap.min.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('fe_theme/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('fe_theme/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('fe_theme/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('fe_theme/css/responsive.css')}}">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{ asset('fe_theme/css/style-customizer.css')}}">
    <link rel="stylesheet"  href="{{ asset('fe_theme/css/lightslider.css')}}"/>
    
    <!-- Modernizr JS -->
    <script src="{{ asset('fe_theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>




</head>

<body>
 
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
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
        <!-- mobile-menu-area start -->
        
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
      
        <!-- Start of slider area -->
        <div class="slider-area">
            <div class="slider-active">
            @include('fe.includes.sub_banner')
                
               
            </div>
        </div>
        <!-- End of slider area --> 
        <div id="news">
	
    	<div id="head">
        <p>NEWS UPDATE</p>
        </div>
        <div id="content">
        <marquee>@include('fe.includes.news_update')</marquee>
        </div>
 
</div>
        <!-- start categoris area --> 
        <div class="categoris-area pb-80 pt-110">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h5 class="nwsd"><?php echo $content->title?></h2>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="upcoming-event-area pt-110 pb-70">
            <div class="container">
            @include('fe.includes.backbutton')
                <div class="row">
                    
                    <div class="nwsdetails">
                  <div class="col-sm-8">



                  <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    
                    <?php if(isset($galleryData) && count($galleryData)>0){?>
                         <li data-thumb="{{asset('uploads/event/'.$viewData->image)}}"> 
                            <img src="{{asset('uploads/event/'.$viewData->image)}}">
                         </li>
                         <?php foreach($galleryData as $val){?>
                            <li data-thumb="{{asset('uploads/eventgallery/'.$val->image)}}"> 
                                <img src="{{asset('uploads/eventgallery/'.$val->image)}}">
                            </li>
                         <?php } ?>

                    <?php }
                    else{
                        ?>
                        <img src="{{asset('uploads/event/'.$viewData->image)}}">
                        <?php
                    } ?>
                </ul>


                  
                  <h5><?php echo $viewData->title?></h5>

                  <?php
                  if($viewData->zone_id){
                      $ZoneData=Zone::find($viewData->zone_id);
                  ?>
                        <p>Zone: <?php echo $ZoneData->title?></p>
                    <?php 
                  }  
                  ?>


                  <?php
                  if($viewData->location){
                  ?>
                        <p>Location: <?php echo $viewData->location?></p>
                    <?php 
                  }  
                  ?>

                  <?php
                  if($viewData->event_date > '1970-01-01'){
                  ?>
                        <p>Date: <?php echo date("d-m-Y",strtotime($viewData->event_date))?>  <?php echo $viewData->time?> </p>
                    <?php 
                  }  
                  ?>

                 


                  <p><?php echo $viewData->details?></p>
                  
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
       
        
        
        
        <div id="fixed-social">
        @include('fe.includes.social_links')
</div>
       
        <!-- Start footer area -->
        @include('fe.includes.footer')
        <!-- End footer area -->
        <!-- start scrollUp
        ============================================ -->
        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>
        
        
        <!--style-customizer start -->
        
        <!--style-customizer end -->
    </div>
    <!-- Body main wrapper end -->
    
    
    
    
    
    
    
    
    <!-- jquery latest version -->
    <script src="{{ asset('fe_theme/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('fe_theme/js/bootstrap.min.js')}}"></script>
    <!--  ajax-mail.js  -->	
    <script src="{{ asset('fe_theme/js/ajax-mail.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('fe_theme/js/plugins.js')}}"></script>
    <script src="{{ asset('fe_theme/js/main.js')}}"></script>
    <script src="{{ asset('fe_theme/js/lightslider.js')}}"></script> 
</body>


<!-- Mirrored from demo.devitems.com/universe-preview/universe/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Dec 2018 11:55:40 GMT -->
</html>

<script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>

@include('fe.includes.common_footer')