<?php
session_start();

include("code.php");

include("meunu.php");
$teacher_obj=new Teacher();
$show="";
$show_salary="";
$before_salary="";
$salary="";
$sum_total="";
$before="";
if(isset($_SESSION["id"]) && $_SESSION["user"] && $_SESSION["pas"])
{
      $id=$_SESSION["id"];
      $show=$teacher_obj->update_teacher_id($id);
      $show_salary=$teacher_obj->select_salary($id);
      $sum_total=$teacher_obj->sum_total($id);
      $salary=implode(",",$sum_total);
      $before_salary=$teacher_obj->sum_before($id);
      $before=implode(",",$before_salary);
   


}
else{
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
    <title>profile</title>
</head>
<body>




<div class="container-fluid teacher_profile text-capitalize mt-5">

      <div class="row">
              
            <div class="col mt-4">

 <?php
  while($row=$show->fetch_assoc())
  {

?>

            <div class="card " id="personal_info">
                  <div class="card-img shadow mt-2">
                  <?php  echo '<img src="data:image;base64,'.$row['employ_imge'].'; ">'; ?>
                  </div>
                  <div class="card-body ">
                       <table>
                        <tr>
                              <td>ID: </td>
                              <td><?php echo $row["employ_id"];   ?></td>
                        </tr>
                          <tr>
                               <td>name:  </td>
                               <td><?php echo $row["employ_name"];   ?></td>
                          </tr>
                          <tr>
                                <td>email: </td>
                                       <td><?php echo $row["employ_email"];   ?></td>
                          </tr>
                          <tr>
                                <td>educatio: </td>
                                       <td><?php echo $row["employ_education"];   ?></td>
                          </tr>
                          <tr>
                              <td>subject: </td>
                              <td><?php echo $row["employ_subject"];   ?></td>
                        </tr>
                        <tr>
                              <td>gender: </td>
                              <td><?php echo $row["employ_gender"];   ?></td>
                        </tr>
                        <tr>
                              <td>address: </td>
                              <td><?php echo $row["employ_address"];   ?></td>
                        </tr>
                        <tr>
                              <td>salary: </td>
                              <td><?php echo $row["employ_salary"];   ?></td>
                        </tr>
                        <tr>
                              <td>description: </td>
                              <td><?php echo $row["employ_description"];   ?></td>
                        </tr>
      
                       
        
                       </table>
                       <?php }?>  
                  </div>
            
         </div>

   <div class="card" id="salary_info">
       <table class="table">

                  <tr>
                        <th>month</th>
                        <th>salary</th>
                        <th>before</th>
                        <th>total</th>
                        <th colspan="2">action</th>
                  </tr>
                  <?php
while($row_salry=$show_salary->fetch_assoc())
{
      

?>
                  <tr>
                    <td><?php echo $row_salry["month"]; ?></td>
                    <td><?php echo $row_salry["teacher_salary"]; ?></td>
                    <td><?php echo $row_salry["before_salary"]; ?></td>
                    <td><?php echo $row_salry["total_salry"]; ?></td>
                    <td><i class="fa-solid fa-trash"  style="color:red;"   id="<?php echo $row_salry["id"];   ?>"></i></td>
                    <td><i class="fa-solid fa-pen-to-square"   id="<?php echo $row_salry["id"];   ?>"  data-bs-toggle="modal" data-bs-target="#update_salary"></i></td>
                  </tr>
<?php }?> 

                  <tr id="footer">
                        <td colspan="2">grand total</td>
                        <td><?php echo $before;  ?></td>
                        <td ><?php echo $salary; ?></td>
                        
                  </tr>

           



       </table>

        
   </div>

</div>
</div>


<div class="container-fluid update_salary">
      <div class="row">
          <div class="col">


  <div class="modal fade" id="update_salary" tabindex="-1" aria-labelledby="update_salaryLabel" aria-hidden="true" class="text-capitalize">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="update_salaryLabel">update salary</h5>
                  
            </button>
            <i class="fa-solid fa-x"
            data-bs-dismiss="modal" 
            aria-label="Close "
            ></i>
            
          </div> 
       
          <div class="modal-body update_salary_body">
                   


                  
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.js"></script>
<script>
      $(document).ready(function()
      {
             $(document).on("click",".fa-trash",function(e)
             {
                    salary_delet=$(this).attr("id");
                    $.ajax({
                              url:"joinajax.php",
                              type:"POST",
                              data:{salary_delet:salary_delet},
                              success:function(data)
                              {
                                    alert(data);
                              }
                    });
             });
            // fa-pen-to-square

            $(document).on("click",".fa-pen-to-square",function(e)
             {
                    salary_update=$(this).attr("id");
                    $.ajax({
                              url:"joinajax.php",
                              type:"POST",
                              data:{salary_update:salary_update},
                              success:function(data)
                              {
                                  $(".update_salary_body").html(data);
                              }
                    });
             });


             
$(document).on("submit","#update_salary",function(e)
    {
      e.preventDefault();
        $("#update_salary_input").val("update_salary_input");
   
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
      
})

      });
</script>




</body>
</html>