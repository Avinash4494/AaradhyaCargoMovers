<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_employees where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<div class="left-compTop">
                <a href="employees_Index.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>
                 <div class="actionBox"></div></a>
                <a href="employees_Add.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-user-plus"></i> &nbsp Add Employee</button>
                 <div class="actionBox"></div></a>
                <a href="all_Employees_List.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp All Employees</button>
                 <div class="actionBox"></div></a>
                <a href="employees_request.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-file-text"></i> &nbsp Requests</button>
                 <div class="actionBox"></div></a>
                <a href="employee_leave_View.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-calendar"></i> &nbsp Leaves</button>
                 <div class="actionBox"></div></a>
                <a href="employee_claims_View.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-inr"></i> &nbsp Claims</button>
                 <div class="actionBox"></div></a>
                <a href="employees_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button>
                 <div class="actionBox"></div></a>
              </div>