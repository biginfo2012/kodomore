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
            overflow: hidden;
        }
        .radio-image-p {
            position: relative;
            overflow: hidden;
            height: calc(100% - 50px);
        }
        .radio-image {
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        .rgba-green-strong, .rgba-green-strong:after {
            background-color: rgba(60,60,60,0.7) !important;
        }
        .news-background {
            background-image: url("{{asset('img/news-border.png')}}");
            background-size: contain;
        }
        .news-border {
            width: unset;
            height: 1.5rem;
        }
        .news-info {

            margin-top: .5rem;
        }

        .news-detail {
            background-color: #F5F9FA;
        }

        .news-detail > .card-header {
            background-color: transparent;
            padding: 0;
        }
        .blog-answer {
            margin: 1rem 0;
            background-color: white;
            padding: 1rem;
        }

        .blog-answer-user {
            flex: 1;
            text-align: right
        }
        .avatar {
            width: 3rem;
            height: 3rem;
        }
        .divide-line {
            margin: .5rem 0;
            width: 100%;
            height: 1px;
            background-color: black;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> > クチコミレビュー履歴</p>
        </div>

        <div class="card-body text-large-medium-xs py-2 background-white-blue px-2" style="border-bottom: 1px solid #ABABAB">
            <img class="height-2 img-icon py-1" src="{{asset('img/desicion-history.png')}}"> クチコミレビュー履歴

            <div class="float-right sort-select">
                <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="old">
                    <option value="start" selected>投稿/新しい順</option>
                    <option value="reserve">投稿/古い順</option>
                    <option value="reserve">本日投稿</option>
                    <option value="start">園･学校･スクール</option>
                    <option value="reserve">記事</option>
                </select>
            </div>
        </div>

        <div class="card" id="school_list" style="border-radius: 10px">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
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

            getSchoolList(order);

        });
        function getSchoolList(order) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/parent/blog/get-list';

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
                    $(function () {
                        $(".rateyo").each( function() {
                            $(this).rateYo(
                                {
                                    readOnly: true
                                }
                            );
                        });
                        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                            // $(this).rateYo(
                            //     {
                            //         readOnly: true
                            //     }
                            // );
                            var rating = data.rating;
                            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                            $(this).parent().find('.result').text('rating :'+ rating);
                        });
                    });
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
            $('.whole_text_show').on('click', function () {

                if($(this).parent().prev().find('p.event-name').hasClass('line-clamp1')){
                    $(this).parent().prev().find('p.event-name').removeClass('line-clamp1')
                }
                else{
                    $(this).parent().prev().find('p.event-name').addClass('line-clamp1')
                }
                if($(this).hasClass('rotate')){
                    $(this).removeClass('rotate');
                }
                else{
                    $(this).addClass('rotate');
                }

            })

            $('.modify').click(function () {
                var review_id = $(this).parent().parent().parent().next().val();
                if (review_id > 0) {
                    window.location.href = home_path + '/modify/review/' + review_id;
                }

            })

            $('.delete').click(function () {
                var review_id = $(this).parent().parent().parent().next().val();
                if (review_id > 0) {
                    window.location.href = home_path + '/delete/review/' + review_id;
                }
            })

        }
    </script>
@endsection

