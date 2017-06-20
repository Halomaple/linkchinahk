<?php
/**
 **Template Name: server
 */
?>

<?php get_header(); ?>
		<div class="server container">
			<div class="row">
				<section class="configuration-panel">
					<div class="panel panel-primary">
						<div class="panel-heading">机房与配置</div>
						<div class="panel-body">
							<div class="clearfix">
								<h4>机房区域：</h4>
								<a class="btn btn-default">香港</a>
								<a class="btn btn-default">深圳</a>
								<a class="btn btn-default">江苏</a>
								<a class="btn btn-default">东莞</a>
								<a class="btn btn-default">湖南</a>
							</div>

							<div class="clearfix">
								<h4>托管规格：</h4>
								<a class="btn btn-default">1U</a>
								<a class="btn btn-default">2U</a>
								<a class="btn btn-default">整机柜</a>
							</div>

							<div class="clearfix">
								<h4>设备类型：</h4>
								<a class="btn btn-default">服务器</a>
								<a class="btn btn-default">交换机</a>
								<a class="btn btn-default">防火墙</a>
								<a class="btn btn-default">路由器</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-warning">
						<div class="panel-heading">网络与安全</div>
						<div class="panel-body">
							<div class="clearfix">
								<h4>独享宽带：</h4>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
										0%
									</div>
								</div>
							</div>

							<div class="clearfix">
								<h4>独立IP：</h4>
								<a class="btn btn-default">1个</a>
								<a class="btn btn-default">4个</a>
								<a class="btn btn-default">8个</a>
								<a class="btn btn-default">16个</a>
								<a class="btn btn-default">32个</a>
								<a class="btn btn-default">64个</a>
								<a class="btn btn-default">128个</a>
								<a class="btn btn-default">256个</a>
							</div>

							<div class="clearfix">
								<h4>防御峰值：</h4>
								<a class="btn btn-default">5G</a>
								<a class="btn btn-default">10G</a>
								<a class="btn btn-default">20G</a>
								<a class="btn btn-default">30G</a>
								<a class="btn btn-default">50G</a>
								<a class="btn btn-default">100G</a>
								<a class="btn btn-default">200G</a>
								<a class="btn btn-default">300G</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-info">
						<div class="panel-heading">购买时长</div>
						<div class="panel-body">
							<div class="clearfix">
								<h4>托管时间：</h4>
								<a class="btn btn-default">1个月</a>
								<a class="btn btn-default">6个月</a>
								<a class="btn btn-default">1年</a>
								<a class="btn btn-default">2年</a>
								<a class="btn btn-default">3年</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-success">
						<div class="panel-heading">购买数量</div>
						<div class="panel-body">
							<div class="clearfix">
								<input type="number" value="1" /> 台
							</div>
						</div>
					</div>
				</section>

				<section>
					<label class="label label-success total-price">
						价格：
					</label>

					<input type="number" value="1000" /> RMB
				</section>
			</div><!--/row-->
		</div><!--/container-->
<?php get_footer(); ?>