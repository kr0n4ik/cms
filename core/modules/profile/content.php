<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'])
	header( "Location: {$config['url_home']}index.php?url=login" );


$profile = new Template("profile.tpl");

if (isset($_POST['up'])) {
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['nametwo'] ) && !empty( $_POST['nametwo'] )  ) {
		$profile->assign("{nametwo_status}", "is-invalid");
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET nametwo='{$_POST['nametwo']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['nameone'] ) && !empty( $_POST['nameone'] )  ) {
		$profile->assign("{nameone_status}", "is-invalid");
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET nameone='{$_POST['nameone']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['namethree'] ) && !empty( $_POST['namethree'] )  ) {
		$profile->assign("{namethree_status}", "is-invalid");
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET namethree='{$_POST['namethree']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^7[0-9]{9,12}$/i", $_POST['phone'] ) && !empty( $_POST['phone'] ) ) {
		$profile->assign("{phone_status}", "is-invalid");
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET phone='{$_POST['phone']}' WHERE id={$global['user']['id']};" );
	}
}

$row = $db->fetchrow($db->query("SELECT email,nametwo,nameone,namethree,phone FROM {$config['sql_prefix']}_users WHERE id = {$global['user']['id']};"));

$profile->assign("{email}", $row['email']);
$profile->assign("{phone}", $row['phone']);
$profile->assign("{nameone}", $row['nameone']);
$profile->assign("{nametwo}", $row['nametwo']);
$profile->assign("{namethree}", $row['namethree']);
$profile->display();
?>
