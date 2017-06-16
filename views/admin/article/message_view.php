    <script type="text/javascript">
        var sexData = [{ status: 1, text: '正常' }, { status: 0, text: '禁用'}];
        $(function(){ 
            f_initGrid();
        });
       
        var manager, g;
        function f_initGrid()
        { 
            g =  manager = $("#maingrid").ligerGrid({
                columns: [
                { display: '主键', name: 'id', width: 50, type: 'int',frozen:true },
                { display: '标题',  width: 120, name: 'title',editor: { type: 'text' } },
                { display: '内容',  width: 420, name: 'content'},
                { display: '邮箱',  width: 120, name: 'email' },                
                { display: '添加时间', name: 'addtime', type: 'date', width: 140 },
                { display: '操作', isSort: false, width: 120, render: function (rowdata, rowindex, value)
                {
                    var h = "";
                    if (!rowdata._editing)
                    {                       
                        h += "<a href='javascript:deleteRow(" + rowindex + ")'>删除</a> "; 
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
                pageSize:30, 
                toolbar: { items: [
                { text: '查看详细内容', click: getSelected, icon: 'add' },
                { line: true }]},
                url:'<?php echo input::site("admin/article/getMessage");?>',
                usePager:true,
                height:'99%'
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
            saveArticle(row)
        }
        
        function endAllEdit()
        {
            manager.endEdit();
        }
        function deleteRow()
        { 
            if(confirm("确定删除？")){                
                var row = manager.getSelectedRow();
                $.post('<?php echo input::site("admin/article/delMessage");?>',{'id':row.id},
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
        
        function getSelected()
        { 
            var row = manager.getSelectedRow();
            if (!row) { alert('请选择行'); return; }
            alert(JSON.stringify(row.content));
        }
        function getData()
        { 
            var data = manager.getData();
            alert(JSON.stringify(data));
        } 
    </script>

    <div class="l-clear"></div>
    <div id="maingrid"></div>
    <div style="display:none;"></div>

