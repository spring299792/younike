$(function () {
    initNurseShow();
    initEvent();
});
var servicesDateQuerys = [];
// 临时
var isTemp = false;
//保姆页面不能下单，用图片替换
function initNurseShow() {

    if ($("#servicesId").val() == 322||$("#servicesId").val() == 326||$("#servicesId").val() == 325||$("#servicesId").val() == 323||$("#servicesId").val() == 324) {
        $(".serve_order").empty();
        $(".serve_order").append("<img src='../images/common/nurse-sidebar-02.jpg?v=20160830' />");
    }
}
/**
 * 初始化页面事件
 */
function initEvent() {
    commentList(servicesId, 1);
    // 日历控件
    $('#date').datepicker({
        minDate: countMinDate(),
        maxDate: countMaxDate(),
        closeText: true,
        onSelect: function (dateText, inst) {
            $('#date').addClass('selected');
            var selectDate = new Date();
            selectDate.setFullYear(inst.selectedYear, inst.selectedMonth, inst.selectedDay);
            var day = selectDate.getDay();
            var weeksStr = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
            $('.data_week').text(weeksStr[day]);
            query();
        }
    });

    $("#date").attr("value", dateSelect);
    if (dateSelect != "") {
        $("#date").attr("placeholder", "").addClass("selected");
    }
    // 视频播放
    $("#play").hover(function () {
        $(".video-titbg").stop().animate({
            bottom: '-1px'
        }, 600);
        $("#videoPlay").addClass("playa");
    }, function () {
        $(".video-titbg").stop().animate({
            bottom: '-63px'
        }, 600);
        $("#videoPlay").removeClass("playa");
    });
    $("#play").click(function () {
        $("#play").hide();
        $("#youkuplayer").show();
    });

    // tabs切换
    $('.nav_tabs li').click(function () {
        var index_num = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $(this).parents('.nav_tabs').next().find('.tab_pane').eq(index_num).addClass('active').siblings().removeClass('active');
    });

    // 数量选择框
    if (!limitNum) {
        limitNum = 10;
    }
    $('.hkCount_wrap').hkCount({
        maxNum: limitNum,
        minNum: 1,
        onChange: function (num) {
            query();
        }
    });
    // 单选框
    $(".hk_select").click(function () {
        if (!$(this).hasClass('disabled')) {
            var $parent = $(this).parent();
            if ($(this).hasClass('selected')) {
                $parent.find('.hk_select').removeClass("selected");
                $('.createOrder').text('选择完善服务需求');
                $('.createOrder').addClass('disabled');
                setServeInfo();
            } else {
                $parent.find('.hk_select').removeClass("selected");
                $(this).addClass("selected");
                query();
            }
        }
    });

    // 浮动目录栏
    var min_height = $('.side').prev().offset().top + $('.side').prev().height();
    var serve_order_height = $('.serve_order').height();
    $(window).scroll(function () {
        if (serve_order_height != $('.serve_order').height()) {
            serve_order_height = $('.serve_order').height();
            min_height = $('.side').prev().offset().top + $('.side').prev().height();
        }
        var max_height = $('body').height() - $('.footer').height() - 550;
        var scrollTop = $(document).scrollTop();
        var H = $('.serve_right_wrap').offset().top + $('.serve_right_wrap').height() - 200;
        $('.detail_item').each(function () {
            var difference = $(this).offset().top - scrollTop;
            if (difference > 0 && difference < 150) {
                $('.detail_item').removeClass('action');
                $(this).addClass('action');
                var x = $(this).index();
                $('.speed_nav_wrap li').eq(x - 1).addClass('active').siblings().removeClass('active');
                return false;
            }
        });
        if (scrollTop <= min_height) {
            $('.side').css({
                "position": "static",
                "left": "0px",
                "top": H
            }).find('.speed_nav_wrap').hide();
        } else if (scrollTop > min_height && scrollTop < max_height) {
            $('.side').css({
                "position": "fixed",
                "left": function () {
                    var x1 = $("body").css("width");
                    var y1 = (x1.substring(0, x1.length - 2) - 960) / 2;
                    var y2 = y1 + 593;
                    return y2;
                },
                "top": "350px"

            }).find('.speed_nav_wrap').show();
        } else {
            $('.side').css({
                "position": "absolute",
                "left": "15px",
                "top": max_height + 90
            }).find('.speed_nav_wrap').show();
        }
    });
    // 提交订单
    $('.createOrder').click(function () {
        if (!$(this).hasClass('disabled')) {
            if (false == isLogin) {
                hkLogin(function () {
                    submitServices();
                });
            } else {
                submitServices();
            }
        }
    });
    $('.speed_nav_wrap a').click(function () {
        $(this).parents('li').addClass('active').siblings().removeClass('active');
    });
    $('.backtop a').click(function () {
        $("body").animate({
            scrollTop: 0
        }, "slow");
    });
    // 返回顶部for IE
    $('.backtop a').click(function () {
        $("html").animate({
            scrollTop: 0
        }, "slow");
    });
    // 特卖
    $(".promotion_content div").hover(function () {
        $(this).find(".wave_line").addClass("wave_bottom").parent().prev().find(".wave_line").addClass("wave_top");
    }, function () {
        $(this).find(".wave_line").removeClass("wave_bottom").parent().prev().find(".wave_line").removeClass("wave_top");
    });
    // 输入提示兼容IE
    if (!$.support.placeholder) {
        $(".date-js-for-ie").each(function () {
            var placeholder = $(this).attr('placeholder');
            if (placeholder) {
                $(this).val(placeholder).css("color", "#999");
                $(this).focus(function () {
                    if ($(this).val() == $(this).attr('placeholder')) {
                        $(this).val("").css("color", "#333");
                    }
                });
            }
        });
    }

    // 地区选择
    $('.district_prop .hk_select,.district_prop  .hk_select_o').click(function () {
        if (!$(this).hasClass('disabled')) {
            var prompt = $(this).attr('data-prompt');
            if (prompt) {
                $(".district-prompt span").text("提示：" + prompt);
                $(".district-prompt").show();
            } else {
                $(".district-prompt").hide();
            }
        }
    });
}

