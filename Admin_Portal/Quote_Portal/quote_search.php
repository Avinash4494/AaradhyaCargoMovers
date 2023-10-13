<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from quote where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from quote where id=".$id;
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
  <title>Quote Portal</title>
  <body onload="numberWithCommas(),showtime();">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftQuote.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="quote_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top">Quote Portal</a> / <span class="activePage">Quote Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Quote Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <!-- <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="quote_search.php" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <p>Search by Quote Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="word"  name="dock_number"  autocomplete="off" placeholder="Enter Quote ID"  required="">
                      </div>
                      
                    </div>
                    <div class="col-lg-2">
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                      
                    </div>
                    <div class="col-lg-2"></div>
                    
                  </div>
                  
                </form>
                <br>
                <div id="priint_setion">
                  <div class="row">
                    
                    <div class="col-lg-12">
                      <?php
                      
                      include('db.php');
                      $upload_dir = '../uploads/courier-uploads/';
                      if(isset($_POST['click'])){
                      $dock_num = $_POST['dock_number'];
                      $q = "SELECT * FROM quote where (quote_id = '$dock_num')";
                      $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                      if(mysqli_num_rows($result)>=1){
                      while($rowMember = mysqli_fetch_assoc($result)){
                      ?>
                      <div class="rectLongContent" style="margin-top: -20px;">
                        <div class="rectWidget">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-11 col-xs-9">
                                <div class="row">
                                  <div class="col-lg-2">
                                    <p>Quote Id - <?php echo $rowMember['quote_id'] ?>
                                    </p>
                                  </div>
                                  <div class="col-lg-2">
                                    <p>Name - <?php echo $rowMember['sender_names'] ?></p>
                                    <p>Contact - <?php echo $rowMember['sender_phone'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-2">
                                    
                                    <p>Mode By - <?php echo $rowMember['sender_freight_type'] ?></p>
                                    <p>Weight - <?php echo $rowMember['sender_weight'] ?>.00 Kg</p>
                                    
                                  </div>
                                  <div class="col-lg-2">
                                    
                                    <p>From - <?php echo $rowMember['sender_fstate'] ?></p>
                                    <p>To - <?php echo $rowMember['sender_tstate'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-3">
                                    <p>Email - <?php echo $rowMember['sender_email'] ?></p>
                                    <p>Current Status - <?php echo $rowMember['follow_status'] ?></p>
                                  </div>
                                  
                                  
                                </div>
                              </div>
                              <div class="col-lg-1 col-xs-3">
                                <?php
                                $courCheck = $rowMember['follow_status'];
                                $ActiveCheck = "Active";
                                $inProgCheck  = "In Progress";
                                $resolvedCheck  = "Resolved";
                                if ($courCheck==$resolvedCheck) {
                                ?>
                                <a href="javascript: void(0)">
                                  <button style="background-color: green;" class="actionButtonIcons-center"  type="submit">  <i class="fa fa-ban" style="color: white;"></i></button>
                                  <p><?php echo $rowMember['follow_status'] ?></p>
                                </a>
                                <?php
                                }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                                
                                
                                <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                  <button  class="actionButtonIcons-center"  type="submit"><i class="fa fa-pencil"></i></button>
                                  <p><?php echo $rowMember['follow_status'] ?></p>
                                </a>
                                <style>
                                .actionButtonIcons-center{
                                background-color: white;
                                color: #1c2833;
                                }
                                </style>
                                <?php }?>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-lg-2">
                                <p>Reqested On - <?php echo $rowMember['sender_time'] ?></p>
                              </div>
                              <div class="col-lg-10">
                                <p>Message - <?php echo $rowMember['sender_message'] ?></p>
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