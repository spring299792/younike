$(function() {
	loginInfo();
	searchBar();

	// tabs切换
	$(".register_tabs li").click(function() {
		var cc = $(this).children().attr("class");
		$(this).addClass("active").siblings().removeClass("active");
		$(this).parent().parent().find(cc).show().siblings().hide();
	});

	// c_pagehome_order设置高度
	$(".c_order_content").find('.c_order_main:last-child').css("border-bottom",
			"none");

	// 通知关闭
	$(".alert_close").click(function() {
		$(this).parent().hide(0);
	});
	// 输入提示兼容IE
	$('.search_content input[name="query"]')
			.ready(
					function() {
						if (!$.support.placeholder) {
							var $placeholderInput = $('.search_content input[name="query"]');
							var placeholder = $(
									'.search_content input[name="query"]')
									.attr('placeholder');
							$placeholderInput.val(placeholder).css("color",
									"#666");
							$placeholderInput.focus(function() {
								if ($(this).val() == placeholder) {
									$(this).val("").css("color", "#333");
								}
							});
							$placeholderInput.blur(function() {
								if ($(this).val() == "") {
									$(this).val(placeholder).css("color",
											"#666");
								}
							});
						}
					});

});
/**
 * 头部登录信息设置
 */
function loginInfo() {
	// 异步请求登陆信息
	var userUl = $(".top ul.user_info");
	isLogin = false;
	$.post(_webApp + "/login/loginHeader",function(result) {
		if (result.isLogin == true) {
			var loginHtml = '<li >你好，<a href="/user/center/order">'
					+ result.userName
					+ '</a>[<span class="count"><a href="javascript:logOutAll();">退出</a></span>]</li><li class="divider"></li><li><a href="/user/center/order">我的订单</a></li>';
			$(userUl).html(loginHtml);
			isLogin = true;
		} else {
			isLogin = false;
		}
	}, "json");
}

function logOutAll() {
	window.location.href = _webApp + "/login/logout";
}

/**
 * 搜索栏
 */
function searchBar() {
	$('.search_content .search_btn').click(function() {
		$(this).parents('form').submit();
	});
	// 搜索框
	$(".category").mouseenter(function() {
		$(".category").find("ul").slideDown(100);
	}).mouseleave(function() {
		$(this).find("ul").slideUp(100);
	});
}

/**
 * 格式价格
 */
function currencyFormatted(amount) {
	var i = parseFloat(amount);
	// if(isNaN(i)) {
	// i = 0.00;
	// }
	var minus = '';
	if (i < 0) {
		minus = '-';
	}
	i = Math.abs(i);
	i = parseInt((i + .005) * 100);
	i = i / 100;
	s = new String(i);
	if (s.indexOf('.') < 0) {
		s += '.00';
	}
	if (s.indexOf('.') == (s.length - 2)) {
		s += '0';
	}
	s = minus + s;
	return s;
}

String.prototype.trim = function() {
	return this.replace(/^\s*(\S*(?:\s \S )*)\s*$/, '$1');
};
/**
 * 时间格式化
 * 
 * @param {Object}
 *            fmt
 */
Date.prototype.format = function(fmt) {// author: meizz
	var o = {
		"M+" : this.getMonth() + 1, // 月份
		"d+" : this.getDate(), // 日
		"h+" : this.getHours(), // 小时
		"m+" : this.getMinutes(), // 分
		"s+" : this.getSeconds(), // 秒
		"q+" : Math.floor((this.getMonth() + 3) / 3), // 季度
		"S" : this.getMilliseconds()
	// 毫秒
	};
	if (/(y+)/.test(fmt))
		fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "")
				.substr(4 - RegExp.$1.length));
	for ( var k in o)
		if (new RegExp("(" + k + ")").test(fmt))
			fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k])
					: (("00" + o[k]).substr(("" + o[k]).length)));
	return fmt;
};
