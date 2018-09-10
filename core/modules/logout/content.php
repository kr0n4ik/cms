<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] )
	header( "Location: {$config['url_home']}index.php?url=login" );

$db->query("UPDATE {$config['sql_prefix']}_users SET session='none' WHERE id={$global['user']['id']};");
unset( $_SESSION['session'] );
setcookie( "session", "", "60");
header("Location: {$config['url_home']}");
?>
