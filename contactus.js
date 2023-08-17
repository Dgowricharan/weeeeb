/*function validateform(){  
    var username=document.getElementById();  
    var password=document.myform.password.value;  
     alert (username) 
    if (fullname==null || fullname==""){  
      alert("Name can't be blank");  
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }  
    
   
    var num=document.myform.num.value;  
    if (isNaN(num)){  
      document.getElementById("numloc").innerHTML="Enter Numeric value only";  
      return false;  
    }else{  
      return true;  
      }  
    
      
    
    var x=document.myform.email.value;  
    var atposition=x.indexOf("@");  
    var dotposition=x.lastIndexOf(".");  
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
      alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
      return false;  
      }  
}*/

function validatae()
{
    var nam=document.getElementsByClassName('contact_name');
    if(nam.length<10)
    {
        alert("Enter more than 6 ");
        return false;
    }
    else 
    return true;
}