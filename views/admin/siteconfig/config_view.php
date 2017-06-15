    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Aqua/css/ligerui-all.css');?>" rel="stylesheet" type="text/css"> 
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Gray/css/all.css');?>" rel="stylesheet" type="text/css"> 

    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>  

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
                <td align="right" class="l-table-edit-td">商城名称:</td>
                <td align="left" class="l-table-edit-td">
                    <input name="name" type="text" id="name" ltype="text" validate="{required:true}" value="<?php echo $list->name;?>" />    
                </td>
                <td align="left"></td>
            </tr>            
            <tr>
                <td align="right" class="l-table-edit-td">上传图片:</td>
                <td align="left" class="l-table-edit-td">
                    <img src="<?php echo input::site($list->logo);?>" id="logoUrl">
                    <input type="hidden" name="logo" value="<?php echo input::site($list->logo);?>">
                    <input type="file" id="file" name="file" ltype="text" />                    
                    <input type="button" value=" 上传 " onclick="upload_img()"/>       
                </td>
                <td align="left"></td>
            </tr>    
            <tr>
                <td align="right" class="l-table-edit-td">商城简介:</td>
                <td align="left" class="l-table-edit-td" colspan="2"> 
                <textarea cols="100" rows="4" class="l-textarea" id="descript" style="width:400px"><?php echo $list->descript;?></textarea>
                </td> 
            </tr>
            <tr>
                <td align="right" class="l-table-edit-td">icp:</td>
                <td align="left" class="l-table-edit-td">
                    <input name="icp" type="text" id="icp" ltype="text" validate="{required:true}" value="<?php echo $list->icp;?>" />    
                </td>
                <td align="left"></td>
            </tr>
            <tr>
                <td align="right" class="l-table-edit-td">备案号:</td>
                <td align="left" class="l-table-edit-td">
                    <input name="copyright" type="text" id="copyright" ltype="text" validate="{required:true}" value="<?php echo $list->copyright;?>" />    
                </td>
                <td align="left"></td>
            </tr>       
        </table>
      
        <br>
        <input type="hidden" name="id" value="<?php echo $list->id;?>">
        <input type="button" value="提交" id="Button1" class="l-button l-button-submit" />
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
    $.post('<?php echo input::site("admin/siteconfig/configSave");?>',
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
        $.ajax({
            url: "<?php echo input::site('admin/advert/upload');?>",
            type: "POST",
            data: formdata,
            dataType:'json',
            processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
            contentType : false, // 不设置Content-type请求头
            success: function(data) {
                if(data.success==1){
                    $("#logoUrl").attr('src',data.msg);
                    $("input[name=logo]").val(data.msg);
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