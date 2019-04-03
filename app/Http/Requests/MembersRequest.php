<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/***********************************************************

 * @params

 * @description 회원 가입 유효성 체크

 * @method POST

 * @return Result.blade.php

 ***********************************************************/
class MembersRequest extends FormRequest
{
   // 사용자 인가
    public function authorize()
    {
        return true;
    }
    // 유효성 체크 규칙
    public function rules()
    {
        return [
            'id'=>['required'],
            'pw_1'=>['required','min:6'],
            'pw_2'=>['required','min:6']
        ];
    }
    // 사용자 정의 오류메세지 정의
    public function messages()
    {
        return [
          'required' => ':attribute은(는) 필수 입력 항목입니다.',
          'min' => ':attribute은(는) 최소:min글자 입력하세요.'
        ];
    }
    // 오류메세지에 표시할 필드이름
    public function attributes()
    {
        return [
            'id' => '아이디',
            'pw_1' => '패스워드',
            'pw_2' => '패스워드확인',
        ];
    }
}
