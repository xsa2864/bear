$(function(){
	//导航标签
	/*
	var fn = function(e){
		if(e.next().hasClass('bor')){
			e.next().css('visibility','hidden');	
		}
		if(e.prev().hasClass('bor')){
			e.prev().css('visibility','hidden');	
		}
	};
	$('.nav_cen li').hover(function(){
		var li=$(this);
		$('.nav_cen li').css('visibility','visible').filter('.hover').removeClass('hover');
		fn($('.nav_cen li.curr'));
	});
	fn($('.nav_cen li.curr'));
	*/
	$('.nav_cen li').hover(function(){
		var subbox = $(this).find('.result_mun');
		if(subbox.is(':visible')){
			subbox.slideUp();
		}else{
			var omun = $(this).closest('.nav_cen').find('li').not(this);
			omun.removeClass('curr');
			$(this).addClass('curr');
			subbox.slideDown();
		}	
	});	
	
	$('.lesson li').hover(function(){
		$(this).addClass('on');
		$(this).closest('ul').find('li').not(this).removeClass('on');
		
	});
});




function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
        obj.setHomePage(url);
    }catch(e){
        if(window.netscape){
            try{
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }catch(e){
                alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
            }
        }else{
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
        }
    }
}
//收藏本站
function AddFavorite(title, url) {
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}