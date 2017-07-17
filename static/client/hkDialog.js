﻿(function($) {
	$.fn.hkDialog = function(options) {
		if (options == "close") {			
			$(this).parents(".hk_dialog").hide();
		} else {
			var defaults = {
				position : "absolute",
				width : 320,
				title_wrap : "true",
				title : "登录",
				closebtn : "true",
				//显隐默认关闭按钮
				hk_dialog_content : "true",
				lion : "false",
				bg : "true"
			};
			var options = $.extend(defaults, options);
			var sel, wrapper, hk_dialog, close, sel_height;
			sel = $(this);

			if (!sel.parents().hasClass('hk_dialog_wrap')) {
				sel_height = sel.height();
				sel.wrap('<div class="hk_dialog_content"></div>');
				sel.parent().wrap('<div class="hk_dialog_wrap"></div>');
				wrapper = sel.parents('.hk_dialog_wrap');
				wrapper.wrap('<div class="hk_dialog"></div>');
				wrapper.prepend('<label class="hk_dialog_title">' + options.title + '<span class="hk_dialog_close">×</span></label>');
				if (options.closebtn == "false") {
					$('.hk_dialog_close').css("display", "none");
				}
				if (options.title_wrap == "false") {
					$('.hk_dialog_title').css("display", "none");
				}
				if (options.hk_dialog_content == "false") {
					$('.hk_dialog_content').removeClass('hk_dialog_content');
				}
				if (options.lion == "true") {
					sel.parent().append('<div class="lion"></div>');
				}
				hk_dialog = wrapper.parent();
				if (options.bg == "true") {
					hk_dialog.prepend('<div class="hk_dialog_bg"></div>');
				}
				/*
				if (sel.prop("tagName") == "IFRAME") {
				sel.load(function() {
				sel_height = sel.contents().height();
				sel.height(sel_height);
				position();
				});
				};*/
				//关闭事件
				closeEvent();
				//定位
				positionEvent();
			} else {
				positionEvent();
			}

			//关闭事件
			function closeEvent() {
				close = sel.parents('.hk_dialog').find(".hk_dialog_close");
				close.on("click", function() {
					$(this).parents(".hk_dialog").hide();
				});
			};

			//计算定位
			function positionEvent() {
				sel.parents('.hk_dialog_wrap').css({
					"min-width" : options.width,
					"position" : options.position,
					"left" : function() {
						var w1, w2, w, x, min_width;
						w1 = $(window).width();
						w2 = sel.width();
						min_width = options.width;
						if (min_width < w2) {
							w = (w1 - w2) / 2;
						} else {
							w = (w1 - min_width) / 2;
						}
						return w;
					},
					"top" : function() {
						var h, h1, h2;
						h1 = $(window).height();
						h2 = sel.height();
						if (options.position == "absolute") {
							h = (h1 - h2) / 2 - 60 + $(document).scrollTop();
						} else {
							h = (h1 - h2) / 2 - 60;
						}

						if (h < 0) {
							return 0;
						} else {
							return h;
						}

					}
				});
			};
			//延迟，定位后弹出无闪动
			setTimeout(function() {
				sel.show();
				sel.parents(".hk_dialog").css("display", "block");
			}, 200);
		}
			return this;
	};
})(jQuery); 