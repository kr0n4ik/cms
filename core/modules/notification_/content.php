<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] || $global['user']['rights'] != "admin")
	header( "Location: {$config['url_home']}" );

if ($global['url'][1] == "") {
echo <<<HTML
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
								<th class="text-nowrap">От кого</th>
								<th class="text-nowrap">Имя</th>
								<th class="text-nowrap">Функции</th>
							</tr>
						</thead>
						<tbody>
HTML;
$n = 1;
$result = $db->query( "SELECT * FROM {$config['sql_prefix']}_notification"); //WHERE  mid={$global['user']['id']};" );
while ( $row = $db->fetchrow( $result ) ) {
	//$who_ = $db->fetchrow( $db->query( "SELECT * FROM {$config['sql_prefix']}_users id={$row['uid']}") );
	if ($row['mid'] != 0) {
		$user = $db->fetchrow( $db->query( "SELECT * FROM {$config['sql_prefix']}_users id={$row['mid']}") );
		$who = $user['nameone'] . " " . $user['nametwo'] . " (" . $user['email'] . ")";
	} else {
		$who = "Система";
	}
	echo "<tr><td>{$n}</td><td>{$who}</td><td>{$row['time']}</td><td>{$row['time']}</td></tr>\n";
	$n++;
}
echo <<<HTML
						</tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
HTML;
}
?>
