<?php //$cacheVer = $this->config->item('cache_version');
$cacheVer = 1.1;
 ?> 
<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title . ' - ' : ''; ?>Admin</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-date-picker.css?v='.$cacheVer)?>">
 <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/chosen.css?v='.$cacheVer)?>">
  <link href="<?=base_url('assets/css/bootstrap.min.css?v='.$cacheVer)?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/select2.css?v='.$cacheVer)?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/vex-theme-os.css?v='.$cacheVer)?>" rel="stylesheet">
 <link href="<?=base_url('assets/css/print.css?v='.$cacheVer)?>" rel="stylesheet">
<?php 
if(isset($css_files)){
    foreach($css_files as $file): ?>
    	<link type="text/css" rel="stylesheet" href="<?=$file.'?v='.$cacheVer?>" />
    <?php endforeach; 
 }
?>
 <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
 <link href="<?=base_url('assets/css/sb-admin.css')?>" rel="stylesheet">
 <link href="<?=base_url('assets/css/app-style.css')?>" rel="stylesheet">
 

<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
.form-control {
  height: 29px;
}

.cancel-reason.form-control {
  height: auto !important;
}
</style>
</head>
<body>
	 <div id="wrapper">
     
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             <?php if($this->tank_auth->is_logged_in()): ?>
              <a class="navbar-brand" href="#"><strong><?=strtoupper($this->tank_auth->get_username())?></strong></a>
            <?php endif; ?>
            </div>
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
            <?php if($this->tank_auth->is_logged_in()): ?>
              <li>
                <a href="<?=site_url('/auth/logout')?>"><i class="fa fa-fw fa-power-off"></i>Logout</a>
              </li>
            <?php endif; ?>
         

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php
                 if(user_role() == 'SUPER_ADMIN')
                    $this->load->view('admin/partials/menu-super-admin');
                  else if(user_role() == 'STUDENT')
                    $this->load->view('admin/partials/menu-student');
                  else if(user_role() == 'TEACHER')
                    $this->load->view('admin/partials/menu-teacher');
                  else if(user_role() == 'PARENT')
                    $this->load->view('admin/partials/menu-parent');     

                ?>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
              <?php $this->load->view('common/messages'); ?>                                 
