<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Articel;

class IndexController extends Controller
{
    //显示首页方法
    public function index(){
    	//从数据库中查找优质文章
    	 $rs = \DB::table('article')->join('art_info','article.id','=','art_info.art_id')->select('*')->orderBy('read_num','desc')->get();
    	return view('welcome',['title'=>'首页','rs'=>$rs]);
    }

}
