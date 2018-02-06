<?php
namespace Manage\Action;
use Manage\Model\UtilsModel;
use Think\Controller;
class IndexAction extends Controller  {
    private $debug = true;

    public function cai(){

    }

    public function index(){
        $this->display('_index');
    }

    public function test(){
        var_dump($_POST);
    }

    public function toupiao(){
        $token = $this->token();
        echo '获取token'."\r\n";
        $min = rand(10,60);
//        echo "投票选择时间{$min}秒"."\r\n";
//        sleep($min);
        echo '开始投票'."\r\n";
        $utils = D('Utils');
        $post_data=[
            'votebuff'=>'[{"subitemid":"466801ea07f64e60aef9f2bce8156ad3","itemid":"0aef9d74e6eb43e797f22f51479dac0b"},{"subitemid":"095bdd830d5d441c894264d360b72eaa","itemid":"30bcf3ee0df948119a0dca3b8a6dc725"},{"subitemid":"ee09bccc26ee468f919f9f841ea4600e","itemid":"747975399c6846728c7d9c06c5840bae"},{"subitemid":"1a2f010f11d0497ba8d263bdfe65f3ed","itemid":"a718399db6c54695929bfca821714d97"},{"subitemid":"e9c894263134421ea17740ffc2384f2a","itemid":"12af3c75a25544d0974a3309b6803148"},{"subitemid":"89deb6fe072540fd87bc3e9c784d7b1d","itemid":"90f2c18e5523454bbf60738948e3d844"},{"subitemid":"88ca0474a5fe4543af747b6af9987ca4","itemid":"af3a776325e04af9817272790a502b87"},{"subitemid":"86c299c61b474ba5a7f122c7de2d6b70","itemid":"42fdbceb0abe4488af6e7df88647fd57"},{"subitemid":"9e85a87d3bdf4cd9907667d3f4907201","itemid":"f1c9f3cc33be43688cc9174a3f9d4b09"},{"subitemid":"3bd4568d3d5041088749aa1873799762","itemid":"b006272020604272ae5d9afef93ea172"},{"subitemid":"a5ea2fa1cef8448280b1a0d3adb76e9f","itemid":"d5d22f39250247fc9d06a1746a145b7e"},{"subitemid":"7b1715b21c7b4348b2608fffae1fde80","itemid":"f51cfc2f99334ddfa7cef951c8fe88ff"},{"subitemid":"9268e54389484baeb8a2a90d6c0372a2","itemid":"d3085a552d014453a40b847053219210"},{"subitemid":"8ce4eb008ea345518fbc6351190f93a0","itemid":"b7daa98141c14e2ab80654e4d0174711"},{"subitemid":"28e9ffc8b72a414b8e9fe035e3fc20a0","itemid":"694c55953000424396e8071ac0641e69"},{"subitemid":"2df8ca5f63a544e1b6f964699bdb1480","itemid":"e6fe4e4244cb434ca1c4ec555b7f89a3"},{"subitemid":"bda5b377410443d8a7b532013717270f","itemid":"fb339f68fbad44339ab2dcad2e09f58b"},{"subitemid":"545677545a0b4c8280d3b2d9b2271f32","itemid":"977e4133c8e241fba883ad321251b901"},{"subitemid":"cda4671f750540459220e1ac2049ca9c","itemid":"e7c2ff703d2d4d4183650e26b20f2c05"},{"subitemid":"56160c13487c4872b441eeca2e0f4232","itemid":"96b57acd85324d5da21b9231f777167e"},{"subitemid":"85d181d1746241adb95c3677eb0c5705","itemid":"56e59af66c5d4ecbb9c5c68f2058b57c"},{"subitemid":"445e4e54e54242fe8467d5a3de85991d","itemid":"337b048145b147c69e7be93c435a3b29"},{"subitemid":"2d9db90a7eaf4a939d92309bfc7df44c","itemid":"5ffb23800b51406e8ce4ef36b7000154"},{"subitemid":"656a58fcc8f649a9bf8e01796e2a4d46","itemid":"275b56a40bcb4beba0daca3a16393f9c"},{"subitemid":"3027d0354b904652a3685cc1cef99579","itemid":"9ef070bd634245eab1d7c6393318c0a9"},{"subitemid":"b3cd87be3767403cbe269d9879998814","itemid":"260f512e02184c5ba8b1439c6dbf29f4"},{"subitemid":"ca33408622ea4597b0ff7d65d7a433bb","itemid":"4cf252047dbc412a8ab68c3273c3bb62"},{"subitemid":"6c7fac9cab384435aa6e3672cdaacba4","itemid":"1a8c5856e850499b850d8ef7381656fb"},{"subitemid":"0dec2cb61e75439db83bf72a50f6ff2d","itemid":"ec1c2ca5b8f54bbb9b8a3839867dfe7c"},{"subitemid":"7f4834b6a7564b7ea4e3bc2164b37a5e","itemid":"54d03e840cb84ed2be4c26379913065a"},{"subitemid":"df77870c4664452d97ba986ac7294184","itemid":"fffabe3d7d4e481791b07f212cbf54ff"},{"subitemid":"977ad5636bb5422194dac5ecf0083757","itemid":"91a65678c7d64c0bb1df67b6f29abe18"},{"subitemid":"e2d78fff291141d6bdf58e43fc83fd60","itemid":"1438fa2123ef47ab9da129c7a6036136"},{"subitemid":"124321e0748f465b9868596fe0cf98a7","itemid":"7f9803f1a39149449ca850b27b700e91"},{"subitemid":"9dcd7a65c01d4a26878d37fdf45824bf","itemid":"a04b630187c3444da6bf7f3693e47b4f"},{"subitemid":"31869a227aad4b0fbd357bd09c780576","itemid":"2028a327b50e48f58d7a4c9f2f05f52d"},{"subitemid":"801038f7c69f43f982451d61cefdcd77","itemid":"2a1b05204c784b89aa5978f2cc89e314"},{"subitemid":"0ffee02fc0714347b5d6086087e86924","itemid":"59713662e16a45b1917b599edda41edb"},{"subitemid":"2346bb5b2e6f492f9af07b3c6b90dd92","itemid":"9a8c2d1ae4ad49348cc010c7c32d8258"},{"subitemid":"b28b7a3b84bc46db8d51fc584ed96ab2","itemid":"f703b52f823742e79e69d8337180b2fd"},{"subitemid":"45aaa0459f42408dae035a8ea03dbac9","itemid":"28fa86b170404c128cca873b69ff0ff1"},{"subitemid":"9ec25073f84e4e18a915640e65d02fb7","itemid":"419132d55dd447c682395ea55916fe85"},{"subitemid":"2038378c64954c6a9c5e4a9bfd22a1ea","itemid":"fa0c511d44d44697a86d877d8510954b"},{"subitemid":"6016daeb73d3489b962617a91a09fe13","itemid":"d2a319c1ad124beb86fb3174516a5823"},{"subitemid":"c623ca14fea146eb89b7ff4387c707f6","itemid":"961403e0bcbf4299be2a104f58882d1c"},{"subitemid":"ed121245d99a4b2197988327c21f63a1","itemid":"2e5a3fb39cc1418ab6b8b2f651ff8a93"},{"subitemid":"bbe2612ed15e47fd8e8bd4d6744bdfbb","itemid":"27846ac74cc24cbeaf809d4add8149c2"},{"subitemid":"740e7ac47f504581a3a94908f158296b","itemid":"1a39bc4992244af9a534600728ef0d02"},{"subitemid":"604eb33c601144ef82a056335c389ea7","itemid":"665712bd24404ab88c2a53e664aa08b2"},{"subitemid":"972251dcfe23401d945829227c5b2055","itemid":"39a44751cab94f5a90170c67e98023cc"},{"subitemid":"646e0917885e440dba403013ebc5de91","itemid":"f4a2ca3cff914661800cb5f23f4efcee"},{"subitemid":"2215a54f7e4240bab4f6a81ff7f62ac9","itemid":"125250b00df146079819858286ac44d3"},{"subitemid":"1dee55ec8f2641cf94361be6c91e14c4","itemid":"539a4573c50d47e69d1804821c96b99e"},{"subitemid":"3732769d34734bb994ba021fe9114215","itemid":"347dff3adee34ea5b8bd3d349b243551"},{"subitemid":"a84e4e045b014eb7bbeb8022d8612fc2","itemid":"d5927c7110d94e52be8a94e1413358d4"},{"subitemid":"efc8ada740a844c0b34afab1f22d497f","itemid":"b178439fe0854b4aaa0e96a46b7519ec"},{"subitemid":"9e1a1bc752dd4574809ee2ff492c4274","itemid":"8e2506acc68d41cd90505c727c462a08"},{"subitemid":"87d3263f9f32444d8f5622acedd181ae","itemid":"42c94292b0b740058b736c1fc73463b6"},{"subitemid":"89f20f383f0e40dc92349a3a7a5c216e","itemid":"004d711ecddd405fab0d495727b929d4"},{"subitemid":"ce9cee9339954fdaa091b59fd2f56190","itemid":"9c397744f5864872b2e57eec1d0d6da1"},{"subitemid":"b3bfed660c0e4793816e40e08537848c","itemid":"68b193e1dc854745ad952424ffe425ea"},{"subitemid":"74179d2da4244d5da8aa176fbb4a35cb","itemid":"69d51acb502f4cc1b3aee04a1fc4a57c"},{"subitemid":"6864003b46c64eeaaab17bbeeaedec44","itemid":"80fa9ee9ca1b493aaa6afcf0e545ffc5"},{"subitemid":"67708748694c41e283cab30375de521e","itemid":"ca6642492cc94551af27f1b777bba007"},{"subitemid":"6dbfeaadf5c843d2940f8d0851f2c36b","itemid":"7deac4d5294d4a97937553183c5d804a"},{"subitemid":"ac4a5eafcd714734a7e4775868230d03","itemid":"3121e1b5c3c844e98a99d1267a409f32"},{"subitemid":"d0454d7bbe10407bba0436e085f85d31","itemid":"9aefb3424a7d4f6a906429020210ccad"},{"subitemid":"b88d21702b8e4b4592254d9826a9e611","itemid":"679911b1cd84420b8c322307df3f8dc0"},{"subitemid":"bcdfbc31150a4ef9ac387fe35d3c39f7","itemid":"87466cb152bd49b0b698232afccfb914"},{"subitemid":"86a26637d506456cb617eb126e34a42e","itemid":"d5f48e1ce43d4a989e52c87657daf30d"}]',
            'surveyid'=>'871aba81bf784a528eec55fa897aa639',
            'ptoken'=>$token

        ];
        $data = $utils->curlGet('http://www.xinyang.gov.cn/front/onlinesurvey/savevote',$post_data);
        $result = json_decode($data,true);
        if($result['success']){
            echo $result['msg']."\r\n";
        } else {
            echo $result['msg']."\r\n";
        }
        echo '投票结束。准备下一轮'."\r\n"."\r\n";
    }
    public function s(){
        $i=457;
        while (1==1){
            $i++;
            echo "合计投票{$i}次"."\r\n";
            $this->toupiao();
        }
    }

    public function token(){
        $utils = D('Utils');
        $data = $utils->curlGet('http://www.xinyang.gov.cn/front/onlinesurvey/vote?id=871aba81bf784a528eec55fa897aa639');
        $p="/<input type=\"hidden\" id=\"ptoken\" value=\"(.*?)\"/";
        preg_match($p,$data,$b);
        return$b[1];
        //<input type="hidden" id="ptoken" value="d47841a8dd4044178c622b9e537cf0de">

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
    public function test2(){
    }
}
