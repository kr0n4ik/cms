<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

if ( !$global['user']['loged'])
	header( "Location: {$config['url_home']}" );

$template['content'] .= <<<HTML
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<ul class="registered-users-list clearfix">
                <li>
					<a href="javascript:;"><img src="assets/img/product/product-2.png" alt="" /></a>
					<h4 class="username text-ellipsis">
						Услуга 1
						<small>Бесплатная</small>
					</h4>
				</li>
				<li>
					<a href="javascript:;"><img src="assets/img/product/product-1.png" alt="" /></a>
					<h4 class="username text-ellipsis">
						Услуга 2
						<small>2000 часов</small>
					</h4>
				</li>
			</ul>
		</div>
		<!-- end #content -->
HTML;
include_once(DIR_ROOT . "/core/app.php");
?>
