<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
        	<div class="box-header with-border">
            <h3 class="box-title pull-left">Add User</h3>
            <a href="<?php echo base_url('user-list'); ?>" class="btn btn-success btn-flat pull-right">Users List</a>
            </div>
            <div class="box-body">
            	<div class="row">
            		<?php echo form_open(); ?>
            		<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            			<div class="form-group">
            				<label for="form-create-account-first-name">Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="customer_name" value="<?php echo set_value('customer_name') ?>">
                        <span class="text-danger"><?php echo form_error('customer_name')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">Email: </label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="customer_email" value="<?php echo set_value('customer_email') ?>">
                        <span class="text-danger"><?php echo form_error('customer_email')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">Mobile: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="customer_mobile" value="<?php echo set_value('customer_mobile') ?>">
                        <span class="text-danger"><?php echo form_error('customer_mobile')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">Referral Code: </label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="referral_code" value="<?php echo set_value('referral_code') ?>">
                        <span class="text-danger"><?php echo form_error('referral_code')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">Bank Account Number:</label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="account_no" value="<?php echo set_value('account_no') ?>">
                        <span class="text-danger"><?php echo form_error('account_no')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">IFSC Code:</label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="ifsc_code" value="<?php echo set_value('ifsc_code') ?>">
                        <span class="text-danger"><?php echo form_error('ifsc_code')?></span>
            			</div>
            			<div class="form-group">
            				<label for="form-create-account-first-name">Bank Name:</label>
                        <input type="text" class="form-control" id="form-create-account-first-name" name="bank_name" value="<?php echo set_value('bank_name') ?>">
                        <span class="text-danger"><?php echo form_error('bank_name')?></span>
            			</div>
                        <div class="box-footer">
                       <button class="btn btn-success btn-flat" type="submit">Submit</button>
                       </div>
                       <?php echo form_close(); ?>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
