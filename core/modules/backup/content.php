<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'] || $global['user']['rights'] != "admin")
	header( "Location: {$config['url_home']}" );

if ($global['url'][1] == "") {
$template['content'] .= <<<HTML
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Резерные копии системы</h4>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="1%"></th>
								<th class="text-nowrap">Имя файла</th>
								<th class="text-nowrap">Функции</th>
							</tr>
						</thead>
						<tbody>
HTML;
$n = 1;
$result = glob( DIR_ROOT . "/backup/*.zip");
foreach( $result as $name ) {
	$file = explode( ".", basename( $name ) );
	$template['content'] .= "<tr><td width=\"1%\" class=\"f-s-600 text-inverse\">{$n}</td><td>{$file[0]}</td><td><a href=\"{$config['url_home']}index.php?url=backup/restore/{$row['id']}\">Востановить</a></td></tr>\n";
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
}
include_once(DIR_ROOT . "/core/app.php");
?>
