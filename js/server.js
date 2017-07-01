$(document).ready(function() {
	var selectedConfigurations = {
		collocationRoom: '',
		collocationSize: '',
		deviceType: '',
		bandwidth: 1
	};

	initializeConfiguration();

	function initializeConfiguration() {
		initializeCollocationRoom();
		initializeCollocationSize();
		initializeDeviceType();
		initialBandwith();
	}

	function initializeCollocationRoom() {
		$('.configuration-collocation-room a').click(function() {
			$(this).siblings().removeClass('btn-primary');
			$(this).addClass('btn-primary');
			selectedConfigurations.collocationRoom = $(this).text();
			calculateTotalPrice();
		});
	}

	function initializeCollocationSize() {
		$('.configuration-collocation-size a').click(function() {
			$(this).siblings().removeClass('btn-primary');
			$(this).addClass('btn-primary');
			selectedConfigurations.collocationSize = $(this).text();
			calculateTotalPrice();
		});
	}

	function initializeDeviceType() {
		$('.configuration-device-type a').click(function() {
			$(this).siblings().removeClass('btn-primary');
			$(this).addClass('btn-primary');
			selectedConfigurations.deviceType = $(this).text();
			calculateTotalPrice();
		});
	}

	function initialBandwith() {
		var bandwidthSlider = $('#bandwith-slider').slider({
			tooltip: 'always',
			ticks: [0, 100, 200, 300, 400, 500, 1000],
			ticks_positions: [0, 10, 20, 30, 50, 70, 100],
			ticks_labels: ['1M', '100M', '200M', '300M', '400M', '500M', '1000M'],
			ticks_snap_bounds: 2,
			formatter: function(value) {
				return value + 'M';
			}
		});

		$('#bandwith-slider').on('slide', function(slideEvt) {
			$('#bandwith-value').val(slideEvt.value);
			syncBandwidth(bandwidthSlider, slideEvt.value);
		}).on('click mousedown',function(){
			$('#bandwith-value').val(bandwidthSlider.slider('getValue'));
		});

		$('#bandwith-value').on('keyup mouseup', function(event) {
			if ($(this).val() > 1000) {
				$(this).val(1000);
				syncBandwidth(bandwidthSlider, $(this).val());
			} else {
				syncBandwidth(bandwidthSlider, $(this).val());
			}
		}).on('change', function(event) {
			if ($(this).val() < 1) {
				$(this).val(1);
				syncBandwidth(bandwidthSlider, $(this).val());
			} else {
				syncBandwidth(bandwidthSlider, $(this).val());
			}
		});
	}

	function syncBandwidth(bandwidthSlider, value) {
		bandwidthSlider.slider('setValue', value);
		selectedConfigurations.bandwidth = value;
		calculateTotalPrice();
	}

	function calculateTotalPrice() {
		var price = 100;

		$('.total-price-box input').val(price);
	}

});