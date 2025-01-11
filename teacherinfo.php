<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["pas"])
{
  $pas=$_SESSION["pas"];
  $user=$_SESSION["user"];
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
    <title>teacher info</title>
</head>
<body>
    
<div class="container-fluid teacher_table mt-4">

<div class="row header1" >
    <div class="col mt-4 m-4">
           <h4 class="mt-4 ">teacher panel</h4>
    </div>
</div>



       <div class="row m-2">
        <div class="col-12 col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="form-group  shadow search  ">
                                                      
                <div class="input-group-prepend ">

                <button class="input-group-text fw-bold btn text-capitalize"
                  data-bs-toggle="modal" data-bs-target="#add_teacher"
                  
                  >
                     add teacher
                 </button>
                    <!-- <span class="input-group-text"> -->
                    <!-- <i class="fa-solid fa-search " ></i> -->
                    <!-- </span> -->
               </div>
                <input type="search" class="form-control " 
                placeholder="Serach here" id="search_teacher" name="search_teacher">

          </div>
        </div>
       </div>


     </div>


    <div class="container-fluid   teacher_info_table ">
        <div class="row a-atuo">
    
            <div class="col m-3 mt-1 text-capitalize table-responsive" id="load_teacher">
         

            </div>
        </div>
    </div>










<!-- view teacher start -->


<div class="modal fade" id="view_teacher" tabindex="-1" aria-labelledby="view_teacherLabel" aria-hidden="true" class="text-capitalize">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="view_teacherLabel">teacher profile</h5>
                  <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                        
                  <!-- </button> -->
                  <i class="fa-solid fa-x"
                  data-bs-dismiss="modal" 
                  aria-label="Close "
                  ></i>
                  
                </div> 
                <!--  enctype="multipart/form-data"  -->
                <div class="modal-body teacher_profile">
                     
                     </div>
                      
    
                </div>
                
              </div>
            </div>
          </div>


<!-- view teacher end -->

<!-- update form start -->
      
<div class="modal fade" id="update_teacher" tabindex="-1" aria-labelledby="update_teacherLabel" aria-hidden="true" class="text-capitalize">
            <div class="modal-dialog "  >
              <div class="modal-content  " >
                <div class="modal-header">
                  <h5 class="modal-title" id="update_teacherLabel">update teacher</h5>
                  <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                        
                  <!-- </button> -->
                  <i class="fa-solid fa-x"
                  data-bs-dismiss="modal" 
                  aria-label="Close "
                  ></i>
                  
                </div> 
                <!--  enctype="multipart/form-data"  -->
                <div class="modal-body  upd_teacher">
<!--                      
                          <form id="updateteacher" class="text-capitalize">
                                          <div id="upcoreect"></div>
                             
                                     <div class="form-group">
                                          <div class="form-box">
                                                <label >name</label>
                                                <input type="text" class="form-control"
                                                id="e_teacher"
                                                >
                                          </div>
                                          <div class="form-box">
                                            <label >education</label>
                                            <input type="text" class="form-control"
                                            id="e_educ"
                                            >
                                      </div>
                            
                                </div>

                                <div class="form-group">
                                  <div class="form-box">
                                        <label >email</label>
                                        <input type="email" class="form-control"
                                        id="te_email"
                                        >
                                  </div>
                                  <div class="form-box">
                                    <label >salary</label>
                                    <input type="etsalry" class="form-control"
                                    id="et_num"
                                    >
                              </div>
                    
                        </div>




                        <div class="form-group">
                          <div class="form-box">
                                <label >address</label>
                                <input type="text" class="form-control"
                                id="etadres"
                                >
                          </div>
                          <div class="form-box">
                            <label >subject</label>
                            <input type="text" class="form-control"
                            id="etsub"
                            >
                      </div>
            
                </div>


                        <div class="form-group">
                          <div class="form-box">
                                <label >description</label>
                                <input type="text" class="form-control"
                                id="etdes"
                                >
                          </div>
                          <div class="form-box">
                            <label >img</label>
                            <input type="file" class="form-control"
                            id="etfile"
                            >
                      </div>
            
                   </div>
                   <div class="form-group last mt-3">
             
             <label >gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <label >meal</label>
                             
                         <input type="radio"  name="gender" 
                         value="Meal"
                         id="gender"   >
                         &nbsp;&nbsp;
                         <label >female</label>
                         
                         <input type="radio"  name="gender" id="gender" 
                         value="Female"
                        checked >

             </div>


                            <div class="form-group">
                                 <button class="btn" type="submit" >update</button>
                            </div>

                          </form> -->


                          
                        
                 
                    </div>
                     </div>
                </div>
                
              </div>
            </div>
          </div>
<!-- update form end -->

<!-- add teacher modul start -->
<div class="modal fade" id="add_teacher" tabindex="-1" aria-labelledby="add_teacherLabel" aria-hidden="true" class="text-capitalize">
            <div class="modal-dialog "  >
              <div class="modal-content  " >
                <div class="modal-header">
                  <h5 class="modal-title" id="add_teacherLabel">add teacher</h5>
                  <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                        
                  <!-- </button> -->
                  <i class="fa-solid fa-x"
                  data-bs-dismiss="modal" 
                  aria-label="Close "
                  ></i>
                  
                </div> 
                <!--  enctype="multipart/form-data"  -->
                <div class="modal-body  teacher_enroll">
            <form id="emp_form"  method="POST" class="text-capitalize">
            <div id="corect"></div>
              <div class="form-group">
                   <div class="form-box">
                          <label > name</label>
                          <input type="text" class="form-control" name="teacher_name" id="teacher_name" required>
                   </div>

                   <div class="form-box">
                    <label >education</label>
                    <input type="text" class="form-control" name="teacher_education" id="teacher_education" required>
             </div>
            </div>

            <div class="form-group">
                   <div class="form-box">
                          <label >email</label>
                          <input type="email" class="form-control" name="teacher_email" id="teacher_email" required>
                   </div>

                   <div class="form-box">
                    <label >salary</label>
                    <input type="number" class="form-control" name="teacher_salay" id="teacher_salay" required>
             </div>
            </div>

            <div class="form-group">
                   <div class="form-box">
                          <label >address</label>
                          <input type="text" class="form-control" name="teacher_address" id="teacher_address" required>
                   </div>

                   <div class="form-box">
                    <label >subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
             </div>
            </div>
            <div class="form-group">
                   <div class="form-box">
                          <label >description</label>
                          <input type="text" class="form-control" name="des" id="des" required>
                   </div>

                   <div class="form-box">
                    <label >file</label>
                    <input type="file" class="form-control" name="e_img" id="e_img" required>
             </div>
            </div>


                <div class="form-group last mt-3">
             
                <label >gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label >meal</label>
                                
                            <input type="radio"  name="gender" 
                            value="Meal"
                            id="gender"   >
                            &nbsp;&nbsp;
                            <label >female</label>
                            
                            <input type="radio"  name="gender" id="gender" 
                            value="Female"
                           checked >

                </div>





              <div class="form-group mt-2 ">
                     <input type="hidden" name="insert_em" id="insert_em"  class="form-control">
                   <button class="btn" name="submit_teacher" type="submit">submite</button>
                   <button class="btn" type="reset">reset</button>
              </div>
             </form>
</div>
</div>
</div>
                 
                        
                 
                </div>
                     </div>
                </div>

                     
<!-- add teacher modul end -->

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script src="script.js"></script>
<script>
  $(document).ready(function()
  {
      function loadData(page)
      { 
        action="select_teacher";
             $.ajax({
                                    url:"joinajax.php",
                                    type:"POST",
                                    data:{page_no:page,action:action},
                                    success:function(data)
                                    {
                                        $("#load_teacher").html(data);
                                    }


             });
      }
      loadData();
      // pagnation
      $(document).on("click","#pagnation a",function(e)
      {
        e.preventDefault();
        var page_id=$(this).attr("id");
        loadData(page_id);
      });
      // pagnation end

// search teacher start
$("#search_teacher").on("keyup",function()
{
    var search_teacher=$(this).val();
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{search_teacher:search_teacher},
        success:function(data)
        {
          $("#load_teacher").html(data);
        }

    });
});

// search teacher end
// delete teacher start
$(document).on("click",".delete_teacher",function()
      {
     var teacher_id=$(this).attr("id");
     teacher_action="delet";
     if(confirm("are you sure to delete the record"))

     {
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{teacher_id:teacher_id,teacher_action:teacher_action},
      success:function(data)
      {
       alert(data);
        loadData();
           

      }

     });}
});

