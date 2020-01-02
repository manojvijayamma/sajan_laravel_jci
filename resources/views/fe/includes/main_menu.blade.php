<?php
if($mainMenu){
?>    

                                    <ul>
                                     <?php 
                                     foreach($mainMenu as $mMenu){

                                        switch($mMenu->section_url){
                                        
                                                case 'team':
                                                    $teamData=DB::table('menus')->where('status', '1')->where('Category','T')->get();
                                                        if(isset($teamData) && count($teamData)>0){ 
                                            ?>   
                                                            <li><a href="javascript:void(0);"><?php echo $mMenu->title?> <i class="zmdi zmdi-caret-down"></i></a>
                                                                <ul>
                                                                    <?php foreach($teamData as $sMenu){?>
                                                                            <li><a href="{{ url('team/'.$sMenu->query_string)}}"> <?php echo $sMenu->title?></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                
                                                            </li>

                                            <?php      }  
                                                break;

                                                case 'event':
                                                    $teamData=DB::table('menus')->where('status', '1')->where('Category','E')->get();
                                                        if(isset($newsData) && count($teamData)>0){ 

                                                    ?>
                                                    <li><a href="javascript:void(0);"><?php echo $mMenu->title?> <i class="zmdi zmdi-caret-down"></i></a>
                                                                <ul>
                                                                    <?php foreach($newsData as $sMenu){?>
                                                                            <li><a href="{{ url('team/'.$sMenu->query_string)}}"> <?php echo $sMenu->title?></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                
                                                    </li> 
                                                    <?php  }  
                                                break; 

                                                default:
                                                    $subMenu=DB::table('contents')->where('contents.status', '1')->where('contents.parent_id', $mMenu->id)->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url')->get();                   
                                                    
                                                    if(isset($subMenu) && count($subMenu)>0){                                                        
                                                        ?>
                                                             <li><a href="javascript:void(0);"><?php echo $mMenu->title?></a><i class="zmdi zmdi-caret-down"></i>
                                                                <ul>
                                                                    <?php foreach($subMenu as $sMenu){
                                                                        $url=General::url($sMenu->slug_url, $sMenu->link_type);?>
                                                                        <li><a href="{{ url($url)}}"> <?php echo $sMenu->title?></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </li>
                                                        <?php
                                                    } 
                                                    else{
                                                        $url=General::url($mMenu->slug_url, $mMenu->link_type);
                                                        ?>
                                                            <li><a href="{{ url($url)}}"><?php echo $mMenu->title?></a>
                                                        <?php
                                                    }                

                                                break;
                                        
                                        
                                            } //switch

                                     } //for
                                     ?>
                                           
                                    </ul>

 <?php 
}
?>   