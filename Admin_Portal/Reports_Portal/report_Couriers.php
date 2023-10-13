<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Reports Portal</title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="report_index.php" data-toggle="tooltip" title="Reports Portal!" data-placement="top" >Reports Portal</a> / <span class="activePage"> Couriers Report</span> </h5>
              </div>
              <div class="bodyComponentReport">
                <div class="row">
                  <div class="col-lg-11 col-xs-9">
                  </div>
                  <div class="col-lg-1 col-xs-3">
                    <a href="report_Couriers.php">
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                    </a>
                  </div>
                </div>
                 
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="css-serial table table-hover" width="100%">
                        <style>
                        .css-serial {
                        counter-reset: serial-number;  /* Set the serial number counter to 0 */
                        }
                        .css-serial td:first-child:before {
                        counter-increment: serial-number;  /* Increment the serial number counter */
                        content: counter(serial-number);  /* Display the counter */
                        }
                        </style>
                        <thead >
                          <tr>
                            <th>Sr. No.</th>
                            <th>Dkt. No.</th>
                            <th>Date</th>
                            <th>Pkg</th>
                            <th>Mode</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Weight</th>
                            <th>Rate</th>
                            <th>Dkt. Charge</th>
                            <th>Freight Charge</th>
                            <th>GST@5%</th>
                            <th>Total Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $per_page_record = 10;
                          if (isset($_GET["page"])) {
                          $page  = $_GET["page"];
                          }
                          else {
                          $page=1;
                          }
                          $start_from = ($page-1) * $per_page_record;
                          $query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          // Display each field of the records.
                          
                          ?>
                          <tr>
                            
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td ></td>
                            <td><b><a style="color: black;" href="../Courier_Portal/courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['docketNumber'] ?></a></b></td>
                            <td><?php echo $rowMember['courierdate'] ?></td>
                            <td><?php echo $rowMember['nofpkts'] ?> Pcs</td>
                            <td><?php echo $rowMember['mode'] ?></td>
                            <td><?php echo $rowMember['package_from'] ?></td>
                            <td><?php echo $rowMember['package_to'] ?></td>
                            <td><?php echo $rowMember['total_weight'] ?> Kg</td>
                            <td><i class="fa fa-inr"></i> <?php echo $rowMember['rate'] ?>.00</td>
                            <td><i class="fa fa-inr"></i> <?php echo $rowMember['docket_charge'] ?>.00</td>
                            <td><i class="fa fa-inr"></i> <?php echo $rowMember['frieght_charge'] ?>.00</td>
                            <td><i class="fa fa-inr"></i> <?php echo round($rowMember['gst']) ?>.00</td>
                            <td><b><i class="fa fa-inr"></i> <?php echo round($rowMember['grand_total']) ?>.00</b></td>
                          </tr>
                          <?php
                          }
                          }
                          else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
               
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
                      echo "<a style='border:none;' href='report_Couriers.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='report_Couriers.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='report_Couriers.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='report_Couriers.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-12" >
                    <div class="pagination" style="float: right;">
                      <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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
                         <?php
                $per_page_record = 100;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record";
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowMember = mysqli_fetch_array($rs_result)) {
                // Display each field of the records.
                
                ?><style>
                  .tablePrintdetails th{text-align: left;}
                   
                </style>
                    <table class="tablePrintdetails" style="border:1px solid black"  width="100%">
                      <thead>
                     <tr>
                            <th>Docket No.</th>
                            <th>Date</th>
                            <th>Pkg</th>
                            <th>Mode</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Weight</th>
                            <th>Rate</th>
                            
                          </tr>
                      </thead>
                      <tbody >
                        <tr>
                            <td><?php echo $rowMember['docketNumber'] ?></td>
                            <td><?php echo $rowMember['courierdate'] ?></td>
                            <td><?php echo $rowMember['nofpkts'] ?> Pcs</td>
                            <td><?php echo $rowMember['mode'] ?></td>
                            <td><?php echo $rowMember['package_from'] ?></td>
                            <td><?php echo $rowMember['package_to'] ?></td>
                            <td><?php echo $rowMember['total_weight'] ?> Kg</td>
                            <td><?php echo $rowMember['rate'] ?>.00</td>
                            
                          </tr>
                          <tr>
                            <th>Docket Charge</th>
                            <th>Freight Charge</th>
                            <th>GST@5%</th>
                            <th>Total Amount</th>
                          </tr>
                          <tr>
                            <td><?php echo $rowMember['docket_charge'] ?>.00</td>
                            <td><?php echo $rowMember['frieght_charge'] ?>.00</td>
                            <td><?php echo round($rowMember['gst']) ?>.00</td>
                            <td><?php echo round($rowMember['grand_total']) ?>.00</td>
                          </tr>
                      </tbody>
                    </table> <br> <?php
                }
                }
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                ?>
                    <br>
                    
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