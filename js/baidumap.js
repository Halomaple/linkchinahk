
generateMaps();

function generateMaps(){
	if(window.location.href.indexOf('contact-us') == -1) return;

	createMapForSZ();
	createMapForHk();
}

function createMapForSZ() {
	var selectorId = "allmap-sz";
	var pointX = 113.9632911;
	var pointY = 22.567776;
	var companyInfoLabel = "<b>联华世纪通信技术有限公司</b><br />白沙科技产业园1栋8楼B-V区";

	createMap(selectorId, pointX, pointY, companyInfoLabel);
}

function createMapForHk() {
	var selectorId = "allmap-hk";
	var pointX = 114.180465;
	var pointY = 22.32325;
	var companyInfoLabel = "<b>聯華電信國際有限公司</b><br />旺角银高国际大厦9楼A1室";

	createMap(selectorId, pointX, pointY, companyInfoLabel);
}

function createMap(selectorId, pointX, pointY, labelText) {
	// 百度地图API功能
	var map = new BMap.Map(selectorId);

	var point = new BMap.Point(pointX, pointY);
	var centerPoint = new BMap.Point(pointX + 0.00089, pointY + 0.00006);
	map.centerAndZoom(centerPoint, 18);

	var marker = new BMap.Marker(point); // 创建标注

	var label = new BMap.Label(labelText, {
		position: point,
		offset: new BMap.Size(20, -10)
	});
	label.setStyle({
		color: "#bb0000",
		fontSize: "14px",
		fontFamily: "微软雅黑",
		minWidth: "200px",
		height: "46px",
		textAlign: "center",
		//border: 'none'
	});
	marker.setLabel(label);

	map.addOverlay(marker); // 将标注添加到地图中
	marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

	// 添加带有定位的导航控件
	map.addControl(new BMap.NavigationControl({
		// 靠左上角位置
		anchor: BMAP_ANCHOR_TOP_LEFT,
		// LARGE类型
		type: BMAP_NAVIGATION_CONTROL_LARGE,
		// 启用显示定位
		enableGeolocation: true
	}));

	var geolocationControl = new BMap.GeolocationControl();
	geolocationControl.addEventListener("locationSuccess", function(e) {
		// 定位成功事件
		var address = '';
		address += e.addressComponent.province;
		address += e.addressComponent.city;
		address += e.addressComponent.district;
		address += e.addressComponent.street;
		address += e.addressComponent.streetNumber;
		//alert("Location：" + address);
	});
	geolocationControl.addEventListener("locationError", function(e) {
		// 定位失败事件
		//alert(e.message);
	});
	map.addControl(geolocationControl);
}