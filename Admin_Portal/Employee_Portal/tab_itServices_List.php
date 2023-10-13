<div id="Desktop" class="tab-pane fade in active ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#DeskList">Desktop Request</a></li>
        <li><a data-toggle="tab" href="#deskPending">Pending</a></li>
        <li><a data-toggle="tab" href="#deskApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#deskRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="DeskList" class="tab-pane fade in active">
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
                    <th>Wing</th>
                    <th>Cubicle</th>
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
                  $query = "SELECT * FROM raise_desktop LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['wing'] ?></td>
                    <td><?php echo $rowMember['cubicle'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="passDesk_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="deskPending" class="tab-pane fade">
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
                    <th>Wing</th>
                    <th>Cubicle</th>
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
                  $query = "SELECT * FROM raise_desktop  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['wing'] ?></td>
                    <td><?php echo $rowMember['cubicle'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    
                    <td style="color: orange;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="deskApproved" class="tab-pane fade">
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
                    <th>Wing</th>
                    <th>Cubicle</th>
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
                  $query = "SELECT * FROM raise_desktop  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['wing'] ?></td>
                    <td><?php echo $rowMember['cubicle'] ?> </td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    
                    <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="deskRejected" class="tab-pane fade">
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
                    <th>Wing</th>
                    <th>Cubicle</th>
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
                  $query = "SELECT * FROM raise_desktop  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['wing'] ?></td>
                    <td><?php echo $rowMember['cubicle'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    
                    <td style="color: red;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_desk_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="byod" class="tab-pane fade  ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#byodList">BYOD Request</a></li>
        <li><a data-toggle="tab" href="#byodPending">Pending</a></li>
        <li><a data-toggle="tab" href="#byodApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#byodRejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="byodList" class="tab-pane fade in active">
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
                    <th>Device Type</th>
                    <th>Device Name</th>
                    <th>Model No.</th>
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
                  $query = "SELECT * FROM raise_byod LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['dev_type'] ?></td>
                    <td><?php echo $rowMember['dev_name'] ?></td>
                    <td><?php echo $rowMember['dev_modelNo'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="passByod_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="byodPending" class="tab-pane fade">
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
                    <th>Device Type</th>
                    <th>Device Name</th>
                    <th>Model No.</th>
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
                  $query = "SELECT * FROM raise_byod  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['dev_type'] ?></td>
                    <td><?php echo $rowMember['dev_name'] ?></td>
                    <td><?php echo $rowMember['dev_modelNo'] ?></td>
                    
                    <td style="color: orange"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="byodApproved" class="tab-pane fade">
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
                    <th>Device Type</th>
                    <th>Device Name</th>
                    <th>Model No.</th>
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
                  $query = "SELECT * FROM raise_byod  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['dev_type'] ?></td>
                    <td><?php echo $rowMember['dev_name'] ?></td>
                    <td><?php echo $rowMember['dev_modelNo'] ?></td>
                    
                    <td style="color: green"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="byodRejected" class="tab-pane fade">
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
                    <th>Device Type</th>
                    <th>Device Name</th>
                    <th>Model No.</th>
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
                  $query = "SELECT * FROM raise_byod  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                    <td><?php echo $rowMember['dev_type'] ?></td>
                    <td><?php echo $rowMember['dev_name'] ?></td>
                    <td><?php echo $rowMember['dev_modelNo'] ?></td>
                    
                    <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_byod_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
<div id="asset" class="tab-pane fade   ">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#assetList">Asset Request</a></li>
        <li><a data-toggle="tab" href="#assetPending">Pending</a></li>
        <li><a data-toggle="tab" href="#assetApproved">Approved</a></li>
        <li><a data-toggle="tab" href="#assetRejected">Rejected</a></li>
        <li><a data-toggle="tab" href="#assetReturn">Return</a></li>
      </ul>
      <div class="tab-content">
        <div id="assetList" class="tab-pane fade in active">
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
                    <th>Asset Type</th>
                    <th>Office Location</th>
                    <th>Asset Location</th>
                    <th>Status</th>
                    <th>State</th>
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
                  $query = "SELECT * FROM raise_asset LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['asset_type'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    <td><?php echo $rowMember['asset_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                     <td style="color: #BA4A00;"><b><?php echo $rowMember['asset_return'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                  <a href="passAsset_list.php"><button class="actionButtonIcons-center">View All</button></a>
                </div>
                <div class="col-lg-5"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="assetPending" class="tab-pane fade">
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
                    <th>Asset Type</th>
                    <th>Office Location</th>
                    <th>Asset Location</th>
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
                  $query = "SELECT * FROM raise_asset  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['asset_type'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    <td><?php echo $rowMember['asset_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="assetApproved" class="tab-pane fade">
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
                    <th>Asset Type</th>
                    <th>Office Location</th>
                    <th>Asset Location</th>
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
                  $query = "SELECT * FROM raise_asset  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['asset_type'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    <td><?php echo $rowMember['asset_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="assetRejected" class="tab-pane fade">
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
                    <th>Asset Type</th>
                    <th>Office Location</th>
                    <th>Asset Location</th>
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
                  $query = "SELECT * FROM raise_asset  LIMIT $start_from, $per_page_record ";
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
                    <td><b><a style="color: black;" href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['asset_type'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    <td><?php echo $rowMember['asset_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="assetReturn" class="tab-pane fade">
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
                    <th>Asset Type</th>
                    <th>Office Location</th>
                    <th>Asset Location</th>
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
                  $query = "SELECT * FROM raise_asset  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $Return="Return";
                  $Pending="Pending";
                  $Submitted="Submitted";
                  $approved = $rowMember["asset_return"];
                  if ($approved==$Return || $approved==$Pending || $approved==$Submitted ) {
                  # code...
                  ?>
                     <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="emp_asset_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['raised_by'] ?></td>
                   <td><?php echo $rowMember['asset_type'] ?></td>
                    <td><?php echo $rowMember['offc_location'] ?></td>
                    <td><?php echo $rowMember['asset_location'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['asset_return'] ?></b></td>
                    <td ><?php echo $rowMember['raised_on'] ?></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                    <td>
                      <a href="emp_assetReturn.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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

 