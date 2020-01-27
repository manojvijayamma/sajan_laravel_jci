
<?php if($zoneData){
    foreach($zoneData as $val){?>
 <div class="col-md-4">
    <div class="single-course">
    <a href="{{route('event.details',['zoneevent',$val->slug_url])}}"><img src="{{asset('uploads/event/'.$val->image)}}" alt=""></a>
        <div class="single-coures-text">
            <h3><?php echo $val->zone?></h3>
            
            <!--<a href="#">READ MORE</a>-->
        </div>
    </div>
</div>
<?php }} ?>




