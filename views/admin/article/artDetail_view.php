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
                    <td align="right" class="l-table-edit-td">文章分类:</td>
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
                                echo "<option value=".$value->id." $select>".$value->catname."</option>";
                            }
                        }
                        ?>           
                    </select>                    
                    </td>
                </tr>                
                <tr>
                    <td align="right" class="l-table-edit-td">文章标题:</td>
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
                    <td align="right" class="l-table-edit-td">副标题:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="subtitle" type="text" id="subtitle" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->subtitle;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">讲师:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="teacher" type="text" id="teacher" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->teacher;?>">    
                            <div class="l-text-l"></div>
                            <div class="l-text-r"></div>
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">地址:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="address" type="text" id="address" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->address;?>">  
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">开始/结束时间:</td>
                    <td align="left" class="l-table-edit-td">
                        <input name="stime" type="datetime-local" id="stime" ltype="text" ligeruiid="txtName" style="width: 174px;" value="<?php echo date("Y-m-dTH:i",$list->stime);?>">  
                            ~
                        <input name="etime" type="datetime-local" id="etime" ltype="text" ligeruiid="txtName" style="width: 174px;" value="<?php echo date("Y/m/d H:i",$list->etime);?>">  
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">参与总人数:</td>
                    <td align="left" class="l-table-edit-td">
                        <div class="l-text" style="width: 178px;">
                            <input name="total" type="number" id="total" ltype="text" validate="{required:true,minlength:3,maxlength:10}" class="l-text-field" ligeruiid="txtName" style="width: 174px;" value="<?php echo $list->total;?>"> 
                        </div>
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">上传列表图:</td>
                    <td align="left" class="l-table-edit-td">
                        <img src="<?php echo input::site($list->thumb);?>" id="showThumb">
                        <input type="hidden" name="thumb" id="thumb" value="<?php echo $list->thumb;?>">
                        <input type="file" id="file" name="file" ltype="text" />    
                        <input type="button" value=" 上传 " onclick="upload_img(1)"/>    
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">上传主图:</td>
                    <td align="left" class="l-table-edit-td">
                        <img src="<?php echo input::site($list->mainPic);?>" id="showPic">
                        <input type="hidden" name="mainPic" id="mainPic" value="<?php echo $list->mainPic;?>">
                        <input type="file" id="files" name="files" ltype="text" />    
                        <input type="button" value=" 上传 " onclick="upload_img(2)"/>    
                    </td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="right" class="l-table-edit-td">文章内容:</td>                    
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
                        <label for="rbtnl_0">开启</label>
                       
                        <input id="rbtnl_1" type="radio" name="status" value="0" <?php if($list->status==0){echo "checked=true";}?>>
                        <label for="rbtnl_1">关闭</label>
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
#showThumb{
    width: 80px;
    max-height: 50px;
}
#showPic{
    width: 80px;
    height: 80px;
}
</style>
<script type="text/javascript">
// 保存
$("#Button1").on('click',function(){
    var catid = $("#catid").val();
    var title = $("#title").val();
    if(catid==''||catid==null){
        alert("请选择分类");
        return false;
    }
    if(title==''||title==null){
        alert("标题不能为空");
        return false;
    }
    if(confirm("确定提交？")){
        $.post('<?php echo input::site("admin/article/saveArtDetail");?>',
            $("#form1").serialize(),function(data){
                alert(data.msg)
            },'json')
    }
})

// 上传图片
function upload_img(id){
    var file =  $("#file").val();
    var files =  $("#files").val();

    if((file =='' || file == null) && id==1){
        alert("请选择上传文件");
        return false;
    }else if((files =='' || files == null) && id==2){
        alert("请选择上传文件");
        return false;
    }else{      
        var upfile = '';
        if(id==1){
            upfile = $("#file")[0].files[0];
        }else{
            upfile = $("#files")[0].files[0];
        }        
        // var formData = new FormData(upfile);
        // console.log(formData);
        // console.log(formData);
        // var form = document.getElementById("form1");
        var formData = new FormData();
        formData.append('file',upfile);
       
        $.ajax({
            url: "<?php echo input::site('admin/advert/upload');?>",
            type: "POST",
            data: formData,
            dataType:'json',
            processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
            contentType : false, // 不设置Content-type请求头
            success: function(data) {
                if(data.success==1){
                    // $(".imgList").append($(".imgList>div:first-child").clone());
                    if(id==1){
                        $("#thumb").val(data.msg);
                        $("#showThumb").attr('src',data.msg);
                    }else{
                        $("#mainPic").val(data.msg);
                        $("#showPic").attr('src',data.msg);
                    }
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