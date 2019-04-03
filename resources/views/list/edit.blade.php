<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>수정하기</title>
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
        .btn{
            border: 0;
            background-color:#472c27;
            color:#fff;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
</head>
<body>
{{--컨텐츠 영역--}}
<h1 style="margin-left: 10px;">글 수정하기</h1>
<div class="contents">
    <div class="flexbox">
        <div class="part">작성자</div>
        <span style="font-weight: bold;">{{$content->writer}}</span>
    </div>
    <form action="{{route('list.update',$content->id)}}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="flexbox">
            <div class="part">제목</div>
            <input type="text" name="title" placeholder="제목을 입력해주세요." value="{{$content->title}}" style="width:300px;font-weight:bold;"/>
        </div>
        <div class="flexbox">
            <div class="part">내용</div>
            <textarea style="width:90%;height:500px;font-weight:bold;" name="contents">{{$content->content}}</textarea>
        </div>
        <div class="flexbox" style="justify-content:flex-end;">
            <button class="btn" style="margin-left:10px;">수정완료</button>
            <div class="btn" style="margin-left:10px;" onclick="list()">목록으로</div>
        </div>
    </form>
</div>
</body>
<script>
    // 글 목록 요청
    function list() {
        location.href = '/list';
    }
</script>
</html>
