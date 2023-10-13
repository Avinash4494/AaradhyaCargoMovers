<?php
require_once('Admin_Pannel/db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from create_job where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Aaradhya Cargo Movers</title>
  <head>
    <?php include_once 'Header_Links/header_links.php' ?>
  </head>
  <body id="tothetop">
    <?php include_once 'Header/headerHome.php' ?>
    <div class="aboutHeader"></div>
    <!--  <section id="sectionAboutHead" >
      <h2>Careers</h2>
      <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Careers</span></h4>
    </section> -->
    <section id="sectionTitle" class="container-fluid">
      <h2>Apply Now</h2>
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
          <div class="row">
            <div class="col-lg-7">
              <div class="careersComponent">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-10">
                          <h4><b><?php echo $row["job_title"]; ?></b></h4>
                          <h5><b>Aaradhya Cargo Movers</b></h5>
                        </div>
                        <div class="col-lg-2"><a href=""><button type="submit" class="universalButtonCareer">Apply Now</button></a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <h5><b>Job ID - <?php echo $row["job_id"]; ?></b></h5>
                      </div>
                      <div class="col-lg-6">
                        <h5 style="float: right;">Published On - <?php echo $row["published_on"]; ?></h5>
                      </div>
                    </div>
                    <div class="courierDescription" >
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="row" style="text-align: center;">
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
                          </div><hr />
                          <div class="row">
                            <div class="col-lg-12">
                              <h4><b>Job Description</b></h4>
                              <h5><b>Education Qualification - </b><?php echo $row["education"]; ?></h5>
                              
                              <h5><b>Timings - </b><?php echo $row["timings"]; ?></h5>
                              <h5><b>Apply Before - </b><?php echo $row["ends_on"]; ?></h5>
                              <h5><b>Total Vacancies - </b><?php echo $row["total_post"]; ?></h5>
                              <h5><b>Skills - </b><br><?php echo $row["skills"]; ?></h5>
                              <h5><b>Requirments - </b> <br><?php echo $row["requirments"]; ?></h5>
                              <h5><b>Role & Responsbilities - </b><br><?php echo $row['role_resp'];?></h5><br><br>
                              <h5><?php echo $row['speical_info'];?></h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <section id="sectionGetQuote">
              <div class="widgetQuoteRight">
                <div class="widgetQuote">
                  <p id="AllFields"></p>
                  <form name ="register" onsubmit="return jobvalidate();" action="Admin_Pannel/Careers_Portal/ApplyNowProcess.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="career_id" name="career_id" hidden="">
                    <div class="row">
                      <div class="col-lg-12">
                        <label>Job ID<span>*</span> </label>
                        <div class="form-group">
                          <input type="text" id="job_id" class="form-control" name="job_id" onkeyup="JDValidate()" placeholder="Enter Job ID">
                          <span id='JDError'></span>
                        </div>
                        <label>Full Name <span>*</span> </label>
                        <div class="form-group">
                          <input type="text"  id="fname" class="form-control" name="fname" onkeyup="NameValidate()" placeholder="Full Name">
                          <span id='NameError'></span>
                        </div>
                        <label>Experience <span>*</span> </label>
                        <div class="form-group">
                          <input type="text"  id="experience" class="form-control" name="exp" onkeyup="ExperienceValidate()" placeholder="Experience">
                          <span id='ExperienceError'></span>
                        </div>
                        <label>Contact Number <span>*</span>  </label>
                        <div class="form-group">
                          <input type="text" id="contact" class="form-control" name="contact" onkeyup="contactValidate()" placeholder="Your Contact Number">
                          <span id='contactError'></span>
                        </div>
                        <label>Email <span>*</span> </label>
                        <div class="form-group">
                          <input type="email" class="form-control" id="email" name="email" onkeyup="emailValidate()" placeholder="Your Email">
                          <span id='emailError'></span>
                        </div>
                        <label>Highest Qualification <span>*</span> </label>
                        <div class="form-group">
                          <input type="text"  id="highestQualification" class="form-control" name="highestQualification" onkeyup="highestValidate()" placeholder="Highest Qualification">
                          <span id='highestError'></span>
                        </div>
                        <label>College/University <span>*</span> </label>
                        <div class="form-group">
                          <input type="text"  id="college" class="form-control" name="college" onkeyup="collegeValidate()" placeholder="College/University">
                          <span id='collegeError'></span>
                        </div>
                        <label>Skills <span>*</span> </label>
                        <div class="form-group">
                          <input type="text"  id="skills" class="form-control" name="skills" onkeyup="skillsValidate()" placeholder="Skills">
                          <span id='skillsError'></span>
                        </div>
                        <label>About Yourself </label>
                        <div class="form-group">
                          <input type="text" id="about" class="form-control" name="about"  placeholder="About Yourself (should be below 150 words)">
                          <span id='aboutError'></span>
                        </div>
                        <div class="form-group">
                          <label for="contact">Upload Resume</label>
                          <input type="file" class="form-control" id="file" name="image" onchange="Filevalidation()">
                          <span id='imageError' style="font-size: 1em;"></span><br>
                          <p>File Upload size : <span id='size'></span></p>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="form-group">
                          <button type="reset" class="universalButtonRed">Reset</button>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="form-group">
                          <button type="submit" name="Submit" class="universalButtonRed">Submit</button>
                        </div>
                      </div>
                      <div class="col-lg-2"></div>
                    </div>
                    
                    <br>
                  </form>
                </div>
                
              </div>
            </section>
          </div>
        </div>
      </div>
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
            <div class="col-lg-8"  >
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
                echo "<a style='border:none;' href='jobShow.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                }
                for ($i=1; $i<=$total_pages; $i++) {
                if ($i == $page) {
                $pagLink .= "<a class = 'active' href='jobShow.php?page="
                .$i."'>".$i." </a>";
                }
                else  {
                $pagLink .= "<a href='jobShow.php?page=".$i."'>
                ".$i." </a>";
                }
                };
                echo $pagLink;
                if($page<$total_pages){
                echo "<a style='border:none;' href='jobShow.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                }
                ?>
              </div>
            </div>
            <div class="col-lg-4" >
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
          window.location.href = 'jobShow.php?page='+page;
          }
          </script>
        </div>
      </div>
    </section>
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>
<script>
  function jobvalidate()
{
  var job_id=document.getElementById("job_id").value;
  var fname=document.getElementById("fname").value;
  var experience=document.getElementById("experience").value;
  var contact=document.getElementById("contact").value;
  var mail=document.getElementById("email").value;
  var highestQualification =document.getElementById("highestQualification").value;
  var college=document.getElementById("college").value;
  var skills=document.getElementById("skills").value;
  var image=document.getElementById("file").value;
  

   if(job_id.length==0||fname.length==0||experience.length==0||contact.length==0||mail.length==0||
    highestQualification.length==0||college.length==0||skills.length==0||image.length==0)
     {
     alert("* All Fields are required");
     document.getElementById("AllFields").innerHTML="* All Fields are required"; 
     return false;
     }
   else
   {
    document.getElementById("AllFields").innerHTML=""; 
     return true;
   }
}
function JDValidate()
{
var job_id = document.forms["register"]["job_id"]; 
if (job_id.value == "")                                  
{ 
    document.getElementById("JDError").innerHTML="Enter valid Job ID"; 
    job_id.focus(); 
    return false; 
}
else
  {
  document.getElementById("JDError").innerHTML=""; 
  }
}
function NameValidate()
{
var lname = document.forms["register"]["fname"]; 
if (lname.value == "")                                  
{ 
    document.getElementById("NameError").innerHTML="Please enter valid name"; 
    lname.focus(); 
    return false; 
}
else
  {
  document.getElementById("NameError").innerHTML=""; 
  }
}

function ExperienceValidate()
{
var experience = document.forms["register"]["experience"]; 
if (experience.value == "")                                  
{ 
    document.getElementById("ExperienceError").innerHTML="Please enter valid Experience"; 
    experience.focus(); 
    return false; 
}
else
  {
  document.getElementById("ExperienceError").innerHTML=""; 
  }
}

function contactValidate()
{
var contact = document.forms["register"]["contact"]; 
if (contact.value == ""||contact.value.length<10||contact.value.length>10)                               
{ 
   document.getElementById("contactError").innerHTML="Please enter valid contact number"; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
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
function highestValidate()
{
var highestQualification = document.forms["register"]["highestQualification"]; 
if (highestQualification.value == "")                                  
{ 
    document.getElementById("highestError").innerHTML="Qualification shouldn't be empty."; 
    highestQualification.focus(); 
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
    document.getElementById("collegeError").innerHTML="College Name shouldn't be empty."; 
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
    document.getElementById("skillsError").innerHTML="Skills shouldn't be empty."; 
    skills.focus(); 
    return false; 
}
else
  {
  document.getElementById("skillsError").innerHTML=""; 
  }
}
 
Filevalidation = () => {
        const fi = document.getElementById('file');
        // Check if any file is selected.
        var image = document.forms["register"]["file"]; 
if (image.value == "")                                  
{ 
    document.getElementById("imageError").innerHTML="Please upload valid Resume"; 
    image.focus(); 
    return false; 
}
else
  {
  document.getElementById("imageError").innerHTML=""; 
  }
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 2048) {
                    alert(
                      "Opps!!! File too Big, please select a file less than 2 Mb");
                    document.getElementById('imageError').innerHTML = "Opps!!! File too Big, please select a file less than 2 Mb";
                } else if (file < 200) {
                    alert(
                      "Opps!!! File too small, please select a file greater than 200 Kb");
                    document.getElementById('imageError').innerHTML = "Opps!!! File too small, please select a file greater than 200 Kb";
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
    }
</script>