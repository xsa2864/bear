    <style type="text/css">
        body{ font-size:12px;}
        #form1{
             margin: 20px 20px;
        }
        img {
            width: 60px;
            height: 60px;
        }
        .l-table-edit {}
        .l-table-edit-td{ padding:4px;}
        .l-button-submit,.l-button-test{width:80px; float:left; margin-left:10px; padding-bottom:2px;}
        .l-verify-tip{ left:230px; top:120px;}
    </style>
    
    <form name="form1" id="form1">
    	<div></div>
    	<table cellpadding="0" cellspacing="0" class="l-table-edit" >
    		<tr>
    			<td align="right" class="l-table-edit-td">旧密码:</td>
    			<td align="left" class="l-table-edit-td">
    				<input name="old_pwd" type="password" id="old_pwd" ltype="text" validate="{required:true}" />    
    			</td>
    			<td align="left"></td>
    		</tr>
    		<tr>
    			<td align="right" class="l-table-edit-td">新密码:</td>
    			<td align="left" class="l-table-edit-td">
    				<input name="new_pwd" type="password" id="new_pwd" ltype="text" validate="{required:true}"/>
    			</td>
    			<td align="left"></td>
    		</tr>
            <tr>
                <td align="right" class="l-table-edit-td">确认新密码:</td>
                <td align="left" class="l-table-edit-td">
                    <input name="again_pwd" type="password" id="again_pwd" ltype="text" validate="{required:true}"/>
                </td>
                <td align="left"></td>
            </tr>
    	</table>
    	
    	<br>
    	<input type="button" value="提交" id="Button1" class="l-button l-button-submit" />
    </form>    

<script type="text/javascript">
// 保存
$("#Button1").on('click',function(){
    var old_pwd = $("#old_pwd").val();
    var new_pwd = $("#new_pwd").val();
    var again_pwd = $("#again_pwd").val();
    if(old_pwd == '' || new_pwd == '' || again_pwd == ''){
        alert("密码不能为空!");
        return false;
    }
    if(new_pwd != again_pwd){
        alert("两次输入的密码不一致!");
        return false;
    }
    if(confirm("确认更新密码？")){        
    	$.post('<?php echo input::site("admin/siteconfig/savePwd");?>',
    		$("#form1").serialize(),function(data){
    			alert(data.msg)
    		},'json')
    }
})

</script>