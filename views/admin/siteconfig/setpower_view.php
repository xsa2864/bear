    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerTree.js');?>" type="text/javascript"></script>

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
    <script type="text/javascript">      
         var manager, g;
        $(function ()
        {
           manager = $("#tree1").ligerTree({
                url: '<?php echo input::site("admin/menu/getPower");?>',
                slide: false,
                parms:{'id':<?php echo $list->id;?>},
                enabledCompleteCheckbox:false, 
                isExpand:false,
                idFieldName: 'id',
                parentIDFieldName: 'bid',
                textFieldName:'modName'
            });  
        });

        function saveGroup()
        { 
            var id = $("#id").val();
            var row = manager.getChecked();
            var group = '';
            for(x in row){
               if(group!=''){
                  group += ',';
               }
               group += row[x].data.id;
            }
            if(group==''){
               alert("请选择所需权限");
               return false;
            }
            if(confirm("确认保存！")){               
               $.post('<?php echo input::site("admin/siteconfig/saveGroup");?>',
                  {'id':id,'group':group},function(data){
                     alert(data.msg)
                  },'json')
            }
        }
    </script>
    <form name="form1" id="form1">
       <div></div>
       <table cellpadding="0" cellspacing="0" class="l-table-edit" >
          <tr>
             <td align="right" class="l-table-edit-td">组名:</td>
             <td align="left" class="l-table-edit-td">
                  <label><?php echo $list->groupName;?></label></td>
             <td align="left"></td>
          </tr>
          <tr>
             <td align="right" class="l-table-edit-td">说明:</td>
             <td align="left" class="l-table-edit-td">
                <label><?php echo $list->other;?></label>
             </td>
             <td align="left"></td>
          </tr>

          <tr>
             <td align="right" class="l-table-edit-td">选择权限:</td>
             <td align="left" class="l-table-edit-td">
                <div style="margin: 10px; border: 1px solid rgb(204, 204, 204); border-image: none; width: 300px; height: 380px; overflow: auto; float: left;">
                   <ul id="tree1"></ul>
                </div>
             </td>
             <td align="left"></td>
          </tr>
       </table>
       <br>    
       <input type="hidden" name="id" id="id" value="<?php echo $list->id;?>">
       <input type="button" value="提交" id="Button1" class="l-button l-button-submit" onclick="saveGroup()"/>    
       <a href="javascript:history.go(-1);" style="margin-left:20px; ">返回</a>
    </form>
    <div style="display:none">
       <!--  数据统计代码 --> 
      </div>

