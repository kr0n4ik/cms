<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] || $global['user']['rights'] != "partner")
	header( "Location: {$config['url_home']}" );

if ($global['url'][1] == "") {
$template['content'] .= <<<HTML
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
				<li class="breadcrumb-item active">Managed Tables</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Data Table - Default</h4>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="1%"></th>
								<th width="1%" data-orderable="false"></th>
								<th class="text-nowrap">Email</th>
								<th class="text-nowrap">Имя Фамилия</th>
								<th class="text-nowrap">Баланс</th>
								<th class="text-nowrap">Права</th>
								<th class="text-nowrap">Функции</th>
							</tr>
						</thead>
						<tbody>
HTML;
$n = 1;
$result = $db->query( "SELECT * FROM {$config['sql_prefix']}_users WHERE parent={$global['user']['id']};"); //WHERE  mid={$global['user']['id']};" );
while ( $row = $db->fetchrow( $result ) ) {
	$template['content'] .= "<tr><td width=\"1%\" class=\"f-s-600 text-inverse\">{$n}</td><td width=\"1%\" class=\"with-img\"><img src=\"{$config['url_home']}upload/avatar/{$row['avatar']}\" class=\"img-rounded height-30\" /></td><td>{$row['email']}</td><td>{$row['nameone']} {$row['nametwo']}</td><td>{$row['balance']}</td><td>{$rights[$row['rights']]}</td><td><a href=\"{$config['url_home']}index.php?url=users/profile/{$row['id']}\">edit</a></td></tr>\n";
	$n++;
}
$template['content'] .= <<<HTML
						</tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
HTML;
} elseif ($global['url'][1] == "profile") {
	$id = intval($global['url'][2]);
	if ($_POST['up'] == "Y") {
		$rights = $_POST['rights'];
		$nameone = $_POST['nameone'];
		$nametwo = $_POST['nametwo'];
		$namethree = $_POST['namethree'];
		$balance = $_POST['balance'];
		$db->query("UPDATE {$config['sql_prefix']}_users SET rights='{$rights}', nameone='{$nameone}', nametwo='{$nametwo}', namethree='{$namethree}', balance={$balance}  WHERE id={$id};");
	}
	$row = $db->fetchrow($db->query("SELECT * FROM {$config['sql_prefix']}_users WHERE id={$id};"));
	switch($row['rights']) {
		case "admin" : $rights_admin = "checked"; break;
		case "moderator" : $rights_moderator = "checked"; break;
		case "partner" : $rights_partner = "checked"; break;
		default : $rights_user = "checked";
	}
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
								<label class="col-form-label col-md-3">Баланс</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {balance_status}" placeholder="Введите имя" value="{$row['balance']}" name="balance"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Имя</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {nameone_status}" placeholder="Введите имя" value="{$row['nameone']}" name="nameone"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Фамилия</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {nametwo_status}" placeholder="Введите фамилию" value="{$row['nametwo']}" name="nametwo"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Отчество</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {namethree_status}" placeholder="Введите отчество" value="{$row['namethree']}" name="namethree"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3">Телефон</label>
								<div class="col-md-9">
									<input type="text" class="form-control m-b-5 {phone_status}" placeholder="Введите номер телефона" value="{$row['phone']}" name="phone"/>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-md-3 col-form-label">Права</label>
								<div class="col-md-9">
									<div class="radio radio-css radio-inline">
										<input type="radio" name="rights" id="inlineCssRadio1" value="admin" {$rights_admin} />
										<label for="inlineCssRadio1">Администартор</label>
									</div>
									<div class="radio radio-css radio-inline">
										<input type="radio" name="rights" id="inlineCssRadio2" value="moderator" {$rights_moderator} />
										<label for="inlineCssRadio2">Модератор</label>
									</div>
									<div class="radio radio-css radio-inline">
										<input type="radio" name="rights" id="inlineCssRadio3" value="partner" {$rights_partner} />
										<label for="inlineCssRadio3">Партнер</label>
									</div>
									<div class="radio radio-css radio-inline">
										<input type="radio" name="rights" id="inlineCssRadio4" value="user" {$rights_user} />
										<label for="inlineCssRadio4">Клиент</label>
									</div>
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
}
include_once(DIR_ROOT . "/core/app.php");
?>
