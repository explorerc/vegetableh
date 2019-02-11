<?php
/**
 * Created by PhpStorm.
 * User: chenqi
 * Date: 2019-02-08
 * Time: 16:17
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Cart extends Controller
{
    public function info (){
//        $map['w.id']= $_GET['userId'];
//        $map['w.userId']= $_GET['userId'];
        $map['w.userId']= 1;
        $info = Db::table('goods')
            ->alias('a')
            ->join('cart w','a.id = w.goodId')
            ->where($map)
            ->select();
        return json($info);
    }
    public function addNum () {
        $id = 1;
        $map['goodId'] = 20;
        Db::table('cart')
            ->where('id', $id)
            ->update([
                'number' => Db::raw('number+1')
            ]);
        return json();
    }
    public function minNum () {
        $id = 1;
        $map['goodId'] = 20;
        Db::table('cart')
            ->where('id', $id)
            ->update([
                'number' => Db::raw('number-1')
            ]);
        return json();
    }
    // 增加cart表的数据
    public function add () {
        $userId = $_GET['userId'];
        $goodId = $_GET['goodId'];
        $number = $_GET['number'];
        $cart = new \app\index\model\Cart();
        // 测试用
//        $userId = 1;
//        $goodId = 80;
//        $number = 1;
        // 判断该商品是否已经加入购物车
        $map['userId']= $userId;
        $map['goodId']= $goodId;
        $cartInfo = $cart ->where($map)-> select();
        // 该用户的购物车已有该商品
        if (count($cartInfo)>0) {
            $newNumber = $cartInfo[0]['number'] + $number;
            $addRes = Db::table('cart')
                ->where('id', $cartInfo[0]['id'])
                ->update([
                    'number' => Db::raw($newNumber)
                ]);
            if ($addRes) {
                return '改变商品的数量成功';
            } else {
                return '改变商品的数量失败';
            }

        } else {
            $cartObj = [
                "userId" => $userId,
                "goodId" => $goodId,
                "number" => $number
             ];
            $addRes = $cart::create($cartObj);
            if ($addRes) {
                return '加入购物车成功';
            } else {
                return '加入购物车失败';
            }
        }
    }
    // 删除购物车中的数据
    public function delete () {

        $ids = $_GET['ids'];
//        $ids = [1];
        $cart = new \app\index\model\Cart();
        $delInfo = $cart ->where('id','in',$ids)-> delete();
        return json($delInfo);

    }
}
