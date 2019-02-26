<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/common/') ?>css/bootstrap.min.css">
  <!-- Bootstrap Switch Starts -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- Bootstrap Switch Ends -->
  <!-- Select2 Css Starts -->
  <link rel="stylesheet" href="<?php echo base_url('assets/common/css/') ?>select2.min.css">
  <!-- Select2 Css Ends -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/common/') ?>css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/common/') ?>css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/') ?>plugins/iCheck/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/') ?>css/AdminLTE.min.css">
 <link rel="stylesheet" href="<?php echo base_url('assets/common/css/jquery-ui.min.css') ?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/common/css/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/common/css/bootstrap2-toggle.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/') ?>css/skins/_all-skins.min.css">
  <!-- Bootstrap Data Table -->
  <link rel="stylesheet" href="<?php echo base_url('assets/common/css/'); ?>dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/css/brain.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/css/frontend/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/superuser/css/bootstrap-tagsinput.css'); ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/frontend/img/fav_icon.png"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" data-base_url="<?php echo base_url(); ?>">
  <?php 
    $userdata = $this->session->userdata('userdata');

  ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
            <a href="<?php echo base_url('user-dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $userdata['fname']; ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $userdata['fname']; ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu Starts -->
      <div class="navbar-custom-menu">
          <!--  <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url();?>" target="_blank">Home</a></li>
          </ul> -->

        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php $topup_count = count($topup_alert);
               echo $topup_count ; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $topup_count; ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($topup_alert as $topup_key => $topup_value ) { ?>
                  <li>
                    <a href="<?php echo base_url('particular-transact/'.$topup_value['customer_id']) ;?>"><i class="fa fa-warning text-yellow"></i>&#x20B9 <?php echo $topup_value['topup_amount'].' Needs to be credit to '.$topup_value['customer_name'] ; ?>
                    </a>
                  </li>
                <?php } ?>
                 </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('allcurrent-transact')?>">View all</a></li>
            </ul>
          </li>
         <li class="active"><a href="<?php echo base_url('user-logout');?>" target="_blank">Logout</a></li>
        </ul>
      </div>
      <!-- Navbar Right Menu Ends -->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li><a href="<?php echo base_url('user-dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <?php for ($j=0; $j <count($panel_menus) ; $j++) { ?>
        <li class="<?php echo(count($panel_menus[$j]['sub_menus']) > 0)?'treeview':''; ?>">
            <a href="<?php echo base_url($panel_menus[$j]['page_url']); ?>"><?php echo '<i class="'.$panel_menus[$j]['font_awesome_icon'].'"></i> '.$panel_menus[$j]['menu_name']; ?> 
              <?php if (count($panel_menus[$j]['sub_menus']) > 0) { ?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              <?php } ?>
            </a>
                <?php if (count($panel_menus[$j]['sub_menus']) > 0) { ?>
                    <ul class="treeview-menu">
                        <?php sub_menus($panel_menus[$j]['menu_id'],$panel_menus[$j]['sub_menus']); ?>
                    </ul>
                <?php } ?>
        </li>
        <?php } ?>

        <?php 
        function sub_menus($main_menu,$sub_menus,$mega_menu = 0){
          $dropdown_class = '';
          $sub_menus_html = '';

          for ($k=0; $k <count($sub_menus) ; $k++) { 
            $dropdown_class = (count($sub_menus[$k]['sub_menus']) > 0)?'treeview':'';
            echo '<li class="'.$dropdown_class.'">';
            echo '<a href="'.base_url($sub_menus[$k]['page_url']).'"><i class="fa fa-circle-o"></i> '.$sub_menus[$k]['menu_name'];

            if (count($sub_menus[$k]['sub_menus']) > 0) {
              echo '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
            }

            echo '</a>';

            if (count($sub_menus[$k]['sub_menus']) > 0) {
              echo '<ul class="treeview-menu">';
                sub_menus($main_menu,$sub_menus[$k]['sub_menus']);
              echo '</ul>';
            }
            echo '</li>';
          }                    
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('superuserResponse')){
        $response = $this->session->flashdata('superuserResponse');
        $class = $response['class'];
        $msg = $response['msg'];
      ?>
      <div class="panel <?php echo $class; ?>">
        <div class="panel-heading"><?php echo $msg; ?></div>
      </div>
      <?php } ?>
      <?php $this->load->view($view); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="<?php echo base_url() ?>"><?php echo $userdata['fname']; ?></a></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/common/') ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/common/js/jquery.validate.min.js.download');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/common/') ?>js/bootstrap.min.js"></script>
<!-- Bootsrap Switch Starts -->
<script src="<?php echo base_url('assets/common/js/bootstrap2-toggle.min.js')?>"></script>

<!-- Select2 Js Starts -->
<script type="text/javascript" src="<?php echo base_url('assets/common/js/'); ?>select2.full.min.js"></script>
<!-- Select2 Js Ends -->

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/superuser/') ?>plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/superuser/') ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/superuser/') ?>js/demo.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/common/plugins/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/common/js/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/common/js/daterangepicker.js'); ?>"></script>
<!-- Data table Js -->
<script type="text/javascript" src="<?php echo base_url('assets/common/js/'); ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/common/js/'); ?>dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/superuser/js/'); ?>bootstrap-tagsinput.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url('assets/real_estate/js/'); ?>property.js"></script> -->
<!-- Custom Javascript Above common JS Starts -->
<?php if(isset($add_sup_cust_js)){
  if(is_array($add_sup_cust_js)) {
    for ($i=0; $i <count($add_sup_cust_js) ; $i++) { 
?>
  <script src="<?php echo $add_sup_cust_js[$i]; ?>"></script>
<?php 
  } 
}
else { 
?>
  <script src="<?php echo $add_sup_cust_js; ?>"></script>
<?php 
    }
  } 
?>
<!-- Custom Javascript Above common JS Ends -->

<!-- Common Js Starts -->
<!-- <script src="<?php echo base_url('assets/common/js/common.js'); ?>"></script>
 --><!-- Common Js Ends -->

<!-- Custom Javascript Below common JS Starts -->
<?php if(isset($add_bel_cust_js)){
  if(is_array($add_bel_cust_js)) {
    for ($i=0; $i <count($add_bel_cust_js) ; $i++) { 
?>
  <script src="<?php echo $add_bel_cust_js[$i]; ?>"></script>
<?php 
  } 
}
else { 
?>
  <script src="<?php echo $add_bel_cust_js; ?>"></script>
<?php 
    }
  } 
?>
<!-- Custom Javascript Below common JS Ends -->
</body>
</html>
