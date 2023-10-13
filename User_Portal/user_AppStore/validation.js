
function shipmentValidate()
{
var pick_date=document.getElementById("pick_date").value;
var pick_time=document.getElementById("pick_time").value;
var pick_address=document.getElementById("pick_address").value;
var pick_city=document.getElementById("pick_city").value;

var pick_pincode=document.getElementById("pick_pincode").value;
var pick_deliAddress=document.getElementById("pick_deliAddress").value;
var pick_deliCity=document.getElementById("pick_deliCity").value;
var pick_deliPincode=document.getElementById("pick_deliPincode").value;
var pick_deliState=document.getElementById("pick_deliState").value;
var pick_deliPhone=document.getElementById("pick_deliPhone").value;
var pick_freight_type=document.getElementById("pick_freight_type").value;
var pick_personal_names=document.getElementById("pick_personal_names").value;
var pick_personal_email=document.getElementById("pick_personal_email").value;
var pick_personal_phone=document.getElementById("pick_personal_phone").value;
var gstin=document.getElementById("gstin").value;
var pick_state=document.getElementById("pick_state").value;
var pick_phone=document.getElementById("pick_phone").value;
if(pick_date.length==0||mail.pick_time==0||pick_address.length==0||pick_city.length==0
	||pick_pincode.length==0||pick_deliAddress.length==0||pick_deliCity.length==0||pick_deliPincode.length==0
	||pick_deliState.length==0||pick_deliPhone.length==0||pick_freight_type.length==0||pick_personal_names.length==0
	||pick_personal_email.length==0||pick_personal_phone.length==0||gstin.length==0
	||pick_state.length==0||pick_phone.length==0)
{
document.getElementById("AllFields").innerHTML="* All Fields are required";
return false;
}
else
{
document.getElementById("AllFields").innerHTML="";
return true;
}

} 
function coyContact()
{
	var phoneno = /^\d{10}$/;
var contact = document.forms["register"]["pick_personal_phone"];
if (contact.value == "")
{
document.getElementById("contactError").innerHTML="Contact Number shouldn't be empty.";
contact.focus();
return false;
}
else
{
document.getElementById("contactError").innerHTML="";
}
if (contact.value.match(phoneno))
{
document.getElementById("contactError").innerHTML="";
}
else
{
document.getElementById("contactError").innerHTML="Invalid Contact Number";
contact.focus();
return false;
}
}
function coyGstin()
{
var contact = document.forms["register"]["gstin"];
if (contact.value == "")
{
document.getElementById("gstinError").innerHTML="GSTIN Number shouldn't be empty.";
contact.focus();
return false;
}
else
{
document.getElementById("gstinError").innerHTML="";
}
if (contact.value.length<15)
{
document.getElementById("gstinError").innerHTML="GSTIN Number shouldn't be less than 15 digits.";
contact.focus();
return false;
}
else
{
document.getElementById("gstinError").innerHTML="";
}
if (contact.value.length>15)
{
document.getElementById("gstinError").innerHTML="GSTIN Number shouldn't be more than 15 digits.";
contact.focus();
return false;
}
else
{
document.getElementById("gstinError").innerHTML="";
}
}

function emailValidate()
{
var mail = document.forms["register"]["pick_personal_email"];
if (mail.value == "")
{
document.getElementById("emailError").innerHTML="Please enter valid email id";
mail.focus();
return false;
}
else
{
document.getElementById("emailError").innerHTML="";
}
if (mail.value.indexOf("@", 0) < 0)
{
document.getElementById("emailError").innerHTML="@ is missing";
mail.focus();
return false;
}
else
{
document.getElementById("emailError").innerHTML="";
}
if (mail.value.indexOf(".", 0) < 0)
{
document.getElementById("emailError").innerHTML=".com is missing";
mail.focus();
return false;
}
else
{
document.getElementById("emailError").innerHTML="";
}
}
 
