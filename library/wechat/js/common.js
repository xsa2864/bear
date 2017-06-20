
$(window).resize(function(){
	var fsize = Math.round(100/720*$('body>.box').width() );
	$('html,body').css('font-size',fsize);
});
$(function(){
	$(window).resize();

	// 点击效果
	$('[touchevent]').on('touchstart',function(){
		$(this).addClass($(this).attr('touchevent'));
	});
	$(document).on('touchend',function(){
		$('[touchevent]').each(function(){
			$(this).removeClass($(this).attr('touchevent'));
		});
	});
	// 切换焦点
	if($('.toggle_on li').length){
		$('.toggle_on li').on('click',function(){
			$(this).closest('.toggle_on').find('li').removeClass('on');
			$(this).addClass('on');
		})		//.eq(0).trigger('click');
	}
	// 切换界面
	/*
	$('.index_nav li').on('click',function(){
		var index = $(this).closest('.index_nav').find('li').index(this);
		$('.index_main').hide().eq(index).show();
		$.fn.lazyload && $('body').lazyload();
		return false;
	}).eq(0).click();
	*/
	
	// 轮播 
	if($('.touchslideimg').length){
		pui.use(['touchslideimg/touchslideimg.js','touchslideimg/touchslideimg.css'],function(){
			$('.touchslideimg').touchslideimg();
		});
	}
	
});

//弹出框
var open_box=function(e){
	var el=$(e);
	$('.mask_box').show();
	el.show();
	// $('html,body').css({overflow:'hidden'});
	var top=$(window).scrollTop();
	var height=$(window).height();
	el.css({
		'top':(top+height/2-el.outerHeight()/2),
		'left':'50%',
		'margin-left':-(el.outerWidth()/2)
	});
	$('.mask_box').on('touchend', function (){
            $('.mask_box').hide();
			el.hide();
     });	
	el.find('.close').click(function(){
		$('.mask_box').hide();
		el.hide();
		// $('html,body').css({overflow:'auto'});
	});
	el.find('select').trigger('resetStyle');
};