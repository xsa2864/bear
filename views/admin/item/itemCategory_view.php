    <script type="text/javascript">
        var sexData = [{ status: 1, text: '正常' }, { status: 0, text: '禁用'}];
        $(function(){ 
            $.post('<?php echo input::site("admin/menu/getMenuList");?>',function(data){
                if(data){
                    f_initGrid(data);
                }
            },'json') 
        });
       
        var manager, g;
        function f_initGrid(menuList)
        { 
           g =  manager = $("#maingrid").ligerGrid({
                columns: [
                { display: '主键', name: 'id', width: 50, type: 'int',frozen:true },
                { display: '分类名称',  width: 320, name: 'cname',
                    editor: { type: 'text' }
                },
                { display: '是否显二级菜单', name: 'menuID', width: 120, type:'text',
                    editor: { type: 'select', data: menuList, valueColumnName: 'id', displayColumnName: 'name' }, render: function (item)
                    {
                        for (var i = 0; i < menuList.length; i++)
                        {
                            if (menuList[i]['id'] == item.menuID)
                                return menuList[i]['name']
                        }
                        return '';
                    }
                },
                { display: '状态', width: 80, name: 'status',type:'int',
                    editor: { type: 'select', data: sexData, valueColumnName: 'status' },
                    render: function (item)
                    {
                        if (parseInt(item.status) == 1) return '正常';
                        return '禁用';
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
                clickToEdit: false,        
                pageSize:20,
                toolbar: { items: [
                { text: '增加', click: addNewRow, icon: 'add' },
                { line: true }]},
                url:'<?php echo input::site("admin/item/getCategory");?>',
                usePager:true,
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
            saveCategory(row)
        }
        function saveCategory(row){
            $.post('<?php echo input::site("admin/item/saveCategory");?>',
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
            $.post('<?php echo input::site("admin/item/delCategory");?>',{'id':row.id},
                function(data){
                    if(data){
                        manager.deleteSelectedRow();
                    }else{
                        alert('删除失败');
                    }
            })            
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
