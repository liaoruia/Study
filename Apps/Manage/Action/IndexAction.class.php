<?php
namespace Manage\Action;
use Manage\Model\UtilsModel;
use Think\Controller;
class IndexAction extends Controller  {
    private $debug = true;
    public function index(){
        $this->display('_index');
    }

    public function test(){
        var_dump($_POST);
    }


    public function zhuaqu(){

        $szUrl = "http://www.chunshuitang.com/goods/4394.html";
        $UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $szUrl);
        curl_setopt($curl, CURLOPT_HEADER, 0);  //0表示不输出Header，1表示输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($curl);
//        echo $data;
        $data = preg_replace('/<div class=\"clearfix\".*?>.*?<\/div>/',"",$data);
//        echo $data;
        preg_match_all('/<div class=\"itifimg clearfix\".*?>.*?<\/div>/ism',$data,$mart);
        preg_match_all('/<div class=\"big_photo\".*?>(.*?)<\/div>/ism',$data,$match5);

        preg_match_all('/<img.+src="\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/U',$match5[0][0],$match6);
        var_dump('主图',$match6[1]);

        preg_match_all('/<img.+src="\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/U',$mart[0][0],$match);
        var_dump('商祥',$match[1]);
        preg_match_all('/<div class=\"Gd_shop_xtit clearfix\".*?>(.*?)<\/div>/ism',$data,$match2);
//        var_dump($match2[0][1]);
        preg_match_all('/<dt>(.*?)<\/dt>/ism',$match2[0][0],$match3);
        preg_match_all('/<dd class=\"fa3468"\>(.*?)<\/dd>/ism',$match2[0][0],$match4);

        //sku
        preg_match_all('/<ul class=\"Gd_shop_Parameter\".*?>(.*?)<\/ul>/ism',$data,$match7);
        preg_match_all('/<li class=\"sho_color color_type\".*?>(.*?)<\/li>/ism',$match7[0][0],$match8);
//        var_dump($match7);
        preg_match_all('/<span.*>(.*)<\/span>/isU',$match7[0][0],$match9);
        var_dump('sku',$match9[1]);

//        var_dump("标题",$match3[1]);
//        var_dump("长标题",$match4[1]);

//echo curl_errno($curl); //返回0时表示程序执行成功 如何从curl_errno返回值获取错误信息

