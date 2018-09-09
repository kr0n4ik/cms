<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] )
	header( "Location: {$config['url_home']}index.php?url=login" );

include_once(DIR_ROOT . "/core/modules/register/content.php");
?>
