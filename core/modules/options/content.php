<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] || $global['user']['rights'] != "admin")
	header( "Location: {$config['url_home']}" );

if( $_POST['up'] == "Y" ) {
	$find[] = "'\r'";
	$replace[] = "";
	$find[] = "'\n'";
	$replace[] = "";
	foreach ( $_POST['save'] as $name => $value ) {
		$value = trim( strip_tags( stripslashes( $value ) ) );
		$value = htmlspecialchars( $value, ENT_QUOTES);
		$value = preg_replace( $find, $replace, $value );
		$name = trim( strip_tags( stripslashes( $name ) ) );
		$name = htmlspecialchars( $name, ENT_QUOTES );
		$name = preg_replace( $find, $replace, $name );
		$value = str_replace( "$", "&#036;", $value );
		$value = str_replace( "{", "&#123;", $value );
		$value = str_replace( "}", "&#125;", $value );
		$name = str_replace( "$", "&#036;", $name );
		$name = str_replace( "{", "&#123;", $name );
		$name = str_replace( "}", "&#125;", $name );
		$config[$name] = $value;
	}
	$handler = fopen( DIR_ROOT . "/config/global.cfg.php", "w" );
	fwrite( $handler, "<?php \n\n\$config = array (\n\n" );
	foreach ( $config as $name => $value ) {
		fwrite( $handler, "'" . $name . "' => \"" . $value . "\",\n\n" );
	}
	fwrite( $handler, ");\n\n?>" );
	fclose( $handler );
	header( "Location: {$config['url_home']}index.php?url=options" );
	exit;
}

$options = new Template("options.tpl");
$options->assign("{url_home}", $config['url_home']);
$options->assign("{sql_server}", $config['sql_server']);
$options->assign("{sql_user}", $config['sql_user']);
$options->assign("{sql_password}", $config['sql_password']);
$options->assign("{sql_database}", $config['sql_database']);
$options->assign("{sql_prefix}", $config['sql_prefix']);
$options->assign("{tz}", $config['tz']);
$options->assign("{date}", date('d.m.Y, H:i', time() + $config['tz'] * 60 ) );
if ($config['debug'] == "Y") {
	$options->assign("{debug_y}", "checked" );
	$options->assign("{debug_n}", "" );
} else {
	$options->assign("{debug_n}", "checked" );
	$options->assign("{debug_y}", "" );
}
$options->display();
?>
