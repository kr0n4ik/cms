<?php
@session_start();
@ob_start();
@ob_implicit_flush(0);

//Отладка
@ini_set( "display_errors", true );
@ini_set( "html_errors", true );
@error_reporting ( E_ERROR  );
@ini_set( "error_reporting", E_ERROR );

define( "ROOT", true );
define( "DIR_ROOT", dirname( __FILE__ ) );

require_once DIR_ROOT . "/config/global.cfg.php";
require_once DIR_ROOT . "/core/classes/mysqli.class.php";

if ($config['debug'] == "Y")
	@ini_set( "error_reporting", E_ALL );

header( "Content-type: text/html; charset={$config['charset']}" );

$db = new db( $config['sql_server'], $config['sql_user'], $config['sql_password'], $config['sql_database'] );

$global = array( 
	'microtime' => microtime(), 
	'url' => explode( "/", @$_GET['url']), 
	'ip' => @$_SERVER['REMOTE_ADDR'], 
	'time' => time () + ( $config['tz'] * 3600 ),
	'user' => array( 'loged' => false )
);

if (@$_COOKIE['session'])
	$_SESSION['session'] = @$_COOKIE['session'];

if (preg_match("/^[a-z0-9]{32}$/i", $_SESSION['session'])) {
	$result = $db->query("SELECT email,rights,nameone,nametwo,id,avatar,balance FROM {$config['sql_prefix']}_users WHERE session = '{$_SESSION['session']}';");
	if ($db->numrows($result) == 1) {
		$global['user'] = $db->fetchrow($result);
		$global['user']['loged'] = true;
	} else {
		$global['user'] = array('loged' => false);
	}
} else {
	$global['user'] = array('loged' => false);
}

if ($global['url'][0] == "")
	$global['url'][0] = "profile";

if (preg_match( "/^[a-z]+$/iu", $global['url'][0]) && file_exists( DIR_ROOT . "/core/modules/" . $global['url'][0] . "/content.php" ) )
	include_once(DIR_ROOT . "/core/modules/" . $global['url'][0] . "/content.php");
else
	include_once(DIR_ROOT . "/core/modules/404/content.php");


$global['microtime'] = ( (float)microtime() - (float)$global['microtime'] );
echo "\n<!-- Time: {$global['microtime']} -->\n";
unset( $global );
?>