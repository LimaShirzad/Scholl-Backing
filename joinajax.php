<?php
include("code.php");
$student_obj=new student();

if(isset($_POST["student_add"]) && $_POST["student_add"]=="insert_student_to")
{

  $img=$_FILES["img"]["name"];
  $tmp=$_FILES["img"]["tmp_name"];

  $name=$_POST["name"];
  $fname=$_POST["fname"];
  $phone=$_POST["phone"];
  $erm=$_POST["emphon"];
  $s_cinc=$_POST["s_cinc"];
  $f_cinc=$_POST["f_cinc"];
  $email=$_POST["email"];
  $addres=$_POST["address"];
  $info=$_POST["description"];
  $gender=$_POST["gender"];

  $check_data=$student_obj->cheack();

  if(empty($img) ||empty($name) || empty($fname) || empty($gender) || empty($phone) || empty($erm)
  || empty($s_cinc) || empty($f_cinc) || empty($addres) || empty($email) || empty($info))
  {
      echo "fill all input filed";
  }

  else{
      
    while($row=$check_data->fetch_assoc())
    {
        if($row["student_phone"]==$phone)
        {
           echo "phone number is already exict";
           
        }else{

           if($row["student_emercany_phone"]==$erm)
           {
            echo "emerchnay number is laready exict";
            }

           else{
            if($row["student_cninc"]==$s_cinc)
              {
                      echo " CINIC is already exict";
               }
              else{
                     if($row["student_father_cninc"]==$f_cinc){
                      echo " father CININ is already exixct";
                     }else{
                      if($row["student_email"]==$email){
                        echo "this email is exict";
                          
                      }else{
              
$path="picture/".$img;
 move_uploaded_file($tmp,$path);
 $insert=$student_obj->insert_student($name,$fname,$gender,$phone,$erm,$s_cinc,$f_cinc,$addres,$email,$img,$info); 
              if($insert)
              {
                echo "inserted";
              }
            

}
                        
                     }
                    
          }


        }



        }
       
      
      }
      }
     
}

$limt_per_page=6;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;


// $show_course=$course_obj->select_spcific_course($offset,$limt_per_page);

if(isset($_POST["action"]) && $_POST["action"]=="Select")
{ 


    $show_student=$student_obj->select_spcific_student($offset,$limt_per_page);
    $out="";
    $out.='
    <div class="col table-responsive shadow p-0 text-capitalize
      table-hover
    ">
    <table class="table  text-center">
       <thead class="text-light p-1">
           <tr>
              <th scope="col">ID</th>
              <th scope="col">name</th>
              <th scope="col">f/name</th>
              <th scope="col">img</th>
              <th scope="col" colspan="3">action</th>


            
             
           </tr>
       </thead>';


       while($row=$show_student->fetch_assoc())
       {
        $out.='
        <tbody>
        <tr>
            <td>'.$row['student_id'].'</td>
            <td>'.$row['student_name'].'</td>
            <td>'.$row['student_father_name'].'</td>
            <td>
            <img src="picture/'.$row['img'].'" class="img-fluid" style="height:40px; width:50px;   "
         
            >
            
            </td>
        
            <td>
                
                <i class="fa-solid fa-pen-to-square update" data-bs-toggle="modal" data-bs-target="#update"
                id='.$row['student_id'].'
                 
                ></i>
               
            </td>
            <td>
             
                <i class="fa-solid fa-trash  delete  "
                id='.$row['student_id'].'
                ></i>
         
            </td>
            <td>
                <!-- <a href="studentinfo.html"> -->
                <i class="fa-solid fa-eye view" data-bs-toggle="modal" data-bs-target="#view"
                id='.$row['student_id'].'
                ></i>
               <!-- </a> -->
            </td>
            
            
        </tr>
 
 
        
        </tbody>
        
    
        
        
        ';
       }
       $out.='</table>';

       $all= $student_obj->select_record();
       $total=mysqli_num_rows($all);
       $total_pag=ceil($total/$limt_per_page);
       $out.='<div id="pagnation">';
       for($i=1;$i <= $total_pag;$i++)
       {
        if($i==$page)
        {
          $class="active";
        }else{
          $class="";
        }
         $out.="  
           <a class='{$class}' href='' id='{$i}'>{$i}</a>";
       }
       
       $out.='</div>';
 echo $out;

}

if(isset($_POST["action"]) && $_POST["action"]=="delet")
{
 

    $id=$_POST["id"];
    $student_obj->delet_student($id);
}
// select all student record end

// update id start
if(isset($_POST["edit_id"]))
{
  
      $out='';
      $update_id=$_POST["edit_id"];
      $show_update_record=$student_obj->update_student_id($update_id);
      while($row=$show_update_record->fetch_assoc())
      {
        $out.='
        <form id="update_student_form" method="POST" >
                
                       <div class="form-group" >
                             <input type="hidden" class="form-control"
                             name="eid" id="eid" 
                              value="'.$row["student_id"].'"
                             >
                       </div>
                    <div class="form-group justify-content-center ">
                         <div class="form-box w-100">
                         <label >name</label>
                        <input type="text" class=" form-control" name="ename" id="ename"
                        value="'.$row["student_name"].'"
                        
                        >
                        </div>

                        <div class="form-box w-100">
                         <label >f/name</label>
                        <input type="text" class=" form-control" name="efname" id="efname"  
                        value="'.$row["student_father_name"].'">
                        </div>
                     </div>


                     <div class="form-group ">
                         <div class="form-box  w-100">
                         <label >phone</label>
                        <input type="text" class=" form-control" name="ephone" id="ephone"  value="'.$row["student_phone"].'">
                        </div>

                        <div class="form-box  w-100">
                         <label >emercany phone</label>
                        <input type="text" class=" form-control" name="emr_phone" id="emr_phone"  value="'.$row["student_emercany_phone"].'">
                        </div>
                     </div>



                     <div class="form-group ">
                         <div class="form-box  w-100">
                         <label >student CINC</label>
                        <input type="text" class=" form-control" name="es_cinc" id="es_cinc"  value="'.$row["student_cninc"].'">
                        </div>

                        <div class="form-box  w-100">
                         <label >f/CINC</label>
                        <input type="text" class=" form-control" name="ef_cinic" id="ef_cinic"  value="'.$row["student_father_cninc"].'">
                        </div>
                     </div>

                 
                     <div class="form-group ">
                         <div class="form-box  w-100">
                         <label >address</label>
                        <input type="text" class=" form-control" name="eaddress" id="eaddress"  value="'.$row["student_address"].'">
                      </div>

                      <div class="form-box  w-100">
                         <label >email</label>
                        <input type="email" class=" form-control" name="eemail" id="eemail"  value="'.$row["student_email"].'">
                        </div>
                     </div>

                      <div class="form-group  last">
                         <div class="form-box  w-100">
                         <label >description</label>
                         <textarea  class="form-control" name="edes" id="edes">'.$row["student_description"].' </textarea>
                        <input type="hidden" class=" form-control" name="update_student" id="update_student" 
                         value="action">
                        </div>


                      </div>

                      <div class="form-group ">
                         <div class="gender m-2">
                          <label >gender:</label>
                          
                         <label >meale</label>
                        <input type="radio" value="Meal" name="gender" id="gender" checked>
                        <label >female</label>
                        <input type="radio"  value="Female" name="gender" id="gender">
                      </div>
                      </div>







                      <div class="form-group   last">
                         <div class="form-box">
                         <label >image</label>
                        <input type="file" class=" form-control" name="efile" id="efile">
                        <input type="hidden" value="'.$row["img"].'" name="old" id="old">
                        </div>
                    </div>

                    <div class="form-group mt-2">
 
            <button type="submit" class="btn"  id="update" name="update">update</button>
            <input type="hidden" value="update" id="update_student_input" name="update_student_input">
                   
                    </div>

       </form>
        
        
        ';

      }
   
echo $out;
      
}
// update the student start
if(isset($_POST["update_student_input"]))
{
  $new_img="";
  $new_tmp="";
    $file=$_FILES["efile"]["name"];
    $tmp=$_FILES["efile"]["tmp_name"];

    $old=$_POST["old"];

    $id=$_POST["eid"];
    $name=$_POST["ename"];
    $fname=$_POST["efname"];
    $phon=$_POST["ephone"];
    $emr=$_POST["emr_phone"];
    $s_cinc=$_POST["es_cinc"];
    $f_cinc=$_POST["ef_cinic"];
    $add=$_POST["eaddress"];
    $email=$_POST["eemail"];
    $info=$_POST["edes"];
    $gender=$_POST["gender"];
    if(!empty($file))
    {
     $new_img=$file;
     $new_tmp=$tmp;
   
    }
    else{
     $new_img=$old;
    }

    if(!empty($name) && !empty($fname)  && !empty($phon) && !empty($emr)   
    && !empty($s_cinc) && !empty($f_cinc) && !empty($add) && !empty($email) && !empty($info))      
    {
     $path="picture/".$new_img;
    move_uploaded_file($new_tmp,$path);
    $reslt=$student_obj->update_student($id,$name,$fname,$gender,$phon,$emr,$s_cinc,$f_cinc,$add,$email,$new_img,$info);
    if($reslt)
    {
      echo "Reocrd updated";
    }else{
      echo "record not update";
    }

    }else{
      echo "fill all input filed";
    }
   
    // $path="picture/".$new_img;
    // move_uploaded_file($new_tmp,$path);
    // $reslt=$student_obj->update_student($id,$name,$fname,$gender,$phon,$emr,$s_cinc,$f_cinc,$add,$email,$new_img,$info);
    



}

