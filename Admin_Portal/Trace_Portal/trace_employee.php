<?php
include('db.php');
$upload_dir = '../uploads/courier-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="courier_index.php"; }, 100);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Finder Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftFinder.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Employee Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Employee Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="trace_employee.php" method="post">
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                      <p>Search by Employee Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">

                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="word"  name="dock_number"  autocomplete="off" placeholder="Enter Employee ID"  required>
                      </div>
                      
                    </div>
                    <div class="col-lg-2">
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                      
                    </div>
                    <div class="col-lg-2"></div>
                    
                  </div>
                  
                </form>
                <br>
                <?php
                include('db.php');
                $upload_dir = '../../Emp_Portal/emp_Profile/uploads/';
                if(isset($_POST['click'])){
                $q = "SELECT * FROM employee_login";
                $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                if(mysqli_num_rows($result)>=1){
                while($rowMember = mysqli_fetch_assoc($result)){
                ?>
                              <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-2">
                        <?php
                        $profile_image = $rowMember['profile_image'];
                        if ($profile_image=='Null')
                        {
                        ?>
                        <img src="../image/emp.png" class="img-responsive">
                        <?php
                        }
                        else {
                        ?>
                        <div class="roundImage" >
                          <img src="<?php echo $upload_dir.$rowMember['profile_image'] ?>" class="img-responsive">
                          <h5>Emp Id : <?php echo $rowMember['employees_id'] ?></h5>
                        </div>
                        <style>
                        .roundImage img
                        {
                        height: 150px;
                        width: 150px;
                        border-radius: 50%;
                        }
                        .roundImage h5
                        {
                        text-align: center;
                        font-weight: bold;
                        font-size: 1.1em;
                        }
                        </style>
                        <?php
                        }
                        ?>
                        <h6 style="float: right;">Last updated on : <?php echo $row['profile_upDate'] ?></h6>
                      </div>
                      <div class="col-lg-10">
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-user"></i>&nbsp &nbsp Personal Details</div>
                            <div class="col-lg-2">
                              
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#personalDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="personalDetails" class="collapse">
                          <?php
                          $Fullname = $rowMember['Fullname'];
                          $email = $rowMember['Email'];
                          $phone = $rowMember['mobile'];
                          $dob = $rowMember['dob'];
                          $gender = $rowMember['gender'];
                          $country_birth = $rowMember['country_birth'];
                          $emp_id = $rowMember['employees_id'];
                          $aadhar_num = $rowMember['aadhar_num'];
                          $alternate_phone = $rowMember['alternate_phone'];
                          $martial_status = $rowMember['martial_status'];
                          $blood_grp = $rowMember['blood_grp'];
                          $nationality = $rowMember['nationality'];
                          $pan_num = $rowMember['pan_num'];
                          $birth_place = $rowMember['birth_place'];
                          
                          if ($Fullname==''||$email==''||$phone==''||$dob==''||$gender==''||$country_birth==''||$emp_id==''||$aadhar_num==''||$alternate_phone==''||$martial_status==''||$blood_grp==''||$nationality==''||$pan_num==''||$birth_place=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Personal details are not yet updated.</p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-9" >
                              
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Name : </b><?php echo $rowMember['Fullname'] ?></li>
                                <li class="list-group-item"><b>Email : </b><?php echo $rowMember['Email'] ?></li>
                                <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowMember['mobile'] ?></li>
                                
                                <?php
                                
                                // Creates DateTime objects
                                $datetime1 = date_create($rowMember["dob"]);
                                $datetime2 = date_create(date('Y-m-d'));
                                
                                // Calculates the difference between DateTime objects
                                $interval = date_diff($datetime1, $datetime2);
                                
                                // Printing result in years & months format
                                
                                ?>
                                <li class="list-group-item"><b>Gender : </b><?php echo $rowMember['gender'] ?></li>
                                <li class="list-group-item"><b>Age : </b><?php echo $interval->format('%y years %m months %d days'); ?></li>
                                <li class="list-group-item"><b>Date of Birth : </b><?php echo $rowMember['dob'] ?></li>
                                <li class="list-group-item"><b>Country : </b><?php echo $rowMember['country_birth'] ?></li>
                                <li class="list-group-item"><b>Place of Birth : </b><?php echo $rowMember['birth_place'] ?></li>
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Employee Id : </b><?php echo $rowMember['employees_id'] ?></li>
                                <li class="list-group-item"><b>Aadhar Number : </b><?php echo $rowMember['aadhar_num'] ?></li>
                                <li class="list-group-item"><b>PAN Number : </b><?php echo $rowMember['pan_num'] ?></li>
                                <li class="list-group-item"><b>Joining Date : </b><?php echo $rowMember['joiningDate'] ?></li>
                                <li class="list-group-item"><b>Alternate Number : </b><?php echo $rowMember['alternate_phone'] ?></li>
                                <li class="list-group-item"> <b>Martial Status : </b><?php echo $rowMember['martial_status'] ?></li>
                                <li class="list-group-item"><b>Blood Group :</b> <?php echo $rowMember['blood_grp'] ?></li>
                                <li class="list-group-item"><b>Nationality : </b><?php echo $rowMember['nationality'] ?></li>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-graduation-cap"></i>&nbsp &nbsp Education Details</div>
                            <div class="col-lg-2">
                              
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#educationDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="educationDetails" class="collapse">
                          <?php
                          $col_highQual = $rowMember['col_highQual'];
                          $col_degree = $rowMember['col_degree'];
                          $col_state = $rowMember['col_state'];
                          $col_yearPass = $rowMember['col_yearPass'];
                          $col_branch = $rowMember['col_branch'];
                          $col_percentage = $rowMember['col_percentage'];
                          $col_college = $rowMember['col_college'];
                          
                          if ($col_highQual==''||$col_degree==''||$col_state==''||$col_yearPass==''||$col_branch==''||$col_percentage==''||$col_college=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Educational details are not yet updated.</p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Highest Qualification : </b><?php echo $rowMember['col_highQual'] ?></li>
                                <li class="list-group-item"><b>Degree : </b><?php echo $rowMember['col_degree'] ?></li>
                                <li class="list-group-item"><b>State : </b><?php echo $rowMember['col_state'] ?></li>
                                <li class="list-group-item"><b>Year of Passing : </b><?php echo $rowMember['col_yearPass'] ?></li>
                                
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Percentage/CGPA : </b><?php echo $rowMember['col_percentage'] ?></li>
                                <li class="list-group-item"><b>Branch : </b><?php echo $rowMember['col_branch'] ?></li>
                                <li class="list-group-item"><b>College : </b><?php echo $rowMember['col_college'] ?></li>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-building"></i>&nbsp &nbsp Office Details</div>
                            <div class="col-lg-2">
                              <a href="update_office.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#OfficeDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="OfficeDetails" class="collapse">
                          <?php
                          $offc_desig = $rowMember['offc_desig'];
                          $offc_floor = $rowMember['offc_floor'];
                          $offc_wing = $rowMember['offc_wing'];
                          $offc_cubicle = $rowMember['offc_cubicle'];
                          $offc_tower = $rowMember['offc_tower'];
                          
                          if ($offc_desig==''||$offc_floor==''||$offc_wing==''||$offc_cubicle==''||$offc_tower=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-10">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Office details are not yet updated. Click on "Edit" to update.</p>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <h4 style="font-size: 0.9em;">  <a href="update_office.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip" >
                                <button class="actionButtonIcons-center">
                                <i class="fa fa-pencil"></i> &nbsp Edit
                                </button>
                              </a></h4>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-lg-6">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Employee ID Name : </b> <?php echo $rowMember['employees_id'] ?></li>
                                    <li class="list-group-item"><b>Name :</b> <?php echo $rowMember['Fullname'] ?></li>
                                    <li class="list-group-item"><b>Designation :</b> <?php echo $rowMember['offc_desig'] ?></li>
                                    <li class="list-group-item"><b>Email Id :</b> <?php echo $rowMember['Email'] ?></li>
                                    <?php
                                    $dateConv1 = date_create($rowMember["joiningDate"]);
                                    $dateConv2 = date_create(date('Y-m-d'));
                                    $intervalConv = date_diff($dateConv1, $dateConv2);
                                    ?>
                                    <li class="list-group-item"><b>Date of Joining :</b> <?php echo $intervalConv->format('%y years %m months %d days'); ?></li>
                                    
                                  </ul>
                                </div>
                                <div class="col-lg-6">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Floor :</b> <?php echo $rowMember['offc_floor'] ?></li>
                                    <li class="list-group-item"><b>Wing :</b> <?php echo $rowMember['offc_wing'] ?></li>
                                    <li class="list-group-item"><b>Cubicle Number :</b> <?php echo $rowMember['offc_cubicle'] ?></li>
                                    <li class="list-group-item"><b>Tower Number :</b> <?php echo $rowMember['offc_tower'] ?></li>
                                    <li class="list-group-item"><b>Location :</b> <?php echo $rowMember['offc_location'] ?></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-briefcase"></i>&nbsp &nbsp Work Experience Details</div>
                            <div class="col-lg-2">
                              
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#workDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="workDetails" class="collapse">
                          <?php
                          $work_company = $rowMember['work_company'];
                          $work_role = $rowMember['work_role'];
                          $work_exp = $rowMember['work_exp'];
                          $work_primskills = $rowMember['work_primskills'];
                          $work_secskills = $rowMember['work_secskills'];
                          $work_about = $rowMember['work_about'];
                          if ($work_company==''||$work_role==''||$work_exp==''||$work_primskills==''||$work_secskills==''||$work_about=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Work Experience details are not yet updated.</p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Company Name : </b><?php echo $rowMember['work_company'] ?></li>
                                <li class="list-group-item"><b>Role : </b><?php echo $rowMember['work_role'] ?></li>
                                <li class="list-group-item"><b>Experience : </b><?php echo $rowMember['work_exp'] ?></li>
                                <li class="list-group-item"><b>Primary Skills : </b><?php echo $rowMember['work_primskills'] ?></li>
                                
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Secondary Skills : </b><?php echo $rowMember['work_secskills'] ?></li>
                                <li class="list-group-item"><b>Short Description about you.</b><br><?php echo $rowMember['work_about'] ?></li>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                        <!--                         <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-desktop"></i>&nbsp &nbsp Asset Details</div>
                            <div class="col-lg-2">
                              <h4>  <a href="update_office.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                                <button class="actionButtonIcons-center">
                                <i class="fa fa-pencil"></i> &nbsp Edit
                                </button>
                              </a></h4>
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#assetDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div> -->
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-rupee"></i>&nbsp &nbsp Bank Details</div>
                            <div class="col-lg-2">
                              
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#BankDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="BankDetails" class="collapse">
                          <?php
                          $bank_record_name = $rowMember['bank_record_name'];
                          $bank_name = $rowMember['bank_name'];
                          $bank_code = $rowMember['bank_code'];
                          $bank_ifsc_code = $rowMember['bank_ifsc_code'];
                          $bank_type = $rowMember['bank_type'];
                          $bank_record_name = $rowMember['bank_record_name'];
                          $bank_account_num = $rowMember['bank_account_num'];
                          $bank_city = $rowMember['bank_city'];
                          $bank_country = $rowMember['bank_country'];
                          
                          if ($bank_record_name==''||$bank_name==''||$bank_code==''||$bank_ifsc_code==''||$bank_type==''||$bank_record_name==''||$bank_account_num==''||$bank_city==''||$bank_country=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Bank details are not yet updated.</p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Name as per record : </b><?php echo $rowMember['bank_record_name'] ?></li>
                                <li class="list-group-item"><b>Bank Name : </b><?php echo $rowMember['bank_name'] ?></li>
                                <li class="list-group-item"><b>Bank Code : </b><?php echo $rowMember['bank_code'] ?></li>
                                <li class="list-group-item"><b>IFSC Code : </b><?php echo $rowMember['bank_ifsc_code'] ?></li>
                                <li class="list-group-item"><b>Account Type : </b><?php echo $rowMember['bank_type'] ?></li>
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Name as per bank : </b><?php echo $rowMember['bank_record_name'] ?></li>
                                <li class="list-group-item"><b>Account Number : </b><?php echo $rowMember['bank_account_num'] ?></li>
                                <li class="list-group-item"><b>City : </b><?php echo $rowMember['bank_city'] ?></li>
                                <li class="list-group-item"><b>Country : </b><?php echo $rowMember['bank_country'] ?></li>
                              </ul>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="profileHeadComp">
                              <h4>
                              <div class="row">
                                <div class="col-lg-9"><i class="fa fa-address-card-o"></i>&nbsp &nbsp Address Details</div>
                                <div class="col-lg-2">
                                  
                                </div>
                                <div class="col-lg-1">
                                  <div class="dropDownIcon">
                                    <i class="fa fa-sort-desc" data-toggle="collapse"
                                    data-target="#AddressDetails"></i>
                                  </div>
                                </div>
                              </div>
                              </h4>
                            </div>
                            <div id="AddressDetails" class="collapse">
                              <div class="row">
                                <div class="col-lg-6">
                                  <h5><b>Communication Address Details</b></h5>
                                  <?php
                                  $present_address = $rowMember['present_address'];
                                  $present_state = $rowMember['present_state'];
                                  $present_pincode = $rowMember['present_pincode'];
                                  
                                  if ($present_address==''||$present_state==''||$present_pincode=='')
                                  {
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="nullAddress" style="text-align:
                                        center;padding-bottom: 10px;">
                                        <p>Oops!! Communication address details are not yet updated.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                  }
                                  else {
                                  ?>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $rowMember['present_address'] ?>,<br><?php echo $rowMember['present_state'] ?>,<?php echo $rowMember['present_pincode'] ?></li>
                                  </ul>
                                  <?php
                                  }
                                  ?>
                                </div>
                                <div class="col-lg-6">
                                  
                                  <h5><b>Permanent Address Details</b></h5>
                                  <?php
                                  $permanent_address = $rowMember['permanent_address'];
                                  $permanent_state = $rowMember['permanent_state'];
                                  $permanent_pincode = $rowMember['permanent_pincode'];
                                  
                                  if ($permanent_address==''||$permanent_state==''||$permanent_pincode=='')
                                  {
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="nullAddress" style="text-align:
                                        center;padding-bottom: 10px;">
                                        <p>Oops!! Permanent address details are not yet updated.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                  }
                                  else {
                                  ?>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $rowMember['permanent_address'] ?>,<br><?php echo $rowMember['permanent_state'] ?>,<?php echo $rowMember['permanent_pincode'] ?></li>
                                  </ul>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="profileHeadComp">
                                  <h4>
                                  <div class="row">
                                    <div class="col-lg-9"><i class="fa fa-user-plus"></i>&nbsp &nbsp Family Details</div>
                                    <div class="col-lg-2">
                                      
                                    </div>
                                    <div class="col-lg-1">
                                      <div class="dropDownIcon">
                                        <i class="fa fa-sort-desc" data-toggle="collapse"
                                        data-target="#FamilyDetails"></i>
                                      </div>
                                    </div>
                                  </div>
                                  </h4>
                                </div>
                                <div id="FamilyDetails" class="collapse">
                                  <?php
                                  $father_name = $rowMember['father_name'];
                                  $father_dob = $rowMember['father_dob'];
                                  $fatherNationality = $rowMember['fatherNationality'];
                                  
                                  if ($father_name==''||$bank_name==''||$fatherNationality=='')
                                  {
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="nullAddress" style="text-align:
                                        center;padding-bottom: 10px;">
                                        <p>Oops!! Family details are not yet updated.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                  }
                                  else {
                                  ?>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Father's Name : </b><?php echo $rowMember['father_name'] ?></li>
                                    <li class="list-group-item"><b>Father's Date of birth : </b><?php echo $rowMember['father_dob'] ?></li>
                                    <li class="list-group-item"><b>Nationality : </b><?php echo $rowMember['fatherNationality'] ?></li>
                                  </ul>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                }
                else{
                ?>
                
                <?php
                echo "<h1 style='color:red;text-align:center;font-size:1em; font-family: Asap;'>Sorry...No Record Found!!</h1>";?>
                <?php
                }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>