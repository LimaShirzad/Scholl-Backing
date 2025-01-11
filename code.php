<?php
class student{
    private $host_name="localhost";
    private $username="root";
    private $pasword="";
    private $db_name="academy";
    public $con;
    // start of connecting Database
    public function __construct()
    {
    $this->con=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
     if($this->con->connect_error)
     {
        echo $this->con->connect_error ;
        exit();
     }
     else
     {
       return $this->con;
     }
    }
    


    public function insert_student($name,$fname,$gender,$phone,$em,$s_cicn,$f_cicn,$address,$email,$file,$desc)
    {
       $insert_query="INSERT INTO student(student_name, student_father_name, gender, student_phone, student_emercany_phone, student_cninc, student_father_cninc, student_address, student_email,img,   student_description) VALUES('$name','$fname','$gender',
       '$phone','$em','$s_cicn','$f_cicn','$address','$email','$file','$desc')";
       $run=$this->con->query($insert_query);
        return   $run;
    }
    
    public function cheack()
    {
         $query="SELECT student_phone,student_emercany_phone, student_cninc, student_father_cninc,student_email FROM student";
         $run=$this->con->query($query);
         return $run;
    }
    public function select_record()
    {
      $select_query="SELECT * FROM student";
      $run=$this->con->query($select_query);
      return $run;
    }
    
    public function  student_profile($ID)
    {
      $slect="SELECT * FROM student WHERE student_id='$ID'";
      $run=$this->con->query($slect);
      return $run;
    }
   
    public function delet_student($ID)
    {
      $Dlelet="DELETE FROM student WHERE student_id='$ID'";
      $run=$this->con->query($Dlelet);
    }

    public function update_student_id($update_id)
    {
      $slect_update="SELECT * FROM student WHERE student_id='$update_id'";
      $run=$this->con->query($slect_update);
      return $run;
    }
    
    public function update_student($eid,$ename,$efname,$gender,$ephone,$emr_phone,$es_cinc,$ef_cinic,$address,$eemail,$img,$edes)
    {
      $update="UPDATE student SET 
      student_name='$ename',
      student_father_name='$efname',
      gender='$gender',
      student_phone='$ephone',
      student_emercany_phone='$emr_phone',
      student_cninc='$es_cinc',
      student_father_cninc='$ef_cinic',
      student_address='$address',
      student_email='$eemail',
      img='$img',
      student_description='$edes'
      WHERE student_id='$eid'

      
      
      ";
      $run=$this->con->query($update);
      return $run;
      // move_uploaded_file($_FILES['img']['tmp_name'],$img);




    }

      public function serach_student($item)
      {
        $sql="SELECT * FROM student WHERE student_name LIKE '%{$item}%' OR student_father_name LIKE '%{$item}%'
          OR student_id LIKE '%{$item}%'";
          $run=$this->con->query($sql);
          return $run;
      }
      public function select_spcific_student($ofset,$limet)
      {
        $sql="SELECT * FROM student LIMIT {$ofset},{$limet}";
        $run=$this->con->query($sql);
        return $run;
      }
      public function select_student($id)
      {
        $sql="SELECT * FROM student WHERE student_id='$id'";
        $run=$this->con->query($sql);
        $result=$run->fetch_assoc();
        return $result;
      }

      public function insert_student_course($student_id,$course_id)
      {
        $sql="INSERT INTO student_course(S_ID,C_ID)VALUES('$student_id','$course_id')";
        $run=$this->con->query($sql);
        return $run;
      }
      public function select_info($id)
      {
        $sql="SELECT * FROM info WHERE ID='$id'";
        $run=$this->con->query($sql);
        return $run;
      }
      public function update_student_course($student_id,$change,$discount,$sum,$course_id)
      {
        $sql="UPDATE student_course SET discount='$discount',totl_fee='$sum' WHERE ID='$change' and C_ID='$course_id' and S_ID='$student_id'";
        $run=$this->con->query($sql);
        return $run;
      }
 
      public function show_all($id)
      {
        $sql="SELECT SUM(totl_fee) FROM info WHERE S_ID='$id'";
        $run=$this->con->query($sql);
        $res=$run->fetch_assoc();
        return $res; 
      }
      public function show_ricipt_total($id)
      {
        $sql="SELECT SUM(totl_fee) FROM info WHERE ID='$id'";
        $run=$this->con->query($sql);
        $res=$run->fetch_assoc();
        return $res; 
      }
      public function show_discount($id)
      {
        $sql="SELECT SUM(discount) FROM info WHERE S_ID='$id'";
        $run=$this->con->query($sql);
        $res=$run->fetch_assoc();
        return $res;
      }
      public function show_rircp_dicount($id)
      {
        $sql="SELECT SUM(discount) FROM info WHERE ID='$id'";
        $run=$this->con->query($sql);
        $res=$run->fetch_assoc();
        return $res;

      }
      public function show_fee($id)
      {
        $sql="SELECT ID,course_name,course_fee,discount,totl_fee FROM info WHERE S_ID='$id'";
        $run=$this->con->query($sql);
        return $run; 
      }

      public function delete_fee($id)
      {
        $sql="DELETE FROM student_course WHERE ID='$id'";
        $run=$this->con->query($sql);
        return $run; 
      }
      public function select_student_data()
      {
        $sql="SELECT S_ID,C_ID FROM student_course";
        $run=$this->con->query($sql);
        return $run; 
      }
      public function total_student()
      {
         $sql="SELECT COUNT(student_id) FROM student";
         $run=$this->con->query($sql);
         $result=$run->fetch_assoc();
         return $result;
      }
    
      





}
// student class end

