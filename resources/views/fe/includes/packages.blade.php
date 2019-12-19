<h3>ALL COURSE PACKAGES</h3>
<div id="right">
<?php if(isset($allCourses)){
		foreach($allCourses as $val){?>    
            <h4><a href="#"><?php echo $val['title']?></a></h4>
            <?php foreach($val['courses'] as $cor){?>	
                <p><a href="{{ url(SECTION_SLUG_COURSE.'/'.$cor['slug_url'])}}"> &nbsp;<?php echo $cor['title']?> </a></p>
            <?php } ?>
	<?php }} ?>
</div>