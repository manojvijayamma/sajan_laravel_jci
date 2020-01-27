<?php
if($mainMenu){
?>    

                                    <ul>
                                     <?php 
                                     foreach($mainMenu as $mMenu){

                                        switch($mMenu->section_url){
                                        
                                                case 'team1':
                                                    $teamData=DB::table('menus')->where('status', '1')->where('Category','T')->where('parent_id', '0')->get();
                                                        if(isset($teamData) && count($teamData)>0){ 
                                            ?>   
                                                            <li><a href="javascript:void(0);"><?php echo $mMenu->title?> <i class="zmdi zmdi-caret-down"></i></a>
                                                                <ul>
                                                                    <?php foreach($teamData as $sMenu){
                                                                            $subTeamData=DB::table('menus')->where('status', '1')->where('Category','T')->where('parent_id', $sMenu->id)->get();                                                                           
                                                                            ?>
                                                                            <li><a href="{{ url('team/'.$sMenu->query_string)}}"> <?php echo $sMenu->title?></a>
                                                                            <?php if(isset($subTeamData) && count($subTeamData)>0){ ?>
                                                                            <ul>
                                                                            <?php 
                                                                                foreach($subTeamData as $sMenu2){?>    
                                                                                <li><a href="{{ url('team/'.$sMenu2->query_string)}}"> <?php echo $sMenu2->title?></a>
                                                                            <?php } ?>
                                                                            </ul>
                                                                            <?php } ?>        
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                
                                                            </li>

                                            <?php      }  
                                                break;

                                                case 'event1':
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
                                                    $subMenu=DB::table('contents')->where('contents.status', '1')->where('contents.parent_id', $mMenu->id)->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')->get();                   
                                                    
                                                    if(isset($subMenu) && count($subMenu)>0){                                                        
                                                        ?>
                                                             <li><a href="javascript:void(0);"><?php echo $mMenu->title?></a><i class="zmdi zmdi-caret-down"></i>
                                                                <ul>
                                                                    <?php foreach($subMenu as $sMenu){
                                                                        $url=General::url($sMenu->slug_url, $sMenu->link_type, $sMenu->link_url, $sMenu->section_url);                                                                        
                                                                        $subMenu2=DB::table('contents')->where('contents.status', '1')->where('contents.parent_id', $sMenu->id)->select('contents.id','contents.title','contents.link_type','contents.slug_url','contents.section_url','contents.link_url')->get();                   
                                                                        if($subMenu2 && isset($subMenu2) && count($subMenu2)>0){
                                                                        ?>
                                                                        <li><a href="{{ url($url)}}"> <?php echo $sMenu->title?></a>
                                                                            <ul>
                                                                                <?php 
                                                                                    foreach($subMenu2 as $sMenu2){
                                                                                        $url=General::url($sMenu2->slug_url, $sMenu2->link_type, $sMenu2->link_url , $sMenu2->section_url);  ?>    
                                                                                    <li><a href="{{ url($url)}}"> <?php echo $sMenu2->title?></a>
                                                                                <?php } ?>
                                                                            </ul>
                                                                        </li>
                                                                    <?php 
                                                                        }
                                                                        else{?>
                                                                        <li><a href="{{ url($url)}}"> <?php echo $sMenu->title?></a></li>
                                                                        <?php 
                                                                        }
                                                                } ?>
                                                                </ul>
                                                            </li>
                                                        <?php
                                                    } 
                                                    else{
                                                        $url=General::url($mMenu->slug_url, $mMenu->link_type, $mMenu->link_url, $mMenu->section_url);
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