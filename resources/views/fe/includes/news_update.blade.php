<?php if($newsUpdates){
    foreach($newsUpdates as $val){?>
        <p> <a href="{{route('news.view',$val->slug_url)}}"><?php echo $val['title']?>...</a</p>
<?php } }?>