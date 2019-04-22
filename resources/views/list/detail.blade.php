<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>상세보기</title>
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
            background-color:#472c27;
            color:#fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
{{--컨텐츠 영역--}}
    <h1 style="margin-left: 10px;">글 상세보기</h1>
    <div class="contents">
            <div class="flexbox">
                <div class="part">작성자</div>
                <span style="font-weight: bold;">{{$content->writer}}</span>
            </div>
            <div class="flexbox">
                <div class="part">제목</div>
                <span style="font-weight: bold;">{{$content->title}}</span>
            </div>
            <div class="flexbox">
                <div class="part">내용</div>
                <textarea style="width:90%;height:500px;font-weight:bold;" readonly>{{$content->content}}</textarea>
            </div>
        <div class="flexbox" style="justify-content:flex-end;">
            @if(isset($got))
            <div class="btn" onclick="edit({{$content->id}})">수정하기</div>
            <div class="btn" onclick="_delete({{$content->id}})" style="margin-left:10px;">삭제하기</div>
            @endif
            <div class="btn" style="margin-left:10px;" onclick="list()">목록으로</div>
        </div>
    </div>
    <input type="hidden" id="tk" value="{!! csrf_token() !!}">
</body>
<script>
    // 해당 글 수정하기 요청
    function edit(id) {
        location.href = id+'/edit';
    }
    // 글 목록 요청
    function list() {
        location.href = '/list';
    }
    // 글 삭제 요청
    function _delete(id) {
        // 순서 중요!!
        if(confirm('글을 삭제하시겠습니까?')){
            // 1. 비동기 요청을 위한 XMLHttpRequest 객체 생성
            var xhr = new XMLHttpRequest();
            // 2. 요청할 방식과 url 작성
            xhr.open('DELETE', '/list/'+id);
            // 3. 헤더에 X-CSRF공격보호를 위해 헤더에 값 전달.
            xhr.setRequestHeader('x-csrf-token', document.getElementById("tk").value);
            // 4. Request를 전송
            xhr.send();
            // 5. 목록으로 요청
            location.href="/list";
        }
    }
</script>
</html>
