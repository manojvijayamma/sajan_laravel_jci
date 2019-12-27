
<?php if($zoneData){
    foreach($zoneData as $val){?>
<div class="col-md-4">
    <div class="single-course">
        <a href="#"><img src="images/1.jpg" alt="" ></a>
        <div class="single-coures-text">
            <h3><a href="#"><?php echo $val->title?></a></h3>
            
            <!--<a href="#">READ MORE</a>-->
        </div>
    </div>
</div>
<?php }} ?>




