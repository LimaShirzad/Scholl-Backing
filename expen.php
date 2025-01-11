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
    

    <div class="container-fluid expane_form mt-5 ">

    <div class="row header1 p-0 m-0" >
    <div class="col mt-4 ">
           <h4 class="m-4">expen panel</h4>
    </div>



        <div class="row m-2">
         <div class="col col-xl-7 col-lg-7 col-md-10 col-sm-10">
             <div class="form-group  shadow search  ">
                                                       
                 <div class="input-group-prepend ">
                  <button class="input-group-text btn text-capitalize"
                  
                  data-bs-toggle="modal" data-bs-target="#add_expane"
                  
                  >
                    add
                 </button></div>
                 <input type="search" class="form-control " 
                 placeholder="Serach here" id="serach_expan" name="serach_expan">
 
           </div>
         </div>
        </div>
 
 
      </div>
 
 
     <div class="container-fluid expans_table mt-1  text-capitalize">
         <div class="row a-atuo">
             <div class="col m-3 table-responsive" id="expan_table">
    
     </table>
             </div>
         </div>
     </div>
 


<!-- add expane start -->

<div class="modal fade" id="add_expane" tabindex="-1" aria-labelledby="add_expaneLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_expaneLabel">add expanse</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body text-capitalize">
                 <form id="add_expane" method="POST">
              
                      <div id="msg"></div>
                   <div class="form-group ">
                    <label >date</label>
                    <input type="date" class="form-control" name="date"
                    id="date">
               </div>


               <div class="form-group">
                <label >amount</label>
                <input type="number " class="form-control" name="amount"
                id="amount">
               </div>
               <div class="form-group">
                  <label class="mt-1">description</label>
               <textarea name="info" id="info" cols="10" rows="5" class="form-control ">

               </textarea>
              </div>
               <div class="form-group mt-3">
                   <button class="btn " type="submit">add</button>
                   <button class="btn" type="reset">reset</button>
                   <input type="hidden" name="insert_expan" id="insert_expan" value="insert">
               </div>

                </form>      
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- add expane end -->
<!-- update expane start -->
<div class="modal fade" id="update_expane" tabindex="-1" aria-labelledby="update_expaneLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="update_expaneLabel">update expance</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <!--  enctype="multipart/form-data"  -->
        <div class="modal-body text-capitalize" id="update_modul_body">
                 
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- update expamnse end -->

<!-- view moodul start -->
<div class="container-fluid  view_expane">
    <div class="row">
        <div class="col ">


<div class="modal fade" id="view_expane" tabindex="-1" aria-labelledby="view_expaneLabel" aria-hidden="true" class="text-capitalize">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view_expaneLabel">view expanse</h5>
      
          <i class="fa-solid fa-x"
          data-bs-dismiss="modal" 
          aria-label="Close "
          ></i>
          
        </div> 
        <div class="modal-body text-capitalize" id="view_expan">
 
        
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
      $(document).ready(function()
      {
        function show_record(page)
      {
                 expan="select_expan";
                $.ajax({

                        url:"joinajax.php",
                        type:"POST",
                        data:{page_no:page,expan:expan},
                        success:function(data)
                        {
                            $("#expan_table").html(data);
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


      $(document).on("submit","#add_expane",function(e)
    {
      e.preventDefault();
        $("#insert_expan").val("insert_expan");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {

                       show_record();
                        if(data=="inserted")
                        {
                          var str='<div class="alert alert-primary">recored inseted  </div>';
                        }else{
                          var str='<div class="alert alert-danger">'+data+'</div>';
                        }
                        $("#msg").html(str);
                    }
           });
      
    });

    // insert end
// delete expan start
// del_ex
$(document).on("click",".del_ex",function()
    {
      c_id=$(this).attr("id");
     action="delet_expan";
     if(confirm("are you sure to delete the record"))

     {
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{c_id:c_id,action:action},
      success:function(data)
      {
          
        alert(data);
     
       show_record();

      }

     });}
});


// deleet expan end
// view expan start
$(document).on("click",".view_ex",function()
    {
    expan_view_id=$(this).attr("id");
     $.ajax({
      url:"joinajax.php",
      type:"POST",
      data:{expan_view_id:expan_view_id},
      success:function(data)
      {
        $("#view_expan").html(data);
      }
     });
});
// view expan end

// show update module start
$(document).on("click",".updat_expn",function(){
    update_course_id=$(this).attr("id");

                        $.ajax({
                          url:"joinajax.php",
                          type:"POST",
                          data:{update_course_id:update_course_id},
                          success:function(data)
                          {
                          
                            $("#update_modul_body").html(data);
                          }

                        });
});
// show update module end
// update_expane start
$(document).on("submit","#update_expane",function(e)
    {
      e.preventDefault();
        $("#up_expan").val("up_expan");
   
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
// search expane start
$("#serach_expan").on("keyup",function()
{
    serach_expan=$(this).val();
    // search="course_search";
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{serach_expan:serach_expan},
        success:function(data)
        {
          $("#expan_table").html(data);
        }

    });
});
// search exapn end




});
// update_expane end
</script>




</body>
</html>