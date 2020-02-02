<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('fe.includes.seo')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      
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
                    <h1 class="uppercase">VIDEO</h1>
                    
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="upcoming-event-area pt-110 pb-70">
            <div class="container">
              
                <div class="row">
                    
                    <div class="vdo">



                    <?php if($listData){
                        foreach($listData as $val){?>

                  <div class="col-sm-4">
                  <div class="o-video">
  <iframe width="560" height="315" src="<?php echo $val->video_url?>" frameborder="0"
   allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 <h5><?php echo $val->title?></h5></div>
                 
                    <?php } }?>
                  
               

                  
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

</body>



</html>


@include('fe.includes.common_footer')
