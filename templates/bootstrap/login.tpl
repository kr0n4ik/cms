<!DOCTYPE html>
<!--[if IE 8]> <html lang="ru" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Вход</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{template}assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="{template}assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/style.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="{template}assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{template}assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url({template}assets/img/login-bg/login-bg-11.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Сайт</b> субсайт</h4>
                    <p>
                        Вход для пользователей.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b>Сайт</b> Сфат
                        <small>Основной шаблон</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
					{alert}
                    <form method="POST" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" name="email" class="form-control form-control-lg" placeholder="Email Address" required />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="remember_me_checkbox" value="Y" name="remember" />
							<label for="remember_me_checkbox">
								Запомнить меня
							</label>
						</div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg" name="up" value="Y">Войти</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Если вы не зарегистрированы нажмиет <a href="{link_register}" class="text-success">сюда</a> для регистрации.
                        </div>
                        <hr />
                        <p class="text-center text-grey-darker">
                            &copy; хххх 2018
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
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

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
