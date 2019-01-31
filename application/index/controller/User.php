<?php
/**
 * Created by PhpStorm.
 * User: chenqi
 * Date: 2019-01-30
 * Time: 17:55
 */

namespace app\index\controller;


use think\Controller;

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
    return '成功';
 }
}