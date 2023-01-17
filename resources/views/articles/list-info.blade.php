@extends('layouts.app')

@section('title')
    {{$prefecture -> prefecture_name}}の幼稚園･保育所 入園情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .news--image{
            position:relative;
            overflow:hidden;
            padding-bottom:75%;
        }
        .news--image > img{
            height: 100%;
            object-fit: cover;
            position:absolute;
        }

        .news-list {
            /*background-color: #FFF5F7;*/
        }

        .news-flower {
            position: absolute;
            top: 5px; right: 15px;
            z-index: 100
        }

        .news-flower-bottom {
            position: absolute;
            right: 0;
            z-index: 100
        }

        @media (max-width: 767px) {
            .news-flower-bottom {
                bottom: -2.25rem !important;
            }
        }

        @media (max-width: 575px) {
            .news-flower-bottom {
                bottom: -1.5rem !important;
            }
        }

        @media (max-width: 375px) {
            .news-flower-bottom {
                bottom: -1.35rem !important;
            }
        }

        @media (min-width: 768px){
            .news-flower-bottom {
                bottom: -3rem !important;
            }
        }

        @media (max-width: 320px) {
            .news-flower-bottom {
                bottom: -1rem !important;
            }
        }

        .container {
            /*background-color: #FFF5F7;*/
        }


        .card-img-top {
            cursor: pointer;
        }

        .border-bold{
            border: 2px solid #ff557d;
        }

        .line-clamp1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 375px) and (min-width: 321px){
            .height-1-half {
                height: 1.7rem !important;
                min-width: .1rem;
            }

            .text-medium {
                font-size: 15px !important;
                font-family: YugoBold;
            }
            .text-small {
                font-size: 12px !important;
                font-family: YugoMedium;
            }
        }

        hr {
            border-top: 1px dashed #ABABAB;
        }

        .radio-75-image {
            padding-bottom: 81% !important;
        }

        @media (min-width: 768px){
            .height-24{
                height: 32px !important;
            }
        }




    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <span id="move_prefecture" class="top-title-tag">{{$prefecture -> prefecture_name}}の幼稚園､保育所</span> >
            {{$prefecture -> prefecture_name}}の子育て記事
        </div>

        <form class=" d-none" novalidate id="search_form"  method="post">
            {{csrf_field()}}
            <input type="hidden" id="prefecture_id" value="{{$prefecture -> prefecture_id}}">

            <input class="d-none" name="perPage" value="10">
            <input class="d-none" name="prefecture_id" value="{{$prefecture -> prefecture_id}}">
        </form>

        <div id="news_list">
            <div class="card news-list ">

                <div class="card-body ">
{{--                    <img src="{{asset('img/music.png')}}" class="news-flower height-1-half img-icon" >--}}
                    @foreach($articlesList as $index => $article)
                        <div class="row news-detail" id="news_{{$article->id}}">
                            <div class="col-4 pr-0 pt-2">
                                <div class="radio-image radio-75-image" >
                                    <img class="" style="border-radius: 0 !important;" src="{{asset('/storage/img/articles/'.$article->main_img)}}">
                                </div>
                            </div>
                            <div class="col-8 pl-1">
                                <p class="text-large-xs text-pink position-relative">@if($article->is_new ==true)<span class="px-1 text-pink border-pink text-small-xs-bold mr-2">新着</span>@else<div class="height-24" style="width: 32px; height: 24px"></div> @endif<span class="text-large-xs position-absolute menu-icon" style="top: 2px !important;">ニュース</span></p>
                                <p class="text-medium line-clamp1 my-1">{{$article->title}}
                                </p>
                                <p class="text-small line-clamp">{{$article->main_text}}</p>
                                <p class="text-small-xs text-gray">{{str_replace('-', '/', $article->post_date)}}</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

                <input type="hidden" id="start" value="<?=$start;?>">
                <input type="hidden" id="end" value="<?=$end;?>">
                <input type="hidden" id="total" value="<?=$total;?>">
                <input type="hidden" id="perShow" value="<?=$perShow;?>">

                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-circle pg-blue mb-1">
                        @if($start > $perShow && $start < 2 * $perShow)
                            <li class="page-item " id="previous">
                                <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Previous">
                                    <span aria-hidden="true">前へ</span>
                                </a>
                            </li>
                            <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                        @endif

                        @if($start > 2* $perShow)
                            <li class="page-item " id="first"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px">最初へ</a></li>
                            <li class="page-item " id="previous">
                                <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px;" aria-label="Previous">
                                    <span aria-hidden="true">前へ</span>
                                </a>
                            </li>
                            <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            @if($i == $current)
                                <li class="page-item active text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                            @else
                                <li class="page-item text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                            @endif
                        @endfor
                        @if($end <= $total - 2* $perShow)
                            <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                            <li class="page-item" id="next">
                                <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                    <span aria-hidden="true">次へ</span>
                                    {{--                        <span class="sr-only">次へ</span>--}}
                                </a>
                            </li>
                            <li class="page-item text-large-xs-medium" id="last"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" id="last">最後へ</a></li>
                        @endif
                        @if($end > $total - 2 * $perShow && $end < $total)
                            <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                            <li class="page-item" id="next">
                                <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                    <span aria-hidden="true">次へ</span>
                                    {{--                        <span class="sr-only">次へ</span>--}}
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
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
        var searchStr = '';
        var currentPage = 1;
        var startPage;
        var endPage;
        var perShow;
        var perPage = 10;
        var totalPage;
        var home_path;
        var selectCity;
        var selectType;
        var selectKeyword;
        var prefecture_id;


        $(document).ready(function() {
            home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });

            $("#icon_move_home").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });
            prefecture_id = $("#prefecture_id").val();
            //getSchoolList();




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
                var prefecture_id = $("#prefecture_id").val();
                var url = home_path + '/articles/' + prefecture_id + '/' + currentPage + '/list';
                window.location.href = url;
                //getSchoolList();
            });

            $(".news-detail").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/articles/detail/" + id;
            });

            $("#move_prefecture").click(function(event) {
                var prefecture_id = $("#prefecture_id").val();
                window.location.href = home_path + "/school/" + prefecture_id + '/list';
            });

        });


    </script>
@endsection
