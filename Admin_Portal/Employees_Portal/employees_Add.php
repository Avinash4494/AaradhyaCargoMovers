<?php
include('employee_Process.php')
?>
<!DOCTYPE html>
<html>
  <title>Member Portal - Add Member</title>
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
              <div class="empty-left-comTop"></div>
<?php include_once 'employee_left_pannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employees_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Add Employees</span></h5>
              </div>
              
              <div id="print_setion">
                <h4>Add Employees</h4>
                <!-- Your Code Here -->
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="employee_Process.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="employees_id" name="employees_id" hidden="">
                    <input type="date" id="updatedDate" name="updatedDate"  hidden="">
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">First Name<span>*</span></label>
                          <input type="text" id="firstName" name="firstName" class="form-control" placeholder="FirstName" value="Avinash" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Last Name<span>*</span></label>
                          <input type="text" id="lastName" name="lastName" class="form-control" placeholder="lastName" value="Singh" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Email<span>*</span></label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="avinash@gmail.com" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Mobile Number<span>*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control" placeholder="Mobile Number" value="9696858574">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Gender<span>*</span></label><br>
                          <input type="radio" id="gender_male" name="gender"  value="Male"> <label for="">&nbsp Male</label>
                          &nbsp &nbsp
                          <input type="radio" id="gender_female" name="gender"  value="Female" > <label for="">&nbsp Female</label>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Martial Status<span>*</span></label><br>
                          <input type="radio" id="married" name="martialStatus"  value="Married"> <label for="">&nbsp Married</label> &nbsp &nbsp
                          <input type="radio" id="unmarried" name="martialStatus"  value="Unmarried"> <label for="">&nbsp Unmarried</label>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Department<span>*</span></label>
                          <select name="department" id="department" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Maintainance">Maintainance</option>
                            <option value="Communication">Communication</option>
                            <option value="Security">Security</option>
                            <option value="Technical Staff">Technical Staff</option>
                            <option value="Supervisor">Supervisor</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Shift Timing<span>*</span></label>
                          <select name="shiftTiming" id="shiftTiming" class="form-control">
                            <option value="null">Select Any</option>
                            <option value="5:00-9:00 AM">5:00-9:00 AM</option>
                            <option value="4:00-9:00 PM">4:00-9:00 PM</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Medical History<span>*</span></label>
                          <input type="text" id="medicalHistory" name="medicalHistory" class="form-control" placeholder="Medical History" value="medicalHistory">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Date of Birth<span>*</span></label>
                          <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Age</label>
                          <input type="text" id="" name="age" class="form-control" placeholder="Age" value="25">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Alternate Number (Optional)</label>
                          <input type="text" id="alternate_phone" name="alternate_phone" class="form-control" placeholder="Alternate Number" value="9699857485">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Highest Qualification<span>*</span></label>
                          <select name="highestQual" id="highestQual" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="High School">High School</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Post Graduate">Post Graduate</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Degree<span>*</span></label>
                          <select name="degree" id="degree" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="High School">B.A.</option>
                            <option value="Intermediate">M.A.</option>
                            <option value="Graduate">Polytechnic</option>
                            <option value="Post Graduate">B.Tech</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">College/University<span>*</span></label>
                          <input type="text" id="remarks" name="colUniversity" class="form-control" placeholder="Remarks" value="LIVE ATTENDACE NOTIFICATIONS">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Date of Completition<span>*</span></label>
                          <input type="date" id="passingDate" name="passingDate" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Aadhar Card No.<span>*</span></label>
                          <input type="text" id="aadharNo" name="aadharNo" class="form-control" placeholder="Aadhar Card Number" value="9685 7478 5874 6958">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">PAN Number</label>
                          <input type="text" id="panNumber" name="panNumber" class="form-control" placeholder="Remarks" value="LIVE ATTENDACE NOTIFICATIONS">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Joining Date<span>*</span></label>
                          <input type="date" id="joiningDate" name="joiningDate" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Remarks</label>
                          <input type="text" id="remarks" name="remarks" class="form-control" placeholder="Remarks" value="LIVE ATTENDACE NOTIFICATIONS">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Address<span>*</span></label>
                          <input type="text" id="present_address" name="present_address" class="form-control" placeholder="Your Address Here" value="Kashipur New Colony, Near Kadam Chauraha,Ballia">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">State<span>*</span></label>
                          <select name="state" id="state" class="form-control">
                            <option>Select Any</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhatisgarh">Chhatisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telagana">Telagana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttranchal">Uttranchal</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Pincode<span>*</span></label>
                          <input type="text" id="present_pincode" name="present_pincode" class="form-control" placeholder="Pincode" value="277001">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="updateProfilePic">
                          <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"></div>
                      <div class="col-lg-3">
                        <button type="reset" class="actionButton">Cancel</button>
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" name="Submit" class="actionButton">Submit</button>
                      </div>
                      
                    </div>
                  </form>
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