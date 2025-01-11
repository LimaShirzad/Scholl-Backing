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
    <!-- <link rel="stylesheet" href="fontasowm/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootcss/bootstrap.min.css"> -->
    <title>all info</title>
</head>
<body>



<div class="container-fluid add_student_course mt-5">

<div class="row header1" >
    <div class="col mt-4 m-1">
           <h4>student addmision panel</h4>
    </div>
</div>
<div class="row">
<div class="col col-lg-8 col-xl-8 col-md-11 col-sm-11 ">
      <div class="form-group  shadow search mt-3 ">
                              
            <div class="input-group-prepend">
             <i class="fa-solid fa-search"></i>
            </div>
            <input type="search" class="form-control " 
            placeholder="Serach here" id="search_record" name="search_record">

      </div>
</div>





</div>
</div>

<div class="container-fluid mt-4">
<div class="row">
<div class="col">
<div class="table_of_student">
 
</div>
</div>
</div>
</div>













  <!-- module end -->
<div class="container-fluid add_info">
      <div class="row">
          <div class="col">


  <div class="modal fade" id="add_info" tabindex="-1" aria-labelledby="add_infoLabel" aria-hidden="true" class="text-capitalize">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add_infoLabel">student all information</h5>
                  
            </button>
            <i class="fa-solid fa-x"
            data-bs-dismiss="modal" 
            aria-label="Close "
            ></i>
            
          </div> 
       
          <div class="modal-body view_student_info">
                  <!-- <div class="img">
                        <img src=""  width="50px" height="50px" id="img" name="img">
                  </div> -->
                    <form id="submit_form">
                        <div class="form-group">
                              <div class="form-box">
                              <label>ID</label>
                              <input type="text" class="form-control mt-1" readonly
                              name="id"  id="id"
                              
                              >
                          </div>

                          <div class="form-box">
                              <label>name</label>
                              <input type="text" class="form-control mt-1" readonly
                              name="name" id="name"
                              >
                          </div>
                        </div>

                        <!-- <div class="form-group ">
                              <div class="form-box">
                              <label>f/name</label>
                              <input type="text" class="form-control mt-1" readonly
                              name="fname" id="fname"
                              >
                               <div class="form-box">
                              <div class="" id="select_box">
                              </div>
                            <input type="hidden" name="slect_input" id="slect_input" >
                            
                        
                           </div>
                          
                        </div> -->



                        <div class="form-group">
                              <div class="form-box">
                              <label>f/name</label>
                              <input type="text" class="form-control mt-1" readonly
                              name="fname" id="fname"
                              >
                          </div>

                          <div class="form-box">
                          <div class="" id="select_box">
                              </div>
                            <input type="hidden" name="slect_input" id="slect_input" >
                            
                          </div>
                        </div>
                        <!-- <div class="form-group" > -->
              
                        <!-- </div> -->

<!-- 
                              <div class="form-box">
                              <label>fee</label>
                              <input type="text" class="form-control mt-1" readonly id="fee" name="fee">
                             </div>

                          </div>
     -->
 



                          <!-- <div class="form-group">
                              <div class="form-box">
                              <label>discount</label>
                              <input type="text" class="form-control mt-1" 
                              name="desc"  id="desc"
                              
                              >
                          </div> -->

                        <div class="form-group mt-1">
                              <button class="btn m-1" >add</button>
                              <input type="hidden" name="insert_to" id="insert_to">
                        </div>
                          
                    </form>
                        
                               
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- modul end -->


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script>
    $(document).ready(function()
    {
        function show_record(page)
      {
                 action="select_admision";
                $.ajax({

                        url:"joinajax.php",
                        type:"POST",
                        data:{page_no:page,action:action},
                        success:function(data)
                        {
                          $(".table_of_student").html(data);
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

    function slect_box()
    {
       action="slect_input";
      $.ajax({
                        url:"joinajax.php",
                        type:"POST",
                        data:{action:action},
                        success:function(data)
                        {
                          $("#select_box").html(data);
                        }

      });
    }
    slect_box();

// end
$(document).on("click",".add_student",function()
{
         add_id=$(this).attr("id");
         $.ajax({
                        url:"joinajax.php",
                        type:"POST",
                        data:{add_id:add_id},
                        success:function(res)
                        {
                          // $(".view_student_info").html(data);
                        data=JSON.parse(res);
                        // console.log(res);
                          $("#id").val(data.student_id);
                          $("#name").val(data.student_name);
                          $("#fname").val(data.student_father_name);
                          $("#img").val(data.img);
                       
                      
                        }


      });

 // look_student

});
// submit_form
$(document).on("submit","#submit_form",function(e)
    {
      e.preventDefault();
        $("#insert_to").val("insert_student");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                      alert(data);
                        
                    }
           });
      
});

// search_record
$("#search_record").on("keyup",function()
{
     search_record=$(this).val();
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{search_record:search_record},
        success:function(data)
        {
            $(".table_of_student").html(data);
        }

    });
});

$(document).on("click",".look_student",function()
{
    look=$(this).attr("id");
    $.ajax({
                            url:"other.php",
                            type:"POST",
                            data:{look:look},
                            success:function(data)
                            {
                            
                                      
                            }
      
      });


});

});
</script>
</body>
</html>