<div class="widgetShipmentComp" style="padding: 0px;">
  <table class="table table-hover" style="margin-top: 0px;font-size: 0.8em;" width="100%">
    <thead >
      <tr>
        <th>User Id</th>
        <th>Log Id</th>
        <th>Auth Type</th>
        <th>Log Date</th>
        <th>Log Time</th>
        <th>IP Add.</th>
        <th>Browser</th>
        <th>Hostname</th>
       <!--  <th>Location</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      require_once "db.php";
      $per_page_record = 10;
      if (isset($_GET["page"])) {
      $page  = $_GET["page"];
      }
      else {
      $page=1;
      }
      $start_from = ($page-1) * $per_page_record;
      $query = "SELECT * FROM userlog_activity LIMIT $start_from, $per_page_record";
      $rs_result = mysqli_query ($connect, $query);
      ?>
      <?php
      if(mysqli_num_rows($rs_result)){
      while ($rowMember = mysqli_fetch_array($rs_result)) {
      $setUser_id = $rowMember['login_id'];
      if ($getUser_id==$setUser_id) {
      ?>
      <tr>
        <p hidden=""><?php echo $rowMember['id'] ?></p>
        <td><b><a style="color: black;" href="log_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['login_id'] ?></a></b></td>
        <td><?php echo $rowMember['log_activity_id'] ?></td>
        <td><?php echo $rowMember['auth_type'] ?></td>
        <td><?php echo $rowMember['log_time'] ?></td>
        <td><?php echo $rowMember['log_date'] ?></td>
        <td><?php echo $rowMember['log_ip_address'] ?></td>
        <td><?php echo $rowMember['log_browser'] ?></td>
        <td><?php echo $rowMember['log_hostname'] ?></td>
       <!--  <td><?php echo $rowMember['logLocation'] ?></td> -->

      </tr>

      <?php
      }
      }
?>
      <?php
      }
      else
      {
      echo "No record found";
      }
      ?>
    </tbody>
  </table>
</div>