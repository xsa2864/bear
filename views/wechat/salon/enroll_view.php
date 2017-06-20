<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index">
            <a href="javascript:history.go(-1);"><i></i>预约沙龙</a></div> 
    </div>
	<div class="pad11">
    	<div class="back2">
        	<div class="edit">
            	<p class="none">
                    <input type="text" name="name" id="name" class="clear_input" placeholder="姓名"/></p>
            	<p>
                    <input type="text" name="mobile" id="mobile" class="clear_input" placeholder="联系方式"/></p>
                <p class="s_radio">
                	是否有宝宝
                    	<label><input type="radio" name="baby" id="baby1" checked class="checkbox" value="1"> 有 </label>
                        <label><input type="radio" name="baby" id="baby0" checked class="checkbox" value="0"> 没有</label>
                </p>
                <p class="show_age"><input type="text" name="age" id="age" class="clear_input" placeholder="宝宝年龄（周岁）"/></p>
        	</div>
        </div>  
        <div class="home_box back2 mar20">
            <ul class="tb home_nav">
                <li class="flex_1"></li>
            </ul>
            <div class="home_cen">
            	<ul class="tb index_product">
                    <li class="flex_1">
                        <a href="#"><img src="../images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4
                        </div>
                    </li>
                    <li class="flex_1">
                        <a href="#"><img src="../images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
    
    <div class="footer" style="display:block">
        <div class="tb details_foot" id="foot"  >
            <dl class="flex_1 ">
            	<dd class="tb">
                    <span class="flex_1">
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                        <a class="blue" href="javascript:"  onclick="saveEnroll();">确认提交</a>
                    </span>
                </dd>
            </dl>
        </div> 
    </div>
    
</div>
<style type="text/css">
.show_age{
    display: none;
}
</style>
<script>
function saveEnroll(){
    var id = $("#id").val();
    var name = $("#name").val();
    var mobile = $("#mobile").val();
    var age = $("#age").val();
    var baby = $("input[name=baby]:checked").val();
    if(confirm("确认提交？")){
        $.post('<?php echo input::site("wechat/salon/saveEnroll");?>',
        {'id':id,'name':name,'mobile':mobile,'age':age,'baby':baby},
        function(data){
            alert(data.msg);
        },'json')
    }
}
$("input[name=baby]").on('click',function(){
    var age = $(this).val();
    if(age == 0){
        $(".show_age").hide();
    }else{
        $(".show_age").show();
    }
})
</script>