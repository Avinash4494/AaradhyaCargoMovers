<div class="traceShipment">
	<h4 style="color: white;text-align: center;font-size: 2em;letter-spacing: 2px;">Track your shipment</h4>
	<div class="well">
		<form action="trackCourier.php" method="post">
			<div class="row">
				<div class="col-lg-12">
					<p style="text-align: center;font-size: 0.9em;">Search by Docket Number or Invoice Number eg. 0XX</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<input type="text" class="form-control" id="word"  name="dock_number"  autocomplete="off" placeholder="Search by Docket Number or Invoice Number"  required>
					</div>
					<button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
				</div>
				<style>
					.actionButtonIcons{
						background-color: red;
					}
				</style>
			</div>
		</form>
	</div>
</div>