/**
 * 查询sku价格库存信息
 */
function query() {
    setServeInfo();
    var date = getServicesDate();
    var quantity = $.trim($('#quantity').val());
    if (date != '' && quantity != '' && quantity > 0) {
        var skus = getDateQuery(date);
        if (skus) {
            querySKU(skus, quantity);
        } else {
            ajaxToQuery(date, quantity);
        }
    }
}

/**
 *查询sku
 */
function querySKU(skus, quantity) {
    filterUsablePV(skus, quantity);
    if ($('.prop_nv').length == $('.prop_nv .selected').length) {
        var selectedSkuStr = getSelectedPropArr().join(';');
        for (var i = 0; i < skus.length; i++) {
            var skuStr = skus[i].datetime + ";" + skus[i].props;
            if (skuStr == selectedSkuStr) {
                setPrice(skus[i], quantity);
                break;
            }
        }
    }
}

/**
 * 获取已选中的属性字符串
 */
function getSelectedPropArr() {
    pvs = [];
    // 时间属性
    $('.time_prop .hk_select.selected').each(function () {
        pvs.push($(this).attr('data-value'));
    });
    if (serviceTime) {
        pvs.push(serviceTime);
    }
    // 地区属性
    $('.district_prop .hk_select.selected').each(function () {
        pvs.push($(this).attr('data-value'));
    });
    // 销售属性
    $('.sale_prop .hk_select.selected').each(function () {
        pvs.push($(this).attr('data-value'));
    });
    return pvs;
}

/**
 * 过滤可用属性值
 */
