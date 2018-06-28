<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/heafooer.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/LCSrv.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/Common.php");
    function GenVideoList($style,$playlistid,$coltype,$bWithDesc=false,$limit=0){
        $html = '';
        $arr = CheckCache('VideoList',$playlistid);
        if(!$arr){
            $arr = getArr("Track","playlistid=$playlistid",'name,alpicurl,id');
            MakeCache('VideoList',$playlistid,$arr,'array');
        }
        foreach($arr as $v){
            $html.= '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">';
            $html.= '<a href="media/player.php?list='.$playlistid.'&id='.$v['id'].'">';
            $html.= '<div class="hover ehover'.$style.'">';
            $html.= '    <img class="img-responsive" src="'.$v['alpicurl'].'">';
            $html.= '    <div class="overlay"><h2>'.$v['name'].'</h2>';
            $html.= "        <button class=\"info nullbutton\" onclick=\"window.location.href='media/player.php?id=".$v['id']."'\">查看详细</button>";
            $html.= '    </div></div>';
            $html.= '<div class="banner-bottom">';
            $html.= '    <h5>'.$v['name'].'</h5><dd></dd>';
            $html.= '<p></p></div></a></div>';
            if(--$limit==0) break;
        }
        return $html;
    }
    function GenProductList($limit=0){
        $saleType = array("精品","特价","爆款","积分");
        $arr = CheckCache('ProductList',"MainPage");
        if(!$arr){
            $arr = getArr("Shop","id>0",'id,name,imglist,status,cost,mark','id');
            MakeCache('ProductList',"MainPage",$arr,'array');
        }
        $html = '';
        foreach($arr as $k=>$v){
            $imgs = explode(",",$v['imglist']);
            $html.= '<div class="col-md-4 col-xs-6 col-sm-6 product">';
            $html.= '    <a href="shop?id='.$v['id'].'"><div class="pro-item"><div class="thumb-item">';
            $html.= '        <img src="'.$imgs[0].'" class="image-front"/> ';
            $html.= '        <img src="'.$imgs[1].'" class="image-back"/>';
            $html.= '        <span class="product-top">'.$saleType[$v['status']].'</span> ';
            $html.= '    </div><div class="item-info">';
            $html.= '        <h4>'.$v['name'].'</h4>';
            $html.= '        <div class="info-price">￥'.$v['cost'].'<span>+'.$v['mark'].'积分</span></div>';
            $html.= '        <span class="buy">前往购买</span>';
            $html.= '</div></div></a></div>';
            if(--$limit==0) break;
        }
        return $html;
    }
    
    function GenCarouselAndAlert(){
        $arr1 = CheckCache('Carouse',70001);
        if(!$arr1){
            $arr1 = getArr("Track","playlistid=70001",'url,id,alpicurl','id');
            MakeCache('Carouse',70001,$arr1,'array');
        }
        $arr2 = CheckCache('Alert',70002);
        if(!$arr2){
            $arr2 = getArr("Track","playlistid=70002",'name,url,id,lyric','id');
            MakeCache('Alert',70002,$arr2,'array');
        }
        $html = '
        <!--=========== BEGIN 图片轮播&基础提示框模块 ================-->  
        <div class="container" id="Carousel">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">';
        foreach($arr1 as $v)
            $html .= '
                    <li data-target="#myCarousel" data-slide-to="'.$v['id'].'"></li>';
        $html .= '
                </ol>
                <div class="carousel-inner">
                    <div class="item active"><a href="'.$arr1[0]['url'].'"><img src="'.$arr1[0]['alpicurl'].'"></a></div>';
        for($i=1;$i<count($arr1);$i++)
            $html .= '
                    <div class="item"><a href="'.$arr1[$i]['url'].'"><img src="'.$arr1[$i]['alpicurl'].'"></a></div>';
        $html .= '
                </div>
            </div>
            <div class="alert-container" id="alertdiv">';
        foreach ($arr2 as $v)
            $html .= "
                <div class=\"alert alert-info\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                <a href=\"".$v['url']."\"><h4>".$v['name']."</h4>".$v['lyric']."</a></div>";
        $html .= '
            </div>
        </div>
        <!--=========== END 图片轮播&基础提示框模块 ================-->
        ';
        return $html;
    }
    
    function GenNewDynamic(){
        $arr = CheckCache('NewDynamic',70003);
        if(!$arr){
            $arr = getArr("Track","playlistid=70003",'date,url,name,id','id');
            MakeCache('NewDynamic',70003,$arr,'array');
        }
        $html = '
                    <div>
                        <h3>网站公告</h3>
                        <ul>';
        foreach($arr as $v)
            $html .= '
                            <li><a href="'.$v['url'].'"><span>'.$v['name'].'</span><span>'.$v['date'].'</span></a></li>';
        $html .= '
                        </ul>
                    </div>';
        return $html;
    }
?>