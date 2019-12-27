<?php
if($programmeData){
    foreach($programmeData as $val){?>
<div class="single-testimonial">
                                <div class="test-img-name">
                                    <div class="test-img">
                                        <img src="{{asset('uploads/programe/'.$val->image)}}" alt="">
                                    </div>
                                    <div class="test-name">
                                        
                                        <p><?php echo $val->title?></p>
                                    </div>
                                </div>
                               
                            </div>
<?php } }?>
