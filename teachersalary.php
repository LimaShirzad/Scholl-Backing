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
<div class="container-fluid add_teacher_salary mt-4">
<div class="row header1" >
    <div class="col mt-5 m-1">
           <h4>teacher salary panel</h4>
    </div>
</div>


<div class="row">
<div class="col col-lg-8 col-xl-8 col-md-11 col-sm-11 ">
      <div class="form-group  shadow search mt-3 ">
                              
            <div class="input-group-prepend">
             <i class="fa-solid fa-search"></i>
            </div>
            <input type="search" class="form-control" 
            placeholder="Serach here" id="search_salary" name="search_salary">

      </div>
</div>





</div>
</div>

<div class="container-fluid mt-4">
<div class="row">
<div class="col">
<div class="table_of_teacher">

</div>
</div>
</div>
</div>
<!-- add start -->

<div class="container-fluid add_info">
      <div class="row">
          <div class="col">


  <div class="modal fade" id="add_info" tabindex="-1" aria-labelledby="add_infoLabel" aria-hidden="true" class="text-capitalize">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add_infoLabel">teacher salary</h5>
                  
            </button>
            <i class="fa-solid fa-x"
            data-bs-dismiss="modal" 
            aria-label="Close "
            ></i>
            
          </div> 
       
          <div class="modal-body view_teacher_info">
                  
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- add end -->


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script>
      $(document).ready(function()
      {
            function show_record(page)
      {
                 action="select_salary";
                $.ajax({

                        url:"joinajax.php",
                        type:"POST",
                        data:{page_no:page,action:action},
                        success:function(data)
                        {
                          $(".table_of_teacher").html(data);
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




$("#search_salary").on("keyup",function()
{
      search_salary=$(this).val();
    $.ajax({
        url:"joinajax.php",
        type:"post",
        data:{search_salary:search_salary},
        success:function(data)
        {
            $(".table_of_teacher").html(data);
        }

    });
});

$(document).on("click",".add",function()
{


    salary=$(this).attr("id");
    $.ajax({
                            url:"joinajax.php",
                            type:"POST",
                            data:{salary:salary},
                            success:function(data)
                            {
                              $(".view_teacher_info").html(data);
                            }
      
          });

});

// salary_submit
// see

$(document).on("click",".see",function()
{
    see=$(this).attr("id");
    $.ajax({
                            url:"other.php",
                            type:"POST",
                            data:{see:see},
                            success:function(data)
                            {
                              
                                      
                            }
      
          });

});



$(document).on("submit","#salary_submit",function(e)
    {
      e.preventDefault();
        $("#salry_insert").val("salry_insert");
   
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



});
</script>




</body>
</html>