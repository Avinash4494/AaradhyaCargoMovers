<div id="print_setion">
  <div class="row">
    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#allLeaves">All Leaves</a></li>
        <li><a data-toggle="tab" href="#Pending">Pending</a></li>
        <li><a data-toggle="tab" href="#Approved">Approved</a></li>
        <li><a data-toggle="tab" href="#rejected">Rejected</a></li>
      </ul>
      <div class="tab-content">
        <div id="allLeaves" class="tab-pane fade in active">
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
                    <th>Leave Id</th>
                    <th>Employee Id</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 15;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM apply_leave  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  # code...
                  
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['leave_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['leaveType'] ?></td>
                    <td><?php echo $rowMember['leaveFrom'] ?></td>
                    <td><?php echo $rowMember['leaveTo'] ?></td>
                    <td><?php echo $rowMember['noOfDays'] ?> days</td>
                    <td style="color: #BA4A00; ;"><?php echo $rowMember['status'] ?></td>
                    <td><?php echo $rowMember['appliedDate'] ?></td>
                    <td><?php echo $rowMember['updatedDate'] ?></td>
                    <td>
                      <a href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
     <a href="all_leave_list.php"><button class="actionButtonIcons-center">View All</button></a>
   </div>
   <div class="col-lg-5"></div>
 </div>
            </div>
          </div>
        </div>
        <div id="Pending" class="tab-pane fade">
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
                    <th>Leave Id</th>
                    <th>Employee Id</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $query = 'SELECT * FROM apply_leave';
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Pending";
                  $approved = $rowMember["status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['leave_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['leaveType'] ?></td>
                    <td><?php echo $rowMember['leaveFrom'] ?></td>
                    <td><?php echo $rowMember['leaveTo'] ?></td>
                    <td><?php echo $rowMember['noOfDays'] ?> days</td>
                    <td style="color: orange ;"><?php echo $rowMember['status'] ?></td>
                    <td><?php echo $rowMember['appliedDate'] ?></td>
                    <td><?php echo $rowMember['updatedDate'] ?></td>
                    <td>
                      <a href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="Approved" class="tab-pane fade">
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
                    <th>Leave Id</th>
                    <th>Employee Id</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = 'SELECT * FROM apply_leave';
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Approved";
                  $approved = $rowMember["status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['leave_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['leaveType'] ?></td>
                    <td><?php echo $rowMember['leaveFrom'] ?></td>
                    <td><?php echo $rowMember['leaveTo'] ?></td>
                    <td><?php echo $rowMember['noOfDays'] ?> days</td>
                    <td style="color: green;"><?php echo $rowMember['status'] ?></td>
                    <td><?php echo $rowMember['appliedDate'] ?></td>
                    <td><?php echo $rowMember['updatedDate'] ?></td>
                    <td>
                      <a href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
        <div id="rejected" class="tab-pane fade">
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
                    <th>Leave Id</th>
                    <th>Employee Id</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = 'SELECT * FROM apply_leave';
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  $flag="Rejected";
                  $approved = $rowMember["status"];
                  if ($approved==$flag) {
                  # code...
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['leave_id'] ?></a></b></td>
                    <td><?php echo $rowMember['employees_id'] ?></td>
                    <td><?php echo $rowMember['leaveType'] ?></td>
                    <td><?php echo $rowMember['leaveFrom'] ?></td>
                    <td><?php echo $rowMember['leaveTo'] ?></td>
                    <td><?php echo $rowMember['noOfDays'] ?> days</td>
                    <td style="color: red ;"><?php echo $rowMember['status'] ?></td>
                    <td><?php echo $rowMember['appliedDate'] ?></td>
                    <td><?php echo $rowMember['updatedDate'] ?></td>
                    <td>
                      <a href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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