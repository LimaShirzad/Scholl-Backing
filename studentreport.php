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
</head>
<body>




<div class="container-fluid  hv-100 mt-5 report text-capitalize">
<div class="row header1" >
    <div class="col mt-4 m-1">
           <h4 class="text-center">student and teacher repoert</h4>
    </div>
</div>


      <div class="row mt-2">
            <div class="col col-lg-11  col-xl-10 col-md-10 col-sm-10 m-auto">


<div class="student_detail ">
<table class="table">
  <tr>
      <th colspan="5">student information</th>
  </tr>

   <tr id="student_total">
      <td class="p-3"><span>total student</span></td>
      <td class="p-3"><span>343</span></td>
   </tr>

       <tr>
         <th colspan="5" >teacher information</th>
       </tr>

       <tr id="salary">
      
   </tr>

   <tr id="total_salary">
      
   </tr>



</table>


















</div>

</div>
    
</div>



</div>





<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
 <script>
 $(document).ready(function()
 {
        function count_teacher()
        {
            action="count_teacher";
            $.ajax({
                     url:"joinajax.php",
                     type:"POST",
                     data:{action:action},
                     success:function(data)
                     {
                        $("#salary").html(data);
                      
                     }
            });
            action="sum_salary",
            $.ajax({
              
               url:"joinajax.php",
                     type:"POST",
                     data:{action:action},
                     success:function(data)
                     {
                        
                        $("#total_salary").html(data);
                     }

            });
            action="total_student";
            $.ajax({
              
              url:"joinajax.php",
                    type:"POST",
                    data:{action:action},
                    success:function(data)
                    {
                       
                       $("#student_total").html(data);
                    }

           });

        }
        count_teacher();
      

    


 });
 

 </script>




</body>
</html>