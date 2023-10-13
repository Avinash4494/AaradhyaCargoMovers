<?php
require_once('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_vehicle where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$flagCheck = $rowMember['vehicle_id'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_vehicle where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from add_vehicle where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="vehicle_index.php"; }, 100);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Vehicles Portal </title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftVehicle.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top">Vehicles Portal</a> / <span class="activePage">Vehicle View</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-8 col-xs-10" >
                    <h5 class="hidden-xs"> <b>Vehicle View</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-3" >
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a   href="vehicleEdit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')"><button class="actionButtonIcons-center" type="submit">
                        <i class="fa fa-pencil"></i></button>
                      </a>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a   href="doc_upload.php?id=<?php echo $rowMember['id'] ?>"><button class="actionButtonIcons-center" type="submit">
                        <i class="fa fa-upload"></i></button>
                      </a>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a href="vehicle_view.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')"> <button class="actionButtonIcons-center">
                        <i class="fa fa-trash-o"></i></button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              
              <div class="bodyComponent">
                <div class="rectLongContentImg">
                  <div class="rectWidget">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="vehicleImg">
                            <div class="vehiclewell">
                              <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
                            </div>
                            <h5><?php echo $rowMember['veh_name'] ?></h5>
                          </div>
                        </div>
                        <div class="col-lg-9">
                          <div class="vehicleContent">
                            <h5>Vehicle Details</h5>
                            <div class="row">
                              <div class="col-lg-6">
                                <p>Vehicle ID. : <?php echo $rowMember["vehicle_id"]; ?></p>
                                <p>Vehicle Type : <?php echo $rowMember['veh_type'] ?></p>
                                <p>Registration No :<?php echo $rowMember['regis_num'] ?></p>
                                <p>Vehicle No : <?php echo $rowMember['veh_num'] ?></p>
                                
                              </div>
                              <div class="col-lg-6">
                                <p>Joining Date : <?php echo $rowMember['veh_joinDt'] ?></p>
                                <p>Driver Name : <?php echo $rowMember['veh_driver'] ?></p>
                                <p>Driver Id : <?php echo $rowMember['driver_id'] ?></p>
                              </div>
                            </div>                     
                            
                          </div>
                        </div>
                      </div>
                       <hr />
                     
                            <div class="row">
                              <div class="col-lg-3">
                                <style></style>
                                <div class="documentReq">
                                  <ul>
                                    <h5>Documents Required</h5>
                                    <li id="aadharCard">Aadhar Card</li>
                                    <li id="aadharCard">PAN Card</li>
                                    <li id="aadharCard">Driving Licence</li>
                                    <li id="aadharCard">Vehicle Registration</li>
                                  </ul>
                                </div>
                              </div>
 
                              <div class="col-lg-9">
                                 <h5 style="padding: 0px 15px 10px 15px;">Vehicle Documents</h5>
                                <?php
                                require_once "db.php";
                                $upload_dire = '../uploads/vehicle-upload/';
                                $query_profile = mysqli_query($connect,
                                "SELECT a.vehicle_id,a.fullname,a.image1,a.document_id
                                From veh_upload_doc as a
                                inner join add_vehicle as u
                                on a.vehicle_id = u.vehicle_id");
                                while ($row_profile = mysqli_fetch_assoc($query_profile)) {
                                $flag = $row_profile['vehicle_id'];
                                if($flag==$flagCheck){
                                ?>
                                <div class="col-lg-3">
                                  <div class="showDocument" style="padding-bottom: 10px;">
                                    <div class="well">
                                      <img src="<?php echo $upload_dire.$row_profile['image1'] ?>" class="img-responsive">
                                    </div>
                                    <p><?php echo $row_profile["fullname"]; ?></p>
                                  </div>
                                </div>
                                                             
                                <?php
                                }}
                                ?>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="print_setion" class="hidden-xs hidden-lg" style="border:2px solid black;padding: 5px; margin-bottom: 30px; ">
                <h4 style="text-align: center;margin: 0px;">Vehicle Details</h4><br>
                <div class="courier_view">
                  <table class="tablePrint hidden-xs" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td width="300px">
                          <img src="../image/mainLogo.png" alt="" height="50px" width="200px">
                          <h4 style="margin-left: 20px;">GSTIN : 29DJIPS6581L2Z5</h4>
                        </td>
                        <td width="300px">
                          <img src="../image/Picture1.png" alt="" class="img-responsive" style="height: 70px;margin-left: 100px;margin-top: -30px;">
                        </td>
                        <td width="400px">
                          <p style="text-align: left; margin: 0px;padding-bottom:15px;"><b>Registred Office:</b><br>
                            +91 9113855664 | +91 9743866386 <br>
                            aaradhyacargomovers@gmail.com <br>
                            #26, 1st Floor, Yeshwantpur 1st Main Road Mathikere,
                          <br>Land Mark : Opp. Coffe Santhe Hotel, Banglore, 560054</p>
                        </td>
                      </tr>
                    </tbody>
                  </table><br>
                  <table class="tablePrintdetails" border="1"  width="100%">
                    <thead>
                      
                      <h5><b>Vehicle Details</b></h5>
                      <tr>
                        <th>Vehicle Id.</th>
                        <th>Registration No.</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle No.</th>
                        <th>Type</th>
                        <th>Joining Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $rowMember['vehicle_id'] ?></td>
                        <td><?php echo $rowMember['regis_num'] ?></td>
                        <td><?php echo $rowMember['veh_name'] ?></td>
                        <td><?php echo $rowMember['veh_num'] ?></td>
                        <td><?php echo $rowMember['veh_type'] ?></td>
                        <td><?php echo $rowMember['veh_joinDt'] ?></td>
                      </tr>
                    </tbody>
                  </table><br>
                  <table class="tablePrintdetails" border="1"  width="100%">
                    <thead>
                      <h5><b>Driver Details</b></h5>
                      <tr>
                        <th>Driver Id.</th>
                        <th>Driver Name</th>
                        <th>DL Number</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $rowMember['driver_id'] ?></td>
                        <td><?php echo $rowMember['veh_driver'] ?></td>
                        <td><?php echo $rowMember['dl_num'] ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="tablePrintImage" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td><img src="../image/Picture2.png" alt="" class="img-responsive" style="height: 50px;float: right;margin-right: 30px;margin-top: 60px;margin-bottom: 20px;"></td>
                      </tr>
                    </tbody>
                  </table>
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
  function generatePDF() {
  var doc = new jsPDF();
  doc.fromHTML(document.getElementById("test"), // page element which you want to print as PDF
  15,
  15,
  {
  'width': 170
  },
  function(a)
  {
  doc.save("HTML2PDF.pdf");
  });
  }
  </script>