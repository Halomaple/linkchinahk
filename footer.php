<?php
/**
 * The Footer template for LinkChinaHK
 *
 */
?>
				</div><!--/row-->
			</div><!--/container-->
		</div><!--main-content-->
		<div class="footer">
			<div class="footer-separator">
				<div class="container">
					<div class="row">
						<a class="to-top text-white pointer" id="totop">TOP</a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer-company-brand">
						<div class="footer-brand text-gray">
							<img src="<?php bloginfo('template_directory')?>/images/logo-white.png">
							<h1><?php bloginfo('name');?></h1>
						</div>
					</div>

					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="footer-contact">
							<p>TEL : (852)55690674</p>
							<p>E-mail : <a href="mailto:cs@linkchina.com.cn">cs@linkchina.com.cn</a></p>
							<p>Website : <a href="http://www.linkchina.hk/">linkchina.hk</a></p>
							<p>Address : FLAT/RM A1,9/F SILVERCORP INTERNATIONAL TOWER 707-713 NATHAN ROAD,MONGKOK,HONG KONG</p>
							<hr />
							<p>Tel : (0755)88824588</p>
							<p>E-mail : <a href="mailto:cs@linkchina.com.cn">cs@linkchina.com.cn</a></p>
							<p>Website: <a href="http://www.linkchina.com.cn/">www.linkchina.com.cn</a></p>
							<p>ADD : 深圳市南山区沙河西路3011号白沙科技产业园1栋8楼B-V区</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--JavaScript-->
		<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>
		<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>

		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdn.bootcss.com/flexslider/2.1/jquery.flexslider-min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/flexslider.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootsnav.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.singlePageNav.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.toTop.min.js"></script>
		<!-- <script src="<?php bloginfo('template_directory'); ?>/js/language.js"></script> -->
		<script type="text/javascript">
			$(document).ready(function() {
				//limit ip access
				var allowIPList = ['113.118.234.76', '113.118.235.73', '183.11.131.128', '103.72.166.84'];

				if (!returnCitySN["cip"] || allowIPList.indexOf(returnCitySN["cip"]) == -1) {
					$('body').empty();
					$('body').append('<h3>LinkChina HK is upgrading.</h3>' +
						'<p>If you have any questions, please call（852）55690674.</p>');
				}
				console.log('Your IP address is: ', returnCitySN['cip']);
				contactFormCustomization();

				function contactFormCustomization() {
					var replaceValueAndPlaceHodler = function(index, ele) {
						$(ele).attr('placeholder', $(ele).val());
						$(ele).val('');
					};
					$('.contact-form-content > p > span > input').each(replaceValueAndPlaceHodler);
					$('.contact-form-content > p > span > textarea').each(replaceValueAndPlaceHodler);
					$('.contact-form-content > p > input[type="submit"]').addClass('btn btn-primary');
				}
				// Flexslider Height
				var slideHeight = $(window).height();
				$('.flex-container, .flexslider, .flex-viewport, .slides, .slide img').css('height', slideHeight + 80);
			});
		</script>
	</body>
</html>
