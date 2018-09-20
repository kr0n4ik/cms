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

$date = date('d.m.Y, H:i', time() + $config['tz'] * 60 );
if ($config['debug'] == "Y") 
	$debug_y = "checked";
else
	$debug_n = "checked";
$template['content'] .= <<<HTML
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<div class="panel-body">
				<form method="POST">
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Домашняя страница сайта</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="http://test.com/" name="save[url_home]" value="{$config['url_home']}" />
							<small class="f-s-12 text-grey-darker">Укажите имя основного домена на котором располагается ваш сайт. Например: http://yoursite.com/ Внимание, наличие слеша на конце в имени домена обязательно.</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя сервера базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="localhost" name="save[sql_server]" value="{$config['sql_server']}" />
							<small class="f-s-12 text-grey-darker">Обычно это "localhost".</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя пользователя базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="root" name="save[sql_user]" value="{$config['sql_user']}" />
							<small class="f-s-12 text-grey-darker">Обычно это "root".</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Пароль пользователя базы данных</label>
						<div class="col-md-9">
							<input type="password" class="form-control m-b-5" placeholder="password" name="save[sql_password]" value="{$config['sql_password']}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Имя базы данных</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="database" name="save[sql_database]" value="{$config['sql_database']}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Префикс таблиц</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="prefix" name="save[sql_prefix]" value="{$config['sql_prefix']}" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Коррекция временных зон</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="60" name="save[tz]" value="{$config['tz']}" />
							<small class="f-s-12 text-grey-darker">в минутах; т.е.: 180=+3 часа; -120=-2 часа. Текущее время сервера с учетом коррекции: {$date}</small>
						</div>
					</div>
					<div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Включить отладку</label>
                        <div class="col-md-9">
                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="save[debug]" id="inlineCssRadio1" value="Y" {$debug_y} />
								<label for="inlineCssRadio1">Да</label>
							</div>
                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="save[debug]" id="inlineCssRadio2" value="N" {$debug_n} />
                                <label for="inlineCssRadio2">Нет</label>
                            </div>
                        </div>
                    </div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3">Администраторы</label>
						<div class="col-md-9">
							<input type="text" class="form-control m-b-5" placeholder="0" name="save[aid]" value="{$config['aid']}" />
							<small class="f-s-12 text-grey-darker">id администраторв через запятую, для оповещений</small>
						</div>
					</div>
					<button type="sybmit" class="btn btn-primary float-right" name="up" value="Y">Сохарнить</button>
				</form>
			</div>
		</div>
		<!-- end #content -->
HTML;
include_once(DIR_ROOT . "/core/app.php");
?>
