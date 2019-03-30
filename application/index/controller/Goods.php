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
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');

class Goods extends Controller
{

    public function index (){
        return 'hello';
    }
    public function Data1 () {}
    public function getAll (){
       $goods = new \app\index\model\Goods();
       $goodsInfo = $goods -> select();
       return json($goodsInfo);
    }
    public function getByPage (){
        $page = $_GET['page'];
        $pageSize = $_GET['pageSize'];
//        $page = 1;
//        $pageSize = 10;
        $start = ($page-1)*$pageSize;
        $good = new \app\index\model\Goods();
        $gooodsInfo['info'] = $good ->limit($start, $pageSize)-> select();
        $gooodsInfo['total'] = $good -> count();
//        $data = new Data1();
//        $data -> goodsInfo = $$gooodsInfo;
        return json($gooodsInfo);
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
