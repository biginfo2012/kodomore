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
        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }
        @media (max-width: 767px) and (min-width: 576px) {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 4.5rem;
            }
        }

        @media (min-width: 768px)  {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 6rem;
            }
        }

        @media  (max-width: 575px) {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 3rem;
            }
        }

        @media (max-width: 375px) and (min-width: 321px){
            .favourite {
                border-top: 45px solid #ACE4E9 !important;
                border-left: 45px solid transparent !important;
            }
            .favourite_img{
                top: -40px !important;
                right: 5px !important;
            }
        }
        .favourite {
            width: 0;
            height: 0;
            border-top: 80px solid #ACE4E9;
            border-left: 80px solid transparent;
        }

        .favourite_img{
            top: -72px;
            right: 8px;
            position: absolute;
        }
        .page-footer{
            background-color: #FAFAC8 !important;
            margin-top: 0 !important;
            padding-top: 2rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> >
                入園･入学予定､在園･在学校</p>
        </div>

        <div class="card-body text-large-medium-xs py-2 background-white-blue" style="border-bottom: 1px solid #ABABAB">
            <img class="height-2 img-icon py-1" src="{{asset('img/school-history-disable.png')}}">  [入園･入学予定][現在通っている]  <br> [卒園･卒業校〕
            <div class="float-right" style="width: 100px">
                <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small"
                        name="child">
                    <option value="new" selected>お子様</option>
                    @if(!empty($children))
                        @foreach($children as $index=>$child)
                            <option value="{{$index}}">{{$child->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        @if(!empty($children))
            @foreach($children as $index=>$child)
                <div class="card pb-0 px-2 pt-2" id="child_{{$index}}" style="background-color: #FAFAC8; border-bottom: 1px solid #666666; border-radius: 0">
                    <div class="w-100" >
                        <div class="flex m-2">
                            <div class="top-menu left_bar">
                            </div>
                            <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                {{$child->title}}
                            </div>
                        </div>
                        <p class="text-medium-light mb-2 mx-3">{{$child->first_name}} {{$child->second_name}}</p>


                    </div>
                    @if(!empty($child->gardenList))
                        @foreach($child->gardenList as $index => $garden)

                            <div class="text-medium-light mx-3 my-2">

                                <p>{{$garden->garden_public_name}}</p>
                                <p>{{$garden->garden_detail}}</p>
                                <a class="top-title-tag blog_post" href="{{url('post/review/' . $garden->garden_id)}}">あなたの感想や評価をお知らせください</a>
                            </div>
                            <div class="card-body school-item rounded pb-0">
                                <p class="text-small"><?=$garden->prefecture_name;?> ｜ <?=$garden->city_name;?>
                                    ｜ <?=$garden->town_name;?>
                                    @foreach($garden -> typeList as $type)
                                        ｜ {{$type->type_name}}
                                    @endforeach
                                    @foreach($garden->tagList as $index => $tag)
                                         @if($tag->id == 68 || $tag->id == 69)
                                            ｜ {{$tag -> tag_title}}
                                        @endif
                                    @endforeach
                                </p>
                                <h6 class="text-truncate text-medium-title mb-1"><?=$garden->garden_name;?></h6>
                                <div class="d-flex ">
                                    @if($garden -> status == '応募受付中')
                                        <div style="flex: 2"><p class="px-1 text-small "
                                                                style="width: fit-content; background-color: #FFFFC8">
                                                願書受付中 {{$garden -> reception_date}} </p></div>
                                        <div class="flex-1 d-none"><p class="text-small float-right">レビュー(00)</p></div>
                                    @else
                                        <p class="text-small px-1" style="width: fit-content; background-color: #FFFFC8">{{$garden -> status}}</p>
                                    @endif

                                </div>

                                <div class="d-flex flex-wrap mt-1">
                                    @foreach($garden -> keywordList as $keyword)
                                        @if($keyword->keyword_id == '10' || $keyword->keyword_id == '9')
                                            <div class="mr-1 mb-2 px-1 title-background  text-small rounded rounded-small text-white" style="background-color: #FF557E !important;">
                                                <?=$keyword->keyword_title;?>
                                            </div>
                                        @else
                                            <div class="mr-1 mb-2 px-1 text-small rounded rounded-small" style="background-color: #E9F6FD">
                                                <?=$keyword->keyword_title;?>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>


                                <div class="radio-image">
                                    @if(array_key_exists('img', $garden->imgInfo))
                                        <img class="card-img-top school-detail" id="img_<?=$garden->garden_id;?>"
                                             src="<?=asset('img/garden/' . $garden->imgInfo["img"]);?>" alt="" style="border-radius: 0">


                                        @if($garden->imgInfo["caption"] == '公式サイトより')
                                            <div class="text-small-xs text-white d-flex"
                                                 style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                    class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                                <p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                                        @elseif(empty($garden->imgInfo["caption"]))
                                            <div class="text-small-xs text-white d-flex"
                                                 style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                    class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                                <p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                                        @else
                                            <div class="text-small-xs text-white d-flex"
                                                 style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                    class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                                <p class="hit-the-floor ">{{$garden->imgInfo["caption"]}}</p></div>
                                        @endif

                                    @endif
                                </div>


                                <h6 class="text-truncate menu-icon text-medium-title mt-2 school-detail"
                                    id="title_<?=$garden->garden_id;?>"><?=$garden->comment_title;?></h6>
                                <p class="line-clamp text-small-xs"><?=$garden->comment_description;?></p>

                                <div class="d-flex flex-wrap mt-2 line-clamp">
                                    @foreach($garden -> tagList as $tag)
                                        <div class="mr-1 mb-1 px-1 title-background  text-small">
                                            <?=$tag->tag_title;?>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="favourite">
                                    @if($garden->favourite === 1)
                                        <img class="height-1 img-icon favourite_img" id="favourite_<?=$garden->garden_id;?>"
                                             src="{{asset('img/favourite.png')}}"
                                             data-enable="{{empty(session()->get(SESS_UID))?'disabled':''}}" data-favourite="1">
                                    @else
                                        <img class="height-1 img-icon favourite_img" id="favourite_<?=$garden->garden_id;?>"
                                             src="{{asset('img/favourite-add.png')}}"
                                             data-enable="{{empty(session()->get(SESS_UID))?'disabled':''}}" data-favourite="0">
                                    @endif


                                </div>

                                <div class="text-center margin-top-4">
                                    <img class="rotate-icon height-1 img-icon whole_text_show" src="{{asset('img/blue-drop.png')}}"
                                         id="collapsed-2-rotate">
                                </div>

                            </div>
                            @if($index !== count($child->gardenList) -1)
                            <div class="" style="width: 100%; height: 1px; background-color: #666666"></div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-medium-light mb-2 mx-3">未就園〔入学予定園なし〕</p>
                    @endif


                </div>
            @endforeach
        @endif




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
        var home_path = $("#home_path").val();
        $(document).ready(function () {
            $("#move_my_page").click(function (event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });

            $('.whole_text_show').on('click', function () {
                if($(this).parent().prev().prev().prev().hasClass('line-clamp')){
                    $(this).parent().prev().prev().prev().removeClass('line-clamp')
                }
                else{
                    $(this).parent().prev().prev().prev().addClass('line-clamp')
                }
                if($(this).hasClass('rotate')){
                    $(this).removeClass('rotate');
                }
                else{
                    $(this).addClass('rotate');
                }

            })

            $('[name="child"]').on('change', function () {
                var id = $(this).val();
                var index = '#child_' + id;
                var a = document.createElement('a');
                a.href = index;
                a.id = 'someLink'
                document.body.appendChild(a);
                document.getElementById('someLink').click();
                document.getElementById('someLink').remove();


            })

        });
    </script>
@endsection

