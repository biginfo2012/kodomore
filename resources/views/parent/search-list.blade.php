@extends('layouts.app')

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
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

        .radio-image{
            border-radius: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> > 閲覧履歴</p>
        </div>

        <div class="card-body text-large-medium-xs py-2 background-white-blue position-relative" style="border-bottom: 1px solid #ABABAB">
            <img class="height-2 img-icon py-2" src="{{asset('img/search-history.png')}}" style="margin-top: -3px;"> <span class="position-absolute" style="top: 9px; left:53px;">閲覧履歴</span>

            <div class="float-right sort-select">
                <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="old">
                    <option value="new" selected>閲覧/新しい順  </option>
                    <option value="old">閲覧/古い順</option>
                    <option value="today">本日閲覧</option>
                    <option value="favourite">お気に入り</option>
                    <option value="event">イベント予約</option>
                    <option value="question">問い合せ</option>
                    <option value="blog">クチコミレビュー投稿</option>
                    <option value="web">WEB出願</option>
                    <option value="data">資料請求</option>
                </select>
            </div>
        </div>


        <div class="card p-0" id="school_list">

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

            // $('[name="old"]').on('change', function () {
            //     order = $(this).val();
            //     getSchoolList(order);
            //
            // })

            $('[name="old"]').change(function () {
                var order = $(this).val();
                getSchoolList(order);
            })

            getSchoolList(order);

        });
        function getSchoolList(order) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/parent/search/get-list';
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

