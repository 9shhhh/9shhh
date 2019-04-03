<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>게시판 홈</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*div{border:1px solid red;}*/
            .flexbox{
                display: flex;
            }
            .top_nav{
                justify-content: flex-end;
                align-items: center;
            }
            .btn{
                background-color:#472c27;
                color:#fff;
                border:unset;
                height: 30px;
                text-decoration: none;
                border-radius: 10px;
                margin-right: 10px;
                align-items: center;
                font-weight: bold;
                padding-left: 10px;
                padding-right: 10px;
            }
            .write_nav{
                justify-content: flex-start;
            }
            .banner{
                font-weight: bold;
                color:#472c27;
                margin-left: 10px;
            }
            .welcome{
                font-weight: bold;
                margin-right: 15px;
            }
            tr{
                background-color:#472c27;
                color:#fff;}
            td{text-align: center;}
            .title{
                text-decoration: underline;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
    <div class="flexbox top_nav">
        <span class="welcome">{{$id}} 님, 환영합니다!!</span>
        <a class="btn flexbox" href="{{route('logout')}}">로그아웃</a>
    </div>
    <div class="flexbox write_nav">
        <a class="btn flexbox" href="{{route('list.create')}}">글 작성</a>
    </div>
    {{--컨텐츠 영역--}}
        <div class="contents">
            <h1 class="banner">글 리스트</h1>
            <table class="flexbox" style="justify-content: center;">
                <tr>
                    <th width="100">No.</th>
                    <th width="1000">제목</th>
                    <th width="150">작성자</th>
                    <th width="150">작성일</th>
                    <th width="100">조회수</th>
                </tr>
                @forelse($contents as $content)
                <tr>
                    <td>{{$content->id}}</td>
                    <td class="title" onclick="detail({{$content->id}})">{{$content->title}}</td>
                    <td>{{$content->writer}}</td>
                    <td>{{$content->created_at}}</td>
                    <td>{{$content->count ? $content->count : 0 }}</td>
                </tr>
                @empty
                    <h1 style="color:#ff0000;">게시글이 존재하지 않습니다.</h1>
                @endforelse
            </table>
        </div>
    </body>
<script>
    // 해당 글 상세보기 요청
    function detail(id) {
        console.log(location.href);
        location.href=location.href+'/'+id;
    }
</script>
</html>
