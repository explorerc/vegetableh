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
