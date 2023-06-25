<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort');
        if ($sort == 'like') {
            $articles = Article::orderBy('like', 'desc')->get();
        } else {
            $articles = Article::orderBy('posted_at', 'desc')->get();
        }

        return view('project.index', ['articles' => $articles]);
    }

    public function detail($article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404, 'Article does not exist');
        }

        $comments = Comment::where('article_id', $article_id)->orderBy('posted_at', 'desc')->get();

        return view('project.detail', ['article' => $article, 'comments' => $comments]);
    }

    public function update(Request $request, $article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404, 'Article does not exist');
        }

        $article->title = $request->input('title');
        $article->body = $request->input('text');
        $article->save();

        return Redirect::route('detail', ['article_id' => $article_id]);
    }

    public function delete($article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404, 'Article does not exist');
        }

        $article->delete();

        return Redirect::route('index');
    }

    public function like($article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404, 'Article does not exist');
        }

        $article->like += 1;
        $article->save();

        return Redirect::route('detail', ['article_id' => $article_id]);
    }

    public function api_like($article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404, 'Article does not exist');
        }

        $article->like += 1;
        $article->save();

        return Response::json(['id' => $article_id, 'like' => $article->like]);
    }
    public function edit($id)
    {
        $article = Article::find($id);  // IDで記事を検索

        return view('edit_article', ['article' => $article]);  // ビューを表示
    }
    public function show($id)
    {
        $article = Article::find($id);  // IDで記事を検索

        // 関連するコメントを検索 (この部分はあなたのデータベース設計によります)
        $comments = Comment::where('article_id', $id)->get();

        return view('detail_article', ['article' => $article, 'comments' => $comments]);  // ビューを表示
    }
    

    public function store(Request $request)
    {
        $article = new Article;  // 新しい記事を作成
        $article->title = $request->title;  // タイトルを設定
        $article->body = $request->text;  // 本文を設定
        $article->posted_at = now();  // 投稿日時を設定
        $article->save();  // 保存

        return redirect()->route('index');  // 一覧ページにリダイレクト
    }
}