// update user en

// view student profile start
if(isset($_POST["view_id"]))
{
     $out="";
          $id=$_POST["view_id"];
          $show_profile=$student_obj->student_profile($id);

     while($profil=$show_profile->fetch_assoc())
     {


    $out.='
    
    <div class="card ">
    <table class="text-capitalize">
            <tr>
                <th class="text-center">
                      <div class="img shadow">
                            <img src="picture/'.$profil["img"].'"  class="img-fluid">
                      </div>
                      
                </th>
              
            </tr>
               <tr>
                    <td>
                      <table class="mt-2 ">
                            <tr >
                                  <td >ID </td>
                                  <td  width="50px"></td>
                                  <td>'.$profil["student_id"].'</td>
                            </tr>

                           
                            <tr>
                                  <td> name</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_name"].'</td>
                            </tr>
                            <tr>
                            <td>father name</td>
                            <td  width="10px"></td>
                             <td>'.$profil["student_father_name"].'</td>
                           </tr>

                            <tr>
                                  <td>gender</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["gender"].'</td>
                            </tr>

                            <tr>
                                  <td>phone</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_phone"].'</td>
                            </tr>

                            <tr>
                                  <td>emercancy phone</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_emercany_phone"].'</td>
                            </tr>

                            <tr>
                                  <td>student CNINC</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_cninc"].'</td>
                            </tr>

                            <tr>
                                  <td>fahter CNINC</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_father_cninc"].'</td>
                            </tr>

                            <tr>
                                  <td>address</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_address"].'</td>
                            </tr>
                            <tr>
                                  <td>email</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_email"].'</td>
                            </tr>
                            <tr>
                                  <td>description</td>
                                  <td  width="10px"></td>
                                   <td>'.$profil["student_description"].'</td>
                            </tr>


                      </table>
                    </td>
               </tr>
    </table>
</div
    
 ';
     }

echo $out;

}




// view student profile end
// search start
$limt_per_page=4;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;

if(isset($_POST["search"]))
{
   $search=$_POST["search"];
 $filter=$student_obj->serach_student($search);
 $show_student=$student_obj->select_spcific_student($offset,$limt_per_page);
    $out="";
   $out.='
   <div class="col table-responsive shadow p-0 text-capitalize
     table-hover
   ">
   <table class="table text-center">
      <thead class="text-light p-1">
          <tr>
             <th scope="col">ID</th>
             <th scope="col">name</th>
             <th scope="col">f/name</th>
             <th scope="col">img</th>
             <th scope="col" colspan="3">action</th>


           
            
          </tr>
      </thead>
   ';

      while($row=$filter->fetch_assoc())
      {
       $out.='
       <tbody>
       <tr>
           <td>'.$row['student_id'].'</td>
           <td>'.$row['student_name'].'</td>
           <td>'.$row['student_father_name'].'</td>
           <td>
           <img src="picture/'.$row['img'].'" class="img-fluid" style="height:54px; width:60px;   "
        
           >
           
           </td>
       
           <td>
               
               <i class="fa-solid fa-pen-to-square update" data-bs-toggle="modal" data-bs-target="#update"
               id='.$row['student_id'].'
                
               ></i>
              
           </td>
           <td>
            
               <i class="fa-solid fa-trash  delete  "
               id='.$row['student_id'].'
               ></i>
        
           </td>
           <td>
               <!-- <a href="studentinfo.html"> -->
               <i class="fa-solid fa-eye view" data-bs-toggle="modal" data-bs-target="#view"
               id='.$row['student_id'].'
               ></i>
              <!-- </a> -->
           </td>
           
           
       </tr>


       
       </tbody>
       
   
       
       
       ';
      }
      $out.='</table>';

 

      $all= $student_obj->select_record();
      $total=mysqli_num_rows($all);
      $total_pag=ceil($total/$limt_per_page);
      $out.='<div id="pagnation">';
      for($i=1;$i <= $total_pag;$i++)
      {
       if($i==$page)
       {
         $class="active";
       }else{
         $class="";
       }
        $out.="  
          <a class='{$class}' href='' id='{$i}'>{$i}</a>
      ";
      }
      
      $out.='</div>';
        echo $out;
  
}
// search end
// student select start
$limt_per_page=6;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;

if(isset($_POST["action"]) && $_POST["action"]=="select_admision")
{
  $show_student=$student_obj->select_spcific_student($offset,$limt_per_page);
  $out='';
  $out.='
  <table class="table text-capitalize text-center">
  <tr>
        <thead>
              <th>ID</th>
              <th>name</th>
              <th>f/name</th>
              <th>img</th>
              <th colspan="2">action</th>
        </thead>
  </tr>
  
  
  ';

  while($row=$show_student->fetch_assoc())
  {
     $out.='
     <tbody>
     <tr>
  
           <td>'.$row["student_id"].'</td>
           <td>'.$row["student_name"].'</td>
           <td>'.$row["student_father_name"].'</td>
           <td>
              <img src="picture/'.$row["img"].'" height="40px" widht="40px">
           </td>
           <td>
               <i class="fa-solid fa-add add_student" data-bs-toggle="modal" 
               data-bs-target="#add_info"  id="'.$row["student_id"].'" ></i>       
           </td>
           <td>
           <a href="viewprofile.php">
           <i class="fa-solid fa-eye eye look_student" id="'.$row["student_id"].'"
                 
                 ></i>
                 </a>
                 </td>
     
     
     </tr>

     


</tbody>

     
     ';
  }
 $out.='</table>';
 

 $all= $student_obj->select_record();
 $total=mysqli_num_rows($all);
 $total_pag=ceil($total/$limt_per_page);
 $out.='<div id="pagnation">';
 for($i=1;$i <= $total_pag;$i++)
 {
  if($i==$page)
  {
    $class="active";
  }else{
    $class="";
  }
   $out.="  
     <a class='{$class}'  href='' id='{$i}'>{$i}</a>";
 }
 
 $out.='</div>';
echo $out;

}
// student selct end
// show slect box of studen start
$course_obj=new course();
if(isset($_POST["action"]) && $_POST["action"]=="slect_input")
{
     $course= $course_obj->select_all_course_recoed();
     $out='';
     $out.=' 
  
     <label>add course</label>
     <select name="course" id="course" class="form-select "  aria-label="Default select example">';

     while($row=$course->fetch_assoc())
     {

        $out.='
   
             <option value="'.$row["course_id"].'">'.$row["course_name"].'</option>
     
      
        ';

      
     }
     $out.='  </select>';

     echo $out;

}

// show select box ofstudent end
//search record start
if(isset($_POST["search_record"]))
{
  $id=$_POST["search_record"];
  $show=$student_obj->serach_student($id);
  $show_student=$student_obj->select_spcific_student($offset,$limt_per_page);
  $out='';
  $out.='
  <table class="table text-capitalize text-center">
  <tr>
        <thead>
              <th>ID</th>
              <th>name</th>
              <th>f/name</th>
              <th>img</th>
              <th colspan="2">action</th>
        </thead>
  </tr>
  
  
  ';

  while($row=$show->fetch_assoc())
  {
     $out.='
     <tbody>
     <tr>
  
           <td>'.$row["student_id"].'</td>
           <td>'.$row["student_name"].'</td>
           <td>'.$row["student_father_name"].'</td>
           <td>
              <img src="picture/'.$row["img"].'" height="50px" widht="50px">
           </td>
           <td>
               <i class="fa-solid fa-add add_student" data-bs-toggle="modal" 
               data-bs-target="#add_info"  id="'.$row["student_id"].'" ></i>       
           </td>
           <td>
   
           <i class="fa-solid fa-eye look_student" id="'.$row["student_id"].'"></i>

          </td>
     
     
     </tr>

     


</tbody>

     
     ';
  }
 $out.='</table>';
 

 $all= $student_obj->select_record();
 $total=mysqli_num_rows($all);
 $total_pag=ceil($total/$limt_per_page);
 $out.='<div id="pagnation">';
 for($i=1;$i <= $total_pag;$i++)
 {
  if($i==$page)
  {
    $class="active";
  }else{
    $class="";
  }
   $out.="  
     <a class='{$class}' href='' id='{$i}'>{$i}</a>";
 }
 
 $out.='</div>';
echo $out;
}

