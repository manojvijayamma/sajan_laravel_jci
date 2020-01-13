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
            $url=General::url($mMenu->slug_url, $mMenu->link_type, $mMenu->link_url, $mMenu->section_url);
    ?>       
        
        <li><a href="{{ url($url)}}"><?php 
                if($key!=0){?><font color="red">|</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?><?php echo $mMenu->title?></a></li>
    <?php 
        }
    ?>    
</ul>
<?php 
}
?>



                                        
                                      
                                  