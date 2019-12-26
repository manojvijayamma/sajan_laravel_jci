<?php
if($mainBanners){
    foreach($mainBanners as $val){
?>    
<div class="slider-all">
            <img src="{{asset('uploads/banner/'.$val['image'])}}" alt="">
            <div class="slider-text-wrapper">
                <div class="table">
                    <div class="table-cell">
                        <div class="slider-text animated">
                            
                            <!-- <h2>BE BETTER</h2> -->
                            <p><?php echo $val['title']?> </p>
                            <?php if(isset($val['link_url'])){?>
                            <a class="button extra-small mb-20" href="<?php echo $val['link_url']?>">
                                <span>READ MORE</span>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php 
    }
} 
?>