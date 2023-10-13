<?php
$bank_account_num = $row['bank_account_num'];
$bank_name = $row['bank_name'];
$bank_code = $row['bank_code'];
$bank_city = $row['bank_city'];
$bank_country = $row['bank_country'];
$bank_ifsc_code = $row['bank_ifsc_code'];
$bank_type = $row['bank_type'];
$bank_confirm = $row['bank_confirm'];
$bank_joint_confirm = $row['bank_joint_confirm'];
if ($bank_account_num==''|| $bank_name==''||$bank_code==''||$bank_city==''||$bank_country==''||$bank_ifsc_code==''||$bank_type==''||$bank_confirm==''||$bank_joint_confirm=='')
{
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="profileDisplayComponent">
        <div class="well">
          <div class="row">
            <div class="col-lg-10">
              <div class="nullAddress" style="text-align:
                center">
                <p>Bank details are not yet updated. Please click on "Edit" to Update </p>
              </div>
            </div>
            <div class="col-lg-2">
              <a href="update_bank.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                <button class="actionButtonProfile-center">Edit &nbsp
                <i class="fa fa-pencil"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
else {
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="profileDisplayComponent">
        <div class="well">
          <h5>Bank Details</h5>
          <div class="profileData">
            <div class="row">
              <p hidden=""><?php echo $row['id'] ?></p>
              <div class="col-lg-5 col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-xs-6">
                    <h6><b>Bank Account Type :</b></h6>
                    <h6><b>Name as per records : </b></h6>
                    <h6><b>Bank Name : </b></h6>
                    <h6><b>City : </b></h6>
                    <h6><b>Country : </b></h6>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <h6>Salary</h6>
                    <h6><?php echo $row['Fullname'] ?></h6>
                    <h6><?php echo $row['bank_name'] ?></h6>
                    <h6><?php echo $row['bank_city'] ?></h6>
                    <h6><?php echo $row['bank_country'] ?></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-xs-6">
                    <h6><b>Name as bank records : </b></h6>
                    <h6><b>Bank Code : </b></h6>
                    <h6><b>IFSC Code : </b></h6>
                    <h6><b>Account Number : </b></h6>
                    <h6><b>Bank Type : </b></h6>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <h6><?php echo $row['record_name'] ?></h6>
                    <h6><?php echo $row['bank_code'] ?></h6>
                    <h6><?php echo $row['bank_ifsc_code'] ?></h6>
                    <h6><?php echo $row['bank_account_num'] ?></h6>
                    <h6><?php echo $row['bank_type'] ?></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-2">
                <a href="update_bank.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                  <button class="actionButtonProfile-center">Edit &nbsp
                  <i class="fa fa-pencil"></i>
                  </button>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10">
                <h6><b>Please confirm wheather the account number belongs to you</b></h6>
                <h6><b>Please confirm wheather this is a joint account</b></h6>
              </div>
              <div class="col-lg-2">
                <h6><?php echo $row['bank_confirm'] ?></h6>
                <h6><?php echo $row['bank_joint_confirm'] ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>