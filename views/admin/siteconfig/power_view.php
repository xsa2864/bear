<<<<<<< HEAD
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Aqua/css/ligerui-all.css');?>" rel="stylesheet" type="text/css" />   
    <script src="<?php echo input::jsUrl('lib/jquery/jquery-1.9.0.min.js');?>" type="text/javascript"></script>    
    <script src="<?php echo input::jsUrl('lib/json2.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/core/base.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDialog.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerTextBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerCheckBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerComboBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerGrid.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDateEditor.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerSpinner.js');?>" type="text/javascript"></script>
    
=======
   
>>>>>>> 072e700f1628614506b9f3c8c67c1ae0260ccdae
    <script type="text/javascript">
        // var DepartmentList = DepartmentData.Rows;       
        $(function(){ 
            f_initGrid();
        });
       
        var manager, g;
        function f_initGrid()
        { 
           g =  manager = $("#maingrid").ligerGrid({
                columns: [
                { display: '主键', name: 'id', width: 50, type: 'int',frozen:true },
                { display: '组名',  width: 320, name: 'groupName', editor: { type: 'text' }},
                { display: '说明', name: 'other', width: 120, type: 'int', editor: { type: 'text'} },
                { display: '添加时间', name: 'addtime', type: 'date', width: 100 },
                { display: '操作', isSort: false, width: 120, render: function (rowdata, rowindex, value)
                {
                    var h = "";
                    if (!rowdata._editing)
                    {
                        h += "<a href='javascript:beginEdit(" + rowindex + ")'>修改</a> ";
                        h += "<a href='<?php echo input::site("admin/siteconfig/setPower?id=");?>"+rowdata.id+"'>权限设置</a> "; 
                        h += "<a href='javascript:deleteRow(" + rowindex + ")'>删除</a> "; 
                    }
                    else
                    {
                        h += "<a href='javascript:endEdit(" + rowindex + ")'>提交</a> ";
                        h += "<a href='javascript:cancelEdit(" + rowindex + ")'>取消</a> "; 
                    }
                    return h;
                }
                }
                ],
                onSelectRow: function (rowdata, rowindex)
                {
                    $("#txtrowindex").val(rowindex);
                },
                onToPrev: function(pageSize){

                },
                enabledEdit: true, 
<<<<<<< HEAD
                clickToEdit: false, 
                isScroll: false,  
                // data:EmployeeData,
                url:'<?php echo input::site("admin/siteconfig/getPower");?>',
                usePager:true,
                width: '99%'
=======
                clickToEdit: false,  
                toolbar: { items: [
                { text: '增加', click: addNewRow, icon: 'add' },
                { line: true }]},
                // data:EmployeeData,
                url:'<?php echo input::site("admin/siteconfig/getPower");?>',
                // usePager:true,
                height: '99%'
>>>>>>> 072e700f1628614506b9f3c8c67c1ae0260ccdae
            });   
        }
        function beginEdit() {
            var row = manager.getSelectedRow();
            if (!row) { alert('请选择行'); return; }
            manager.beginEdit(row);
        }
        function cancelEdit() {
            var row = manager.getSelectedRow();
            if (!row) { alert('请选择行'); return; }
            if(row.id>0){
                manager.cancelEdit(row);
            }else{
                manager.deleteSelectedRow();
            }
            
        }
        function cancelAllEdit()
        {
            manager.cancelEdit();
        }
        function endEdit()
        {
            var row = manager.getSelectedRow();
            if (!row) { alert('请选择行'); return; }    
            manager.endEdit(row);        
            savePower(row)
        }
        function savePower(row){
            $.post('<?php echo input::site("admin/siteconfig/savePower");?>',
                manager.getSelectedRow(),
                function(data){
                    if(data==0){
                        alert('保存失败');
                        location.reload();
                    }else if(data>1){
                        location.reload();
                    }
                }
            )
        }
        function endAllEdit()
        {
            manager.endEdit();
        }
        function deleteRow()
        { 
            var row = manager.getSelectedRow();
            if(confirm("确定删除？")){                
                $.post('<?php echo input::site("admin/siteconfig/delPower");?>',{'id':row.id},
                    function(data){
                        if(data){
                            manager.deleteSelectedRow();
                        }else{
                            alert('删除失败');
                        }
                })            
            }
        }
        var newrowid = 100;
        function addNewRow()
        {
            manager.addEditRow();
        }         
       
        
    </script>

    <div class="l-clear"></div>
    <div id="maingrid"></div>


    <div style="display:none;">
        <!-- g data total ttt --> 
    </div>