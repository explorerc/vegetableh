<?php
/**
 * Created by PhpStorm.
 * User: chenqi
 * Date: 2019-01-30
 * Time: 17:55
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class User extends Controller
{
 public function index(){
     return 'hello';
 }
 public function getAll(){
    return '成功';
 }
 public function add(){
//    $user = new \app\index\model\User();
//    $user -> name = 'kiki';
//    $user -> address1 = '北京';'
//     $res = $user->save();
     $userInfo = [
         "name" =>'kiki2',
         "address1" => '上海'
     ];
     $res = \app\index\model\User::create($userInfo);

    if ($res) {
        return '获取权限成功';
    } else {
        return '获取权限失败';
    }
 }
 public function delete(){
    return '成功';
 }
 public function update(){
//     $userInfo = $_GET['userInfo'];
     $id = $_GET['id'];
     $userInfo['name'] = $_GET['name'];
     $userInfo['nickname'] = $_GET['nickname'];
     $userInfo['tel'] = $_GET['tel'];
     $userInfo['address1'] = $_GET['address1'];
     $userInfo['birth'] = $_GET['birth'];
     $user = new \app\index\model\User();
//     $id = 1;
//     $userInfo['name'] = 'cq';
//     $userInfo['nickname'] = 'kiki1';
//     $userInfo['tel'] = '1234567890';
//     $userInfo['address1'] = '北京啦啦';
//     $userInfo['birth'] ='2018/11/11';
     $res = $user
         ->where('id','=', $id)
//         ->select();
         ->update($userInfo);
     return json($res);
 }
 public function id () {
     $userId = $_GET['userId'];
//     $userId = 1;
     $user = new \app\index\model\User();
     $userInfo = $user -> where('id', '=',$userId) -> select();
     return json($userInfo);
 }
}
