<div class="row">
<div class="col-md-12 tabel-responsive">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Users List </h3>
			</div>
			<div class="box-body">
					<table class="table table-bordered" id="
					allcurrent_transact">
						<thead>
							<tr>
							<td>Name</td>
							<td>Mobile No.</td>
							<td>Referral Code</td>
							<td>BANK NAME</td>
							<td>IFSC Code</td>
							<td>Bank account Number</td>
							<td>DATE</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($allcurrent_transact as $key => $allcurrent_value) { ?>
								<tr>
							<td><?php echo $allcurrent_value['customer_name'];?></td>
							<td><?php echo $allcurrent_value['customer_mobile'];?></td>
							<td><?php echo $allcurrent_value['unique_code'];?></td>
							<td><?php echo $allcurrent_value['bank_name'];?></td>
							<td><?php echo $allcurrent_value['ifsc_code'];?></td>
							<td><?php echo $allcurrent_value['account_no'];?></td>
							<td><?php echo $allcurrent_value['credit_date'];?></td>
							
						</tr>
						<?php	} ?>
						</tbody>
						<tfoot>
							<tr>
							<td>Name</td>
							<td>Mobile No.</td>
							<td>Referral Code</td>
							<td>BANK NAME</td>
							<td>IFSC Code</td>
							<td>Bank account Number</td>
							<td>DATE</td>
							</tr>
						</tfoot>
							</table>
			</div>
		</div>
	</div>
</div>
