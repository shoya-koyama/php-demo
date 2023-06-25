<?php

// 呼び出す名前空間を定義
namespace App\Models;

// 必要なクラスをインポート
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

// Commentクラスの定義（Eloquent Modelを継承）
class Comment extends Model
{
    // モデルによって自動的に入力（または変更）を許可するフィールドを定義
    protected $fillable = ['text', 'posted_at', 'article_id'];

    // 日付をCarbonインスタンスとして扱うフィールドを定義
    protected $dates = ['posted_at'];

    // コンストラクタメソッド。新しいインスタンスが作られたときに呼び出される
    public function __construct(array $attributes = [])
    {
        // 親クラスのコンストラクタを呼び出す
        parent::__construct($attributes);

        // posted_atフィールドが設定されていなければ現在の日時を設定する
        if (! $this->posted_at) {
            $this->posted_at = Carbon::now();
        }
    }

    // Articleモデルとのリレーションを定義。Commentは一つのArticleに所属する
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}

