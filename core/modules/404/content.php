<?php
if( !defined( "ROOT" ) ) { 
	header( "HTTP/1.1 403 Forbidden" ); 
	header( "Location: ../" ); 
	die( "Hacking attempt!" ); 
}

echo <<<HTML
<!DOCTYPE html>
<!--[if IE 8]> <html lang="{$config['lng']}" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{$config['lng']}">
<!--<![endif]-->
<head>
	<meta charset="{$config['charset']}" />
	<title>Страница не найдена</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/style.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="{$config['url_home']}assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{$config['url_home']}assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin error -->
        <div class="error">
            <div class="error-code m-b-10">404</div>
            <div class="error-content">
                <div class="error-message">Мы не смогли найти...</div>
                <div class="error-desc m-b-30">
                    Cтраница, которую вы искали, не существует.. <br />
                </div>
                <div>
                    <a href="{$config['url_home']}" class="btn btn-success p-l-20 p-r-20">Домой</a>
                </div>
            </div>
        </div>
        <!-- end error -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{$config['url_home']}assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="{$config['url_home']}assets/crossbrowserjs/html5shiv.js"></script>
		<script src="{$config['url_home']}assets/crossbrowserjs/respond.min.js"></script>
		<script src="{$config['url_home']}assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{$config['url_home']}assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{$config['url_home']}assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="{$config['url_home']}assets/js/theme/default.min.js"></script>
	<script src="{$config['url_home']}assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
HTML;
?>
