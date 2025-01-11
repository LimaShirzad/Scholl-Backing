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
    <title>Document</title>
    <style>
        
        
     </style>
</head>
<body>


<!-- add student start -->

<!-- add student end -->
<!-- <button  class="btn-primary">add</button> -->
    <!-- view modul start -->
    <div class="container-fluid view_modul">
        <div class="row">
            <div class="col">

  
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true" class="text-capitalize">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewLabel">student profile</h5>
              <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                    
              </button>
              <i class="fa-solid fa-x"
              data-bs-dismiss="modal" 
              aria-label="Close "
              ></i>
              
            </div> 
            <!--  enctype="multipart/form-data"  -->
            <div class="modal-body profile">
               
          

            </div>
            
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<!-- vuew modul end -->
<!-- update -->

<!-- update modul start -->

<div class="container-fluid update_modul ">
    <div class="row">
        <div class="col ">


<div class="modal fade m-0" id="update" tabindex="-1" 
aria-labelledby="updateLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateLabel">update student</h5>
          <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close">
                
          </button> -->
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body w-100 justify-content-center" id="stuudent_modul" style="width:100%;">
                 
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- update module end -->


<!-- student information box start -->
 <!-- <div class="container-fluid student_info  mt-4 ">

        <div class="row shadow m-1 justify-content-center">
            <div class="col-9 col-md-4 col-lg-3 col-xl-4 col-sm-6 text-center fw-bold ">
                  <div class="card fw-bold box1 p-2" id="change">
                         
                            <i class="fa-solid fa-user"></i>
                            <h4 class="fw-bold">total student</h4>
                            <h5 class="fw-bold">345</h5>
                  </div>
                   
            </div>

            <div class="col-9  col-md-4 col-lg-3 col-xl-4 col-sm-6 text-center">
                <div class="card  box2 p-2 "id="change">
                       
                          <i class="fa-solid fa-user"></i>
                          <h4 class="fw-bold">total student</h4>
                          <h5 class="fw-bold">123</h5>
                </div>
                 
          </div>

          <div class="col-9  col-md-4 col-lg-3 col-xl-4 col-sm-6 text-center">
            <div class="card  box3 p-2 "id="change">
                   
                      <i class="fa-solid fa-user"></i>
                      <h4 class="fw-bold">total student</h4>
                      <h5 class="fw-bold">123</h5>
            </div>
             
      </div>

           
        </div>
    </div>  -->
<!-- student information box end -->

<!-- student table start -->
<div class="container-fluid student_table mt-5 text-capitalize">



<div class="row header1" >
    <div class="col mt-4 m-1">
           <h4 class="m-1">student  panel</h4>
    </div>
</div>
  <!-- search enfing start-->

     <div class="row">
            <div class="col    
            col-lg-7 col-xl-7 col-md-7 col-sm-7
               m-2
            ">
                  <!-- <form> -->
                 
                       <div class="form-group  shadow search mt-3 ">
                                                      
                             <div class="input-group-prepend ">
                              <button data-bs-toggle="modal" data-bs-target="#add_student" class="input-group-text btn text-capitalize">
                             add student
                      
                            </button>
                             </div>
                             <input type="search" class="form-control " 
                             placeholder="Serach here" id="search" name="search">

                       </div>
                  <!-- </form> -->
            </div>

           <div class="col show_search">

           </div>


     </div>
  <!-- search enfing end-->


    <div class="row m-1 mt-2 " id="show">

 
        </div>
    
    </div>
</div>

