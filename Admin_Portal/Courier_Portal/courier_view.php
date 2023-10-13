<?php
require_once('../db.php');
$upload_dir = 'uploads/members-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from addcourier where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="all_Members_List.php"; }, 100);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Tax Invoice / Aaradhya Cargo Movers  </title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftCouriers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top">Couriers Portal</a> / <span class="activePage">Courier View</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11" >
                    <h5><b>Courier View</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1" >
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div id="print_setion" style="border:2px solid black;padding: 5px; margin-bottom: 20px;margin-top: -15px;">
                <h4 style="text-align: center;margin: 0px;">Tax Invoice</h4>
                <div class="courier_view">
                  <table class="tablePrint" border="0" width="100%">
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
                  <table class="tablePrint" border="1" style="margin-top: -30px;" width="100%">
                    <tbody >
                      <tr>
                        <td width="400px">
                          <p style="padding: 0px 10px;"><b>Customer’s Name & Address:</b><br>
                            <b>Name</b> : Space Management Systems India Pvt. Ltd.<br>
                            <b>Address</b> : No. 14/2, Bilwaradahalli,<br>
                            Bannerghatta Road Bangalore - 560 083.<br><br>
                            <b>Contact</b> : +91 77609 65724<br>
                          <b>GSTIN</b> : 29AAPCS5830E1Z1</p>
                        </td>
                        
                        <td width="270px">
                          <p style="padding: 0px 10px;"><b>Date</b> : 04.03.2022 <br>
                          <b>Invoice No.</b> : 2021-22/ACM/<?php echo $rowMember['invoice_no'] ?></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="tablePrintdetails css-serial " border="1"  style=" text-align: center;" width="100%">
                    <thead>
                      <style>
                      .css-serial {
                      counter-reset: serial-number;  /* Set the serial number counter to 0 */
                      }
                      .css-serial td:first-child:before {
                      counter-increment: serial-number;  /* Increment the serial number counter */
                      content: counter(serial-number);  /* Display the counter */
                      }
                      table.tablePrintdetails td
                      {
                      text-align: center;
                      }
                      table.tablePrintdetails th
                      {
                      text-align: center;
                      }
                      table.tablePrint span
                      {
                        padding-left: 10px;
                      }
                      </style>
                      <tr>
                        <th>Sl.No.</th>
                        <th>Date</th>
                        <th>Dkt. No.</th>
                        <th>Pkg.</th>
                        <th>Mode</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Weight</th>
                        <th>Rate</th>
                        <th>Frieght Charges</th>
                        <th>Docket Charges</th>
                        <th>Pick-up Charges</th>
                        <th>GST @5%</th>
                        <th>Total Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td><?php echo $rowMember['courierdate'] ?></td>
                        <td><?php echo $rowMember['docketNumber'] ?></td>
                        <td><?php echo $rowMember['nofpkts'] ?></td>
                        <td><?php echo $rowMember['mode'] ?></td>
                        <td><?php echo $rowMember['package_from'] ?></td>
                        <td><?php echo $rowMember['package_to'] ?></td>
                        <td><?php echo $rowMember['total_weight'] ?></td>
                        <td><?php echo $rowMember['rate'] ?></td>
                        <td><?php echo $rowMember['frieght_charge'] ?>.00</td>
                        <td><?php echo $rowMember['docket_charge'] ?>.00</td>
                        <td><?php echo $rowMember['pickup_charge'] ?>.00</td>
                        <td><?php echo $rowMember['gst'] ?>.00</td>
                        <td><?php echo $rowMember['grand_total'] ?>.00</td>
                      </tr>
                      <!--  <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr> -->
                    </tbody>
                  </table>
                  <table class="tablePrintdetails" border="1" width="100%">
                    <tbody>
                      <tr>
                        <td width="440px" style="text-align: right;"><span style="margin-right: 20px;">Total Amount</span></td>
                        <td width="110px"><b><?php echo $rowMember['frieght_charge'] ?>.00</b></td>
                        <td width="100px"><b><?php echo $rowMember['docket_charge'] ?>.00</b></td>
                        <td width="110px"><b><?php echo $rowMember['pickup_charge'] ?>.00</b></td>
                        <td width="70px"><b><?php echo $rowMember['gst'] ?>.00</b></td>
                        <td width=""><b><?php echo $rowMember['grand_total'] ?>.00</b></td>
                        
                      </tr>
                      
                    </tbody>
                  </table><br>
                  <table class="tablePrint" border="1" width="100%">
                    <tbody>
                      <tr>
                        <td><b><span>GST @ 5 % : <?php echo $rowMember['gst'] ?>.00</span></b></td>
                      </tr>
                      <tr>
                        <td><b><span>Round-off : - 0.00</span></b></td>
                      </tr>
                      <tr>
                        <td><b><span>Total Amount : <?php echo $rowMember['grand_total'] ?>.00</span></b></td>
                      </tr>
                    </tbody>
                  </table>
                  <h4 style="text-align: center; margin: 5px;">Bank Account Details</h4>
                  <table class="tablePrint" border="1" width="100%">
                    <tbody>
                      <tr>
                        <td><b><span>Bank Name : AXIS BANK</span></b></td>
                        <td><b><span>Account Name : Aaradhya Cargo Movers</span></b></td>
                      </tr>
                      <tr>
                        <td><b><span>Account Type : Current Account</span></b></td>
                        <td><b><span>IFSC Code : UTIB0001614</span></b></td>
                      </tr>
                      <tr>
                        <td><b><span>Account No. : 918020089221996</span></b></td>
                        <td><b><span>Branch : Yeshwanthpur, Bangalore</span></b></td>
                      </tr>
                    </tbody>
                  </table>
                  <style type="text/css">
                    .tablePrintImage img
                    {
                      float: right;
                      margin-top: 15px;
                      height: 70px;
                    }
                  </style>
                  <table class="tablePrintImage" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td><img src="../image/Picture2.png" alt="" class="img-responsive"></td>
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