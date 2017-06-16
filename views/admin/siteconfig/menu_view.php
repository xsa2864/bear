    <script type="text/javascript">
        // var DepartmentList = DepartmentData.Rows;
        var sexData = [{ status: 1, text: '启用' }, { status: 0, text: '不启用'}];
        $(function(){ 
            f_initGrid();
        });
       
        var manager, g;
        function f_initGrid()
        { 
           g =  manager = $("#maingrid").ligerGrid({
                columns: [
                { display: '主键', name: 'id', width: 50, type: 'int',frozen:true },
                { display: '名称',  width: 120, name: 'name',editor: { type: 'text' }},
                { display: 'url', name: 'url', width: 220, type: 'text', editor: { type: 'text'} },
                { display: '排序', name: 'sort', width: 60, type: 'int', editor: { type: 'int'} }, 
                { display: '状态', width: 80, name: 'status',type:'int',
                    editor: { type: 'select', data: sexData, valueColumnName: 'status' },
                    render: function (item)
                    {
                        if (parseInt(item.status) == 1) return '启用';
                        return '不启用';
                    }
                },
                { display: '操作', isSort: false, width: 120, render: function (rowdata, rowindex, value)
                {
                    var h = "";
                    if (!rowdata._editing)
                    {
                        h += "<a href='javascript:beginEdit(" + rowindex + ")'>修改</a> ";
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
                toolbar: { items: [
                { text: '增加', click: addNewRow, icon: 'add' },
                { line: true }]},
                url:'<?php echo input::site("admin/siteconfig/getMenu");?>',
                height: '99%'

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
            saveMenu(row)
        }
        function saveMenu(row){
            $.post('<?php echo input::site("admin/siteconfig/saveMenu");?>',
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
            if(confirm("确定删除？")){                
                var row = manager.getSelectedRow();
                $.post('<?php echo input::site("admin/siteConfig/delMenu");?>',{'id':row.id},
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
         
        function getSelected()
        { 
            var row = manager.getSelectedRow();
            if (!row) { alert('请选择行'); return; }
            alert(JSON.stringify(row));
        }
        function getData()
        { 
            var data = manager.getData();
            alert(JSON.stringify(data));
        } 
    </script>

    <div class="l-clear"></div>
    <div id="maingrid"></div>

