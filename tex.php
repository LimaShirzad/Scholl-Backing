<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["pas"])
{
      header("location:studentinfo.php");
}else{
    exit();
}


?>