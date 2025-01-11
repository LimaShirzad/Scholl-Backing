<?php
session_start();
include("code.php");
if(isset($_SESSION["user"]) && $_SESSION["pas"]){
  include("meunu.php");

$student_obj=new student();
$show_look="";
$show_fee="";
$show_all_total="";
$fee_res="";
$discount="";
$dis_re="";
if(isset($_SESSION["look_me"]))
{
    $id=$_SESSION["look_me"];
   $show_look=$student_obj->update_student_id($id);
   $show_fee=$student_obj->show_fee($id);
   $show_all_total=$student_obj->show_all($id);
   $discount=$student_obj->show_discount($id);
   $dis_re=implode(",",$discount);
   $fee_res=implode(",",$show_all_total);

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
    <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<!-- module start -->
<div class="container-fluid add_info mt-5">
      <div class="row">
          <div class="col">


  <div class="modal fade" id="add_info" tabindex="-1" aria-labelledby="add_infoLabel" aria-hidden="true" class="text-capitalize">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add_infoLabel">addmission</h5>
                  
            </button>
            <i class="fa-solid fa-x"
            data-bs-dismiss="modal" 
            aria-label="Close "
            ></i>
            
          </div> 
       
          <div class="modal-body view_student_info">
                 
                               
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<!-- <button>lima</button> -->











<!-- modul end -->



    
<div class="container-fluid shadow mt-4 text-capitalize student_all_info profile_all ">
      <div class="row ">

            <div class="col shadow  m-auto  col-md-10 col-sm-10 student_profile ">
 <?php
   while($row=$show_look->fetch_assoc())
   {
 

 ?>


<div class="card ">
                       <div class="card-img shadow">
                              
                       </div>
                       <div class="card-body">
                              <div class="info">
                                  <span>ID: </span>
                                  <span><?php echo $row["student_id"]; ?></span>
                              </div>
                              <div class="info">
                                <span>name: </span>
                                <span><?php echo $row["student_name"]; ?></span>
                            </div>
                            <div class="info">
                              <span>f/name: </span>
                              <span><?php echo $row["student_father_name"]; ?></span>
                          </div>
                          <div class="info">
                              <span>gender: </span>
                              <span><?php echo $row["gender"]; ?></span>
                          </div>

                          <div class="info">
                              <span>phone: </span>
                              <span><?php echo $row["student_phone"]; ?></span>
                          </div>

                          <div class="info">
                              <span>emrcancy phone : </span>
                              <span><?php echo $row["student_emercany_phone"]; ?></span>
                          </div>

                          <div class="info">
                              <span>student CINC: </span>
                              <span><?php echo $row["student_cninc"]; ?></span>
                          </div>

                          <div class="info">
                              <span>Father CINC: </span>
                              <span><?php echo $row["student_father_cninc"]; ?></span>
                          </div>

                          <div class="info">
                              <span>address: </span>
                              <span><?php echo $row["student_address"]; ?></span>
                          </div>

                          <div class="info">
                              <span>email: </span>
                              <span><?php echo $row["student_email"]; ?></span>
                          </div>

                          <div class="info">
                              <span>description: </span>
                              <span><?php echo $row["student_description"]; ?></span>
                          </div>
                       </div>
           </div>



                  
<?php  }?>

<div class="container-fluid text-capitalize  mt-4 course_info">
   
         <div class="row">
            <div class="header">
                  <span>course information</span>
                </div>
            <div class="col mt-3 "> 
                    <table class="table text-center">
                        <thead>

                        <tr>
                              <th>course name</th>
                              <th>fee</th>
                              <th>discount</th>
                              <th>addmission</th>
                              <th colspan="3">action</th>
                        </tr>
                  </thead>
                  <?php  
   while($show=$show_fee->fetch_assoc())
   {
 ?>                  
                              <tr>
                                    <td><?php echo $show["course_name"];?></td>
                                    <td><?php echo $show["course_fee"];?></td>
                                    <td><?php echo $show["discount"];?></td>
                                    <td><?php echo $show["totl_fee"];?></td>
                                    <td><i class="fa-solid fa-trash delete_fee" id="<?php echo $show["ID"];  ?>"></i></td>
                                    <td><i class="fa-solid fa-pen-to-square update_fee"  id="<?php echo $show["ID"];  ?>"  data-bs-toggle="modal" data-bs-target="#add_info"  ></i></td>
                               
                                    <td>
                                    <a href="ricipt.php?id=<?php echo $show["ID"];?>">
                                       <i class="fa-solid fa-pen"></i>
                                     </a>
                                    </td>
                                   
                              </tr>

<?php }?>
                              <tr  class="footer">
                                    <th>grand total</th>
                                    <th></th>
                                    <th><?php echo $dis_re;?></th>
                         
                                    <th><?php echo $fee_res; ?></th>
                                    
                              </tr>
                             
                    </table>
            </div>
         </div>
</div>





<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>

<script>
      $(document).ready(function()
      {
            // delete_fee
            $(document).on("click",".delete_fee",function()
             {
                        delete_fee=$(this).attr("id");
                        $.ajax({
                            url:"joinajax.php",
                            type:"POST",
                            data:{delete_fee:delete_fee},
                            success:function(data)
                            {
                            alert(data);
                                      
                            }
      
      });

});
// update_fee
$(document).on("click",".update_fee",function()
             {
                  update_fee=$(this).attr("id");
                        $.ajax({
                            url:"joinajax.php",
                            type:"POST",
                            data:{update_fee:update_fee},
                            success:function(data)
                            {
                               $(".view_student_info").html(data);
                                      
                            }
      
      });

});
// submit_fee

$(document).on("submit","#submit_fee",function(e)
    {
      e.preventDefault();
        $("#insert_fee").val("insert_fee");
   
      $.ajax({
        url:"joinajax.php",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                  //     alert(data);
                        
                    }
           });
      
});

});
</script>



</body>
</html>