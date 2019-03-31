<?php
/**
 * Created by PhpStorm.
 * User: eplus
 * Date: 2019/3/31
 * Time: 15:50
 */

namespace app\index\controller;


use think\Controller;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Kind extends Controller
{
    public function getAll () {
        $kind = new  \app\index\model\Kind();
        $res['data'] = $kind -> select();
        $res['code'] = 200;
        $res['msg'] = 'success';
//        return json('{'code':200,'data':$kindInfo}');
        return json($res);
    }
    public function getByPage () {
        $kind = new  \app\index\model\Kind();
//        $page = $_GET['page'];
//        $pageSize = $_GET['pageSize'];
        $page = 1;
        $pageSize = 10;
        $start = ($page-1)*$pageSize;
        $res['data']['info'] = $kind ->limit($start, $pageSize)-> select();
        $res['data']['total'] = $kind -> count();
        $res['code'] = 200;
        $res['msg'] = 'success';
        return json($res);
    }
    public function delete (){
//        $id = $_GET['id'];
        $id = 20;
        if (!$id) {
            $res['data'] = null;
            $res['code'] = 201;
            $res['msg'] = '参数错误';
            return json($res);
        }
        $kind = new \app\index\model\Kind();
        $res['data'] = $kind ->where('id','=',$id) -> delete();
        $res['msg'] = 'success';
        $res['code'] = 200;
        return json($res);
    }
    public function update (){
        $kind = new \app\index\model\Kind();
        $id = $_GET['id'];
        $name = $_GET['name'];
//        $id = 20;
        if (!$id || !$name) {
            $res['data'] = null;
            $res['code'] = 201;
            $res['msg'] = '参数错误';
            return json($res);
        }
        $res['data'] = $kind -> save(['name'=>$name], ['id' => $id]);
        $res['msg'] = 'success';
        $res['code'] = 200;
        return json($res);
    }
    public function add (){
        $kind = new \app\index\model\Kind();
        $name = $_GET['name'];
//        $id = 20;
        if (!$name) {
            $res['data'] = null;
            $res['code'] = 201;
            $res['msg'] = '参数错误';
            return json($res);
        }
        $res['data'] = $kind -> save(['name'=>$name]);
        $res['msg'] = 'success';
        $res['code'] = 200;
        return json($res);
    }
}