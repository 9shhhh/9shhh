<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/***********************************************************

 * @params

 * @description 회원 가입 관계 정의

 * @method

 * @return

 ***********************************************************/
class Member extends Model
{
    // 화이트 리스트
    protected $fillable =[
        'id',
        'identify',
        'password',
    ];

    // contents 테이블을 가지고 있음.
    public function Content()
    {
        return $this->hasOne(Content::class);
    }
}
