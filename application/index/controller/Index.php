<?php
namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    protected $request;
    public function __construct()
    {
        $this->request = Request::instance();
    }

    public function index()
    {
        $data = Db::table('kind')->select();
        return json($data);
    }
}
