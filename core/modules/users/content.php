<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] || $global['user']['rights'] != "admin")
	header( "Location: {$config['url_home']}" );

$rights = array('admin' => "Администратор", 'moderator' => "Модератор", 'partner' => "Партнер", 'user' => "Обычный пользователь");
$users = new Template("users.tpl");
$i = 1;
$result = $db->query( "SELECT * FROM {$config['sql_prefix']}_users;" );
while ( $row = $db->fetchrow( $result ) ) {
	$users->assign("{tbody}", "<tr class=\"even gradeX\">
	<td class=\"f-s-600 text-inverse\">{$i}</td>
	<td class=\"with-img\"><img src=\"../assets/img/user/user-2.jpg\" class=\"img-rounded height-30\" /></td>
	<td>{$row['email']}</td>
	<td>{$row['nametwo']}</td>
	<td>{$row['nameone']}</td>
	<td>" . $rights[$row['rights']] . "</td>
	<td></td>
	</tr>");
	$i++;
}
$users->display();
?>
