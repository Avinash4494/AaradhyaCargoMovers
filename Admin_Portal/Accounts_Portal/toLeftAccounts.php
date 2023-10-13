 

<div class="left-compTop hidden-xs">
  <a href="admin_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>
    <div class="actionBox"></div>
  </a>
  <a href="All_Account_List.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-users"></i> &nbsp Admin Accounts</button>
    <div class="actionBox"></div>
  </a>
  <a href="login_activity.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp Login Activity</button>
    <div class="actionBox"></div>
  </a>
  <?php 
        $getAuthStatus = $row['auth_type'];
        $checkAuth = "Level_1";
        if($getAuthStatus==$checkAuth)
        {
          ?>
  <a href="approval_Access.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp Access Approval</button>
    <div class="actionBox"></div>
  </a>
        <?php
                } 
                 ?>
  <a href="admin_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button>
    <div class="actionBox"></div></a>
  </div>


  <div class="left-compTop pannelCompOthers hidden-lg
  ">
    <a href="admin_index.php">
      <button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>

    </a>
  <a href="All_Account_List.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-users"></i> &nbsp Admin Accounts</button>
    
  </a>
  <a href="login_activity.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp Login Activity</button>
    
  </a>
  <a href="todayFollowUps.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-pencil-square" aria-hidden="true"></i> &nbsp Approval</button>
    
  </a>
  <a href="admin_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button>
   </a>
    </div>