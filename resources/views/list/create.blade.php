<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>글 작성</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style>
        /*div{border:1px solid red;}*/
        .flexbox{
            display: flex;
        }
        .part{
            font-weight: bold;
            color:#fff;
            background-color:#472c27;
            width: 10%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-right:5px;
            margin-bottom:5px;
        }
        .contents{
            display: flex;
            flex-direction: column;

        }
        .ok{
            width:100%;
            background-color:#472c27;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            height: 50px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1 style="margin-left: 10px;">글 작성</h1>
    <div class="contents">
        <form action="{{route('list.store')}}" method="post">
            {!! csrf_field() !!}
            <div class="flexbox">
                 <input type="hidden" name="writer" value="{{$id}}" />
                <div class="part">작성자</div>{{$id}}
            </div>
             <div class="flexbox">
                <div class="part">제목</div>
                <input type="text" name="title" placeholder="제목을 입력해주세요." style="width:300px;"/>
            </div>
             <div class="flexbox">
                <div class="part">내용</div>
                <textarea name="contents" style="width:90%;height:500px;"></textarea>
            </div>
            <button class="ok">작성하기</button>
        </form>
    </div>
</body>
</html>
