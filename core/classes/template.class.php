<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

class Template {
	var $name;
	var $data = array();
	//var $rights = array('admin'=>"Администратор", 'user'=>"Клиент");
	
	function __construct($name) {
		global $global, $db, $config;
		//if ($name == "page.tpl") {
			//$this->assign("{notification}", $db->numrows( $db->query( "SELECT id FROM {$config['sql_prefix']}_notification WHERE status='new';" ) ) );
			
		//}
		
		//$this->assign("{home}",  $config['url_home'] );
		
		$this->name = "templates/bootstrap/" . $name;
		//$this->assign("{menu}", "<li><a href=\"{$config['url_home']}index.php?url=market\"><i class=\"fa fa-calendar\"></i> <span>Магазин</span></a></li>");
		//$this->assign("{menu}", "<li><a href=\"{$config['url_home']}index.php?url=ticket\"><i class=\"fa fa-calendar\"></i> <span>Тех. поддержка</span></a></li>");
		//if ( $global['user']['rights'] == "admin" ) {
			//$this->assign("{menu}", "<li><a href=\"{$config['url_home']}index.php?url=options\"><i class=\"fa fa-calendar\"></i> <span>Настройки</span></a></li>");
			//$this->assign("{menu}", "<li><a href=\"{$config['url_home']}index.php?url=users\"><i class=\"fa fa-calendar\"></i> <span>Пользователи</span></a></li>");
		//}
	}
	
	public function assign($keys, $vals) {
		if( is_array( $vals ) ) {
			if( count( $vals ) ) {
				foreach ( $vals as $key => $val ) {
					$this->assign( $key, $val );
				}
			}
			return;
		}
		
		if ($this->data[$keys])
			$this->data[$keys] .= $vals;
		else
			$this->data[$keys] = $vals;
	}
	
	public function parse() {
		global $config, $global;
		$html = file_get_contents( $this->name);
		
		foreach ( $this->data as $key => $val ) {
			$find[] = $key;
			$replace[] = $val;
		}
		
		$html = str_ireplace( $find, $replace, $html );
		
		//$html = str_ireplace( "{url}", $config['url_home'], $html);
		//$html = str_ireplace( "{template}", $config['url_home'] . "templates/bootstrap/", $html );
		//$html = str_ireplace( "{nameone}", $global['user']['nameone'], $html );
	//	$html = str_ireplace( "{nametwo}", $global['user']['nametwo'], $html );
		//$html = str_ireplace( "{rights}", $this->rights[$global['user']['rights']], $html );
		$this->data = array();
		
		return $html;
	}
	
	public function display() {
		print $this->parse();
	}
	
	/*public function load() {
		global $db, $config;
		var $icons = array('add'=>"plus");
		//$page, $block_notification;
		$page_tmp = file_get_contents( "templates/bootstrap/page.tpl");
		$block_notification_tmp = file_get_contents( "templates/bootstrap/block_notification.tpl");
		$result = $db->query( "SELECT * FROM {$config['sql_prefix']}_notification WHERE status='new' LIMIT 10;" );
		while ( $row = $db->fetchrow( $result ) ) {
			$block_notification_tmp = str_ireplace( "{icon}", $icons[$row['type']],  $block_notification_tmp);
			$block_notification .= $block_notification_tmp;
		}
		$page_tmp = str_ireplace( "{notification}", $db->numrows( $db->query( "SELECT id FROM {$config['sql_prefix']}_notification WHERE status='new';" ) ),  $page_tmp);
		$page_tmp = str_ireplace( "{home}", $config['url_home'],  $page_tmp);
		$page_tmp = str_ireplace( "[notification]", $block_notification,  $page_tmp);
		echo $page_tmp;
	}
	*/
}
?>
