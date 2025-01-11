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

  <div class="container-fluid expen_reocrd mt-5">
    <div class="row">
      <div class="col mt-3">
             <div class="head">
                       <span>expen record</span>
             </div>
             <table class="table text-capitalize" id="one">
                         
                          <tr>
                            <th>total reocrd</th>
                            <th id="total_expen_show"></th>
                          </tr>
             </table>

             <table class="table text-capitalize" id="one">
                 
             </table>
            
      </div>
    </div>
  </div>



   
       
  <script src="jquery-3.7.1.js"></script>   
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>  

<script>
  $(document).ready(function()
  {
      
     function show_total_expen()
     {
           total_expen="total_expen";
           $.ajax({
                    url:"joinajax.php",
                    type:"POST",
                    data:{total_expen:total_expen},
                    success:function(data)
                    {
                     $("#total_expen_show").html(data);
                    }


      });
     }


     show_total_expen();
  });
</script>





</body>
</html>