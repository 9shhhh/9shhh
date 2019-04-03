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
            .login_btn{
                margin-top:10px;
                background-color:#472c27;
                color:#fff;
                border:unset;
                height: 30px;
            }
            .reg_btn{
              text-decoration: none;
                color:#472c27;
            }
            input{height: 30px;}
        </style>
    </head>
    <body>
        <div class="container flexbox" style="justify-content:center;">
            <div class="login_form flexbox">
                <div class="flexbox logo">TALK</div>
                    <form method="post" action="{{route('login.store')}}" id="frm">
                        {!! csrf_field() !!}
                        <div class="flexbox" style="margin-top:50px;flex-direction:column;">
                        <input type="text" name="id" placeholder="아이디" autofocus value="{{isset($rememberID) ? $rememberID : ''}}">
                        <input type="password" name="pw" placeholder="비밀번호"/>
                        <button class="login_btn" onclick="ok()">로그인</button>
                        <div class="flexbox" style="font-size:12px;align-items:center;">
                            <input type="checkbox" name="stay" {{isset($checked) ? 'checked' : ''}}>아이디 기억
                        </div>
                        </div>
                        <a class="reg_btn" href="{{route('member.create')}}">회원가입</a>
                    </form>
            </div>
        </div>
    </body>
    <script>
        function ok() {
            if(!document.querySelector('input[name=id]').value){
                alert('아이디를 입력해주세요.');
            }else if(!document.querySelector('input[name=pw]').value){
                alert('비밀번호를 입력해주세요.');
            }else{
                document.querySelector('#frm').submit();
            }
        }
    </script>
</html>
