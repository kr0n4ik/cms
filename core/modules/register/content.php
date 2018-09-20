<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}
	
if ( $global['user']['loged'] )
	header( "Location: {$config['url_home']}index.php" );

$alert = "";

function goReg(){
	global $alert, $db, $config, $global;
	$parent = "";
	$email = strtolower( trim( $_POST['email'] ) );
	
	if ( !preg_match( "/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email ) ) {
		$alert = "<div class=\"alert alert-danger\">Неверный формат почтового ящика, проверьте правильности ввода.</div>";
		return false;
	}
	
	if ( $db->numrows( $db->query("SELECT id FROM {$config['sql_prefix']}_users WHERE email='{$email}';" ) ) != 0 ) {
		$alert = "<div class=\"alert alert-danger\">Пользователь с логином {$_POST['email']} уже зарегистрирован.</div>";
		return false;
	}
	
	if ( strlen( trim( $_POST['passwordone'] ) ) < 6 ) {
		$alert = "<div class=\"alert alert-danger\">Пароль должен быть не менее 6 знаков.</div>";
		return false;
	}
	
	if ( trim( $_POST['passwordone'] ) != trim( $_POST['passwordtwo'] )) {
		$alert = "<div class=\"alert alert-danger\">Пароли должны совпадать, повторите ввод.</div>";
		return false;
	}
	
	if ( !isset( $_POST['agry'] ) ) {
		$alert = "<div class=\"alert alert-danger\">Вы должны согласиться с <a target=\"_blank\" href=\"{$config['url_home']}rules.html\">правилами сервиса.</a></div>";
		return false;
	}
	
	$code = strtolower( trim( $global['url'][1] ) );
	if ( preg_match( "/^[a-z0-9]+$/iu", $code )  )
		$row = $db->fetchrow( $db->query("SELECT id FROM {$config['sql_prefix']}_users WHERE code='{$code}' AND rights='partner';" ) );
	
	$parent = ($row['id']) ? $row['id'] : 0;
	$password = trim( $_POST['passwordone'] );
	$password = md5( $password . md5( $password ) . $config['salt'] . "\n" );
	$time = $global['time'] + ( $config['time_session'] * 60 * 60 );
	$hash = md5( time() . $password . rand( 0, 999 ) . $global['ip'] );
	$_SESSION['session'] = $hash;
	
	
	if ( $db->query( "INSERT INTO {$config['sql_prefix']}_users SET password='{$password}', email='{$email}', session='{$hash}', parent={$parent};" ) ) {
		//$id = $db->insertid();
		//$db->query( "INSERT INTO {$config['sql_prefix']}_notification SET time='{$global['time']}', type='add', status='new', uid={$id};" );
		header("Location: {$config['url_home']}");
	}
}


if ( isset($_POST['up']) ) 
	goReg();

echo <<<HTML
<!DOCTYPE html>
<!--[if IE 8]> <html lang="{$config['lng']}" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{$config['lng']}">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Регистрация</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />-->
	<link href="{$config['url_home']}assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/style.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{$config['url_home']}assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url({$config['url_home']}assets/img/login-bg/login-bg-9.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Color</b> Admin App</h4>
                    <p>
                        As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Регистрация
                    <small>Создайте свою учетную запись</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
					{$alert}
                    <form method="POST" class="margin-bottom-0">
                        <label class="control-label">E-mail <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" required />
                            </div>
                        </div>
                        <label class="control-label">Пароль <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" name="passwordone" class="form-control" placeholder="Пароль" required />
                            </div>
                        </div>
                        <label class="control-label">Повторите пароль <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" name="passwordtwo" class="form-control" placeholder="Повторите пароль" required />
                            </div>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                        	<div class="checkbox checkbox-css m-b-30">
								<input type="checkbox" id="agreement_checkbox" value="" name="agry" value="Y">
								<label for="agreement_checkbox">
									Я прочитал(а) и полностью принимаю <a target="_blank" href="#">правила сервиса.</a>
								</label>
							</div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg" name="up" value="Y">Регистрация</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Вы зарегистрованы? Нажмите <a href="{$config['url_home']}index.php?url=login">здесь</a>, чтобы войти.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; Color Admin All Right Reserved 2018
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{$config['url_home']}assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="{$config['url_home']}assets/crossbrowserjs/html5shiv.js"></script>
		<script src="{$config['url_home']}assets/crossbrowserjs/respond.min.js"></script>
		<script src="{$config['url_home']}assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{$config['url_home']}assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="{$config['url_home']}assets/js/theme/default.min.js"></script>
	<script src="{$config['url_home']}assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
HTML;
?>
