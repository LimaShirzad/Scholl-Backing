<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["pas"]){
include("code.php");
$student_obj=new student();
if(isset($_GET["id"]))
{
        $id=$_GET["id"];
        $show_ricitp=$student_obj->select_info($id);
        $discount=$student_obj->show_rircp_dicount($id);
        $new_dis=implode(",",$discount);
        $total=$student_obj->show_ricipt_total($id);
        $sum=implode(",",$total);
        

}
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
        
        <link rel="stylesheet" href="print.css" media="print">
        <link rel="stylesheet" href="bootcss/bootstrap.min.css">
        <title>Document</title>
</head>
<body>
       
        
  <div class="container-fluid slip mt-4">
        <div class="row">
                <div class="col-12 col-md-12  col-lg-8 col-xl-8  m-auto  shadow p-2">
                       <div class="card p-2">
                             <div class="card-title">
                                   <h2>the profissional academy</h2>
                                    <div class="info mt-3">
                                         <span>mob : </span>
                                         <span>087346729</span>
                                    </div>
                                    <div class="info">
                                        <span>email : </span>
                                        <span>the profissional acdemy@gmail.com</span>
                                   </div>
                                   <div class="icon">
                                         <button class="btn">recipt</button>
                                   </div>
                             </div>

                       </div>
     <?php
     
     while($row=$show_ricitp->fetch_assoc())
     {

     ?>
                       <div class="recipt p-2 text-capitalize">
                            <div class="name">
                                <table>
                                        <tr>
                                                <th>name: </th>
                                                <th><?php echo $row["student_name"]; ?></th>
                                        </tr>
                                </table>
                            </div>
                            <div class="name">
                                <table>
                                        <tr>
                                                <th>f/name: </th>
                                                <th><?php echo $row["student_father_name"]; ?></th>
                                        </tr>
                                </table>
                            </div>
                       </div>
                    <hr >

                 <table class="table text-capitalize">
                         <tr>
                                <th>course name</th>
                                <th>fee</th>
                                <th>fine</th>
                                <th>total</th>
                         </tr>

                  <tr>
                        <td><?php echo $row["course_name"]; ?></td>
                        <td><?php echo $row["course_fee"]; ?></td>
                        <td><?php echo $row["discount"]; ?></td>
                        <td><?php echo $row["totl_fee"]; ?></td>
                        

                  </tr>

                        <tr id="footer" class="fw-bold">
                                <td colspan="2">grand total</td>
                                <td ><?php echo $new_dis; ?></td>
                                <td ><?php  echo $sum; ?></td>
                        </tr>
 <?php } ?>                       

                 </table>



                </div>
        </div>
  </div>

<!-- <a href="print.php" class="btn btn-primary">print</a> -->
<!-- <button class="btn btn-primary" onclick="window.print()">print</button> -->
<div class="btn-class text-center mt-3">
<button class="btn btn-primary" onclick="window.print()" id="print_btn">print recipt</button>
<a class="btn btn-primary" href="viewprofile.php" id="other">go home</a>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>       
</body>
</html>