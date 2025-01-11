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


<div class="container-fluid course_report mt-5">
  <div class="row">
    <div class="col mt-4">
                  <div class="head">
                       course report
                  </div>
              <div id="show">

              </div>

             
          <!-- <table class="table text-capitalize text-center"> -->
                  <!-- <tr>
                    <th>coure name</th>
                    <th>enroll</th>
                    <th>total fee</th>
                  </tr> -->

                    <!-- <tbody>
                     
                       <tr>
                          <td>one</td>
                          <td>one</td>
                          <td>one</td>
                        </tr>

                        <tr>
                          <td>one</td>
                          <td>one</td>
                          <td>one</td>
                        </tr>
                    </tbody> -->
                
                 

          <!-- </table> -->


        <div class="show_repot">

        </div>



    </div>
  </div>
</div>

      



   
       
    
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>  
<script src="jquery-3.7.1.js"></script>
<script>
  $(document).ready(function()
  {
    function show()
    {
      courser_repert="show_course_report";
    
      $.ajax({
                    url:"joinajax.php",
                    type:"POST",
                    data:{courser_repert:courser_repert},
                    success:function(data)
                    {
                      $("#show").html(data);
                    }


      });
    }

show();
   
function repert()
{
  total_report="total_repot";
      $.ajax({
                    url:"joinajax.php",
                    type:"POST",
                    data:{total_report:total_report},
                    success:function(data)
                    {
                      $(".show_repot").html(data);
                    }


      });

}
repert();










  });
</script>



</body>
</html>