(function($){
	$.fn.lazyload = function(opts){
		opts=$.extend({
			className : '', // 未加载之前的样式，默认图片灰色
			defaultImg : '', // 默认图片
			original : 'original', // 元素属性
			offsetHeight : 0 // 偏移量
		},opts);
		var els = this.find('['+opts.original+']'), // 所有懒加载元素
			win = $(window),
			winHeight = win.height(),
			imgs = els.filter('img');
		opts.className ? els.addClass(opts.className) : imgs.css('background-color','#e5e5e5');
		opts.defaultImg && imgs.attr('src',opts.defaultImg);
		win.unbind('scroll').bind('scroll',function(){
			var scrollTop = win.scrollTop();
			els.each(function(){
				var t=$(this),offset=t.offset(),height=t.outerHeight(),endHeight=scrollTop+winHeight+opts.offsetHeight;
				if((offset.top>=scrollTop && offset.top<=endHeight)
					|| (offset.top+height>=scrollTop && offset.top+height<=endHeight)){
					var url = t.attr('lazyloaded',1).attr(opts.original);
					t.is('img,iframe') ? t.attr('src',url) : t.load(url);
					opts.className ? t.removeClass(opts.className) : t.css('background','none');
					els = els.not(this);
				}
			});
		}).scroll();
	};
})(jQuery);
