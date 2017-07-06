$(document).ready(function() {
	var configurationsList = {
			collocationRooms: [],
			collocationSizes: [],
			deviceTypes: [],
			bandwidths: 1,
			ips: [],
			defence: [],
			collocationMonths: [],
			collocationNumbers: []
		},
		selectedConfigurations = {
			collocationRoom: {
				id: 0,
				name: ''
			},
			collocationSize: {
				id: 0,
				name: ''
			},
			deviceType: {
				id: 0,
				name: ''
			},
			bandwidth: 1,
			ips: 1,
			defence: 5,
			collocationMonth: 1,
			collocationNumber: 1
		},
		pricesList = [{
				bandwidthPrice: 450,
				ipPrice: 50,
				defencePrice: 700
			},
			{
				bandwidthPrice: 50,
				ipPrice: 50,
				defencePrice: 700
			},
			{
				bandwidthPrice: 16,
				ipPrice: 50,
				defencePrice: 700
			},
			{
				bandwidthPrice: 25,
				ipPrice: 50,
				defencePrice: 700
			},
			{
				bandwidthPrice: 15,
				ipPrice: 50,
				defencePrice: 700
			}
		],
		basedConfigurationsList = [{
				bandwidth: 2,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 650
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 500
			},
			{
				bandwidth: 10,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 380
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 460
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 400
			}
		],
		basedConfigurations = {
			bandwidth: 10,
			ips: 1,
			defence: 5,
			collocationMonth: 1,
			collocationNumber: 1,
			price: 380
		},
		bandwidthSlider;

	initializeConfiguration();

	function initializeConfiguration() {
		initializeCollocationRoom();
		initializeCollocationSize();
		initializeDeviceType();
		initializeBandwith();
		initializeIPs();
		initializeDefence();
		initializeCollocationMonth();
		initializeCollocationNumber();
		firstSelectConfigurations();
	}

	function firstSelectConfigurations() {
		if (window.location.href.indexOf('configurations=1U') > -1) {
			preSelectBasicConfigurations(2);
		} else if (window.location.href.indexOf('configurations=2U') > -1) {
			preSelectBasicConfigurations(2, 1);
		} else if (window.location.href.indexOf('configurations=whole') > -1) {
			preSelectBasicConfigurations(2, 2);
		}
	}

	function preSelectBasicConfigurations(roomId, sizeNum) {
		$('.configuration-collocation-room a').get(roomId).click();
		$('.configuration-collocation-size a').get(sizeNum ? sizeNum : 0).click();
		$('.configuration-device-type a').first().click();

		setMinBandWith(bandwidthSlider, basedConfigurations.bandwidth);

		$('.configuration-ips a').first().click();
		$('.configuration-defence a').first().click();
		$('.configuration-month a').first().click();
	}

	function setBasicConfigurations() {
		basedConfigurations = basedConfigurationsList[selectedConfigurations.collocationRoom.id];
		preSelectBasicConfigurations(selectedConfigurations.collocationRoom.id);
	}

	function activeCurrentButton(element) {
		$(element).siblings().removeClass('btn-primary');
		$(element).addClass('btn-primary');
	}

	function addTabIndex(element) {
		$(element).attr({
			'tabindex': 0
		});
	}

	function initializeCollocationRoom() {
		$('.configuration-collocation-room a').each(function(index) {
			addTabIndex(this);
			configurationsList.collocationRooms.push({
				id: index,
				name: $(this).text()
			});
		});

		$('.configuration-collocation-room a').click(function() {
			var element = this;
			activeCurrentButton(element);
			selectedConfigurations.collocationRoom.id = configurationsList.collocationRooms.filter(function(r) {
				return r.name == $(element).text();
			})[0].id;

			setBasicConfigurations();
			calculateTotalPrice();
		});
	}

	function initializeCollocationSize() {
		$('.configuration-collocation-size a').each(function(index) {
			addTabIndex(this);

			configurationsList.collocationSizes.push({
				id: index,
				name: $(this).text()
			});
		});

		$('.configuration-collocation-size a').click(function() {
			var element = this;
			activeCurrentButton(element);

			selectedConfigurations.collocationSize.id = configurationsList.collocationSizes.filter(function(r) {
				return r.name == $(element).text();
			})[0].id;

			calculateTotalPrice();
		});
	}

	function initializeDeviceType() {
		$('.configuration-device-type a').each(function(index) {
			addTabIndex(this);

			configurationsList.deviceTypes.push({
				id: index,
				name: $(this).text()
			});
		});

		$('.configuration-device-type a').click(function() {
			var element = this;
			activeCurrentButton(element);

			selectedConfigurations.deviceType.id = configurationsList.deviceTypes.filter(function(r) {
				return r.name == $(element).text();
			})[0].id;

			calculateTotalPrice();
		});
	}

	function initializeBandwith() {
		bandwidthSlider = $('#bandwith-slider').slider({
			tooltip: 'always',
			min: 1,
			max: 1000,
			step: 1,
			value: 1,
			ticks: [1, 100, 200, 300, 400, 500, 1000],
			ticks_positions: [0, 10, 20, 30, 50, 70, 100],
			ticks_labels: ['1M', '100M', '200M', '300M', '400M', '500M', '1000M'],
			ticks_snap_bounds: 2,
			formatter: function(value) {
				return value + 'M';
			}
		});

		$('#bandwith-slider').on('slide', function(slideEvt) {
			syncBandwidth(bandwidthSlider, slideEvt.value);
		}).on('click mousedown', function() {
			syncBandwidth(bandwidthSlider, bandwidthSlider.slider('getValue'));
		});

		$('#bandwith-value').on('keyup mouseup', function(event) {
			if ($(this).val() > 1000) {
				$(this).val(1000);
				syncBandwidth(bandwidthSlider, $(this).val());
			} else if ($(this).val() < basedConfigurations.bandwidth) {
				$(this).val(basedConfigurations.bandwidth);
				syncBandwidth(bandwidthSlider, $(this).val());
			} else {
				syncBandwidth(bandwidthSlider, $(this).val());
			}
		});
	}

	function initializeIPs() {
		$('.configuration-ips a').each(function(index, el) {
			addTabIndex(this);
		});

		$('.configuration-ips a').click(function(event) {
			activeCurrentButton(this);

			selectedConfigurations.ips = getNumberFromText($(this).text());
			calculateTotalPrice();
		});
	}

	function initializeDefence() {
		$('.configuration-defence a').each(function() {
			addTabIndex(this);
		});

		$('.configuration-defence a').click(function(event) {
			activeCurrentButton(this);
			selectedConfigurations.defence = getNumberFromText($(this).text());
			calculateTotalPrice();
		});
	}

	function initializeCollocationMonth() {
		$('.configuration-month a').each(function(index, el) {
			addTabIndex(this);
		});

		$('.configuration-month a').click(function() {
			activeCurrentButton(this);

			selectedConfigurations.collocationMonth = getNumberFromText($(this).text());
			calculateTotalPrice();
		});
	}

	function initializeCollocationNumber() {
		$('.configuration-number input').each(function() {
			addTabIndex(this);
		});

		$('.configuration-number input').on('keyup mouseup', function() {
			if ($(this).val() > 20) {
				$(this).val(20);
			} else if ($(this).val() < 1) {
				$(this).val(1);
			}
			selectedConfigurations.collocationNumber = $(this).val();
			calculateTotalPrice();
		});
	}

	function getNumberFromText(text) {
		return parseInt(/[0-9]*/.exec(text)[0]);
	}

	function syncBandwidth(bandwidthSlider, value) {
		value = parseInt(value);
		bandwidthSlider.slider('setValue', value);
		selectedConfigurations.bandwidth = value;
		$('#bandwith-value').val(value);
		calculateTotalPrice();
	}

	function setMinBandWith(bandwidthSlider, value) {
		bandwidthSlider.slider('setAttribute', 'min', value);
		bandwidthSlider.slider('setAttribute', 'value', value);
		bandwidthSlider.slider('setAttribute', 'ticks', [value, 100, 200, 300, 400, 500, 1000]);
		bandwidthSlider.slider('setAttribute', 'ticks_labels', [value + 'M', '100M', '200M', '300M', '400M', '500M', '1000M']);
		$('.slider-tick-label')[0].innerHTML = value + 'M';

		$('#bandwith-value').attr({
			'min': value
		});

		syncBandwidth(bandwidthSlider, value);
	}

	function buildTotalPrice() {
		var price = basedConfigurations.price;
		price += (
			getFinalCollocationSizePrice() +
			(selectedConfigurations.bandwidth - basedConfigurations.bandwidth) * pricesList[selectedConfigurations.collocationRoom.id].bandwidthPrice +
			(selectedConfigurations.ips - basedConfigurations.ips) * pricesList[selectedConfigurations.collocationRoom.id].ipPrice +
			(selectedConfigurations.defence - basedConfigurations.defence) * pricesList[selectedConfigurations.collocationRoom.id].defencePrice
		) * selectedConfigurations.collocationMonth * selectedConfigurations.collocationNumber;

		return price;
	}

	function getFinalCollocationSizePrice() {
		var price = 0;
		switch (selectedConfigurations.collocationSize.id) {
			case configurationsList.collocationSizes[0].id:
				price = 0;
				break;
			case configurationsList.collocationSizes[1].id:
				price = 100;
				break;
			case configurationsList.collocationSizes[2].id:
				price = 0;
				break;
			default:
				price = 0;
		}
		return price;
	}

	function formatTotalPrice(price) {
		var totalPrice = '';

		price = price.toString().split('').reverse().join('').split('');
		for (var i = 0; i < price.length; i++) {
			if (i > 0 && i % 3 === 0) {
				totalPrice += ',';
			}
			totalPrice += price[i];
		}

		return totalPrice.split('').reverse().join('') + '.00';
	}

	function calculateTotalPrice() {
		var price = buildTotalPrice();
		$('.total-price-box input').val(formatTotalPrice(price));
	}

	function useBasePriceCheckFn(basedConfigurationsItem) {
		var useBasePrice = false;
		if (selectedConfigurations.bandwidth == basedConfigurationsItem.bandwidth &&
			selectedConfigurations.ips == basedConfigurationsItem.ips &&
			selectedConfigurations.defence == basedConfigurationsItem.defence) {
			useBasePrice = true;
		}

		return useBasePrice;
	}
});