<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Timeline</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="{template}assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/style.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
		<link href="{template}assets/plugins/isotope/isotope.css" rel="stylesheet" />
		<link href="{template}assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
		<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{template}assets/plugins/pace/pace.min.js"></script>
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
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-11">3 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="{template}assets/img/user/{avatar}" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">{nameone} {nametwo}</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">25 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="{template}assets/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">35 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-11">2 hour ago</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{template}assets/img/user/{avatar}" alt="" /> 
						<span class="d-none d-md-inline">{nameone} {nametwo}</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{url}index.php?url=profile" class="dropdown-item">Профиль</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="{url}index.php?url=logout" class="dropdown-item">Выход</a>
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
								<img src="{template}assets/img/user/{avatar}" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								{nameone} {nametwo}
								<small>{rights}</small>
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
					{menu}
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
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<div class="panel-body">
				<form method="POST">
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Домашняя страница сайта</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="http://test.com/" name="save[url_home]" value="{url_home}" />
							<small class="f-s-12 text-grey-darker">Укажите имя основного домена на котором располагается ваш сайт. Например: http://yoursite.com/ Внимание, наличие слеша на конце в имени домена обязательно.</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя сервера базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="localhost" name="save[sql_server]" value="{sql_server}" />
							<small class="f-s-12 text-grey-darker">Обычно это "localhost".</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя пользователя базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="root" name="save[sql_user]" value="{sql_user}" />
							<small class="f-s-12 text-grey-darker">Обычно это "root".</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Пароль пользователя базы данных</label>
						<div class="col-md-9">
							<input type="password" class="form-control m-b-5" placeholder="password" name="save[sql_password]" value="{sql_password}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="database" name="save[sql_database]" value="{sql_database}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Префикс таблиц</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="prefix" name="save[sql_prefix]" value="{sql_prefix}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Коррекция временных зон</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="60" name="save[tz]" value="{tz}" />
							<small class="f-s-12 text-grey-darker">в минутах; т.е.: 180=+3 часа; -120=-2 часа. Текущее время сервера с учетом коррекции: {date}</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Включить отладку</label>
                        <div class="col-md-9">
                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="save[debug]" id="inlineCssRadio1" value="Y" {debug_y} />
								<label for="inlineCssRadio1">Да</label>
							</div>
                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="save[debug]" id="inlineCssRadio2" value="N" {debug_n} />
                                <label for="inlineCssRadio2">Нет</label>
                            </div>
                        </div>
                    </div>
					<button type="sybmit" class="btn btn-primary float-right" name="up" value="Y">Сохарнить</button>
				</form>
			</div>
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{template}assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="{template}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="{template}assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="{template}assets/crossbrowserjs/html5shiv.js"></script>
		<script src="{template}assets/crossbrowserjs/respond.min.js"></script>
		<script src="{template}assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{template}assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{template}assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="{template}assets/js/theme/default.min.js"></script>
	<script src="{template}assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{template}assets/plugins/isotope/jquery.isotope.min.js"></script>
  	<script src="{template}assets/plugins/lightbox/js/lightbox.min.js"></script>
	<script src="{template}assets/js/demo/gallery.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			Gallery.init();
		});
	</script>
</body>
</html>
