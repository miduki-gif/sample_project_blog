<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    //①（M）Blog　Modelを呼び出す
    //②(C) ControllerからBladeに渡す
    //③（V）Bladeで表示する　
     /**
     * ブログ一覧を表示する
     * 
     *  @return view
     */
    public function showList()
    {
        $blogs = Blog::all();

        return view('blog.list',['blogs' =>$blogs ]);
    }

     /**
     * ブログ詳細を表示する
     *  @param  int $id
     *  @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);

        if(is_null($blog))
        {
            Session()->flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.detail',['blog' =>$blog ]);
    }
        /**
     * ブログ登録画面を表示する
     *  @return view
     */
        public function showCreate()
        {
            return view('blog.form');
        }
            /**
     * ブログ登録する
     *  @return view
     */
    public function exeStore(BlogRequest $request)
    {
        //ブログのデータを受け取る
        $inputs = $request->all();

        DB::beginTransaction();

        try{
             //ブログ登録
            Blog::create($inputs);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollBack();
            abort(500);
        }
       
        Session()->flash('err_msg','ブログを登録しました');
        return redirect(route('blogs'));
    }
    /**
     * ブログ編集フォームを表示する
     *  @param  int $id
     *  @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);

        if(is_null($blog))
        {
            Session()->flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.edit',['blog' =>$blog ]);
    }
     /**
     * ブログ更新する
     *  @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        //ブログのデータを受け取る
        $inputs = $request->all();
        DB::beginTransaction();

        try{
             //ブログ更新
            $blog_Update= Blog::find($inputs ['id']);
            $blog_Update->fill([
                'title' => $inputs ['title'],
                'content' => $inputs ['content']
            ]);
            $blog_Update->save();
            DB::commit();
        }catch(\Throwable $e){
            DB::rollBack();
            abort(500);
        }
       
        Session()->flash('err_msg','ブログを更新しました');
        return redirect(route('blogs'));
    }
}
