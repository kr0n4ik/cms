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
	global $alert, $db, $config;
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
		if ( $db->numrows( $db->query("SELECT code FROM {$config['sql_prefix']}_users WHERE code='{$code}' AND rights='partner';" ) ) != 0 )
			$parent = $code;
	
	$password = trim( $_POST['passwordone'] );
	$password = md5( $password . md5( $password ) . $config['salt'] . "\n" );
	$time = $global['time'] + ( $config['time_session'] * 60 * 60 );
	$hash = md5( time() . $password . rand( 0, 999 ) . $global['ip'] );
	$_SESSION['session'] = $hash;
	
	if ( $db->query( "INSERT INTO {$config['sql_prefix']}_users SET password='{$password}', email='{$email}', session='{$session}', parent='{$parent}';" ) )
		header("Location: {$config['url_home']}");
}


if ( isset($_POST['up']) ) 
	goReg();

$content = new Template("register.tpl");
$content->assign("{alert}", $alert);
$content->assign("{link_login}", $config['url_home'] . "index.php?url=login");
$content->display();
?>
