@extends('layouts.app')

@section('title')
    {{$media -> prefecture_name}}の幼稚園･保育所 入園情報
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

        .news-flower {
            position: absolute;
            top: 0; left: 0;
            z-index: 100
        }

        .news-flower-right {
            position: absolute;
            top: 0; right: 0;
            z-index: 100
        }

        .background-blog {
            background-color: #FFE4EA;
        }


        .background-light-sky {
            background-color: #ADE4E9;
        }

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }







    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <span id="move_prefecture" class="top-title-tag">{{$media -> garden_name}}</span>
             > <span name="move_list" id="top_move_list" class="top-title-tag">メディアにて紹介･掲載された内容を見る</span>
        </div>

        <div class="card-header subtitle-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-2 img-icon pb-2 mr-1" style="width: 2.5rem;" src="{{asset('img/media-width.png')}}">
            <div>
                <p class="text-title text-black" style="word-break: keep-all">{{$media -> media_name.$media -> public_date}}で
                    紹介された内容です｡</p>
            </div>
        </div>

        <div class="card-body">
            <p class="text-title text-black mt-3">{{$media->media_title}}
            @foreach($media -> childList as $child)
                @if($child -> type == 'subtitle')
{{--                    @if($child -> isFirst == false)--}}
                        <div class="w-100 text-title">
                            <div class="flex mt-3 my-2">
                                <div class="top-menu left_bar">
                                </div>
                                <div class="w-100 py-1 text-title sub-menu pl-3" style="word-break: keep-all;white-space: pre-line">{{$child -> subtitle}}</div>
                            </div>
                        </div>
{{--                    @else--}}
{{--                        <div class="w-100 text-title">--}}
{{--                            <div class="mt-2 my-2">--}}

{{--                                <div class="w-100 py-1 text-title " >--}}
{{--                                    {{$child -> subtitle}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                @elseif($child -> type == 'content')
                    <p class="text-medium-xs mt-3" style="white-space: pre-line;">{{$child -> content}}</p>
                @elseif($child -> type == 'image')
                    <div class="position-relative mt-3">
                        <img class="d-block w-100" src="<?=asset('img/media/'.$child->img);?>"
                             alt="First slide">
                        <div class="text-small-xs text-white d-flex" style="position: absolute; bottom: .25rem; right: .5rem;"><img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor ">{{$child->img_source}}</p></div>


                    </div>
                    <p class="mt-1 text-small">{{$child -> caption}}</p>
                @endif
            @endforeach

                <div class="row my-4">
                    <div class="col-4">
                        @if($previous != -1)
                            <p class="text-blue-1 text-normal" id="previous">◀前の記事</p>
                            <input type="hidden" id="previous_id" value="{{$previous}}">
                        @endif
                    </div>
                    <div class="col-4 text-center text-blue-1">
                        <p class="text-blue-1 text-normal" name="move_list">一覧へ</p>
                    </div>
                    <div class="col-4 float-right">
                        @if($next != -1)
                            <p class="text-blue-1 text-normal float-right" id="next">次の記事▶</p>
                            <input type="hidden" id="next_id" value="{{$next}}">
                        @endif

                    </div>
                </div>
        </div>
    </div>

    <input type="hidden" value="{{$media->garden_id}}" id="garden_id">


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


            var garden_id = $("#garden_id").val();
            //getSchoolList();



            $("[name=move_list]").click(function(event) {
                var prefecture_id = $("#prefecture_id").val();
                window.location.href = home_path + '/media/' + garden_id + '/1/list';
            });

            $("#previous").click(function(event) {
                var previous_id = $("#previous_id").val();
                window.location.href = home_path + "/media/detail/" + previous_id;
            });

            $("#next").click(function(event) {
                var next_id = $("#next_id").val();
                window.location.href = home_path + "/media/detail/" + next_id;
            });

            $("#move_prefecture").click(function(event) {
                window.location.href = home_path + "/school/detail/" + garden_id;
            });

        });


    </script>
@endsection
