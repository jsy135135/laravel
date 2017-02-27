<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{

    //
    public function index()
    {
        return '123456789';
    }

    public function  test1()
    {
        #获取所有的用户的输入
        $all = Input::all();
        #利用规则生产严重对象
        $validator = Validator::make($all, [
            'name' => 'required'
        ]);
        #判断严重失败
        #var_dump($validator->fails());die(); #如果验证失败了、返回true、成功了返回false
        if($validator->fails()){
            echo '输入不合法';
        }else{
            echo '输入合法';
        }
        #接收输入的get参数
        #$_GET['name'];
        return Input::get('name', '李四');
//        return 'test1';
    }

    public function test2()
    {
        #加载resources/views/index.blade.php
//        return view('index', [
//            'name1' => 'value1',
//            'name2' => 'value2',
//            'name3' => 'value3',
//        ]);
        return view('index')->with('name1','value1')
            ->with('arr', [1,2,3,4,5,6,7,8,9])
            ->with('ts', time());
    }

    public function test3()
    {
//        $rows = DB::select(DB::raw("SELECT * FROM test"));
//        $rows = DB::table('test')->select()->get();
//        var_dump($rows);
//        return $rows[0]->name;
//          $test = Test::where('id', 1)->get();
          $test = Test::where('id', 1)->first();
//          var_dump($test);
          echo $test->name;
    }
}