// search record end
if(isset($_POST["add_id"]))
{
  $id=$_POST["add_id"];
  $show=$student_obj->select_student($id);
  echo json_encode($show);

}
if(isset($_POST["update_fee"]))
{
  $out='';
  $id=$_POST["update_fee"];
   $show=$student_obj->select_info($id);
    while($row=$show->fetch_assoc())
    {
        $out.='
    <form id="submit_fee">
        <div class="form-group">
              <div class="form-box">
              <label>ID</label>
              <input type="text" class="form-control mt-1" readonly
              name="id"  id="id"
              value="'.$row["S_ID"].'"
              >
          </div>

          <div class="form-box">
              <label>name</label>
              <input type="text" class="form-control mt-1" readonly
              name="name" id="name"
              value="'.$row["student_name"].'"
              >
          </div>
        </div>

        <div class="form-group">
              <div class="form-box">
              <label>f/name</label>
              <input type="text" class="form-control mt-1" readonly
              name="fname" id="fname"
              value="'.$row["student_father_name"].'"
              >
          </div>

          <div class="form-box">
          <label>course</label>
              <input type="text" class="form-control mt-1" readonly
              name="course" id="course"
              value="'.$row["course_name"].'"
              >
          </div>
        </div>


        
        <div class="form-group">
              <div class="form-box">
              <label>fee</label>
              <input type="text" class="form-control mt-1" readonly
              name="fee" id="fee"
              value="'.$row["course_fee"].'"
              >
          </div>

          <div class="form-box">
          <label>discount</label>
              <input type="number" class="form-control mt-1" 
              name="dis" id="dis"
      
              >
          </div>
        </div>


        <div class="form-group mt-1">
              <button class="btn m-1" >add</button>
              <input type="hidden" name="insert_fee" id="insert_fee">
              <input type="hidden" name="change_id" id="change_id"  value="'.$row["ID"].'">
              <input type="hidden" name="course_id" id="course_id"  value="'.$row["course_id"].'">
        </div>
          
    </form>
        
        
        
        ';
    }

    echo $out;



}

if(isset($_POST["insert_fee"]) && $_POST["insert_fee"]=="insert_fee")
{
    $student_id=$_POST["id"];
    $fee=$_POST["fee"];
    $discount=$_POST["dis"];
    $change=$_POST["change_id"];
    $course_id=$_POST["course_id"];
    $sum=$fee-$discount;//an totla fee

    $reslt=$student_obj->update_student_course($student_id,$change,$discount,$sum,$course_id);
    if($reslt)
    {
      echo "Reocrd Update";
    }


}
if(isset($_POST["insert_to"]) && $_POST["insert_to"]=="insert_student")
{
  // print_r($_POST);
  $student_id=$_POST["id"];
  $course_id=$_POST["course"];
  // $insert=$student_obj->insert_student_course($student_id,$course_id);
  // if($insert)
  // {
  //   echo "record inseted";
  // }else{
  //   echo "record not insered";
  // }

  //  select_student_data
  $show=$student_obj->select_student_data();
  //  while($row=$show->fetch_assoc())
  //  {
  //       if($row["S_ID"]==$student_id && $row["C_ID"]==$course_id)
  //       {
  //         echo "This course is already taken";
  //       }
  //       else{
  //         echo "noo";
  //       }
       
  //       echo "<br>";

  //  }
      
 $insert=$student_obj->insert_student_course($student_id,$course_id);
 if($insert)
 {
  echo "Reocrd inseted";
 }
      
}

// insert course start

if(isset($_POST["insert_course"]) && $_POST["insert_course"]=="insert")
{
  // $err="";
    $coures_name=trim($_POST["course_name"]);
    $coures_duration=trim($_POST["course_duration"]);
    $coures_fee=trim($_POST["course_fee"]);
    $course_info=trim($_POST["info"]);

    $cheack=$course_obj->cheak_course();
    if(!empty($coures_name) || !empty($coures_duration) || !empty($coures_fee) || !empty($coures_info))
    {
      while($row=$cheack->fetch_assoc())
      {
        if($row["course_name"]!=$coures_name)
        {
          $reult=$course_obj->insert_course($coures_name,$coures_duration,$coures_fee,$course_info);
          if($reult)
          {
            echo "inserted";
          }
          
        }else{
         
          echo "this course name is already exit";
        }
        // break;
      }
  
    }else {
      echo "fill all input filed";
    }
   

    // $reult=$course_obj->insert_course("web devolpent","3","1200","learn html css js");


}
$limt_per_page=6;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;

if(isset($_POST["action"]) && $_POST["action"]=="select_course")
{
  $show_course=$course_obj->select_spcific_course($offset,$limt_per_page);
  $out="";
  $out.='

        <table class="table " >
        <thead>
      <tr>
      <th scope="col">id</th>
      <th scope="col">course name</th>
      <th scope="col">duration</th>
      <th scope="col">fees</th>
 
      <th scope="col" colspan="3">action</th>
      </tr>
      </thead>
  
  ';
  while($row=$show_course->fetch_assoc())
  {
    $out.='
    <tr>
    <td>'.$row["course_id"].'</td>
    <td>'.$row["course_name"].'</td>
    <td>'.$row["course_duration"].'  month</td>
    <td>'.$row["course_fee"].'</td>

    <td> <i class="fa-solid fa-pen-to-square update_course"   data-bs-toggle="modal" data-bs-target="#update_course" id='.$row["course_id"].'></i></td>
    <td> <i class="fa-solid fa-trash  delete_course" id='.$row["course_id"].' ></i></td>
    <td> <i class="fa-solid fa-eye  view_course" data-bs-toggle="modal" data-bs-target="#view_course_modul" 
    id='.$row["course_id"].' 
    ></i></td>
   
   </tr>
    ';

 
   }
$out.='</table>';
// echo $out;


$all= $course_obj->select_all_course_recoed();
$total=mysqli_num_rows($all);
$total_pag=ceil($total/$limt_per_page);
$out.='<div id="pagnation">';
for($i=1;$i <= $total_pag;$i++)
{
 if($i==$page)
 {
   $class="active";
 }else{
   $class="";
 }
  $out.="  
    <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
}

$out.='</div>';
  echo $out;


}
// insert course end

// delet course start
if(isset($_POST["action"]) && $_POST["action"]=="delet_course")
{
  $id=$_POST["c_id"];
 $re= $course_obj->Delet_course($id);
 if($re)
 {
  echo "Dlelet";
 }
 
}

// delet course end
// serach course_Start
if(isset($_POST["course_data"]))
{
  $id=$_POST["course_data"];
  $show_course=$course_obj->select_reocrd($id);
  $show=$course_obj->select_spcific_course($offset,$limt_per_page);
  $out="";
  $out.='

        <table class="table " >
        <thead>
      <tr>
      <th scope="col">id</th>
      <th scope="col">course name</th>
      <th scope="col">duration</th>
      <th scope="col">fees</th>

      <th scope="col" colspan="3">action</th>
      </tr>
      </thead>
  
  ';
  while($row=$show_course->fetch_assoc())
  {
    $out.='
    <tr>
    <td>'.$row["course_id"].'</td>
    <td>'.$row["course_name"].'</td>
    <td>'.$row["course_duration"].' month</td>
    <td>'.$row["course_fee"].'</td>

    <td> <i class="fa-solid fa-pen-to-square update_course"   data-bs-toggle="modal" data-bs-target="#update_course" id='.$row["course_id"].'></i></td>
    <td> <i class="fa-solid fa-trash  delete_course" id='.$row["course_id"].' ></i></td>
    <td> <i class="fa-solid fa-eye view_course " data-bs-toggle="modal" data-bs-target="#view_course_modul" id='.$row["course_id"].'></i></td>
   
   </tr>
    ';


   }
$out.='</table>';

$all= $course_obj->select_all_course_recoed();
$total=mysqli_num_rows($all);
$total_pag=ceil($total/$limt_per_page);
$out.='<div id="pagnation">';
for($i=1;$i <= $total_pag;$i++)
{
 if($i==$page)
 {
   $class="active";
 }else{
   $class="";
 }
  $out.="  
    <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
}

$out.='</div>';
  echo $out;


}
// search course end
// view course start
if(isset($_POST["view_course_id"]))
{
  $out='';
  $id=$_POST["view_course_id"];
  $show=$course_obj->view_course($id);

  while($row=$show->fetch_assoc())
  {
    $out.='
    <div class="card ">
    <table class="text-capitalize">
           
               <tr>
                    <td>
                          <table>
                                  <tr>
                                        <td><span>course name:</span></td>
                                        <td><span>'.$row["course_name"].'</span></td>
                                  </tr>
                                  <tr>
                                        <td><span>fee:</span></td>
                                          <td><span>'.$row["course_fee"].'</span></td>
                                  </tr>
                                  <tr>
                                        <td><span>duration:</span></td>
                                          <td><span>'.$row["course_duration"].'</span></td>
                                  </tr>
                              
                                  <tr>
                                        <td><span>information:</span></td>
                                       
                                  </tr>
                                  <tr class="mt-5">
                                        <td>
                                              <p>'.$row["course_discription"].'</p>
                                        </td>
                                  </tr>
                                  
                          </table>
                    </td>
               </tr>
    </table>
</div>
    
    
    ';
  }

 echo $out;



}

