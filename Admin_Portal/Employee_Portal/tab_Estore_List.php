<div id="Stationery" class="tab-pane fade in active  ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#StatList">Stationery</a></li>
        <li><a data-toggle="tab" href="#statPending">Pending</a></li>
        <li><a data-toggle="tab" href="#statApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#statRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="StatList" class="tab-pane fade in active">
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
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Location</th>
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
                  $query = "SELECT * FROM raise_stat LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['sta_item'] ?></td>
                    <td><?php echo $rowMember['quantity'] ?> Nos</td>
                    <td><?php echo $rowMember['location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="passStat_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="statPending" class="tab-pane fade">
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
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Location</th>
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
                  $query = "SELECT * FROM raise_stat  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['sta_item'] ?></td>
                    <td><?php echo $rowMember['quantity'] ?> Nos</td>
                    <td><?php echo $rowMember['location'] ?></td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="statApproved" class="tab-pane fade">
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
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Location</th>
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
                  $query = "SELECT * FROM raise_stat  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['sta_item'] ?></td>
                    <td><?php echo $rowMember['quantity'] ?> Nos</td>
                    <td><?php echo $rowMember['location'] ?></td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="statRejected" class="tab-pane fade">
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
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Location</th>
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
                  $query = "SELECT * FROM raise_stat  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['sta_item'] ?></td>
                    <td><?php echo $rowMember['quantity'] ?> Nos</td>
                    <td><?php echo $rowMember['location'] ?></td>
                    
                    <td style="color:red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_stat_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="businessCard" class="tab-pane fade ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#busiCardList">Business Card</a></li>
        <li><a data-toggle="tab" href="#buisPending">Pending</a></li>
        <li><a data-toggle="tab" href="#buisApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#buisRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="busiCardList" class="tab-pane fade in active">
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
                    <th>Name on Card</th>
                    <th>Designation</th>
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
                  $query = "SELECT * FROM raise_business_card LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['name'] ?></td>
                    <td><?php echo $rowMember['designation'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="passBuis_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="buisPending" class="tab-pane fade">
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
                    <th>Name on Card</th>
                    <th>Designation</th>
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
                  $query = "SELECT * FROM raise_business_card  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['name'] ?></td>
                    <td><?php echo $rowMember['designation'] ?></td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="buisApproved" class="tab-pane fade">
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
                    <th>Name on Card</th>
                    <th>Designation</th>
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
                  $query = "SELECT * FROM raise_business_card  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['name'] ?></td>
                    <td><?php echo $rowMember['designation'] ?></td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="buisRejected" class="tab-pane fade">
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
                    <th>Name on Card</th>
                    <th>Designation</th>
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
                  $query = "SELECT * FROM raise_business_card  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['name'] ?></td>
                    <td><?php echo $rowMember['designation'] ?></td>
                    
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_business_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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

 