// course class start
class course{
private $host_name="localhost";
private $username="root";
private $pasword="";
private $db_name="academy";
public $con;
// start of connecting Database
        public function __construct()
        {
        $this->con=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
        if($this->con->connect_error)
        {
            echo $this->con->connect_error ;
            exit();
        }
        else
        {
          return $this->con;
        }
        }
     
        public function insert_course($coures_name,$coures_duration,$coures_fee,$course_info)
        {
          $insert_query="INSERT INTO course (course_name,course_duration,course_fee,course_discription) VALUES ('$coures_name','$coures_duration','$coures_fee','$course_info')";
          $run=$this->con->query($insert_query);
          return $run;
          
        }
        public function select_all_course_recoed()
        {
          $select="SELECT * FROM course  ";
          $run=$this->con->query($select);
          return $run;
        }
        public function select_spcific_course($ofset,$limet)
        {
            $sql="SELECT * FROM course LIMIT {$ofset},{$limet}";
            $run=$this->con->query($sql);
            return $run;
        }
        public function cheak_course()
        {
          $select="SELECT course_name FROM course";
          $run=$this->con->query($select);
          return $run;
        }
        public function Delet_course($ID)
        {
          $Dlelet="DELETE FROM course WHERE course_id='$ID'";
          $run=$this->con->query($Dlelet);
          return $run;
        }
        public function select_reocrd($ID)
        {
          $sql="SELECT * FROM course WHERE course_name LIKE '%{$ID}%' OR course_id LIKE '%{$ID}%'";
          $run=$this->con->query($sql);
          return $run;
        }
        public function update_id($id)
        {
          $query="SELECT * FROM course WHERE course_id='$id'";
          $run=$this->con->query($query);
          return $run;
        }
        public function course_update($id,$name,$coures_duration,$fee,$info)
        {
          $sql="UPDATE course SET course_name='$name', course_duration='$coures_duration',course_fee='$fee',course_discription='$info' WHERE course_id='$id'";
          $run=$this->con->query($sql);
          return $run;
          
        }
        public function view_course($id)
        {
          $sql="SELECT * FROM course WHERE course_id='$id'";
          $run=$this->con->query($sql);
          return $run;
        }
        public function cheack_course($coures_name)
        {
          $sql="SELECT * FROM course";
          $run=$this->con->query($sql);
          return $run;
        }
        public function cout_course()
        {
          $sql="SELECT COUNT(course_id) FROM course";
          $run=$this->con->query($sql);
          $res=$run->fetch_assoc();
          return $res;
        }
        public function discount_course()
        {
          $sql="SELECT SUM(discount) FROM info";
          $run=$this->con->query($sql);
          $res=$run->fetch_assoc();
          return $res;
        }
        public function fee_course()
        {
          $sql="SELECT SUM(course_fee) FROM course";
          $run=$this->con->query($sql);
          $res=$run->fetch_assoc();
          return $res;
        }

