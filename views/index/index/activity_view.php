<div class="q path">
	当前位置：
    <a href="javascript:;"><?php echo $parent_name;?></a>
       > 
	<a href="javascript:;"><?php echo $child_name;?></a>
</div>

<div class="q list">
	<div class="list_art">
        <div class="list_search">
            <h2>新闻资讯公告</h2>
            <p>
                <input placeholder="输入关键词搜索" name="keyword" id="keyword"v/>
                <a href="javascript:search();">搜索</a>                
            </p>
        </div>
        <div class="list_main">
            <ul>
            <?php 
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $url = input::site('index/index/detail?id=').$value->id;
                    echo '<li><h3>'.$value->title.'</h3><p>'.$value->subtitle.'</p>
                    <h5>'.$value->addtime.'<a href="'.$url.'">查看详情></a></h5></li>';
                }
            }
            ?>
            </ul>
            <div class="pg">
                <?php echo $pagination->render();?>
            </div>
        </div>
	</div>
</div>

<div class="q">
	
</div>
<script type="text/javascript">
function search() {
    var keyword = $("#keyword").val();
    if(keyword == '' || keyword == null){
        alert("输入关键词搜索");
        return false;
    }
    location.href = '<?php echo input::site("index/index/search?keyword=");?>'+keyword;
}
</script>