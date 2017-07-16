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
		var allowIPList = ['103.72.166.84', '103.44.62.144', '183.2.185.59', '117.136.79.147', '121.35.189.65', '183.11.129.156', '106.185.48.181', '120.80.57.52'];

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

	function switchTabOnCompanyPage() {
		$('.company-tab #content-tab-headquarters').click(function() {
			$('#tab-hongkong-content').hide();
			$('#tab-headquarters-content').show();
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
		});

		$('.company-tab #content-tab-headquarters').click();

		$('.company-tab #content-tab-hongkong').click(function() {
			$('#tab-headquarters-content').hide();
			$('#tab-hongkong-content').show();
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
		});
	}
});