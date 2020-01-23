<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>JCI INDIA</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('admin_theme/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin_theme/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('admin_theme/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('admin_theme/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('admin_theme/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('admin_theme/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    

            <link href="{{ asset('admin_theme/css/toastr.min.css') }}" rel="stylesheet">
            <link href="{{ asset('admin_theme/css/sweetalert.css') }}" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

       
        <script src="{{ asset('admin_theme/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin_theme/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin_theme/js/metisMenu.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{ asset('admin_theme/js/raphael.min.js') }}"></script>
        <script src="{{ asset('admin_theme/js/morris.min.js') }}"></script>
        <script src=".{{ asset('admin_theme/js/morris-data.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin_theme/js/startmin.js') }}"></script>
        <script src="{{ asset('admin_theme/js/toastr.min.js') }}"></script>
        <script src="{{ asset('admin_theme/js/sweetalert.min.js') }}"></script>

    </head>
    <body>
    

    <style>

body {
    overflow:hidden;
}
    #overlay {
        background: #000;
        color: #666666;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 25%;
        opacity:0.4
    }



/* Modal Content/Box */
.modal-content {
    
    margin: 2% auto; /* 15% from the top and centered */
    border-radius:0px;
}

.modal-header{
    background-color:#22A7F0;
    color:#fff;
}

#page-wrapper{
    margin-left: 0px;
}
.panel-body{
    padding:0px;
}

.navbar-inverse{
    background-color:#19B5FE; /*00979d | 1b75bc*/
    border:1px solid #19B5FE;
    color:#fff !important;
}
.navbar-inverse .navbar-brand{
    color:#ffffff;
}

.navbar-inverse .navbar-nav > li > a{
    color:#ffffff;
}

#list-wrapper{
    border:1px solid #92b8f4;
    padding:0px;
    margin:0px -15px;
}
.dropdown:hover .dropdown-menu {display: block;padding-top:0px;margin-top:0px;z-index:999999}
.dropdown-menu .divider{
    margin:0px;
}
.navbar-top-links .dropdown-menu li a{
    padding:10px;
}
.navbar-top-links .dropdown-menu li a:hover{
    background-color:#22A7F0;
}
.searchPanel{
    background-color:#59ABE3;padding:10px;
}

.gridPanel{
    overflow-y: scroll;background-color:#fff;border-bottom:1px solid #65bbbf;
}

.close{
    font-size:30px;
   
}

</style>
<div id="overlay" style="display:none;" >
    <img src="{{ asset('admin_theme/images/loader.gif') }}" alt="Loading" /><br/>
   
