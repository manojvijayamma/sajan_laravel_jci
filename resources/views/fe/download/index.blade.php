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
                    <h1 class="uppercase"><?php echo $content['title']?></h1>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      Coming Soon
                       
                      <br>
                      
                      </div>
                
                
                   
                
        <!-- End categoris area -->  
    
        
        
        
        
        
        
        
       </div>
   </div>
        <!-- End courses area -->   
        <!-- start courses area --> 
       
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit  sed do <br>eiumod tempor incididunt ut labore et.  </p>
-->                  
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
        <div class="lecturers-area ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="section-title text-center mb-60">
                            <h1 class="uppercase">Our Lecturers</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do
                                <br>
                                eiumod tempor incididunt ut labore et.
                            </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="row"> 
                    
                @include('fe.includes.box_links')
                </div>

                
            </div>
        </div>
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
        @include('fe.includes.social_links')
</div>
        <!--<div class="event-area ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-55">
                            <h1 class="uppercase">LATEST NEWS</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit  sed do <br> eiumod tempor incididunt ut labore et. </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are">
                            <div class="news-img">
                                <img src="images/blog/8.jpg" alt="" >
                                <div class="news-date">
                                    <div class="blog-meta-2">
                                        <span class="published3">
                                            <i class="icofont icofont-ui-calendar"></i>
                                            14 Sep 2017
                                        </span>
                                    </div>
                                    <div class="blog-meta for-news">
                                        <span class="published3">
                                            <a href="#">
                                                <i class="icofont icofont-eye"></i> 34
                                            </a>
                                        </span>
                                        <span class="published4">
                                            <a href="#">
                                                <i class="icofont icofont-comment"></i> 20
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="img-text gray-bg">
                                <h3><a href="#">THE SECRETS OF ECONOMIC</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim  </p>
                                <a class="button extra-small" href="#">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are mrg-xs">
                            <div class="news-img">
                                <img src="images/blog/9.jpg" alt="" >
                                <div class="news-date">
                                    <div class="blog-meta-2">
                                        <span class="published3">
                                            <i class="icofont icofont-ui-calendar"></i>
                                            14 Sep 2017
                                        </span>
                                    </div>
                                    <div class="blog-meta for-news">
                                        <span class="published3">
                                            <a href="#">
                                                <i class="icofont icofont-eye"></i> 34
                                            </a>
                                        </span>
                                        <span class="published4">
                                            <a href="#">
                                                <i class="icofont icofont-comment"></i> 20
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="img-text gray-bg">
                                <h3><a href="#">THE SECRETS OF ECONOMIC</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim </p>
                                <a class="button extra-small" href="#">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-sm">
                        <div class="news-are mrg-xs">
                            <div class="news-img">
                                <img src="images/blog/10.jpg" alt="" >
                                <div class="news-date">
                                    <div class="blog-meta-2">
                                        <span class="published3">
                                            <i class="icofont icofont-ui-calendar"></i>
                                            14 Sep 2017
                                        </span>
                                    </div>
                                    <div class="blog-meta for-news">
                                        <span class="published3">
                                            <a href="#">
                                                <i class="icofont icofont-eye"></i> 34
                                            </a>
                                        </span>
                                        <span class="published4">
                                            <a href="#">
                                                <i class="icofont icofont-comment"></i> 20
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="img-text gray-bg">
                                <h3><a href="#">THE SECRETS OF ECONOMIC</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim </p>
                                <a class="button extra-small" href="#">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
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
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('fe_theme/js/plugins.js')}}"></script>
    <script src="{{ asset('fe_theme/js/main.js')}}"></script>

</body>


<!-- Mirrored from demo.devitems.com/universe-preview/universe/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Dec 2018 11:55:40 GMT -->
</html>