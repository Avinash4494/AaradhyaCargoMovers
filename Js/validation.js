function jobvalidate()
{
  var job_id=document.getElementById("job_id").value;
  var fname=document.getElementById("fname").value;
  var experience=document.getElementById("experience").value;
  var contact=document.getElementById("contact").value;
  var email=document.getElementById("email").value;
  var highestQualification =document.getElementById("highestQualification").value;
  var college=document.getElementById("college").value;
  var skills=document.getElementById("skills").value;
  var image=document.getElementById("image").value;
  

   if(job_id.length==0||fname.length==0||experience.length==0||contact.length==0||email.length==0||
    highestQualification.length==0||college.length==0||skills.length==0||image.length==0)
     {
     alert("dog");
     document.getElementById("AllFields").innerHTML="All Fields are required"; 
     return false;
     }
   else
   {
    document.getElementById("AllFields").innerHTML="Valid name"; 
    alert("bitch");
     return true;
   }
}

// function firstNameValidate()
// {
// var fname = document.forms["register"]["fname"]; 
// if (fname.value == "")                                  
// { 
//     document.getElementById("fn").innerHTML="Please enter valid name"; 
//     fname.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("fn").innerHTML=""; 
//   }
// }
// function lastNameValidate()
// {
// var lname = document.forms["register"]["lname"]; 
// if (lname.value == "")                                  
// { 
//     document.getElementById("ln").innerHTML="Please enter valid name"; 
//     lname.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("ln").innerHTML=""; 
//   }
// }

// function contactValidate()
// {
// var cont = document.forms["register"]["contact"]; 
// if (cont.value == ""||cont.value.length<10||cont.value.length>10)                               
// { 
//    document.getElementById("conerror").innerHTML="Please enter valid contact number"; 
//     cont.focus(); 
//     return false; 
// }
// else
// {
// document.getElementById("conerror").innerHTML=""; 
// }
// }

// function emailValidate()
// {
// var mail = document.forms["register"]["email"];  
// if (mail.value == "")                                   
// { 
//    document.getElementById("emailError").innerHTML="Please enter valid email id";  
//     mail.focus(); 
//     return false; 
// } 
// else
// {
// document.getElementById("emailError").innerHTML=""; 
// }
// if (mail.value.indexOf("@", 0) < 0)                 
// { 
//   document.getElementById("emailError").innerHTML="Please enter valid email id";      
//   mail.focus(); 
//     return false; 
// } 
// else
// {
// document.getElementById("emailError").innerHTML=""; 
// }

// if (mail.value.indexOf(".", 0) < 0)                 
// { 
//   document.getElementById("emailError").innerHTML="Please enter valid email id";     
//   mail.focus(); 
//     return false; 
// } 
// else
// {
// document.getElementById("m").innerHTML=""; 
// }
// }

// function highestValidate()
// {
// var highest = document.forms["register"]["highestQualification"]; 
// if (highest.value == "")                                  
// { 
//     document.getElementById("highestError").innerHTML="Please enter valid Qualification"; 
//     highest.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("highestError").innerHTML=""; 
//   }
// }
// function collegeValidate()
// {
// var college = document.forms["register"]["college"]; 
// if (college.value == "")                                  
// { 
//     document.getElementById("collegeError").innerHTML="Please enter valid College"; 
//     college.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("collegeError").innerHTML=""; 
//   }
// }
// function skillsValidate()
// {
// var skills = document.forms["register"]["skills"]; 
// if (skills.value == "")                                  
// { 
//     document.getElementById("skillsError").innerHTML="Please enter valid Skills"; 
//     skills.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("skillsError").innerHTML=""; 
//   }
// }
// function stateValidate()
// {
// var state = document.forms["register"]["state"]; 
// if (state.value == "")                                  
// { 
//     document.getElementById("stateError").innerHTML="Please enter valid State"; 
//     state.focus(); 
//     return false; 
// }
// else
//   {
//   document.getElementById("stateError").innerHTML=""; 
//   }
// }