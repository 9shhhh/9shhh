<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

/***********************************************************

 * @params Request

 * @description 로그인

 * @method POST

 * @return

 ***********************************************************/
class LoginController extends Controller
{
    // 로그인 폼 요청
    public function index(Request $request)
    {
        // 세션에 유저아이디 값 존재 여부 체크
        if($request->session()->has('user_id')) {
            // 세션에 값이 존재함.(로그인이 완료->게시판으로 분기.)
            return redirect(route('list.index'));
        }else{
            // 세션에 아이디 기억 체크 값이 있으면,
            if($request->session()->has('check')){
                // 체크값
                $checked = $request->session()->get('check');
                // 아이디 기억값
                $remeberID = $request->session()->get('remember_id');
                // 로그인 블레이드에 아이디기억 값과 체크값을 전달.
                return view('welcome',['checked'=>$checked,'rememberID'=>$remeberID]);
            }

            return view('welcome');
        }
    }
    // 로그인 작업
    public function store(Request $request)
    {
        // 유효성 체크
        $this->validate($request,[
           'id'=>'required',
           'pw'=>'required',
        ]);

        // 입력한 아이디에 해당하는 패스워드를 DB에서 가져오기.
        $db_pw = Member::where('identify',$request->id)->value('password');
        // password_verify()을 이용하여, 폼에서 입력한 패스워드와 DB에 입력한 패스워드 값을 비교.
        if(password_verify($request->pw,$db_pw)){
            // 세션에 아이디를 저장
            session()->put('user_id', $request->id);
            // 로그인 아이디에 대한 고유 id값 조회 후,
            $db_uniId = Member::Where('identify',$request->id)->value('id');
            // 해당 아이디의 이름(key), 고유id(value)로 세션에 저장.
            $request->session()->put($request->id,$db_uniId);

            // 아이디 기억 로직
            if($request->stay){
                // 유저아이디 세션저장
                $request->session()->put('remember_id', $request->id);
                // 아이디 기억 체크값 세션저장
                $request->session()->put('check', $request->stay);
            }else{
                // 유저아이디 세션해제
                $request->session()->forget('remember_id');
                // 아이디 기억 체크값 세션해제
                $request->session()->forget('check');
            }
            // 로그인 화면 재 요청
            return redirect(route('login.index'));
        }else{
            dd('존재하지 않는 계정입니다.');
        }
    }
    public function create()
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    // 로그아웃
    public function destroy(Request $request)
    {
        // 유저아이디의 고유 id 값 세션해제
        $request->session()->forget($request->session()->get('user_id'));
        // 유저아이디 세션해제
        $request->session()->forget('user_id');

        return redirect(route('login.index'));
    }
}