function filterUsablePV(skus, quantity) {
    var spArr = getSelectedPropArr();
    var sign = 1;
    if (spArr.length) {
        // 有选中选项
        // 【包含选中项的可用SKU】
        var usableSKU = [];
        // 【不包含选中项的其他可用SKU】
        var usableOtherSKU = [];
        for (var i = 0; i < skus.length; i++) {
            if (skus[i].number >= quantity) {
                for (var j = 0; j < spArr.length; j++) {
                    var propsStr = skus[i].datetime + ";" + skus[i].props + ";";
                    if (propsStr.indexOf(spArr[j]) >= 0) {
                        usableSKU.push(propsStr);
                    } else {
                        usableOtherSKU.push(propsStr);
                    }
                }
            }
        }
        if (usableSKU.length || usableOtherSKU.length) {
            $('.prop_nv .hk_select').removeClass('disabled');
            // 组装字符串
            var skuStr = usableSKU.join(';');
            var skuOtherStr = usableOtherSKU.join(';');
            for (var j = 0; j < spArr.length; j++) {
                var pIndex = $('.prop_nv').index($('.hk_select[data-value="' + spArr[j] + '"]').parents('.prop_nv'));
                $('.prop_nv').each(function (vIndex) {
                    $('.hk_select', this).each(function (nvIndex) {
                        var pnv = $(this).attr('data-value');
                        if (skuStr.indexOf(pnv) >= 0) {
                            // 将【包含选中项可用SKU】的属性值全部标记为可选
                            $(this).removeClass('disabled');
                            sign = 0;
                        } else if (vIndex == pIndex && skuOtherStr.indexOf(pnv) >= 0) {
                            // 如果和选中项同属性且属于【其他可用SKU】，标记为可选
                            $(this).removeClass('disabled');
                            sign = 0;
                        } else {
                            $(this).addClass('disabled');
                        }
                    });
                });
            }
        } else {
            // 如果发现无可用sku则直接将全部按钮禁用
            $('.prop_nv .hk_select').addClass('disabled');
        }
    } else {
        // 无选中选项
        var usableSKU = [];
        for (var i = 0; i < skus.length; i++) {
            if (skus[i].number >= quantity) {
                usableSKU.push(skus[i].datetime + ";" + skus[i].props + ";");
            }
        }
        if (usableSKU.length) {
            var skuStr = usableSKU.join(';');
            $('.prop_nv .hk_select').each(function () {
                var pnv = $(this).attr('data-value');
                if (skuStr.indexOf(pnv) >= 0) {
                    $(this).removeClass('disabled');
                    sign = 0;
                } else {
                    $(this).addClass('disabled');
                }
            });
        } else {
            // 如果发现无可用sku则直接将全部按钮禁用
            $('.prop_nv .hk_select').addClass('disabled');
        }
    }
    // 如果全部属性值不可用，提示库存
    if (sign) {
        $('.createOrder').text('预订已满');
    } else {
        $('.createOrder').text('请完善服务需求');
    }
}

/**
 * 获取查询数据
 */
function getDateQuery(date) {
    for (var i in servicesDateQuerys) {
        if (servicesDateQuerys[i].date == date) {
            return servicesDateQuerys[i].skus;
            break;
        }
    }
}

/**
 * ajax查询sku综合信息
 */
function ajaxToQuery(date, quantity) {
    var url = _webApp + '/services/query';
    $.post(url, {
        servicesId: servicesId,
        date: date
    }, function (data) {
        if (data && data.result == "success") {
            servicesDateQuerys.push(data);
            // 查询SKU
            querySKU(data.skus, quantity);
        } else {
            $('.createOrder').text('出错啦请重新选择');
            $('.createOrder').addClass('disabled');
        }

    }, 'json');
}

/*
 * 设置价格相关
 */
function setPrice(sku, quantity) {
    var tp;
    if (sku.number - quantity >= 0) {
        $('#sevicesForm input[name="skuId"]').val(sku.id);
        if ($('.credit-staging dd.on').length) {
            $('.createOrder').text('生成服务订单（授信分期）');
        } else {
            $('.createOrder').text('生成服务订单');
        }
        $('.createOrder').removeClass('disabled');
    } else {
        $('.createOrder').text('预订已满');
        $('.createOrder').addClass('disabled');
    }
    if (sku.specialPrice) {
        var otp = sku.price * quantity;
        tp = sku.specialPrice * quantity;
        var tips = sku.specialText;
        var priceHtml = '<div><span class="price_name">原&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价:</span> <span class="serve_original_price">￥' + currencyFormatted(otp) + '</span></div>' + '<div><span class="price_name">服务价格:</span> <span class="serve_price">￥' + currencyFormatted(tp) + '</span><span class="price_tips">' + tips + '</span></div>';
        $('.serve_price_wrap').html(priceHtml).addClass('special_price');
    } else {
        tp = sku.price * quantity;
        var priceHtml = '<div><span class="price_name">服务价格:</span> <span class="serve_price">￥' + currencyFormatted(tp) + '</span></div>';
        $('.serve_price_wrap').html(priceHtml).removeClass('special_price');
    }
    if (sku.hasPromotion) {
        var dateText = $('#date').val().replace(/-/g, '');
        var promotionHtml = '今日有限时特惠活动哦！<a target="_blank" href="' + _webApp + '/services/sprom/' + servicesId + '_' + dateText + '">去看看</a>';
        $('.serve_promotion_info').html(promotionHtml).show();
    } else {
        $('.serve_promotion_info').hide();
    }
    // 设置分期价格
    if ($('#period').length > 0) {
        $('#threePeriod').html("￥" + currencyFormatted(countPeriodAmount(tp, 3)) + "x3期");
        $('#sixPeriod').html("￥" + currencyFormatted(countPeriodAmount(tp, 6)) + "x6期");
        $('#ninePeriod').html("￥" + currencyFormatted(countPeriodAmount(tp, 9)) + "x9期");
    }
}

