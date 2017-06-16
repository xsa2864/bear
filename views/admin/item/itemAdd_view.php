    <style type="text/css">
           body{ font-size:12px;}
        .l-table-edit {}
        .l-table-edit-td{ padding:4px;}
        .l-button-submit,.l-button-test{width:80px; float:left; margin-left:10px; padding-bottom:2px;}
        .l-verify-tip{ left:230px; top:120px;}
    </style>

    <form name="form1" id="form1" enctype="multipart/form-data">
        <div></div>
        <table cellpadding="0" cellspacing="0" class="l-table-edit">
            <tbody>                     
                <tr>
                    <td align="right" class="l-table-edit-td">商品名称:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="title" type="text" id="title" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;"  value="<?php echo $list->title;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">商品简介:</td>
                    <td align="left" class="l-table-edit-td">
                        <textarea cols="100" rows="3" class="l-textarea" id="subtitle" name="subtitle" validate="{required:true}"><?php echo $list->subtitle;?></textarea>     
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">商品分类:</td>
                    <td align="left" class="l-table-edit-td">
                    <select name="catid" id="catid" ltype="select" ligeruiid="ddlDepart" style="width:180px">
                        <option value="">请选择</option>
                        <?php 
                        if(!empty($category)){
                            foreach ($category as $key => $value) {
                                $select = '';
                                if($value->id == $list->catid){
                                    $select = 'selected="selected"';
                                }                                
                                echo "<option value=".$value->id." $select>".$value->cname."</option>";
                            }
                        }
                        ?>           
                    </select>                    
                    </td>
                </tr>       
                <tr>
                    <td align="right" class="l-table-edit-td">商品原价:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="oldprice" type="text" id="oldprice" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->oldprice;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">商品现价:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="price" type="text" id="price" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->price;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>    
                <tr>
                    <td align="right" class="l-table-edit-td">商品库存:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="store" type="text" id="store" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->store;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr> 
                <tr>
                    <td align="right" class="l-table-edit-td">商家详情:</td>
                    <td align="left" class="l-table-edit-td">
                        <textarea cols="100" rows="3" class="l-textarea" id="shopinfo" name="shopinfo" validate="{required:true}"><?php echo $list->shopinfo;?></textarea>  
                    </td>
                    <td align="left"></td>
                </tr> 
                <tr>
                    <td align="right" class="l-table-edit-td">有效时间:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="validtime" type="text" id="validtime" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->validtime;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">使用时间:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="usetime" type="text" id="usetime" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->usetime;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">上传主图:</td>
                    <td align="left" class="l-table-edit-td">
                        <img src="<?php echo input::site($list->mainPic);?>" id="showThumb">
                        <input type="hidden" name="mainPic" id="mainPic" value="<?php echo $list->mainPic;?>">
                        <input type="file" id="file" name="file" ltype="text" />    
                        <input type="button" value=" 上传 " onclick="upload_img()"/>    
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">商品详情:</td>                    
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td"></td>
                    <td align="left" class="l-table-edit-td">
                         <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain"><?php echo $list->content;?></script>
                    </td>
                    <td align="left"></td>
                </tr>
                 <tr>
                    <td align="right" class="l-table-edit-td" valign="top">状态:</td>
                    <td align="left" class="l-table-edit-td">                

                        <input id="rbtnl_0" type="radio" name="status" value="1" <?php if($list->status==1){echo "checked=true";}?>>
                        <label for="rbtnl_0">上架</label>
                       
                        <input id="rbtnl_1" type="radio" name="status" value="0" <?php if($list->status==0){echo "checked=true";}?>>
                        <label for="rbtnl_1">下架</label>
                    </td>
                    <td align="left"></td>
                </tr>   
            </tbody>
        </table>

        <br>    
        <input type="hidden" name="id" value="<?php echo $list->id;?>">
        <input type="button" value="提交" id="Button1" class="l-button l-button-submit" />   
        <?php
        if(!empty($list->id)){
            echo '<a href="javascript:history.go(-1);" style="margin-left:20px; ">返回</a>';
        }
        ?> 

        <br>

    </form>

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
    var catid = $("#catid").val();
    var title = $("#title").val();
    if(catid==''||catid==null){
        alert("请选择商品分类");
        return false;
    }
    if(title==''||title==null){
        alert("商品名称不能为空");
        return false;
    }
    if(confirm("确定提交？")){
        $.post('<?php echo input::site("admin/item/saveItem");?>',
            $("#form1").serialize(),function(data){
                alert(data.msg)
            },'json')
    }
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
                    // $(".imgList").append($(".imgList>div:first-child").clone());
                    $("#mainPic").val(data.msg);
                    $("#showThumb").attr('src',data.msg);
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

<link href="<?php echo input::site('library/admin/umeditor/themes/default/css/umeditor.css');?>" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo input::site('library/admin/umeditor/third-party/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo input::site('library/admin/umeditor/third-party/template.min.js');?>"></script>


<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo input::site('library/admin/umeditor/umeditor.config.js');?>"></script>
<!-- 编辑器源码文件 -->

<script type="text/javascript" src="<?php echo input::site('library/admin/umeditor/umeditor.min.js');?>"></script>
<!-- 实例化编辑器 -->

<script type="text/javascript" src="<?php echo input::site('library/admin/umeditor/lang/zh-cn/zh-cn.js');?>"></script>

<script type="text/javascript">
var um = UM.getEditor('container');
//对编辑器的操作最好在编辑器ready之后再做
um.ready(function() {
    UM.getEditor('container').setWidth(1000);
    
});
</script>