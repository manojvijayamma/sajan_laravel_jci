<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>JCI INDIA</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('admin_theme/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin_theme/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('admin_theme/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('admin_theme/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

         <!-- jQuery -->
         <script src="{{ asset('admin_theme/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin_theme/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin_theme/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin_theme/js/startmin.js') }}"></script>

      <style>
      /*    --------------------------------------------------
	:: Login Section
	-------------------------------------------------- */

.btn-custom {
    color: #fff;
	background-color: #22A7F0;
}
.login-panel{
    margin-top: 10%;
}

</style>
        
    </head>
    <body style='background-image: url("../admin_theme/images/2655-main-slider.jpg");background-position: 5% 10%;background-color:#19B5FE '>


<!--
    <section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1><img src="../images/logo.png"></h1>
                <h1>Log in with your email account</h1>
                <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                       
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                   
                    <hr>
        	    </div>
    		</div> 
    	</div> 
    </div> 
</section> -->

    

        <div class="container">
            
            <div class="row">
                <div style="padding:3%"></div>
                <div class="col-md-4 col-md-offset-4"><h1 style="text-align:center"><img src="{{ asset('admin_theme/images/logo.png')}}" style="width:250px"></h1>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>

                                    
                                    <input type="submit" name="btn" value="Login" class="btn btn-custom btn-lg btn-block">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

    </body>
</html>