/**
 * 获取服务日期
 */
function getServicesDate() {
    if (serviceDate) {
        return serviceDate;
    } else {
        var date = $.trim($('#date').val());
        // 排除IE下value是提示信息的情况
        if (date == $('#date').attr('placeholder')) {
            date = '';
        }
        date = date.replace(/[年月]/g, '-').replace('日', '');
        return date;
    }
}

/**
 * 获取服务时间
 */
function getServicetime() {
    var time;
    if (serviceTime) {
        time = serviceTime;
    } else {
        time = $('.time_prop .hk_select.selected').attr('data-value');
    }
    return getServicesDate() + ' ' + time;
}

/**
 * 获取数量
 */
function getQuantity() {
    var quantity = $('#quantity').val();
    var r = /^[0-9]*[1-9][0-9]*$/;
    if (r.test(quantity)) {
        return quantity;
    } else {
        return 1;
    }
}

/**
 * 计算除首期外其他周期还款金额
 *
 */
function countPeriodAmount(totalPrice, period) {
    var periodAmount = Math.floor(totalPrice / period);
    return periodAmount;
}

/**
 * 显示预定服务信息
 */
function setServeInfo() {
    var html = '<label> 预定服务：' + $('label.serve_name').text() + '</label>';
    var pnvs = $('.prop_nv');
    pnvs.each(function () {
        var vs = $(this).find('.hk_select.selected');
        var vs2 = $(this).find('._select .prop_value');
        var propValueStr = "";
        if (vs.length) {
            propValueStr = vs.text();
        } else if (vs2.length) {
            propValueStr = vs2.text();
        }
        if ($(this).hasClass('time_prop')) {
            html += '<label> ' + $('.time_pn').text() + '：' + $('#date').val() + ' ' + propValueStr + '</label>';
        } else {
            html += '<label> ' + $(this).find('.pn').text() + '：' + propValueStr + '</label>';
        }

    });
    html += '<label>数量：' + $('#quantity').val() + '</label> ';
    $('.serve_info').html(html);
}

/**
 * 计算日历选择器最远时间
 */
function countMaxDate() {
    if (cycle) {
        cycle = parseInt(cycle);
    } else {
        cycle = 30;
    }
    var date = new Date(nowDate.getTime());
    date.setDate(date.getDate() + cycle - 1);
    return date;
}

/**
 * 计算日历选择器最近时间
 */
function countMinDate() {
    var date = new Date(nowDate.getTime());
    return date;
}

/**
 * 提交服务订单
 */
function submitServices() {
    $('#sevicesForm input[name="datetime"]').val(getServicetime());
    $('#sevicesForm input[name="quantity"]').val(getQuantity());
    var $form = $('#sevicesForm');
    $form.submit();
}

/** 登录验证类 */
function hkLogin(onSuccess) {
    hkLogin.success = onSuccess;
    $("#loginIframe").attr("src", _webApp + "/login/dialog?redirect_url=");
    $('#loginIframe').hkDialog({
        "title": "登录好慷",
        "lion": "true"
    });
    // $('.dialog_login').dialog();
}

function temp(commentInfo) {
    commentInfo.serviceName = '星级家-优质生活';
}

/**
 * 获取评价列表
 */
