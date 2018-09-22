<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}
	
if ( $global['user']['loged'] )
	header( "Location: {$config['url_home']}" );

$alert = "";

function goReg(){
	global $alert, $db, $config, $global;
	$parent = "";
	$email = strtolower( trim( $_POST['email'] ) );
	
	if ( !preg_match( "/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email ) ) {
		$alert = '<div class="alert alert-danger">Неверный формат почтового ящика, проверьте правильности ввода.</div>';
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
<html lang="{$config['lng']}">
<head>
	<meta charset="utf-8">
	<title>{$config['title']} - Регистрация</title>
	<link rel="stylesheet" href="{$config['url_home']}varell/css/bootstrap.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/font-awesome.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/typicons.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/varello-theme.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/varello-skins.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/animate.min.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/icheck-all-skins.css">
	<link rel="stylesheet" href="{$config['url_home']}varell/css/icheck-skins/flat/_all.css">
	<link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300' rel='stylesheet' type='text/css'>    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">        
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
	<div class="notifications top-right"></div>
	<div class="wrapper">
		<div class="page-wrapper">
			<div id="login-hidden" style="display: none;">
				<div class="log-in-wrapper">
					{$alert}
					<h1 class="log-in-title">Регистрация<br><small>Создайте учетную запись, чтобы получить доступ</small></h1>
					<form method="POST">
					  <div class="form-group">
						<input type="email" class="form-control input-lg" name="email" id="email" placeholder="Ваш e-mail">
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control input-lg" name="passwordone" id="passwordone" placeholder="Пароль (минимум 6 символов)"> 
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control input-lg" name="passwordtwo" id="passwordtwo" placeholder="Повторить пароль"> 
					  </div>
					  <div class="form-group">
						<input type="checkbox" name="agry" value="Y" id="terms_and_conditions" data-icheck>
						<label for="terms_and_conditions" class="icheck-label">
						  Я согласен с <a href="{$config['url_home']}rules.html">условиями.</a>
						</label>
					  </div>
					   <button type="submit" class="btn btn-transparent btn-lg btn-transparent-primary btn-block" name="up" value="Y">Регистрация</button>
					  <ul class="login-bottom-links">
						  <li><a href="{$config['url_home']}login">У Вас еть аккаунт?</a></li>
					  </ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="{$config['url_home']}varell/js/Chart.min.js"></script>
	<script src="{$config['url_home']}varell/js/jquery-1.12.3.min.js"></script>
	<script src="{$config['url_home']}varell/js/bootstrap.min.js"></script>
	<script src="{$config['url_home']}varell/js/jquery.piety.min.js"></script>
	<script src="{$config['url_home']}varell/js/varello-theme.js"></script>
	<script src="{$config['url_home']}varell/js/icheck.min.js"></script>
	<script src="{$config['url_home']}varell/js/dropdown.js"></script>    
</body>
</html>
HTML;
?>
