<div class="row">
<div class="col-md-12 tabel-responsive">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Users List </h3>
			</div>
			<div class="box-body">
					<table class="table table-bordered">
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
						<tr>
							<td><?php echo $fetch_user_credit_details['customer_name'];?></td>
							<td><?php echo $fetch_user_credit_details['customer_mobile'];?></td>
							<td><?php echo $fetch_user_credit_details['unique_code'];?></td>
							<td><?php echo $fetch_user_credit_details['bank_name'];?></td>
							<td><?php echo $fetch_user_credit_details['ifsc_code'];?></td>
							<td><?php echo $fetch_user_credit_details['account_no'];?></td>
							<td><?php echo $fetch_user_credit_details['credit_date'];?></td>
							
						</tr>
						
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>