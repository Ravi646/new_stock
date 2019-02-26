<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Users List </h3>
			</div>
			<div class="box-body">
				<table id="user_list" class="table table-bordered">
					<thead>
						<tr>
						<th>#</th>
						<th>Name</th>
						<th>Unique Code</th>
						<th>Email Id</th>
						<th>Mobile Number</th>
						<th>No. Of Childs</th>
						<th>Total Earnings</th>
						<th>ADD Earning</th>
						<th>Edit Profile</th>
						<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $key => $user_value) {   ?>
							<tr>
							<td><?php echo $key + 1 ;?></td>
							<td><?php echo $user_value['customer_name']; ?>
						  	</td>
						    <td><?php echo $user_value['unique_code'];?></td>
                             <td><?php echo $user_value['customer_email'];?></td>
							<td><?php echo $user_value['customer_mobile']?></td>
							<td><?php echo $user_value['childs'] ?></td>
							<td><?php echo $user_value['total_earning'] ?></td>
							
				            <td><a data-customer_id="<?php echo base64_encode($user_value['customer_id'])?>" class="btn btn-default add_biller" data-toggle="modal" data-target="#submit_biller">Add Earning</a></td>
				            <td><a href="<?php echo base_url('edit-user/'.$user_value['customer_id']); ?>" class="btn btn-info">Edit Profile</a></td>
				            <td><button class="btn btn-danger delete_user" data-user_id="<?php echo base64_encode($user_value['customer_id']) ;?>">DELETE</button></td>
							</tr>
						<?php } ?>
					</tbody>
					<tfoot>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Unique Code</th>
						<th>Email Id</th>
						<th>Mobile Number</th>
						<th>No. Of Childs</th>
						<th>Total Earnings</th>
						<th>ADD Earning</th>
						<th>Edit Profile</th>
						<th>Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="submit_biller" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
     	<div class="form-group">
            <label for="form-create-account-first-name">Amount : <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="amount_paid" name="amount_paid" autocomplete="off">
            <input type="hidden" name="target_customer" id="trgt_cust" value="">
            </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="insert_biller btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>
<div class="modal fade" id="topup_done" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
     	</div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>