// delelt teacher end
// add teacher start
$(document).on("submit","#emp_form",function(e)
              {
                     e.preventDefault();
                     $("#insert_em").val("insert_em");
    
                            $.ajax({
                                          url:"joinajax.php",
                                          type:"POST",
                                          data:new FormData(this),
                                          contentType:false,
                                          processData:false,
                                          success:function(response)
                                          {
                                                
                                                 if(response=="Sucess")
                                                 {
                                                        var str='<div class="alert alert-succese"> Data inseted succesfuly   </div> ';
                                                        $("#emp_form").reset[0];
                                                 }
                                                 else{
                                                        var str='<div class="alert alert-danger>'+response+' </div> ';
                                                 }
                                                 $("#corect").html(str);
                                          //   if(response=="Sucess")
                                          //   {
                                          //        // var str='<div class="alert alert-success"> Data inseted succesfuly   </div> ';
                                          //   }else{
                                          //        // var str='<div class="alert alert-danger>'+response+' </div> ';
                                          //   }
                                          //   $("#corect").html(str);
                                             loadData();
                                          }

                               });
              });

// add teacher end
// update teacher start
$(document).on("submit","#updateteacher",function(e)
              {
                     e.preventDefault();
                     $("#new_up").val("new_data");
    
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
                                                 $("#upcoreect").html(str);
                                          //   if(response=="Sucess")
                                          //   {
                                          //        // var str='<div class="alert alert-success"> Data inseted succesfuly   </div> ';
                                          //   }else{
                                          //        // var str='<div class="alert alert-danger>'+response+' </div> ';
                                          //   }
                                          //   $("#corect").html(str);
                                             loadData();
                                          }

                               });
              });



// update teacher end
// update id start
$(document).on("click",".update_teacher",function(){
  var teacher_up_id=$(this).attr("id");
     teacher_action_update="update_teacher_id";   
     $.ajax({

                      url:"joinajax.php",
                      type:"POST",
                      data:{teacher_up_id:teacher_up_id,teacher_action_update:teacher_action_update},
                      success:function(data)
                        {
                          
                          $(".upd_teacher").html(data);
                            

                        }


     });
});

// update is end
// view teacher start
$(document).on("click",".view_teacher",function()
{
     teacher_view=$(this).attr("id");
    $.ajax({
                              url:"joinajax.php",
                              type:"POST",
                              data:{teacher_view:teacher_view},
                              success:function(data)
                              {
                                   $(".teacher_profile").html(data);
                              }

    });
});


// view teacher end
  });






</script>











</body>
</html>