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
				price: 650,
				whole: {
					bandwidth: 100,
					ips: 32,
					defence: 5,
					collocationMonth: 1,
					collocationNumber: 1,
					price: 36000,
				}
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 500,
				whole: {
					bandwidth: 100,
					ips: 32,
					defence: 5,
					collocationMonth: 1,
					collocationNumber: 1,
					price: 9800,
				}
			},
			{
				bandwidth: 10,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 380,
				whole: {
					bandwidth: 100,
					ips: 32,
					defence: 5,
					collocationMonth: 1,
					collocationNumber: 1,
					price: 5700,
				}
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 460,
				whole: {
					bandwidth: 100,
					ips: 32,
					defence: 5,
					collocationMonth: 1,
					collocationNumber: 1,
					price: 8500,
				}
			},
			{
				bandwidth: 5,
				ips: 1,
				defence: 5,
				collocationMonth: 1,
				collocationNumber: 1,
				price: 400,
				whole: {
					bandwidth: 100,
					ips: 32,
					defence: 5,
					collocationMonth: 1,
					collocationNumber: 1,
					price: 6500,
				}
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
		bandwidthSlider,
		wholeSizeNum = 2;

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
		initializeBuyButtonAction();
		initializeCloseConfigurationConfirmModalButton();
		firstSelectConfigurations();
	}

	function firstSelectConfigurations() {
		if (window.location.href.indexOf('configurations=1U') > -1) {
			$('.configuration-collocation-room a').get(2).click();
			$('.configuration-collocation-size a').get(0).click();
			preSelectBasicConfigurations();
		} else if (window.location.href.indexOf('configurations=2U') > -1) {
			$('.configuration-collocation-room a').get(2).click();
			$('.configuration-collocation-size a').get(1).click();
			preSelectBasicConfigurations();
		} else if (window.location.href.indexOf('configurations=whole') > -1) {
			$('.configuration-collocation-room a').get(2).click();
			$('.configuration-collocation-size a').get(wholeSizeNum).click();
			preSelectBasicConfigurations();
		} else if (window.location.href.indexOf('/server') > -1) {
			$('.configuration-collocation-room a').get(0).click();
			$('.configuration-collocation-size a').get(0).click();
			preSelectBasicConfigurations();
		}

		if ($('.configuration-confirm-modal')[0] && $('.configuration-confirm-modal')[0].innerHTML.indexOf('wpcf7-response-output wpcf7-mail-sent-ok') > -1) {
			alert($('.success-message').text());
			window.location.href = window.location.href.split('#')[0];
		}

		if(window.location.href.indexOf('en_US') > -1){
			$('[english]').each(function(index, element){
				$(element).text($(element).attr('english'));
			});
		}

		if(window.location.href.indexOf('zh_HK') > -1){
			$('[traditional]').each(function(index, element){
				$(element).text($(element).attr('traditional'));
			});
		}
	}

	function preSelectBasicConfigurations() {
		$('.configuration-device-type a').first().click();

		setMinBandWith(bandwidthSlider, basedConfigurations.bandwidth);

		preSelectIPs();
		preSelectDefence();

		$('.configuration-month a').first().click();
	}

	function preSelectIPs(){
		$('.configuration-ips a').each(function(index, element){
			$(element).removeAttr('disabled');
		});

		var enableIPButtonClick = false;
		$('.configuration-ips a').each(function(index, element) {
			if (basedConfigurations.ips == /[0-9]*/.exec($(element).text())[0]) {
				enableIPButtonClick = true;
				$('.configuration-ips a')[index].click();
			}
			if (!enableIPButtonClick) {
				$(element).attr({
					'disabled': true
				});
			}
		});
	}

	function preSelectDefence(){
		$('.configuration-defence a').each(function(index, element){
			$(element).removeAttr('disabled');
		});

		var enableDefenceButtonClick = false;
		$('.configuration-defence a').each(function(index, element) {
			if (basedConfigurations.defence == /[0-9]*/.exec($(element).text())[0]) {
				enableDefenceButtonClick = true;
				$('.configuration-defence a')[index].click();
			}
			if (!enableDefenceButtonClick) {
				$(element).attr({
					'disabled': true
				});
			} else {
				$(element).removeAttr('disabled');
			}
		});
	}

	function setBasicConfigurations() {
		if (selectedConfigurations.collocationSize.id === wholeSizeNum) {
			basedConfigurations = basedConfigurationsList[selectedConfigurations.collocationRoom.id].whole;
			preSelectBasicConfigurations();
		} else {
			basedConfigurations = basedConfigurationsList[selectedConfigurations.collocationRoom.id];
			preSelectBasicConfigurations();
		}
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

			selectedConfigurations.collocationRoom.name = $(element).text();

			selectedConfigurations.collocationSize.id = 0;
			$('.configuration-collocation-size a').get(selectedConfigurations.collocationSize.id).click();

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

			selectedConfigurations.collocationSize.name = $(element).text();

			setBasicConfigurations();
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

			selectedConfigurations.deviceType.name = $(element).text();

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
			ticks_positions: [0, 30, 40, 50, 60, 80, 100],
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
			if ($(this).attr('disabled') || $(this).attr('disabled') == 'disabled')
				return;

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
			if ($(this).attr('disabled'))
				return;

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

	function initializeBuyButtonAction() {
		$('.configuration-confirm-modal').hide();

		toggleSendButtonStatusAccordingToEmail();

		$('.server-buy-button').click(function() {
			$('.configuration-confirm-modal').show();

			$('.configuration-list input.room-value').val(selectedConfigurations.collocationRoom.name);
			$('.configuration-list input.size-value').val(selectedConfigurations.collocationSize.name);
			$('.configuration-list input.type-value').val(selectedConfigurations.deviceType.name);
			$('.configuration-list input.bandwidth-value').val(selectedConfigurations.bandwidth + 'M');
			$('.configuration-list input.ips-value').val(selectedConfigurations.ips + $('.configuration-list input.ips-value').attr('placeholder'));
			$('.configuration-list input.defence-value').val(selectedConfigurations.defence + 'G');
			$('.configuration-list input.month-value').val(selectedConfigurations.collocationMonth + $('.configuration-list input.month-value').attr('placeholder'));
			$('.configuration-list input.number-value').val(selectedConfigurations.collocationNumber + $('.configuration-list input.number-value').attr('placeholder'));

			var configurationsList = '';
			$('.configuration-confirm-modal .input-group').each(function(index, element) {
				configurationsList += $(element).children('span').text() + $(element).children('input').val() + '\r\n';
			});

			$('.hidden-configuration-list textarea').val(configurationsList);
		});
	}

	function toggleSendButtonStatusAccordingToEmail() {
		$('.configuration-confirm-modal input[type="email"]').on('keyup', function(event) {
			if ($(this).val().search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
				$('input.wpcf7-form-control.wpcf7-submit').attr({
					disabled: 'disabled'
				});
			} else {
				$('input.wpcf7-form-control.wpcf7-submit').removeAttr('disabled');
			}
		});
	}

	function initializeCloseConfigurationConfirmModalButton() {
		$('.configuration-confirm-close i').click(function() {
			$('.configuration-confirm-modal').hide();
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

		var labels = [];
		if (value >= 100) {
			bandwidthSlider.slider('setAttribute', 'ticks', [value, 200, 300, 400, 500, 1000]);
			bandwidthSlider.slider('setAttribute', 'ticks_positions', [0, 30, 50, 70, 80, 100]);

			labels = [value + 'M', '200M', '300M', '400M', '500M', '1000M'];
			bandwidthSlider.slider('setAttribute', 'ticks_labels', labels);

			$('.slider-tick-label').empty();

			labels.forEach(function(label, index) {
				$('.slider-tick-label')[index].innerHTML = label;
			});
		} else {
			bandwidthSlider.slider('setAttribute', 'ticks', [value, 100, 200, 300, 400, 500, 1000]);
			bandwidthSlider.slider('setAttribute', 'ticks_positions', [0, 20, 40, 50, 60, 70, 100]);

			labels = [value + 'M', '100M', '200M', '300M', '400M', '500M', '1000M'];
			bandwidthSlider.slider('setAttribute', 'ticks_labels', labels);

			$('.slider-tick-label').empty();

			labels.forEach(function(label, index) {
				$('.slider-tick-label')[index].innerHTML = label;
			});
		}

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
		);

		price = price * selectedConfigurations.collocationMonth * selectedConfigurations.collocationNumber;

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
		$('.total-price-box input.total-price').val(formatTotalPrice(price));
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

	function activeCurrentButton(element) {
		$(element).siblings().removeClass('btn-primary');
		$(element).addClass('btn-primary');
	}

	function addTabIndex(element) {
		$(element).attr({
			'tabindex': 0
		});
	}
});