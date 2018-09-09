<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( $global['user']['loged'] )
	header( "Location: {$config['url_home']}index.php" );


$alert = "";

function goLogin(){
	global $alert, $db, $sql, $config;
	
	$email = strtolower( trim( $_POST['email'] ) );
	
	if ( !preg_match( "/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email ) ) {
		$alert = "<div class=\"alert alert-danger\">Неверный формат почтового ящика, проверьте правильности ввода.</div>";
		return false;
	}
	
	$row = $db->fetchrow( $db->query( "SELECT password FROM {$sql['prefix']}_users WHERE email='{$email}';" ) );
	if (!$row) {
		$alert = "<div class=\"alert alert-danger\">Пользователь с логином {$_POST['email']} не зарегистрирован.</div>";
		return false;
	}
	
	$password = trim( $_POST['password'] );
	$password = md5( $password . md5( $email ) . $config['salt'] . "\n" );

	if ($row['password'] !=  $password) {
		$alert = "<div class=\"alert alert-danger\">Неверный пароль.</div>";
		return false;
	}
	
	$session = md5( time() . $password . rand( 0, 999 ) . $global['ip'] );
	$_SESSION['session'] = $session;
	$db->query("UPDATE {$sql['prefix']}_users SET session='{$session}' WHERE email='{$email}';");
	
	if ( isset( $_POST['remember'] ) )
		setcookie( "session", $session, $global['time'] + ( $config['time_session'] * 60 * 60 ) );
	
	header("Location: {$config['url_home']}");
}

if (isset($_POST['up'])) 
	goLogin();


$content = new Template("login.tpl");
$content->assign("{alert}", $alert);
$content->assign("{link_register}", $config['url_home'] . "index.php?url=register");
$content->display();
?>
