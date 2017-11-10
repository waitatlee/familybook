<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
//Excel导出的示例
Route::get('/excel', function(){
    Excel::create('大茶村族谱', function($excel) {
        $excel->sheet('生产一队', function($sheet) {
            $sheet->setOrientation('这是什么?');
        });

    })->export('xlsx');
});

Route::get('/readExcel', function(){
    $path = './test.xlsx';
    $res = [];
    Excel::load($path, function($reader) use( &$res ) {
        $reader = $reader->getSheet(0);
        $res = $reader->toArray();
    });
    var_dump($res);
});



