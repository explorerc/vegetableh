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
    // 关键字搜索
    public function key (){
        $key = $_GET['key'];
//        return json($key);
//        $key = '有机';
        $goods = new \app\index\model\Goods();
        $goodsInfo = $goods -> where('name','like','%'.$key.'%')-> select();
        return json($goodsInfo);
    }
    public function getByPage (){
        $page = $_GET['page'];
        $pageSize = $_GET['pageSize'];
//        $page = 1;
//        $pageSize = 10;
        $start = ($page-1)*$pageSize;
        $good = new \app\index\model\Goods();
        $goodsInfo['info'] = $good ->limit($start, $pageSize)-> select();
        $goodsInfo['total'] = $good -> count();
//        $data = new Data1();
//        $data -> goodsInfo = $$gooodsInfo;
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
        $id = 100;
        if (!$id) {
            $res['data'] = null;
            $res['code'] = 201;
            $res['msg'] = '参数错误';
            return json($res);
        }
        $good = new \app\index\model\Goods();
        $res['data'] = $good ->where('id','=',$id) -> delete();
        $res['msg'] = 'success';
        $res['code'] = 200;
        return json($res);
    }
    public function update (){
        $goods = new \app\index\model\Goods();
        $id = $_GET['id'];
        $good['name'] = $_GET['name'];
        $good['kindId'] = $_GET['kindId'];
        $good['imgUrl'] = $_GET['imgUrl'];
        $good['price'] = $_GET['price'];
        $good['disPrice'] = $_GET['disPrice'];
        $good['isBuy'] = $_GET['idBuy'];
        $good['inventory'] = $_GET['inventory'];
        $res['data'] = $goods -> where('id','=',$id) ->update($good);
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
