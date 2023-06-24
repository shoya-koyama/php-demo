<?php

// 呼び出す名前空間を定義
namespace App;

// 必要なクラスをインポート
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

// Articleクラスの定義（Eloquent Modelを継承）
class Article extends Model
{
    // モデルによって自動的に入力（または変更）を許可するフィールドを定義
    protected $fillable = ['title', 'body', 'posted_at', 'published_at', 'like'];

    // 日付をCarbonインスタンスとして扱うフィールドを定義
    protected $dates = ['posted_at', 'published_at'];

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

    // publishメソッド。published_atフィールドを現在の日時に設定して保存する
    public function publish()
    {
        $this->published_at = Carbon::now();
        $this->save();
    }

    // Commentモデルとのリレーションを定義。Articleは多数のCommentを持つ
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
