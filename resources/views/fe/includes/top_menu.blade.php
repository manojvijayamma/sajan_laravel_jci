<?php 
//$menuData=\App\Models\Content::find(1);
//print_R($menuData);exit;
?>
<?php 
if($topLevel1Menu){
?>
<ul>
    <?php   
        foreach($topLevel1Menu as $mMenu){
            $url=General::url($mMenu->slug_url, $mMenu->link_type);
    ?>        
        <li><a href="{{ url($url)}}"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $mMenu->title?></a></li>
        
    <?php 
        }
    ?>    
</ul>
<?php 
}
?>