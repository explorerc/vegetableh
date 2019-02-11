<?php
/**
 * Created by PhpStorm.
 * User: chenqi
 * Date: 2019-01-31
 * Time: 13:39
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class Goods extends Controller
{

    public function index (){
        return 'hello';
    }
    public function getAll (){
       $goods = new \app\index\model\Goods();
       $goodsInfo = $goods -> select();
       return json($goodsInfo);
    }
    public function add (){
        $goods = new \app\index\model\Goods();
        $goodObject = [];
        $res = $goods::create($goodObject);
        if ($res) {
            return '获取权限成功';
        } else {
            return '获取权限失败';
        }
    }
    public function delete (){
        $goods = new \app\index\model\Goods();
        return 'add';
    }
    public function update (){
        $goods = new \app\index\model\Goods();
        return 'add';
    }
    public function id () {
        $goods = new \app\index\model\Goods();
        $id = $_GET['id'];
//        $id = 1;
        $goodInfo = $goods ->where('id','=',$id) -> select();
        return json($goodInfo);
    }
}