// view course end
// satrt of user inset
$user_obj=new user();

if(isset($_POST["action"]) && $_POST["action"]=="insert_user")
{
  $user_img=$_FILES["user_img"]["name"];
  $user_tmp=$_FILES["user_img"]["tmp_name"];
  $name=$_POST["user_name"];
  $user_stute=$_POST["user_stutue"];
  $user_name=$_POST["user_user_name"];
  $user_pasword=$_POST["user_pasword"];
   $user_phone=$_POST["user_phone"];
  $user_info=$_POST["user_info"];

   if(!empty($name) && !empty($user_stute) && !empty($user_name) && !empty($user_pasword) && !empty($user_phone) && !empty($user_info) && !empty($user_img)) 
   {

    $show=$user_obj->cheak_user($user_name,$user_pasword,$user_phone);
    while($row=$show->fetch_assoc())
    {
      if($row["User_Name"]==$user_name || $row["Pasword"]==$user_pasword || $row["User_Phone"]==$user_phone )
      {
          echo "Cheak the user name/pasword and phone number ";

      }
        else{
           $path="picture/".$user_img;
          move_uploaded_file($user_tmp,$path);
          $user_obj->insert_user($name,$user_name,$user_pasword,$user_phone,$user_stute,$user_img,$user_info);
          move_uploaded_file($_FILES["user_img"]["tmp_name"],$user_img);
          
        }
      }  

    }
   else{
    echo "fill all input filed";
   }
  // $path="picture/".$user_img;
  // move_uploaded_file($user_tmp,$path);
  // $user_obj->insert_user($name,$user_name,$user_pasword,$user_phone,$user_stute,$user_img,$user_info);
  // move_uploaded_file($_FILES["user_img"]["tmp_name"],$user_img);
  
  }
// end of user insert
// select user start
$limt_per_page=5;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;

if(isset($_POST["action"]) && $_POST["action"]=="Select_user")
{
  $show=$user_obj->select_all_user($offset,$limt_per_page);
  $out="";

  $out.='

             <table class="table text-center text-capitalize" >
                 <thead>
            <tr>
               <th scope="col" >ID</th>
               <th scope="col">name</th>
               <th scope="col">phone</th>
               <th scope="col">stutes</th>
               <th scope="col">img</th>
          
               <th scope="col" colspan="3">action</th>
            </tr>
            </thead>
  
  
  
  ';
  while($row=$show->fetch_assoc())
  {
      $out.='
      
      
      <tr >
      <td>'.$row["User_ID"].'</td>
      <td>'.$row["Full_Name"].'</td>
      <td>'.$row["User_Phone"].'</td>
      <td>'.$row["User_Status"].'</td>
      <td>
      <img src="picture/'.$row["User_imge"].'"  height="50px"   width="50px">
      
      </td>
      <td> <i class="fa-solid fa-pen-to-square update_user"   data-bs-toggle="modal" data-bs-target="#update_user" id="'.$row["User_ID"].'" ></i></td>
      <td> <i class="fa-solid fa-trash delete_user" id="'.$row["User_ID"].'"></i></td>
      <td> <i class="fa-solid fa-eye  view_user_icon" data-bs-toggle="modal" data-bs-target="#view_user" id="'.$row["User_ID"].'"></i></td>
     
  </tr>

     
      
      
      ';
  }
$out.='</table>';



$all= $user_obj->select_user();
$total=mysqli_num_rows($all);
$total_pag=ceil($total/$limt_per_page);
$out.='<div id="pagnation">';
for($i=1;$i <= $total_pag;$i++)
{
 if($i==$page)
 {
   $class="active";
 }else{
   $class="";
 }
  $out.="  
    <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
}

$out.='</div>';
  echo $out;

}

if(isset($_POST["course_up_id"]))
{
  $out='';
     $id=$_POST["course_up_id"];
     $show=$course_obj->update_id($id);
     while($row=$show->fetch_assoc())
     {


     $out.='
     
     <form id="updatecourse_form" >
     <div id="err"></div>
     <input type="hidden"
     name="update_id" id="update_id" class="form-control">
       <div class="form-group">
            <label >course name</label>
         
            <input type="text " class="form-control" name="course_name_update"
            id="course_name_update" value="'.$row["course_name"].'">
       </div>

       <div class="form-group">
        <label >duration</label>
        <input type="number" class="form-control" name="course_duration_update"
        id="course_duration_update"  value="'.$row["course_duration"].'">
   </div>


   <div class="form-group">
    <label >fee</label>
    <input type="number" class="form-control" name="course_fee_update"
    id="course_fee_update" value="'.$row["course_fee"].'" >
   </div>
   <div class="form-group">
      <label class="mt-1">description</label>
   <textarea name="course_description_update" id="course_description_update" cols="10" rows="5" class="form-control ">
   "'.$row["course_discription"].'"
     
      </textarea>
  
  </div>
   <div class="form-group mt-3">
       <button class="btn " id="update_course_btn" type="submit" name="update_course_btn">update</button>
      <input type="hidden" name="update_course_input" id="update_course_input" value="insert_update_course_input">
      <input type="hidden" class="form-control" value="'.$row["course_id"].'" name="course_id" id="course_id"> 
   
       </div>

    </form> 
     ';
     }

echo $out;
}

if(isset($_POST["update_course_input"]))
{

   

  $course_name=$_POST["course_name_update"];
  $fee=$_POST["course_fee_update"];
  $info=trim($_POST["course_description_update"]);
  $duration=$_POST["course_duration_update"];
  $id=$_POST["course_id"];
  $show=$course_obj->cheack_course($course_name);

   if(empty($course_name) || empty($fee)|| empty($info)|| empty($duration) )
   {
      echo "fill all input filed";
   }else{
    $reslt=$course_obj->course_update($id,$course_name,$duration,$fee,$info);
     if($reslt)
     {
       echo "update";
     }else{
       echo "the name is already excit";
     }
   }

  //  $reslt=$course_obj->course_update($id,$course_name,$duration,$fee,$info);
  //  if($reslt)
  //  {
  //    echo "update";
  //  }else{
  //    echo "the name is already excit";
  //  }
  // $reslt=$course_obj->course_update($id,$course_name,$duration,$fee,$info);
  // if($reslt)
  // {
  //   echo "recored update";
  // }
}





// slect user end
// start ofdeleteing user
if(isset($_POST["action"]) && $_POST["action"]=="delet_user")
{
  $del_id=$_POST["user_id"];
  $user_obj->Dlelte_user($del_id);
}
// end of user delet
if(isset($_POST["view_user_id"]))
{
  $out="";
  $view_id=$_POST["view_user_id"];
  $show_user=$user_obj->view_user($view_id);
  while($row=$show_user->fetch_assoc())
  {
    $out='
    
    <div class="card shadow text-capitalize">
                <div class="card-img shadow ">
                     <img src="picture/'.$row["User_imge"].'" class="img-fluid m-auto">
                    
                   </div>
                  
                <div class="card-body mt-3">
               <h4 class=" mt-3 text-center">'.$row["Full_Name"].'</h4>
                    <div class="text">
                        <span>user name :</span>
                        <span>'.$row["User_Name"].'</span>
                    </div>
                   
                    <div class="text">
                     <span>pasword :</span>
                     <span>'.$row["Pasword"].'</span>
                 </div>

                 <div class="text">
                   <span>phone :</span>
                   <span>'.$row["User_Phone"].'</span>
               </div>

               <div class="text">
                 <span>Statues</span>
                 <span>'.$row["User_Status"].'</span>
             </div>


             <div class="text">
                 <span>Discription</span>
                 <span>'.$row["User_Description"].'</span>
             </div>

            

          

        
    ';
  }
echo $out;

}
// end of user view 
// user updaete is start
if(isset($_POST["update_user_id"]))
{
  
  $out="";
    $u_id=$_POST["update_user_id"];
    $show_pop=$user_obj->update_user_id($u_id);
    while($row=$show_pop->fetch_assoc())
    {
      $out.='
         
                  <form id="uform" class="text-capitalize">

                                <div id="user_up">
                                </div>
                  <div class="form-group">
                      <div class="form-box">
                            <label >name</label>
                            <input type="text" class="form-control"
                            id="u_user_name" name="u_user_name"
                            value="'.$row["Full_Name"].'"
                            >
                      </div>
                      <div class="form-box">
                        <label >subject</label>
                        <input type="text" class="form-control"
                        id="u_user_s" name="u_user_s"
                        value="'.$row["User_Status"].'"
                        >
                  </div>

            </div>






            <div class="form-group">
            <div class="form-box">
            <label >user name</label>
            <input type="text" class="form-control"
            id="u_u_username" name="u_u_username"
            value="'.$row["User_Name"].'"
            >
            </div>
            <div class="form-box">
            <label >pasword</label>
            <input type="text" class="form-control"
            id="u_pasword" name="u_pasword"
            value="'.$row["Pasword"].'"
            >
            </div>

            </div>

            <div class="form-group last">
            <label>description</label>
      


                  <input name="u_userinfo" id="u_userinfo" value="'.$row["User_Description"].'" class="form-control">
            </div>
            <div class="form-group">
            <div class="form-box">
            <label >phone</label>
            <input type="number" class="form-control"
            id="u_phone" name="u_phone"
            value="'.$row["User_Phone"].'"
            >
            </div>
            <div class="form-box">
            <label >img</label>
            <input type="file" class="form-control"
            id="u_userimg" name="u_userimg"
         
            >
           
            </div>

            </div>

            <div class="form-group last">
            <label>image</label><br>
                  <img src="picture/'.$row["User_imge"].'"  height="60px"  width="60px" style="border-radius: 50%;" class="img-fluid">
            </div>

            <div class="form-group" >
              <button class="btn" id="update_user_btn" type="submit">update</button>
              <input type="hidden" id="up_action_input" name="up_action_input"  class="form-control">
              <input   type="hidden" value="'.$row["User_imge"].'" class="form-control" id="up_img" name="up_img">
              <input type="hidden" value="'.$row["User_ID"].'" name="User_up_id" id="User_up_id" class="form-control">
            
            </div>

            </form>


      ';

    }

    echo $out;



}

