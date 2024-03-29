<?php
require_once('db.php');
$upload_dir = 'uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from employee_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftPannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> Employee Profile </span> </h5>
              </div>
              
              <div class="bodyComponent" style="margin-top: -5px;">
                <div class="profileDataComp">
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
                          <h5><?php echo $rowMember['Fullname'] ?></h5>
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
                              <a href="addProfile.php"><i class="fa fa-pencil"></i></a>
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
                            <div class="col-lg-9"> <i class="fa fa-graduation-cap"></i>&nbsp &nbspEducation Details</div>
                            <div class="col-lg-2">
                              <a href="update_col.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
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
                                    <li class="list-group-item"><b>Employee ID Name : </b> <?php echo $row['employees_id'] ?></li>
                                    <li class="list-group-item"><b>Name :</b> <?php echo $row['Fullname'] ?></li>
                                    <li class="list-group-item"><b>Designation :</b> <?php echo $row['offc_desig'] ?></li>
                                    <li class="list-group-item"><b>Email Id :</b> <?php echo $row['Email'] ?></li>
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
                                    <li class="list-group-item"><b>Floor :</b> <?php echo $row['offc_floor'] ?></li>
                                    <li class="list-group-item"><b>Wing :</b> <?php echo $row['offc_wing'] ?></li>
                                    <li class="list-group-item"><b>Cubicle Number :</b> <?php echo $row['offc_cubicle'] ?></li>
                                    <li class="list-group-item"><b>Tower Number :</b> <?php echo $row['offc_tower'] ?></li>
                                    <li class="list-group-item"><b>Location :</b> <?php echo $row['offc_location'] ?></li>
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
                              <a href="update_work.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
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
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-desktop"></i>&nbsp &nbsp Asset Details</div>
                            <div class="col-lg-2">
                              
                            </div>
                            <div class="col-lg-1">
                              <div class="dropDownIcon">
                                <i class="fa fa-sort-desc" data-toggle="collapse"
                                data-target="#assetDetails"></i>
                              </div>
                            </div>
                          </div>
                          </h4>
                        </div>
                        <div id="assetDetails" class="collapse in active">
                          <?php
                          $query = "SELECT * FROM raise_asset WHERE employees_id='$employees_id'";
                          $rs_result = mysqli_query ($connect, $query);
                          if(mysqli_num_rows($rs_result)){
                          while ($row = mysqli_fetch_array($rs_result)) {
                          error_reporting(0);
                          $asset_name = $row['asset_name'];
                          $asset_no = $row['asset_no'];
                          $asset_provider = $row['asset_provider'];
                          $asset_serial = $row['asset_serial'];
                          $asset_status = $row['asset_status'];
                          $asset_location = $row['asset_location'];
                          if ($asset_name==''||$asset_no==''||$asset_provider==''||$asset_serial==''||$asset_status==''||$asset_location=='')
                          {
                          ?>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="nullAddress" style="text-align:
                                center;padding-bottom: 10px;">
                                <p>Oops!! Asset details are not yet updated.</p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          else {
                          ?>
                          <div class="row">
                            <div class="col-lg-4">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Asset Name :</b> <?php echo $row['asset_name'] ?></li>
                                <li class="list-group-item"><b>Asset Number :</b> <?php echo $row['asset_no'] ?></li>
                              </ul>
                            </div>
                            <div class="col-lg-4">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Asset Serial Number :</b> <?php echo $row['asset_serial'] ?></li>
                                <li class="list-group-item"><b>Asset Status :</b> <?php echo $row['asset_status'] ?></li>
                              </ul>
                            </div>
                            <div class="col-lg-4">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Asset Location : </b> <?php echo $row['asset_location']?></li>
                                <li class="list-group-item"><b>Asset Provider :</b> <?php echo $row['asset_provider']  ?></li>
                              </ul>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Host Name : </b><?php echo $row['asset_hostName'] ?></li>
                                <li class="list-group-item"><b>Allocation Date : </b><?php echo $row['asset_alloc_date'] ?></li>
                                
                                <li class="list-group-item"><b>Raised For: </b><?php echo $row['prim_owner'] ?></li>
                                
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Asset Description : </b><?php echo $row['asset_desc'] ?></li>
                                <li class="list-group-item"><b>End of Eligibility Date : </b><?php echo $row['asset_end_date'] ?></li>
                                <li class="list-group-item"><b>Asset Type : </b><?php echo $row['asset_type'] ?></li>
                                
                              </ul>
                            </div>
                          </div>
                          <?php
                          } }}
                          ?>
                        </div>
                        <div class="profileHeadComp">
                          <h4>
                          <div class="row">
                            <div class="col-lg-9"><i class="fa fa-inr"></i>&nbsp &nbsp Bank Details</div>
                            <div class="col-lg-2">
                              <a href="update_bank.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
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
                                  <a href="update_address.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
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
                                    <div class="col-lg-9"> <i class="fa fa-user-plus"></i>&nbsp &nbsp Family Details</div>
                                    <div class="col-lg-2">
                                      <a href="update_family.php?id=<?php echo $rowMember['id'] ?>"><i class="fa fa-pencil"></i></a>
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