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
        <dd><a href="#">more></a></dd>
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
            	<img src="<?php echo input::imgUrl('banner_fm.png','index');?>" width="360" height="240">
                <p>
                	“围绕国家重大战略部署设置专题活动”、“突出创新与融合”、“突出互动与体验”、“注重专业化和实效性”这一系列亮点，将成为5月28日至6月1日举行的2017北京国际服务贸易交易会几大“看点”。<br/>
今天上午，2017北京国际服务贸易交易会组委会召…
                </p>
            </div>
            <div class="tutor">
            	<h2>
                	导师简介
                    <a href="#">more></a>
                </h2>
                <dl class="tb">
                	<dt><img src="<?php echo input::imgUrl('tutor_01.png','index');?>"></dt>
                    <dd class="flex_1">
                    	<h3>刘常忠</h3>
                    	<p>众合智慧总设计师</p>
                        <p>前福建社科院经济研究员</p>
                        <p>中国财商训练第一人</p>
                    </dd>
                </dl>
                <dl class="tb">
                	<dt><img src="<?php echo input::imgUrl('tutor_02.png','index');?>"></dt>
                    <dd class="flex_1">
                    	<h3>严辉</h3>
                    	<p>第一批证券投资人</p>
                        <p>资深财商教练</p>
                        <p>资产管理成绩斐然</p>
                    </dd>
                </dl>
                <dl class="tb">
                	<dt><img src="<?php echo input::imgUrl('tutor_03.png','index');?>"></dt>
                    <dd class="flex_1">
                    	<h3>何浩宇</h3>
                    	<p>加盟《顺旺基中式快餐》,从赚取稳定收益。</p>
                        <p>十余年的职业投资生涯已经实现财务自由。</p>
                    </dd>
                </dl>            	
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
        	<li class="hot">
            	<h3><a href="#">中法文化交流  法国使馆例外之夜盛情开启</a></h3>
                <p>即便是失业者，也可以从政府那里得到一定数额的基本度假金。</p>
            </li>
          	<li>
            	<h3><a href="#">台民众抗议蔡英文:秦始皇隋炀帝后第三个…</a></h3>
                <p>"小英南北行，抗争如影随形"，台湾媒体如此评价蔡英文执政一周年之际的窘况。</p>
            </li>
            <li>
            	<h3><a href="#">13岁孩子读了8年私塾 父亲被指涉嫌滥用…</a></h3>
                <p>强制读经会把我们的孩子带往何处</p>
            </li>
            <li>
            	<h3><a href="#">不会改变萨德部署？文在寅：这个锅我不背…</a></h3>
                <p>韩国总统文在寅31日下午在青瓦台接见正在访韩的美国民主党参议员迪克·德宾时表示,部署“萨德”虽是前届政府…</p>
            </li>
            <li>
            	<h3><a href="#">2016年平均工资公布</a></h3>
                <p>6月1日消息，国家统计局近日发布统计报告，报告显示2016年全国城镇私营单位就业人员年平均工资为42833…</p>
            </li>
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
       	<p>据这份《关于涉嫌无资质开展第三方支付业务的巡查公告》，5月中旬，国家互联网金融风险分析技术平台巡查发现，上述互联网平台官网宣传其开展的第三方支付业务及相关产品，其经营主体第三方支付资质存疑，涉嫌无资质开展第三方支付业务。
        </p>
        <p>
5月中旬，国家互联网金融风险分析技术平台巡查发现，上述互联网平台官网宣传其开展的第三方支付业务及相关产品，其经营主体第三方支付资质存疑，涉嫌无资质开展第三方支付业务。
		  </p>
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
    	<a href="#">人才招聘  ></a>
        <a href="#">留言反馈  ></a>
        <a href="#">联系方式  ></a>
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