        exit();
    }

    public function getCars(){
        $zz = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        foreach ($zz as $z){
            $this->car($z);
        }
    }

    public function car($z){
        $url = "https://www.autohome.com.cn/grade/carhtml/$z.html";
        /**
         * @var UtilsModel $utils
        */
        $utils = D('Utils');
        $data = $utils->curlGet($url);
        preg_match_all('/<img.+src="\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/U',$data,$match1);
        preg_match_all('/<dl.+id=\"(.*?)\".+?>/',$data,$match2);
        preg_match_all('/<\/a><div><a.*?>(.*?)<\/a>?<\/div>/',$data,$match3);
        $ids= $match2[1];
        $data=[];
        foreach ($ids as $k=>$id){
            $b = $match3[1][$k];
            $i = "http:".$match1[1][$k];
            $data[]=[
                'cb_letter'=>$z,
                'cb_brand_id'=>$id,
                'cb_brand_pic'=>$i,
                'cb_brand_name'=>iconv('gb2312',"UTF-8//IGNORE",$b)
            ];
        }
        M('js_car_brand')->addAll($data);
    }

    public function series(){
        $url = 'https://car.autohome.com.cn/javascript/NewSpecCompare.js';
        $utils = D('Utils');
        $data = $utils->curlGet($url);
        $data = str_replace('var listCompare$100= ','',$data);
        $data = str_replace(';','',$data);
        $data = iconv('gb2312',"UTF-8//IGNORE",$data);
        $data = json_decode($data,true);
        $pics = M('js_car_brand')->getField("cb_brand_id,cb_brand_pic");
        $top=[];
        foreach ($data as $d){
            $tow=[];
            $fi = $d['I'];
            $fn = $d['N'];
            $list = $d['List'];
            $top[] =[
                'cs_letter'=>$d['L'],
                'cs_car_id'=>$fi,
                'cs_name'=>$fn,
                'cs_pic_url'=>isset($pics[$fi])?$pics[$fi]:'',
                'cs_addtime'=>time()
            ];
            foreach ($list as $items){
                $three=[];
                $tow[] =[
                    'cs_brand_id'=>$fi,
                    'cs_car_id'=>$items['I'],
                    'cs_name'=>$items['N'],
                    'cs_addtime'=>time()
                ];
                $typeList=$items['List'];
                foreach ($typeList as $item){
                    $three[] =[
                        'cs_car_id'=>$item['I'],
                        'cs_name'=>$item['N'],
                        'cs_parent_id'=>$items['I'],
                        'cs_addtime'=>time()
                    ];
                }
                M('js_car_series')->addAll($three);
            }
            M('js_car_series')->addAll($tow);
        }
    }

    public function carSeries(){
        $url ='https://car.autohome.com.cn/config/series/3862.html';
        $utils = D('Utils');
        $data = $utils->curlGet($url);
        preg_match_all('/var config = (.*?);/',$data,$match1);
//        var_dump($match1[1]);
        $aa = json_decode($match1[1][0],true);
        var_dump($aa['result']['paramtypeitems'][0]['paramitems'][0]['valueitems']);
    }

    public function tao(){
        //142274699
        //136152291
        //获取所有车品牌
        //https://car.m.tmall.com/czda/forest.do?_ksTS=1511320179297_647&callback=jsonp648
        //获取所有车系
        //https://car.m.tmall.com/czda/forest.do?propertyId=136152291&valueId=142274699&_ksTS=1511320469244_662&callback=jsonp663
        //获取所有车年份
        //https://car.m.tmall.com/czda/forest.do?propertyId=136298294&valueId=59928&_ksTS=1511320545026_676&callback=jsonp677
        //获取车型
        //https://car.m.tmall.com/czda/forest.do?propertyId=136304282&valueId=6231611&_ksTS=1511320576951_704&callback=jsonp705

//        header('Content-Type:text/html;charset="gbk"');
        $url='https://car.m.tmall.com/czda/forest.do?_ksTS=1511320179297_647&callback=jsonp648';
        $utils = D('Utils');
        $data = $utils->curlGet($url);
        $data =  str_replace(' ', '', $data);
        preg_match_all('/jsonp648\((.*?)\)/',$data,$match1);
//        var_dump($match1[1][0]);
        $brands_L = json_decode($match1[1][0],true);
        foreach ($brands_L['object'] as $key => $brandL){
            //首字母
            foreach ($brandL as $brand){
                $letterBrand=[];
                //车系
                $valueId = $brand['valueId'];
                $propertyId = $brand['propertyId'];
                $brand['leve'] = 1;
                $letterBrand[]=$brand;
//                if($brand['valueName'] == '奥迪'){} else {continue;}
                $this->debug('开始获取'.$brand['propertyName'].': '.$brand['valueName']);
                $url2 = "https://car.m.tmall.com/czda/forest.do?propertyId=$propertyId&valueId=$valueId&_ksTS=".time()."244_662&callback=jsonp663";
                $data2 = $utils->curlGet($url2);
                $data2 =  str_replace(' ', '', $data2);
                preg_match_all('/jsonp663\((.*?)\)$/',$data2,$match2);
                $series = json_decode($match2[1][0],true);
                $DBSeries=[];
                foreach ($series['object'] as $key => $serie){
                    foreach ($serie as $s){
                        $s['leve']=2;
                        $DBSeries[]=$s;
//                        //车系
//                        if($s['valueName'] == 'A6(进口)' || $s['valueName'] == 'A6'){} else{continue;}
                        $this->debug('开始获取'.$s['propertyName'].': '.$s['valueName']);
                        $nvalueId=$s['valueId'];
                        $npropertyId=$s['propertyId'];
                        $url3 = "https://car.m.tmall.com/czda/forest.do?propertyId=$npropertyId&valueId=$nvalueId&_ksTS=".time()."026_676&callback=jsonp677";
                        $data3 = $utils->curlGet($url3);
                        $data3 =  str_replace(' ', '', $data3);
                        preg_match_all('/jsonp677\((.*?)\)$/',$data3,$match3);
                        $year = json_decode($match3[1][0],true);
                        $DBYear=[];
                        foreach ($year['object'] as $ryear) {
                            foreach ($ryear as $y) {
                                $y['leve'] = 3;
                                $DBYear[] = $y;
                                //年款
                                $yvalueId = $y['valueId'];
                                $ypropertyId = $y['propertyId'];
//                                if ($y['valueName'] == '2004款') {}else{continue;}
                                $this->debug('开始获取'.$y['propertyName'].': '.$y['valueName']);
                                $url4 = "https://car.m.tmall.com/czda/forest.do?propertyId=$ypropertyId&valueId=$yvalueId&_ksTS=" . time() . "951_704&callback=jsonp705";
                                $data4 = $utils->curlGet($url4);
                                $data4 = str_replace(' ', '', $data4);
                                preg_match_all('/jsonp705\((.*?)\)$/', $data4, $match4);
                                $k = json_decode($match4[1][0], true);
                                $DBType = [];
                                foreach ($k['object'] as $kk) {
                                    foreach ($kk as $kkk) {
                                        //车型
                                        $kkk['leve'] = 4;
                                        $DBType[] = $kkk;
                                        $this->debug('开始获取'.$kkk['propertyName'].': '.$kkk['valueName']);
                                    }
                                }
                                M('js_tao_brand')->addAll($DBType);
                            }
                        }
                        M('js_tao_brand')->addAll($DBYear);
                    }
                }
                M('js_tao_brand')->addAll($DBSeries);
                M('js_tao_brand')->addAll($letterBrand);
            }
        }
    }
    private function debug($msg){
        if($this->debug){
            echo $msg.PHP_EOL;
        }
    }

    public function test21(){
        $aaa = M('js_tao_brand')->where(['tb_id'=>35488])->find();
//        echo $aaa['valuename'];
        $this->ajax_return($aaa);
    }
}