<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
\think\Route::get('/','index/index/index');
\think\Route::get('/index/index','index/index/index');

\think\Route::get('/user','index/user/getAll');
\think\Route::get('/user/add','index/user/add');
\think\Route::get('/user/delete','index/user/delete');
\think\Route::get('/user/update','index/user/update');

\think\Route::get('/goods','index/goods/getAll');
\think\Route::get('/goods/add','index/goods/add');
\think\Route::get('/goods/delete','index/goods/delete');
\think\Route::get('/goods/update','index/goods/update');
\think\Route::get('goods/id','index/goods/id');


\think\Route::get('/cart/info','index/cart/info');  // 根据用户id查询购物车中的信息
\think\Route::get('/cart','index/cart/getAll'); // 管理员查看所有购物车信息
\think\Route::get('/cart/add','index/cart/add'); // 新增cart（购物车）记录
\think\Route::get('/cart/delete','index/cart/delete');
\think\Route::get('/cart/update','index/cart/update');
\think\Route::get('/cart/minNum','index/cart/minNum');
\think\Route::get('/cart/addNum','index/cart/addNum');

\think\Route::get('/orders/info','index/orders/info');  // 根据用户id查询购物车中的信息
\think\Route::get('/orders','index/orders/getAll'); // 管理员查看所有购物车信息
\think\Route::get('/orders/add','index/orders/add'); // 新增cart（购物车）记录
\think\Route::get('/orders/delete','index/orders/delete');
\think\Route::get('/orders/update','index/orders/update');



return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '[add]'    => [
    ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    ':name' => ['index/hello', ['method' => 'post']],
]

];
