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

        .radio-75-image{
            padding-bottom: 90% !important;
        }

        .news-list {
            background-color: #FFF5F7;
        }

        .news-flower {
            position: absolute;
            top: 0; left: 0;
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
            background-color: #FFF5F7;
        }


        .card-img-top {
            cursor: pointer;
        }

        hr{
            border-top: 1px dashed #ABABAB !important;
        }
        .text-outline-add{
            text-shadow: 0.0px 5.0px 0.01px #fff, 4.9px 1px 0.01px #fff, 2.1px -4.5px 0.01px #fff, -4.0px -3.0px 0.01px #fff, -3.8px 3.2px 0.01px #fff, 2.4px 4.4px 0.01px #fff, 4.8px -1.4px 0.01px #fff, -0.3px -5.0px 0.01px #fff, -5px -0.75px 0.01px #fff, -1.75px 4.7px 0.01px #fff, 4.2px 2.7px 0.01px #fff, 3.5px -3.5px 0.01px #fff, -2.7px -4.2px 0.01px #fff, -4.7px 1.75px 0.01px #fff, 0.7px 5.0px 0.01px #fff, 5.0px 0.4px 0.01px #fff, 1.4px -4.8px 0.01px #fff, -4.3px -2.4px 0.01px #fff, -3.3px 3.7px 0.01px #fff, 2.9px 4.0px 0.01px #fff, 4.5px -2.1px 0.01px #fff, -1.1px -4.8px 0.01px #fff, -5.0px -0.05px 0.01px #fff, -1.1px 4.9px 0.01px #fff, 4.1px 2.2px 0.01px #fff, 3.1px -4.0px 0.01px #fff, -3.2px -3.8px 0.01px #fff, -4.4px 2.3px 0.01px #fff, 1.3px 4.8px 0.01px #fff, 5.0px -0.3px 0.01px #fff, 0.75px -4.9px 0.01px #fff, -4.6px -1.8px 0.01px #fff, -2.5px 4.4px 0.01px #fff, 3.5px 3.6px 0.01px #fff, 4.5px -2.3px 0.01px #fff, -1.7px -4.7px 0.01px #fff, -4.9px 0.6px 0.01px #fff, -0.4px 5.0px 0.01px #fff, 4.8px 1.5px 0.01px #fff, 2.4px -4.3px 0.01px #fff, -3.75px -3.3px 0.01px #fff, -4.1px 3.0px 0.01px #fff, 2.0px 4.6px 0.01px #fff, 4.8px -1.0px 0.01px #fff, 0.1px -5.0px 0.01px #fff, -4.8px -1.1px 0.01px #fff, -2.3px 4.5px 0.01px #fff, 3.9px 3.1px 0.01px #fff

        }
        .text-outline-add-thick{
            text-shadow: 0.0px 2.5px 0.01px #fff, 2.5px 0.5px 0.01px #fff, 1.1px -2.2px 0.01px #fff, -2.0px -1.5px 0.01px #fff, -1.9px 1.6px 0.01px #fff, 1.2px 2.2px 0.01px #fff, 2.4px -0.7px 0.01px #fff, -0.1px -2.5px 0.01px #fff, -2.5px -0.75px 0.01px #fff, -0.85px 2.3px 0.01px #fff, 2.1px 1.3px 0.01px #fff, 1.7px -1.7px 0.01px #fff, -1.3px -2.1px 0.01px #fff, -2.3px 0.85px 0.01px #fff, 0.35px 2.5px 0.01px #fff, 2.5px 0.2px 0.01px #fff, 0.7px -2.4px 0.01px #fff, -2.1px -1.2px 0.01px #fff, -1.6px 1.8px 0.01px #fff, 1.4px 2.0px 0.01px #fff, 2.2px -1.0px 0.01px #fff, -0.6px -2.4px 0.01px #fff, -2.5px -0.02px 0.01px #fff, -0.6px 2.4px 0.01px #fff, 2.1px 1.1px 0.01px #fff, 1.5px -2.0px 0.01px #fff, -1.6px -1.9px 0.01px #fff, -2.2px 1.1px 0.01px #fff, 0.7px 2.4px 0.01px #fff, 2.5px -0.2px 0.01px #fff, 0.35px -2.4px 0.01px #fff, -2.3px -0.9px 0.01px #fff, -1.3px 2.2px 0.01px #fff, 1.6px 1.8px 0.01px #fff, 2.3px -1.6px 0.01px #fff, -0.8px -2.4px 0.01px #fff, -2.4px 0.3px 0.01px #fff, -0.2px 2.5px 0.01px #fff, 2.4px 0.75px 0.01px #fff, 1.2px -2.1px 0.01px #fff, -1.9px -1.6px 0.01px #fff, -2.1px 1.5px 0.01px #fff, 1.0px 2.3px 0.01px #fff, 2.4px -0.5px 0.01px #fff, 0.1px -2.5px 0.01px #fff, -2.4px -0.6px 0.01px #fff, -1.1px 2.3px 0.01px #fff, 1.9px 1.6px 0.01px #fff

        }

        .text-outline-area{
            position: absolute;
            z-index: 1;
    width: 166px;
    height: 36px;
    border-radius: 0.4rem;
    top: calc(50% - 18px);
    left: calc(50% - 83px);
    background: white;
    opacity: 0.7;
        }


    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> > <span id="move_prefecture" class="top-title-tag">{{$prefecture -> prefecture_name}}の幼稚園､保育所</span> > 子どもと読みたい最新ニュース一覧
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
                    <img src="{{asset('img/flower.png')}}" class="news-flower height-1-half img-icon" >
                    @foreach($newsList as $index => $news)
                        <div class="row {{$index > 3?'':'news-detail'}} position-relative" id="news_{{$news->news_id}}">
                            <div class="col-4 pr-0">
                                <div class="radio-image radio-75-image">
                                    <img class="card-img-top" style="border-radius: 0 !important;" src="{{asset('/storage/img/news/'.$news->img)}}">
                                </div>
                            </div>
                            <div class="col-8 pl-1">
                                <p class="text-medium-title line-clamp" style="">
                                    @if($news->is_new ==true)<span class="px-1 text-pink border-pink text-small mr-2">新着</span> @endif
{{--                                    <span class="px-1 text-pink border-pink text-small mr-2">新着</span>--}}
                                    {{$news->title}}
                                </p>
                                <p class="mt-1 text-small line-clamp">{{$news->description}}</p>
                                <p class="text-small-xs text-gray">{{str_replace('-', '/', $news->created_at)}}</p>
                            </div>
                            @if($index > 3)

                                <div class="position-absolute text-center text-title-large px-4 py-1" style="z-index: 10; border: 2px solid #FF557E; color: #FF557E; border-radius: 0.5rem; top: calc(50% - 20px); left: calc(50% - 83px)">
                                    
                                    <p class="text-outline-add">終了しました</p>   


                                </div>
                                <div class="text-outline-area"></div>     

                            @endif
                        </div>

                        <hr>
                    @endforeach
                    <div class="position-relative">
                        <img src="{{asset('img/butterfly.png')}}" class="news-flower-bottom height-3 img-icon" >
                    </div>

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
                var url = home_path + '/news/' + prefecture_id + '/' + currentPage + '/list';
                window.location.href = url;
                //getSchoolList();
            });

            $(".news-detail").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/news/detail/" + id;
            });

            $("#move_prefecture").click(function(event) {
                var prefecture_id = $("#prefecture_id").val();
                window.location.href = home_path + "/school/" + prefecture_id + '/list';
            });

        });


    </script>
@endsection
