<br><br>
<style>
body {
    overflow:auto;
}
</style>

<?php if($adminMenuTeam){?>
<div class="row"  >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:28px 0px 8px 0px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Team
               
            </h2>            
        </div>       
</div>


<div class="row">
<?php
    foreach($adminMenuTeam as $val){?>
                <a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y')">
                    <div class="col-sm-2">
                        <div class="hero-widget well well-sm">
                            <div class="icon">
                                <img src="{{ asset('admin_theme/images/'.$val['icon'])}}" width="150px">
                            </div>
                            <div class="text">                                
                                <label class="text-muted"><?php echo $val['title']?></label>
                            </div>
                          
                        </div>
                    </div></a>
<?php }?>           
</div>
<?php } ?>




<?php if($adminMenuEvents){?>
<div class="row"  >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:28px 0px 8px 0px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Events
               
            </h2>            
        </div>       
</div>


<div class="row">
<?php
    foreach($adminMenuEvents as $val){?>
                <a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y')">
                    <div class="col-sm-2">
                        <div class="hero-widget well well-sm">
                            <div class="icon">
                                <img src="{{ asset('admin_theme/images/'.$val['icon'])}}" width="150px">
                            </div>
                            <div class="text">                                
                                <label class="text-muted"><?php echo $val['title']?></label>
                            </div>
                          
                        </div>
                    </div></a>
<?php }?>           
</div>
<?php } ?>




<?php if($adminMenuContent){?>
<div class="row"  >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:28px 0px 8px 0px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Content
               
            </h2>            
        </div>       
</div>


<div class="row">
<?php
    foreach($adminMenuContent as $val){?>
                <a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y')">
                    <div class="col-sm-2">
                        <div class="hero-widget well well-sm">
                            <div class="icon">
                                <img src="{{ asset('admin_theme/images/'.$val['icon'])}}" width="150px">
                            </div>
                            <div class="text">                                
                                <label class="text-muted"><?php echo $val['title']?></label>
                            </div>
                          
                        </div>
                    </div></a>
<?php }?>           
</div>
<?php } ?>




<?php if($adminMenuMaster){?>
<div class="row"  >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:28px 0px 8px 0px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Masters
               
            </h2>            
        </div>       
</div>


<div class="row">
<?php
    foreach($adminMenuMaster as $val){?>
                <a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y')">
                    <div class="col-sm-2">
                        <div class="hero-widget well well-sm">
                            <div class="icon">
                                <img src="{{ asset('admin_theme/images/'.$val['icon'])}}" width="150px">
                            </div>
                            <div class="text">                                
                                <label class="text-muted"><?php echo $val['title']?></label>
                            </div>
                          
                        </div>
                    </div></a>
<?php }?>           
</div>
<?php } ?>
