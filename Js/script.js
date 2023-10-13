function showtime() {
var today = new Date();
var slicedate=today.toString().slice(0,16);
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTime(m);
s = checkTime(s);
document.getElementById('show_time').innerHTML =
slicedate + " " + h + ":" + m + ":" + s;
var t = setTimeout(showtime, 500);
if(h>=1 && h<=12)
{
document.getElementById("greetings").innerHTML= 'Good Morning';
}
else if(h>=12 && h<=15)
{
document.getElementById("greetings").innerHTML= 'Good Afternoon';
}
else if(h>=15 && h<=24)
{
document.getElementById("greetings").innerHTML= "Good Evening";
}


function checkTime(i) {
if (i < 10) {i = "0" + i};
return i;
}
}


function myvalidate()
{
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
var repassword=document.getElementById("repassword").value;
if(username.length==0||password.length==0||repassword.length==0)
{
document.getElementById("AllFields").innerHTML="*All Fields are required";
return false;
}
else
{
document.getElementById("OkFields").innerHTML="Valid name";
return true;
}
}