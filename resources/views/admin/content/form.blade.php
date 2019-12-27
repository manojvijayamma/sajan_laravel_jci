
<form  id="form_save"  enctype="multipart/form-data">
{{ csrf_field() }}
@if ($content->id > 0)
    <input name="_method" type="hidden" value="PUT">
@endif 
 <div class="modal-header">
     <button type="button" class="close" onclick="closePopup('true')">×</button>
     <h4 class="modal-title"><i class="fa fa-table" style="font-size:20px;"></i>&nbsp;Content</h4>
 </div>
 <div class="modal-body">
             <div id="success_message">
                 
             </div>

          

             <div class="form-group">
                 <label for="name">
                     Title:</label>
                     <input class="form-control" type="text"  name="title" id="title"  value="{{$content->title}}"  required autofocus>

             </div> 


             <div class="form-group">
                <label for="inputLastname">Main menu hierarchy level</label>
                    <select class="form-control" id="parent_id" name="parent_id" required onchange="updateShowPanel(this.value)"> 
                    <option value="0">Parent Level</option>
                    @foreach ($items as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $content->parent_id == $cat->id ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                        <?php foreach($cat->childLevel1 as $sub){?>
                            <option value="{{$sub->id}}" {{ ( $content->parent_id == $sub->id ) ? ' selected' : '' }}>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$sub->title}}
                            </option>
                        <?php } ?>

                        <?php 
                        if(isset($sub->childLevel2)){
                        foreach($sub->childLevel2 as $sub2){?>
                            <option value="{{$sub2->id}}" {{ ( $content->parent_id == $sub2->id ) ? ' selected' : '' }}>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$sub2->title}}
                            </option>
                        <?php } }
                        ?>


                    @endforeach
                 </select>
             </div>             

            <?php if($content->is_widget==0){?>
             <div class="form-group" id="panel_show" style="display:{{($content->parent_id==0)  ? '' :'none'}}">
                <label for="inputLastname">Shown on</label>
                    <select class="form-control" id="position_id" name="position_id[]" required multiple="true" style="height:200px;"> 
                    <option value="">Select</option>
                    @foreach ($position as $cat)                        
                        <option value="{{$cat->id}}" {{ ( $cat->position_id>0 ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div>  


             

         
             <div class="form-group">
                <label for="inputLastname">Banner Image</label>
                <input type="file" name="image"  id="image" placeholder="">
                <?php if($content->image){?>
                    <img src="{{asset('uploads/content/'.$content->image)}}" style="width:70px;">
                <?php } ?>   

             </div>


             <div class="form-group">
             <label for="inputLastname">Type</label>    
                <label class="radio-inline"><input type="radio" name="link_type" value="C"  onclick="updatePanel('C')" {{($content->link_type=='C' ? 'checked' : '') }} >Content Page</label>
                <label class="radio-inline"><input type="radio" name="link_type" value="E"  onclick="updatePanel('E')"  {{($content->link_type=='E' ? 'checked' : '') }} >Link to external site</label>
                <label class="radio-inline"><input type="radio" name="link_type" value="S"  onclick="updatePanel('S')" {{($content->link_type=='S' ? 'checked' : '') }} >Link to internal sections</label> 
             </div>

             <?php } ?>
            
             <div class="form-group" id="panel_C" style="display:{{($content->link_type=='C' || $content->is_widget==1)  ? '' :'none'}}">
                <label for="inputFirstname">Details</label>
                <textarea name="details1" class="summernote">{{$content->details}}</textarea>
                <textarea id="details" name="details" style="display:none;" >{{$content->details}}</textarea>
             </div> 


             <div class="form-group">
                 <label for="name">
                     Short Description (For showing in home page ):</label>
                     <textarea class="form-control" type="text"  name="short_description" id="short_description"   >{{$content->short_description}}</textarea>

             </div>        


             <div class="form-group" id="panel_E" style="display:{{$content->link_type=='E'  ? '' :'none'}}">
                <label for="inputFirstname">External Url</label>
                <input class="form-control" type="text"  name="link_url" id="title"  value="{{$content->link_url}}"  required autofocus>
             </div> 

             <div class="form-group" id="panel_S" style="display:{{$content->link_type=='S'  ? '' :'none'}}">
                <label for="inputFirstname">Internal Section</label>
                <select class="form-control" name="section_url" required > 
                    <option value="">Section</option>
                    @foreach ($sections as $cat)                        
                        <option value="{{$cat->fe_url}}" {{ ( $content->section_url == $cat->fe_url ) ? ' selected' : '' }}>
                            {{$cat->title}}
                        </option>
                    @endforeach
                 </select>
             </div>   


              <div class="form-group">
                 <label for="name">
                     Seo Title:</label>
                     <input class="form-control" type="text"  name="seo_title" id="title"  value="{{$content->seo_title}}"  required autofocus>

             </div>   

             <div class="form-group">
                 <label for="name">
                     Seo Keywords:</label>
                     <textarea class="form-control"  name="seo_keywords" id="title"    required autofocus>{{$content->seo_keywords}}</textarea>

             </div>   

             <div class="form-group">
                 <label for="name">
                     Seo Description:</label>
                     <textarea class="form-control"  name="seo_description" id="title"    required autofocus>{{$content->seo_description}}</textarea>

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

function updateShowPanel(value){
    $('#panel_show').show();
    if(value>0){
        $('#panel_show').hide();
    }
}

function updatePanel(id){
    switch(id){
        case 'C':
            $('#panel_S').hide();
            $('#panel_E').hide();
            $('#panel_C').show();
        break;
        case 'E':
            $('#panel_S').hide();
            $('#panel_C').hide();
            $('#panel_E').show();
        break;
        case 'S':
            $('#panel_E').hide();
            $('#panel_C').hide();
            $('#panel_S').show();
        break;
    }
}
</script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({disableResizeEditor: true,height: 250,});
});
</script>    



             