// user uodate d end

// update user start
if(isset($_POST["up_action_input"]) && $_POST["up_action_input"]=="update_user")
{
  $new_img="";
  $new_tmp="";
    $img=$_FILES["u_userimg"]["name"];
    $tmp=$_FILES["u_userimg"]["tmp_name"];
    $old=$_POST["up_img"];
    
    $name=$_POST["u_user_name"];
   $user_name=$_POST["u_u_username"];
   $sub=$_POST["u_user_s"];
   $pasword=$_POST["u_pasword"];
   $info=$_POST["u_userinfo"];
   $phone=$_POST["u_phone"];
   $id=$_POST["User_up_id"];

if(empty($name) || empty($user_name) || empty($sub) || empty($pasword) || empty($info) || empty($phone))
{
  echo "Fill A ll input file";
}
else{
  if(!empty($img))
  {
   $new_img=$img;
   $new_tmp=$tmp;
  }else{
   $new_img=$old;
  
  }
  $path="picture/".$new_img;
  move_uploaded_file($new_tmp,$path);
$re=$user_obj->update_user($name,$user_name,$pasword,$phone,$sub,$new_img,$info,$id);
if($re)
{
echo "Reocrd Update Succfully";
}
}

}
// update user end
// search user strt


if(isset($_POST["search_user"]))
{
$id=$_POST["search_user"];
$show_search=$user_obj->search_user($id);
$show=$user_obj->select_all_user($offset,$limt_per_page);
$out="";
  $out.='

             <table class="table text-capitalize text-center" >
                 <thead>
            <tr>
               <th scope="col" > ID</th>
               <th scope="col">name</th>
               <th scope="col">phone</th>
               <th scope="col">stutes</th>
               <th scope="col">img</th>
          
               <th scope="col" colspan="3">action</th>
            </tr>
            </thead>
  
  
  
  ';
  while($row=$show_search->fetch_assoc())
  {
      $out.='
      
      
      <tr >
      <td>'.$row["User_ID"].'</td>
      <td>'.$row["Full_Name"].'</td>
      <td>'.$row["User_Phone"].'</td>
      <td>'.$row["User_Status"].'</td>
      <td>
      <img src="picture/'.$row["User_imge"].'"  height="50px"   width="50px">
      
      </td>
      <td> <i class="fa-solid fa-pen-to-square update_user"   data-bs-toggle="modal" data-bs-target="#update_user" id="'.$row["User_ID"].'" ></i></td>
      <td> <i class="fa-solid fa-trash delete_user" id="'.$row["User_ID"].'"></i></td>
      <td> <i class="fa-solid fa-eye  view_user_icon" data-bs-toggle="modal" data-bs-target="#view_user" id="'.$row["User_ID"].'"></i></td>
     
  </tr>

      
      
      
      
      ';
  }
$out.='</table>';
$all= $user_obj->select_user();
$total=mysqli_num_rows($all);
$total_pag=ceil($total/$limt_per_page);
$out.='<div id="pagnation">';
for($i=1;$i <= $total_pag;$i++)
{
 if($i==$page)
 {
   $class="active";
 }else{
   $class="";
 }
  $out.="  
    <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
}

$out.='</div>';
  echo $out;
}
// } catch (Throwable $th) {
//   // echo $th->getMessage();
// }
// search user end

// insert teacher start
$teacher_obj=new Teacher();
if(isset($_POST["insert_em"]) && $_POST["insert_em"]=="insert_em")
{
  $img=$_FILES["e_img"]["name"];
  $tmp=$_FILES["e_img"]["tmp_name"];

   $name=$_POST["teacher_name"];
   $edc=$_POST["teacher_education"];
   $email=$_POST["teacher_email"];
   $salary=$_POST["teacher_salay"];
   $add=$_POST["teacher_address"];
   $sub=$_POST["subject"];
   $des=$_POST["des"];

   $gender=$_POST["gender"];
   if(!empty($name) || !empty($edc) || !empty($email) || !empty($salary) || !empty($add)|| !empty($sub) || !empty($des) || !empty($img))
   {
        $show=$teacher_obj->cheak_teacher();
        while($row=$show->fetch_assoc())
        {
          if($row["employ_email"]==$email)
          {
            echo "This email is already taken";
          }else{
            $path="picture/".$img;
            move_uploaded_file($tmp,$path);
           $teacher_obj->insert_teacher($name,$gender,$email,$add,$edc,$sub,$img,$salary,$des);
           echo "Sucess";
          }
        }
   }
   else{
      echo "fill all input filed";
   }
  //  print_r($_POST);


}

// select_all_teacher
// insert teacher end
// select teacher start
$limt_per_page=4;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;



if(isset($_POST["action"]) && $_POST["action"]=="select_teacher")
{ 
  $out="";
  $show=$teacher_obj->select_all_teacher($offset,$limt_per_page);
  $out.='
  <table class="table text-center" >
                <thead>
           <tr>
              <th scope="col">ID</th>
              <th scope="col"> name</th>
              <th scope="col">email</th>
              <th scope="col">subject</th>
              <th scope="col">salary</th>
              <th scope="col">image</th>
              <th scope="col" colspan="4">action</th>
           </tr>
           </thead>
  
  ';
  while($row=$show->fetch_assoc())
  {
      $out.='
      <tr>
      <td>'.$row["employ_id"].'</td>
      <td>'.$row["employ_name"].'</td>
      <td>'.$row["employ_email"].'</td>
      <td>'.$row["employ_subject"].'</td>
      <td>'.$row["employ_salary"].'</td>
      <td>
    
      <img src="picture/'.$row["employ_imge"].'" class="img-fluid" heigth="50px" width="50px" style="border-radius: 50%;">
      
      </td>
      <td> <i class="fa-solid fa-pen-to-square update_teacher"  id="'.$row["employ_id"].'"  data-bs-toggle="modal" data-bs-target="#update_teacher" ></i></td>
      <td> <i class="fa-solid fa-trash delete_teacher" id="'.$row["employ_id"].'"></i></td>
      <td> <i class="fa-solid fa-eye view_teacher "  id="'.$row["employ_id"].'"  data-bs-toggle="modal" data-bs-target="#view_teacher" ></i></td>
     
     
  </tr>
  


      
      
      
      ';
  }
  $out.='  </table>';
 $all= $teacher_obj->select_all();
 $total=mysqli_num_rows($all);
 $total_pag=ceil($total/$limt_per_page);
 $out.='<div id="pagnation">';
 for($i=1;$i <= $total_pag;$i++)
 {
  if($i==$page)
  {
    $class="active";
  }else{
    $class="";
  }
   $out.="  
     <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
 }

$out.='</div>';
   echo $out;
}

