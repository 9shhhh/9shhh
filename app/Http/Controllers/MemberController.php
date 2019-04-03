<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MembersRequest;
/***********************************************************

 * @params Request

 * @description 회원 가입

 * @method POST

 * @return

 ***********************************************************/
class MemberController extends Controller
{

    public function index()
    {

    }

    //회원 가입 폼 요청
    public function create()
    {
        return view('member.register');
    }
    //회원 가입 작업
    public function store(MembersRequest $request)
    {
        // 회원 가입 작업
        Member::create([
            'identify' => $request->id,
            'password'  => bcrypt($request->pw_1),
        ]);

        return redirect('/');
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

    public function destroy($id)
    {

    }
}
