<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/ueditor.config.js');?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/ueditor.all.min.js');?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo input::site('controller/ueditor/lang/zh-cn/zh-cn.js');?>"></script>
<form>
    <div class="back_right">
        <div class="right">
            <h1>铸币师等级</h1>
            <h5 class="add_h5"><a style="cursor: pointer;" id="add_rder">添加等级</a></h5>
            <div class="edit_box width97 hy_cen mar0">
                <div class="bq_box">
                        <table style="width: 95%;">
                            <tr>
                                <th class="align_left" scope="col">&nbsp;等级名称</th>
                                <th>等级编号</th>
                                <th>条件类型</th>
                                <th>条件数量</th>                                
                                <th>克鲁格转换率</th>
                                <th>晋级奖励金币</th>
                                <th>是否月分红</th>
                                <th>月分红X%</th>
                                <th>月团队jk值</th>
                                <th>是否年分红</th>
                                <th>年分红X%</th>
                                <th>连续X个月</th>
                                <th>奖励M金币</th>
                                <th>操作</th>
                            </tr>
                            <?php
                            foreach($list as $item)
                            {
                                $type = '下级会员教练级数量';
                                if($item->type==1){
                                    $type = '推荐会员数量';
                                }

                                $is_share = '有';
                                if($item->is_share==0){
                                    $is_share = '没有';
                                }
                                $year_is = '有';
                                if($item->year_is==0){
                                    $year_is = '没有';
                                }
                                echo '<tr class="back">
                                <td class="sort_shop cf align_left">&nbsp;&nbsp;&nbsp;&nbsp;'.$item->name.'</td>
                                <td>'.$item->teacher.'</td>
                                <td>'.$type.'</td>
                                <td>'.$item->condition.'</td>
                                <td>'.$item->rate_klg.'</td>
                                <td>'.$item->once_prize.'</td>
                                <td>'.$is_share.'</td>
                                <td>'.$item->teacher_rate.'</td>
                                <td>'.$item->month_jk.'</td>
                                <td>'.$year_is.'</td>
                                <td>'.$item->year_rate.'</td>
                                <td>'.$item->month_num.'</td>
                                <td>'.$item->month_gold.'</td>            
                                <td class="revise">
                                    <h1 class="h1_one">
                                        <a style="cursor: pointer;" href="javascript:edit('.$item->id.');" >
                                        编辑<span style="line-height: 20px">∨</span>
                                        </a>
                                        <div class="revise_pop" style="display:none;">
                                            <a href="javascript:teacher_del('.$item->id.');">删除</a>
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
</form>

<!--添加等级-->
<div class="up_box" style="display: none; width: 675px;" id="up_box35">    
    <h1><label></label><i class="close"></i></h1>
    <div class="bor_box modify_box">        
        <div>
            <label>等级名称:</label><input type="text" name="name" id="name">
            <label>等级编号:</label><input type="text" name="teacher" id="teacher">
        </div>   
         
        <div>
            <label>条件类型:</label>
            <select id="type">
                <option value="1">推荐会员数量</option>
                <option value="2">下级教练级数量</option>
            </select>    
            <label>条件数量:</label><input type="text" name="condition" id="condition">
        </div> 
        <div>
            <label>克鲁格转换率:</label><input type="text" name="rate_klg" id="rate_klg">
            <label>晋级奖励金币:</label><input type="text" name="once_prize" id="once_prize">
        </div>
        <div>
            <label>是否月分红:</label>
            <input type="radio" name="is_share" id="is_share1" value="1">
            <label for="is_share1">有</label>
            <input type="radio" name="is_share" id="is_share0" value="0" checked="true">
            <label for="is_share0">没有</label>
        </div>
        <div>
            <label>教练分红X%:</label><input type="text" name="teacher_rate" id="teacher_rate">
        </div>
        <div>
            <label>团队jk值:</label><input type="text" name="month_jk" id="month_jk">
        </div>
        <div>
            <label>是否年分红:</label>
            <input type="radio" name="year_is" id="year_is1" value="1">
            <label for="year_is1">有</label>
            <input type="radio" name="year_is" id="year_is0" value="0" checked="true">
            <label for="year_is0">没有</label>
        </div>
        <div>
            <label>教练分红X%:</label><input type="text" name="year_rate" id="year_rate">
        </div>
        <div>
            <label>连续X个月获得<span id="js_teacher"></span>分红:</label><input type="text" name="month_num" id="month_num">
        </div>
        <div>
            <label>连续X个月奖励M金币:</label><input type="text" name="month_gold" id="month_gold">
        </div>
        <div>
            <label>描述:</label><input type="text" name="descript" id="descript">
        </div>  
        <div>
            <label>内容:</label><script id="content" type="text/plain" style="width:620px;height:300px;"></script>
        </div>  
    </div>
    <div class="btn_two btn_width cf">
        <input type="hidden" id="id" value="">
        <a class="a1" href="javascript:" onclick="teacher_add()">保存</a><a class="close" href="###">取消</a>
    </div>    
</div>
<style type="text/css">
.modify_box{
    width: 100% !important;
}

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
    width: 1024px;
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
    $("#key").val('');
    $("#descript").val('');
    $("#condition").val('');
    $("#teacher_rate").val('');
    $("#once_prize").val(0);
    ue.setContent('');
    open_box('#up_box35')
});
// 编辑等级弹窗
function edit(id){
    $("#up_box35 h1>label").html("编辑等级");
    $.post("<?php echo input::site('admin/member/get_teacher')?>",
        {'id':id},
        function(data){
            if(data.success == 1){
                if(data.info.type == 1){
                    $("#type option:nth-child(1)").prop("selected","true");
                }else{
                    $("#type option:nth-child(2)").prop("selected","true");
                }
                if(data.info.is_share == 1){
                    $($("input[type=radio]")[0]).prop("checked","true");
                }else{
                    $($("input[type=radio]")[1]).prop("checked","true");
                }
                $("#js_teacher").html(data.info.name);
                $("#id").val(data.info.id);
                $("#name").val(data.info.name);
                $("#teacher").val(data.info.teacher);
                $("#descript").val(data.info.descript);
                $("#condition").val(data.info.condition);
                $("#range").val(data.info.range);
                $("#month_jk").val(data.info.month_jk);
                $("#rate_klg").val(data.info.rate_klg);
                $("#once_prize").val(data.info.once_prize);
                $("#teacher_rate").val(data.info.teacher_rate);
                $("#year_is").val(data.info.year_is);
                $("#year_rate").val(data.info.year_rate);
                $("#month_num").val(data.info.month_num);
                $("#month_gold").val(data.info.month_gold);
                ue.setContent(data.info.content);
            }
        },'json')
    open_box('#up_box35');
}

