@extends('fe.layouts.master')

@section('content')

<div class="container">
<h1><?php echo $content['title']?></h1>

<div class="menu1">
<p class="menup"><a href='{{url('')}}'>Home</a>/<a href="#"><?php echo $content['title']?></a></p>
</div>
<div class="row">
<div class="col-sm-6">
<div class="bot">
<?php echo $content['details']?>



</div>







</div>

<div class="col-sm-6 right">
@include('fe.includes.packages')
</div>


</div>




</div>


@endsection