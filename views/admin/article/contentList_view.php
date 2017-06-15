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
                { display: '标题',  width: 320, name: 'title',editor: { type: 'text' } },
                { display: '副标题',  width: 320, name: 'subtitle'},
                { display: '文章分类',  width: 130, name: 'catname' },
                { display: '状态', width: 60, name: 'status',type:'int',
                    editor: { type: 'select', data: sexData, valueColumnName: 'status' },
                    render: function (item)
                    {
                        if (parseInt(item.status) == 1) return '正常';
                        return '禁用';
                    }
                },   
                { display: '添加时间', name: 'addtime', type: 'date', width: 140 },
                { display: '操作', isSort: false, width: 120, render: function (rowdata, rowindex, value)
                {
                    var h = "";
                    if (!rowdata._editing)
                    {
                        h += "<a href='<?php echo input::site("admin/article/artDetail?id=");?>"+rowdata.id+"'>编辑详情</a> "; 
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
                toolbar: { items: [
                { text: '增加', click: addNewRow, icon: 'add' },
                { line: true }]},
                // enabledEdit: true, 
                // clickToEdit: false, 
                // isScroll: false,  
                pageSize:30,
                // rownumbers:true,
                // data:EmployeeData,
                url:'<?php echo input::site("admin/article/getContentList");?>',
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
        function saveArticle(row){
            $.post('<?php echo input::site("admin/article/saveArticle");?>',
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
            $.post('<?php echo input::site("admin/article/delContent");?>',{'id':row.id},
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
            location.href = '<?php echo input::site("admin/article/artDetail");?>';
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
    <div style="display:none;"></div>