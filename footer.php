<?php
/**
 * The Footer template for LinkChinaHK
 *
 */
?>
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
							<img src="<?php bloginfo('template_directory')?>/images/logo.png">
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

		<script src="//cdn.bootcss.com/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdn.bootcss.com/flexslider/2.1/jquery.flexslider-min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/flexslider.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootsnav.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.singlePageNav.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.toTop.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/server.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				init();

				function init() {
					logIp();
					contactFormCustomization();
					adjustFlexSliderHeight();
					changeNavigationLanguageText();
					changePlaceholderInSearchBoxAccordingToSelectedLanguage();
					switchTabOnCompanyPage();
				}

				function logIp() {
					//limit ip access
					var allowIPList = ['103.72.166.84', '103.44.62.144', '183.2.185.59', '183.39.157.130', '14.20.91.15', '14.20.88.65', '113.118.234.233', '223.104.63.30'];

					if (!returnCitySN["cip"] || allowIPList.indexOf(returnCitySN["cip"]) == -1) {
						$('body').empty();
						$('body').append('<h3>LinkChina HK is upgrading.</h3>' +
							'<p>If you have any questions, please call（852）55690674.</p>');
					}
					console.log('Your IP address is: ', returnCitySN['cip']);
				}

				function contactFormCustomization() {
					var replaceValueAndPlaceHodler = function(index, ele) {
						$(ele).attr('placeholder', $(ele).val());
						$(ele).val('');
					};
					$('.contact-form-content > p > span > input').each(replaceValueAndPlaceHodler);
					$('.contact-form-content > p > span > textarea').each(replaceValueAndPlaceHodler);
					$('.contact-form-content > p > input[type="submit"]').addClass('btn btn-primary');
				}

				function adjustFlexSliderHeight() {
					// Flexslider Height
					$('.flex-container, .flexslider, .flex-viewport, .slides, .slide, .slide img').css('height', $(window).height() + 80);

					$(window).on('resize', function() {
						$('.flex-container, .flexslider, .flex-viewport, .slides, .slide, .slide img').css('height', $(window).height() + 80);
					});
				}

				function changeNavigationLanguageText() {
					//Change 香港，中国 to 繁体，简体
					$('.mltlngg-menu-item-current > a').text($('.mltlngg-menu-item-current > a').text().replace('香港', '繁体'));
					$('.mltlngg-menu-item-current > a').text($('.mltlngg-menu-item-current > a').text().replace('中国', '简体'));
					$('.menu-item-231-zh_HK a').text($('.menu-item-231-zh_HK a').text().replace('香港', '繁体'));
					$('.menu-item-231-zh_CN a').text($('.menu-item-231-zh_CN a').text().replace('中国', '简体'));
				}

				function changePlaceholderInSearchBoxAccordingToSelectedLanguage() {
					if (window.location.href.indexOf('/en_US') == -1) {
						$('.search-input-box').attr({
							placeholder: '搜索',
						});
					}
				}

				function switchTabOnCompanyPage(){
					$('.company-tab #content-tab-headquarters').click(function(){
						$('#tab-hongkong-content').hide();
						$('#tab-headquarters-content').show();
						$(this).siblings().removeClass('active');
						$(this).addClass('active');
					});

					$('.company-tab #content-tab-headquarters').click();

					$('.company-tab #content-tab-hongkong').click(function(){
						$('#tab-headquarters-content').hide();
						$('#tab-hongkong-content').show();
						$(this).siblings().removeClass('active');
						$(this).addClass('active');
					});
				}
			});
		</script>

		<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
		<script type="text/javascript">
			/*/创建和初始化地图函数：
			function initMap() {
				createMap(); //创建地图
				setMapEvent(); //设置地图事件
				addMapControl(); //向地图添加控件
				addMarker(); //向地图中添加marker
			}

			//创建地图函数：
			function createMap() {
				var map = new BMap.Map("dituContent"); //在百度地图容器中创建一个地图
				var point = new BMap.Point(114.180783, 22.323879); //定义一个中心点坐标
				map.centerAndZoom(point, 18); //设定地图的中心点和坐标并将地图显示在地图容器中
				window.map = map; //将map变量存储在全局
			}

			//地图事件设置函数：
			function setMapEvent() {
				map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
				map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
				map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
				map.enableKeyboard(); //启用键盘上下左右键移动地图
			}

			//地图控件添加函数：
			function addMapControl() {
				//向地图中添加缩放控件
				var ctrl_nav = new BMap.NavigationControl({
					anchor: BMAP_ANCHOR_TOP_LEFT,
					type: BMAP_NAVIGATION_CONTROL_LARGE
				});
				map.addControl(ctrl_nav);
				//向地图中添加比例尺控件
				var ctrl_sca = new BMap.ScaleControl({
					anchor: BMAP_ANCHOR_BOTTOM_LEFT
				});
				map.addControl(ctrl_sca);
			}

			//标注点数组
			var markerArr = [{
					title: "银高国际大厦9楼A1室",
					content: "我的备注",
					point: "114.180388|22.323545",
					isOpen: 0,
					icon: {
						w: 21,
						h: 21,
						l: 0,
						t: 0,
						x: 6,
						lb: 5
					}
				}
				 ];
			//创建marker
			function addMarker() {
				for (var i = 0; i < markerArr.length; i++) {
					var json = markerArr[i];
					var p0 = json.point.split("|")[0];
					var p1 = json.point.split("|")[1];
					var point = new BMap.Point(p0, p1);
					var iconImg = createIcon(json.icon);
					var marker = new BMap.Marker(point, {
						icon: iconImg
					});
					var iw = createInfoWindow(i);
					var label = new BMap.Label(json.title, {
						"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)
					});
					marker.setLabel(label);
					map.addOverlay(marker);
					label.setStyle({
						borderColor: "#808080",
						color: "#333",
						cursor: "pointer"
					});

					(function() {
						var index = i;
						var _iw = createInfoWindow(i);
						var _marker = marker;
						_marker.addEventListener("click", function() {
							this.openInfoWindow(_iw);
						});
						_iw.addEventListener("open", function() {
							_marker.getLabel().hide();
						})
						_iw.addEventListener("close", function() {
							_marker.getLabel().show();
						})
						label.addEventListener("click", function() {
							_marker.openInfoWindow(_iw);
						})
						if (!!json.isOpen) {
							label.hide();
							_marker.openInfoWindow(_iw);
						}
					})()
				}
			}
			//创建InfoWindow
			function createInfoWindow(i) {
				var json = markerArr[i];
				var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
				return iw;
			}
			//创建一个Icon
			function createIcon(json) {
				var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {
					imageOffset: new BMap.Size(-json.l, -json.t),
					infoWindowOffset: new BMap.Size(json.lb + 5, 1),
					offset: new BMap.Size(json.x, json.h)
				})
				return icon;
			}

			initMap(); //创建和初始化地图*/
		</script>
	</body>
</html>