</div>


        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin" style="padding-top:2px;"><img src="{{ asset('admin_theme/images/logo.png')}}" style="height:45px"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                

                <ul class="nav navbar-right navbar-top-links">
                    <!--<li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                    <li class="dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff">
                            <i class="fa fa-user fa-fw"></i> <?php echo $loggedUser ?> <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-user">
                           
                            <li><a href="javascript:void(0);" data-size="" data-href="{{route('adminuser.profile',array('controller'=>'adminuser'))}}" class=" openPopup"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);" data-size="" data-href="{{route('adminuser.password',array('controller'=>'adminuser'))}}" class=" openPopup"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right navbar-top-links">
               
                    

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Teams <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-user">
                        
                        <?php if($adminMenuTeam){
                            foreach($adminMenuTeam as $val){?>
                            <li><a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y', 'identifier=<?php echo $val['query_string']?>')"><i class="fa fa-user fa-fw"></i><?php echo $val['title']?></a>
                            </li>
                            <li class="divider"></li>
                        <?php } }?> 
                           
                        </ul>
                        
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Events <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-user">
                        
                        <?php if($adminMenuEvents){
                            foreach($adminMenuEvents as $val){?>
                            <li><a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y', 'identifier=<?php echo $val['query_string']?>')"><i class="fa fa-user fa-fw"></i><?php echo $val['title']?></a>
                            </li>
                            <li class="divider"></li>
                        <?php } }?> 
                           
                        </ul>
                        
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Content <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-user">
                        
                        <?php if($adminMenuContent){
                            foreach($adminMenuContent as $val){?>
                            <li><a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y', 'identifier=<?php echo $val['query_string']?>')"><i class="fa fa-user fa-fw"></i><?php echo $val['title']?></a>
                            </li>
                            <li class="divider"></li>
                        <?php } }?> 
                           
                        </ul>
                        
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Masters <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-user">
                        
                        <?php if($adminMenuMaster){
                            foreach($adminMenuMaster as $val){?>
                            <li><a href="javascript:void(0);" onclick="loadData('<?php echo $val['admin_url']?>','','1','get','index','Y', 'identifier=<?php echo $val['query_string']?>')"><i class="fa fa-user fa-fw"></i><?php echo $val['title']?></a>
                            </li>
                            <li class="divider"></li>
                        <?php } }?> 
                           
                        </ul>
                        
                    </li>

                    <!--<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i> Language <b class="caret"></b>
                                </a>
                        
                                <ul class="dropdown-menu dropdown-user">
                                
                                                            <li><a href="javascript:void(0);" onclick="loadData('english','','1','get','index','Y','category=questions')"><i class="fa fa-user fa-fw"></i>Angular</a>
                                                            </li>
                                                            <li class="divider"></li>


                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=ionic')"><i class="fa fa-user fa-fw"></i>Ionic</a>
                                                            </li>
                                                            <li class="divider"></li>

                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=java')"><i class="fa fa-user fa-fw"></i>Java</a>
                                                            </li>
                                                        
                                                            <li class="divider"></li>
                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=laravel')"><i class="fa fa-dribbble fa-fw"></i> Laravel</a>
                                                            </li>

                                                            <li class="divider"></li>
                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=linux')"><i class="fa fa-dribbble fa-fw"></i> Linux</a>
                                                            </li>

                                                            <li class="divider"></li>


                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=php')"><i class="fa fa-gear fa-fw"></i> Php</a>
                                        </li>

                                </ul>

                    </li>  



                    
                    <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i> Eismann <b class="caret"></b>
                                </a>
                        
                                <ul class="dropdown-menu dropdown-user">
                                
                                                            <li><a href="javascript:void(0);" onclick="loadData('eismann','','1','get','index','Y','category=debugging')"><i class="fa fa-user fa-fw"></i>Debugging</a>
                                                            </li>
                                                            <li class="divider"></li>


                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=ionic')"><i class="fa fa-user fa-fw"></i>Ionic</a>
                                                            </li>
                                                            <li class="divider"></li>

                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=java')"><i class="fa fa-user fa-fw"></i>Java</a>
                                                            </li>
                                                        
                                                            <li class="divider"></li>
                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=laravel')"><i class="fa fa-dribbble fa-fw"></i> Laravel</a>
                                                            </li>

                                                            <li class="divider"></li>
                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=linux')"><i class="fa fa-dribbble fa-fw"></i> Linux</a>
                                                            </li>

                                                            <li class="divider"></li>


                                                            <li><a href="javascript:void(0);" onclick="loadData('blog','','1','get','index','Y','category=php')"><i class="fa fa-gear fa-fw"></i> Php</a>
                                        </li>

                                </ul>

                    </li>  



                    <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i> Resume <b class="caret"></b>
                                </a>
                        
                                <ul class="dropdown-menu dropdown-user">
                                
                                                            <li><a href="javascript:void(0);" onclick="loadData('experience','','1','get','index','Y','')"><i class="fa fa-user fa-fw"></i>Experience</a>
                                                            </li>
                                                            <li class="divider"></li>


                                                            <li><a href="javascript:void(0);" onclick="loadData('skill','','1','get','index','Y','')"><i class="fa fa-user fa-fw"></i>Skills</a>
                                                            </li>
                                                            <li class="divider"></li>

                                                            <li><a href="javascript:void(0);" onclick="loadData('project','','1','get','index','Y','')"><i class="fa fa-user fa-fw"></i>Projects</a>
                                                            </li>
                                                        
                                                            <li class="divider"></li>
                                                            <li><a href="javascript:void(0);" onclick="loadData('product','','1','get','index','Y','')"><i class="fa fa-dribbble fa-fw"></i>Products</a>
                                                            </li>

       

                                </ul>

                    </li>  

                    -->

                    
                    

                    
                </ul>
               
                <!-- /.navbar-top-links -->

                
            </nav>

            <div id="page-wrapper" >
        
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->


    </body>
