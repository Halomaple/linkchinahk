var selectedConfigurations = {
	collocationRoom: '',
	collocationSize: '',
	deviceType: ''
};


selectCollocationRoom();
selectCollocationSize();
selectDeviceType();
setBandwith();

function selectCollocationRoom() {
	$('.configuration-collocation-room a').click(function() {
		selectedConfigurations.collocationRoom = $(this).text();
		calculateTotalPrice();
	});
}

function selectCollocationSize() {
	$('.configuration-collocation-size a').click(function() {
		selectedConfigurations.collocationSize = $(this).text();
		calculateTotalPrice();
	});
}

function selectDeviceType() {
	$('.configuration-device-type a').click(function() {
		selectedConfigurations.deviceType = $(this).text();
		calculateTotalPrice();
	});
}

function setBandwith() {
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
	});

	$('#bandwith-value').on('keyup mouseup', function(event) {
		if ($(this).val() > 1000) {
			$(this).val(1000);
			bandwidthSlider.slider('setValue', $(this).val());
		} else {
			bandwidthSlider.slider('setValue', $(this).val());
		}
	});

	$('#bandwith-value').on('change', function(event) {
		if ($(this).val() < 1) {
			$(this).val(1);
			bandwidthSlider.slider('setValue', $(this).val());
		} else {
			bandwidthSlider.slider('setValue', $(this).val());
		}
	});
}

function calculateTotalPrice() {
	var price = 100;

	console.log(selectedConfigurations);
	$('.total-price-box input').val(price);
}