        public function count_spicific_course($name)
        {
          $sql="SELECT COUNT(ID) FROM info WHERE course_name='$name'";
          $run=$this->con->query($sql);
          $res=$run->fetch_assoc();
          return $res;
        }

        public function sum_spicific_course($name)
        {
          $sql="SELECT SUM(totl_fee) FROM info WHERE course_name='$name'";
          $run=$this->con->query($sql);
          $res=$run->fetch_assoc();
          return $res;
        }








        







}


// course classs end
// user class start
class user{
  private $host_name="localhost";
  private $username="root";
  private $pasword="";
  private $db_name="academy";
  public $con;
  // start of connecting Database
          public function __construct()
          {
          $this->con=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
          if($this->con->connect_error)
          {
              echo $this->con->connect_error ;
              exit();
          }
          else
          {
            return $this->con;
          }
          }
          public function insert_user($full_name,$User_Name,$Pasword,$User_Phone,$User_Status,$User_img,$User_Description)
          {
            $insert_query="INSERT INTO admin (Full_Name,User_Name,Pasword,User_Phone,User_Status,User_imge,User_Description)VALUES('$full_name','$User_Name','$Pasword','$User_Phone','$User_Status','$User_img','$User_Description')";
            $run=$this->con->query($insert_query);
            return $run;
            
          }
          public function cheak_user($user,$pas,$phone)
          {
            $sql="SELECT User_Name,Pasword,User_Phone FROM admin";
            $run=$this->con->query($sql);
            return $run;
          }
          public function select_user()
          {
            $sql="SELECT * FROM admin";
            $run=$this->con->query($sql);
            return $run;
          }
          public function select_all_user($ofset,$limit)
          {
            $sql="SELECT * FROM admin LIMIT {$ofset},{$limit}";
            $run=$this->con->query($sql);
            return $run;
          }

          public function Dlelte_user($ID)
          {
            $Dlelet="DELETE FROM admin WHERE User_ID='$ID'";
            $run=$this->con->query($Dlelet);
            return $run;
          }

          public function view_user($ID)
          {
            $view="SELECT * FROM admin WHERE User_ID='$ID'";
            $run=$this->con->query($view);
            return $run;
          }

          public function update_user_id($ID)
          {
            $view_info="SELECT * FROM admin WHERE User_ID='$ID'";
            $run=$this->con->query($view_info);
            return $run;
          }

          public function update_user($full_name,$User_Name,$Pasword,$User_Phone,$User_Status,$User_img,$User_Description,$use_id)
          {
            // Full_Name,User_Name,Pasword,User_Phone,User_Status,User_imge,User_Descriptio
            $sql="UPDATE admin SET Full_Name='$full_name',User_Name='$User_Name',Pasword='$Pasword',User_Phone='$User_Phone',	User_Status='$User_Status',User_imge='$User_img',User_Description='$User_Description' WHERE User_ID='$use_id'";
            $run=$this->con->query($sql);
            return $run;
          }
          public function search_user($item)
          {
            $sql="SELECT * FROM admin WHERE User_ID LIKE '%{$item}%' OR Full_Name LIKE '%{$item}%'";
            $run=$this->con->query($sql);
            return $run;

          }
          public function login($user,$pas)
          {
              $sql="SELECT User_Name,Pasword FROM admin WHERE User_Name='$user' and Pasword='$pas'";
              $run=$this->con->query($sql);
              $resul=mysqli_num_rows($run);
               if($resul>0)
               {
                return $resul;
               }
          }


}
// user class end

