<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from employee_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
}
}
?>
<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from raise_foodclaim where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_foodclaim where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="claims_index.php"; }, 1000);
</script>';
}
}
}
?>
<?php
require_once('../db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>myRequest</title>
  <head>
  </head>
  <body  onload="numberWithCommas(),showtime();">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftClaims.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">My Claims</span></h5>
              </div>
              <div class="bodyComponentReq">
                <div class="row">
                  <div class="col-lg-9">
                    <div class="tab-content">
                      <div id="claimStatus" class="tab-pane fade in active" style="margin-top: -55px;">
                        <?php
                        $per_page_record = 2;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM raise_convclaim  WHERE employees_id='$employees_id'";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowClaim = mysqli_fetch_array($rs_result)) {
                        ?>
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="requestStat" >
                               
                              <div class="well" >
                                <div class="row">
                                  <div class="col-lg-1">
                                    <div class="iconCal">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <?php
                                    $convTime = $rowClaim["raised_on"];
                                    $convTime1 = strtotime($convTime);
                                    $convTime2 = strtotime(date('Y-m-d'));
                                    $convSecs = $convTime2 - $convTime1;// == <seconds between the two times>
                                    $convDays = $convSecs / 86400;
                                    $convFin = round($convDays,0);
                                    ?>
                                    <?php
                                    $deskstatus = $rowClaim['req_status'];
                                    $active= "Active";
                                    $pending  = "Pending";
                                    $approved="Approved";
                                    $Rejected = "Rejected";
                                    if ($deskstatus==$active) {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Conveyance Claim  request is active since <?php echo $convFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $pending)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Conveyance Claim  request is pending since <?php echo $convFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $approved)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Conveyance Claim  request is approved.</h5>
                                    <?php
                                    }
                                    else if($deskstatus==$Rejected)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Conveyance Claim  request is rejected.</h5>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <p>Claim No. - <?php echo $rowClaim['claim_id'] ?></p>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                        <p>Raised On. - <?php echo $rowClaim['raised_on'] ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2">
                                    <div class="actionButtonClaim"><h4><?php echo $rowClaim['req_status'] ?></h4></div>
                                  </div>
                                  <div class="col-lg-1">
                                    <div class="iconDel">
                                      <a href="view_convclaims.php?id=<?php echo $rowClaim['id'] ?>">
                                        <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                            
                          </div>
                        </div>
                        <br>
                        <?php
                        }
                        }
                        ?>
                        <?php
                        $per_page_record = 2;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM raise_foodclaim  WHERE employees_id='$employees_id'";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowFoodClaim = mysqli_fetch_array($rs_result)) {
                        ?>
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="requestStat">
                              
                              <div class="well">
                                <div class="row">
                                  <div class="col-lg-1">
                                    <div class="iconCal">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <?php
                                    $foodTime = $rowFoodClaim["raised_on"];
                                    $foodTime1 = strtotime($foodTime);
                                    $foodTime2 = strtotime(date('Y-m-d'));
                                    $foodSecs = $foodTime2 - $foodTime1;// == <seconds between the two times>
                                    $foodDays = $foodSecs / 86400;
                                    $foodFin = round($foodDays,0);
                                    ?>
                                    <?php
                                    $deskstatus = $rowFoodClaim['req_status'];
                                    $active= "Active";
                                    $pending  = "Pending";
                                    $approved="Approved";
                                    $Rejected = "Rejected";
                                    if ($deskstatus==$active) {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Food Claim  request is active since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $pending)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Food Claim  request is pending since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $approved)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Food Claim  request is approved.</h5>
                                    <?php
                                    }
                                    else if($deskstatus==$Rejected)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Food Claim  request is rejected.</h5>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <p>Claim No. - <?php echo $rowFoodClaim['claim_id'] ?></p>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                        <p>Raised On. - <?php echo $rowFoodClaim['raised_on'] ?></p>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="col-lg-2">
                                    <div class="actionButtonClaim"><h4><?php echo $rowFoodClaim['req_status'] ?></h4></div>
                                  </div>
                                  <div class="col-lg-1">
                                    <div class="iconDel">
                                      <a href="view_foodclaims.php?id=<?php echo $rowFoodClaim['id'] ?>">
                                        <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                      </a>
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
                        ?>
                        <br>
                        <?php
                        $per_page_record = 2;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM raise_misceclaim  WHERE employees_id='$employees_id'";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMisceClaim = mysqli_fetch_array($rs_result)) {
                        ?>
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="requestStat">
                              
                              <div class="well">
                                <div class="row">
                                  <div class="col-lg-1">
                                    <div class="iconCal">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <?php
                                    $miscTime = $rowMisceClaim["raised_on"];
                                    $miscTime1 = strtotime($miscTime);
                                    $miscTime2 = strtotime(date('Y-m-d'));
                                    $miscSecs = $miscTime2 - $miscTime1;// == <seconds between the two times>
                                    $miscDays = $miscSecs / 86400;
                                    $miscFin = round($miscDays,0);
                                    ?>
                                    <?php
                                    $deskstatus = $rowMisceClaim['req_status'];
                                    $active= "Active";
                                    $pending  = "Pending";
                                    $approved="Approved";
                                    $Rejected = "Rejected";
                                    if ($deskstatus==$active) {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Miscellaneous Claim  request is active since <?php echo $miscFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $pending)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Miscellaneous Claim  request is pending since <?php echo $miscFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $approved)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Miscellaneous Claim  request is approved.</h5>
                                    <?php
                                    }
                                    else if($deskstatus==$Rejected)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Miscellaneous Claim  request is rejected.</h5>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <p>Claim No. - <?php echo $rowMisceClaim['claim_id'] ?></p>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                        <p>Raised On. - <?php echo $rowMisceClaim['raised_on'] ?></p>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="col-lg-2">
                                    <div class="actionButtonClaim"><h4><?php echo $rowMisceClaim['req_status'] ?></h4></div>
                                  </div>
                                  <div class="col-lg-1">
                                    <div class="iconDel">
                                      <a href="view_misceClaims.php?id=<?php echo $rowMisceClaim['id'] ?>">
                                        <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                      </a>
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
                        ?>
                        <br>
                        <?php
                        $per_page_record = 2;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM raise_mediclaim  WHERE employees_id='$employees_id'";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMediClaim = mysqli_fetch_array($rs_result)) {
                        ?>
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="requestStat">
                              
                              <div class="well">
                                <div class="row">
                                  <div class="col-lg-1">
                                    <div class="iconCal">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <?php
                                    $mediTime = $rowMediClaim["raised_on"];
                                    $mediTime1 = strtotime($mediTime);
                                    $mediTime2 = strtotime(date('Y-m-d'));
                                    $mediSecs = $mediTime2 - $mediTime1;// == <seconds between the two times>
                                    $mediDays = $mediSecs / 86400;
                                    $mediFin = round($mediDays,0);
                                    ?>
                                    <?php
                                    $deskstatus = $rowMediClaim['req_status'];
                                    $active= "Active";
                                    $pending  = "Pending";
                                    $approved="Approved";
                                    $Rejected = "Rejected";
                                    if ($deskstatus==$active) {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Medi Claim  request is active since <?php echo $mediFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $pending)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Medi Claim  request is pending since <?php echo $mediFin; ?> days and waiting for approval.</h5>
                                    <?php
                                    }
                                    else if($deskstatus == $approved)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Medi Claim  request is approved.</h5>
                                    <?php
                                    }
                                    else if($deskstatus==$Rejected)
                                    {
                                    ?>
                                    <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Medi Claim  request is rejected.</h5>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <p>Claim No. - <?php echo $rowMediClaim['claim_id'] ?></p>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                        <p>Raised On. - <?php echo $rowMediClaim['raised_on'] ?></p>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="col-lg-2">
                                    <div class="actionButtonClaim"><h4><?php echo $rowMediClaim['req_status'] ?></h4></div>
                                  </div>
                                  <div class="col-lg-1">
                                    <div class="iconDel">
                                      <a href="view_mediClaim.php?id=<?php echo $rowMediClaim['id'] ?>">
                                        <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                      </a>
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
                        ?>
                      </div>
                      <div id="travel" class="tab-pane fade ">
                        <h4>Conveyance Claim</h4>
                        <div class="profileDisplayComponent">
                          <div class="well">
                            <div class="formSection">
                              <form class="" name ="register" onsubmit="return convValidate();" action="process_convClaims.php" method="post" enctype="multipart/form-data">
                                <input type="text" id="claim_id" name="claim_id" hidden="" >
                                <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                                <input type="text" id="raised_on" name="raised_on" hidden="" >
                                <input type="text" id="updated_on" name="updated_on" hidden="" >
                                <input type="text" id="remarks" name="remarks" hidden="" >
                                <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                                <input type="text" id="declare" name="declareTerms" hidden="" value="I agree and understand that violations of the above could lead to disciplinary action against me, up to and including termination.">
                                <!-- You don't need to submit hard copy of your supportings anymore! Just upload the soft copy bills. -->
                                <div class="row">
                                  <div class="col-lg-3">
                                    <div class="uploadReceipt">
                                      <p>Upload supporting document/receipt</p>
                                      <div class="form-group">
                                        <input type="file" class="form-control" name="travel_image" id="travel_image">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-9">
                                    
                                    <div class="row">
                                      <div class="col-lg-8">
                                        <h5>Conveyance Claim</h5>
                                      </div>
                                      <div class="col-lg-4">
                                        
                                        
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Amount to be claimed</label>
                                          <input type="text" id="total_claimed" name="total_claimed" class="form-control" placeholder="Amount to be claimed">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Currency</label>
                                          <input type="text" id="currency" name="currency" class="form-control" placeholder="INR">
                                        </div>
                                      </div>
                                    </div>
                                    <h5>Expence Details</h5>
                                    <div class="row">
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Riased By</label>
                                          <input type="text" id="username" name="raised_by" class="form-control" placeholder="Raised By">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Category</label>
                                          <select name="travelCategory" id="travelCategory" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option value="Official Conveyance">Official Conveyance</option>
                                            <option value="Local Conveyance">Local Conveyance</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Bill date</label>
                                          <input type="date" id="bill_date" name="bill_date" class="form-control" placeholder="Location">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Expence</label>
                                          <select name="expenceType" id="MySelectOption" onfocusout="getOptionFixed()" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option id="auto" value="Auto">Auto</option>
                                            <option id="car" value="Car">Car</option>
                                            <option id="motorCycle" value="Motor Cycle">Motor Cycle</option>
                                            <option id="publicTrans" value="Public Transport">Public Transport</option>
                                            <option id="taxi" value="Taxi">Taxi</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Distance</label>
                                          <input type="text" onfocusout="getOptionVarible()" id="distance" name="distance" class="form-control" placeholder="Distance">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Permissible Limit</label>
                                          <input type="text" id="pemisible" name="perm_limit" class="form-control" placeholder="Permissible limit">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Total Amount</label>
                                          <input type="text" id="amount" name="claim_amount" class="form-control" placeholder="Claim Amount">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">From Location</label>
                                          <input type="text" id="from_location" name="from_location" class="form-control" placeholder="From Location">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">To Location</label>
                                          <input type="text" id="to_location" name="to_location" class="form-control" placeholder="To Location">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Remarks/Reason</label>
                                          <input type="text" id="location" name="reason" class="form-control" placeholder="Remarks/Reason in not more than 150 words.">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"></div>
                                      <div class="col-lg-4 col-xs-12">
                                        <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>
                                  </div>
                                </div>
                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript">
                      function convValidate()
                      {
                      var total_claimed=document.getElementById("total_claimed").value;
                      var currency=document.getElementById("currency").value;
                      var username=document.getElementById("username").value;
                      var travelCategory=document.getElementById("travelCategory").value;
                      var bill_date=document.getElementById("bill_date").value;
                      var bill_no=document.getElementById("bill_no").value;
                      var optionSelect=document.getElementById("MySelectOption").value;
                      var distance=document.getElementById("distance").value;
                      var pemisible=document.getElementById("pemisible").value;
                      var amount=document.getElementById("amount").value;
                      var from_location=document.getElementById("from_location").value;
                      var to_location=document.getElementById("to_location").value;
                      var reason=document.getElementById("reason").value;
                      var travel_image=document.getElementById("travel_image").value;
                      
                      if(total_claimed.length==0||currency.length==0||username.length==0||travelCategory.length==0||bill_date.length==0||bill_no.length==0||optionSelect.length==0||distance.length==0||pemisible.length==0||amount.length==0||from_location.length==0||to_location.length==0||reason.length==0||travel_image.length==0)
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
                      function getOptionFixed() {
                      var valueFixed = document.getElementById("MySelectOption");
                      var strUser = valueFixed.options[valueFixed.selectedIndex].value;
                      var auto = 'Auto';
                      var publicTrans = 'Public Transport';
                      var taxi = 'Taxi';
                      if (strUser==auto)
                      {
                      document.getElementById("distance").disabled = true;
                      document.getElementById('pemisible').value = 'Rs 350.00';
                      document.getElementById('amount').value = 'Rs 350.00';
                      }
                      else if (strUser==publicTrans)
                      {
                      document.getElementById("distance").disabled = true;
                      document.getElementById('pemisible').value = 'Rs 200.00';
                      document.getElementById('amount').value = 'Rs 200.00';
                      }
                      else if (strUser==taxi)
                      {
                      document.getElementById("distance").disabled = true;
                      document.getElementById('pemisible').value = 'Rs 450.00';
                      document.getElementById('amount').value = 'Rs 450.00';
                      }
                      }
                      function getOptionVarible() {
                      var valueVari = document.getElementById("MySelectOption");
                      var distanceVari = document.getElementById("distance").value;
                      var strUser = valueVari.options[valueVari.selectedIndex].value;
                      var car = 'Car';
                      var motorCycle = 'Motor Cycle';
                      if (strUser==car)
                      {
                      var carAmount = 8.5*distanceVari;
                      document.getElementById('amount').value = 'Rs'+ ' ' + carAmount + '.00';
                      document.getElementById('pemisible').value = 'Rs 350.00';
                      }
                      else if (strUser==motorCycle)
                      {
                      var motorAmount = 3.5*distanceVari;
                      document.getElementById('amount').value = 'Rs'+ ' ' + motorAmount + '.00';
                      document.getElementById('pemisible').value = 'Rs 350.00';
                      }
                      }
                      </script>
                      <div id="food" class="tab-pane fade">
                        <h4>Food Claim</h4>
                        <p id="AllFields" ></p>
                        <div class="profileDisplayComponent">
                          <div class="well">
                            <div class="formSection">
                              <form class="" name ="register" onsubmit="return foodValidate();" action="process_foodClaims.php" method="post" enctype="multipart/form-data">
                                <input type="text" id="claim_id" name="claim_id" hidden="" >
                                <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                                <input type="text" id="raised_on" name="raised_on" hidden="" >
                                <input type="text" id="updated_on" name="updated_on" hidden="" >
                                <input type="text" id="remarks" name="remarks" hidden="" >
                                <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                                <input type="text" id="declare" name="declareTerms" hidden="" value="I agree and understand that violations of the above could lead to disciplinary action against me, up to and including termination.">
                                <!-- You don't need to submit hard copy of your supportings anymore! Just upload the soft copy bills. -->
                                <div class="row">
                                  <div class="col-lg-3">
                                    <div class="uploadReceipt">
                                      <p>Upload supporting document/receipt</p>
                                      <div class="form-group">
                                        <input type="file" class="form-control" name="food_image" id="food_image">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-9">
                                    <h5>Food Claim</h5>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Amount to be claimed</label>
                                          <input type="text" id="total_claimed" name="total_claimed" class="form-control" placeholder="Amount to be claimed">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Currency</label>
                                          <input type="text" id="currency" name="currency" class="form-control" placeholder="INR">
                                        </div>
                                      </div>
                                    </div>
                                    <h5>Expence Details</h5>
                                    <div class="row">
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Riased By</label>
                                          <input type="text" id="username" name="raised_by" class="form-control" placeholder="Raised By">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Category</label>
                                          <select name="foodCategory" id="foodCategory" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option value="Official Conveyance">Official Conveyance</option>
                                            <option value="Local Conveyance">Local Conveyance</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Bill date</label>
                                          <input type="date" id="bill_date" name="bill_date" class="form-control" placeholder="Bill Date">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Bill No.</label>
                                          <input type="text" id="bill_no" name="bill_no" class="form-control" placeholder="Bill Number">
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Expence Type</label>
                                          <select name="expenceType" id="MyFoodOption"  class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option id="Breakfast" value="Breakfast">Breakfast</option>
                                            <option id="Lunch" value="Lunch">Lunch</option>
                                            <option id="Dinner" value="Dinner">Dinner</option>
                                            
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                          <label for="">No. Of People</label>
                                          <input type="text" id="noOfPeople" onfocusout="getFoodFixed(),notZero()" name="noOfPeople" class="form-control" placeholder="Number of People">
                                          <p id="peopleError" style="font-size: 0.9em;color:red;padding-top: 5px;margin-bottom: -20px;"></p>
                                        </div>
                                      </div>
                                      
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Permissible Limit</label>
                                          <input type="text" id="foodPermisible" name="perm_limit" class="form-control" placeholder="Permissible Limit">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Total Amount</label>
                                          <input type="text" id="foodAmount" name="claim_amount" class="form-control" placeholder="Claim Amount">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Remarks/Reason</label>
                                          <input type="text" id="reason" name="reason" class="form-control" placeholder="Remarks/Reason in not more than 150 words.">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"></div>
                                      <div class="col-lg-4 col-xs-12">
                                        <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>
                                  </div>
                                </div>
                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript">
                      function foodValidate()
                      {
                      var total_claimed=document.getElementById("total_claimed").value;
                      var currency=document.getElementById("currency").value;
                      var username=document.getElementById("username").value;
                      var foodCategory=document.getElementById("foodCategory").value;
                      var bill_date=document.getElementById("bill_date").value;
                      var bill_no=document.getElementById("bill_no").value;
                      var foodOptions=document.getElementById("MyFoodOption").value;
                      var noOfPeoples=document.getElementById("noOfPeople").value;
                      var foodPermisible=document.getElementById("foodPermisible").value;
                      var foodAmount=document.getElementById("foodAmount").value;
                      var reason=document.getElementById("reason").value;
                      
                      if(total_claimed.length==0||currency.length==0||username.length==0||foodCategory.length==0||bill_date.length==0||bill_no.length==0||foodOptions.length==0||noOfPeoples.length==0||foodPermisible.length==0||foodAmount.length==0||reason.length==0)
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
                      function getFoodFixed() {
                      var valueFood = document.getElementById("MyFoodOption");
                      var strFood = valueFood.options[valueFood.selectedIndex].value;
                      var noOfPeople = document.getElementById("noOfPeople").value;
                      var breakfast = 'Breakfast';
                      var lunch = 'Lunch';
                      var dinner = 'Dinner';
                      
                      if (strFood==breakfast)
                      {
                      var foodOut = 75*noOfPeople;
                      document.getElementById('foodPermisible').value = 'Rs 75.00';
                      document.getElementById('foodAmount').value = 'Rs'+' '+foodOut+'.00';
                      }
                      else if (strFood==lunch)
                      {
                      var foodOut = 150*noOfPeople;
                      document.getElementById('foodPermisible').value = 'Rs 150.00';
                      document.getElementById('foodAmount').value = 'Rs'+' '+foodOut+'.00';
                      }
                      else if (strFood==dinner)
                      {
                      var foodOut = 175*noOfPeople;
                      document.getElementById('foodPermisible').value = 'Rs 175.00';
                      document.getElementById('foodAmount').value = 'Rs'+' '+foodOut+'.00';
                      }
                      
                      }
                      function notZero()
                      {
                      var noOfPeoples = document.getElementById("noOfPeople").value;
                      if (noOfPeoples==''||noOfPeoples=='0'||Number(noOfPeoples)<0)
                      {
                      document.getElementById("peopleError").innerHTML="Can't be empty, negative or 0";
                      return false;
                      }
                      else
                      {
                      document.getElementById("peopleError").innerHTML="";
                      return true;
                      }
                      }
                      </script>
                      <div id="Miscellaneous" class="tab-pane fade">
                        <h4>Miscellaneous Claim</h4>
                        <div class="profileDisplayComponent">
                          <div class="well">
                            <div class="formSection">
                              <form class="" name ="register" onsubmit="return myvalidate();" action="process_miscClaims.php" method="post" enctype="multipart/form-data">
                                <input type="text" id="claim_id" name="claim_id" hidden="" >
                                <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                                <input type="text" id="raised_on" name="raised_on" hidden="" >
                                <input type="text" id="updated_on" name="updated_on" hidden="" >
                                <input type="text" id="remarks" name="remarks" hidden="" >
                                <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                                <input type="text" id="declare" name="declareTerms" hidden="" value="I agree and understand that violations of the above could lead to disciplinary action against me, up to and including termination.">
                                <!-- You don't need to submit hard copy of your supportings anymore! Just upload the soft copy bills. -->
                                <div class="row">
                                  <div class="col-lg-3">
                                    <div class="uploadReceipt">
                                      <p>Upload supporting document/receipt</p>
                                      <div class="form-group">
                                        <input type="file" class="form-control" name="misce_image" id="misce_image">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-9">
                                    <h5>Miscellaneous Claim</h5>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Total Claimed</label>
                                          <input type="text" id="total_claimed" name="total_claimed" class="form-control" placeholder="Total Claimed">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Currency</label>
                                          <input type="text" id="currency" name="currency" class="form-control" placeholder="INR">
                                        </div>
                                      </div>
                                    </div>
                                    <h5>Expence Details</h5>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Riased By</label>
                                          <input type="text" id="username" name="raised_by" class="form-control" placeholder="Raised By">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Bill date</label>
                                          <input type="date" id="location" name="bill_date" class="form-control" placeholder="Bill Date">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Claim Amount</label>
                                          <input type="text" id="claim_amount" name="claim_amount" class="form-control" placeholder="Claim Amount">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Category</label>
                                          <select name="misceCategory" id="" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option value="Official Maintenance">Official Maintenance</option>
                                            <option value="Business Meetings">Business Meetings</option>
                                            <option value="Printing & Stationery">Printing & Stationery</option>
                                            <option value="Books & Periodicals">Books & Periodicals</option>
                                            <option value="Boradband/Data/Dongle">Boradband/Data/Dongle</option>
                                          </select>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Remarks/Reason</label>
                                          <input type="text" id="location" name="reason" class="form-control" placeholder="Remarks/Reason in not more than 150 words.">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"></div>
                                      <div class="col-lg-4 col-xs-12">
                                        <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>
                                  </div>
                                </div>
                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="MediClaim" class="tab-pane fade">
                        
                        <div class="expenceTab" style="margin-top: -10px;">

                          <div class="row">
                            <div class="col-lg-4 col-xs-6">
                              <a data-toggle="tab" href="#ConveyanceClaims">
                                <div class="widgetsClaim">
                                  <div class="well">
                                    <div class="rectClaim">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <h5>Total Limit</h5>
                                          <h2 style="font-size: 1.5em;margin: 6px;color: green;"><i class="fa fa-inr"></i>  25,000.00</h2>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <?php
                            $query_run = mysqli_query($connect,"SELECT * FROM raise_mediclaim");
                            $total_blance_claimed=0;
                            while ($rowUser = mysqli_fetch_array($query_run)) {
                            $eligibleAmount = 25000;
                            
                            $total_blance_claimed =(int)$total_blance_claimed +(int) $rowUser['total_claimed'];
                            $getAmount = $eligibleAmount-$total_blance_claimed;
                            }
                            ?>
                            <div class="col-lg-4 col-xs-6">
                              <a data-toggle="tab" href="#ConveyanceClaims">
                                <div class="widgetsClaim">
                                  <div class="well">
                                    <div class="rectClaim">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <h5>Balanced Amount</h5>
                                          <h2 style="font-size: 1.5em;margin: 6px;color:red"><i class="fa fa-inr"></i><span id="remClaimed"></span>.00</h2>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                            
                            <?php
                            $query_run = mysqli_query($connect,"SELECT * FROM raise_mediclaim");
                            $total_claimed = 0;
                            while ($rowUser = mysqli_fetch_array($query_run)) {
                            $eligibleAmount = 25000;
                            $total_claimed +=(int)$rowUser['total_claimed'];
                            $getAmount = $eligibleAmount-$total_claimed;
                            $getResult = $eligibleAmount-$getAmount;
                            }
                            ?>
                            <div class="col-lg-4 col-xs-6">
                              <a data-toggle="tab" href="#ConveyanceClaims">
                                <div class="widgetsClaim">
                                  <div class="well">
                                    <div class="rectClaim">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <h5>Cleared Amount</h5>
                                          <h2 style="font-size: 1.5em;margin: 6px;color:orange"><i class="fa fa-inr"></i><span id="totalClaimed"></span>.00</h2>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <script>
                            function numberWithCommas(){
                            var remAmount ='<?php echo $getAmount; ?>';
                            var remMatches = remAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            document.getElementById("remClaimed").innerHTML=remMatches;
                            var strAmount ='<?php echo $getResult; ?>';
                            var amountMatches = strAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            document.getElementById("totalClaimed").innerHTML=amountMatches;

                             var clearedAmt ='<?php echo $getResult; ?>';
                             var eligibleAmt ='<?php echo $eligibleAmount; ?>';
                        
                             if ( eligibleAmt == clearedAmt) {
                              document.getElementById("claimExceed").style.display = "none";
                              var notEligible = "You have exceed your Medi claim amout.";
                              document.getElementById("notEligible").innerHTML = notEligible;
                             }
                             else{
                              document.getElementById("claimExceed").style.display = "block";
                             
                             }
                            }
                            </script>
                          </div>
                        </div>
                        <div class="profileDisplayComponent" >
                           <p id="notEligible" style="text-align: center;color: red;"></p>
                          <div class="well" id="claimExceed">
                            <div class="formSection" >
                              <form class="" name ="register" onsubmit="return myvalidate();" action="process_mediClaim.php" method="post" enctype="multipart/form-data">
                                <input type="text" id="claim_id" name="claim_id" hidden="" >
                                <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                                <input type="text" id="raised_on" name="raised_on" hidden="" >
                                <input type="text" id="updated_on" name="updated_on" hidden="" >
                                <input type="text" id="remarks" name="remarks" hidden="" >
                                <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                                <input type="text" id="declare" name="declareTerms" hidden="" value="I agree and understand that violations of the above could lead to disciplinary action against me, up to and including termination.">
                                <div class="row">
                                  <div class="col-lg-3">
                                    <div class="uploadReceipt">
                                      <p>Upload supporting document/receipt</p>
                                      <div class="form-group">
                                        <input type="file" class="form-control" name="medi_image" id="medi_image">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-9">
                                    <h5>Medi Claim</h5>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Amount to be Claimed</label>
                                          <input type="text" id="total_claimed" name="total_claimed" class="form-control" placeholder="Amount to be Claimed">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Currency</label>
                                          <input type="text" id="currency" name="currency" class="form-control" placeholder="INR">
                                        </div>
                                      </div>
                                    </div>
                                    <h5>Expense Details</h5>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Riased By</label>
                                          <input type="text" id="username" name="raised_by" class="form-control" placeholder="Raised By">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Bill date</label>
                                          <input type="date" id="location" name="bill_date" class="form-control" placeholder="Bill Date">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Claim Amount</label>
                                          <input type="text" id="claim_amount" name="claim_amount" class="form-control" placeholder="Claim Amount">
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Expense Month</label>
                                          <input type="text" id="claim_amount" name="exp_month" class="form-control" placeholder="Expense Month">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Claim Type</label>
                                          <select name="claimCategory" id="" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option value="Domicilliary">Domicilliary</option>
                                            <option value="Medicine Chest">Medicine Chest</option>
                                            <option value="Spectacles">Spectacles</option>
                                            <option value="Bifocals">Bifocals</option>
                                            <option value="Specified Illness">Specified Illness</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Illness Type</label>
                                          <select name="illnessCategory" id="" class="form-control">
                                            <option value="Select Any">Select Any</option>
                                            <option value="Dental">Dental</option>
                                            <option value="Digestive">Digestive</option>
                                            <option value="ENT">ENT</option>
                                            <option value="Eye">Eye</option>
                                            <option value="Feve/Cough/Cold">Feve/Cough/Cold</option>
                                            <option value="Infectious Diseases">Infectious Diseases</option>
                                            <option value="Injuries Fracture">Injuries Fracture</option>
                                            <option value="Maternity Related">Maternity Related</option>
                                            <option value="Respiratory Related">Respiratory Related</option>
                                            <option value="Others">Others</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Remarks/Reason</label>
                                          <input type="text" id="location" name="reason" class="form-control" placeholder="Remarks/Reason in not more than 150 words.">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"></div>
                                      <div class="col-lg-4 col-xs-12">
                                        <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>
                                  </div>
                                </div>
                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="claimSidePan" style="margin-top: -50px;">
                      <div class="aboutPannel">
                        <div class="well">
                          <h4>About this App</h4>
                          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation.</p>
                        </div>
                      </div>
                      <div class="otherPannel">
                        <a href="raise_feedback.php">
                          <div class="well">
                            <h4>Share Feedback</h4>
                          </div>
                        </a>
                      </div>
                      <div class="otherPannel">
                        <a href="helpDesk.php">
                          <div class="well">
                            <h4>Help Desk</h4>
                          </div>
                        </a>
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