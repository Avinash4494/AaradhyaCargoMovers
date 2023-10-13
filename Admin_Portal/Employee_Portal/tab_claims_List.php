<div id="ConveyanceClaims" class="tab-pane fade in active ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#allRequest">Conveyance Claim</a></li>
        <li><a data-toggle="tab" href="#ConvPending">Pending</a></li>
        <li><a data-toggle="tab" href="#ConvApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#Convrejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="allRequest" class="tab-pane fade in active">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 20;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM raise_convclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['travelCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="all_conv_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="ConvPending" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $query = 'SELECT * FROM raise_convclaim';
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
                    <td><b><a style="color: black;" href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['travelCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="ConvApproved" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = 'SELECT * FROM raise_convclaim';
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
                    <td><b><a style="color: black;" href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['travelCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="Convrejected" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = 'SELECT * FROM raise_convclaim';
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
                    <td><b><a style="color: black;" href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['travelCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: red;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_convClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="FoodClaims" class="tab-pane fade">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#foodClaims">Food Claims </a></li>
        <li><a data-toggle="tab" href="#foodPending">Pending</a></li>
        <li><a data-toggle="tab" href="#foodApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#foodRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="foodClaims" class="tab-pane fade in active">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill No.</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_foodclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['foodCategory'] ?></td>
                    <td><?php echo $rowMember['bill_no'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="all_food_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="foodPending" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill No.</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 20;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM raise_foodclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['foodCategory'] ?></td>
                    <td><?php echo $rowMember['bill_no'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: orange;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="foodApproved" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill No.</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_foodclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['foodCategory'] ?></td>
                    <td><?php echo $rowMember['bill_no'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color:green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="foodRejected" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill No.</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_foodclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['foodCategory'] ?></td>
                    <td><?php echo $rowMember['bill_no'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: red;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_foodClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="MiscellaneousClaims" class="tab-pane fade ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#MiscClaims">Miscellaneous Claims</a></li>
        <li><a data-toggle="tab" href="#MiscPending">Pending</a></li>
        <li><a data-toggle="tab" href="#MiscApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#MiscRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="MiscClaims" class="tab-pane fade in active">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 20;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM raise_misceclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['misceCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="all_misc_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="MiscPending" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_misceclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['misceCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="MiscApproved" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_misceclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['misceCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="MiscRejected" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_misceclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['misceCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: red;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_miscClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="MediClaims" class="tab-pane fade">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#mediClaims">Medi Claims </a></li>
        <li><a data-toggle="tab" href="#mediPending">Pending</a></li>
        <li><a data-toggle="tab" href="#mediApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#mediRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="mediClaims" class="tab-pane fade in active">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Claim Type</th>
                    <th>Illness Type</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Update On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 20;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM  raise_mediclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['claimCategory'] ?></td>
                    <td><?php echo $rowMember['illnessCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="all_medi_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="mediPending" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Claim Type</th>
                    <th>Illness Type</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_mediclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['claimCategory'] ?></td>
                    <td><?php echo $rowMember['illnessCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: orange;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="mediApproved" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Claim Type</th>
                    <th>Illness Type</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_mediclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['claimCategory'] ?></td>
                    <td><?php echo $rowMember['illnessCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="mediRejected" class="tab-pane fade">
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
                    <th>Claim Id</th>
                    <th>Employee Id</th>
                    <th>Raised By</th>
                    <th>Claim Type</th>
                    <th>Illness Type</th>
                    <th>Bill Dt.</th>
                    <th>Claim Amt.</th>
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
                  $query = "SELECT * FROM raise_mediclaim  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['claim_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['claimCategory'] ?></td>
                    <td><?php echo $rowMember['illnessCategory'] ?></td>
                    <td><?php echo $rowMember['bill_date'] ?></td>
                    <td><i class="fa fa-inr"></i> <?php echo $rowMember['claim_amount'] ?>.00</td>
                    
                    <td style="color: red;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_mediClaim_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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