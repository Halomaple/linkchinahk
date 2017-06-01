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
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3 qr-code-container">
						<div class="qr-code pull-right">
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-9 address">
					   
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
