<?php
/**
 * Created by PhpStorm.
 * User: liaorui
 * Date: 17-11-20
 * Time: 下午4:41
 */

namespace Manage\Action;


use Think\Controller;

class CarAction extends Controller
{
    public function brandList(){
        $brands = M('js_car_brand')->select();
        $this->ajax_return($brands);
    }

    public function firmList(){
        $brand = I('brand',0);
        $parent = I('parent',0);
        $where=[];
        if($brand > 0){
            $where=['cs_brand_id'=>$brand];
        } elseif($parent > 0) {
            $where=['cs_parent_id'=>$parent];
        }
        $brands = M('js_car_series')->where($where)->select();
        $this->ajax_return($brands);
    }

    public function taoList(){
        $valueid =I('valueid',0);
        $propertyid =I('propertyid',0);
        $where = [];
        if($valueid > 0 && $propertyid > 0){
            $where=[
                'parentValueId'=>$valueid,
                'parentPropertyId'=>$propertyid
            ];
            $brands = M('js_tao_brand')->where($where)->select();
        } else {
            $where=['leve'=>1];
            $brands = M('js_tao_brand')->where($where)->select();
        }
//        var_dump($where);
//        $brands = M('js_tao_brand')->where($where)->select();
//        echo M('js_tao_brand')->getLastSql();die;
        $this->ajax_return($brands);
    }
}