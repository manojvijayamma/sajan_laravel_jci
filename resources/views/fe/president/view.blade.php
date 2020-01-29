<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>jci india</title>
    <meta name="description" content="">
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
    <link href="#" data-style="styles" rel="stylesheet">
    
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
                           <!-- <div class="header-top-info">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="zmdi zmdi-phone"></i>
                                        </a>
                                        +91 12345 67890 
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="zmdi zmdi-globe"></i>
                                           info@jciindia.com
                                        </a>
                                    </li>
                                </ul>
                            </div>-->
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
        <!-- mobile-menu-area end -->
        <!-- End of header area -->
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
                    <h1 class="uppercase">NPs Corner</h1>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
               
               





               
               <!--ajax -->
               
               <nav class="ajnav">
<ul class="ajpage">
  <li><a href="javascript:void(0);showTab('page1')">NP PROFILE</a>
  <li><a href="javascript:void(0);showTab('page2')">NP MESSAGE</a>
  <li><a href="javascript:void(0);showTab('page3')">NP ROUNDUP</a>
  <li><a href="javascript:void(0);showTab('page4')">NP SCHEDULE</a>
</ul>
</nav>
<div class="content">

  <div id="page1" class="tab_item" ><!-- page 1 -->
	<h3>PROFILE OF NATIONAL PRESIDENT</h3>
  
	<?php echo $presidentData->details; ?>

	
  </div><!-- /page1 -->
  
  <div id="page2" class="tab_item" style="display:none;" ><!-- page 2 -->
	<h3>MESSAGE OF NATIONAL PRESIDENT <?php echo date("Y")?> </h3>

	<?php echo $presidentData->message; ?>

  </div><!-- /page2 -->
  
  <div id="page3" class="tab_item" style="display:none;"><!-- page 3 -->
	<h3>NP OFFICIAL VISITS</h3>

	<p>Coming soon</p>

	

	
  </div><!-- /page3 -->

  <div id="page4" class="tab_item" style="display:none;"><!-- page 4 -->
	<h3>NP schedule</h3>

	<p>Coming soon</p>

	

	
	
  </div>




</div>
               
               
               
               
               
               <!--ajax end -->
                
                
                   
                
        <!-- End categoris area -->  
    
        
        
        
        
        
        
        
       </div>
   </div>
        <!-- End courses area -->   
        <!-- start courses area --> 
       
                                </div>
                             
                      
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End courses area -->
        
        <!-- start courses area --> 
    
        <!-- End courses area --> 
        
        <!-- End page content -->
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
  <div>
    <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
  </div>
  <div>
    <a href="#" class="fixed-twitter" target="_blank"><i class="fa fa-twitter"></i> <span>Twitter</span></a>
  </div>
  <div>
    <a href="#" class="fixed-gplus" target="_blank"><i class="fa fa-google"></i> <span>Google+</span></a>
  </div>
  <div>
    <!--<a href="#" class="fixed-linkedin" target="_blank"><i class="fa fa-linkedin"></i> <span>LinkedIn</span></a>
  </div>
  <div>-->
   
  <a href="#" class="fixed-instagrem" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
  </div>
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
    
    
    
    
    
    
    
    
    
    

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('fe_theme/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('fe_theme/js/bootstrap.min.js')}}"></script>
    <!--  ajax-mail.js  -->	
    <script src="{{ asset('fe_theme/js/ajax-mail.js')}}"></script>
    
    <script src="{{ asset('fe_theme/js/ajaxpage.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('fe_theme/js/plugins.js')}}"></script>
    <script src="{{ asset('fe_theme/js/main.js')}}"></script>

    <script>
    function showTab(id){
        
        $('.tab_item').hide();
        $('#'+id).show();
    }
    showTab('page1');
    </script>

</body>


<!-- Mirrored from demo.devitems.com/universe-preview/universe/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Dec 2018 11:55:40 GMT -->
</html>