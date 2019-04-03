<?php

namespace App\Http\Controllers;

use App\Content;
use App\Hit;
use Illuminate\Http\Request;
/***********************************************************

 * @params Request

 * @description 게시판

 * @method

 * @return

 ***********************************************************/
class ListController extends Controller
{
    // 게시판 홈
    public function index(Request $request)
    {
        // 게시글 불러오기(contents 테이블에 모든 작성글)
        $contents = Content::all();

        return view('list.home',['id'=>$request->session()->get('user_id'),'contents'=>$contents]);
    }
    // 글 작성 폼
    public function create(Request $request)
    {
        return view("list.create",['id'=>$request->session()->get('user_id')]);
    }
    // 글 작성 작업
    public function store(Request $request)
    {
        // 현재 로그인된 사용자의 아이디값을 세션에서 조회하고,
        $userIdentify = $request->session()->get('user_id');
        // 그 유저가 가지고 있는 고유의 id값을 세션에서 가져온다.
        $user_id = session()->get($userIdentify);
        // 제목, 작성자, 내용 contents 테이블에 저장
        Content::create([
            'title'=>$request->title,
            'writer'=>$request->writer,
            'content'=>$request->contents,
            'user_id'=>$user_id,
        ]);

        return redirect(route('list.index'));
    }
    // 글 상세보기
    public function show($id)
    {
        // 글 조회하기
        $content = Content::where('id',$id)->first();

        // 조회수 증가(해당글의 작성자가 아니고,)
        if(session()->get('user_id')!=$content->writer){
            // 해당글의 대한 접근이력을 글번호, 현재 세션 아이디로 hits 테이블에서 조회
            $have = Hit::where([
                ['content_id',$id],
                ['user_name',session()->get('user_id')]
            ])->first();
            // 조회된 값이 없으면,
            if(!$have){
                // hits 테이블에 글번호, 현재 세션 아이디 저장
                Hit::create([
                    'content_id'=>$id,
                    'user_name'=>session()->get('user_id'),
                ]);
                // 조회수 증가
                $content->count = $content->count + 1;
                // 수정 적용
                $content->save();
            }

        }

        // 수정,삭제를 해당글의 주인만 하기위해서 현재 세션아이디와 작성자를 비교
        if(session()->get('user_id')==$content->writer){
            // 일치하므로, 'got' 이라는 키값으로 true 값을 함께 전달하여 요청 응답.
            return view('list.detail',['content'=>$content,'got'=>true]);
        }

        // 해당글 주인이 아닌 사용자요청 응답
        return view('list.detail',['content'=>$content]);
    }
    // 글 수정하기 폼
    public function edit($id)
    {
        // 글 조회하기
        $content = Content::where('id',$id)->first();
        return view('list.edit',['content'=>$content]);
    }
    // 글 수정작업(수정할 텍스트 내용, 글 번호)
    public function update(Request $request, $id)
    {
        // 수정할 글 조회,
        $update_content = Content::where('id',$id)->first();
        // 글 수정 작업(제목,내용)
        $update_content->title = $request->title;
        $update_content->content = $request->contents;
        // *수정 작업 내용 저장*
        $update_content->save();
        // 수정된 내용을 확인하기 위해 상세보기로 redirect
        return redirect(route('list.show',$id));
    }
    // 글 삭제 작업
    public function destroy($id)
    {
        // 삭제할 글 조회,
        $delete_content = Content::where('id',$id)->first();
        // 삭제 작업(모델에 소프트 삭제를 적용하여, db에서는 삭제되지 않음.)
         $delete_content->delete();
    }
}
