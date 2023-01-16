<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;
use Illuminate\Support\Facades\DB;

class myController extends Controller
{
    public function show_index()
    {
        //若為初次進入畫面，先建立class資料表資料和setting資料表
        $db_setting_table = DB::table('setting')->get();
        if ($db_setting_table->isEmpty()) {
            DB::table('setting')->insert([
                'week_days' => 5,
                'number_of_class' => 8,
            ]);
        }
        $week_days=DB::table('setting')->value('week_days');
        $number_of_class=DB::table('setting')->value('number_of_class');

        $db_class_table = DB::table('class')->get();
        if ($db_class_table->isEmpty()) {
            for ($i = 1; $i <= $week_days*$number_of_class; $i++) {
                DB::table('class')->insert([
                    'class_name' => '課程名稱',
                    'professor' => '教授名字',
                    'classroom' => '教室位置',
                ]);
            }
            $db_class_table = DB::table('class')->get();//建立資料後再重新定義一次$db_class_table
        }
        //----------------

        /*
        DB::table('class')->truncate();
        DB::table('setting')->truncate();
        dd('1');
        */

        $title='課表';

        return view('index', compact('title','db_class_table','week_days','number_of_class'));
    }

    public function show_setting()
    {
        //若未先進入首頁產生class資料表資料，則重導向至首頁
        $db_class_table = DB::table('class')->get();
        if ($db_class_table->isEmpty()) {
            return redirect(route('show_index'));
        } else {
            //將目前課表表格設定值傳至setting.blade，用於設定下拉選單預設值
            $week_days=DB::table('setting')->value('week_days');
            $number_of_class=DB::table('setting')->value('number_of_class');
            $title = '設定';
            return view('setting', compact('title','week_days','number_of_class'));
        }
    }

    public function store_setting(Request $request)
    {

        $week_days = $request->get('week_days');
        $number_of_class = $request->get('number_of_class');

        DB::table('setting')
            ->where('id', 1)
            ->update([
                'week_days' => $week_days,
                'number_of_class' => $number_of_class
            ]);

        //class資料表資料全部刪除重新建立
        DB::table('class')->truncate();
        for ($i = 1; $i <= $week_days*$number_of_class; $i++) {
            DB::table('class')->insert([
                'class_name' => '課程名稱',
                'professor' => '教授名字',
                'classroom' => '教室位置',
            ]);
        }

        return redirect(route('show_index'));
    }
}
