<div class="back_right right_width">
    <div class="right">
        <h1>编辑会员信息</h1>
        <div class="cen_box">            
            <div class="bor_box">
                <dl class="cf">
                    <dt>&nbsp;</dt>
                    <dd><img src="<?php echo $member->pic;?>" width=50 height=50></dd>
                </dl>
                <table>
                    <tr>
                        <td>
                            <dt>用户昵称：</dt>
                            <dd><input id="nickname" name="nickname" type="text" placeholder="用户昵称" value="<?php echo json_decode($member->nickname);?>" readonly="true">
                            </dd>
                        </td>
                        <td>
                            <dt>会员卡卡号：</dt>
                            <dd><input id="card" name="card" value="<?php echo $member->card;?>" type="text" readonly="true"/></dd>
                        </td>
                        <td>
                            <dt>手机号：</dt>
                            <dd><input id="mobile" name="mobile" value="<?php echo $member->mobile;?>" type="text"/></dd>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <dt>unionid：</dt>
                            <dd><input id="unionid" name="unionid" value="<?php echo $member->unionid;?>" type="text"/></dd>
                        </td>
                        <td>
                            <dt>openid</dt>
                            <dd><input id="openid" name="openid" value="<?php echo $member->openid;?>" type="text"/></dd>
                        </td>
                        <td>
                            <dt>直推人ID：</dt>
                            <dd>
                                <input id="pid" name="pid" value="<?php echo $member->pid;?>" type="text" />
                            </dd>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <dt>会员等级：</dt>
                        <dd>
                            <select id="level" class="inpsel" disabled>
                                <option value="0"<?php if($member->level==0) echo " selected"; ?>>普通会员</option>
                                <?php foreach ($level as $val){ ?>
                                    <option value="<?php echo $val->level; ?>" <?php if($member->level==$val->level) echo " selected"; ?>><?php echo $val->name; ?></option>
                                <?php } ?>
                            </select>
                        </dd>
                        </td>
                        <td>
                            <dt>铸币师等级：</dt>
                            <dd>
                                <select id="teacher" class="inpsel" disabled>
                                    <option value="0"<?php if($member->teacher==0) echo " selected"; ?>>普通会员</option>
                                    <?php foreach ($teacher as $val){ ?>
                                        <option value="<?php echo $val->teacher; ?>"<?php if($member->teacher==$val->teacher) echo " selected"; ?>><?php echo $val->name; ?></option>
                                    <?php } ?>
                                </select>
                            </dd>
                        </td>
                        <td>
                            <dt>消费金额：</dt>
                            <dd><input id="amount" class="focus" type="text" value="<?php echo $member->amount;?>"  readonly="true"/></dd>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <dt>金币：</dt>
                            <dd><input id="gold" class="focus" type="text" value="<?php echo $member->gold;?>"  readonly="true"/></dd>
                        </td>
                        <td>
                            <dt>米币：</dt>
                            <dd><input id="rice" class="focus" type="text" value="<?php echo $member->rice;?>"  readonly="true"/></dd>
                        </td>
                        <td>
                            <dt>金鸡账户：</dt>
                            <dd><input id="goldj" class="focus" type="text" value="<?php echo $member->goldj;?>"  readonly="true"/></dd>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <dt>创建苹果乐园：</dt>
                            <dd>
                                <select id="is_create_ap" class="inpsel" disabled>
                                    <option value="0"<?php if($member->is_create_ap==0) echo " selected"; ?>>否</option>
                                    <option value="1"<?php if($member->is_create_ap==1) echo " selected"; ?>>是</option>
                                </select>
                            </dd>
                        </td>
                        <td>
                            <dt>苹果积分：</dt>
                            <dd><input id="point" class="focus" type="text" value="<?php echo $member->point;?>"  readonly="true"/></dd>
                        </td>
                        <td>
                            <dt>苹果金：</dt>
                            <dd><input id="point_fh" class="focus" type="text" value="<?php echo $member->point_fh;?>"  readonly="true"/></dd>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <dt>JK值：</dt>
                            <dd><input id="point_jk" class="focus" type="text" value="<?php echo $member->jk;?>"  readonly="true"/></dd>
                        </td>
                        <td>
                            <dt>经销商积分：</dt>
                            <dd>
                                <input id="jxs_jifen" name="jxs_jifen" value="<?php echo $member->jxs_jifen;?>" type="text" readonly="true" />
                            </dd>
                        </td>
                    </tr>
                </table>                
            </div>
        </div>
    </div>    
    <?php
    if($type=="edit"){
        //编辑个人资料
    ?>
    <div class="btn_two cf">
        <input type="hidden" id="member_id" value="<?php echo $member->id;?>>" />
        <a class="a1" id="subtn">保存</a> <a href="javascript:location.reload()">取消</a>
    </div>
    <?php
    }
    ?>
</div>
<style type="text/css">
table td>dd input{
    width: 250px !important;
}    
table td>dt{
    width: 100px !important;
} 
table td{
    height: 30px; line-height: 36px;
}
</style>
<script type="text/javascript">
<?php
if($type!="edit"){
?>
$("table td>dd input").attr('readonly','true');
<?php
}
?>
    $('#subtn').click(function () {
        var mobile = $('#mobile').val();
        var unionid = $('#unionid').val();
        var openid = $('#openid').val();
        var pid = $('#pid').val();
        var jxs_jifen = $('#jxs_jifen').val();
        var level = $('#level').val();
        var teacher = $('#teacher').val();
        var amount = $('#amount').val();
        var gold = $('#gold').val();
        var goldj = $('#goldj').val();
        var rice = $('#rice').val();
        var point = $('#point').val();
        var point_fh = $('#point_fh').val();
        if(pid!='<?php echo $member->pid;?>'){
            //二次确认修改用户路径
            if(confirm("您修改了直推人ID，将同时变更下级所有用户的路径，\n请认真确认是否需要进行修改！！")){
                $.post('<?php echo input::site('admin/member/updatemember'); ?>',{'member_id':'<?php echo $member->id;?>','mobile':mobile,'unionid':unionid,'openid':openid,'pid':pid,'jxs_jifen':jxs_jifen,'level':level,'teacher':teacher,'amount':amount,'gold':gold,'goldj':goldj,'rice':rice,'point':point,'point_fh':point_fh},function (data) {
                    if(data.errorno=='0'){
                        alert('操作成功');
                        location.reload();
                    }else{ alertMsg('操作成功','',280,50);
                        alert('提交失败，请重试');
                        return false;
                    }
                },"json");
            }
        }else{
            $.post('<?php echo input::site('admin/member/updatemember'); ?>',{'member_id':'<?php echo $member->id;?>','mobile':mobile,'unionid':unionid,'openid':openid,'pid':pid,'jxs_jifen':jxs_jifen,'level':level,'teacher':teacher,'amount':amount,'gold':gold,'goldj':goldj,'rice':rice,'point':point,'point_fh':point_fh},function (data) {
                if(data.errorno=='0'){
                    alert('操作成功');
                    location.reload();
                }else{ alertMsg('操作成功','',280,50);
                    alert('提交失败，请重试');
                    return false;
                }
            },"json");
        }
    });
</script>