function commentList(servicesId, pageNo, isClick) {
    var comment_list = $(".comment_list");
    var comment = $(".comment");
    var page = $(".page");
    // 临时
    if ($(".serve_details .serve_name").text().indexOf("星级家") >= 0) {
        servicesId = 8;
        isTemp = true;
    }
    // 临时

    if (servicesId != "") {
        $.post(_webApp + "/services/comments", {
            servicesId: servicesId,
            pageNo: pageNo
        }, function (result) {
            if (result) {
                $(comment).html("");

                var commentInfoHtml = '<div class="rate"><img src="' + _webApp + '/images/page/services/rate_imgs/' + result.rateNum + '.png"><strong class="_gold">' + result.score + '%</strong><br>' + result.scoreCN + '</div><div class="comment_info">已经有<strong class="_gold">' + result.totalItems + '</strong>人评价此服务<br> <strong class="_gold">' + result.score + '%</strong>的会员满意我们的服务</div><div class="comment_btns">' + '用过此服务<br> <a href="' + _webApp + '/user/center/myComments"class="b_btn small">我要评价</a>	</div><div class="clearboth"></div>';
                $(comment).html(commentInfoHtml);
                var comments = result.comments;
                $(comment_list).html("");
                for (var i = 0; i < comments.length; i++) {
                    var serviceName = comments[i].serviceName;
                    // 临时
                    if (isTemp) {
                        serviceName = $(".serve_details .serve_name").text();
                    }
                    // 临时
                    var html = '<div class="comment_wrap"><p class="comment_user"><span class="user_name">' + comments[i].userName + '</span>' + comments[i].time + '</p><p class="comment_detail">' + comments[i].comment + '</p><p class="user_info">' + comments[i].address + '&nbsp;' + serviceName + '<span class="comment_star s' + comments[i].score + '"></span></p></div>';
                    $(comment_list).append(html);
                }

                if (result.totalPage > 1) {
                    var pageHtml = '<ul class="page_wrap">';
                    if (result.totalPage <= 9) {
                        for (var j = 1; j <= result.totalPage; j++) {
                            if (pageNo == j) {
                                pageHtml += '<li><a href="javascript:void(0);" class="current">' + j + '</a></li>';
                            } else {
                                pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + j + ',1)">' + j + '</a></li>';
                            }
                        }
                    } else {
                        if (pageNo == 1) {
                            pageHtml += '<li><a href="javascript:void(0);" class="prev disabled"><i></i>上一页</a></li>';
                        } else {
                            pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + (pageNo - 1) + ',1)" class="prev">上一页</a></li>';
                        }
                        // for (var k = 1; k <=
                        // result.totalPage; k++) {
                        if (pageNo <= 5) {
                            for (var k = 1; k <= 5; k++) {
                                if (pageNo == k) {
                                    pageHtml += '<li><a href="javascript:void(0);" class="current">' + k + '</a></li>';
                                } else {
                                    pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + k + ',1)">' + k + '</a></li>';
                                }
                            }
                            pageHtml += '<li><a href="javascript:void(0);" class="no">...</a></li>';
                        } else if (pageNo > 5 && pageNo <= result.totalPage - 5) {
                            pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + 1 + ',1)">1</a></li><li><a href="javascritp:void(0);" class="no">...</a></li>';
                            for (var w = pageNo - 2; w <= pageNo + 2; w++) {
                                if (pageNo == w) {
                                    pageHtml += '<li><a href="javascript:void(0);" class="current">' + w + '</a></li>';
                                } else {
                                    pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + w + ',1)">' + w + '</a></li>';
                                }
                            }
                            pageHtml += '<li><a href="javascript:void(0);" class="no">...</a></li>';
                        } else {
                            pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + 1 + ',1)">1</a></li><li><a href="javascritp:void(0);" class="no">...</a></li>';
                            for (var x = result.totalPage - 5; x <= result.totalPage; x++) {
                                if (pageNo == x) {
                                    pageHtml += '<li><a href="javascript:void(0);" class="current">' + x + '</a></li>';
                                } else {
                                    pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + x + ',1)">' + x + '</a></li>';
                                }

                            }

                        }
                        // }
                    }
                    if (pageNo == result.totalPage) {
                        pageHtml += '<li><a href="javascript:void(0);" class="next disabled"><i></i>下一页</a></li>';
                    } else {
                        pageHtml += '<li><a href="javascript:commentList(' + servicesId + ',' + (pageNo + 1) + ',1)" class="next">下一页</a></li>';
                    }
                    pageHtml += '</ul>';
                    $(page).html("");
                    $(page).html(pageHtml);
                    if (isClick) {
                        $('html, body').animate({
                            scrollTop: 380
                        }, 300);
                    }
                }
            }
        }, "json");
    }
}
