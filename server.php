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
							<div class="clearfix configuration-collocation-room">
								<h4>机房区域：</h4>
								<a class="btn btn-default">香港</a>
								<!--a class="btn btn-default">深圳</a>
								<a class="btn btn-default">江苏</a>
								<a class="btn btn-default">东莞</a>
								<a class="btn btn-default">湖南</a-->
							</div>

							<div class="clearfix configuration-collocation-size">
								<h4>托管规格：</h4>
								<a class="btn btn-default">1U</a>
								<a class="btn btn-default">2U</a>
								<a class="btn btn-default">整机柜</a>
							</div>

							<div class="clearfix configuration-device-type">
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
							<div class="clearfix configuration-bandwith">
								<h4>独享宽带：</h4>
								<div class="configuration-bandwith-bar">
									<input id="bandwith-slider" data-slider-id='bandwith-slider' type="text"/>
								</div>

								<label for="bandwith-value">带宽：</label>
								<input type="number" id="bandwith-value" value="1" min="1" max="1000" maxlength="4" pattern="[0-9]*"/> M
							</div>

							<div class="clearfix configuration-ips">
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

							<div class="clearfix configuration-defence">
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
							<div class="clearfix configuration-month">
								<h4>托管时间：</h4>
								<a class="btn btn-default">1个月</a>
								<a class="btn btn-default">6个月</a>
								<a class="btn btn-default">12个月</a>
								<a class="btn btn-default">24个月</a>
								<a class="btn btn-default">36个月</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-success">
						<div class="panel-heading">购买数量</div>
						<div class="panel-body">
							<div class="clearfix configuration-number">
								<input type="number" value="1" min="1" max="20" maxlength="2" pattern="[0-9]*"/> 台
							</div>
						</div>
					</div>
				</section>

				<section class="well total-price-box">
					<div class="container">
						<label class="label label-success total-price-label">
							价格 :
						</label>
						<div class="inline-block">
							<input type="text" readonly="readonly" class="total-price font-bold text-right" />
							<strong>RMB</strong>
						</div>
						<button class="btn btn-primary server-buy-button">立即购买</button>
					</div>
				</section>
			</div><!--/row-->
		</div><!--/container-->
<?php get_footer(); ?>