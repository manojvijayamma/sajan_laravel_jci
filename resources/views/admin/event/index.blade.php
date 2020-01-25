<div class="row" id="page-header" >
        <div class="col-lg-12" style="padding:0px;">
            <h2 class="page-header" style="padding:0px;margin:28px 0px 8px 0px;border:0px;font-size:22px;color:#0a3984"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Event
                <div style="float:right">
                <a href="javascript:void(0);" onclick="loadData('<?php echo app('request')->input('controller') ?>','create','1','get','','','identifier=<?php echo app('request')->input('identifier') ?>')"      class="btn btn-sm btn-primary openPopup"><i class="fa fa-edit fa-fw"></i> Add New</a>
                    <a href="javascript:void(0);" onclick="loadData('<?php echo app('request')->input('controller') ?>','','1','get','list','','identifier=<?php echo app('request')->input('identifier') ?>')" class="btn btn-primary btn-sm"><i class="fa fa-table fa-fw"></i>List All</a>
                </div>
            </h2>
            
        </div>
        <!-- /.col-lg-12 -->
</div>
<div id="searchPanel" class="row searchPanel" >
<form id="form_search">
    <div class="col-sm-3"><input class="form-control form-control-sm" type="text"  name="title"  placeholder="Item Title"  required autofocus></div>
    
   
    <div class="col-sm-2"><button type="reset" class="btn  btn-primary" onclick="doSearch()"><i class="fa fa-btn fa-search"></i>&nbsp;Search</button></div>
</form>
</div>
<div id="list-wrapper">
    @include('admin.'.app('request')->input('controller').'.list')
<div>
               
