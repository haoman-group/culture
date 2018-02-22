/************************************************************************************************************
 *
 * @ Version 3.0.1
 * @ PIGNOSE Tab
 * @ Date 03. 24. 2016
 * @ Author PIGNOSE
 * @ Licensed under MIT.
 *
 ***********************************************************************************************************/
//jquerycookie操作
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
(function($) {
    $.fn.pignoseTab = function(options) {
        var _this = this;

        this.settings = $.extend({
            'callback': null,
            'animation': 'static',
            'animationTime': 300,
            'animationEasing': 'easeInOutCubic',
            'children': '.sub-tab',
            'active': false,
            'cookieName': 'activeIdx'
        }, options);

        this.rendering = function(root, flag) {
            root.each(function(idx, elem) {
                if (typeof elem === 'undefined' || elem.length < 1) return;
                var $elem = $(elem).addClass('pignose-tab-wrapper');
                var $root = $elem.parents('.pignose-tab-wrapper:last').addClass('pignose-tab-wrapper-root');
                var $ul = $elem.children('ul').addClass('pignose-tab-group');
                var $li = $ul.children('li').addClass('pignose-tab-list');
                var $btn = $li.children('a:not(".pignose-tab-more")').addClass('pignose-tab-btn');
                var $more = $li.children('a.pignose-tab-more');
                var $con = $li.children('div').addClass('pignose-tab-container');

                if ($root.length < 1) $root = $elem.addClass('pignose-tab-wrapper-root');
                if ($con.children(_this.settings.children).length > 0) {
                    _this.rendering($con.children(_this.settings.children).addClass('pignose-sub-tab').parent().addClass('pignose-sub-tab-wrapper'));
                }

                if ($elem.hasClass('pignose-tab-responsive-btn')) {
                    $(window).bind('resize', function() {
                        var margin = 0;

                        if ($more.length) {
                            margin = ($elem.width() - ($more.innerWidth(true) + $more.offset().left));
                        }

                        $btn.each(function() {
                            $(this).outerWidth(parseFloat(($elem.width() - margin) / $btn.length));
                            $(this).parent().width($(this).outerWidth(true));
                        });
                    });
                }

                if (_this.settings.active === true) {
                    var activeIdx = $.cookie(_this.settings.cookieName);
                    $li.eq(activeIdx).addClass('active');
                }
                //初始化当前页
                if ($li.filter('.active').length < 1) {
                    $li.eq(0).addClass('active');
                }
                $li.filter(':last').children('.pignose-tab-btn').addClass('last-btn');

                $btn.bind('click', function(event) {
                    if (!$(this).hasClass('active')) {
                        $li.removeClass('active').children('.pignose-tab-btn, .pignose-tab-container').removeClass('active');
                        $(this).parent().addClass('active').children('.pignose-tab-btn, .pignose-tab-container').addClass('active');
                        _this.resizeTab($root);
                        $(window).triggerHandler('resize');

                        if (_this.settings.callback != null && typeof _this.settings === 'function') {
                            _this.settings.callback();
                        }
                        if (_this.settings.active === true) {
                            var activeIdx = $li.index($(this).parent());
                            // document.cookie = "activeIdx= " + activeIdx + " ;path=dsad/";
                            $.cookie(_this.settings.cookieName, activeIdx, { path: window.location.pathname });
                            // $.cookie('activeIdx', activeIdx);
                        }
                    }
                    //取消事件的默认动作
                    event.preventDefault();
                });
                $li.filter('.active').find('.pignose-tab-btn').triggerHandler('click');

                if (typeof flag !== 'undefined') {
                    _this.resizeTab($elem, 'initialization');
                    $(window).triggerHandler('resize');
                    $(window).bind('load', function() { $(this).triggerHandler('resize'); });
                }
            });
            return root;
        };

        this.resizeTab = function(elem, idx, type) {
            var renderingHeight;
            var renderingType = type;
            var $elem = elem;
            var $activeTabContent = $elem.filter('.active');
            var $nearTabContent = $elem.find('.pignose-tab-group').eq(0).find('> .pignose-tab-list.active > .pignose-tab-container');
            var $siblingsTabContent = $elem.siblings('.pignose-tab-container')
            var $childrenTabContent = $elem.find(_this.settings.children).eq(0).find('> .pignose-tab-group > .pignose-tab-list.active > .pignose-tab-container');

            if (typeof idx == 'undefined') idx = 0;
            if (typeof idx == 'string' && idx == 'initialization') {
                renderingType = 'quick';
                idx = 0;
            }
            if (typeof $elem === 'undefined' || $elem.length < 1) return false;

            if ($elem.is('.pignose-tab-container') === false) {
                if ($nearTabContent.length > 0) {
                    _this.resizeTab($nearTabContent, idx, renderingType);
                } else {
                    _this.resizeTab($siblingsTabContent, idx, renderingType);
                }
                return false;
            }

            if ($childrenTabContent.length > 0) {
                renderingHeight = _this.resizeTab($childrenTabContent, idx + 1, renderingType);
            }

            if ($activeTabContent.length > 0) {
                var $wrapper = $activeTabContent.closest(_this.settings.children);
                if (renderingHeight == null || renderingHeight <= 0) {
                    renderingHeight = $activeTabContent.outerHeight() + $activeTabContent.position().top + parseFloat($wrapper.css('padding-top').replace('px', '')) + parseFloat($wrapper.css('padding-bottom').replace('px', '')) + 2;
                } else {
                    renderingHeight += $activeTabContent.position().top + 2;
                }
                if (typeof _this.settings.animation === 'undefined' ||
                    !!_this.settings.animation === false ||
                    _this.settings.animation == 'static' ||
                    renderingType == 'quick'
                ) {
                    $wrapper.height(renderingHeight);
                } else {
                    $wrapper
                        .stop()
                        .animate({
                                'height': renderingHeight + 'px'
                            },
                            _this.settings.animationTime,
                            (typeof window[_this.settings.animationEasing] !== 'undefined' ? _this.settings.animationEasing : null)
                        );
                }
            }

            return renderingHeight;
        };

        return _this.rendering(this, true);
    };
})(jQuery)