<?php
/**
 * Created by PhpStorm.
 * User: daxia
 * Date: 2017/6/21
 * Time: 11:57
 */

namespace Manage\Action;
use Think\Controller;
class UserAction extends Controller
{
    public function lists(){
        $UserList = M('user')->select();
        $this->ajax_return($UserList);
    }

    public function add(){

    }

    public function ajax(){
        //检查用户名是否重复
        $_action = I('action');
        if($_action == 'checkusername'){
            $uid=I('uid');
            $username=I('username');
            $result = $this->_checkusername($username,$uid);
            $msg = $result?['info'=>"成功",'code'=>200]:['info'=>'用户名不可用！','code'=>201];
            $this->ajax_return(['info'=>$msg['info']],$msg['code']);
        }elseif ($_action == 'add'){
            $addData['username'] = I('username');
            $addData['email'] = I('email');
            $addData['passwd'] = I('passwd');
            M('user')->add($addData);
            $this->ajax_return(['info'=>'成功'],200);
        }elseif($_action == 'edit'){
            $addData['username'] = I('username');
            $addData['email'] = I('email');
            $uid=I('uid');

            //检查用户名是否被占用
            $result = $this->_checkusername($addData['username'],$uid);
            if(!$result)$msg = ['info'=>'用户名不可用！','code'=>201];

            //检查邮箱是否被占用
            $result = $this->_checkemail($addData['email'],$uid);
            if(!$result)$msg = ['info'=>'邮箱不可用！','code'=>202];

            $result = M('user')->where(['uid'=>$uid])->save($addData);
            if(!$result)$msg = ['info'=>'修改失败！','code'=>203];

            $this->ajax_return($msg['info'],$msg['code']);
        }elseif ($_action == 'del'){
            $msg=['info'=>"删除成功",'code'=>200];
            $uid=I('uid');
            $result = M('user')->where(['uid'=>$uid])->save(['status'=>2]);
            if(!$result)$msg = ['info'=>'删除失败！','code'=>203];

            $this->ajax_return($msg['info'],$msg['code']);
        }
    }

    private function _checkusername($username,$uid=0){
        if(!$username) return false;
        $where =['username'=>$username];
        if($uid > 0) $where['uid']=['neq',$uid];
        $user = M('user')->where($where)->find();
        $result = !$user?true:false;
        return $result;
    }

    private function _checkemail($email,$uid){
        if(!$email) return false;
        $where =['email'=>$email];
        if($uid > 0) $where['uid']=['neq',$uid];
        $user = M('user')->where($where)->find();
        $result = !$user?true:false;
        return $result;
    }
}