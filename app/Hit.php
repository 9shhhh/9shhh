<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    // 화이트 리스트
    protected $fillable=['content_id','user_name'];

    // contents 테이블에 속해있음.(hits 테이블에 content_id라는 외래키, contents 테이블에 id 값을 참조.)
    public function Content()
    {
        return $this->belongsTo(Content::class,'content_id','id');
    }
}
