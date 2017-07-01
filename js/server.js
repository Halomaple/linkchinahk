$(document).ready(function() {
	var configurationsList = {
		collocationRooms: [],
		collocationSizes: [],
		deviceTypes: [],
		bandwidths: 1
	};

	var selectedConfigurations = {
		collocationRoom: {
			id: 0,
			name: ''
		},
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
		$('.configuration-collocation-room a').each(function(index) {
			configurationsList.collocationRooms.push({
				id: index,
				name: $(this).text()
			});
		});

		$('.configuration-collocation-room a').click(function() {
			var element = this;
			$(element).siblings().removeClass('btn-primary');
			$(element).addClass('btn-primary');

			selectedConfigurations.collocationRoom.id = configurationsList.collocationRooms.filter(function(r) {
				return r.name == $(element).text();
			})[0].id;

			calculateTotalPrice();
		});
	}

	function initializeCollocationSize() {
		$('.configuration-collocation-size a').each(function(index) {
			configurationsList.collocationSizes.push({
				id: index,
				name: $(this).text()
			});
		});

		$('.configuration-collocation-size a').click(function() {
			$(this).siblings().removeClass('btn-primary');
			$(this).addClass('btn-primary');
			selectedConfigurations.collocationSize = $(this).text();
			calculateTotalPrice();
		});
	}

	function initializeDeviceType() {
		$('.configuration-device-type a').each(function(index) {
			configurationsList.deviceTypes.push({
				id: index,
				name: $(this).text()
			});
		});
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
			ticks: [1, 100, 200, 300, 400, 500, 1000],
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
		}).on('click mousedown', function() {
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
		selectedConfigurations.bandwidth = parseInt(value);
		calculateTotalPrice();
	}

	function calculateTotalPrice() {
		var price = 0;

		switch (selectedConfigurations.collocationRoom.id) {
			case configurationsList.collocationRooms[0].id:{
				price = selectedConfigurations.bandwidth * 450 + 650 ;
			}
		}

		$('.total-price-box input').val(price);
	}

});