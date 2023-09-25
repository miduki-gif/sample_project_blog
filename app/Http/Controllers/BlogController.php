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
}
