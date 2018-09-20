<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'])
	header( "Location: {$config['url_home']}" );

$rights = array('admin' => "Администратор", 'moderator' => "Модератор", 'partner' => "Партнер", 'user' => "Клиент");

if (isset($_POST['up'])) {
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['nametwo'] ) && !empty( $_POST['nametwo'] )  ) {
		$nametwo_status = "is-invalid";
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET nametwo='{$_POST['nametwo']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['nameone'] ) && !empty( $_POST['nameone'] )  ) {
		$nameone_status = "is-invalid";
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET nameone='{$_POST['nameone']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^[a-zа-я]+$/iu", $_POST['namethree'] ) && !empty( $_POST['namethree'] )  ) {
		$namethree_status = "is-invalid";
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET namethree='{$_POST['namethree']}' WHERE id={$global['user']['id']};" );
	}
	if ( !preg_match( "/^7[0-9]{9,12}$/i", $_POST['phone'] ) && !empty( $_POST['phone'] ) ) {
		$phone_status =  "is-invalid";
	} else {
		$db->query("UPDATE {$config['sql_prefix']}_users SET phone='{$_POST['phone']}' WHERE id={$global['user']['id']};" );
	}
}

$row = $db->fetchrow($db->query("SELECT * FROM {$config['sql_prefix']}_users WHERE id={$global['user']['id']};"));
$template['content'] .= <<<HTML
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<!-- begin profile -->
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<div class="profile-header-img">
							<img src="{$config['url_home']}upload/avatar/{$row['avatar']}" alt="">
						</div>
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">{$row['nameone']} {$row['nametwo']}</h4>
							<p class="m-b-10">{$row['email']}</p>
							<p class="m-b-10">{$rights[$row['rights']]}</p>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item"><a href="#profile-unit" class="nav-link active" data-toggle="tab">ОСНОВНЫЕ</a></li>
						<li class="nav-item"><a href="#profile-avatar" class="nav-link" data-toggle="tab">ФОТО</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
			<!-- begin profile-content -->
            <div class="profile-content">
            	<!-- begin tab-content -->
				<form method="POST">
					<div class="tab-content p-0">
						<!-- begin #profile-post tab -->
						<div class="tab-pane fade show active" id="profile-unit">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Имя</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {$nameone_status}" placeholder="Введите имя" value="{$row['nameone']}" name="nameone"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Фамилия</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {$nametwo_status}" placeholder="Введите фамилию" value="{$row['nametwo']}" name="nametwo"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Отчество</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {$namethree_status}" placeholder="Введите отчество" value="{$row['namethree']}" name="namethree"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Телефон</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {$phone_status}" placeholder="Введите номер телефона" value="{$row['phone']}" name="phone"/>
								</div>
							</div>
						</div>
						<div class="tab-pane fade in" id="profile-avatar">
						</div>
						<button type="sybmit" class="btn btn-primary float-right" name="up" value="Y">Сохарнить</button>
					</div>
				</form>
            	<!-- end tab-content -->
            </div>
			<!-- end profile-content -->
		</div>
		<!-- end #content -->
HTML;
include_once(DIR_ROOT . "/core/app.php");
?>
