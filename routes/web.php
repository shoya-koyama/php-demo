<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// ルートページ（'/'）へのアクセスをArticleControllerのindexメソッドにマッピング
Route::get('/', [ArticleController::class, 'index'])->name('index');

// 記事の作成を行うPOSTリクエストをArticleControllerのstoreメソッドにマッピング
Route::post('/', [ArticleController::class, 'store'])->name('store');

// 記事の詳細ページへのアクセスをArticleControllerのshowメソッドにマッピング
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('detail');

// 記事の更新ページを表示するGETリクエストをArticleControllerのeditメソッドにマッピング
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('edit');

// 記事の更新を行うPUTリクエストをArticleControllerのupdateメソッドにマッピング
Route::put('/article/{id}', [ArticleController::class, 'update'])->name('update');

// 記事の削除を行うDELETEリクエストをArticleControllerのdeleteメソッドにマッピング
Route::delete('/article/{id}', [ArticleController::class, 'delete'])->name('delete');

// いいね機能に関するルートをArticleControllerのlikeメソッドにマッピング
Route::post('/article/{id}/like', [ArticleController::class, 'like'])->name('like');

// APIのルートも定義します。ここではapi/articles/{id}/likeへのアクセスをArticleControllerのapi_likeメソッドにマッピング
Route::post('api/articles/{id}/like', [ArticleController::class, 'api_like']);
