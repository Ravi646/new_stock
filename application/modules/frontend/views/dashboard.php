<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <a href="<?php echo base_url('add-user'); ?>" class="btn btn-success btn-flat pull-right">Add Customer</a>
          </div>
        </div>
</div>
</div>
<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('user-list')?>">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Customers</span>
              <span class="info-box-number"><?php echo $num_customer ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
      </div>
