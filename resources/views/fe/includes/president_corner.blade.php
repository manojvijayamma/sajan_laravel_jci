<div class="row">
                    <div class="col-md-4 col-sm-7 col-xs-12 ">
                        <div class="countdown-all">
                        <img src="{{asset('uploads/president/'.$presidentData->image)}}">
                        <h4 align="center"><?php echo $presidentData->title ?></h4>
                        <h5 align="center"><?php echo $presidentData->sub_title ?></h5>
                       
                        
                            
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-5 col-xs-12">
                        <div class="register-from">
                            <div class="register-top">
                                <h3>NATIONAL PRESIDENT CORNER</h3>
                           
                            </div>
                            <p>
                            <?php echo nl2br($presidentData->short_description) ?>
                             </p>
                             <?php if($presidentData->details){?>
                                <div class="more"><a href="{{url('presidentcorner')}}">More</a></div>
                             <?php } ?>   
                            
                        </div>
                    </div>
                    <div class="np">
                    <img src="{{asset('uploads/president/'.$presidentData->logo)}}"></div>
                </div>