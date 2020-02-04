
<form  id="form_save"  enctype="multipart/form-data">
<input name="identifier" type="hidden" value="{{app('request')->input('identifier')}}">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Teams</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div> 


              <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#info">Basic Info</a></li>                    
                    <li><a data-toggle="tab" href="#locations">More Details</a></li>
                </ul>
                <br>


                <div class="tab-content">
                        <div id="info" class="tab-pane fade in active">


             <div class="form-group">
                 <label for="name">
                     Name:</label>
                     <input class="form-control" type="text"  name="title" id="title"  value="{{$content->title}}"  required autofocus>

             </div>             

             <div class="form-group" id="panel_I" style="display:{{($content->type!='V' )  ? '' :'none'}}">
                <label for="inputLastname">  Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/team/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>


             <div class="form-group" id="panel_I" style="display:{{($content->type!='V' )  ? '' :'none'}}">
                <label for="inputLastname"> Large Image</label>
                <input type="file" name="large_image"  id="large_image" placeholder="">
                <?php if($content->large_image){?>
                    <img src="{{asset('uploads/team/'.$content->large_image)}}" style="width:70px;">
                <?php } ?>   

             </div>


             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Year</label>
                    <select class="form-control" id="year" name="year" required  > 
                    <option value="">Select</option>
                    @foreach ($years as $cat)                        
                        <option value="{{$cat}}" {{ ( $cat==$content->year ) ? ' selected' : '' }}>
                            {{$cat}}
                        </option>
                    @endforeach
                 </select>
             </div> 

             
             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Designation</label>
                    <select class="form-control" id="designation_id" name="designation_id" required  > 
                    <option value="">Select</option>
                    @foreach ($designations as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->id==$content->designation_id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div>

             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Zone</label>
                    <select class="form-control" id="zone_id" name="zone_id" required  > 
                    <option value="">Select</option>
                    @foreach ($zones as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->id==$content->zone_id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div> 


               

             <div class="form-group" id="panel_show" >
                <label for="inputLastname">Show At</label>
                    <select class="form-control" id="position" name="position" required  > 
                    
                    @foreach ($positions as $key=>$cat)                        
                        <option value="{{$key}}" {{ ( $key==$content->position ) ? ' selected' : '' }}>
                            {{$cat}}
                        </option>
                    @endforeach
                 </select>
             </div> 


            


</div>   
<!-- id=info -->   

<div id="locations" class="tab-pane fade">

            <div class="form-group">
                    <div class="col-sm-6">
                            <label for="name">
                                Previous Designation:</label>
                                <select class="form-control" id="previous_designation_id" name="previous_designation_id" required  > 
                                <option value="">Select</option>
                                @foreach ($designations as $cat)                        
                                    <option value="{{$cat->id}}" {{ ( $cat->id==$content->previous_designation_id ) ? ' selected' : '' }}>
                                        {{$cat->title}}
                                    </option>
                                @endforeach
                            </select>

                    </div>
                    <div class="col-sm-6">
                            <label for="name">
                                Lom:</label>
                                <input class="form-control" type="text"  name="lom" id="lom"  value="{{$content->lom}}"  required autofocus>

                    </div>

            </div>   
            

            

            <div class="form-group">
                <div class="col-sm-12">
                            <label for="name">
                                Address:</label>
                                <textarea class="form-control" type="text"  name="address" id="address"   required autofocus>{{$content->address}}</textarea>
                </div>    
            </div>   
            

            <div class="form-group">
                        <div class="col-sm-6">
                            <label for="name">
                                Contact No:</label>
                                <input class="form-control" type="text"  name="phone" id="phone"  value="{{$content->phone}}"  required autofocus>

                        </div>
                        <div class="col-sm-6">
                            <label for="name">
                                Email:</label>
                                <input class="form-control" type="text"  name="email" id="email"  value="{{$content->email}}"  required autofocus>

                        </div>
            
            </div>   
            
  
            

            <div class="form-group" >
                <div class="col-sm-12">
                    <label for="inputFirstname">Details</label>
                    <textarea name="details1" class="summernote">{{$content->details}}</textarea>
                    <textarea id="details" name="details" style="display:none;" >{{$content->details}}</textarea>
                </div>    
            
             </div> 

</div>
             

  

                 
 
    
 </div>

 <div class="modal-footer">
             <button type="button" class="btn btn-success"  id="btn_save" data-href="{{ url('admin/'.app('request')->input('controller').'/'.$content->id) }}" data-pkey="{{$content->id}}" data-reload="true"><i class="fa fa-save"></i> Save</button>
             <button type="reset" class="btn btn-danger" onclick="closePopup('true')" ><i class="fa fa-close"></i> Cancel</button>
 </div>

</form>



<script type="text/javascript">
function validateForm(){
    var title=$("#title").val(); 
  
    
    //convert to code
    $('#details').val($('.summernote').summernote('code'));

    if(title==""){
        errorMessage("Please Enter title");
        $("#title").focus();
        return false;
    }
     
    
 return true;
}


</script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({disableResizeEditor: true,height: 150,});
});

function updatePanel(id){
    switch(id){
        case '0':           
            $('#panel_sku').show();
            $('#panel_category').show();
            $('#panel_brand').show();
        break;
        default:
            $('#panel_sku').hide();
            $('#panel_category').hide();
            $('#panel_brand').hide();
        break;       
    }
}

</script>    



             




