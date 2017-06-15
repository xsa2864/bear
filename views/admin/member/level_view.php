<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/ueditor.config.js');?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/ueditor.all.min.js');?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/lang/zh-cn/zh-cn.js');?>"></script>
    <div class="back_right">
        <div class="right">
            <h1>会员等级</h1>
            <h5 class="add_h5"><a style="cursor: pointer;" id="add_rder">添加等级</a></h5>
            <input type="text" name="level_id" id="level_id" placeholder="请输入会员id">
            <button id="up_lv">更新等级</button>
            <div class="edit_box width97 hy_cen mar0">
                <div class="bq_box">
                        <table>
                            <tr>
                                <th class="align_left" >&nbsp;等级名称</th>
                                <th>等级编号</th>
                                <th>是否汇率换算</th>
                                <th>充值金额</th>
                                <th>赠送比率</th>
                                <th>赠送米币</th>
                                <th>额外赠送</th>
                                <th>附加产米率</th>
                                <th>苹果积分</th>
                                <th>冻结(小时)</th>
                                <th>描述</th>
                                <th width="20%">操作</th>
                            </tr>
                            <?php
                            foreach($list as $item)
                            {   
                                $str = '不启用';
                                if($item->type==1){
                                    $str = '启用';
                                }
                                echo '<tr class="back">
                                <td class="sort_shop cf align_left">&nbsp;&nbsp;&nbsp;&nbsp;'.$item->name.'</td>
                                <td>'.$item->level.'</td>
                                <td>'.$str.'</td>
                                <td>'.$item->money.'</td>
                                <td>'.$item->rate.'</td>
                                <td>'.$item->rice.'</td>
                                <td>'.$item->again_rice.'</td>
                                <td>'.$item->rice_ext.'</td>
                                <td>'.$item->apple.'</td>
                                <td>'.$item->freeze.'</td>
                                <td>'.$item->descript.'</td>
                                <td class="revise">
                                    <h1 class="h1_one">
                                        <a style="cursor: pointer;" href="javascript:edit('.$item->id.');" >
                                        编辑<span style="line-height: 20px">∨</span>
                                        </a>
                                        <div class="revise_pop" style="display: none">
                                            <a href="javascript:level_del('.$item->id.');">删除</a>
                                        </div>
                                    </h1>
                                </td>
                            </tr>';
                            }
                            ?>                            
                        </table>            
                </div>
            </div>
        </div>
    </div>

<!--添加等级-->
<div class="up_box" style="display: none; width: 575px;" id="up_box35">    
    <h1><label></label><i class="close"></i></h1>
    <div class="bor_box modify_box">        
        <div>
            <label>等级名称:</label><input type="text" name="name" id="name">
        </div>    
        <div>
            <label>等级编号:</label><input type="text" name="level" id="level">
        </div>  
        <div>
            <label>是否汇率换算:</label>
            <input type="radio" name="type" id="type1" value="1">
            <label for="type1">启用</label>
            <input type="radio" name="type" id="type0" value="0" checked="true">
            <label for="type0">不启用</label>
        </div>  
        <div>
            <label>充值金额:</label><input type="text" name="money" id="money">
        </div> 
        <div>
            <label>赠送米币比率:</label><input type="text" name="rate" id="rate">
        </div>  
        <div>
            <label>赠送米币:</label><input type="text" name="rice" id="rice">
        </div>   
        <div>
            <label>额外赠送:</label><input type="text" name="again_rice" id="again_rice">
        </div>
        <div>
            <label>附加产米率:</label><input type="text" name="rice_ext" id="rice_ext">
        </div>
        <div>
            <label>赠送苹果积分:</label><input type="text" name="apple" id="apple">
        </div>
        <div>
            <label>冻结(小时):</label><input type="text" name="freeze" id="freeze">
        </div>     
        <div>
            <label>描述:</label><textarea rows="3" name="descript" id="descript"></textarea>
        </div>  
        <div>
            <label>内容:</label><script id="content" type="text/plain" style="width:520px;height:300px;"></script>
        </div>
    </div>
    <div class="btn_two btn_width cf">
        <input type="hidden" id="id" value="">
        <a class="a1" href="javascript:" onclick="level_add()">保存</a><a class="close" href="###">取消</a>
    </div>    
