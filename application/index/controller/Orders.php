<?php
/**
 * Created by PhpStorm.
 * User: chenqi
 * Date: 2019-02-11
 * Time: 18:07
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Orders extends Controller
{
 public function info () {
//     $map['w.userId'] = $_GET['userId'];
     $map['w.userId'] = 1;
     $info = Db::table('goods')
         ->alias('a')
         ->join('orders w','a.id = w.goodId')
         ->where($map)
         ->select();
     return json($info);
 }
}
