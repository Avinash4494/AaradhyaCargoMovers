<div id="guestPass" class="tab-pane fade in active">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#guestPassList">Guest Pass </a></li>
        <li><a data-toggle="tab" href="#guestPending">Pending</a></li>
        <li><a data-toggle="tab" href="#guestApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#guestRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="guestPassList" class="tab-pane fade in active">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Place Visit</th>
                    <th>Pass Type</th>
                    <th>Guest Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_guest LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['pass_type'] ?></td>
                    <td><?php echo $rowMember['guest_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                  <a href="passGuest_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="guestPending" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Place Visit</th>
                    <th>Pass Type</th>
                    <th>Guest Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_guest  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Pending";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['pass_type'] ?></td>
                    <td><?php echo $rowMember['guest_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="guestApproved" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Place Visit</th>
                    <th>Pass Type</th>
                    <th>Guest Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_guest  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Approved";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['pass_type'] ?></td>
                    <td><?php echo $rowMember['guest_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="guestRejected" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Place Visit</th>
                    <th>Pass Type</th>
                    <th>Guest Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_guest  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Rejected";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['pass_type'] ?></td>
                    <td><?php echo $rowMember['guest_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_guestPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="gatePass" class="tab-pane fade ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#gatePassList">Gate Pass </a></li>
        <li><a data-toggle="tab" href="#gatePending">Pending</a></li>
        <li><a data-toggle="tab" href="#gateApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#gateRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="gatePassList" class="tab-pane fade in active">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Move Between</th>
                    <th>Sender Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_gate_pass LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['move_btwn'] ?></td>
                    <td><?php echo $rowMember['sender_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                  <a href="passGate_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="gatePending" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Move Between</th>
                    <th>Sender Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_gate_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Pending";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['move_btwn'] ?></td>
                    <td><?php echo $rowMember['sender_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="gateApproved" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Move Between</th>
                    <th>Sender Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_gate_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Approved";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['move_btwn'] ?></td>
                    <td><?php echo $rowMember['sender_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="gateRejected" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Move Between</th>
                    <th>Sender Name</th>
                    <th>Organization</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_gate_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Rejected";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['move_btwn'] ?></td>
                    <td><?php echo $rowMember['sender_name'] ?></td>
                    <td><?php echo $rowMember['organisation'] ?></td>
                    
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_gatePass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="vehiclePass" class="tab-pane fade ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#vehiclePassList">Vehicle Pass </a></li>
        <li><a data-toggle="tab" href="#vechPending">Pending</a></li>
        <li><a data-toggle="tab" href="#vechApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#vechRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="vehiclePassList" class="tab-pane fade in active">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Veh. No</th>
                    <th>Veh. Type</th>
                    <th>Regis. No.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vehicle_pass LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['veh_type'] ?></td>
                    <td><?php echo $rowMember['veh_num'] ?></td>
                    <td><?php echo $rowMember['veh_regis'] ?></td>
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                  <a href="passVech_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="vechPending" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Veh. No</th>
                    <th>Veh. Type</th>
                    <th>Regis. No.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vehicle_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Pending";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['veh_type'] ?></td>
                    <td><?php echo $rowMember['veh_num'] ?></td>
                    <td><?php echo $rowMember['veh_regis'] ?></td>
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="vechApproved" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Veh. No</th>
                    <th>Veh. Type</th>
                    <th>Regis. No.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vehicle_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Approved";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['veh_type'] ?></td>
                    <td><?php echo $rowMember['veh_num'] ?></td>
                    <td><?php echo $rowMember['veh_regis'] ?></td>
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="vechRejected" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Veh. No</th>
                    <th>Veh. Type</th>
                    <th>Regis. No.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vehicle_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Rejected";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['veh_type'] ?></td>
                    <td><?php echo $rowMember['veh_num'] ?></td>
                    <td><?php echo $rowMember['veh_regis'] ?></td>
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vechPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="vendorPass" class="tab-pane fade ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#vendorPassList">Vendor Pass </a></li>
        <li><a data-toggle="tab" href="#vendorPending">Pending</a></li>
        <li><a data-toggle="tab" href="#vendorApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#vendorRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="vendorPassList" class="tab-pane fade in active">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Place Visit</th>
                    <th>Item</th>
                    <th>ID Type</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vend_pass LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['item_carried'] ?></td>
                    <td><?php echo $rowMember['id_type'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                  <a href="passVend_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="vendorPending" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Place Visit</th>
                    <th>Item</th>
                    <th>ID Type</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Pending";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['item_carried'] ?></td>
                    <td><?php echo $rowMember['id_type'] ?></td>
                    
                    <td style="color: orange;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="vendorApproved" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Place Visit</th>
                    <th>Item</th>
                    <th>ID Type</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Approved";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['item_carried'] ?></td>
                    <td><?php echo $rowMember['id_type'] ?></td>
                    
                    <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="vendorRejected" class="tab-pane fade">
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
                    <th>Request Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Place Visit</th>
                    <th>Item</th>
                    <th>ID Type</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
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
                  $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Rejected";
                  $approved = $rowMember["req_status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['place_visit'] ?></td>
                    <td><?php echo $rowMember['item_carried'] ?></td>
                    <td><?php echo $rowMember['id_type'] ?></td>
                    
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>