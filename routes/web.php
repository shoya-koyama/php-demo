<?php

// Laravelのルーティングはweb.phpに記述します
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// ルートページ（'/'）へのアクセスをArticleControllerのindexメソッドにマッピング
Route::get('/', [ArticleController::class, 'index'])->name('index');

// 記事の詳細ページへのアクセスをArticleControllerのdetailメソッドにマッピング
Route::get('/{article}', [ArticleController::class, 'detail'])->name('detail');

// 記事の削除に関するルートをArticleControllerのdeleteメソッドにマッピング
Route::delete('/{article}/delete', [ArticleController::class, 'delete'])->name('delete');

// 記事の更新に関するルートをArticleControllerのupdateメソッドにマッピング
Route::put('/{article}/update', [ArticleController::class, 'update'])->name('update');

// いいね機能に関するルートをArticleControllerのlikeメソッドにマッピング
Route::post('/{article}/like', [ArticleController::class, 'like'])->name('like');

// APIのルートも定義します。ここではapi/articles/{article}/likeへのアクセスをArticleControllerのapi_likeメソッドにマッピング
Route::post('api/articles/{article}/like', [ArticleController::class, 'api_like']);
