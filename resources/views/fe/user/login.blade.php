@extends('fe.layouts.master')

@section('content')










<div class="container">


<h1>Login</h1>

<div class="menu1">
<p class="menup1"><a href='index.html'>Home</a>/<a href="#">Login</a></p>
</div>

<div class="row">
<div class="col-sm-8">
<div class="createf">



<form  action="{{url('login')}}" method="post" id="frm_login">
        <input type="hidden" name="redirect_url" value="dashboard">
		{{ csrf_field() }}
        
        <input type="text" class="reg" placeholder="Email Id" name="email" id="login_email"/>
        <input type="text" class="reg" placeholder="Password" name="password" id="login_password"/>
        
        </div>


        <div class="butt0 login_btn" ><a href="#">Login</a></div>
</form>
</div>

<div class="col-sm-4">
<div id="right">
@include('fe.includes.packages')

</div>

</div>

</div>
<!--right content-->


  

<!--end-->
</div>
<!--shipping-->

 <!--content-->
   















 <!--end-->
 
 </div>
</div>

<!--end-->

</div>
            

         
</div>
</div>

</div>

</div>
</div>




@endsection

@section('javascript')
	<script src="{{asset('apps/login.js')}}"></script>
@endsection