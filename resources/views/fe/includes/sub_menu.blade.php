<?php 
//$menuData=\App\Models\Content::find(1);
//print_R($menuData);exit;
?>
<?php 
if($topLevel2Menu){
?>
<ul>
    <?php   
        foreach($topLevel2Menu as $key=>$mMenu){
            $url=General::url($mMenu->slug_url, $mMenu->link_type);
    ?>       
        
        <li><a href="{{ url($url)}}">
                <?php 
                if($key!=0){?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<font color="red">|</font>
                <?php } ?>
                <?php echo $mMenu->title?>   
        </a></li>
    <?php 
        }
    ?>    
</ul>
<?php 
}
?>



                                        
                                      
                                  