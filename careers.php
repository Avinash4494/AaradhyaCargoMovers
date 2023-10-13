<!DOCTYPE html>
<html>
  <title>Aaradhya Cargo Movers</title>
  <head>
    <?php include_once 'Header_Links/header_links.php' ?>
  </head>
  <body id="tothetop">
    <?php include_once 'Header/headerHome.php' ?>
    <div class="aboutHeader"></div>
    <section id="sectionAboutHead" class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="sectionTitleHead">
            <div class="well">
              <div class="topImag">
                <div class="row" >
                  <div class="col-lg-12 col-xs-8">
                    <h4>Welcome to </h4>
                    <h2>Aaradhya Cargo Movers</h2>
                    <h5>We’re always interested in new projects, big or small.</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-xs-6"><a href="quote.php"><button class="universalButton">Get A Quote</button></a></div>
               <div class="col-lg-3 col-xs-6"><a href="contactUs.php"><button class="universalButton">Find Out More</button></a></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Careers</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Careers</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>Upcoming Jobs</h2>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:;">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
                <div class="col-lg-2 col-xs-2" style="background-color:red"></div>
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p>We’re always interested in new projects, big or small. <br> Send us an email and we’ll get in touch shortly, or phone between 8:00 am and 7:00 pm Monday to Saturday.</p>
    </section>
    <section id="upcomingJobs">
      <div class="container-fluid">
        <div class="careersCardComponent">
          <?php
          // Import the file where we defined the connection to Database.
          require_once "Admin_Pannel/db.php";
          $per_page_record = 20;  // Number of entries to show in a page.
          // Look for a GET variable page if not found default is 1.
          if (isset($_GET["page"])) {
          $page  = $_GET["page"];
          }
          else {
          $page=1;
          }
          $start_from = ($page-1) * $per_page_record;
          $query = "SELECT * FROM create_job order by ends_on desc LIMIT
          $start_from, $per_page_record";
          $rs_result = mysqli_query ($connect, $query);
          ?>
          <?php
          if(mysqli_num_rows($rs_result)){
          while ($row = mysqli_fetch_array($rs_result)) {
          // Display each field of the records.
          ?>
          <div class="careersComponent">
            <a href="jobShow.php?id=<?php echo $row['id'] ?>">
              <div class="col-lg-6">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-9">
                      <h4><b><?php echo $row["job_title"]; ?></b></h4>
                    </div>
                    <div class="col-lg-3">
                      <h5><b>Job Id: </b> <?php echo $row["job_id"]; ?></h5>
                    </div>
                  </div>
                  <div class="courierDescription" >
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-3">
                            <h5><b><i class="fa fa-briefcase" aria-hidden="true"></i></b>&nbsp &nbsp
                            <?php echo $row["experience"]; ?> Yrs</h5>
                          </div>
                          <div class="col-lg-5">
                            <h5><b><i class="fa fa-map-marker" aria-hidden="true"></i></b>&nbsp &nbsp
                            <?php echo $row["job_location"]; ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5><b><i class="fa fa-inr" aria-hidden="true"></i></b>&nbsp &nbsp
                            <?php echo $row["salary"]; ?></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <h5><b>Skills </b><?php echo $row["skills"]; ?></h5>
                            <h5><b>Role & Responsbilities - </b><?php $subject_count =$row['role_resp'];
                            $slice_subject = substr($subject_count,0,85);
                            echo $slice_subject;
                            ?>.....</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                          </div>
                          <div class="col-lg-4">
                            <a href="jobShow.php?id=<?php echo $row['id'] ?>">
                            <button class="universalButtonCareer"> View More </button></a>
                          </div>
                          <div class="col-lg-4">
                            <h5>Published On
                            <?php echo $row["published_on"]; ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php }}
          else{echo '<h3 style="color:red;font-family: Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
          ?>
          <div class="row" >
            <div class="col-lg-8 col-xs-12"  >
              <div class="pagination" >
                <?php
                $query = "SELECT COUNT(*) FROM addcourier";
                $rs_result = mysqli_query($connect, $query);
                $row = mysqli_fetch_row($rs_result);
                $total_records = $row[0];
                // Number of pages required.
                $total_pages = ceil($total_records / $per_page_record);
                $pagLink = "";
                if($page>=2){
                echo "<a style='border:none;' href='careers.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                }
                for ($i=1; $i<=$total_pages; $i++) {
                if ($i == $page) {
                $pagLink .= "<a class = 'active' href='careers.php?page="
                .$i."'>".$i." </a>";
                }
                else  {
                $pagLink .= "<a href='careers.php?page=".$i."'>
                ".$i." </a>";
                }
                };
                echo $pagLink;
                if($page<$total_pages){
                echo "<a style='border:none;' href='careers.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                }
                ?>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12" >
              <div class="pagination" style="float: right;">
                <h4>Total Pages : <?php echo $page." / ".$total_pages; ?></h4>
              </div>
            </div>
          </div>
          <script>
          function go2Page()
          {
          var page = document.getElementById("page").value;
          page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
          window.location.href = 'careers.php?page='+page;
          }
          </script>
        </div>
      </div>
    </section>
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>
<script>
function myvalidate()
{
var fname=document.getElementById("fname").value;
var lname=document.getElementById("lname").value;
var cont=document.getElementById("contact").value;
var mail=document.getElementById("email").value;
var highest =document.getElementById("highestQualification").value;
var college=document.getElementById("college").value;
if(fname.length==0||lname.length==0||cont.length==0||mail.length==0||highest.length==0||college.length==0)
{
document.getElementById("AllFields").innerHTML="* All Fields are required";
return false;
}
else
{
document.getElementById("AllFields").innerHTML="Valid name";
return true;
}
}
function firstNameValidate()
{
var fname = document.forms["register"]["fname"];
if (fname.value == "")
{
document.getElementById("fn").innerHTML="Please enter valid name";
fname.focus();
return false;
}
else
{
document.getElementById("fn").innerHTML="";
}
}
function lastNameValidate()
{
var lname = document.forms["register"]["lname"];
if (lname.value == "")
{
document.getElementById("ln").innerHTML="Please enter valid name";
lname.focus();
return false;
}
else
{
document.getElementById("ln").innerHTML="";
}
}
function contactValidate()
{
var cont = document.forms["register"]["contact"];
if (cont.value == ""||cont.value.length<10||cont.value.length>10)
{
document.getElementById("conerror").innerHTML="Please enter valid contact number";
cont.focus();
return false;
}
else
{
document.getElementById("conerror").innerHTML="";
}
}
function emailValidate()
{
var mail = document.forms["register"]["email"];
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
document.getElementById("emailError").innerHTML="Please enter valid email id";
mail.focus();
return false;
}
else
{
document.getElementById("emailError").innerHTML="";
}
if (mail.value.indexOf(".", 0) < 0)
{
document.getElementById("emailError").innerHTML="Please enter valid email id";
mail.focus();
return false;
}
else
{
document.getElementById("m").innerHTML="";
}
}
function highestValidate()
{
var highest = document.forms["register"]["highestQualification"];
if (highest.value == "")
{
document.getElementById("highestError").innerHTML="Please enter valid Qualification";
highest.focus();
return false;
}
else
{
document.getElementById("highestError").innerHTML="";
}
}
function collegeValidate()
{
var college = document.forms["register"]["college"];
if (college.value == "")
{
document.getElementById("collegeError").innerHTML="Please enter valid College";
college.focus();
return false;
}
else
{
document.getElementById("collegeError").innerHTML="";
}
}
function skillsValidate()
{
var skills = document.forms["register"]["skills"];
if (skills.value == "")
{
document.getElementById("skillsError").innerHTML="Please enter valid Skills";
skills.focus();
return false;
}
else
{
document.getElementById("skillsError").innerHTML="";
}
}
function stateValidate()
{
var state = document.forms["register"]["state"];
if (state.value == "")
{
document.getElementById("stateError").innerHTML="Please enter valid State";
state.focus();
return false;
}
else
{
document.getElementById("stateError").innerHTML="";
}
}
function imageValidate()
{
var image = document.forms["register"]["image"];
if (image.value == "")
{
document.getElementById("imageError").innerHTML="Please enter valid State";
image.focus();
return false;
}
else
{
document.getElementById("imageError").innerHTML="";
}
}
</script>