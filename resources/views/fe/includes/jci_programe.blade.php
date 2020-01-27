<?php
if($programmeData){
    foreach($programmeData as $val){?>
            <a href="{{route('programs.view', $val->slug_url)}}"><div class="single-testimonial">
                                <div class="test-img-name">
                                    <div class="test-img">
                                        <img src="{{asset('uploads/programs/'.$val->image)}}" alt="">
                                    </div>
                                    <div class="test-name">
                                        
                                        <p><?php echo $val->title?></p>
                                    </div>
                                </div>
                               
                            </div>
                            </a>
<?php } }?>
