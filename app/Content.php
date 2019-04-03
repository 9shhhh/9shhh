<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/***********************************************************

 * @params

 * @description 게시판 관계 정의

 * @method

 * @return

 ***********************************************************/
class Content extends Model
{
    // 소프트 삭제 사용 선언.
    use SoftDeletes;

    // 화이트 리스트
    protected $fillable = [
        'id',
        'title',
        'writer',
        'content',
        'user_id',
    ];
    // member 테이블에 속해있음.(contents 테이블에 user_id라는 외래키, member 테이블에 id 값을 참조.)
    public function Member()
    {
        return $this->belongsTo(Member::class,'user_id','id');
    }
    // hits 테이블을 가지고 있음.
    public function Hit()
    {
        return $this->hasOne(Hit::class);
    }

}
