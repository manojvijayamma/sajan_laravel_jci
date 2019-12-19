<?php
$url=app('request')->input('controller');
$totalPages=ceil($content->total()/$content->perPage());
$prevPage=$content->currentPage()-1;
if($prevPage<1){
    $prevPage=1;
}
$nextPage=$content->currentPage()+1;
if($nextPage>$content->lastPage()){
    $nextPage=$content->lastPage();
}

$qryStr=isset($qryStr) ? $qryStr : '';
?>

<div class="row" style="margin:0px;padding:0px 5px" >
    <div class="col-lg-12 " style="padding:0px;" >
        <ul class="pagination pagination justify-content-end" style="padding:0px;margin:0px;">
                <li class="page-item "><a class="page-link " href="javascript:void(0)" onclick="loadData('<?php echo $url;?>','','1','get','list','','<?php echo $qryStr?>')"><img src="{{asset('admin_theme/images/page_first.gif')}}"></a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadData('<?php echo $url;?>','','<?php echo $prevPage?>','get','list','','<?php echo $qryStr?>')"><img src="{{asset('admin_theme/images/page_prev.gif')}}"></a></li>
                <?php
                for($p=1;$p<=$totalPages;$p++) { ?>
                    <li class="page-item <?php echo $p==$content->currentPage() ? 'active' : ''?>" ><a class="page-link" href="javascript:void(0)" onclick="loadData('<?php echo $url;?>','','<?php echo $p?>','get','list','','<?php echo $qryStr?>')">{{$p}}</a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadData('<?php echo $url;?>','','<?php echo $nextPage?>','get','list','','<?php echo $qryStr?>')"><img src="{{asset('admin_theme/images/page_next.gif')}}"></a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="loadData('<?php echo $url;?>','','<?php echo $content->lastPage()?>','get','list','','<?php echo $qryStr?>')"><img src="{{asset('admin_theme/images/page_last.gif')}}"></a></li>
        </ul>
    
        <ul class="pagination pagination pull-right" style="padding:10px 0px 0px 0px;margin:0px;">
                    <?php if($content->total()>0){?>    
                     <li class="page-item ">Showing <?php echo $content->firstItem() ?> to <?php echo $content->lastItem() ?> of <?php echo $content->total() ?></li>
                    <?php } else{?>    
                        <li class="page-item ">No data found</li>
                    <?php } ?>    
        </ul>
    </div>
</div>