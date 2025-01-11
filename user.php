<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["pas"])
{
  include("meunu.php");
}else{
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontasowm/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    <title>user</title>
</head>
<body>
    

    <div class="container-fluid user_form mt-4 ">

    <div class="row header1">
    <div class="col m-3">
           <h4 class="mt-4 ">user panel</h4>
    </div>
</div>



        <div class="row m-2">
         <div class="col col-xl-7 col-lg-7 col-md-10 col-sm-10">
             <div class="form-group  shadow search  ">
                                                       
                 <div class="input-group-prepend ">

                    <!-- <i class="fa-solid fa-search" 
                    data-bs-toggle="modal" data-bs-target="#add_user"
                    ></i> -->
                  <button class="input-group-text btn text-capitalize"
                  data-bs-toggle="modal" data-bs-target="#add_user"
                  
                  >
                     add user
                 </button>
                
                </div>
                 <input type="search" class="form-control " 
                 placeholder="Serach here" id="search_user" name="search_user">
 
           </div>
         </div>
        </div>
 
 
      </div>
 
 
     <div class="container-fluid user_table mt-4">
         <div class="row a-atuo">
             <div class="col m-3 table-responsive user_table_show">
      
             </div>
         </div>
     </div>



<!-- add user start -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="add_userLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog "  >
      <div class="modal-content  " >
        <div class="modal-header">
          <h5 class="modal-title" id="add_userLabel">add user</h5>
          <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                
          <!-- </button> -->
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body ">
             
                  <form id="add_user_form" class="text-capitalize">
                          <div id="user_err"></div>
                     
                             <div class="form-group">
                                  <div class="form-box">
                                        <label >name</label>
                                        <input type="text" class="form-control"
                                        id="user_name" name="user_name" require

                                        >
                                        
                                  </div>
                                  <div class="form-box">
                                    <label >stutes</label>
                                    <input type="text" class="form-control"
                                    id="user_stutue" name="user_stutue" requerid
                                    >
                              </div>
                    
                        </div>

                      




                <div class="form-group">
                  <div class="form-box">
                        <label >user name</label>
                        <input type="text" class="form-control"
                        id="user_user_name" name="user_user_name"
                        requerid
                        >
                  </div>
                  <div class="form-box">
                    <label >pasword</label>
                    <input type="password" class="form-control"
                    id="user_pasword" name="user_pasword" requerid
                    >
              </div>
    
        </div>


                <div class="form-group">
                  <div class="form-box">
                        <label >phone</label>
                        <input type="number" class="form-control"
                        id="user_phone" name="user_phone" requerid
                        >
                  </div>
                  <div class="form-box">
                    <label >img</label>
                    <input type="file" class="form-control"
                    id="user_img" name="user_img" requerid
                    >
              </div>
    
           </div>
      
                    <div class="form-group last">
                        <label>description</label>
                                <textarea name="user_info" id="user_info" cols="2" rows="2" class="form-control" requerid></textarea>
                    </div>

                    <div class="form-group">
                         <button class="btn" type="submit" >submite</button>
                         <input type="hidden" class="form-control"
                    id="action" name="action" value="insert_user"
                    >
                    </div>

                  </form>


                  
                
         
            </div>
             </div>
        </div>
        
      </div>
    </div>
  </div>
<!-- add user end -->

<!-- update user start -->
<div class="modal fade" id="update_user" tabindex="-1" aria-labelledby="update_userLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog "  >
      <div class="modal-content  " >
        <div class="modal-header">
          <h5 class="modal-title" id="update_userLabel">update user</h5>
          <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                
          <!-- </button> -->
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body update_profile">
        
                  
                
         
            </div>
             </div>
        </div>
        
      </div>
    </div>
  </div>
<!-- update user end -->
<!-- view user profile start -->
<div class="modal fade" id="view_user" tabindex="-1" aria-labelledby="view_userLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog "  >
      <div class="modal-content  " >
        <div class="modal-header">
          <h5 class="modal-title" id="view_userLabel">user profile</h5>
          <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                
          <!-- </button> -->
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body user_profile">
             
                </div>


                  
                
         
            </div>
             </div>
        </div>
        
      </div>
    </div>
  </div>

<!-- view user profile end -->

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script>
$(document).ready(function()
{


  function show_record($page)
      {
        var action="Select_user";

        $.ajax({

                url:"joinajax.php",
                type:"POST",
                data:{action:action,page_no:$page},
                success:function(data)
                {
                
                    $(".user_table_show").html(data);

                }
          });
        }
          show_record();

          $(document).on("click","#pagnation a",function(e)
           {
                e.preventDefault();
                var page_id=$(this).attr("id");
                show_record(page_id);
          });

  
  $("#add_user_form").submit(function(e)
  {
    $("#action").val("insert_user");
    e.preventDefault();
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(response)
                    {
                      alert(response);
                                             if(response=="Sucess")
                                                 {
                                                        var str='<div class="alert alert-succese"> Data inseted succesfuly   </div> ';
                                                        $("#emp_form").reset[0];
                                                 }
                                                 else{
                                                        var str='<div class="alert alert-danger>'+response+' </div> ';
                                                 }
                                                 $("#user_err").html(str);



                                                    show_record();
                      //  somting here is sty to validate form
                    }



      });


  });
// insert student end
// delet user start 
$(document).on("click",".delete_user",function(){
  var user_id=$(this).attr("id");
     action="delet_user";
     if(confirm("are you sure to delete the record"))

     {
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{user_id:user_id,action:action},
      success:function(data)
      {
       
        show_record();
           

      }
    })}
});
// delet student end
// view user start
$("body").on("click",".view_user_icon",function()
      {
          view_user_id=$(this).attr("id");
          $.ajax({
            url:"joinajax.php",
            type:"POST",
            data:{view_user_id:view_user_id},
            success:function(data)
            {
              $(".user_profile").html(data);
              // data=JSON.parse(res);
               
            }
          });
      });
      $("body").on("click",".update_user",function(){
        update_user_id=$(this).attr("id");
        $.ajax({
            url:"joinajax.php",
            type:"POST",
            data:{update_user_id:update_user_id},
            success:function(data)
            {
              $(".update_profile").html(data);
              // data=JSON.parse(res);
               
            }
          });


      });

// view user end
$(document).on("submit","#uform",function(e)
              {
                     e.preventDefault();
                     $("#up_action_input").val("update_user");
    
                            $.ajax({
                                          url:"joinajax.php",
                                          type:"POST",
                                          data:new FormData(this),
                                          contentType:false,
                                          processData:false,
                                          success:function(response)
                                          {
                                                 alert(response);
                                                 if(response=="Great")
                                                 {
                                                        var str='<div class="alert alert-succese"> Data update succesfuly   </div> ';
                                                        $("#updateteacher").reset[0];
                                                 }
                                                 else{
                                                        var str='<div class="alert alert-danger>'+response+' </div> ';
                                                 }
                                                 $("#user_up").html(str);
                                          //   if(response=="Sucess")
                                          //   {
                                          //        // var str='<div class="alert alert-success"> Data inseted succesfuly   </div> ';
                                          //   }else{
                                          //        // var str='<div class="alert alert-danger>'+response+' </div> ';
                                          //   }
                                          //   $("#corect").html(str);
                                            show_record();
                                          }

                               });
              });


// search_user
$("#search_user").on("keyup",function()
{
    var search_user=$(this).val();
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{search_user:search_user},
        success:function(data)
        {
          $(".user_table_show").html(data);
        }

    });
});

});

</script>    
</body>
</html>











