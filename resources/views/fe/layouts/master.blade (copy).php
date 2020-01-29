<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training</title>
<link rel="stylesheet" href="{{ asset('fe_theme/assets/css/main.css')}}" />
<link rel="stylesheet" href="{{ asset('fe_theme/assets/css/media.css')}}" />
<link rel="stylesheet" href="{{ asset('fe_theme/assets/css/font-awesome.min.css')}}" />
<link href="{{ asset('admin_theme/css/toastr.min.css') }}" rel="stylesheet">
            <link href="{{ asset('admin_theme/css/sweetalert.css') }}" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="assets/css/font-awesome.min.css" />-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<!--<div id="header" style="background-image:url(images/header-background.jpg);" >-->
<div class="container">
<a href="{{ url('')}}"><img src="{{ asset('fe_theme/images/mstor_logo.jpg')}}"  class="logo"/></a>
</div>
<div class="navbar-header navbar-right date">
             </div>
						
                       <div class="top-links">
								            <ul class="links">
                                
                                            <?php if(isset($loggedUser->id)){?>
                                                <li class="my-account-link firstItem"><a href="{{url('dashboard')}}">Dashboard &nbsp;|</a></li>
	                    	                    <li class="logout-link lastItem"><a href="{{url('logout')}}"> &nbsp;Logout</a></li>
                                            <?php } else{?>    
	                    	                    <li class="my-account-link firstItem"><a href="{{url('login')}}">SIGN IN &nbsp;|</a></li>
	                    	                    <li class="logout-link lastItem"><a href="{{url('register')}}"> &nbsp;REGISTER</a></li>
                                            <?php } ?>
                                            </ul>
        							</div> 
                                   <div class="search">
                                   <img src="{{ asset('fe_theme/images/search.png')}}" /> <a href="{{url('cart')}}"><img src="{{ asset('fe_theme/images/shopping-bag.png')}}" /></a></div>
                        
                      
            

<div id="menu">

<nav id='cssmenu'>
<div id="head-mobile"></div>
<div class="button"></div>
        <ul>

        <?php 
        if($mainMenu){
            foreach($mainMenu as $mMenu){
        ?>

                            <?php 
                            $url=General::url($mMenu->slug_url, $mMenu->link_type);
                            
                            ?>
                            <li class='active'><a href="{{ url($url)}}"><?php echo $mMenu->title?></a>
                        
                            <?php 
                            if($mMenu->section_url=='course'){
                                    $subMenu=DB::table('categories')->where('status', '1')->get();
                                    if(isset($subMenu) && count($subMenu)>0){ ?>
                                    <ul>
                                        <?php foreach($subMenu as $sMenu){?>
                                        <li><a href='javascript:void(0);'><?php echo $sMenu->title?></a>
                                            <?php
                                                $subMenu2=DB::table('courses')->where('status', '1')->where('parent_id', $sMenu->id)->get();
                                            ?>
                                            <ul>
                                                <?php foreach($subMenu2 as $sMenu2){?>
                                                    
                                                <li><a href="{{ url('course/'.$sMenu2->slug_url)}}"><?php echo $sMenu2->title?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                        </ul>    
                           
                            <?php   }
                            } ?>    


                        </li>

        <?php } } ?>     
        </ul>


</nav>

					
</div>




@yield('content')




    <!-------FOOTER------>
    <DIV id="footer">
    <div class="container">
    <div class="flogo">
    <img src="{{ asset('fe_theme/images/trainers_logo.png')}}" />
    </div>
    <div class="row ff">
    <div class="col-sm-3">
    <?php if(isset($widgetContents) &&  isset($widgetContents[WIDGET_ABOUT_TRAINING_MATERIAL])){?>
        <h4 class="fabout"><?php echo $widgetContents[WIDGET_ABOUT_TRAINING_MATERIAL]->title?></h4>
        <p class="footer"><?php echo $widgetContents[WIDGET_ABOUT_TRAINING_MATERIAL]->details?></p>
    <?php } ?>
    </div>
    <div class="col-sm-2 foot2">
    <h4 class="f1">QUICK LINKS</h4>
    <ul class="foot">
    <?php if(isset($footerMenu)){
                    foreach($footerMenu as $key=>$val){?>	
                    <?php 
							$url=General::url($val->slug_url, $val->link_type);
							?>    
    <li><a href="{{ url($url)}}"><?php echo $val->title?></a></li>
    
     <?php  }}?></ul>
    </div>
    <div class="col-sm-4 foot3">
    <h4 class="fget">GET IN TOUCH</h4>
    <p>Training Material Online</p>
Email : support@trainingmaterialonline.com</p>
    </div>
    <div class="col-sm-3 cards">
    <h4 class="fsecure">SECURE SHOPPING</h4>
    <img src="{{ asset('fe_theme/images/payments.png')}}" />
    
						
    </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script  src="{{ asset('fe_theme/assets/js/script.js')}}"></script>


 <script src="{{ asset('admin_theme/js/toastr.min.js') }}"></script>
        <script src="{{ asset('admin_theme/js/sweetalert.min.js') }}"></script>

        <script src="{{ asset('apps/cart.js') }}"></script>
</body>
</html>

@yield('javascript')