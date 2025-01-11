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
    <title>Document</title>
</head>
<body>
<!-- course_table -->
<!-- <div class="container-fulid">
  <div class="row m-1 p-0 ">
    <div class="col text-center all_header m-1 p-1">
     <h1>course information</h1>
     </div>
     </div> -->
<div class="container-fluid course_table  text-capitalize mt-4">

<div class="row header1 p-0 m-0" >
    <div class="col mt-4 m-1">
           <h4>course panle</h4>
    </div>

  <!-- search enfing start-->

     <div class="row ">
            <div class="col    
            col-lg-7 col-xl-7 col-md-11 col-sm-11
               m-3 p-1
            ">
                  <form>
                 
                       <div class="form-group  shadow search  ">
                                                      
                             <div class="input-group-prepend ">
                              <button class="input-group-text btn text-capitalize"
                              data-bs-toggle="modal" data-bs-target="#addcourse" type="button">
                             add course
                               <!-- <i class="fa-solid fa-search"></i> -->
                              </button>
                             </div>
                             <input type="search" class="form-control " 
                             placeholder="Serach here" id="serach_course" name="serach_course">

                       </div>
                  </form>
            </div>

           <!-- <div class="col show_search">

           </div> -->


     </div>
  <!-- search enfing end-->


    <div class="row m-2 mt-2 " id="show">

 
        </div>
    </div>
</div>


  <!-- </div> -->
<!-- </div> -->
<!--  -->
<div class="container-fluid add_course   text-capitalize ">
    <div class="row">
        <div class="col ">


<div class="modal fade" id="addcourse" tabindex="-1" aria-labelledby="addcourseLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addcourseLabel">add course</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body ">
                 <form  action=""  id="addcourse" >
                  <div class="form-group">
                  <!-- <p  style="color:red;"></p> -->
                  <div id="empty_msg" >

                  </div>
                  </div>
                   <div class="form-group">
                        <label >course name</label>
                
                        <input type="text " class="form-control" name="course_name"
                        id="course_name"
                        placeholder="Course Name"
                        required
                        >
                        <p id="course_err"></p>
                   </div>

                   <div class="form-group">
                    <label >duration</label>
                    <input type="number" class="form-control" name="course_duration"
                    id="course_duration"
                    placeholder="Duration"
                    required
                    >
               </div>


               <div class="form-group">
                <label >fee</label>
                <input type="number" class="form-control" name="course_fee"
                id="course_fee"
                placeholder="fee"
                required
                >
               </div>
               <div class="form-group">
                  <label class="mt-1">description</label>
                 <textarea name="info" id="info" 
                 cols="10" rows="5" class="form-control "
                 placeholder="decription"
                 required
                 >

               </textarea>
              </div>

              <div class="form-group mt-2">
                <button type="submit" id="insert_course_btn" class="btn "
                
                name="insert_course_btn"
                >submite</button>
                
                <input type="hidden" class="form-control"  name="insert_course" id="insert_course" value="insert">
              </div>
     
                </form>      
        </div>
   
      </div>
    </div>
  </div>
</div>
</div>
</div>


<!--  -->
<!-- updaet modul start -->
<div class="container-fluid add_course   text-capitalize ">
    <div class="row">
        <div class="col ">


<div class="modal fade" id="update_course" tabindex="-1" aria-labelledby="update_courseLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="update_courseLabel">update course</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body " id="up_modul">

               
        </div>
   
      </div>
    </div>
  </div>
</div>
</div>
</div>


<!-- update modul end -->
<div class="modal fade" id="view_course_modul" tabindex="-1" aria-labelledby="view_course_modulLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view_course_modulLabel"> course information</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body " id="view_course_body">

                
        </div>
   
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- view modul end -->
<script src="jquery-3.7.1.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>   

<script>
  $(document).ready(function(){


 
// inserting course end
// update course start


// update course end
// select course start
function show_record(page)
      {
                 action="select_course";
                $.ajax({

                        url:"joinajax.php",
                        type:"POST",
                        data:{page_no:page,action:action},
                        success:function(data)
                        {
                            $("#show").html(data);
                        }

                  });
      }
      show_record();
 
// seelect course end
// update course start
     
$(document).on("click","#pagnation a",function(e)
      {
        e.preventDefault();
        var page_id=$(this).attr("id");
        show_record(page_id);
      });
// update course end

    //  deledt course_recor start
    $(document).on("click",".delete_course",function()
    {
     var c_id=$(this).attr("id");
     action="delet_course";
     if(confirm("are you sure to delete the record"))

     {
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{c_id:c_id,action:action},
      success:function(data)
      {
       if(data!="Dlelet")
       {
        alert("Reoecrd deledt suuccfully");
        
       }
     
       show_record();

      }

     });}
});

 // delelet course_reocd end
     
//  search course_data start  
$("#serach_course").on("keyup",function()
{
    var course_data=$(this).val();
    // search="course_search";
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{course_data:course_data},
        success:function(data)
        {
            $("#show").html(data);
        }

    });
});
// search course_dataend
// update course start


// update course end
// view course start
$(document).on("click",".view_course",function(){
    view_course_id=$(this).attr("id");

                        $.ajax({
                          url:"joinajax.php",
                          type:"POST",
                          data:{view_course_id:view_course_id},
                          success:function(data)
                          {
                            $("#view_course_body").html(data);
                          }

                        });
});
// view course end
$(document).on("submit","#addcourse",function(e)
    {
      e.preventDefault();
      $("#insert_course").val("insert");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                      // alert(data);
                      var msg="Data inseted succesfuly";
                      if(data=="inserted")
                      {
                           var str='<div class="alert alert-success">'+msg+'</div>';
                          
                      }else{
                        var str='<div class="alert alert-danger">'+data+'</div>';
                      }
                      //  if(data=="exit")
                      //  {
                      //   var c="this course is already exixt";
                      //  }
                      //  if(data=="inserted") 
                      //  {
                      //   var str="Record inserted succfully";
                      //  }    
                      //  $("#course_err").html(c);
                       $("#empty_msg").html(str);
                       show_record();
                       $("#addcourse").reset[0];
                    }
           });
      
    });

});
// update_course_body
$(document).on("click",".update_course",function()
{


    course_up_id=$(this).attr("id");
    $.ajax({
                            url:"joinajax.php",
                            type:"POST",
                            data:{course_up_id:course_up_id},
                            success:function(data)
                            {
                              $("#up_modul").html(data);
                            }
      
    });
    
// update course start
$(document).on("submit","#updatecourse_form",function(e)
    {
      e.preventDefault();
      $("#update_course_input").val("update_course");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                 
                    //  alert(data);
                    if(data=="update")
                    {
                      var str='<div class="alert alert-success">Data Updated</div>';
                    }else{
                      var str='<div class="alert alert-danger">'+data+'</div>';
                    }
                      $("#err").html(str);
                    //  $("#updatecourse_form").reset[0];
                    show_record();

                    }
           });
      
    });

// });

// update course end




});




</script>


</body>
</html>