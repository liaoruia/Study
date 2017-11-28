<?php
namespace Home\Action;
use Think\Controller;
class IndexAction extends Controller {
    public function index(){
        $this->display();
    }

    public function test(){
        echo 123;die;
    }
}