class Teacher
{
  private $host_name="localhost";
  private $username="root";
  private $pasword="";
  private $db_name="academy";
  public $con;
  // start of connecting Database
          public function __construct()
          {
          $this->con=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
          if($this->con->connect_error)
          {
              echo $this->con->connect_error ;
              exit();
          }
          else
          {
            return $this->con;
          }

          }
          public function insert_teacher($name,$gender,$email,$address,$edu,$sub,$img,$salary,$des)
          {
            // $name,$gender,$email,$add,$edc,$sub,$img,$salary,$des);
            $insert="INSERT INTO employee (employ_name,employ_gender,employ_email,employ_address,employ_education,employ_subject,employ_imge,employ_salary,employ_description)VALUES('$name','$gender','$email','$address','$edu','$sub','$img','$salary','$des')";
            $run=$this->con->query($insert);
            return $run;
          }
          public function cheak_teacher()
          {
            $sql="SELECT employ_email  FROM employee ";
            $run=$this->con->query($sql);
            return $run;
          }
          public function select_all_teacher($ofset,$limet)
          {
            $sql="SELECT * FROM employee LIMIT {$ofset},{$limet}";
            $run=$this->con->query($sql);
            return $run;
          }
         public function select_all()
         {
          $sql="SELECT * FROM employee ORDER BY  employ_id DESC";
          $run=$this->con->query($sql);
          return $run;
         }

         public function search_teacher($id)
         {
         $sql="SELECT * FROM employee WHERE employ_name LIKE '%{$id}%' OR employ_id LIKE '%{$id}%' OR employ_subject LIKE  '%{$id}%'";
         $run=$this->con->query($sql);
         return $run;



         }
         public function  delete_teacher($id)
         {
          $sql="DELETE FROM employee WHERE employ_id='$id'";
          $run=$this->con->query($sql);
          if($run)
          {
            return $run;
          }
         }

         public function update_teacher_id($id)
         {
            $sql="SELECT * FROM employee WHERE employ_id='$id'";
            $run=$this->con->query($sql);
            if($run)
            {
              return $run;
            }
         }
        //  employ_name,employ_gender,employ_email,employ_address,employ_education,employ_subject,employ_imge,employ_salary,employ_description
     public function update_teacher($name,$gender,$email,$address,$edu,$sub,$emimg,$salary,$des,$id)
     {
        $sql="UPDATE employee SET 
        employ_name='$name',employ_gender='$gender',employ_email='$email',
        employ_address='$address',employ_education='$edu',employ_subject='$sub',
        employ_imge='$emimg',employ_salary='$salary',employ_description='$des' WHERE employ_id='$id'";
        $run=$this->con->query($sql);
        return $run;
        
     }
     public function show_teacher_profile($id)
     {
      $sql="SELECT * FROM employee WHERE employ_id='$id'";
      $run=$this->con->query($sql);
      return $run;
     }
     public function insert_salary($id,$date,$salary,$before)
     {
      
      $total_salary=$salary-$before;
      $sql="INSERT INTO salary(teacher_id,month,teacher_salary,before_salary,total_salry)VALUES('$id','$date','$salary','$before','$total_salary')";
      $run=$this->con->query($sql);
      return $run;
     }
     public function select_salary($id)
     {
      $sql="SELECT * FROM salary WHERE teacher_id='$id'";
      $run=$this->con->query($sql);
      return $run;
     }
    public function sum_total($id)
    {
      $sql="SELECT SUM(teacher_salary) FROM salary WHERE teacher_id='$id'";
        $run=$this->con->query($sql);
        $result=$run->fetch_assoc();
        return $result;
    }
    public function delete_salary($id)
    {
      $sql="DELETE FROM salary WHERE id='$id'";
      $run=$this->con->query($sql);
      return $run;


    }
    public function update_salary_id($id)
    {
           $sql="SELECT id,employ_id,employ_name,employ_salary,before_salary,month FROM teacher_salry WHERE id='$id'";
           $run=$this->con->query($sql);
           return $run;
    }
    public function update_salary($chnage,$t_id,$salary,$befor,$month)
    {
      $new=$salary-$befor;
      $sql="UPDATE salary SET month='$month', before_salary='$befor', total_salry='$new' WHERE id='$chnage' and teacher_id='$t_id'";
      $run=$this->con->query($sql);
      return $run;
    }
    public function sum_before($id)
    {
      $sql="SELECT SUM(before_salary) FROM salary WHERE teacher_id='$id'";
        $run=$this->con->query($sql);
        $result=$run->fetch_assoc();
        return $result;
    }





