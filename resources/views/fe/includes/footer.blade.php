<footer class="footer-area">
            <div class="footer-top ptb-110">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text footer-social">
                            <?php if(isset($widgetContents) && isset($widgetContents[WIDGET_CONTACT_US])){
                                $url=General::url($widgetContents[WIDGET_CONTACT_US]->slug_url, $widgetContents[WIDGET_CONTACT_US]->link_type, $widgetContents[WIDGET_CONTACT_US]->link_url, $widgetContents[WIDGET_CONTACT_US]->section_url);?>
                        
                                     <h3><?php echo $widgetContents[WIDGET_CONTACT_US]->title?></h3>
                                    <p><?php echo $widgetContents[WIDGET_CONTACT_US]->short_description?></p>
                                <?php }?> 
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="footer-text mrg-xs">
                                <h3>Quick Links</h3>
                                <?php if(isset($footerMenu)){
					                foreach($footerMenu as $key=>$val){
                                        $url=General::url($val->slug_url, $val->link_type);?>	
                                        <li class="col-md-2 col-sm-6"><a href="{{ url($url)}}"><?php echo $val->title?></a></li>
                                 <?php  }}?>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        <!--<div class="col-md-5 col-sm-6">
                            <div class="footer-text mrg-sm3 mrg-xs">
                               <h3>Enquiry</h3>
                               <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input placeholder="Name*" type="text">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="in-mrg" placeholder="Email*" type="email">
                                        </div>
                                        <div class="col-md-12">
                                            <textarea placeholder="Massage*"></textarea>
                                            <button class="submit" type="submit">send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-bottom-text ptb-20">
                                <p>
                                    Copyrights © <a href="#" target="_blank"> <?php echo date("Y")?> jci india | Designed by Spiderline</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>