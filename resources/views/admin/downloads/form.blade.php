
<form  id="form_save"  enctype="multipart/form-data">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup()">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Download</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>

          

             <div class="form-group">
                 <label for="name">
                     Title:</label>
                     <input class="form-control" type="text"  name="title" id="title"  value="{{$content->title}}"  required autofocus>

             </div>

             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Category</label>
                    <select class="form-control" id="category_id" name="parent_id" required  > 
                    <option value="">Select</option>
                    @foreach ($categories as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->id==$content->parent_id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div> 
             
             <div class="form-group">
             <label for="inputLastname">Image</label>
             <input type="file" name="image"  id="image" placeholder="Allowed Ips">
             <?php if($content->image){?>
                 <img src="{{asset('uploads/download/'.$content->image)}}" style="width:70px;">
             <?php } ?>   

             </div>
             
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="false" data-popup="1"><i class="fa fa-save"></i> Save</button>
             <button type="reset" class="btn btn-danger" onclick="closePopup()"><i class="fa fa-close"></i> Cancel</button>
 </div>

</form>



<script type="text/javascript">
function validateForm(){
    var title=$("#title").val();
    var position_id=$("#position_id").val();
    
    var image=$("#image").val();
    

     if(title==""){
         errorMessage("Please Enter title");
        $("#title").focus();
        return false;
     }

     if(position_id==""){
        errorMessage("Please select a position");
        $("#position_id").focus();
        return false;
     }

     

 return true;
}
</script>
    



             