</html>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('.datepicker').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });
        </script>

<script>
$(document).ready(function() {
 // $('.summernote').summernote();
});
</script>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Popup</h4>
            </div>
            <div class="modal-body">
                Something Wrong
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>




<script>
$(document).ready(function(){
    

/*
    toastr.success('This Is Success Message','bottom Right',{
        timeOut: 5000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false

    });


swal({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this imaginary file !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No, cancel it !!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                swal("Deleted !!", "Hey, your imaginary file has been deleted !!", "success");
            }
            else {
                swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error");
            }
        });
*/
    $('.openPopup').on('click',function(){
       
        $('#overlay').show();
        var dataURL = $(this).attr('data-href');
        $('.modal-content').load(dataURL,function(){
           $('#myModal').modal({
               show:true,
               backdrop: 'static',
               keyboard: false
             });           
        });
    });
       
});


$("#myModal").on('shown.bs.modal', function(event){
        $('#overlay').hide();
}); 


var modalSize;
$(document).on('click','.openPopup',function(e) {        
        var dataURL = $(this).attr('data-href');
        modalSize = $(this).attr('data-size');
       // alert(dataURL);
        
        loadPopupContent(dataURL,modalSize);
});


function loadPopupContent(dataURL,modalSize){

    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').addClass(modalSize);

    $('#overlay').show();
    $('.modal-content').load(dataURL,function(){
           $('#myModal').modal({
               show:true,
               backdrop: 'static',
               keyboard: false
             });           
        });
}

	

</script>


<script>

function getUrlParameter() {
    var hash = window.location.hash.substr(1);
    var urlParam={};
    var arr=hash.split('&');
    $.each( arr, function( key, value ) {
        f=value.split('=');        
        urlParam[f[0]]=f[1];
    });
    
    return urlParam;
};

function setHashValue(controller, pageNo, qryStr=''){
    var hashUrl = "c="+controller+'&p='+pageNo;
    if(qryStr){
        hashUrl+="&"+qryStr;
    }
    window.location.hash=hashUrl;
}

function loadData(controller,action,pageNo,method,wraper,setHash="Y",qryStr=''){ 
    
    $('#overlay').show(); 
    if(setHash=='Y'){   
        setHashValue(controller, pageNo, qryStr);
    }    
    var container="page-wrapper";
    if(wraper=='list'){
        container="list-wrapper";
    }

    url="admin/"+controller;
    if(action){
        url+="/"+action;
    }
    if(qryStr){
        url+="?"+qryStr;
    }

    $.ajax({
        url: url,
        data: { 
            "ajax": wraper, 
            "page": pageNo, 
            "controller":controller
            
        },
        cache: false,
        type: method,
        success: function(response) {
            $("#"+container).html(response);
            $('#overlay').hide();
        },
        error: function(xhr) {

        }
    });

}


