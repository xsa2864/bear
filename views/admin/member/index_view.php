    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Aqua/css/ligerui-all.css');?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Gray/css/all.css');?> " rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" id="mylink"/>    

    <script src="<?php echo input::jsUrl('lib/jquery/jquery-1.9.0.min.js');?>" type="text/javascript"></script>
    <!-- <script src="<?php echo input::jsUrl('lib/ligerUI/js/ligerui.all.js');?>" type="text/javascript"></script>
    -->
    <script src="<?php echo input::jsUrl('lib/jquery.cookie.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/json2.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/core/base.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerGrid.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDialog.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerTextBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerCheckBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerComboBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDateEditor.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerSpinner.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
    var grid = null;
    var pwhere = '';
    $(function () {
        f_grid();
        $("#pageloading").hide();
    });
    function f_grid(){        
        grid = $("#maingrid4").ligerGrid({
            columns: [
            { display: '主键', name: 'id', width: 80 },
            { display: '头像', name: 'pic', width: 60, 
                render: function (item)
                {
                    return '<img src="'+item.pic+'" width=32>';
                }
            }, 
            { display: '昵称', name: 'nickname', width: 150,align: 'left',
                render:function(item){
                    return JSON.parse(item.nickname);
                }
             }, 
            { display: '手机号', name: 'mobile', width: 120 },
            { display: 'openID', name: 'openid', align: 'left',minWidth: 120 }, 
            { display: '联系名', name: 'ContactName', minWidth: 140 },
            { display: '状态', name: 'status', width: 60,
                render:function(item){
                    if(item.status == 1){
                        return '正常';
                    }else{
                        return '禁用';
                    }
                }
             },
            { display: '注册时间', name: 'regtime' ,width: 100}
            ],
            checkbox:true,
            pageSize:30,
            url: '<?php echo input::site("admin/member/getMember");?>', 
            width: '99%',
            height:'99%'
        });
    }
    function f_search()    
    {        
        var txtId = $("#txtId").val();
        var txtMobile = $("#txtMobile").val();
        grid.removeParm('id');
        grid.removeParm('mobile');
        if(txtId != ''){
            grid.setParm('id',txtId);
        }            
        if(txtMobile != ''){
            grid.setParm('mobile',txtMobile);
        }        
        grid.loadData();
    }   
    
</script>
<style type="text/css">
#searchbar{
    margin: 10px 0 0 10px;
}
</style>
    <div id="searchbar">
        主键：<input id="txtId" type="text">
        手机号：<input id="txtMobile" type="text">
        <input id="btnOK" type="button" value="查询" onclick="f_search()">
    </div>
    <div id="maingrid4" style="margin-top:10px;"></div>
