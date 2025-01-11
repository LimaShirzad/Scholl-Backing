let pas=document.querySelector("#pasword");
let eye=document.querySelector("#eye");
eye.onclick=function()
{
    if(pas.type=="password")
    {
        pas.type="text";
       
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }else{
        pas.type="password";
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
   
    }
}