<!-- student table end -->
<!--add studennt start -->
<div class="container-fluid add_student">
       <div class="row">
            <div class="col">

  
    <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="add_studentLabel" aria-hidden="true" class="text-capitalize">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="add_studentLabel">add student</h5>
              <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close " class="btn-close"> -->
                    
              <!-- </button> -->
              <i class="fa-solid fa-x"
              data-bs-dismiss="modal" 
              aria-label="Close "
              ></i>
              
            </div> 
            <!--  enctype="multipart/form-data"  -->
            <div class="modal-body  student_enroll text-capitalize">
  
               
               <form id="student_form">
               
                         <div id="add_msg"> </div>
                 
                       <div class="form-group">

                           <div class="form-box">
                           <label >name</label>
                           <input type="text"  class="form-control" name="name" id="name"
                           placeholder=" Name" >
                              </div>

                              <div class="form-box">
                              <label >f/name</label>
                           <input type="text"  class="form-control" name="fname" id="fname"
                           placeholder=" Father Name" 
                            >
                              </div>
                         
                       </div> 

                   

                       <div class="form-group mt-1">
                           <div class="form-box">
                           <label >phone</label>
                           <input type="number"  class="form-control" name="phone" id="phone"
                           placeholder=" phone"
                           
                          >
                        
                         </div>

                       <div class="form-box mt-1">
                       <label >emergency phone</label>
                           <input type="number"  class="form-control" name="emphon" id="emphon"
                           placeholder="emergency phone"
                           
                          >
                        
                       </div>


                       </div>


                       <div class="form-group">
                           <div class="form-box">
                           <label >student CNIC</label>
                           <input type="number"  class="form-control" name="s_cinc" id="s_cinc"
                           placeholder="Student CINC"    >
                 
                         </div>

                         <div class="form-box">
                         <label >father CNIC</label>
                           <input type="number"  class="form-control" name="f_cinc" id="f_cinc"
                           placeholder="Student Father CINC"
                           
                          >
                     

                         </div>
                       </div>


                       <div class="form-group">
                           <div class="form-box">

                 
                           <label >email</label>
                           <input type="email"  class="form-control" name="email" id="email"
                           placeholder="Email"     >
                  
                       </div>

                       <div class="form-box">
                       <label >address</label>
                           <input type="text"  class="form-control" name="address" id="address"
                           placeholder="Address"
                           
                          >

                       </div>

                       </div>

                       <!-- <div class="form-group">
                     
                           
                       </div> -->

                       <div class="form-group last ">
                           <label >discription</label>
                           <input type="text"  class="form-control" name="description" id="description"
                           placeholder="Description">
                           
                       </div>

                   
                       <div class="form-group last  ">
                    
                           <label >student image</label>
                           <input type="file"  class="form-control" name="img" id="img">
                
                       </div>



                       <div class="form-group last mt-4">
                     
                               <label >gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <label >meal</label>
                               
                           <input type="radio" class="radio"  name="gender" 
                           value="Meal"
                           id="gender"  >
                           &nbsp;&nbsp;
                           <label >female</label>
                           
                           <input type="radio"  name="gender" id="gender"
                           value="Female"
                          checked>
                          
                       </div>
                          <div class="form-group mt-3">
                          <button class="btn " type="submit" name="submite">submite</button>
                          <input type="hidden" name="student_add" id="student_add">
                              <button class="btn " id="clear" name="clear" type="reset">clear</button>
                              
                            
                           </div>
                       </div>



                          




                       </form>
<!-- </div> -->

            </div>
            
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<!-- add student end -->

  

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script>
   $(document).ready(function()
   {

// Select  $("#show").html(data);
function show_record(page)
      {
                 action="Select";
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
     
      $(document).on("click","#pagnation a",function(e)
      {
        e.preventDefault();
        var page_id=$(this).attr("id");
        show_record(page_id);
      });





      $("body").on("click",".view",function()
      {
          view_id=$(this).attr("id");
          $.ajax({
            url:"joinajax.php",
            type:"POST",
            data:{view_id:view_id},
            success:function(data)
            {
              $(".profile").html(data);
              // data=JSON.parse(res);
               
            }
          });
      });

      // delet reocd start

      $(document).on("click",".delete",function()
      {
     var id=$(this).attr("id");
     action="delet";
     if(confirm("are you sure to delete the record"))

     {
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{id:id,action:action},
      success:function(data)
      {
       
        show_record();
           

      }

     });}
});

      // delect stduend end

// update student start
$("body").on("click",'.update',function()
{
   edit_id=$(this).attr("id");
    
  
  $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{edit_id:edit_id},
      success:function(res)
      {
        $("#stuudent_modul").html(res);
          
      }
  });
  });
  
       
  $("#updateform").submit(function(e)
  {
    e.preventDefault();
    $("#update_input").val("update_student");
    
    $.ajax({
                   url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                      
                      //  somting here is sty to validate form
                    }

    });

  });

// update student end

// update student start

// search start
$("#search").on("keyup",function()
{
    var search=$(this).val();
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{search:search},
        success:function(data)
        {
            $("#show").html(data);
        }

    });
});


// search end


//update_student_form start 
$(document).on("submit","#update_student_form",function(e)
    {
      e.preventDefault();
        $("#update_student_input").val("update_student_input");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                      alert(data); 
                       show_record();
                        
                    }
           });
      
});
// update_student_form end
// add student start
$(document).on("submit","#student_form",function(e)
    {
      e.preventDefault();
        $("#student_add").val("insert_student_to");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                            // alert(data);
                            // add_msg
                            if(data=="inserted")
                            {
                              var str='<div class="alert alert-primary">recored inserted</div>';
                              $("#student_form")[0].reset();
                            }else{
                              var str='<div class="alert alert-danger">'+data+'</div>';
                            }
                            $("#add_msg").html(str);
                            show_record();


                     
                    }
           });
      
    });

// add student end

    
});








</script>



</body>
</html>