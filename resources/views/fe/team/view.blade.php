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
                                    <h3 style="color:#0096d5"><?php echo $viewData->title?></h3>
                            </div>
                            <div class="row">
                                
                                <div class="col-sm-6 pull-center">
                                    <img src="<?php echo $viewData->large_image!='' ?  asset('uploads/team/'.$viewData->large_image) : asset('fe_theme/images/no_image.png');?>" style="border:1px solid #0096d5;padding:10px;" class="img-responsive"><br>
                                   

                                </div>


                                <div class="col-sm-6">
                                        <?php if(isset($viewData->current_designation)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                                <b>DESIGNATION:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->current_designation?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>
                                        
                                        <?php if(isset($viewData->previous_designation)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                            <b>PREVIOUS:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->previous_designation?>
                                             </div>  
                                             
                                        </div>
                                        <?php } ?> 

                                        <?php if(isset($viewData->lom)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                            <b>LOM:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->lom?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>

                                        <?php if(isset($viewData->address)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                            <b>ADDRESS:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->address?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>

                                        <?php if(isset($viewData->phone)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                            <b> CONTACT NO:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->phone?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>

                                        <?php if(isset($viewData->email)){?>
                                        <div class="row"> 
                                            <div class="col-sm-4">
                                            <b>EMAIL:</b>
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo $viewData->email?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>

                                        

                                </div>
                            </div>


            </div>

            <?php if(isset($viewData->details)){?>    
                                        <div class="row">   
                                        <div class="col-sm-12">
                                            <b>JCI PROFILE:</b>
                                             </div>                                          
                                             <div class="col-sm-12">
                                                <?php echo $viewData->details?>
                                             </div>  
                                             
                                        </div> 
                                        <?php } ?>








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

</body>


<!-- Mirrored from demo.devitems.com/universe-preview/universe/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Dec 2018 11:55:40 GMT -->
</html>

@include('fe.includes.common_footer')