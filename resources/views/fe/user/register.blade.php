@extends('fe.layouts.master')

@section('content')










<div class="container">


<h1>Register</h1>

<div class="menu1">
<p class="menup1"><a href='index.html'>Home</a>/<a href="register.html">Register</a></p>
</div>

<div class="row">
<div class="col-sm-8">
<div class="createf">
<h3 class="create">Create Account</h3>


<form  action="{{url('register')}}" method="post" id="frm_register">
        {{ csrf_field() }}
        <input type="text" class="reg" placeholder="User Name" name="firstname" id="register_name"/>
        <input type="text" class="reg" placeholder="Email Id" name="email" id="register_email"/>
        <input type="text" class="reg" placeholder="Password" name="password" id="register_password"/>
        <input type="text" class="reg" placeholder="Re-Enter Password"  name="confirmpassword" id="register_cmpassword"/>
        </div>


        <div class="butt0 register_btn"><a href="#">REGISTER</a></div>
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
	<script src="{{asset('apps/register.js')}}"></script>
@endsection