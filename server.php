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
						<div class="panel-heading" english="Room and configurations" traditional="機房與配置">机房与配置</div>
						<div class="panel-body">
							<div class="clearfix configuration-collocation-room">
								<h4 english="Pop sites" traditional="機房區域">机房区域：</h4>
								<a class="btn btn-default" english="Hong Kong" traditional="香港">香港</a>
								<a class="btn btn-default" english="Shenzhen" traditional="深圳">深圳</a>
								<a class="btn btn-default" english="Jiangsu" traditional="江蘇">江苏</a>
								<a class="btn btn-default" english="Dongguang" traditional="東莞">东莞</a>
								<a class="btn btn-default" english="Hunan" traditional="湖南">湖南</a>
							</div>

							<div class="clearfix configuration-collocation-size">
								<h4 english="Hosted specification:" traditional="托管規格：">托管规格：</h4>
								<a class="btn btn-default">1U</a>
								<a class="btn btn-default">2U</a>
								<a class="btn btn-default" english="whole cabinet" traditional="整機櫃">整机柜</a>
							</div>

							<div class="clearfix configuration-device-type">
								<h4 english="Device type:" traditional="設備類型：">设备类型：</h4>
								<a class="btn btn-default" english="Server" traditional="服務器">服务器</a>
								<a class="btn btn-default" english="Switch" traditional="交換機">交换机</a>
								<a class="btn btn-default" english="Firewall" traditional="防火墻">防火墙</a>
								<a class="btn btn-default" english="Router" traditional="路由器">路由器</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-warning">
						<div class="panel-heading" english="Network and security" traditional="網絡與安全">网络与安全</div>
						<div class="panel-body">
							<div class="clearfix configuration-bandwith">
								<h4 english="Bandwidth:" traditional="獨享寬帶：">独享宽带：</h4>
								<div class="configuration-bandwith-bar">
									<input id="bandwith-slider" data-slider-id='bandwith-slider' type="text"/>
								</div>

								<label for="bandwith-value" english="Bandwidth:" traditional="獨享寬帶：">带宽：</label>
								<input type="number" id="bandwith-value" value="1" min="1" max="1000" maxlength="4" pattern="[0-9]*"/> M
							</div>

							<div class="clearfix configuration-ips">
								<h4 english="Independent IP:" traditional="獨立IP：">独立IP：</h4>
								<a class="btn btn-default">1</a>
								<a class="btn btn-default">4</a>
								<a class="btn btn-default">8</a>
								<a class="btn btn-default">16</a>
								<a class="btn btn-default">32</a>
								<a class="btn btn-default">64</a>
								<a class="btn btn-default">128</a>
								<a class="btn btn-default">256</a>
							</div>

							<div class="clearfix configuration-defence">
								<h4 english="Defense peak:" traditional="防禦峰值：">防御峰值：</h4>
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
						<div class="panel-heading" english="Length of purchase" traditional="購買時長">购买时长</div>
						<div class="panel-body">
							<div class="clearfix configuration-month">
								<h4 english="Hosting time:" traditional="托管時間：">托管时间：</h4>
								<a class="btn btn-default" english="1 Month" traditional="1個月">1个月</a>
								<a class="btn btn-default" english="6 Months" traditional="6個月">6个月</a>
								<a class="btn btn-default" english="12 Months" traditional="12個月">12个月</a>
								<a class="btn btn-default" english="24 Months" traditional="24個月">24个月</a>
								<a class="btn btn-default" english="36 Months" traditional="36個月">36个月</a>
							</div>
						</div>
					</div>
				</section>

				<section class="configuration-panel">
					<div class="panel panel-success">
						<div class="panel-heading" english="Purchase quantity" traditional="購買數量">购买数量</div>
						<div class="panel-body">
							<div class="clearfix configuration-number">
								<input type="number" value="1" min="1" max="20" maxlength="2" pattern="[0-9]*"/>
							</div>
						</div>
					</div>
				</section>

				<section class="well total-price-box">
					<div class="container">
						<label class="label label-success total-price-label" english="Total Price:" traditional="價格：">
							价格 :
						</label>
						<div class="inline-block">
							<input type="text" readonly="readonly" class="total-price font-bold text-right" />
							<strong>RMB</strong>
						</div>
						<button class="btn btn-primary server-buy-button" english="Buy Now" traditional="立即購買">立即购买</button>
					</div>
				</section>
			</div><!--/row-->
		</div><!--/container-->

		<div class="configuration-confirm-modal">
			<div class="configuration-list">
				<span class="configuration-confirm-close">
					<i class="glyphicon glyphicon-remove pointer"></i>
				</span>
				<div class="input-group">
					<span class="input-group-addon" english="Pop sites" traditional="機房區域：">机房区域：</span>
					<input type="text" class="form-control room-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Hosted Specifications:" traditional="托管規格：">托管规格：</span>
					<input type="text" class="form-control size-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Device type:" traditional="設備類型：">设备类型：</span>
					<input type="text" class="form-control type-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Bandwidth:" traditional="獨享寬帶：">独享宽带：</span>
					<input type="text" class="form-control bandwidth-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Independent IP:" traditional="獨立IP：">独立IP：</span>
					<input type="text" class="form-control ips-value" placeholder="个" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Defense peak:" traditional="防禦峰值：">防御峰值：</span>
					<input type="text" class="form-control defence-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Length of purchase:" traditional="購買時長：">购买时长：</span>
					<input type="text" class="form-control month-value" readonly="readonly">
				</div>
				<div class="input-group">
					<span class="input-group-addon" english="Purchase quantity:" traditional="購買數量：">购买数量：</span>
					<input type="text" class="form-control number-value" placeholder="台" readonly="readonly">
				</div>
			</div>
			<?php echo do_shortcode('[contact-form-7 id="741" title="托管配置单"]');?>
		</div>

		<div class="invisible">
			<p class="success-message" english="Thanks. We have got your order and will contact you soon." traditional="我們已成功收到您的清單，將會盡快處理！">我们已成功收到您的清单，将会尽快处理！</p>
		</div>
<?php get_footer(); ?>