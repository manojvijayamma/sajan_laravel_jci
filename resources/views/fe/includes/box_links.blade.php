                    
                   
<?php


$boxItems = DB::table('contents')
->join('content_position_relations', 'contents.id', '=', 'content_position_relations.content_id')
->where('content_position_relations.position_id', '13')
->where('contents.status', '1')
->where('contents.parent_id',0)
->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url','contents.icon_image')
->orderBy('contents.priority','ASC')
->orderBy('contents.title','ASC')
->get();

?>
                   
                    <?php if(isset($boxItems)){
                        foreach($boxItems as $val){
                    $url=General::url($val->slug_url, $val->link_type, $val->link_url, $val->section_url);?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-lecturers">
                            <div class="lecturers-img">
                                <a href="{{ url($url)}}"><img alt="" src="{{asset('uploads/content/'.$val->icon_image)}}"></a>
                                <div class="img-title">
                                    <h3><?php echo $val->title?></h3>
                                   
                                </div>
                            </div>
                            <div class="lecturers-details">
                                <h3>Details</h3>
                                                         </div>
                        </div>
                    </div>
                    <?php } }?>





