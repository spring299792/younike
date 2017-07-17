﻿(function($) {
	$.fn.hkCount = function(options) {
		var defaults = {
			maxNum : 0, //0：不限制最大值
			minNum : 1,
			onChange : function(e) {
				//alert(e);
			}
		};
		var options = $.extend(defaults, options);
		this.each(function() {
			var sel, num, add, minus;
			sel = $(this);
			num = sel.find('.hkCount_num');
			add = sel.find('.hkCount_add');
			minus = sel.find('.hkCount_minus');
			num.css("ime-mode", "disabled");
			num.bind("keypress", function(e) {
				if (e.charCode === 0)
					return true;
				//非字符键 for firefox
				var code = (e.keyCode ? e.keyCode : e.which);
				//兼容火狐 IE
				return code >= 48 && code <= 57;
			});
			num.bind("blur", function() {
				if (!/\d+/.test(this.value)) {
					this.value = "";
				}
			});
			num.bind("paste", function() {
				if (window.clipboardData) {
					var s = clipboardData.getData('text');
					if (!/\D/.test(s)) {
						value = parseInt(s, 10);
						return true;
					}
				}
				return false;
			});
			num.bind("dragenter", function() {
				return false;
			});
			num.bind("keyup", function() {
				if (this.value !== '0' && /(^0+)/.test(this.value)) {
					this.value = parseInt(this.value, 10);
				}
				
				if (num.val() <= options.minNum || num.val() == "") {
									options.onChange(num.val());
									add.removeClass('disabled');
									minus.addClass('disabled');
								} else if (options.maxNum != 0 && num.val() == options.maxNum) {
									add.addClass('disabled');
									minus.removeClass('disabled');
								} else if (options.maxNum != 0 && num.val() > options.maxNum) {
									options.onChange(num.val());
									num.val(function () { return options.maxNum });
									add.addClass('disabled');
									minus.removeClass('disabled');
								} else {
									minus.removeClass('disabled');
									add.removeClass('disabled');
								}
			


			});
			num.bind("propertychange", function(e) {
				if (isNaN(this.value))
					this.value = this.value.replace(/\D/g, "");
			});
			num.bind("input", function(e) {
				if (isNaN(this.value))
					this.value = this.value.replace(/\D/g, "");
			});

			if (num.val() == options.minNum) {
				minus.addClass('disabled');
			};
			add.on("click", function() {
				num.val(function() {
					if (options.maxNum == 0) {
						minus.removeClass('disabled');
						return parseInt(num.val()) + 1;
					} else {
						if (parseInt(num.val()) < options.maxNum - 1) {
							minus.removeClass('disabled');
							return parseInt(num.val()) + 1;
						} else {
							add.addClass('disabled');
							return options.maxNum;
						}
					}
				});
				options.onChange(num.val());
			});
			minus.on("click", function() {
				num.val(function() {
					if (parseInt(num.val()) > options.minNum + 1) {
						add.removeClass('disabled');
						return parseInt(num.val()) - 1;
					} else {
						minus.addClass('disabled');
						return options.minNum;
					}
				});
				options.onChange(num.val());
			});

		});
	};
})(jQuery); 