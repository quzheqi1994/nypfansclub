<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/heafooer.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/LCSrv.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/Common.php");

    function GenMainProduct($id){
        $arr = CheckCache('MainProduct',$id);
        if(!$arr){
            $arr = getArrOne("Shop","id=$id",'id,tid,name,imglist,cost,mark,desc');
            MakeCache('MainProduct',$id,$arr,'array');
        }
        $id   = $arr['id'];
        $tid  = $arr['tid'];
        $name = $arr['name'];
        $cost = $arr['cost'];
        $mark = $arr['mark'];
        
        $imgs = explode(",",$arr['imglist']);
        $img1 = $imgs[0];
        $img2 = $imgs[1];
        $img3 = $imgs[2];
        $img4 = $imgs[3];
        $desc = $arr['desc'];
        return "
                    <!--=========== BEGIN 当前商品模块 ================-->
                    <div class='col-md-5 single-top'>    
                        <!-- start product_slider -->
                        <div class='flexslider'>
                            <ul class='slides'>
                                <li data-thumb='$img1'> <div class='thumb-image'> <img src='$img1' data-imagezoom='true' class='img-responsive'> </div> </li>
                                <li data-thumb='$img2'> <div class='thumb-image'> <img src='$img2' data-imagezoom='true' class='img-responsive'> </div> </li>
                                <li data-thumb='$img3'> <div class='thumb-image'> <img src='$img3' data-imagezoom='true' class='img-responsive'> </div> </li>
                                <li data-thumb='$img4'> <div class='thumb-image'> <img src='$img4' data-imagezoom='true' class='img-responsive'> </div> </li>
                            </ul>
                            <div class='clearfix'></div>
                        </div>
                        <!-- end product_slider -->
                    </div>    
                    <div class='col-md-7 single-top-in'>
                        <div class='single-para'>
                            <h4>$name</h4>
                            <div class='para-grid'>
                                <span  class='add-to'>￥$cost 元 +$mark 积分</span>
                                <a href='heading.php?id=$id&tid=$tid' class='hvr-shutter-in-vertical cart-to'>前往购买</a>                    
                                <div class='clearfix'></div>
                             </div>
                            <!--<h5>已售100件</h5>-->
                            <div class='available'>
                                <h6>请选择型号</h6>
                                <select>
                                    <option>无可选型号</option>
                                </select>
                            </div>
                            <p>$desc</p>
                        </div>
                    </div>
                    <div class='clearfix'> </div>
                    <!--=========== END 当前商品模块 ================--> 
            ";
    }

    function GenProductList($class){
        $html='';
        $arr = CheckCache('ProductList',$class);
        if(!$arr){
            $arr = getArr("Shop","class=$class",'id,name,imglist,cost,mark');
            MakeCache('ProductList',$class,$arr,'array');
        }
        foreach($arr as $v){
            $id   = $v['id'];
            $name = $v['name'];
            $cost = $v['cost'];
            $mark = $v['mark'];
            $imgs = explode(',',$v['imglist']);
            $img  = $imgs[0];

            $html .= "
                        <div class='col-md-4 top-single'>
                            <div class='col-md'>
                                <img  src='$img'/>    
                                <div class='top-content'>
                                    <h5>$name</h5>
                                    <div class='white'>
                                        <a href='index.php?id=$id' class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>前往查看</a>
                                        <p class='dollar'><span class='in-dollar'>￥</span><span>$cost</span><span>+$mark 积分</span></p>
                                        <div class='clearfix'></div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
            ";
        }
        return $html;
    }
    function GenSpecialProductList(){
        $html='';
        $arr = CheckCache('SpecialProductList',"default");
        if(!$arr){
            $arr = getArr("Shop","status=1",'id,name,imglist,cost,sprice');
            MakeCache('SpecialProductList',"default",$arr,'array');
        }
        foreach($arr as $v){
            $id     = $v['id'];
            $name   = $v['name'];
            $cost   = $v['cost'];
            $sprice = $v['sprice'];
            $imgs   = explode(',',$v['imglist']);
            $img    = $imgs[0];
            $html .= "
                    <div class='product'>
                        <img class='img-responsive fashion' src='$img'>
                        <div class='grid-product'>
                            <a href='index.php?id=$id' class='elit'>$name</a>
                            <span class='price price-in'><small>￥$cost</small> ￥$sprice</span>
                        </div>
                        <div class='clearfix'> </div>
                    </div>
            ";
        }
        return $html;
    }
?>