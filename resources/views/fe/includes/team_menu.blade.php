<style>
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus{
  background-color: #d9534f;
  color:#fff;
}
</style>
<?php
$menuData=array(
    array('id'=>'national-governing-board','title'=>'National Governing Board','submenu'=>1,'items'=>
          array(
            array('id'=>'national-executive-committee','title'=>'National Executive Committee'),
            array('id'=>'national-directors','title'=>'National Directors'),
            array('id'=>'zone-presidents','title'=>'Zone Presidents')
          )       
    ),
    array('id'=>'national-appointees','title'=>'National Appointees','submenu'=>0),
    array('id'=>'national-head-quarter','title'=>'National Head Quarter','submenu'=>0),
    array('id'=>'zone-governing-board','title'=>'Zone Governing Board','submenu'=>0),
    array('id'=>'past-national-presidents','title'=>'Past National Presidents','submenu'=>0),
    array('id'=>'international-corner','title'=>'International Corner','submenu'=>0),
);
?>

<div id="navbar">    
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
            
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                    
                    <?php 
                    
                    foreach($menuData as $val){?>
                    <li class="dropdown <?php echo ($activeTab==$val['id'] ? 'active' : '' )?>" >
                    <a href="{{url('team/history/'.$year.'?t='.$val['id'])}}" class="dropdown-toggle" <?php if($val['submenu']==1){?>data-toggle="dropdown"<?php } ?>><?php echo $val['title']?> <?php if($val['submenu']==1){?><b class="caret"></b><?php } ?></a> 
                      
                        <ul class="dropdown-menu">
                          <?php if(isset($val['items'])){
                            foreach($val['items'] as $sub){?>
                          <li class="kopie"><a href="{{url('team/history/'.$year.'?t='.$sub['id'])}}"><?php echo $sub['title']?></a></li>
                          <?php }} ?>  
                          
                                               
                        </ul>
                    </li>
                    <?php } ?>
                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>