<?php
require_once DIR_ROOT . "/config/global.cfg.php";
require_once DIR_ROOT . "/core/classes/mysqli.class.php";

$global = array( 
	'microtime' => microtime(), 
	'url' => explode( "/", @$_GET['url']), 
	'ip' => @$_SERVER['REMOTE_ADDR'], 
	'time' => time () + ( $config['tz'] * 3600 ),
	'user' => array( 'loged' => false )
);

if ($config['debug'] == "Y")
	@ini_set( "error_reporting", E_ALL );

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
	$result = $db->query("SELECT email,rights,nameone,nametwo,id,avatar FROM {$config['sql_prefix']}_users WHERE session = '{$_SESSION['session']}';");
	if ($db->numrows($result) == 1) {
		$global['user'] = $db->fetchrow($result);
		$global['user']['loged'] = true;
	} else {
		$global['user'] = array('loged' => false);
	}
} else {
	$global['user'] = array('loged' => false);
}
?>