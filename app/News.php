<?php //modelのファイルだよ、validetion設定

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    
    //追記
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    
    // News Modelに関連付けを行う
    public function histories()
    {
      //hasMany主テーブルのあるレコードに対して、従テーブルの複数のレコードが紐付けるとき使う
      return $this->hasMany('App\History');

    }
}
