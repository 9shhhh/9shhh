<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>로그인</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style>
        /*div{border:1px solid red;}*/
        .flexbox{
            display: flex;
        }
        .login_form{
            margin-top:150px;
            width:350px;
            height:500px;
            background-color:#ffd92e;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 20px;
        }
        .logo{
            background-color:#472c27;
            color:#fff;
            width:80px;
            height:80px;
            border-radius:80px;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 25px;
        }
        .reg_btn{
            margin-top:10px;
            background-color:#472c27;
            color:#fff;
            border:unset;
            height: 30px;
            font-size: 14px;
            justify-content: center;
            align-items: center;
        }
        input{height: 30px;}
    </style>
</head>
<body>
<div class="container flexbox" style="justify-content:center;">
    <div class="login_form flexbox">
        <div class="flexbox logo">TALK</div>
            <form method="POST" action="{{route('member.store')}}" id="frm">
                {!! csrf_field() !!}

                <div class="flexbox" style="margin-top:50px;flex-direction:column;">
                    <input type="text" name="id" placeholder="아이디" autofocus/>
                    <input type="password" name="pw_1" placeholder="비밀번호"/>
                    <input type="password" name="pw_2" placeholder="비밀번호확인"/>
                    <a class="flexbox reg_btn" onclick="ok()">회원가입 요청</a>
                </div>
            </form>
    </div>
</div>
</body>
<script>
    function ok() {
        if(!document.querySelector('input[name=id]').value){
            alert('아이디를 입력해주세요.');
        }else if(!document.querySelector('input[name=pw_1]').value){
            alert('비밀번호를 입력해주세요.');
        }else if(!document.querySelector('input[name=pw_2]').value){
            alert('비밀번호확인을 입력해주세요.');
        }else if(!(document.querySelector('input[name=pw_1]').value==document.querySelector('input[name=pw_2]').value)){
            alert('비밀번호가 일치 하지 않습니다.');
        }else{
            document.querySelector('#frm').submit();
        }
    }
</script>
</html>