     public function count_teacher()
     {
        $sql="SELECT COUNT(employ_id) FROM employee";
        $run=$this->con->query($sql);
        $result=$run->fetch_assoc();
        return $result;
     }
     public function sum_salary()
     {
        $sql="SELECT SUM(employ_salary) FROM employee";
        $run=$this->con->query($sql);
        $result=$run->fetch_assoc();
        return $result;
     }
 




}

class Expan{

  private $host_name="localhost";
  private $username="root";
  private $pasword="";
  private $db_name="academy";
  public $con;
  // start of connecting Database
          public function __construct()
          {
          $this->con=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
          if($this->con->connect_error)
          {
              echo $this->con->connect_error ;
              exit();
          }
          else
          {
            return $this->con;
          }

          }
          public function select_spcific_expan($ofset,$limet)
          {
              $sql="SELECT * FROM expense LIMIT {$ofset},{$limet}";
              $run=$this->con->query($sql);
              return $run;
          }
          public function select_all_expan()
          {
            $sql="SELECT * FROM expense ";
            $run=$this->con->query($sql);
            return $run;

          }
          public function insert_expan($data,$amount,$info)
          {
            $sql="INSERT INTO expense (Expens_Date,Expens_Amount,Expens_Description)VALUES('$data','$amount','$info')";
            $run=$this->con->query($sql);
            return $run;
          }   
          public function Delete_expan($id)
          {
            $sql="DELETE FROM expense  WHERE Expens_ID='$id'";
            $run=$this->con->query($sql);
            return $run;
          }
          public function view_expane($id)
          {
              $sql="SELECT * FROM expense WHERE Expens_ID='$id'";
              $run=$this->con->query($sql);
              return $run;
          }
          public function update_expan($id,$date,$amount,$info)
          {
            // Expens_Date,Expens_Amount,Expens_Description
            $sql="UPDATE expense SET Expens_Date='$date',Expens_Amount='$amount', Expens_Description='$info' WHERE Expens_ID='$id' ";
            $run=$this->con->query($sql);
            return $run;
          }
          public function search_expan_data($id)
          {
            $sql="SELECT * FROM expense WHERE Expens_Date LIKE '%{$id}' OR Expens_Amount LIKE '%{$id}' OR Expens_ID LIKE  '%{$id}'
            OR Expens_Description LIKE '%{$id}'";
            $run=$this->con->query($sql);
            return $run;
          }

          public function sum_expen()
          {
            $sql="SELECT SUM(Expens_Amount) FROM expense";
              $run=$this->con->query($sql);
              $res=$run->fetch_assoc();
              return $res;
          }


          // public function update_expan_id($id)
          // {
          //   $sql="SELECT * FROM expense WHERE Expens_ID='$id'";
          //   $run=$this->con->query($sql);
          //   return $run
          // }


}













?>