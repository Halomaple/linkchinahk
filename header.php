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
			bloginfo('name');
			echo '';
		} elseif (is_404()) {
			echo '未找到&nbsp;|&nbsp;';
			bloginfo('name');
		} else {
			wp_title('', true);
		} ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if (is_search()) { ?>
	<meta name='robots' content='nofollow'/>
	<?php } else { ?>
	<meta name='robots' content='all'/>
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="author" content="Jeff Doyle"/>
	<meta name="Copyright" content="本站创作权权归Jeff.Doyle个人所有"/>

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>

	<!-- Bootstrap core CSS -->
	<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Flexslider CSS -->
	<link href="//cdn.bootcss.com/flexslider/2.1/flexslider-min.css" rel="stylesheet"/>

	<!--Customized css-->
	<link href="<?php bloginfo('template_directory'); ?>/css/bootsnav.css" rel="stylesheet"/>
	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet"/>
</head>

<body>
<div class="top-navbar">
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default navbar-mobile bootsnav">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name');?></a>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<form method="get" class="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class="input-group">
								<input name="s" id="search-input" type="text" class="form-control search-input-box" placeholder="搜索">
								<span class="input-group-btn">
									<button type="button" class="btn btn-default search-button" data-toggle="collapse" data-target="#search-input" aria-expanded="false" aria-controls="search-input">
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
</div>

<div class="main-content">
	<?php if (is_home()): ?>
		<div class="flex-container">
			<?php echo do_shortcode("[slider id='7' name='banner图片' size='full']"); ?>
		</div>
		<div class="company-slogan">
		</div>
	<?php endif ?>

	<div class="container">
		<div class="row">