function teacher_add(){
    var id = $("#id").val();
    var type = $("#type").val();
    var teacher = $("#teacher").val();
    var name = $("#name").val();
    var descript = $("#descript").val();
    var condition = $("#condition").val();
    var content = UE.getEditor('content').getContent();
    var range = $("#range").val();
    var month_jk = $("#month_jk").val();
    var rate_klg = $("#rate_klg").val();
    var once_prize = $("#once_prize").val();
    var is_share = $("input[name=is_share]:checked").val();
    var teacher_rate = $("#teacher_rate").val();
    var year_is = $("input[name=year_is]:checked").val();
    var year_rate = $("#year_rate").val();
    var month_num =  $("#month_num").val();
    var month_gold =  $("#month_gold").val();
    $.post("<?php echo input::site('admin/member/teacher_add') ?>",{
        'id':id,
        'type':type,
        'teacher':teacher,
        'name':name,
        'descript':descript,
        'content':content,
        'condition':condition,
        'range':range,
        'is_share':is_share,
        'month_jk':month_jk,
        'rate_klg':rate_klg,
        'once_prize':once_prize,
        'teacher_rate':teacher_rate,
        'year_is':year_is,
        'year_rate':year_rate,
        'month_num':month_num,
        'month_gold':month_gold
    },
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
function teacher_del(id){
    if(confirm("确定删除？")){
        $.post("<?php echo input::site('admin/member/teacher_del') ?>",{'id':id},
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
</script>
