<?php
 
if($_SESSION["username"]){
}
else {
header("location: AdminDashboard.php");
}
?>
<?php
include_once 'db.php';
$username = $_SESSION['username'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='$username'");
$row = mysqli_fetch_assoc($query)
?>
 <nav class="navbar navbar-default navbar-fixed">
<div class="navbar-header" >
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:;">
  <span class="icon-bar" style="background-color: red"></span>
  <span class="icon-bar" style="background-color: red"></span>
  <span class="icon-bar" style="background-color: red"></span>
  </button>
  <a class="navbar-brand" href="../AdminDashboard.php" ><span><img class="navbarLogo" src="../../image/aa logo.jpg" ></span></a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
  <ul class="nav navbar-nav navbar-right" style="margin-top: 10px;">    
    <li><a href="../Courier_Portal/index.php">Courier</a></li>
    <li><a href="../Courier_Portal/quoterequest.php">Quote Request</a></li>
    <li><a href="../Courier_Portal/feedback.php">Feedback</a></li>
    <li><a href="../Courier_Portal/blogs.php">Blog</a></li>
    <li><a href="../Courier_Portal/careers.php">Careers</a></li>
    <li class="nameString"><a href=""><span id="nameStringOther"></span></a></li>
    <li class="hidden-xs"><div class="dropdown dropleft float-right">
      <div class="profileDrop" data-toggle="dropdown">
        <a href=""><i class="fa fa-cogs"></i></a>
        <a href=""></a>
      </div>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout.php">
        <?php echo $row["Fullname"]; ?></a><br>
         <a class="dropdown-item" href="../logout.php">
        <i class="fa fa-power-off"></i> &nbsp LogOut</a>
      </div>
    </div>
  </li>
  <li class="hidden-lg">
    <a href="../logout.php"><i class="fa fa-cogs"></i> LogOut</a>
  </li>
</ul>
</div>
</nav>
<section id="sectionHidden"></section>
 <script type="text/javascript">
   var str = '<?php echo $row["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameStringOther").innerHTML=acronym;
 </script>

 