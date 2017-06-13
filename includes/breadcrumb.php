<?php
if (is_single()) {
	?>
	<ul class="breadcrumb">
		<li>Current</li>
		<li><a title="Back to Home" href="<?php echo site_url(); ?>/">Home</a></li>
		<li class="current-position"><?php the_title() ?></li>
	</ul>
<?php }

if (is_archive()) {
	?>
	<ul class="breadcrumb">
		<li>Current</li>
		<li><a title="Back to Home" href="<?php echo site_url(); ?>/">Home</a></li>
		<li class="current-position"><?php if (is_category()) { single_cat_title();} ?></li>
	</ul>
<?php }

if (is_search()) {
	?>
	<ul class="breadcrumb clearfix">
		<li>Current</li>
		<li><a title="Back to Home" href="<?php echo site_url() ?>/">Home</a></li>
		<li class="current-position">Search Result</li>
		<!--div class="search-page-input pull-right">
			<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="input-group">
					<input name="s" id="s" type="text" class="form-control" placeholder="Search again">
					<span class="input-group-btn"><button class="btn btn-default" type="submit">Search</button></span>
				</div>
			</form>
		</div-->
	</ul>
<?php }

if (is_page()) {
	?>
	<ul class="breadcrumb">
		<li>Current</li>
		<li><a title="Back to Home" href="<?php echo site_url(); ?>/">Home</a></li>
		<li class="current-position"><?php the_title() ?></li>
	</ul>
<?php }?>