// select teacher end
// search teacher start
if(isset($_POST["search_teacher"]))
{
  $id=$_POST["search_teacher"];
    $search_show=$teacher_obj->search_teacher($id);
  

  $out="";
  $show=$teacher_obj->select_all_teacher($offset,$limt_per_page);
  $out.='
  <table class="table text-center table-responsive" >
                <thead>
           <tr>
              <th scope="col">ID</th>
              <th scope="col"> name</th>
              <th scope="col">email</th>
              <th scope="col">subject</th>
              <th scope="col">salary</th>
              <th scope="col">image</th>
              <th scope="col" colspan="4">action</th>
           </tr>
           </thead>
  
  ';
  while($row=$search_show->fetch_assoc())
  {
      $out.='
      <tr>
      <td>'.$row["employ_id"].'</td>
      <td>'.$row["employ_name"].'</td>
      <td>'.$row["employ_email"].'</td>
      <td>'.$row["employ_subject"].'</td>
      <td>'.$row["employ_salary"].'</td>
      <td>
    
      <img src="picture/'.$row["employ_imge"].'" class="img-fluid" heigth="50px" width="50px" style="border-radius: 50%;">
      
      </td>
      <td> <i class="fa-solid fa-pen-to-square update_teacher"  id="'.$row["employ_id"].'"  data-bs-toggle="modal" data-bs-target="#update_teacher" ></i></td>
      <td> <i class="fa-solid fa-trash delete_teacher" id="'.$row["employ_id"].'"></i></td>
      <td> <i class="fa-solid fa-eye view_teacher "  id="'.$row["employ_id"].'"  data-bs-toggle="modal" data-bs-target="#view_teacher" ></i></td>
     
  </tr>
  


      
      
      
      ';
  }
  $out.='</table>';
  //  echo $out;
   $all= $teacher_obj->select_all();
   $total=mysqli_num_rows($all);
   $total_pag=ceil($total/$limt_per_page);
   $out.='<div id="pagnation">';
   for($i=1;$i <= $total_pag;$i++)
   {
    if($i==$page)
    {
      $class="active";
    }else{
      $class="";
    }
     $out.="  
       <a class='{$class}' href='' id='{$i}'>{$i}</a>";
   }
  
  $out.='</div>';

    echo $out;

 


}

// search teacher end
// deleet teacher start
if(isset($_POST["teacher_action"]))
{
  $id=$_POST["teacher_id"];
  $res=$teacher_obj->delete_teacher($id);
  if($res)
  {
    echo "Record Deleted Suucceslly";
  }else{
    echo "somthing worng recore not delete";
  }
}

// delete teacher end
// upadte teacher id
if(isset($_POST["teacher_action_update"]))
{
  $id=$_POST["teacher_up_id"];
  $update_id=$teacher_obj->update_teacher_id($id);
  $out="";
  while($row=$update_id->fetch_assoc())
  {
    $out.='
                  <form id="updateteacher" class="text-capitalize">
                  <div id="upcoreect"></div>

                <div class="form-group">
                  <div class="form-box">
                        <label >name</label>
                        <input type="text" class="form-control"
                        id="up_em" name="up_em" value="'.$row["employ_name"].'"
                        
                        >
                  </div>
                  <div class="form-box">
                    <label >education</label>
                    <input type="text" class="form-control"
                    id="up_edu" name="up_edu" value="'.$row["employ_education"].'"
                    
                    >
                </div>

                </div>

                <div class="form-group">
                <div class="form-box">
                <label >email</label>
                <input type="email" class="form-control"
                id="up_email" name="up_email" value="'.$row["employ_email"].'"
                
                >
                </div>
                <div class="form-box">
                <label >salary</label>
                <input type="number" class="form-control"
                id="up_salary" name="up_salary" value="'.$row["employ_salary"].'"
                
                >
                </div>

                </div>




                <div class="form-group">
                <div class="form-box">
                <label >address</label>
                <input type="text" class="form-control"
                id="up_ad" name="up_ad" value="'.$row["employ_address"].'"
                
                >
                </div>
                <div class="form-box">
                <label >subject</label>
                <input type="text" class="form-control"
                id="up_sub" name="up_sub" value="'.$row["employ_subject"].'"
                
                >
                </div>

                </div>


                <div class="form-group">
                <div class="form-box">
                <label >description</label>
                <input type="text" class="form-control"
                id="up_des" name="up_des" value="'.$row["employ_description"].'"
                
                >
                </div>
                <div class="form-box">
                <label >img</label>
                <input type="file" class="form-control"
                id="up_img" name="up_img" 
                >
                </div>

                </div>
                <div class="form-group last mt-3">

                <label >gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label >meal</label>

                <input type="radio"  name="gender" 
                value="Meal"
                id="gender"   >
                &nbsp;&nbsp;
                <label >female</label>

                <input type="radio"  name="gender" id="gender" 
                value="Female"
                checked >

                </div>


                <div class="form-group">
                <button class="btn" type="submit" >update</button>
                <input type="hidden" value="'.$row["employ_id"].'" id="new_id" name="new_id" classs="form-control">
                <input  type="hidden" id="new_up" name="new_up" value="up" classs="form-control">
   
                <input name="old" id="old" value="'.$row["employ_imge"].'" type="hidden">

                </div>

                </form>
                  
    

';
  }

echo $out;
}
// update teacher
// upadre reocrd start


if(isset($_POST["new_up"]) && $_POST["new_up"]=="new_data")
{

    $new_img="";
    $new_tmp="";
  $img=$_FILES["up_img"]["name"]; 
  $tmp=$_FILES["up_img"]["tmp_name"];
  $old=$_POST["old"];
 $name=$_POST["up_em"];
 $edu=$_POST["up_edu"];
 $email=$_POST["up_email"];
 $salary=$_POST["up_salary"];
 $addres=$_POST["up_ad"];
 $sub=$_POST["up_sub"];
 $info=$_POST["up_des"];
 $gender=$_POST["gender"];
 $id=$_POST["new_id"];


 if(!empty($img))
 {
  $new_img=$img;
  $new_tmp=$tmp;

 }
 else{
  $new_img=$old;
 }
  if(!empty($name) && !empty($edu) && !empty($email) && !empty($salary) && !empty($addres) && !empty($sub) && !empty($info) && !empty($gender))
  {

            $path="picture/".$new_img;
            move_uploaded_file($new_tmp,$path);
            $update=$teacher_obj->update_teacher($name,$gender,$email,$addres,$edu,$sub,$new_img,$salary,$info,$id);
            if($update)
            {
              echo "Great";
            }else{
              echo "email is already excit";
            }

}else{
  echo "fill all input filed";
}


}
// update reocrd end
// view teacher start
if(isset($_POST["teacher_view"]))
{
  $id=$_POST["teacher_view"];
  $out='';
   $show=$teacher_obj->show_teacher_profile($id);

   while($row=$show->fetch_assoc())
   {



  $out.='<div class="card shadow text-capitalize">
              <div class="card-img shadow ">
                  <img src="picture/'.$row["employ_imge"].'" class="img-fluid m-auto">
                  
                </div>
                
              <div class="card-body">
            <h4 class=" text-center">'.$row["employ_name"].'</h4>
            <div class="text">
            <span>ID:</span>
            <span>'.$row["employ_id"].'</span>
            </div>
                  <div class="text">
                  <span>subject :</span>
                  <span>'.$row["employ_subject"].'</span>
              </div>

              <div class="text">
                  <span>salary :</span>
                  <span>'.$row["employ_salary"].'</span>
              </div>

                  <div class="text">
                      <span>education :</span>
                      <span>'.$row["employ_education"].'</span>
                  </div>
                 
      

            <div class="text">
              <span>email :</span>
              <span>'.$row["employ_email"].'</span>
            </div>

            <div class="text">
            <span>address :</span>
            <span>'.$row["employ_address"].'</span>
           </div>

            <div class="text">
            <span>description:</span>
            <span>'.$row["employ_description"].'</span>
            </div>

            <div class="text">
            <span>gender:</span>
            <span>'.$row["employ_gender"].'</span>
            </div>

        

              </div>';
   }
echo $out;
}
// view teacher end
// salry start

if(isset($_POST["action"]) && $_POST["action"]=="select_salary")
{ 
  $out="";
  $show=$teacher_obj->select_all_teacher($offset,$limt_per_page);
  $out.='
  <table class="table text-center  text-capitalize" >
                <thead>
           <tr>
              <th scope="col">ID</th>
              <th scope="col"> name</th>
              <th scope="col">subject</th>
              <th scope="col">salary</th>
              <th scope="col">image</th>
              <th scope="col" colspan="4">action</th>
           </tr>
           </thead>
  
  ';
  while($row=$show->fetch_assoc())
  {
      $out.='
      <tr>
      <td>'.$row["employ_id"].'</td>
      <td>'.$row["employ_name"].'</td>
      <td>'.$row["employ_subject"].'</td>
      <td>'.$row["employ_salary"].'</td>
      <td>
    
      <img src="picture/'.$row["employ_imge"].'" class="img-fluid" heigth="40px" width="40px" style="border-radius: 50%;">
      
      </td>
      <td>
      <i class="fa-solid fa-add add" data-bs-toggle="modal" 
      data-bs-target="#add_info" id="'.$row["employ_id"].'"></i>       
    </td>
    
    <td>
    <a href="teacherprofile.php">
    <i class="fa-solid fa-eye see" id="'.$row["employ_id"].'">
  
    </i>
    </a>


    </td>

     
  </tr>
     
      
      
      ';
  }
  $out.='  </table>';
 $all= $teacher_obj->select_all();
 $total=mysqli_num_rows($all);
 $total_pag=ceil($total/$limt_per_page);
 $out.='<div id="pagnation">';
 for($i=1;$i <= $total_pag;$i++)
 {
  if($i==$page)
  {
    $class="active";
  }else{
    $class="";
  }
   $out.="  
     <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
 }

$out.='</div>';
   echo $out;
}

