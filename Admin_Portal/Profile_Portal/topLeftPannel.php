<style>
	.leftPannel
	{
		margin-top: 8px;
	}
</style>
<div class="leftPannel">
              <div class="empty-left-comTop"></div>
              <div class="left-compTop">
                <a href="index.php"><button class="actionButtonIcons" type="submit">Home</button>
                <div class="actionBox"></div></a>
               <a href="update_photo.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                <button class="actionButtonIcons"><i class="fa fa-pencil-square-o"></i> &nbsp Change Photo
                </button>
                <div class="actionBox"></div>
              </a>
                 <a href="addProfile.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" ><button class="actionButtonIcons" type="submit"><i class="fa fa-pencil-square-o"></i> &nbsp Update Profile</button>
                 <div class="actionBox"></div></a>

                <a href="Forgot Password.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" ><button class="actionButtonIcons" type="submit"><i class="fa fa-pencil-square-o"></i> &nbsp Update Password</button>
                <div class="actionBox"></div></a>
                <a href="update_contact.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" ><button class="actionButtonIcons" type="submit"><i class="fa fa-pencil-square-o"></i> &nbsp Update Contact</button>
                <div class="actionBox"></div></a>
                <a href="update_email.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" ><button class="actionButtonIcons" type="submit"><i class="fa fa-pencil-square-o"></i> &nbsp Update Email</button>
                <div class="actionBox"></div></a>
              </div>
            </div>