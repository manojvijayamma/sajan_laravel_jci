
<?php if($upcomingEvents){
    foreach($upcomingEvents as  $val){?>

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
                                    <h3><a href="#">
<?php echo $val->title ?></a></h3>
                                    <p><?php echo $val->details ?></p>
                                </div>
                            </div>
                        </div>

<?php } }?>



