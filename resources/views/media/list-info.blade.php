@extends('layouts.app')

@section('title')
    {{$garden -> prefecture_name}}の幼稚園･保育所 入園情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .media--image{
            position:relative;
            overflow:hidden;
            padding-bottom:75%;
        }
        .media--image > img{
            height: 100%;
            object-fit: cover;
            position:absolute;
        }


        .media-flower {
            position: absolute;
            top: 0; left: 0;
            z-index: 100
        }

        .media-flower-bottom {
            position: absolute;
            right: 0;
            z-index: 100
        }

        @media (max-width: 767px) {
            .media-flower-bottom {
                bottom: -2.25rem !important;
            }
        }

        @media (max-width: 575px) {
            .media-flower-bottom {
                bottom: -1.5rem !important;
            }
        }

        @media (max-width: 375px) {
            .media-flower-bottom {
                bottom: -1.35rem !important;
            }
        }

        @media (min-width: 768px){
            .media-flower-bottom {
                bottom: -3rem !important;
            }
        }

        @media (max-width: 320px) {
            .media-flower-bottom {
                bottom: -1rem !important;
            }
        }

        .text-blue-1 {
            color: #31bCC7 !important;
        }

        .card-img-top {
            cursor: pointer;
        }


    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> > <span id="move_garden" class="top-title-tag">{{$garden -> garden_name}}</span> > メディアにて紹介･掲載された内容を見る
        </div>

        <input type="hidden" id="garden_id" value="{{$garden -> garden_id}}">

        <div id="media_list">
            <div class="card media-list ">

                <div class="card-body px-3">

                    @foreach($mediaList as $index => $media)
                        <div class="row">
                            <div class="col-4 pr-0">
                                <div class="radio-image radio-75-image media-detail" id="media_{{$media->media_id}}" style="padding-bottom: 70% !important;">
                                    <img class="card-img-top" src="{{asset('/storage/img/media/'.$media->img)}}">
                                </div>
                            </div>
                            <div class="col-8 pl-1">
{{--                                <p class="text-medium text-blue-1 line-clamp">{{$media->media_title}}--}}
{{--                                </p>--}}
                                <p class="text-medium text-blue-1" style="font-family: YugoMedium !important; word-break: keep-all;">{{$media -> media_name.$media -> public_date}}の内容を見る</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                @if($total > 10)
                    <input type="hidden" id="start" value="{{$start}}">
                    <input type="hidden" id="end" value="{{$end}}">
                    <input type="hidden" id="total" value="{{$total}}">
                    <input type="hidden" id="perShow" value="{{$perShow}}">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-circle pg-blue">
                            @if($start > $perShow && $start < 2 * $perShow)
                                <li class="page-item " id="previous">
                                    <a class="page-link text-medium-xs" aria-label="Previous">
                                        <span aria-hidden="true">前へ</span>
                                    </a>
                                </li>
                                <span aria-hidden="true" class="text-medium-xs">...</span>

                            @endif

                            @if($start > 2* $perShow)
                                <li class="page-item " id="first"><a class="page-link text-medium-xs" >最初へ</a></li>
                                <li class="page-item " id="previous">
                                    <a class="page-link text-medium-xs" aria-label="Previous">
                                        <span aria-hidden="true">前へ</span>
                                    </a>
                                </li>
                                <span aria-hidden="true" class="text-medium-xs">...</span>

                            @endif

                            @for ($i = $start; $i <= $end; $i++)
                                @if($i == $current)
                                    <li class="page-item active text-medium-xs" id="page_{{$i}}"><a class="page-link text-medium-xs">{{$i}}</a></li>
                                @else
                                    <li class="page-item text-medium-xs" id="page_{{$i}}"><a class="page-link text-medium-xs">{{$i}}</a></li>
                                @endif
                            @endfor
                            @if($end <= $total - 2* $perShow)
                                <span aria-hidden="true" class="text-medium-xs">...</span>
                                <li class="page-item" id="next">
                                    <a class="page-link text-medium-xs" aria-label="Next">
                                        <span aria-hidden="true">次へ</span>
                                        {{--                        <span class="sr-only">次へ</span>--}}
                                    </a>
                                </li>
                                <li class="page-item text-medium-xs" id="last"><a class="page-link text-medium-xs" id="last">最後へ</a></li>
                            @endif
                            @if($end > $total - 2 * $perShow && $end < $total)
                                <span aria-hidden="true" class="text-medium-xs">...</span>
                                <li class="page-item" id="next">
                                    <a class="page-link text-medium-xs" aria-label="Next">
                                        <span aria-hidden="true">次へ</span>
                                        {{--                        <span class="sr-only">次へ</span>--}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif




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
                var garden_id = $("#garden_id").val();
                var url = home_path + '/media/' + garden_id + '/' + currentPage + '/list';
                window.location.href = url;
                //getSchoolList();
            });

            $(".media-detail").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/media/detail/" + id;
            });



        });


    </script>
@endsection
