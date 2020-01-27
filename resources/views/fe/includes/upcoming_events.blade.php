
<?php if($upcomingEvents){
    foreach($upcomingEvents as  $val){?>
    <a href="{{route('event.details',['upcoming_events',$val->slug_url])}}">
        <div class="col-md-6 col-sm-12">
                                    <div class="single-upcoming mb-40">
                                        <div class="upcoming-date text-center">
                                            <div class="date-all">
                                                <span><?php echo date("d",strtotime($val->event_date)) ?></span>
                                                <span class="month"><?php echo date("M",strtotime($val->event_date)) ?></span>
                                            </div>
                                        </div>
                                        <div class="single-upcoming-text">
                                            <!--<div class="blog-meta">
                                                <span class="published3">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    08 am to 12 pm
                                                </span>
                                                <span class="published4">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    T House GOA
                                                </span>
                                            </div>-->
                                            <h3>
        <?php echo $val->title ?></h3>
                                            <p><?php echo $val->short_description ?></p>
                                        </div>
                                    </div>
                                </div></a>

<?php } }?>



