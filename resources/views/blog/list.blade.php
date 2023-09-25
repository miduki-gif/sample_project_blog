<!-- 
①共通テンプレートlayout.blade.phpを作る
②共通ヘッダーを作る
③共通フッターを作る
④共通テンプレを継承したリストを作る
-->

<!--
    ①リンクを作る
    ②routeを作る
    ③（CM）Conttollerを作る
    ④（V）詳細画面を作る
-->
@extends('blog.layout')
@section('title', 'ブログ一覧')
@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>ブログ記事一覧</h2>
            @if (Session('err_msg'))
            <p class="text-danger">
                {{ Session('err_msg') }}
            </p>
            @endif
            
            <table class="table table-striped">
                <tr>
                    <th>記事番号</th>
                    <th>タイトル</th>
                    <th>日付</th>
                    @foreach ($blogs as $blog)
                </tr>
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></td>
                    <td>{{ $blog->updated_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
        @endsection