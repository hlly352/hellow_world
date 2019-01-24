<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\User;
use App\Model\Admin\Article;

class ArticleController extends Controller
{
    //显示文章方法
    public function index()
    {
        //查找文章
       

        return redirect('/');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //从数据库中取出分类
        $rs = Type::get();

        return view('home.article.add',['title'=>'写文章','rs'=>$rs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取需要的值
        $rs = $request->only('title','keywords','description');
        $rs['content'] = $request->input('editorValue');
        $rs['type_id'] = $request->input('twice');
        $rs['person'] = $request->input('person','无个人分类');
        $rs['addtime'] = time();
        $rs['uid'] = 1;
        //通过用户id查询作者
        $rs['author'] = User::select('username')->where('id',$rs['uid'])->first()->username;
        
        try{
            Article::create($rs);
        }catch(\Exception $e){
            $request->flash();
            return back()->with('error','添加失败')->withInput();
        }
            return redirect('/home/article')->with('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
