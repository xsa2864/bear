    <script type="text/javascript">
        // var DepartmentList = DepartmentData.Rows;
        var sexData = [{ adtype: 1, text: '图片' }, { adtype: 0, text: '文本'}];
        $(function(){ 
            f_initGrid();
        });
       
        var manager, g;
        function f_initGrid()
        { 
           g =  manager = $("#maingrid").ligerGrid({
                columns: [
                { display: '主键', name: 'id', width: 50, type: 'int',frozen:true },
                { display: '广告位名称',  width: 320, name: 'name',
                    editor: { type: 'text' }
                },
                { display: '广告类型', width: 120, name: 'adtype',type:'int',
                    editor: { type: 'select', data: sexData, valueColumnName: 'adtype' },
                    render: function (item)
                    {
                        if (parseInt(item.adtype) == 1) return '图片';
                        return '文本';
                    }
                },
                { display: '宽度', name: 'width', width: 60, type: 'int', editor: { type: 'int'} }, 
                { display: '高度', name: 'height', width: 60, type: 'int', editor: { type: 'int'} },
                { display: '添加时间', name: 'addtime', type: 'date', width: 100 },
                { display: '操作', isSort: false, width: 120, render: function (rowdata, rowindex, value)
                {
                    var h = "";
                    if (!rowdata._editing)
                    {
                        h += "<a href='javascript:beginEdit(" + rowindex + ")'>修改</a> ";
                        h += "<a href='<?php echo input::site("admin/advert/advertDetail?id=");?>"+rowdata.id+"'>编辑详情</a> "; 
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
                url:'<?php echo input::site("admin/advert/getAdlist");?>',
                // usePager:true,
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
            saveAdvert(row)
        }
        function saveAdvert(row){
            $.post('<?php echo input::site("admin/advert/saveAdvert");?>',
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
            $.post('<?php echo input::site("admin/advert/delAdvert");?>',{'id':row.id},
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