function doDelete(id){

    swal({
        title: "Are you sure to delete this record ?",
        text: "Your will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,        
    },
    function(isConfirm){
        if (isConfirm) {
           
            
                            var qryStr=getUrlParameter();
                            var _token = $("input[name='_token']").val();
                            
                            $.ajax({
                                type: 'POST',        
                                data: {
                                    id: id,
                                    _method: 'DELETE',
                                    _token :_token,
                                    page:qryStr['p'],
                                    ajax:'list',
                                    controller:qryStr['c'],
                                    identifier:qryStr['identifier'],

                                },
                                url: "admin/"+qryStr['c']+"/"+id,
                                success: function (response) {
                                    $("#list-wrapper").html(response);
                                    successMessage('Successfully deleted');
                                   // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                } 
                            });


        }
        
    });


    
}


var qryStr=getUrlParameter();
qryStr['a']="";
if(qryStr['c']==undefined){
    qryStr['c']="admin";
    qryStr['a']="welcome";
}
if(qryStr['c']!=undefined){
    loadData(qryStr['c'],qryStr['a'],qryStr['p'],'GET','index','N',window.location.hash.substr(1));
}

    
if(qryStr['success']==1){
    successMessage('Successfully saved');    
} 
if(qryStr['popup']==1){
    modalSize=qryStr['size'];
    loadPopupContent('admin/'+qryStr['c']+'/create?controller='+qryStr['c']+'&'+window.location.hash.substr(1),modalSize);
}

function successMessage(msg){

    toastr.success(msg,{
        timeOut: 3000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    });
}

function errorMessage(msg){
    toastr.error(msg,{
        timeOut: 3000,
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false

    });
}



function closePopup(pageReload){  
    
    if(pageReload=='true'){    
        window.location.hash = window.location.hash.replace('&popup=1','');
         window.location.hash = window.location.hash.replace('&success=1','');    
        location.reload(); 
    }
    else{        
        qryStr=getUrlParameter(); 
        if(qryStr['c']!=undefined){
            loadData(qryStr['c'],'',qryStr['p'],'GET','list','N');  
        }    
        $('#myModal').modal('hide');
    }

}


function doSearch(){
    $queryString=$('#form_search').serialize();
    qryStr=getUrlParameter(); 
    loadData(qryStr['c'],'',qryStr['p'],'GET','list','Y',$queryString);  
}

$(document).on('click','#btn_save',function(event) { 

            //form validation
            if(!validateForm()){
                return false;
            }
            
            var dataURL = $(this).attr('data-href');
            var pageReload = $(this).attr('data-reload');
            var showPopup = $(this).attr('data-popup');
            var pkey=$(this).attr('data-pkey');;
            $('#overlay').show();

           

            var form = $(this);
            var formdata = false;   

            if (window.FormData){
                formdata = new FormData($("#form_save")[0]);
            }      
            
                       
            /*
            $.post(dataURL,
                $("#form_save").serialize(),						
                    function(data) {
                        
                        if(data.error==1){
                            errorMessage(data.text);
                            $('#overlay').hide();
                            return false;
                        }

                        $('#form_save').trigger("reset");                        
                        if(pageReload=='true'){                            
                                window.location.hash = window.location.hash.replace('&popup=1','');
                                window.location.hash = window.location.hash.replace('&success=1','');
                                if(!pkey){
                                    window.location.hash=window.location.hash+"&popup=1&success=1";
                                 }else{                                 
                                    window.location.hash=window.location.hash+"&success=1";                                
                                }                                 
                                location.reload();                       
                        }
                        else{
                            successMessage(data.text);                       
                            qryStr=getUrlParameter();
                            if(!pkey){
                                $('#overlay').hide();
                             }else{                          
                                 loadData(qryStr['c'],'',qryStr['p'],'GET','list','N');                            
                                 $('#myModal').modal('hide');
                             } 
                        }  

                    }						
            );*/


        $.ajax({
            url: dataURL,
            type: "POST",
            data:  formdata,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function()
            {
                
            },
            success: function(data)
            {
                        // console.log(data);
                        if(data.error==1){
                            errorMessage(data.text);
                            $('#overlay').hide();
                            return false;
                        }
                        //$('#form_save').trigger("reset");   
                        document.getElementById("form_save").reset();                     
                        if(pageReload=='true'){                            
                              //  window.location.hash = window.location.hash.replace('&popup=1','');
                               // window.location.hash = window.location.hash.replace('&success=1','');
                               // window.location.hash = window.location.hash.replace('&size='+modalSize,'');                                
                                
                                window.location.hash = window.location.hash.replace('&popup=1&success=1&size='+modalSize,'');
                                if(!pkey){
                                    if(showPopup==1){
                                        window.location.hash=window.location.hash+"&popup=1&success=1&size="+modalSize;
                                    }
                                    else{
                                        window.location.hash=window.location.hash+"&success=1";  
                                    }    
                                 }else{                                 
                                    window.location.hash=window.location.hash+"&success=1";                                
                                }                                 
                                location.reload();                       
                        }
                        else{
                            successMessage(data.text);                       
                            qryStr=getUrlParameter();
                            if(!pkey){
                                $('#overlay').hide();
                             }else{                          
                                 loadData(qryStr['c'],'',qryStr['p'],'GET','list','N');                            
                                 $('#myModal').modal('hide');
                                 $('#overlay').hide();
                             } 
                        } 
            },
            error: function(e) 
            {   
                //console.log(e);
                //console.log(e.responseJSON.message);
                errorMessage(e.responseJSON.message); 
                $('#overlay').hide();
            }          
        });
});




</script>