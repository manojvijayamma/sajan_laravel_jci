
<?php if(isset($widgetContents) && isset($widgetContents[WIDGET_WHY_JCI_INDIA])){
    $url=General::url($widgetContents[WIDGET_WHY_JCI_INDIA]->slug_url, $widgetContents[WIDGET_WHY_JCI_INDIA]->link_type, $widgetContents[WIDGET_WHY_JCI_INDIA]->link_url, $widgetContents[WIDGET_WHY_JCI_INDIA]->section_url);?>
<div class="col-lg-3 col-md-6 col-sm-6" align="center">
                        <div class="single-categori mb-30">
                            <img src="{{asset('fe_theme/images/icons/c1.png')}}" alt="" >
                            <h3><a href="{{ url($url)}}"><?php echo $widgetContents[WIDGET_WHY_JCI_INDIA]->title?></a></h3>
                            <p><?php echo $widgetContents[WIDGET_WHY_JCI_INDIA]->short_description?></p>
                             <a href="{{ url($url)}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>



                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_FOUNDERS_PERSPECTIVE])){
                        $url=General::url($widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->slug_url, $widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->link_type, $widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->link_url, $widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->section_url);?>
                    <div class="col-lg-3 col-md-6 col-sm-6"align="center">
                        <div class="single-categori mb-30">
                            <img src="{{asset('fe_theme/images/icons/c2.png')}}" alt="" >
                            <h3><a href="{{ url($url)}}"><?php echo $widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->title?></a></h3>
                            <p><?php echo $widgetContents[WIDGET_FOUNDERS_PERSPECTIVE]->short_description?></p>
                            <a href="{{ url($url)}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>



                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_JCI_MISSION_VISION])){
                        $url=General::url($widgetContents[WIDGET_JCI_MISSION_VISION]->slug_url, $widgetContents[WIDGET_JCI_MISSION_VISION]->link_type , $widgetContents[WIDGET_JCI_MISSION_VISION]->link_url, $widgetContents[WIDGET_JCI_MISSION_VISION]->section_url);?>
                    <div class="col-lg-3 col-md-6 col-sm-6"align="center">
                        <div class="single-categori mb-30">
                            <img src="{{asset('fe_theme/images/icons/c3.png')}}" alt="" >
                            <h3><a href="{{ url($url)}}"><?php echo $widgetContents[WIDGET_JCI_MISSION_VISION]->title?></a></h3>
                            <p><?php echo $widgetContents[WIDGET_JCI_MISSION_VISION]->short_description?></p>
                            <a href="{{ url($url)}}"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>



                    <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_JCI_VALUES])){
                        $url=General::url($widgetContents[WIDGET_JCI_VALUES]->slug_url, $widgetContents[WIDGET_JCI_VALUES]->link_type, $widgetContents[WIDGET_JCI_VALUES]->link_url, $widgetContents[WIDGET_JCI_VALUES]->section_url);?>
                    <div class="col-lg-3 col-md-6 col-sm-6"align="center">
                        <div class="single-categori mb-30">
                            <img src="{{asset('fe_theme/images/icons/c4.png')}}" alt="" >
                            <h3><a href="{{ url($url)}}"><?php echo $widgetContents[WIDGET_JCI_VALUES]->title?></a></h3>
                            <p><?php echo $widgetContents[WIDGET_JCI_VALUES]->short_description?></p>
                            <a href="{{ url($url)}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>