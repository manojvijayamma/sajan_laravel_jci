                    
                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_NATCON_2018_PROMOTION])){
                    $url=General::url($widgetContents[WIDGET_NATCON_2018_PROMOTION]->slug_url, $widgetContents[WIDGET_NATCON_2018_PROMOTION]->link_type);?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-lecturers">
                            <div class="lecturers-img">
                                <a href="{{ url($url)}}"><img alt="" src="{{asset('uploads/content/'.$widgetContents[WIDGET_NATCON_2018_PROMOTION]->image)}}"></a>
                                <div class="img-title">
                                    <h3><?php echo $widgetContents[WIDGET_NATCON_2018_PROMOTION]->title?></h3>
                                   
                                </div>
                            </div>
                            <div class="lecturers-details">
                                <h3>Details</h3>
                                                         </div>
                        </div>
                    </div>
                    <?php } ?>



                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_SUSTAINABLE_DEVELOPMENT])){
                    $url=General::url($widgetContents[WIDGET_SUSTAINABLE_DEVELOPMENT]->slug_url, $widgetContents[WIDGET_SUSTAINABLE_DEVELOPMENT]->link_type);?>     
                    <div class="col-md-3 col-sm-6">
                        <div class="single-lecturers mrg-xs4">
                            <div class="lecturers-img">
                                <a href="{{ url($url)}}"><img alt="" src="{{asset('uploads/content/'.$widgetContents[WIDGET_SUSTAINABLE_DEVELOPMENT]->image)}}"></a>
                                <div class="img-title">
                                    <h3><?php echo $widgetContents[WIDGET_SUSTAINABLE_DEVELOPMENT]->title?></h3>
                                   
                                </div>
                            </div>
                            <div class="lecturers-details">
                                <h3>Details</h3>
                            
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_ONLINE_GD_MRF])){
                    $url=General::url($widgetContents[WIDGET_ONLINE_GD_MRF]->slug_url, $widgetContents[WIDGET_ONLINE_GD_MRF]->link_type);?>    
                    <div class="col-md-3 col-sm-6">
                        <div class="single-lecturers mrg-sm mrg-xs4">
                            <div class="lecturers-img">
                                <a href="{{ url($url)}}"><img alt="" src="{{asset('uploads/content/'.$widgetContents[WIDGET_ONLINE_GD_MRF]->image)}}"></a>
                                <div class="img-title">
                                    <h3><?php echo $widgetContents[WIDGET_ONLINE_GD_MRF]->title?></h3>
                                    
                                </div>
                            </div>
                            <div class="lecturers-details">
                                <h3>Details</h3>
                               
                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_FOOD_GRAIN_DISTRIBUTION])){
                    $url=General::url($widgetContents[WIDGET_FOOD_GRAIN_DISTRIBUTION]->slug_url, $widgetContents[WIDGET_FOOD_GRAIN_DISTRIBUTION]->link_type);?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-lecturers mrg-sm mrg-xs4">
                            <div class="lecturers-img">
                                <a href="{{ url($url)}}"><img alt="" src="{{asset('uploads/content/'.$widgetContents[WIDGET_FOOD_GRAIN_DISTRIBUTION]->image)}}"></a>
                                <div class="img-title">
                                    <h3><?php echo $widgetContents[WIDGET_FOOD_GRAIN_DISTRIBUTION]->title?></h3>
                                    
                                </div>
                            </div>
                            <div class="lecturers-details">
                                <h3>Details</h3>
                                                          </div>
                        </div>
                    </div>
                    <?php } ?>