// salary end
// salery star searcht
if(isset($_POST["search_salary"]))
{
  $id=$_POST["search_salary"];
  $out="";
  $show=$teacher_obj->select_all_teacher($offset,$limt_per_page);
  $result=$teacher_obj->search_teacher($id);
  $out.='
  <table class="table text-center" >
                <thead>
           <tr>
              <th scope="col">ID</th>
              <th scope="col"> name</th>
              <th scope="col">subject</th>
              <th scope="col">salary</th>
              <th scope="col">image</th>
              <th scope="col" colspan="4">action</th>
           </tr>
           </thead>
  
  ';
  while($row=$result->fetch_assoc())
  {
      $out.='
      <tr>
      <td>'.$row["employ_id"].'</td>
      <td>'.$row["employ_name"].'</td>
      <td>'.$row["employ_subject"].'</td>
      <td>'.$row["employ_salary"].'</td>
      <td>
    
      <img src="picture/'.$row["employ_imge"].'" class="img-fluid" heigth="40px" width="40px" style="border-radius: 50%;">
      
      </td>
      <td>
      <i class="fa-solid fa-add add" data-bs-toggle="modal" 
      data-bs-target="#add_info" id="'.$row["employ_id"].'"></i>       
    </td>
    <td>
    <a href="teacherprofile.php">
    <i class="fa-solid fa-eye see" id="'.$row["employ_id"].'"></i>
    </a>
    </td>
     
     
  </tr>
     
      
      
      ';
  }
  $out.='  </table>';
 $all= $teacher_obj->select_all();
 $total=mysqli_num_rows($all);
 $total_pag=ceil($total/$limt_per_page);
 $out.='<div id="pagnation">';
 for($i=1;$i <= $total_pag;$i++)
 {
  if($i==$page)
  {
    $class="active";
  }else{
    $class="";
  }
   $out.="  
     <a class='{$class}' href='' id='{$i}'>{$i}</a>
";
 }

$out.='</div>';
   echo $out;
}


// salary searc end
// add salary start
if(isset($_POST["salary"]))
{
  $id=$_POST["salary"];
  $show=$teacher_obj->update_teacher_id($id);
  $out="";
  $out='';
  while($row=$show->fetch_assoc())
  {
      $out='
      <div class="img">
                        <img src="picture/'.$row["employ_imge"].'"  width="50px" height="50px">
                  </div>
                    <form  id="salary_submit" 
                    >
                        <div class="form-group">
                        <input id="salry_insert" name="salry_insert" type="hidden">
                        <div class="form-box">
                                    <label >ID</label>
                                    <input type="text" id="id" name="id" 
                                    class="form-control" value="'.$row["employ_id"].'"  readonly>
                               </div>
                               <div class="form-box">
                                    <label >name</label>
                                    <input type="text" class="form-control"
                                    value="'.$row["employ_name"].'"
                                    name="name" id="name"
                                    readonly>
                               </div>
                        </div>

                        <div class="form-group">
                              <div class="form-box">
                                          <label >salary</label>
                                          <input type="number" class="form-control" readonly
                                          value="'.$row["employ_salary"].'"
                                          id="salary"
                                          name="salary"
                                          >
                                     </div>
                                     <div class="form-box">
                                          <label >before_salary</label>
                                          <input type="number" class="form-control"
                                            id="before"
                                            name="before"
                                          >
                                     </div>
                              </div>

                              <div class="form-group">
                              <div class="form-box">
                              <label >salary</label>
                              <input type="date" class="form-control" 
                              
                              id="month"
                              name="month"
                              >
                         </div>
                              </div>



                        <div class="form-group mt-1">
                              <button class="btn m-1" type="submit">add</button>
                        </div>
                          
                    </form>
                        
                               
      
      
      ';
  }

  echo $out;


}
// add salry end
if(isset($_POST["salry_insert"]))
{
  $id=$_POST["id"];
  $salary=$_POST["salary"];
  $befor=$_POST["before"];
  $date=$_POST["month"];
  if(!empty($date))
  {
    
      $insert=$teacher_obj->insert_salary($id,$date,$salary,$befor);
      if($insert)
      {
       echo "recored inseted";
      }
     }else{
       echo "reocred not inseted plaes fill all input filed";
     }
 
 
}
if(isset($_POST["action"]) &&  $_POST["action"]=="count_teacher")
{
 $show=$teacher_obj->count_teacher();
 $out="";


 $result=implode(",",$show);
  $out.='
      <td class="p-3"><span>total teacher</span></td>
      <td class="p-3"><span>'.$result.'</span></td
  
  ';

 echo $out;

}
if(isset($_POST["action"]) && $_POST["action"]=="sum_salary")
{
  $show=$teacher_obj->sum_salary();
  $out="";
 
 
  $result=implode(",",$show);
   $out.='
       <td class="p-3"><span>total salary</span></td>
       <td class="p-3"><span>'.$result.'</span></td
   
   ';
 
  echo $out;
}

if(isset($_POST["action"]) && $_POST["action"]=="total_student")
{
  $show=$student_obj->total_student();
  $out="";
 
 
  $result=implode(",",$show);
   $out.='
       <td class="p-3"><span>total studnet</span></td>
       <td class="p-3"><span>'.$result.'</span></td
   
   ';
 
  echo $out;
}




// exapn select start
$limt_per_page=7;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;
$expan_obj=new Expan();
// select_spcific_expan

if(isset($_POST["expan"]) && $_POST["expan"])
{
    $show_expan=$expan_obj->select_spcific_expan($offset,$limt_per_page);
    $out='';
    $out.='
            <table class="table " >
            <thead class="text-center">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">date</th>
          <th scope="col">amonut</th>
          <th scope="col" colspan="4">action</th>
        </tr>
        </thead>
    
    ';
      while($row=$show_expan->fetch_assoc())
      {
          $out.='
          <tr class="text-center">
                <td>'.$row["Expens_ID"].'</td>
                <td>'.$row["Expens_Date"].'</td>
                <td>'.$row["Expens_Amount"].'</td>
    
                <td> <i class="fa-solid fa-pen-to-square updat_expn "  id="'.$row["Expens_ID"].'" data-bs-toggle="modal" data-bs-target="#update_expane" ></i></td>
                <td> <i class="fa-solid fa-trash  del_ex"  id="'.$row["Expens_ID"].'" ></i></td>
                <td> <i class="fa-solid fa-eye  view_ex"  id="'.$row["Expens_ID"].'" 
                    data-bs-target="#view_expane" data-bs-toggle="modal"></i></td>
               
            </tr>
          
          
          ';
      }


   $out.='</table>';


   $all= $expan_obj->select_all_expan();
   $total=mysqli_num_rows($all);
   $total_pag=ceil($total/$limt_per_page);
   $out.='<div id="pagnation">';
   for($i=1;$i <= $total_pag;$i++)
   {
    if($i==$page)
    {
      $class="active";
    }else{
      $class="";
    }
     $out.="  
       <a class='{$class}' href='' id='{$i}'>{$i}</a>";
   }
  
  $out.='</div>';

  echo $out;    
}
// slect exapna end

// insert expan start
if(isset($_POST["insert_expan"]))
{
   $date=$_POST["date"];
   $amount=$_POST["amount"];
   $info=$_POST["info"];
   if(!empty($date) && !empty($info) && !empty($amount))
   {
    $show=$expan_obj->insert_expan($date,$amount,$info);

    if($show)
    {
      echo "inserted";
    }else{
      echo "Reocrd not inserted cheak your data";
    }
   }
   else{
    echo "fill all input filed";
   }
}


