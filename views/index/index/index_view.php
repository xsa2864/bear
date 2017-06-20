<div class="postion" >
    <div class="absolute">
        <div class="slideimg_box index_banner slideimg" >
            <ul class="anime1">
                <?php
            foreach ($pics as $key =>
                $value) {
            ?>
                <li>
                    <a href="<?php echo $value->url;?>" target="_blank" >
                        <img src="<?php echo input::site($value->imgUrl);?>"></a>
                </li>
                <?php
            }
            ?></ul>
            <div class="slideimg_btnbg"></div>
            <div class="slideimg_text"></div>
            <div class="slideimg_btn">
                <span class="">1</span>
                <span class="">2</span>
                <span class="">3</span>
                <span class="">4</span>
                <span class="active">5</span>
            </div>
            <a class="slideimg_pre"></a>
            <a class="slideimg_next"></a>
        </div>
    </div>
</div>
<!---title-->
<div class="q">
	<dl class="ind_title cf">
    	<dt class="bold">为您推荐</dt>
        <dd><a href="javascript:;">more></a></dd>
    </dl>
</div>

<div class="q">
	<ul class="Product_box">
        <?php
            if(!empty($recommend)){
                foreach ($recommend as $key => $value) {
                    $title = explode('|', $value->text);
                ?>
                <li>
                    <a href="<?php echo $value->url;?>">        
                        <p><img src="<?php echo input::site($value->imgUrl);?>" width="360" height="180"></p>
                        <p class="pro_text">
                            <span><?php echo $title[0];?></span>
                            <span><?php echo $title[1];?></span>
                        </p>        
                        <p class="back_opat ">&nbsp;</p>    
                    </a> 
                </li>
               
                <?php
                }
            }
        ?>         	
     </ul>
</div>


<div class="q tb">
	<div class="wis">
        <dl class="ind_title cf">
            <dt class="bold">智慧学院</dt>
            <dd></dd>
        </dl> 
        <div class="tb">
        	<div class="flex_1">
            	<img src="<?php echo input::site($school->thumb);?>" width="360" height="240">
                <p><?php echo $school->subtitle;?></p>
            </div>
            <div class="tutor">
            	<h2>
                	导师简介
                    <a href="javascript:;">more></a>
                </h2>
                <?php 
                if(!empty($teacher)){
                    foreach ($teacher as $key => $value) {
                ?>                
                <dl class="tb">
                	<dt><img src="<?php echo input::site($value->thumb);?>"></dt>
                    <dd class="flex_1">
                    	<?php echo $value->content;?>
                    </dd>
                </dl>
                <?php
                    }
                }
                ?>     	
            </div>
        </div>   	
    </div>
    <div class="flex_1">
    	<div class="news">
        	<h2>新闻资讯公告</h2>
            <ul>
            <?php 
            if(!empty($news)){
                foreach ($news as $keys => $item_new) {
                    $url = input::site("index/index/detail?id=").$item_new->id;
                    echo '<li><h3><a href="'.$url.'">'.$item_new->title.'</a></h3><p>'.$item_new->subtitle.'</p></li>';
                }                
            }
            ?>             
            </ul>
        </div>
    </div>
</div>

<!---title-->
<div class="q">
	<dl class="ind_title cf">
    	<dt class="bold">课程展示</dt>
        <dd></dd>
    </dl>
</div>

<div class="q tb bor mar20">
	<div class="flex_1 lesson_img">
    	<div class="absolute">
        <div class="slideimg_box index_banner slideimg" >
        	<ul class="anime1">
                <?php
                if(!empty($subject)){
                    foreach ($subject as $key => $value) {
                    ?>
                    <li>
                        <a href="<?php echo $value->url;?>" target="_blank" >
                            <img src="<?php echo input::site($value->imgUrl);?>">
                        </a>
                    </li>
                    <?php
                    }
                }
                ?>                 
            </ul>
            <div class="slideimg_btnbg"></div>
            <div class="slideimg_text"></div>
            
             <a class="slideimg_pre"></a>
             <a class="slideimg_next"></a>
     	</div>
     </div>
    	
    </div>
    <div class="lesson">
    	<ul>
        <?php 
        if(!empty($subjects)){
            foreach ($subjects as $key => $value) {
                $url = input::site('index/index/subject?id=').$value->id;
                echo '<li><h3><a href='.$url.'>'.$value->title.'</a></h3><p>'.$value->subtitle.'</p></li>';
            }
        }
        ?>        	
        </ul>
    </div>
</div>

<div class="q tb">
	<div class="m_manage m_social">
        <dl class="ind_title cf mar2b">
            <dt class="bold">资产管理</dt>
            <dd></dd>
        </dl>
        <dl class="tb">
            <dt class="flex_1">
                <img src="<?php echo input::site($asset->thumb);?>" width="225px" height="150px">
            </dt>
            <dd>
                <h3><a href="<?php echo input::site('index/index/detail?id=').$asset->id;?>"><?php echo $asset->title;?></a></h3>
                <p><?php echo $asset->subtitle;?></p>
            </dd>
        </dl>
      <div>
       	    <p><?php echo $asset->content;?></p>
            <a href="<?php echo input::site('index/index/detail?id=').$asset->id;?>">了解详情></a>
        </div>
    </div>
    <div class="flex_1 m_social">
        <dl class="ind_title cf mar2b">
            <dt class="bold">移动社交</dt>
            <dd></dd>
        </dl>
        <dl class="tb">
            <?php
            if(!empty($move)){
                $img = input::site($move[0]->thumb);
            ?>            
        	<dt class="flex_1">
            	<img src="<?php echo $img;?>" width="225px" height="150px">
            </dt>
            <dd>
            	<h3><a href="<?php echo input::site('index/index/detail?id=').$move[0]->id;?>"><?php echo $move[0]->title;?></a></h3>
                <p><?php echo $move[0]->subtitle;?></p>
          	</dd>
            <?php
            }
            ?>
        </dl>
        <ul>
            <?php 
            if(!empty($move)){
                foreach ($move as $key => $value) {
                    if($key>0){
                        $url = input::site('index/index/detail?id=').$value->id;
                        echo '<li><a href="'.$url.'">'.$value->title.'</a><span>'.$value->addtime.'</span></li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>

<div class="q mar2b">
	<dl class="ind_title cf">
    	<dt class="bold">联系我们</dt>
        <dd></dd>
    </dl>
</div>

<div class="q tb">
	<div class="flex_1 c_btn">
    	<a href="<?php echo input::site('index/index/detail?id=11');?>">人才招聘  ></a>
        <a href="<?php echo input::site('index/index/writeMsg');?>">留言反馈  ></a>
        <a href="<?php echo input::site('index/index/detail?id=12');?>">联系方式  ></a>
    </div>
    <div class="qr">
        <?php
            if(!empty($qrcode)){
                foreach ($qrcode as $key => $value) {
                ?>
                <p>
                    <img src="<?php echo input::site($value->imgUrl);?>" width="178px" height="178px">
                    <span><?php echo $value->text;?></span>
                </p>
                <?php
                }
            }
        ?>      
    </div>
</div>
