    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Aqua/css/ligerui-all.css');?>" rel="stylesheet" type="text/css"> 
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Gray/css/all.css');?>" rel="stylesheet" type="text/css"> 

    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>  

    
    <script type="text/javascript">
        // var eee;
        // $(function ()
        // {
        //     $.metadata.setType("attr", "validate");
        //     var v = $("form").validate({
        //         debug: true,
        //         errorPlacement: function (lable, element)
        //         {
        //             if (element.hasClass("l-textarea"))
        //             {
        //                 element.ligerTip({ content: lable.html(), target: element[0] }); 
        //             }
        //             else if (element.hasClass("l-text-field"))
        //             {
        //                 element.parent().ligerTip({ content: lable.html(), target: element[0] });
        //             }
        //             else
        //             {
        //                 lable.appendTo(element.parents("td:first").next("td"));
        //             }
        //         },
        //         success: function (lable)
        //         {
        //             lable.ligerHideTip();
        //             lable.remove();
        //         },
        //         submitHandler: function ()
        //         {
        //             $("form .l-text,.l-textarea").ligerHideTip();
        //             alert("Submitted!")
        //         }
        //     });
        //     $("form").ligerForm();
        //     $(".l-button-test").click(function ()
        //     {
        //         alert(v.element($("#txtName")));
        //     });
        // });  
    </script>
    <style type="text/css">
           body{ font-size:12px;}
        .l-table-edit {}
        .l-table-edit-td{ padding:4px;}
        .l-button-submit,.l-button-test{width:80px; float:left; margin-left:10px; padding-bottom:2px;}
        .l-verify-tip{ left:230px; top:120px;}
    </style>
    
    <form name="form1" id="form1" enctype="multipart/form-data">
    	<div></div>
    	<table cellpadding="0" cellspacing="0" class="l-table-edit" >
    		<tr>
    			<td align="right" class="l-table-edit-td">广告标题:</td>
    			<td align="left" class="l-table-edit-td">
    				<input name="name" type="text" id="name" ltype="text" validate="{required:true}" value="<?php echo $list->name;?>" />    
    			</td>
    			<td align="left"></td>
    		</tr>
    		<tr>
    			<td align="right" class="l-table-edit-td">广告位:</td>
    			<td align="left" class="l-table-edit-td">
    				<label><?php echo $list->pname;?></label>    
    			</td>
    			<td align="left"></td>
    		</tr>
    		
    		<tr>
    			<td align="right" class="l-table-edit-td">上传图片:</td>
    			<td align="left" class="l-table-edit-td">
    				<input type="file" id="file" name="file" ltype="text" />    				
    				<input type="button" value=" 上传 " onclick="upload_img()"/>       
    			</td>
    			<td align="left"></td>
    		</tr>    		
    	</table>
    	<div class="imgList">    		
    		<?php
    		if(!empty($list->pics)){
    		foreach ($list->pics as $key => $value) {
    		?>
    			<div>    				
	    			<input type="hidden" name="imgUrl[]" value="<?php echo input::site($value->imgUrl);?>">
	    			<img src="<?php echo input::site($value->imgUrl);?>">
	    			文本：<input type="text" name="text[]" value="<?php echo $value->text;?>">
	    			URL：<input type="text" name="url[]" value="<?php echo $value->url;?>">
	    			<a href="javascript:;" onclick="del(this)">删除</a>
    			</div>
    		<?php
    		}
    		}
    		?>
    	</div>
    	<br>
    	<input type="hidden" name="id" value="<?php echo $list->id;?>">
    	<input type="button" value="提交" id="Button1" class="l-button l-button-submit" />
    	<a href="javascript:history.go(-1);" style="margin-left:20px; ">返回</a>
    </form>
    <div style="display:none">
    	<!--  数据统计代码 --> 
    </div>
<style type="text/css">
#form1{
	margin: 20px 20px;
}
img {
	width: 60px;
	height: 60px;
}
</style>
<script type="text/javascript">
// 保存
$("#Button1").on('click',function(){
	$.post('<?php echo input::site("admin/advert/adSave");?>',
		$("#form1").serialize(),function(data){
			alert(data.msg)
		},'json')
})

// 上传图片
function upload_img(){
	var file =  $("#file").val();
	if(file=='' || file == null){
		alert("请选择上传文件");
		return false;
	}else{		
		var form=document.getElementById("form1");
	    var formdata=new FormData(form);
	    var html_str = '<div> <input type="hidden" name="imgUrl[]" value=""> <img src=""> 文本：<input type="text" name="text[]" value=""> URL：<input type="text" name="url[]" value=""> <a href="javascript:;" onclick="del(this)">删除</a> </div>';
		$.ajax({
	        url: "<?php echo input::site('admin/advert/upload');?>",
	        type: "POST",
	        data: formdata,
	        dataType:'json',
	        processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
	        contentType : false, // 不设置Content-type请求头
	        success: function(data) {
	            if(data.success==1){
	            	// $(".imgList").append($(".imgList>div:first-child").clone());
	            	$(".imgList").append(html_str);
	            	$(".imgList>div:last-child img").attr('src',data.msg);
	            	$(".imgList>div:last-child input").val('');
	            	$(".imgList>div:last-child input:first-child").val(data.msg);
	            }else{
	            	alert(data.msg);
	            }
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            alert("上传失败，请检查网络后重试");
	        }
	    });
	}
}
function del(str){
	$(str).parent("div").remove();
}
</script>