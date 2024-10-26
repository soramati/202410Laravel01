<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];
    protected $table = 'posts';
    //ここで明示的にテーブル名を指定できる
    //古いデータベースをLaravelで使う際に使用することが多い


    //get()はModelクラスのメソッド

    use HasFactory;
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    public static function getPaginateByLimit(int $limit_count = 10)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return self::orderBy('updated_at', 'DESC')->paginate($limit_count);
}
}
    ?>