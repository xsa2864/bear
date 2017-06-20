<div class="q path">
    当前位置：
    <a href="javascript:;"><?php echo $parent_name;?></a>
       > 
    <a href="javascript:;"><?php echo $child_name;?></a>
</div>

<div class="q list list_img">
	<ul>
        <?php 
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $url = input::site('index/index/subject?id=').$value->id.'&mid='.$value->catid;
                    $img = input::site($value->mainPic);
                    echo '<li><img src='.$img.' width="568" height="375"><div><h3>'.$value->title.'</h3>
                        <p>'.$value->subtitle.'</p><h5>'.$value->addtime.'<a href="'.$url.'">查看详情></a></h5></div></li>';
                }
            }
        ?>
    </ul>
</div>

<div class="q">
	<div class="pg">
    	<?php echo $pagination->render();?>
    </div>
</div>