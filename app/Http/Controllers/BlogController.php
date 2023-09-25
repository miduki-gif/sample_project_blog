<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

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
}
