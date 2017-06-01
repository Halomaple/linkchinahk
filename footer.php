<?php
/**
 * The Footer template for LinkChinaHK
 *
 */
?>
				</div><!--/row-->
			</div><!--/container main-content-->
		</div><!--main-content-->

		<div class="footer">
			<div class="footer-separator"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="footer-brand text-gray">
							<img src="<?php bloginfo('template_directory')?>/images/logo-white.png">
							<h1>联华云</h1>
						</div>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<div class="footer-contact">
							<p>Tel : 0755-88824588</p>
							<p>HK TEL : （852）55690674</p>
							<p>ADD : 深圳市南山区白沙科技产业园1-8B、8V</p>
							<p>HK Add:FLAT/RM A1,9/F SILVERCORP INTERNATIONAL TOWER 707-713 NATHAN ROAD</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--JavaScript-->
		<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>
		<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
		<script type="text/javascript">
			//limit ip access
			var allowIPList = [
				'183.11.129.101',
				'103.72.166.84'
			];
			if(!returnCitySN["cip"] || allowIPList.indexOf(returnCitySN["cip"]) == -1){
				$('body').empty();
				$('body').append('<h3>LinkChina HK is upgrading.</h3>'+
					'<p>If you have any questions, please call（852）55690674.</p>');
			}
			console.log('Your IP address is: ', returnCitySN['cip']);
		</script>

		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdn.bootcss.com/flexslider/2.1/jquery.flexslider-min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/flexslider.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootsnav.min.js"></script>
	</body>
</html>
