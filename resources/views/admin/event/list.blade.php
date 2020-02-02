
<div class="row" style="margin:0px;">                
                       
                           
                            <!-- /.panel-heading -->
                            <div class="panel-body" style="padding-top:0px">
                          
                                <div class="table-responsive gridPanel"  id="grid-table">
                                    <table class="table table-striped table-bordered table-hover" style="margin:0px;padding:0px">
                                        <thead>
                                            <tr>
                                            <th class="col-sm-1" style="width:3%">#</th>
                                                <th class="col-sm-8">Title</th>
                                                
                                                
                                                
                                               
                                                
                                                <th class="col-sm-4">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                        @foreach ($content as $key => $row)
                                        
                                                                        <tr class="list-users">
                                                                            <td>{{ ++$i }}</td>
                                                                            <td><div style="float:left;padding-left:0px"><input type="text" class="form-control priority" style="width:40px;" value="{{ $row->priority }}" name="priority" data-rowId="{{$row->id}}" data-url="<?php echo app('request')->input('controller') ?>"></div><div style="float:left;margin-top:5px;padding-left:5px;">{{ $row->title }}</div> </td>
                                                                           
                                                                                                                                                
                                                                            <td>
                                                                                
                                                                                <a class="btn <?php echo ($row->status!=1 ? 'btn-danger' : 'btn-success') ?> btn-sm" href="javascript:void(0)" onclick="loadData('<?php echo app('request')->input('controller') ?>','<?php echo $row->id?>/status?page=<?php echo $content->currentPage()?>','<?php echo $content->currentPage()?>','GET','list','', '&identifier=<?php echo app('request')->input('identifier') ?>')">Status</a>
                                                                                <a class="btn btn-primary btn-sm " href="javascript:void(0);" onclick="loadData('<?php echo app('request')->input('controller');?>','<?php echo $row->id?>/edit','1','get','','','identifier=<?php echo app('request')->input('identifier') ?>')"    ><i class="fa fa-edit fa-fw"></i> Edit</a>
                                                                                <?php if($moreImages>0){?>
                                                                                <a class="btn btn-info btn-sm " href="javascript:void(0);"  onclick="loadData('eventGallery','','1','get','index','Y','row_id=<?php echo $row->id ?>&identifier=<?php echo app('request')->input('identifier') ?>')"  ><i class="fa fa-edit fa-fw"></i> More Images</a>
                                                                                <?php } ?>
                                                                                <button type="button" id="delete-task-{{ $row->id }}" class="btn btn-danger btn-sm" onclick="doDelete('<?php echo $row->id?>')">
                                                                                        <i class="fa fa-btn fa-trash"></i> Delete
                                                                                    </button>
                                                                                
                                                                               
                                                                            </td>
                                                                        </tr>
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

gridHeight=$(window).height() - $('.navbar').height() - $('#page-header').height()-49;
$("#grid-table").css("height", gridHeight);
</script>

<script>
$(document).on('blur','.priority',function(event) { 
    var id=  $(this).attr('data-rowId');
    var priority=$(this).val();
    var _token = $("input[name='_token']").val();
    $.ajax({
        type: 'POST',        
        data: {
            id: id,
            _method: 'POST',
            _token :_token,
            priority:priority
        },
        url: "admin/event/priority",
        success: function (response) {
           
        } 
    });

});
</script>  

               


