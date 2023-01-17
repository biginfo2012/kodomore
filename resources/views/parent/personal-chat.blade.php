@extends('layouts.app')

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
        main {
            /*max-width: 100%;*/
            overflow-x: hidden;
        }
        p {
            margin-bottom: 0px;
        }

        .search-body > .form-inline {
            background-color: white;
        }

        .img-top {
            position: absolute;
            right: 1rem;
            bottom: -1.5rem;
            width: 3rem;
        }

        .school-item {
            background-color: white;
            position: relative;
            margin-bottom: 1rem;
            border-radius: 5px !important;
            overflow: hidden;
        }
        .radio-image {
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        .news-background {
            background-image: url("{{asset('img/news-border-pink.png')}}");
            background-size: contain;
        }
        .container {
            background-image: url("{{asset('img/news-border-pink.png')}}");
            background-size: contain;
        }
        .avatar {
            width: 3rem;
            height: 3rem;
        }
        .message-indicator-top{
            position: absolute;
            left: 0px;
            top: 0.1rem;
            margin-left: -1.3rem;
            border-top: 10px;
            width: 0;
            height: 0;
            border-bottom: 1rem solid white;
            border-left: 1.8rem solid transparent;
        }
        .message-indicator-bottom{
            position: absolute;
            left: 0px;
            top: 1rem;
            margin-left: -1.3rem;
            border-top: 10px;
            width: 0;
            height: 0;
            border-top: 1rem solid white;
            border-left: 1.8rem solid transparent;
        }
        .message-indicator-top-right {
            position: absolute;
            right: 8px;
            top: 0.1rem;
            /* margin-left: -0.3rem; */
            border-top: 10px;
            width: 0;
            height: 0;
            border-bottom: 1rem solid #D6F2F4;
            border-right: 1.8rem solid transparent;
        }
        .message-indicator-bottom-right {
            position: absolute;
            right: 8px;
            top: 1rem;
            /* margin-left: -1.3rem; */
            border-top: 10px;
            width: 0;
            height: 0;
            border-top: 1rem solid #D6F2F4;
            border-right: 1.8rem solid transparent;
        }
        .triangle {
            position: relative;
            margin: 0em;
            padding: 1em;
            box-sizing: border-box;
            background: white;
            box-shadow: 0px 3px 3px 0 rgba(0, 0, 0, 0.4);
        }
        .triangle::after{
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            margin-left: -0.5em;
            left: 9px;
            top: .6rem;
            box-sizing: border-box;

            border: .6em solid black;
            border-color: transparent transparent white white;

            transform-origin: 0 0;
            transform: rotate(45deg);

            box-shadow: -1px 3px 3px 0 rgba(0, 0, 0, 0.4);
        }
        .triangle-right {
            position: relative;
            margin: 0em;
            padding: 1em;
            box-sizing: border-box;
            background: #D6F2F4;
            box-shadow: 0px 3px 3px 0 rgba(0, 0, 0, 0.4);
        }
        .triangle-right::after{
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            margin-left: -0.5em;
            right: -14px;
            top: 1.6rem;
            box-sizing: border-box;

            border: .6em solid black;
            border-color: transparent transparent #D6F2F4 #D6F2F4;

            transform-origin: 0 0;
            transform: rotate(-135deg);

            box-shadow: -3px 2px 3px 0px rgba(0, 0, 0, 0.4);
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> > 個別相談</p>
        </div>

        <div class="card-body text-large-medium-xs py-2 background-white-blue" style="border-bottom: 1px solid #ABABAB">
            <img class="height-2 img-icon py-1" src="{{asset('img/personal-list.png')}}"> 個別相談
        </div>


        <div class="card p-0" id="school_list">
            <div class="card-body news-background p-2">
                <div class="row text-center mt-3">
                    <p class="mx-auto text-small-xs px-4 py-1" style="background-color: rgba(204, 204, 204, 0.5); border-radius: 10px;">2020年00月00日(曜)</p>
                </div>

                <div class="row mt-4">
                    <div class="col-2 position-relative mb-1 pb-2" style="">
                        <img src="{{asset('img/user2.png')}}" class="height-2 img-icon mr-2">
                    </div>
                    <div class="col-7 pr-1 pl-0">
                        {{-- <div class="message-indicator-top"></div>
                        <div class="message-indicator-bottom"></div> --}}
                        <div class="text-normal p-2 rounded background-white triangle">
                            <p>〇〇園の〇〇です</p>
                            <p>こちらの個別相談より質問などにお答え致します。
                                お手数ですがまずは、あなた様の本名と携帯番号とメールアドレスをご記入ください。</p>
                        </div>
                    </div>
                    <div class="col-2 pl-0">
                        <p class="position-absolute text-small-xs" style="bottom: 0; left: 0">00：00</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="offset-2 col-2 pr-1">
                        <p class="position-absolute text-small-xs" style="bottom: 0; right: 0">既読<br>
                            00：00</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="text-normal p-2 rounded triangle-right" style="background-color: #D6F2F4; margin-right: 15px;">
                            <p>この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡</p>
                        </div>
                        {{-- <div class="message-indicator-top-right"></div>
                        <div class="message-indicator-bottom-right"></div> --}}
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-2 position-relative mb-1 pb-2" style="">
                        <img src="{{asset('img/user2.png')}}" class="height-2 img-icon mr-2">
                    </div>
                    <div class="col-7 pr-1 pl-0">
                        {{-- <div class="message-indicator-top"></div>
                        <div class="message-indicator-bottom"></div> --}}
                        <div class="text-normal p-2 rounded background-white triangle">
                            <p>〇〇園の〇〇です</p>
                            <p>貴重なご意見ありがとうございます｡
                                こちらのホットラインより質問やご不満などにお答え致します｡
                                お手数ですがまずは､あなた様の本名と携帯番号とメールアドレスをご記入ください｡</p>
                        </div>
                    </div>
                    <div class="col-2 pl-0">
                        <p class="position-absolute text-small-xs" style="bottom: 0; left: 0">00：00</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="offset-2 col-2 pr-1">
                        <p class="position-absolute text-small-xs" style="bottom: 0; right: 0">既読<br>
                            00：00</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="text-normal p-2 rounded triangle-right" style="background-color: #D6F2F4; margin-right: 15px;">
                            <p>この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡</p>
                        </div>
                        {{-- <div class="message-indicator-top-right"></div>
                        <div class="message-indicator-bottom-right"></div> --}}
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-2 position-relative mb-1 pb-2" style="">
                        <img src="{{asset('img/user2.png')}}" class="height-2 img-icon mr-2">
                    </div>
                    <div class="col-7 pr-1 pl-0">
                        {{-- <div class="message-indicator-top"></div>
                        <div class="message-indicator-bottom"></div> --}}
                        <div class="text-normal p-2 rounded background-white triangle">
                            <p>〇〇園の〇〇です</p>
                            <p>貴重なご意見ありがとうございます｡
                                こちらのホットラインより質問やご不満などにお答え致します｡
                                お手数ですがまずは､あなた様の本名と携帯番号とメールアドレスをご記入ください｡</p>
                        </div>
                    </div>
                    <div class="col-2 pl-0">
                        <p class="position-absolute text-small-xs" style="bottom: 0; left: 0">00：00</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem;  margin-top: -140px">
        <div class="card-body background-opacity">
            <img src="{{asset('img/top.png')}}" class="img-top" id="move_garden" style="bottom: -.5rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection
@section('js4event')
    <script language="javascript" type="text/javascript">
        var currentPage = 1;
        var startPage;
        var endPage;
        var perShow;
        var perPage = 10;
        var totalPage;
        var order = 'new'
        var home_path = $("#home_path").val();
        $(document).ready(function() {

            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });
            //
            // $('[name="old"]').on('change', function () {
            //     order = $(this).val();
            //     getSchoolList(order);
            //
            // })

            //getSchoolList(order);

        });
        function getSchoolList(order) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/parent/web/get-list';
            $.ajax({
                url:url,
                type:'post',
                data: {
                    order : order,
                    currentPage: currentPage,
                    perPage: perPage
                },
                success: function (response) {
                    $("#school_list").html(response);
                    changeEvent();

                    $('html, body').animate({
                        scrollTop: 0
                    });
                },
                error: function () {
                }
            });
        }
        function changeEvent() {
            $(".page-item").click(function(event) {
                perShow = parseInt($("#perShow").val());
                startPage = parseInt($("#start").val());
                totalPage = parseInt($("#total").val());
                var id = $(this).attr('id');
                if(id == 'first') {
                    currentPage = 1;
                } else if(id == 'previous') {
                    currentPage = startPage - perShow;
                } else if(id == 'next') {
                    currentPage = startPage + perShow;
                } else if(id == 'last') {
                    currentPage = totalPage;
                } else {
                    var split = id.split("_");
                    currentPage = split[1];
                }
                getSchoolList(order);
            });

            $(".school-detail").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                var home_path = $("#home_path").val();
                window.location.href = home_path + "/school/detail/" + id;
            });
        }
    </script>
@endsection

