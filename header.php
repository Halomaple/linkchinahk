<!DOCTYPE html>
<html>
	<head>
		<title><?php if (is_home()) {
				bloginfo('name');
			} elseif (is_category()) {
				single_cat_title();
				echo '&nbsp;|&nbsp;';
				bloginfo('name');
			} elseif (is_single()) {
				single_post_title();
				echo '&nbsp;|&nbsp;';
				bloginfo('name');
			} elseif (is_page()) {
				single_post_title();
				echo '&nbsp;|&nbsp;';
				bloginfo('name');
			} elseif (is_404()) {
				echo 'Not found &nbsp;|&nbsp;';
				bloginfo('name');
			} else {
				wp_title('', true);
			} ?></title>


		<?php $GLOBALS['File_Version_Control'] = '1.0.16' ?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<?php if (is_search()) { ?>
		<meta name='robots' content='nofollow'/>
		<?php } else { ?>
		<meta name='robots' content='all'/>
		<?php } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta name="keywords" content="linkchinahk, 专线"/>
		<meta name="description" content=""/>
		<meta name="author" content="Jeff Doyle"/>
		<meta name="Copyright" content="Halomaple"/>

		<script type="text/javascript">
			//Navigation redirection fix
			if(window.location.href == 'http://linkchina.hk/en_US/'
				|| window.location.href == 'http://linkchina.hk/zh_CN/'
				|| window.location.href == 'http://linkchina.hk/zh_HK/'){
				window.location.href = window.location.href + 'home';
			}

			if(window.location.href == 'http://linkchina.hk/en_US/zh_HK/'
				|| window.location.href == 'http://linkchina.hk/en_US/zh_CN/'
				|| window.location.href == 'http://linkchina.hk/zh_HK/en_US/'
				|| window.location.href == 'http://linkchina.hk/zh_HK/zh_CN/'
				|| window.location.href == 'http://linkchina.hk/zh_CN/en_US/'
				|| window.location.href == 'http://linkchina.hk/zh_CN/zh_HK/'){
				window.location.href = window.location.href.slice(0, window.location.href.length - 6) + 'home';
			}
		</script>

		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?c661dcc27f798ef3c17e5f4823ed989f";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>

		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>

		<!-- Bootstrap core CSS -->
		<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

		<!-- Flexslider CSS -->
		<link href="//cdn.bootcss.com/flexslider/2.1/flexslider-min.css" rel="stylesheet"/>
		<!-- Font-Awesome -->
		<link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- Bootstrap slider -->
		<link href="//cdn.bootcss.com/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet">

		<!--Customized css-->
		<link href="<?php bloginfo('template_directory'); ?>/css/bootsnav.css?version=<?php echo $GLOBALS['File_Version_Control']?>" rel="stylesheet"/>
		<link href="<?php bloginfo('template_directory'); ?>/style.css?version=<?php echo $GLOBALS['File_Version_Control']?>" rel="stylesheet"/>
	</head>

	<body>
		<header class="top-navbar">
			<div class="container">
				<div class="row">
					<nav class="navbar navbar-fixed navbar-mobile bootsnav">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
										data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php echo home_url(); ?>">
									<img src="<?php bloginfo('template_directory')?>/images/logo.png">
								</a>
							</div>
							<div id="navbar" class="collapse navbar-collapse">
								<form method="get" class="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<div class="input-group">
										<input name="s" id="search-input" type="text" class="form-control search-input-box" placeholder="Search">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-default search-button">
												<i class="glyphicon glyphicon-search">
												</i>
											</button>
										</span>
									</div>
								</form>
								<?php wp_nav_menu(array(
									'menu' => 'header_menu',
									'theme_location' => 'header_menu',
									'depth' => 0,
									'container' => false,
									'menu_class' => 'nav navbar-ul navbar-nav navbar-right',
									'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
									'walker' => new wp_bootstrap_navwalker()));
								?>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>

		<div class="main-content">