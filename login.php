<?php
session_start();
include("code.php");
$err="";
$user_obj=new user();
if(isset($_POST["login"]))
{
   $user=$_POST["user"];
   $pas=$_POST["pasword"];
   $cheack=$user_obj->login($user,$pas);
   if(empty($user) || empty($pas))
   {
        $err="Please Fill all input filed";
   }else{
   if($cheack)
   {
       $_SESSION["user"]=$user;
       $_SESSION["pas"]=$pas;
       header("location:studentinfo.php");
   }else{
      $err="Reocrd Not Found";
   }
}
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
    
        <div class="container-fluid   mt-5 adim-form text-capitalize">
                <div class="row m-1">
                  <!-- <div class="col col-xl-5 col-lg-5   login_img">
                        <img src="picture/login.jpg" class="img-fluid">
                  </div> -->
                  <div class="col mt-4 col-xl-5 col-lg-5 login shadow m-auto">
                       <form class="login_form" method="POST">
                             
                       <div class="card">
                               <span>admin login</span>
                          <div class="card-body mt-5">
                                 <div class="form-group mt-5">
                                        <div id="err" style="color:red;" class="fw-bold"> 
                                                <?php echo $err; ?>
                                        </div>
                                         <label >user name</label>
                                         <input type="text" class="form-control" placeholder="User Name"
                                         id="user" name="user"
                                         value="<?php
                                         if(isset($_POST["user"]))
                                         {
                                                echo $_POST["user"];
                                         }
                                         
                                         ?>"
                                         >
                                         
                                 </div>

                                 <div class="form-group mt-3">
                                  <label >pasword</label>
                                  <input type="password" class="form-control" placeholder="pasword" id="pasword" name="pasword"
                                  value="<?php
                                         if(isset($_POST["pasword"]))
                                         {
                                                echo $_POST["pasword"];
                                         }
                                         
                                         ?>"
                                  
                                  
                                  >
                                  <i class="fa-solid fa-eye-slash" id="eye"></i>
                          </div>
                          <div class="form-group mt-5">
                            <button class="btn"  type="submit" name="login">login</button>
                            <input type="hidden" id="hidden_login" name="hidden_login">
                           </div>
                          </div>
                         
                       </div>

                     
                       </form>
                  </div>
                </div>
        </div>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>   
<script src="jquery-3.7.1.js"></script>
<script src="script.js"></script>
</body>
</html>