// insert expan end
// delete expan start
if(isset($_POST["action"]) && $_POST["action"]=="delet_expan")
{
   $id=$_POST["c_id"];
     $delet=$expan_obj->Delete_expan($id);
     if($delet)
     {
      echo "Reocred Delted";
     }else{
      echo "Some Proplem Reocrd Not Dlelte";
     }
}
// delete expan end
// view expan start
if(isset($_POST["expan_view_id"]))
{
  $out='';
  $id=$_POST["expan_view_id"];
   $view=$expan_obj->view_expane($id);

   while($row=$view->fetch_assoc())
   {
         $out.='
         <div class="card">
      <table class="text-capitalize">
                 <tr>
                      <td>
                            <table>
                                    <tr>
                                          <td><span>ID</span></td>
                                          <td><span>'.$row["Expens_ID"].'</span></td>
                                    </tr>
                                    <tr>
                                          <td><span>date</span></td>
                                          <td><span>'.$row["Expens_Date"].'</span></td>
                                    </tr>
                                    <tr>
                                          <td><span>amoutn:</span></td>
                                          <td><span>'.$row["Expens_Amount"].'</span></td>
                                    </tr>
                                    <tr>
                                          <td><span>descripton:</span></td>
                                         
                                    </tr>
                                    <tr>
                                          <td>
                                          <hr>
                                                <p>'.$row["Expens_Description"].'</p>
                                          </td>
                                    </tr>
                                    
                            </table>
                      </td>
                 </tr>
      </table>
</div>
';
}
  echo $out;

}
// view expan end
//Expan update modul show data start 
if(isset($_POST["update_course_id"]))
{
  $id=$_POST["update_course_id"];
  $show=$expan_obj->view_expane($id);
  $out='';

   while($row=$show->fetch_assoc())
   {
        $out.='
        <form id="update_expane" class="text-capitalize" method="POST">
              

                   <div class="form-group">
                  
                    <label >date</label>
                    <input type="date" class="form-control" name="udata"
                    id="udata" value="'.$row["Expens_Date"].'"
                    >

                    <input type="hidden" class="form-control" name="e_id"
                    id="e_id" value="'.$row["Expens_ID"].'"
                    >
               </div>


               <div class="form-group">
                <label >amount</label>
                <input type="number " class="form-control" name="uamount"
                id="uamount"
                value="'.$row["Expens_Amount"].'"
                >
               </div>
               <div class="form-group">
                  <label class="mt-1">description</label>
               <textarea name="uinfo" id="uinfo" cols="10" rows="5" class="form-control ">'.$row["Expens_Description"].'</textarea>
              </div>
               <div class="form-group mt-3">
                    <input type="hidden" name="up_expan" id="up_expan" value="new">
                   <button class="btn text-capitalize" type="submit">add</button>
                   <button class="btn text-capitalize" type="reset">reset</button>
               </div>

                </form>      
        
        ';
   }




  echo $out;

}
//Expan update modul show date end 
// expan update data start
if(isset($_POST["up_expan"]) && $_POST["up_expan"]=="up_expan")
{
  $date=$_POST["udata"];
  $id=$_POST["e_id"];
  $amount=$_POST["uamount"];
  $info=$_POST["uinfo"];
  $result=$expan_obj->update_expan($id,$date,$amount,$info);
  if($result)
  {
    echo "record updated dear frimed";
  }
}

// expan update data end
// seacrh expan start
$limt_per_page=5;
$page="";
if(isset($_POST["page_no"]))
{
  $page=$_POST["page_no"];

}else{
  $page=1;

}
$offset=($page - 1) * $limt_per_page;
$expan_obj=new Expan();
// select_spcific_expan

if(isset($_POST["serach_expan"]))
{
  $id=$_POST["serach_expan"];
    $show_expan=$expan_obj->select_spcific_expan($offset,$limt_per_page);
    $search_expan=$expan_obj->search_expan_data($id);
    $out='';
    $out.='
            <table class="table " >
            <thead class="text-center">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">date</th>
          <th scope="col">amonut</th>
          <th scope="col" colspan="4">action</th>
        </tr>
        </thead>
    
    ';
      while($row=$search_expan->fetch_assoc())
      {
          $out.='
          <tr class="text-center">
                <td>'.$row["Expens_ID"].'</td>
                <td>'.$row["Expens_Date"].'</td>
                <td>'.$row["Expens_Amount"].'</td>
    
                <td> <i class="fa-solid fa-pen-to-square updat_expn "  id="'.$row["Expens_ID"].'" data-bs-toggle="modal" data-bs-target="#update_expane" ></i></td>
                <td> <i class="fa-solid fa-trash  del_ex"  id="'.$row["Expens_ID"].'" ></i></td>
                <td> <i class="fa-solid fa-eye  view_ex"  id="'.$row["Expens_ID"].'" 
                    data-bs-target="#view_expane" data-bs-toggle="modal"></i></td>
               
            </tr>
          
          
          ';
      }


   $out.='</table>';


   $all= $expan_obj->select_all_expan();
   $total=mysqli_num_rows($all);
   $total_pag=ceil($total/$limt_per_page);
   $out.='<div id="pagnation">';
   for($i=1;$i <= $total_pag;$i++)
   {
    if($i==$page)
    {
      $class="active";
    }else{
      $class="";
    }
     $out.="  
       <a class='{$class}' href='' id='{$i}'>{$i}</a>";
   }
  
  $out.='</div>';

  echo $out;    
}
// search expan end
if(isset($_POST["salary_delet"]))
{
  $id=$_POST["salary_delet"];
   $delet_salary=$teacher_obj->delete_salary($id);
   if($delet_salary)
   {
    echo "Reocrd deleted";
   }
}
if(isset($_POST["salary_update"]))
{
  $id=$_POST["salary_update"];
  $show_salary=$teacher_obj->update_salary_id($id);

   $out="";
while($row=$show_salary->fetch_assoc())
{
  $out.='  <form id="update_salary">
  <div class="form-group">
     
     <div class="form-box">
                 <label >ID</label>
                 <input type="text" id="id" name="id" 
                 class="form-control"   readonly  value="'.$row["employ_id"].'">
            </div>
            <div class="form-box">
                 <label >name</label>
                 <input type="text" class="form-control"
                 value="'.$row["employ_name"].'"
                 name="name" id="name"
                 readonly>
            </div>
     </div>

     <div class="form-group">
           <div class="form-box">
                       <label >salary</label>
                       <input type="number" class="form-control" readonly
                       value="'.$row["employ_salary"].'"
                       id="salary"
                       name="salary"
                       >
                  </div>
                  <div class="form-box">
                       <label >before_salary</label>
                       <input type="number" class="form-control"
                       value="'.$row["before_salary"].'"
                         id="before"
                         name="before"
                       >
                  </div>
           </div>

           <div class="form-group">
           <div class="form-box">
           <label >salary</label>
           <input type="date" class="form-control" 
           value="'.$row["month"].'"
           id="month"
           name="month"
           >
      </div>
           </div>

         <input type="hidden" value="'.$row["id"].'" name="change_id" id="change_id" >
         <input type="hidden" name="update_salary_input" id="update_salary_input" >

     <div class="form-group mt-1">
           <button class="btn m-1" type="submit">update</button>
     </div>
       
 </form>';
}
echo $out;

}
if(isset($_POST["update_salary_input"]) && $_POST["update_salary_input"]=="update_salary_input")
{
   $t_id=$_POST["id"];
   $salary=$_POST["salary"];
    $month=$_POST["month"];
    $befor=$_POST["before"];
    $chnage=$_POST["change_id"];
    // update form that
   $reslt=$teacher_obj->update_salary($chnage,$t_id,$salary,$befor,$month);
if($reslt)
{
  echo "reocrd updated";
}
}
if(isset($_POST["delete_fee"]))
{
  $id=$_POST["delete_fee"];
  // echo $id;
  $delet_fee=$student_obj->delete_fee($id);
  if($delet_fee)
  {
    echo "Reocrd Delete";
  }else{
    echo "Reocrd Not Deleted";
  }


}

if(isset($_POST["courser_repert"]) && $_POST["courser_repert"]=="show_course_report")
{
  $out='';
  $save='';
  $out.='
  <table class="table text-capitalize">
  <tr>
  <th>coure name</th>
  <th>enroll</th>
  <th>total fee</th>
</tr>
  
  ';
  $show=$course_obj->select_all_course_recoed();
  while($row=$show->fetch_assoc())
  {
    $save=$row["course_name"];
    $show_number=$course_obj->count_spicific_course($save);
    $res=implode(",",$show_number);

    $total=$course_obj->sum_spicific_course($save);
    $total_fee=implode(",",$total);
      $t_re=(int)$total_fee;
      $out.='
      <tbody>
                     
      <tr>
         <td>'.$row["course_name"].'</td>
         <td>'.$res.'</td>
         <td>'.$t_re.'</td>
       </tr>

   </tbody>
      
      
      ';
  }
  


   $out.='</table>';

   echo $out;



}
if(isset($_POST["total_report"]) && $_POST["total_report"]=="total_repot")
{
$show_count=$course_obj->cout_course();
$cout_res=implode(",",$show_count);
$dis=$course_obj->discount_course();
$dis_re=implode(",",$dis);
$fee=$course_obj->fee_course();
$fee_res=implode(",",$fee);
  $out="";
  $out.='
  <table class="table text-capitalize">
  <tr>
   <th>total course</th>
   <th>total discount</th>
   <th>total fee</th>
  </tr>    

  <tbody>
   <tr>
        <td>'.$cout_res.'</td>
        <td>'.$dis_re.'</td>
        <td>'.$fee_res.'</td>
   </tr>
  </tbody>

</table>

  ';

echo $out;

}
if(isset($_POST["total_expen"]) && $_POST["total_expen"]=="total_expen")
{
  
  $show=$expan_obj->sum_expen();
  $res=implode(",",$show);
   echo $res;




}






?>






