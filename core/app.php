<!DOCTYPE html>
<!--[if IE 8]> <html lang="<?php echo $config['lng']; ?>" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo $config['lng']; ?>">
<!--<![endif]-->
<head>
	<meta charset="<?php echo $config['charset']; ?>" />
	<title>Color Admin | Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/css/default/style.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo $config['url_home']; ?>assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo $config['url_home']; ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $config['url_home']; ?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo $config['url_home']; ?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
		<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li>
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label"><?php echo $db->numrows( $db->query( "SELECT id FROM {$config['sql_prefix']}_notification WHERE status='new' AND mid={$global['user']['id']};" )); ?></span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">ОПОВЕЩЕНИЯ (<?php echo $db->numrows( $db->query( "SELECT id FROM {$config['sql_prefix']}_notification WHERE status='new' AND mid={$global['user']['id']};" )); ?>)</li>
<?php
$result = $db->query( "SELECT * FROM {$config['sql_prefix']}_notification WHERE status='new' AND mid={$global['user']['id']} LIMIT 10;" );
while ( $row = $db->fetchrow( $result ) ) {
	echo "<li class=\"media\">
							<a href=\"javascript:;\">
								<div class=\"media-left\">
									<i class=\"fa fa-{icon} media-object bg-silver-darker\"></i>
								</div>
								<div class=\"media-body\">
									<h6 class=\"media-heading\">{description}</h6>
									<div class=\"text-muted f-s-11\">{time}</div>
								</div>
							</a>
						</li>";
}
?>
						<li class="dropdown-footer text-center">
							<a href="<?php echo $config['url_home']; ?>index.php?url=notification">Весь список</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo "{$config['url_home']}upload/avatar/{$global['user']['avatar']}"; ?>" alt="" /> 
						<span class="d-none d-md-inline"><?php echo $global['user']['nameone']; ?> <?php echo $global['user']['nametwo']; ?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo "{$config['url_home']}"?>index.php?url=profile" class="dropdown-item">Профиль</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right"><?php echo $global['user']['balance']; ?></span> Баланс</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo "{$config['url_home']}"?>index.php?url=logout" class="dropdown-item">Выход</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="<?php echo "{$config['url_home']}upload/avatar/{$global['user']['avatar']}"; ?>" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?php echo $global['user']['nameone']; ?> <?php echo $global['user']['nametwo']; ?>
								<small>Front end developer</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                            <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Навигация</li>
					<li><a href="<?php echo "{$config['url_home']}"?>index.php?url=profile"><i class="fa fa-calendar"></i> <span>Профиль</span></a></li>
					<li><a href="<?php echo "{$config['url_home']}"?>index.php?url=market"><i class="fa fa-calendar"></i> <span>Услуги</span></a></li>
<?php
	if ($global['user']['rights'] == "admin") {
?>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Администрирование</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="<?php echo "{$config['url_home']}"?>index.php?url=options">Настройки</a></li>
						    <li><a href="<?php echo "{$config['url_home']}"?>index.php?url=users">Пользователи</a></li>
							<li><a href="<?php echo "{$config['url_home']}"?>index.php?url=backup">Резерные копии</a></li>
						</ul>
					</li>
<?php
	}
	if ($global['user']['rights'] == "partner") {
?>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Партнерстов</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="<?php echo "{$config['url_home']}"?>children">Ваши клиенты</a></li>
						</ul>
					</li>
<?php
	}
?>
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		<?php 
		if (preg_match( "/^[a-z]+$/iu", $global['url'][0]) && file_exists( DIR_ROOT . "/core/modules/" . $global['url'][0] . "/content.php" ) )
			include_once(DIR_ROOT . "/core/modules/" . $global['url'][0] . "/content.php");
			echo $template['content'];
		?>
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo $config['url_home']; ?>assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo $config['url_home']; ?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo $config['url_home']; ?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo $config['url_home']; ?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo $config['url_home']; ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/js/theme/default.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo $config['url_home']; ?>assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/js/demo/dashboard.min.js"></script>
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo $config['url_home']; ?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo $config['url_home']; ?>assets/js/demo/table-manage-default.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
			TableManageDefault.init();
		});
	</script>
</body>
</html>