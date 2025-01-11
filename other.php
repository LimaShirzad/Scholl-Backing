<?php
session_start();
include("code.php");
if(isset($_POST["see"]))
{
    $id=$_POST["see"];
    $_SESSION["id"]=$id;
}
if(isset($_POST["look"]))
{
    $student_look=$_POST["look"];
    $_SESSION["look_me"]= $student_look;
}
if(isset($_POST["hidden_login"]) && $_POST["hidden_login"]=="cheack_login")
{
   $user=$_POST["user"];
   $pas=$_POST["pasword"];
   $user_obj=new user();
   $show=$user_obj->login($user,$pas);
 
// if(empty($user) || empty($pas))
// {
//     echo "Fill All filed";
// }


}




?>