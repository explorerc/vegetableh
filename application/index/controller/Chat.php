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

class Chat extends Controller
{
  public function info () {
      $chat = new \app\index\model\Chat();
      $userId = 1;
      $res['data'] = $chat -> where('userId','=', $userId) -> select();
      if($res['data']) {
          $res['code'] = 200;
          $res['msg'] = 'success';
          return json($res);
      }
  }
  public function add () {
      $chat = new \app\index\model\Chat();
      $userId = 1;
      $type = $_POST['type'];
      $con = $_POST['con'];
      $time = $_POST['time'];
      $chatInfo = [
          'userid' => $userId,
          'type' => $type,
          'time' => $time,
          'com' => $con
      ];
      $row = $chat->create($chatInfo);
      if ($row) {
          $res['data'] = $chatInfo;
          $res['code'] = 200;
          $res['msg'] = 'success';
      } else {
          $res['data'] = [];
          $res['code'] = 201;
          $res['msg'] = '插入数据失败';
      }
  }
}