</div>
<style type="text/css">
.back_right .btn a{
    padding: 5px 9px;
    color:#FFFFFF;
    background-color: #148cd7;
    border-radius: 8px;
    /*border: 1px solid #148cd7;*/
}
.back_right .btn .btn_s{
    float: right;
}
.back_right table{
    text-align: center;
    /* width: 1024px; */
}
.back_right table tr{
    height:2.5rem;
    font-size: 0.9rem;
    border-bottom: 1px solid #b7b7b7;
}
.back_right table tr a{
    color:#148cd7;
}
#up_box35 label{
    padding: 5px;
}
#up_box35 input{
    border-radius: 4px;
    padding: 5px;
    border: 1px solid rgb(183, 183, 183);
}
</style>
<script>  
//实例化编辑器
var ue = UE.getEditor('content');
$(function () {
    //移动到显示
    $('.revise h1').hover(function () {
        $(this).parents('.revise').find('.revise_pop').toggle();
        return false;

    }, function () {
        $(this).parents('.revise').find('.revise_pop').toggle();
        return false;
    });

});    
//添加等级
$('#add_rder').click(function () {
    $("#up_box35 h1>label").html("新增等级");
    $("#id").val('');
    $("#name").val('');
    $("#level").val('');
    $("#descript").val('');
    $("#money").val(0);
    $("#rice").val(0);
    $("#rate").val(0);
    $("#again_rice").val(0);
    $("#rice_ext").val(0.000);
    $("#apple").val(0);
    $("#freeze").val(0);   
    ue.setContent(''); 
    open_box('#up_box35');
});
// 编辑等级弹窗
function edit(id){
    $("#up_box35 h1>label").html("编辑等级");
    $.post("<?php echo input::site('admin/member/get_level')?>",
        {'id':id},
        function(data){
            if(data.success == 1){
                if(data.info.type==0){
                    $($("input[type=radio]")[1]).prop("checked","true");
                }else{
                    $($("input[type=radio]")[0]).prop("checked","true");
                }
                $("#id").val(data.info.id);
                $("#name").val(data.info.name);
                $("#level").val(data.info.level);
                $("#descript").val(data.info.descript);
                $("#money").val(data.info.money);
                $("#rice").val(data.info.rice);
                $("#rate").val(data.info.rate);
                $("#again_rice").val(data.info.again_rice);
                $("#rice_ext").val(data.info.rice_ext);
                $("#apple").val(data.info.apple);
                $("#freeze").val(data.info.freeze);
                ue.setContent(data.info.content);
            }
        },'json')
    open_box('#up_box35');
}

function level_add(){
    var id = $("#id").val();
    var name = $("#name").val();
    var level = $("#level").val();
    var descript = $("#descript").val();
    descript = descript.replace(/\n/g,'<br/>');
    var content = UE.getEditor('content').getContent();
    var money = $("#money").val();
    var rice = $("#rice").val();
    var rate = $("#rate").val();
    var again_rice = $("#again_rice").val();
    var rice_ext = $("#rice_ext").val();
    var apple = $("#apple").val();
    var freeze = $("#freeze").val();
    var type = $("input[type=radio]:checked").val();
    $.post("<?php echo input::site('admin/member/level_add') ?>",
        {'id':id,'name':name,'level':level,'descript':descript,'content':content,'money':money,'rice':rice,'rate':rate,'again_rice':again_rice,'rice_ext':rice_ext,'apple':apple,'freeze':freeze,'type':type},
        function(data){            
            if (data.success == 1) {
                location.reload();
            }else{
                alert(data.msg);
            }
        },'json'
    );
}    

// 删除
function level_del(id){
    if(confirm("确定删除？")){
        $.post("<?php echo input::site('admin/member/level_del') ?>",{'id':id},
            function(data){            
                if (data.success == 1) {
                    location.reload();
                }else{
                    alert(data.msg);
                }
            },'json'
        );
    }
}
// 更新等级
$("#up_lv").on("click",function(data){
    var id = $("#level_id").val();
    if(id==''){
        alert("会员id不能为空");
        return false;
    }
    $.post('<?php echo input::site("admin/member/up_level");?>',
        {'id':id},
        function(data){
            if(data){
                alert("执行完毕");
            }else{
                alert("执行失败");
            }
        })
})
</script>
