<div class="q path">
	当前位置：
    <a href="javascript:;">留言反馈</a>
</div>

<div class="q list">
	<div class="list_art" style="padding: 0 300px;">       
        <div style="text-align: center;">
            <div><h1>留言</h1></div>
            <div style="margin-bottom: 10px">
                <textarea rows="20" cols="80" id="content" placeholder="请填写您的留言"></textarea>
            </div>
            <div style="text-align: left;">
                <input type="text" name="email" id="email" placeholder="邮箱地址">
            </div>
            
            <button onclick="save()">提交</button>
        </div>
	</div>
</div>

<style type="text/css">
h1{padding-bottom: 10px}
button{
    width: 100px;
    height: 30px;
}
input{
    height: 30px;
}
</style>
<script type="text/javascript">
function save() {
    var content = $("#content").val();
    var email = $("#email").val();
    if(content == '' || content == null){
        alert("内容不能为空");
        return false;
    }
    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
    if(reg.test(email)){
        $.ajax({
            url:"<?php echo input::site('index/index/saveMsg');?>",
            type:'post',
            data:{'content':content,'email':email},
            dataType:'json',
            success:function(data){
                if(data.success){
                    location.reload();
                }
                alert(data.msg);
            }
        })
       
    }else{
        alert("邮箱格式不对");
    }
}
</script>