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
   



        <nav class="navbar navbar-dark  fixed-top text-capitalize ">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">the profissional academy</a>
            <span class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
               <i class="fa-solid fa-bars"></i>
            </span>
         


            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">menue</h5>
               <i class="fa-solid fa-x"
               data-bs-dismiss="offcanvas" 
               aria-label="Close"
               ></i>       
            
              </div>
              <div class="offcanvas-body">
           
     
                       <div class="said-body">                      
     
                            <div class="said-item">
                                    
     
                                     <div class="accordion" id="student">
                                         <div class="accordion-item">
                                             <h2 class="accordion-header">
                                                 <div class="icon">
                                                     <i class="fa-solid fa-graduation-cap"></i>
                                                 </div>
                                               <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapsestudent" aria-expanded="false" aria-controls="collapsestudent">
                                                   student 
                                                 </button>
                                             </h2>
                                             <div id="collapsestudent" class="accordion-collapse collapse" data-bs-parent="#student">
                                               <div class="accordion-body">
                                                    <div class="link">
                                                       <a href="studentinfo.php" class="nav-link">student rigistration</a>
                                                    </div>
                                                    <div class="link">
                                                     <a href="addmision.php" class="nav-link">student addmission</a>
                                                  </div>

                                                  <div class="link">
                                                     <a href="studentreport.php" class="nav-link">report</a>
                                                  </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                    </div>
     
                                    <div class="said-item">
                                    
     
                                     <div class="accordion" id="teacher">
                                         <div class="accordion-item">
                                             <h2 class="accordion-header">
                                                 <div class="icon">
                                                     <i class="fa-solid fa-person-chalkboard"></i>
                                                 </div>
                                               <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseteacher" aria-expanded="false" aria-controls="collapseteacher">
                                                   teacher
                                               </button>
                                             </h2>
                                             <div id="collapseteacher" class="accordion-collapse collapse" data-bs-parent="#teacher">
                                               <div class="accordion-body">
                                                    <div class="link">
                                                       <a href="teacherinfo.php" class="nav-link">teacher rigidtration</a>
                                                    </div>
                                                    <div class="link">
                                                     <a href="teachersalary.php" class="nav-link">give salary</a>
                                                  </div>
                                                  <div class="link">
                                                     <a href="studentreport.php" class="nav-link">repeort</a>
                                                  </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                    </div>
     
                                    <div class="said-item">
                                    
     
                                     <div class="accordion" id="course">
                                         <div class="accordion-item">
                                             <h2 class="accordion-header">
                                                 <div class="icon">
                                                     <i class="fa-solid fa-landmark"></i>
                                                 </div>
                                               <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapsecourse" aria-expanded="false" aria-controls="collapsecourse">
                                                  course
                                               </button>
                                             </h2>
                                             <div id="collapsecourse" class="accordion-collapse collapse" data-bs-parent="#course">
                                               <div class="accordion-body">
                                                    <div class="link">
                                                       <a href="course.php" class="nav-link">add course</a>
                                                    </div>
                                                    <div class="link">
                                                     <a href="courserepot.php" class="nav-link">course report</a>
                                                  </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                    </div>
     
     
     
     
     
                                    <div class="said-item">
                                    
     
                                     <div class="accordion" id="user">
                                         <div class="accordion-item">
                                             <h2 class="accordion-header">
                                                 <div class="icon">
                                                     <i class="fa-solid fa-user-tie"></i>
                                                 </div>
                                               <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseuser" aria-expanded="false" aria-controls="collapseuser">
                                                   user
                                               </button>
                                             </h2>
                                             <div id="collapseuser" class="accordion-collapse collapse" data-bs-parent="#user">
                                               <div class="accordion-body">
                                                    <div class="link">
                                                       <a href="user.php" class="nav-link">user rigistration</a>
                                                    </div>
                                                    <!-- <div class="link">
                                                     <a href="" class="nav-link"></a>
                                                  </div> -->
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                    </div>
     
                                    <div class="said-item">
                                    
     
                                     <div class="accordion" id="expen">
                                         <div class="accordion-item">
                                             <h2 class="accordion-header">
                                                 <div class="icon">
                                                     <i class="fa-solid fa-cookie-bite"></i>
                                                 </div>
                                               <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseexpen" aria-expanded="false" aria-controls="collapseexpen">
                                                      expen
                                               </button>
                                             </h2>
                                             <div id="collapseexpen" class="accordion-collapse collapse" data-bs-parent="#expen">
                                               <div class="accordion-body">
                                                    <div class="link">
                                                       <a href="expen.php" class="nav-link">add expen</a>
                                                    </div>
                                                    <div class="link">
                                                     <a href="expen_reocrd.php" class="nav-link">expen report</a>
                                                  </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                    </div>
     
     
     
                                    <div class="said-item">
      
                                                 <div class="footer">
                                                   <div class="icon">
                                                     <i class="fa-solid fa-right-from-bracket"></i>
                                                   </div>
                                                   <div class="text">
                                                    <a href="logout.php" >
                                                        <span>log out</span>
                                                    </a>   
                                                   </div>
                                                 </div>
                                                   
                                    </div>
     
                         
                                 
     
     
     
                  </div>
                  </div>
     

               
              </div>
            </div>
          </div>
        </nav>
  





       
    
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>  
</body>
</html>