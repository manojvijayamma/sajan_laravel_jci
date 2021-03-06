<div class="row" style="margin:0px;">                
                   
                           
                            <!-- /.panel-heading -->
                            <div class="panel-body" style="padding-top:0px">
                          
                                <div class="table-responsive gridPanel"  id="grid-table">
                                    <table class="table table-striped table-bordered table-hover" style="margin:0px;padding:0px">
                                        <thead>
                                            <tr>
                                            <th class="col-sm-1" style="width:3%">#</th>
                                                <th class="col-sm-6">Title</th>
                                                
                                                <th class="col-sm-2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                        
                                        @foreach ($content as $key => $row)
                                        
                                                                        <tr class="list-users">
                                                                            <td>{{ ++$i }}</td>
                                                                            <td><div style="float:left;padding-left:0px"><input type="text" class="form-control priority" style="width:40px;" value="{{ $row->priority }}" name="priority" data-rowId="{{$row->id}}" data-url="<?php echo app('request')->input('controller') ?>"></div><div style="float:left;margin-top:5px;padding-left:5px;">{{ $row->title }}</div>                                                                            
                                                                                
                                                                            </td>    
                                                                            
                                                                            <td>
                                                                                
                                                                                <a class="btn <?php echo ($row->status!=1 ? 'btn-danger' : 'btn-success') ?> btn-sm" href="javascript:void(0)" onclick="loadData('<?php echo app('request')->input('controller') ?>','<?php echo $row->id?>/status?page=1','1','GET','list')"><i class="fa fa-check-circle fa-fw"></i> Status</a>
                                                                                <a  class="btn btn-primary btn-sm " href="javascript:void(0);"  onclick="loadData('<?php echo app('request')->input('controller');?>','<?php echo $row->id?>/edit','1','get','','')"    ><i class="fa fa-edit fa-fw"></i> Edit</a>
                                        
                                                                                
                                                                                <?php if($row->allow_to_delete==1){?>
                                                                                    <button type="button" id="delete-task-{{ $row->id }}" class="btn btn-danger btn-sm" onclick="doDelete('<?php echo $row->id?>')">
                                                                                        <i class="fa fa-btn fa-trash"></i> Delete
                                                                                    </button>
                                                                                <?php } ?>    
                                                                               
                                                                            </td>
                                                                            
                                                                          
                                                                        </tr>
                                                                        <?php                                                                         
                                                                        if(isset($row->childLevel1) && count($row->childLevel1)>0){
                                                                            foreach($row->childLevel1 as $sub){?>
                                                                                <tr class="list-users">
                                                                                    <td>{{ ++$i }}</td>
                                                                                    <td><div style="float:left;padding-left:50px"><input type="text" class="form-control priority" style="width:40px;" value="{{ $sub->priority }}" name="priority" data-rowId="{{$sub->id}}" data-url="<?php echo app('request')->input('controller') ?>"></div><div style="float:left;margin-top:5px;padding-left:5px;">{{ $sub->title }}</div>
                                                                                    </td>  
                                                                                                                                                      

                                                                                    <td>                                                                                
                                                                                        <a class="btn <?php echo ($sub->status!=1 ? 'btn-danger' : 'btn-success') ?> btn-sm" href="javascript:void(0)" onclick="loadData('<?php echo app('request')->input('controller') ?>','<?php echo $sub->id?>/status?page=1','1','GET','list')"><i class="fa fa-check-circle fa-fw"></i> Status</a>
                                                                                        <a  class="btn btn-primary btn-sm " href="javascript:void(0);" onclick="loadData('<?php echo app('request')->input('controller');?>','<?php echo $sub->id?>/edit','1','get','','')"    ><i class="fa fa-edit fa-fw"></i> Edit</a>
                                                
                                                                                        
                                                                                            <?php if($sub->allow_to_delete==1){?>
                                                                                            <button type="button" id="delete-task-{{ $sub->id }}" class="btn btn-danger btn-sm" onclick="doDelete('<?php echo $sub->id?>')">
                                                                                                <i class="fa fa-btn fa-trash"></i> Delete
                                                                                            </button>
                                                                                            <?php } ?>
                                                                                    
                                                                                    </td>                                                              
                                                                                    
                                                                                </tr>

                                                                                <?php                 
                                                                                if(isset($sub->childLevel2) && count($sub->childLevel2)){
                                                                                foreach($sub->childLevel2 as $sub2){?>
                                                                                    <tr class="list-users">
                                                                                        <td>{{ ++$i }}</td>
                                                                                        <td>                                                                               
                                                                                        <div style="float:left;padding-left:100px"><input type="text" class="form-control priority" style="width:40px;" value="{{ $sub2->priority }}" name="priority" data-rowId="{{$sub2->id}}" data-url="<?php echo app('request')->input('controller') ?>"></div><div style="float:left;margin-top:5px;padding-left:5px;">{{ $sub2->title }}</div>
                                                                                        </td>  

                                                                                        <td>                                                                                
                                                                                            <a class="btn <?php echo ($sub2->status!=1 ? 'btn-danger' : 'btn-success') ?> btn-sm" href="javascript:void(0)" onclick="loadData('<?php echo app('request')->input('controller') ?>','<?php echo $sub2->id?>/status?page=1','1','GET','list')"><i class="fa fa-check-circle fa-fw"></i> Status</a>
                                                                                            <a  class="btn btn-primary btn-sm " href="javascript:void(0);" onclick="loadData('<?php echo app('request')->input('controller');?>','<?php echo $sub2->id?>/edit','1','get','','')"   ><i class="fa fa-edit fa-fw"></i> Edit</a>
                                                    
                                                                                            
                                                    
                                                                                                <button type="button" id="delete-task-{{ $sub2->id }}" class="btn btn-danger btn-sm" onclick="doDelete('<?php echo $sub2->id?>')">
                                                                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                                                                </button>
                                                                                        
                                                                                        </td>                                                                
                                                                                        
                                                                                    </tr>
                                                                                <?php } 
                                                                            }
                                                                            ?>
                                                                            <?php } 
                                                                            ?>

                                                                            <?php
                                                                        }?>
                                                                    @endforeach
                                        </tbody>
                                    </table>
                                    {{ csrf_field() }}

                                   


                                </div>
                                <!-- /.table-responsive -->

                                

                            </div>
                           
                     
                    
                    
                </div>
               
                @include('admin.pagination')


<script>

gridHeight=$(window).height() - $('.navbar').height() - $('#page-header').height()-79;
$("#grid-table").css("height", gridHeight);
</script>

               


