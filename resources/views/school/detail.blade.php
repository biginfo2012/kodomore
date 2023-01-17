@extends('layouts.app')

@section('title')
    {{$garden -> prefecture_name}}
    @foreach($garden -> typeList as $type)
       {{$type->type_name}}
    @endforeach
    {{$garden->garden_name}}｜コドモア幼保情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <link rel="stylesheet" href="{{ asset('css/hes-gallery.css') }}">
    <style>

        .card-header {
            background-color: white;
            border: 0px;
        }

        .news-border {
            width: unset;
            height: 1.5rem;
        }

        .news-background {
            background-image: url("{{asset('img/news-border.png')}}");
            background-size: contain;
        }
        .photo-background {
            background-image: url("{{asset('img/photo-gallery-back.png')}}");
            background-size: cover;
        }
        .special-background {
            background-color: #FFE4EA !important;
            background-image: url("{{asset('img/back-detail.png')}}");
            background-size: cover;

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

        .alarm-tag {
            padding: .5rem .5rem;
            background-color: #ACE4E9;
            border-right: 1px solid white;
        }

        .alarm-tag > img {
            margin-top: .5rem;
            width: 2.5rem;
            height: 2.5rem
        }


        .alarm-modal {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent;
        }

        .alarm {
            background-image: url("{{asset('img/alarm_tag_background.png')}}");
            background-size: contain;
            background-repeat: round;
            padding: 1rem;
        }
        #top_header{
            position: relative !important;
        }

        .alarm-title {
            background-image: url("{{asset('img/alarm_info_background.png')}}");
            background-size: contain;
            background-repeat: round;
            margin-top: .5rem;
        }

        .gallery {
            padding: 0;
            margin: 0;
        }

        .teacher-avatar {
            width: 10rem;
            height: 10rem;
        }

        .avatar {
            width: 3rem;
            height: 3rem;
        }

        .txt-detail {
            text-decoration: underline;
            color: black;
            /*font-size: 0.8rem*/
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

        #hg-pic-cont {
            padding: .25rem;
        }

        #hg-bg {
            background-color: #216887 !important;
            opacity: .5;
        }

        #hg-subtext {
            position: initial !important;
            margin: .5rem 0;
            color: black !important;
        }


        #hgallery #hg-prev-onpic {
            background: url("{{asset('img/circle_prev.png')}}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            bottom: -45px !important;
            left: 0;
            top: unset !important;
            width: 30px !important;
            height: 30px !important;
        }

        #hgallery #hg-next-onpic {
            background: url("{{asset('img/circle_next.png')}}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            right: 0;
            bottom: -45px !important;
            top: unset !important;
            width: 30px !important;
            height: 30px !important;
        }

        #hg-howmany {
            color: white !important;
            position: absolute;
            display: block;
            right: 80px !important;
            bottom: -40px !important;
            left: 80px !important;
            text-align: center !important;
        }

        #hg-bg::after {
            display: none !important;
        }

        #hg-pic-cont::after {
            content: '';
            position: absolute;
            display: none;
            top: -50px;
            right: 0px;
            width: 30px;
            height: 30px;
            background-image: url(data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjRkZGRkZGIiBoZWlnaHQ9IjI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xOSA2LjQxTDE3LjU5IDUgMTIgMTAuNTkgNi40MSA1IDUgNi40MSAxMC41OSAxMiA1IDE3LjU5IDYuNDEgMTkgMTIgMTMuNDEgMTcuNTkgMTkgMTkgMTcuNTkgMTMuNDEgMTJ6Ii8+CiAgICA8cGF0aCBkPSJNMCAwaDI0djI0SDB6IiBmaWxsPSJub25lIi8+Cjwvc3ZnPg==);
            background-position: center;
            background-size: contain;
            cursor: pointer;
            opacity: .8;
        }

        @media (max-width: 767px) and (min-width: 576px) {
            .modal-call > img {
                width: 2.7rem;
                margin-right: 1.5rem;
            }

            .modal-call {

                padding: .75rem 0;
                color: white;
            }

            .clock-time {
                width: 1.2rem
            }

            .logo {
                width: unset;
                height: 7.5rem;
            }

            .logo-big {
                width: unset;
                height: 15rem;
            }


            .modal-call-title {
                font-size: 21px;
                font-weight: bold;
                font-family: YugoMedium;

            }

            .modal-call-number {
                font-size: 30px;
                font-weight: bold;
                font-family: "Helvetica Neue";

            }

            .modal-call-text {
                font-size: 24px;
                font-family: YugoBold;
                color: #3D75BA;
            }

            #hg-capture {
                position: absolute;
                bottom: .5rem;
            }

            #hg-top {
                position: absolute;
                top: -1.5rem;
            }
        }

        .logo {
            max-width: 100%;
        }

        .logo-big {
            max-width: 100%;
        }

        @media (max-width: 575px) {
            .modal-call > img {
                width: 1.8rem;
                margin-right: 1rem;
            }

            .modal-call {

                padding: .5rem 0;
                color: white;
            }

            .clock-time {
                width: 0.75rem
            }

            .logo {
                width: unset;
                height: 5rem;
            }

            .logo-big {
                width: unset;
                height: 10rem;
            }

            .modal-call-title {
                font-size: 14px;
                font-weight: bold;
                font-family: YugoMedium;

            }

            .modal-call-number {
                font-size: 20px;
                font-weight: bold;
                font-family: "Helvetica Neue";

            }

            .modal-call-text {
                font-size: 16px;
                font-family: YugoBold;
                color: #3D75BA;
            }

            #hg-capture {
                position: absolute;
                bottom: .5rem;
            }

            #hg-top {
                position: absolute;
                top: -1.5rem;
            }

            .avatar {
                width: 3rem !important;
                height: 3rem !important;
            }
        }

        @media (max-width: 376px) {
            .modal-call > img {
                width: 1.2rem;
                margin-right: 1rem;
            }

            .modal-call {

                padding: .5rem 0;
                color: white;
            }

            .clock-time {
                width: 0.5rem
            }

            .logo {
                width: unset;
                height: 3.5rem;
            }

            .logo-big {
                width: unset;
                height: 7rem;
            }

            .modal-call-title {
                font-size: 12px;
                font-weight: bold;
                font-family: YugoMedium;

            }

            .modal-call-number {
                font-size: 17px;
                font-weight: bold;
                font-family: "Helvetica Neue";

            }

            .modal-call-text {
                font-size: 14px;
                font-family: YugoBold;
                color: #3D75BA;
            }

            .avatar {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }
        }

        @media (max-width: 320px) {
            .modal-call > img {
                width: .9rem;
                margin-right: 1rem;
            }

            .modal-call {

                padding: .5rem 0;
                color: white;
            }

            .clock-time {
                width: 0.5rem
            }

            .logo {
                width: unset;
                height: 2.5rem;
            }

            .logo-big {
                width: unset;
                height: 5rem;
            }

            .modal-call-title {
                font-size: 10px;
                font-weight: bold;
                font-family: YugoMedium;

            }

            .modal-call-number {
                font-size: 15px;
                font-weight: bold;
                font-family: "Helvetica Neue";

            }

            .modal-call-text {
                font-size: 12px;
                font-family: YugoBold;
                color: #3D75BA;
            }

            #hg-capture {
                position: absolute;
                bottom: .5rem;
            }

            .avatar {
                width: 2.5rem !important;
                height:2.5rem !important;
            }
        }

        @media (min-width: 768px) {
            .modal-call > img {
                width: 3.6rem;
                margin-right: 2rem;
            }

            .clock-time {
                width: 1.5rem
            }

            .modal-call {

                padding: 1rem 0;
                color: white;
            }

            .logo {
                width: unset;
                height: 10rem;
            }

            .logo-big {
                width: unset;
                height: 20rem;
            }

            .modal-call-title {
                font-size: 28px;
                font-weight: bold;
                font-family: YugoMedium;

            }

            .modal-call-number {
                font-size: 40px;
                font-weight: bold;
                font-family: "Helvetica Neue";

            }

            .modal-call-text {
                font-size: 32px;
                font-family: YugoBold;
                color: #3D75BA;
            }

            #hg-capture {
                position: absolute;
                bottom: .5rem;
            }

            #hg-top {
                position: absolute;
                top: -3rem;
            }
        }

        .show-event {
            background-color: #59B6E8;
            /*background-color: #dedede;*/
        }

        .category.active {

            background-color: #EFFAFB;
        }

        .category {
            background-color: white;
            border: 1px solid #31BCC7;
            color: #1C3F54;
            font-size: 13px;
            font-family: YugoMedium;
        }

        .category.disable {
            background-color: #dedede;
            border: 1px solid #ABABAB;
            color: #ABABAB;
        }

        .square-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 100%;
        }

        .square-image img {
            height: 100%;
            object-fit: cover;
            position: absolute;
        }

        .property {
            background-color: #EFFAFB !important;
        }


        .modal-content {
            border-radius: .5rem !important;
            border: 1px solid #B0AFAF !important;
        }

        .modal-call-number.border {

            border-top: 1px solid #B0AFAF !important;
            border-bottom: 1px solid #B0AFAF !important;
            border-left: 0px solid #B0AFAF !important;
            border-right: 0px solid #B0AFAF !important;
        }

        .modal-call-text .border-right {
            border-right: 1px solid #B0AFAF !important;
        }

        .modal-dialog-centered {
            justify-content: center;
        }

        .modal-content {
            width: unset;
        }


        .modal-call-body {
            background-color: #48D4D0;
        }

        @media (min-width: 768px) {
            #move_list:hover {
                text-decoration: underline;
                cursor: pointer;
            }
        }


        #move_list:active {
            text-decoration: underline;
        }

        [name='school-detail'] {
            cursor: default;
        }

        .carousel-icon {
            height: 30px;
            width: 30px;
            /* padding: .5rem; */
            border-radius: 50%;
            background-color: white;
            /* width: 20px; */
            /* height: 20px; */
        }

        .gallery {
            cursor: pointer;
        }

        #webChart > div {
            overflow: visible !important;
        }

        .more_detail{
            position: absolute;
            right: 1rem;
            bottom: 1rem;
            color: #0032B4;
            background-color: white;
            padding: 0 5px;
        }

        .background-6{
            background-color: #E6E6E6 !important;
        }

        .rating .jq-ry-normal-group svg {
            fill: silver !important;
        }

        .rating .jq-ry-rated-group svg {
            fill: blue !important;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
            top: 3px !important;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label:before {
            background-color: white;
            border: #FF557E solid 1px;

        }
        .custom-control-label::before{
            top: 3px !important;
        }
        .custom-control-label::after{
            top: 3px !important;
        }

        .articles-info{
            min-width: 25%;
            padding-top: .5rem;
            padding-bottom: .2rem;
            border-bottom: 4px solid #2CAAB0;
        }

        .articles-info.active{
            border-bottom: 4px solid #1A1A1A !important;
        }

        .footer-company{
            margin-bottom: 20px !important;
        }

        .custom-control-label::after {
            position: absolute;
            top: .25rem;
            left: -1.4rem;
            display: block;
            width: 1.3rem;
            height: 1rem;
            content: "";
            background: no-repeat 50%/50% 50%;
        }

        iframe{
            border: 0 !important;
            width: 100% !important;
            height: 300px !important;
        }

        .background-gray{
            background-color: #DEDEDE !important;
        }

        .text-pink{
            color: #D50000 !important;
        }

        hr{
            border-top: 1px dashed #ABABAB !important;
        }

    </style>
@endsection

@section('content')
    <input type="hidden" id="prefecture_id" value="{{$garden->prefecture_id}}">
    <input type="hidden" id="garden_id" value="{{$garden->garden_id}}">
    <input type="hidden" id="super_user" value="{{session()->get(SUPER_USER)}}">
    <div class="card">

        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag" id="to_garden">全国の幼稚園､保育所</span> > <span
                    class="top-title-tag" id="school_list">{{$garden->prefecture_name}}の園一覧</span>
                @foreach($garden -> typeList as $type)
                    > <span class="top-title-tag to_type" id="">{{$type->type_name}}</span>
                @endforeach

                > {{$garden->garden_name}}</p>

        </div>

        <div id="carouselExampleControls" class="carousel slide {{count($imgList) == 0 ? 'd-none':''}}"
             data-ride="carousel">
            <div class="carousel-inner">
                @foreach($topImgList  as $index_img => $img)
                    @if($index_img == 0)
                        <div class="carousel-item active" style="position: relative">
                    @else
                        <div class="carousel-item " style="position: relative">
                    @endif
                            <img class="d-block w-100" src="<?=asset('img/garden/' . $img->img);?>"
                                         alt="First slide">

                            @if($img->img !== 'NOIMAGE.jpg')
                                @if($img->img_source == '公式サイトより')
                                    <div class="text-small-xs text-white d-flex" style="position: absolute; bottom: .25rem; right: .5rem;">
                                        <img class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                                @elseif(empty($img->img_source))
                                    <div class="text-small-xs text-white d-flex"
                                         style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                            class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                                @else
                                    <div class="text-small-xs text-white d-flex"
                                         style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                            class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$img->img_source}}</p></div>
                                @endif
                            @endif
                        </div>
                @endforeach

                        <a class="carousel-control-prev {{count($topImgList) == 1 ? 'd-none':''}}" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <div class="d-flex justify-content-center carousel-icon"><i
                                    class="text-black fa fa-chevron-left"></i></div>
                        </a>
                        <a class="carousel-control-next {{count($topImgList) == 1 ? 'd-none':''}}" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <div class="d-flex justify-content-center carousel-icon"><i
                                    class="text-black fa fa-chevron-right "></i></div>

                        </a>
            </div>
        </div>
        </div>

        <div class="card-header text-center text-small pt-2 pb-0">
           <?=$garden->city_name;?> ｜ <?=$garden->town_name;?> ｜ <?=$garden->kind_name;?>
           @foreach($garden -> typeList as $type)
                ｜ {{$type->type_name}}
            @endforeach
               @foreach($tagList as $index => $tag)
                    @if($tag->id == 68 || $tag->id == 69)
                       ｜ {{$tag -> tag_title}}
                   @endif
               @endforeach
        </div>

        <div class="top-menu card-header py-2 text-center text-title-large ">
            {{$garden->garden_public_name}}<br>
            <?=$garden->garden_name;?>
        </div>

        <div class="card-header text-left text-small py-2">
            <span class="p-1" style="background-color: #FFFFC8">
                @if($garden -> status == '応募受付中' || $garden -> status == '応募受付期間')
                    願書受付期間 {{$garden -> reception_date}}
                @else
                    {{$garden -> status}}
                @endif
            </span>
        </div>
        <div class="card-body py-0">
            <div class="d-flex flex-wrap mt-0">
                @foreach($garden -> keywordList as $keyword)
                    @if($keyword->keyword_id == '10')
                        <div class="mr-1 mb-1 px-1 py-0 keyword-background-active text-small">
                            <?=$keyword->keyword_title;?>
                        </div>
                    @else
                        <div class="mr-1 mb-1 px-1 py-0 keyword-background text-small rounded rounded-small">
                            <?=$keyword->keyword_title;?>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>



        <div class="card-body py-0">
            @foreach($noficationList as $nofi)
                @if(isset($nofi->type) && isset($nofi->content))
                    @if($nofi->type == '1')
                        <div class="justify-content-center text-center px-2 my-2" style="border: 1px solid #ED1C24">
                            <p class="text-large text-left line-clamp1" style="color: #ED1C24">
                                {{$nofi->content}}
                            </p>
                            <img class="rotate-icon height-1 img-icon whole_text_show mt-n1" src="{{asset('img/red-drop-1.png')}}">
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

        <div class="text-small text-gray mr-3 d-flex justify-content-center">
            <div class="flex-1"></div>
            <img class="img-icon mr-1 clock-time" src="{{asset('img/clock.png')}}">
            <p id="cur_date" style="line-height: 1"></p></div>

        @if(!empty($garden->photo))
            @if($garden -> photo_type == 2)
                <div class="card-header text-center text-large">
                    <img class="logo-big" src="{{asset('/storage/img/garden/'.$garden->photo)}}">
                </div>
            @else
                <div class="card-header text-center text-large">
                    <img class="logo" src="{{asset('/storage/img/garden/'.$garden->photo)}}">
                </div>
            @endif
        @endif

        @if($garden->garden_name === 'こばと幼稚園' || $garden->garden_name === 'こばと西幼稚園' || $garden->garden_name === 'こばと第3幼稚園')
            <div class="card-body py-1 text-center">
                <a class="mx-0 btn show-event py-1 text-medium text-white px-3" id="btn_login"
                   href="{{url('media/'. $garden->garden_id . '/1/list')}}">メディアにて紹介･掲載された内容を見る </a>
            </div>
        @endif


        <div class="card-body pt-0">
            <div class="row">
                <a class="col-4 mt-2 px-1" name="type-detail" href="#photoList">

                    <div class="rounded text-center category py-1 text-bold-menu" name="type">
                        Photo Gallery
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#map">

                    <div class="rounded text-center category py-1 text-bold-menu" name="type">
                        Access Map
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#setting">

                    <div class="rounded text-center category py-1 text-bold-menu" name="type">
                        基本情報
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#teacher_talk">

                    <div class="rounded text-center category py-1 text-bold-menu background-gray" name="type">
                        先生のお話
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#review">

                    <div class="rounded text-center category {{$review_cnt>0?'':'background-gray'}} py-1 text-bold-menu" name="type">
                        クチコミレビュー
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#faq">

                    <div class="rounded text-center category py-1 text-bold-menu background-gray" name="type">
                        よくある質問FAQ
                    </div>

                </a>

            </div>
        </div>


        <div class="card-body py-1">
            <div class=" text-center text-medium-xs">
                <?=$garden->location;?>
            </div>
            <div class="d-flex flex-wrap mt-2">
                @foreach($tagList as $index => $tag)
                    <div class=" mr-1 mb-1 position-relative">
                        <div class="title-background py-0 px-1">
                            <div class=" tag-info text-small" style="color: #4D4D4D"><?=$tag->tag_title;?></div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class=" d-flex card-body py-1 ">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}" name="school-detail">
        </div>

        <div class="card-body py-0">
            <hr class="dot-border">
            <div class=" text-medium-title p-1">
                <span class="menu-icon">◆</span><?=$garden->garden_name;?> のメインタイトル
            </div>
            <div class="text-title-large text-black"><?=$garden->comment_title;?></div>
            <hr class="dot-border">
            <div class="text-break text-medium-light mb-3"
                 style="text-align: justify"><?=$garden->comment_description;?></div>
        </div>
        <div class="card-body special-background">
            @if(!empty($garden->featureList))
                <div class="background-white p-3 position-relative">
                    <img class="position-absolute mt-n1 ml-n1" style="height: 1.5rem; width:1.5rem; left:0; top:0;" src="{{asset('img/i-line1.png')}}">
                    <p class="text-medium" style="color: #FF557E">{{$garden->garden_name}}の特徴</p>
                    @foreach($garden->featureList as $feature)
                        <div class="mt-2 d-flex">
                            <img class="height-1 mt-1" style="width: 2.3rem;" src="{{asset('img/detail-checkbox.png')}}">
                            <p class="text-medium-light text-black">{{ $feature->feature }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="p-2">
                <div class="text-medium-title mt-2">
                    目次
                </div>

                <div class="mt-1">
                    <a class="text-medium-title mt-2 text-3" >
                        <span class="menu-icon">◆</span><span class="text-decoration text-gray" style="cursor: default"><?=$garden->garden_name;?> の制服やオリジナルアイテム</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3">
                        <span class="menu-icon">◆</span><span class="text-decoration text-gray"style="cursor: default"><?=$garden->garden_name;?> の教育方針</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#shift_area">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の預かり時間</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#price_area">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の入園などに関する費用</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#enter_area">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の入園について</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#review">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> のクチコミレビュー</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#message_from">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> からのメッセージ</span>
                    </a>
                </div>

                <div class="mt-2">
                    <a class="text-medium-title mt-2 text-3" href="#photoList">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> のPhoto Gallery</span>
                    </a>
                </div>


            </div>
        </div>
        <div class="card-body pt-2">
            <img class="" src="{{asset('img/kodomore-snap.png')}}">
        </div>

        <input type="hidden" id="map_iframe_val" value="{{$garden->map_iframe}}">
        <input type="hidden" id="map_setting_val" value="{{$garden->map_setting}}">
            @if($garden->map_setting === 1)
                <div class="card-body pt-0" id="map">
                    <div class=" text-medium-title p-1">
                        <span class="menu-icon">◆</span><?=$garden->garden_name;?> Access map
                    </div>
                    <!--Google map-->
                    <div id="map-container-google-2" class="z-depth-1-half map-container mt-1">
                    </div>
                </div>


        @elseif($garden->map_setting === 0)

        @endif

        <div class="card-body mt-3 py-2 sub-menu text-small" id="setting">
            <div class=" text-medium-title ">
                <span class="menu-icon">◆</span><?=$garden->garden_name;?> 基本情報と施設概要
            </div>
        </div>

        @if(count($uniformList) > 0)
            <div class="card-body property py-0 " id="original_item">
                @foreach($uniformList as $goods_index => $goods)
                    <div class="mt-3">
                        <div class=" text-medium-title p-1">
                            <?=$garden->garden_name;?><?=$goods->image_type;?>
                        </div>
                        <div class="position-relative">
                            <img src="{{asset('/storage/img/garden/'.$goods -> img)}}">
                            @if($goods->img_source == '公式サイトより')
                                <div class="text-small-xs text-white d-flex"
                                     style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                        class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                    <p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                            @elseif(empty($goods->img_source))
                                <div class="text-small-xs text-white d-flex"
                                     style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                        class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                    <p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                            @else
                                <div class="text-small-xs text-white d-flex"
                                     style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                        class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                    <p class="hit-the-floor ">{{$goods->img_source}}</p></div>
                            @endif
                        </div>
                        <p class="text-small mt-1"><?=$goods->img_source;?></p>
                    </div>
                @endforeach

                <hr class="mt-3 mb-0 d-none">
            </div>
        @endif

        <div class="card-body d-none">
            <p class="text-medium-title">
                <?=$garden->garden_name;?>の教育方針
            </p>
            <p class="text-medium-xs" style="line-break: anywhere">当園の◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯150文字程度｡</p>

        </div>


        <div id="loop_slide" class="top-menu card-body py-0 text-center text-normal-title d-flex mt-3" style="position:relative; overflow: auto; background-color: #2CAAB0 !important;">
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="public_name" href="#public_name" >正式名称</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="address_area" href="#address_area">住所</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="phone_area" href="#phone_area">電話</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="url_area" href="#url_area">HP</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="time_area" href="#time_area">設立</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="rel_area" href="#rel_area">系列園･校</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="member_area" href="#member_area">定員</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="target_area" href="#target_area">保育対象年齢</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="shift_area" href="#shift_area">預かり時間</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="noshift_area" href="#noshift_area">休園日</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="price_area" href="#price_area">費用</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="enter_area" href="#enter_area" style="color: #216887 !important;">入園について</a>
            </div>
            <div class="card articles-info mr-3 background-transparent">
                <a class="text-white" name="graduate_area" href="#graduate_area">進路</a>
            </div>
        </div>

        <div class="card-body" id="public_name">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">正式名称</p>
            <p class="text-normal mt-2 ml-1">{{$garden->garden_public_name}}</p>
            <p class="text-normal ml-1">{{$garden->garden_name}}</p>
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0" id="address_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">住所</p>
            <p class="text-normal mt-2 ml-1"> 〒 <?=$garden->post_code;?><br><?=$garden->prefecture_name;?><?=$garden->city_name;?><?=$garden->town_name;?><?=$garden->address;?></p>
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0" id="phone_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">電話</p>
            @if(!empty($garden->mobile))
                <p class="text-normal mt-2 ml-1">{{$garden->mobile}}　</p>
            @else
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endif

            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0" id="url_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">HP</p>
            @if(!empty($garden->url))
                <p class="text-normal mt-2 ml-1">{{$garden->url}}　</p>
            @else
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endif
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0" id="time_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">設立</p>
            @if(!empty($garden->founding))
                <p class="text-normal mt-2 ml-1">{{$garden->founding}}　</p>
            @else
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endif

            <hr class="mt-3 mb-0">
        </div>
        <div class="card-body pt-0" id="rel_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">系列園･校</p>
                @isset($garden->seriesList)
                    @foreach($garden->seriesList as $series)
                        <p class="text-normal mt-2 ml-1">
                            {{ $series->series_garden_school }}
                        </p>
                    @endforeach
                    <hr class="mt-3 mb-0">
                @endisset
                @empty($garden->seriesList)
                    <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
                    <hr class="mt-3 mb-0">
                @endempty
        </div>

        <div class="card-body pt-0" id="member_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">定員</p>
            @if(!empty($garden->capacity))
                <p class="text-normal mt-2 ml-1">{{$garden->capacity}}　</p>
            @else
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endif

            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0" id="target_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">保育対象年齢</p>
            @if(!empty($garden->start_age) && !empty($garden->start_month) && !empty($garden->end_age) && !empty($garden->end_month))
                <p class="text-normal mt-2 ml-1">{{$garden->start_age . $garden->start_month . " ~ " . $garden->end_age . $garden->end_month}}　</p>
            @else
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endif

            <hr class="mt-3 mb-0">
        </div>

        <div class=" d-flex card-body py-0">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}" name="school-detail">
        </div>

        <div class="card-body pb-0" id="shift_area">
            <div style="width: 100%; height: 1px; background-color: #6D6D6D"></div>
        </div>

            <div class="card-body" >
                <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">預かり時間</p>
            @if(!empty($garden->timesList))
                @foreach($garden->timesList as $key => $gardenTimesResult)
                    <p class="text-medium-title mt-2 ml-1">{{ $key }}</p>
                
                    @foreach($gardenTimesResult as $gardenTimesResultDetail)
                        <div class="row text-normal">
                            <div class="col-4 ml-1 ">
                                {{ $gardenTimesResultDetail->time_kind_second }}
                            </div>
                            @if($gardenTimesResultDetail->all_day == 1)
                                <div class="col-8 ml-n1">
                                    24時間
                                </div>
                            @else
                                <div class="col-8 ml-n1">
                                    {{
                                        $gardenTimesResultDetail->start_hour . '：' . $gardenTimesResultDetail->start_minute.
                                        '〜'.
                                        $gardenTimesResultDetail->end_hour . '：' . $gardenTimesResultDetail->end_minute
                                    }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endforeach
                @if(!empty($garden->timesRemarkList[0]->display) && $garden->timesRemarkList[0]->display == 1)
                    <p class="text-small mt-2 ml-1" style="line-height: 1.1">※教育保育認定(支給認定)によって保育時間は異なります｡
                    　各自治体でご確認ください｡</p>
                @endif

                @if(!empty($garden->timesRemarkList[0]->remark))
                    <p class="text-small mt-2 ml-1" style="word-break: break-all; line-height: 1.1;">{{ $gardenTimesResultsRemark[0]->remark }}</p>
                @endif
                    <p class="text-small mt-2 ml-1">※詳しくは園･学校･スクールにお問合せください｡</p>
                    <hr class="mt-3 mb-0">
                @else
                    <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
                @endif
            </div>
            <div class="card-body pt-0" id="noshift_area">
                <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">休園日</p>
                    @if(!empty($garden->closeDaysList))
                        @foreach($garden->closeDaysList as $gardenCloseDay)
                            <p class="text-normal mt-2 ml-1">
                                    @if($gardenCloseDay->saturday == 1)
                                        土曜日
                                    @endif
                                    @if($gardenCloseDay->sunday == 1)
                                        日曜日
                                    @endif
                                    @if($gardenCloseDay->holiday == 1)
                                        祝祭日
                                    @endif
                                <br>
                                    @if($gardenCloseDay->GW == 1 && empty($gardenCloseDay->GW_remark))
                                        GW期間
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->GW == 1 && !empty($gardenCloseDay->GW_remark))
                                        GW期間{{'(' . $gardenCloseDay->GW_remark . ')'}}
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->summer == 1 && empty($gardenCloseDay->summer_remark))
                                        夏季休暇
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->summer == 1 && !empty($gardenCloseDay->summer_remark))
                                        夏季休暇{{'(' . $gardenCloseDay->summer_remark . ')'}}
                                        <br>
                                    @endif
                                
                                    @if($gardenCloseDay->winter == 1 && empty($gardenCloseDay->winter_remark))
                                        冬季休暇
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->winter == 1 && !empty($gardenCloseDay->winter_remark))
                                        冬季休暇{{'(' . $gardenCloseDay->winter_remark . ')'}}
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->spring == 1 && empty($gardenCloseDay->spring_remark))
                                        春季休暇
                                        <br>
                                    @endif

                                    @if($gardenCloseDay->spring == 1 && !empty($gardenCloseDay->spring_remark))
                                        春季休暇{{'(' . $gardenCloseDay->spring_remark . ')'}}
                                        <br>
                                    @endif
                            </p>

                            <p class="text-small mt-2 ml-1" style="word-break: break-all; line-height: 1.1;">
                                @if(!empty($gardenCloseDay->close_day_name))
                                        {{$gardenCloseDay->close_day_name}}
                                @endif
                                @if(!empty($gardenCloseDay->close_day_detail))
                                        {{$gardenCloseDay->close_day_detail}}
                                @endif
                            </p>
                        @endforeach
                    @else
                        <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
                    @endif
                <p class="text-small mt-2 ml-1">※詳しくは園･学校･スクールにお問合せください｡</p>
                <hr class="mt-3 mb-0">
            </div>
        <div class=" d-flex card-body py-0">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}" name="school-detail">
        </div>

        <div class="card-body" id="price_area">
            <div style="width: 100%; height: 1px; background-color: #6D6D6D"></div>
        </div>

        @if(isset($garden->priceList))
            <div class="card-body pt-0">
                <p class="text-medium-title  pl-1" style="background-color: #EFFAFB;">{{$garden->garden_name}}の入園･通園などに関する費用(税込)</p>
                <p class="text-medium-title mt-2 ml-1">入園時にかかる費用</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'enter_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span>@if($price->public_status === '1')<span style="color: #FF557E">※無償化対象</span>@endif</p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <hr class="mt-3 mb-0">
                <p class="text-medium-title mt-2 ml-1">年間費用</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'year_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span>@if($price->public_status === '1')<span style="color: #FF557E">※無償化対象</span>@endif</p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <hr class="mt-3 mb-0">
                <p class="text-medium-title mt-2 ml-1">月額費用</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'month_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span>@if($price->public_status === '1')<span style="color: #FF557E">※無償化対象</span>@endif</p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <hr class="mt-3 mb-0">
                <p class="text-medium-title mt-2 ml-1">時間外預かり費用</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'over_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span>@if($price->public_status === '1')<span style="color: #FF557E">※無償化対象</span>@endif</p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <hr class="mt-3 mb-0">
                <p class="text-medium-title mt-2 ml-1">その他特別費用</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'other_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span></p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                    @endif
                @endforeach
                <?php $already = false; ?>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'other_price' && !$already)
                        <?php $already = true; ?>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <hr class="mt-3 mb-0">
                <p class="text-medium-title mt-2 ml-1">制服･オリジナルアイテム</p>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'uniform_price' && !empty($price->item_title))
                        <p class="text-normal mt-1 ml-1"><span>{{$price->item_title}}</span></p>
                        <p class="text-normal text-right ml-1" style="margin-top: -19px">{{$price->sale_contain}}円</p>
                    @endif
                @endforeach
                <?php $already = false; ?>
                @foreach($garden->priceList as $index => $price)
                    @if($price->type == 'uniform_price' && !$already)
                        <?php $already = true; ?>
                        <p class="text-small mt-1 mb-2 ml-1" style="word-break: break-all">{{$price->add_info}}</p>
                    @endif
                @endforeach
                <p class="text-small mt-2 ml-1">※詳しくは園･学校･スクールにお問合せください｡</p>
                <hr class="mt-3 mb-0" id="enter_area">

            </div>
        @endif




        <div class="card-body mt-3 py-2 sub-menu text-small" >
            <div class=" text-medium-title ">
                <span class="menu-icon">◆</span><?=$garden->garden_name;?> 令和3年度入園について
            </div>
        </div>

        <div class="card-body">
            <p class="text-medium-title ml-1">募集人数</p>
            @isset($garden->detailList[0]->capacity)
                <p class="text-normal mt-1 ml-1">{{ $garden->detailList[0]->capacity }}</p>
            @endisset
            @empty($garden->detailList[0]->capacity)
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endempty
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0">
            <p class="text-medium-title ml-1">資料請求</p>
            @isset($garden->detailList[0]->document_request)
                <p class="text-normal mt-1 ml-1">{{ $garden->detailList[0]->document_request }}</p>
            @endisset
            @empty($garden->detailList[0]->document_request)
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endempty
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0">
            <p class="text-medium-title ml-1">願書配布</p>
            @isset($garden->detailList[0]->distribution_date)
                <p class="text-normal mt-1 ml-1">{{ $garden->detailList[0]->distribution_date }}</p>
            @endisset
            @empty($garden->detailList[0]->distribution_date)
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endempty
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0">
        <p class="text-medium-title ml-1">願書配布</p>
            @isset($garden->detailList[0]->reception_date)
                <p class="text-normal mt-1 ml-1">{{ $garden->detailList[0]->reception_date }}</p>
            @endisset
            @empty($garden->detailList[0]->reception_date)
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endempty
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0">
            <p class="text-medium-title ml-1">提出書類</p>
            @isset($garden->detailList[0]->document_submit)
                <p class="text-normal mt-1 ml-1">{{ $garden->detailList[0]->document_submit }}</p>
            @endisset
            @empty($garden->detailList[0]->document_submit)
                <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
            @endempty
            <hr class="mt-3 mb-0">
        </div>

        <div class="card-body pt-0">
            <p class="text-medium-title ml-1">願書受付までにお支払いいただく費用</p>
                @isset($garden->detailList[0]->exam_fee)
                    @if($garden->detailList[0]->exam_fee == 0)
                        <p class="text-normal mt-1 ml-1">入園検定料：無料</p>
                    @else
                        <p class="text-normal mt-1 ml-1">入園検定料：{{ $garden->detailList[0]->exam_fee }}</p>
                    @endif
                @endisset
                @empty($garden->detailList[0]->exam_fee)
                    <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
                @endempty
                
                @isset($garden->detailList[0]->payment_procedure)
                    <p class="text-normal mt-1 ml-1">お支払い手続き{{ $garden->detailList[0]->payment_procedure }}</p>
                @endisset
                @empty($garden->detailList[0]->payment_procedure)
                    <p class="text-normal mt-2 ml-1" style="color: #48D4D0;">未入力</p>
                @endempty

                @isset($garden_detailList[0]->entrance_remark)
                    <p class="text-normal mt-1 ml-1">備考：{{ $garden->detailList[0]->entrance_remark }}</p>
                @endisset
            <p class="text-small mt-2 ml-1">※詳しくは園･学校･スクールにお問合せください｡</p>
        </div>

        <div class="card-body pt-0">
            <div style="width: 100%; height: 1px; background-color: #6D6D6D"></div>
        </div>
        <div class="card-body pt-0" id="graduate_area">
            <p class="text-medium-title pl-1" style="background-color: #EFFAFB;">卒園児の主な進路</p>

                        <p class="text-normal mt-1 ml-1">
                            小学校<br>
                            {{ $garden->elementary_school }}
                        </p>

                        <p class="text-normal mt-1 ml-1">
                            中学校<br>
                            {{ $garden->higher_school }}
                        </p>

                        <p class="text-normal mt-1 ml-1">
                            高校<br>
                            {{ $garden->high_school }}
                        </p>

        </div>
        <div class="card-body pt-0">
            <div style="width: 100%; height: 1px; background-color: #6D6D6D"></div>
        </div>
        <div class=" d-flex card-body py-0">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}" name="school-detail">
        </div>

        <!-- <div class="card-body mt-3" style="border-radius: 10px; background-color: #CFE7F2">
            <div class=" text-medium-title ">
                <span class="" style="color: #216887">◆</span><?=$garden->garden_name;?>の紹介コメントはまだありません
            </div>
            <div class="mt-2 mx-3 px-2 py-1 z-depth-1" style="border-radius: 10px; background-color: #216887">
                <a>
                    <p class="text-medium-title text-white mb-0">教育有識者(プロ会員)の方</p>
                    <img class="height-1 img-icon mb-1" src="{{asset('img/white-message.png')}}">
                    <img class="height-1 img-icon mb-1" src="{{asset('img/academic-cap.png')}}">
                    <span class="text-title text-white">コメント投稿はこちらから</span></a>
            </div>
        </div> -->

        <div class="card-body news-background mt-3" id="review">
            <div class=" text-medium-title">
                <span class="" style="color: #29ABE2">◆</span><?=$garden->garden_name;?>のクチコミレビュー({{$review_cnt}})
            </div>
            <div class="mt-2 mx-3 px-2 py-1 z-depth-1" style="border-radius: 10px; background-color: #29ABE2">
                <a id="btn_submit" href="{{url('post/review/' . $garden->garden_id)}}">
                    <p class="text-medium-title text-white mb-0" style="line-height: 1.1;">在園児･卒園児とその保護者､<br>
                        学生含む12歳以上の一般会員の方</p>
                    <img class="height-1 img-icon mb-1" src="{{asset('img/white-message.png')}}">
                    <img class="height-1 img-icon mb-1" src="{{asset('img/loud-blog.png')}}">
                    <span class="text-title text-white ml-n1" style="letter-spacing: -1px">クチコミレビューを投稿しよう</span></a>
            </div>
{{--            <div class="mt-2">--}}
{{--                <a class="mx-0 btn btn-outline-default rounded btn-full btn-title text-white px-2" id="btn_submit" href="{{url('post/review/' . $garden->garden_id)}}"><span class="text-medium-title"> 在園児･卒園児の保護者､一般会員(プロ)の方</span>--}}
{{--                    <img class="news-border mb-1" src="{{asset('img/white-message.png')}}"><span class="text-title">クチコミレビューを投稿しよう</span></a>--}}
{{--            </div>--}}
            {{--            <div>--}}
            {{--                <img class="news-border" src="{{asset('img/blog_title.png')}}">--}}
            {{--            </div>--}}
            <!-- <div class="blog-answer rounded">
                <div>
                    <div class="row mb-2">
                        <div class="col-3 pr-0">
                            <p class="text-small float-right mt-2 px-1" style="border: 1px solid">総合評価</p>
                        </div>
                        <div class="col-6 px-1">
                            <div class="rateyo"
                                 data-rateyo-rating="{{$total_rate}}"
                                 data-rateyo-num-stars="5"
                                 data-rateyo-rated-fill="#31BCC7"
                                 data-rateyo-normal-fill="#CBF7F6"
                                 data-rateyo-score="4"></div>
                            {{--                    <span class='score'>0</span>--}}
                            {{--                            <span id="rate3" class='result'>0</span>--}}
                        </div>

                        <div class="col-3 pl-0 pt-2">
                            <span id="" class="text-large ">{{$total_rate}}({{$review_cnt}})</span>
                        </div>

                    </div>
                </div>
                <input type="hidden" id="rate1" value="{{$rate1}}">
                <input type="hidden" id="rate2" value="{{$rate2}}">
                <input type="hidden" id="rate3" value="{{$rate3}}">
                <input type="hidden" id="rate4" value="{{$rate4}}">
                <input type="hidden" id="rate5" value="{{$rate5}}">
                <input type="hidden" id="rate6" value="{{$rate6}}">
                <input type="hidden" id="rate7" value="{{$rate7}}">
                <input type="hidden" id="rate8" value="{{$rate8}}">
                <div id="webChart" class="text-center" style="width: 95%; height: 65vw; margin: auto">

                </div>
            </div>
            @foreach($reviewList as $index=>$review)
                @if($index < 5)
                    <div class="blog-answer rounded position-relative pt-0">
                        <div class="d-flex position-relative mb-1 pb-2" style="border-bottom: 1px solid #ABABAB">
                            <img src="{{asset('img/blue-user.png')}}" class="avatar mr-2 mt-n1">
                            <div>
                                <div class="d-flex mt-3">
                                    @if(empty($review->post_name))
                                        <p class="text-normal-title">投稿ネーム{{$review->nick_name}}</p>
                                    @else
                                        <p class="text-normal-title">投稿ネーム{{$review->post_name}}</p>
                                    @endif
                                    <p class="text-small blog-answer-user" style="position: absolute;right: 0;bottom: 0;">
                                        {{$review->relation_text}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 float-right mb-2 pb-1" style="border-bottom: 1px solid #ABABAB">
                            <div class="d-flex float-right" style="height: fit-content; ">
                                <p class="text-small float-right mt-2" style="color: #4D4D4D">総合評価 {{$review->total_rate}}点</p>
                                <div class="col-8 pl-1">
                                    <div class="rateyo"
                                         data-rateyo-rating="{{$review->total_rate}}"
                                         data-rateyo-num-stars="5"
                                         data-rateyo-rated-fill="#31BCC7"
                                         data-rateyo-normal-fill="#CBF7F6"
                                         data-rateyo-score="4"></div>
                                    {{--                    <span class='score'>0</span>--}}
                                    {{--                    <span class='result'>0</span>--}}
                                </div>
                            </div>
                        </div>

                        <p class="text-small"><span style="color: #216887">●</span> ICT導入度 {{$review->eval1_rate}}点</p>
                        <p class="text-small ml-3 line-clamp">{{$review->eval1_text}}</p>

                        <p class="text-small-xs more_detail" style="">...続きを読む</p>

                        <div class="detail d-none">
                            <p class="text-small"><span style="color: #216887">●</span> 授業の工夫度 {{$review->eval2_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval2_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> 全体的な講師の質 {{$review->eval3_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval3_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> 保護者との連携充実度 {{$review->eval4_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval4_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> いじめ対策 {{$review->eval5_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval5_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> 校風の良さ {{$review->eval6_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval6_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> 生徒の進路満足度 {{$review->eval7_rate}}点</p>
                            <p class="text-small ml-3">{{$review->eval7_text}}</p>
                            <p class="text-small mt-2"><span style="color: #216887">●</span> 部活や課外レッスンの充実度 {{$review->eval8_rate}}点</p>
                            <p class="text-small ml-3 mb-2">{{$review->eval8_text}}</p>


                            <p class="text-medium-title pt-2" style="border-top: 2px solid #ABABAB">{{$review->title}}</p>
                            <p class="text-small">{{$review->total_text}}</p>
                            @if(isset($review->image))
                                @foreach($review->image as $image)
                                    <img class="height-3 img-icon" src="{{asset('/storage/img/garden/'. $image->img)}}">
                                @endforeach
                            @endif
                            <p class="text-small">投稿日：{{$review->up_date}}</p>
                            @if($garden->garden_id == 1)
                                @if(isset($review->reflect))
                                    @foreach($review->reflect as $index=>$reflect)
                                        <div class="divide-line"></div>
                                        <div class="d-flex">
                                            @if($index == 1)
                                                <img src="{{asset('img/user1.png')}}" class="avatar">
                                            @else
                                                <img src="{{asset('img/user2.png')}}" class="avatar">
                                            @endif

                                            <div class="ml-1">
                                                @if($index == 1)
                                                    @if(empty($review->post_name))
                                                        <p class="text-small-xs-bold">投稿ネーム{{$review->nick_name}}</p>
                                                    @else
                                                        <p class="text-small-xs-bold">投稿ネーム{{$review->post_name}}</p>
                                                    @endif
                                                @else
                                                    <p class="text-small-xs-bold">{{$garden->garden_name}}側からの返事</p>
                                                @endif

                                                <p class="text-small">{{$reflect->content}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if(!empty(session()->get(SESS_GARDEN_ID)))
                                    <div class="school_user">
                                        <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                        <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                        @if(empty($review->reflect))
                                            <div class="text-center mt-2" style="margin-left: -12px; margin-right: -12px;">
                                                <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/review/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事は2回までとなります(1回目)</a><a class="text-small py-1 px-1 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                            </div>
                                        @else
                                            @if(count($review->reflect) ==2)
                                                <div class="text-center mt-2" style="margin-left: -12px; margin-right: -12px;">
                                                    <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/school/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事は2回までとなります(2回目)</a><a class="text-small py-1 px-1 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                @elseif(session()->get(SESS_UID)=== $review->user_id)
                                    <div class="post_user">
                                        <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                        <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>
                                        @if(empty($review->reflect))
                                            <div class="text-center mt-2">
                                                <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                            </div>
                                        @elseif(count($review->reflect)==1)
                                            <div class="text-center mt-2" style="">
                                                <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/post-user/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事をする(1回のみ)</a></p>
                                            </div>
                                        @endif

                                    </div>
                                @else
                                <div class="d-flex position-relative my-3">
                                    <div class="" style="left: 0;">
                                        <span class="align-items-start text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" ><label class="mb-0 mr-3" style="cursor: pointer;">注目した!</label><label>{{$review->attention}}</label></span>
                                        <span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.85rem !important;pointer; margin-top:2px" ><label class="mb-0 mr-3" style="cursor: pointer;">役に立った</label><label>{{$review->help}} </label></span>
                                    </div>
                                    <div class="position-absolute" style="right: 0">
                                        <a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}" style="height: 0.8rem !important;cursor: pointer; margin-top:2px" >管理者に報告</a></div>
                                </div>
                                    {{-- <div class="none_user">
                                        <div class="text-center mt-2">
                                            <p><span class="text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/stars.png')}}"><label>注目した! {{$review->attention}}</label></span><span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}"><label>役に立った {{$review->help}} </label></span><a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}">管理者に報告</a></p>
                                        </div>
                                    </div> --}}
                                @endif

                            @else
                                @if(!empty(session()->get(SESS_GARDEN_ID)))
                                    <div class="school_user">
                                        <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                        <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                        <div class="text-center mt-2">
                                            <p><a class="text-small py-1 px-3 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                        </div>
                                    </div>
                                @elseif(session()->get(SESS_UID)=== $review->user_id)
                                    <div class="post_user">
                                        <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                        <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                        <div class="text-center mt-2">
                                            <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                        </div>
                                    </div>
                                @else
                                <div class="d-flex position-relative my-3">
                                    <div class="" style="left: 0;">
                                        <span class="align-items-start text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" ><label class="mb-0 mr-3" style="cursor: pointer;">注目した!</label><label>{{$review->attention}}</label></span>
                                        <span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.85rem !important;pointer; margin-top:2px" ><label class="mb-0 mr-3" style="cursor: pointer;">役に立った</label><label>{{$review->help}} </label></span>
                                    </div>
                                    <div class="position-absolute" style="right: 0">
                                        <a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}" style="height: 0.8rem !important;cursor: pointer; margin-top:2px" >管理者に報告</a></div>
                                </div>
                                    {{-- <div class="none_user">
                                        <div class="text-center mt-2">
                                            <p><span class="text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/stars.png')}}"><label>注目した! {{$review->attention}}</label></span><span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}"><label>役に立った {{$review->help}} </label></span><a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}">管理者に報告</a></p>
                                        </div>
                                    </div> --}}
                                @endif
                            @endif

                            <input type="hidden" name="review_id" value="{{$review->id}}">

                            <div class="divide-line d-none"></div>

                            <div class="d-none">
                                <img src="{{asset('img/empty_user.png')}}" class="avatar">
                                <div class="ml-1">
                                    <div class="d-flex">
                                        <p class="text-small">投稿ネーム</p>
                                        <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                                    </div>
                                    <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                                    <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                        文字の大きさ､量､字間､行間等を...</p>
                                </div>
                            </div>


                            <div class="divide-line d-none"></div>

                            <div class="d-none">
                                <img src="{{asset('img/empty_user.png')}}" class="avatar">
                                <div class="ml-1">
                                    <div class="d-flex">
                                        <p class="text-small">投稿ネーム</p>
                                        <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                                    </div>
                                    <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                                    <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                        文字の大きさ､量､字間､行間等を...</p>
                                </div>
                            </div>

                        </div>


                        {{--                <div class="d-flex">--}}
                        {{--                    <img src="{{asset('img/empty_user.png')}}" class="avatar">--}}
                        {{--                    <div>--}}
                        {{--                        <div class="d-flex">--}}
                        {{--                            <p class="text-small">投稿ネーム</p>--}}
                        {{--                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>--}}
                        {{--                        </div>--}}
                        {{--                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>--}}
                        {{--                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡--}}
                        {{--                            文字の大きさ､量､字間､行間等を...</p>--}}

                        {{--                        <p class="text-small">投稿日：2020/00/00</p>--}}
                        {{--                        <div class="d-flex text-medium">--}}
                        {{--                            <img class="news-border" src="{{asset('img/blog_last.png')}}"> 00--}}
                        {{--                        </div>--}}

                        {{--                    </div>--}}
                        {{--                </div>--}}

                        {{--                <div class="divide-line"></div>--}}

                        {{--                <div class="d-flex">--}}
                        {{--                    <img src="{{asset('img/empty_user.png')}}" class="avatar">--}}
                        {{--                    <div>--}}
                        {{--                        <div class="d-flex">--}}
                        {{--                            <p class="text-small">投稿ネーム</p>--}}
                        {{--                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>--}}
                        {{--                        </div>--}}
                        {{--                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>--}}
                        {{--                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡--}}
                        {{--                            文字の大きさ､量､字間､行間等を...</p>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                    </div>
                @endif

                @if($index == 5)
                    <div class="flex mt-2">
                        <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-blue background-white position-relative" id="btn_more" style="background-color:white !important; color: #216887; border: 1px solid #216887 !important;">クチコミレビューをもっと見る<i class="text-blue fas fa-angle-down ml-1 position-absolute" style="font-size: 20px; top: 7px;"></i></button>
                    </div>
                @endif
            @endforeach


            <div id="all_review" class="d-none">
                @foreach($reviewList as $index=>$review)
                    @if($index >= 5)
                        <div class="blog-answer rounded position-relative pt-0">
                            <div class="d-flex position-relative mb-1 pb-2" style="border-bottom: 1px solid #ABABAB">
                                <img src="{{asset('img/blue-user.png')}}" class="avatar mr-2 mt-n1">
                                <div>
                                    <div class="d-flex mt-3">
                                        @if(empty($review->post_name))
                                            <p class="text-normal-title">投稿ネーム{{$review->nick_name}}</p>
                                        @else
                                            <p class="text-normal-title">投稿ネーム{{$review->post_name}}</p>
                                        @endif
                                        <p class="text-small blog-answer-user" style="position: absolute;right: 0;bottom: 0;">
                                            {{$review->relation_text}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 float-right mb-2 pb-1" style="border-bottom: 1px solid #ABABAB">
                                <div class="d-flex float-right" style="height: fit-content; ">
                                    <p class="text-small float-right mt-2" style="color: #4D4D4D">総合評価 {{$review->total_rate}}点</p>
                                    <div class="col-8 pl-1">
                                        <div class="rateyo"
                                             data-rateyo-rating="{{$review->total_rate}}"
                                             data-rateyo-num-stars="5"
                                             data-rateyo-rated-fill="#31BCC7"
                                             data-rateyo-normal-fill="#CBF7F6"
                                             data-rateyo-score="4"></div>
                                        {{--                    <span class='score'>0</span>--}}
                                        {{--                    <span class='result'>0</span>--}}
                                    </div>
                                </div>
                            </div>

                            <p class="text-small"><span style="color: #216887">●</span> ICT導入度 {{$review->eval1_rate}}点</p>
                            <p class="text-small ml-3 line-clamp">{{$review->eval1_text}}</p>

                            <p class="text-small-xs more_detail" style="">...続きを読む</p>

                            <div class="detail d-none">
                                <p class="text-small"><span style="color: #216887">●</span> 授業の工夫度 {{$review->eval2_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval2_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> 全体的な講師の質 {{$review->eval3_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval3_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> 保護者との連携充実度 {{$review->eval4_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval4_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> いじめ対策 {{$review->eval5_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval5_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> 校風の良さ {{$review->eval6_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval6_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> 生徒の進路満足度 {{$review->eval7_rate}}点</p>
                                <p class="text-small ml-3">{{$review->eval7_text}}</p>
                                <p class="text-small mt-2"><span style="color: #216887">●</span> 部活や課外レッスンの充実度 {{$review->eval8_rate}}点</p>
                                <p class="text-small ml-3 mb-2">{{$review->eval8_text}}</p>


                                <p class="text-medium-title pt-2" style="border-top: 2px solid #ABABAB">{{$review->title}}</p>
                                <p class="text-small">{{$review->total_text}}</p>
                                @if(isset($review->image))
                                    @foreach($review->image as $image)
                                        <img class="height-3 img-icon" src="{{asset('/storage/img/garden/'. $image->img)}}">
                                    @endforeach
                                @endif
                                <p class="text-small">投稿日：{{$review->up_date}}</p>
                                @if($garden->garden_id == 1)
                                    @if(isset($review->reflect))
                                        @foreach($review->reflect as $index=>$reflect)
                                            <div class="divide-line"></div>
                                            <div class="d-flex">
                                                @if($index == 1)
                                                    <img src="{{asset('img/user1.png')}}" class="avatar">
                                                @else
                                                    <img src="{{asset('img/user2.png')}}" class="avatar">
                                                @endif

                                                <div>
                                                    @if($index == 1)
                                                        @if(empty($review->post_name))
                                                            <p class="text-small-xs-bold">投稿ネーム{{$review->nick_name}}</p>
                                                        @else
                                                            <p class="text-small-xs-bold">投稿ネーム{{$review->post_name}}</p>
                                                        @endif
                                                    @else
                                                        <p class="text-small-xs-bold">{{$garden->garden_name}}側からの返事</p>
                                                    @endif

                                                    <p class="text-small">{{$reflect->content}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(!empty(session()->get(SESS_GARDEN_ID)))
                                        <div class="school_user">
                                            <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                            <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                            @if(empty($review->reflect))
                                                <div class="text-center mt-2" style="margin-left: -12px; margin-right: -12px;">
                                                    <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/review/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事は2回までとなります(1回目)</a><a class="text-small py-1 px-1 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                                </div>
                                            @else
                                                @if(count($review->reflect) ==2)
                                                    <div class="text-center mt-2" style="margin-left: -12px; margin-right: -12px;">
                                                        <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/school/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事は2回までとなります(2回目)</a><a class="text-small py-1 px-1 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                    @elseif(session()->get(SESS_UID)=== $review->user_id)
                                        <div class="post_user">
                                            <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                            <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                            @if(empty($review->reflect))
                                                <div class="text-center mt-2">
                                                    <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                                </div>
                                            @elseif(count($review->reflect)==1)
                                                <div class="text-center mt-2" style="">
                                                    <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/post-user/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事をする(1回のみ)</a></p>
                                                </div>
                                            @endif

                                        </div>
                                    @else
                                    <div class="d-flex position-relative my-3">
                                        <div class="" style="left: 0;">
                                            <span class="align-items-start text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" ><label class="mb-0 mr-3" style="cursor: pointer;">注目した!</label><label>{{$review->attention}}</label></span>
                                            <span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.85rem !important;pointer; margin-top:2px" ><label class="mb-0 mr-3" style="cursor: pointer;">役に立った</label><label>{{$review->help}} </label></span>
                                        </div>
                                        <div class="position-absolute" style="right: 0">
                                            <a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}" style="height: 0.8rem !important;cursor: pointer; margin-top:2px" >管理者に報告</a></div>
                                    </div>

                                    @endif

                                @else
                                    @if(!empty(session()->get(SESS_GARDEN_ID)))

                                        <div class="school_user">
                                            <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                            <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                            <div class="text-center mt-2">
                                                <p><a class="text-small py-1 px-3 ml-1 delete-require text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/require/delete/' . $review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除申請する</a></p>
                                            </div>
                                        </div>
                                    @elseif(session()->get(SESS_UID)=== $review->user_id)
                                        <div class="post_user">
                                            <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 1.2rem !important;" >{{$review->attention}}人が注目した！</p>
                                            <p class="text-small-xs mt-1"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 1.2rem !important;margin-left: 1px !important;" >{{$review->help}}人が役に立った</p>

                                            <div class="text-center mt-2">
                                                <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="none_user">
                                            <div class="text-center mt-2">
                                                <p><span class="text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/stars.png')}}"><label>注目した! {{$review->attention}}</label></span><span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}"><label>役に立った {{$review->help}} </label></span><a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $garden->garden_id. '/' .$review->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}">管理者に報告</a></p>
                                            </div>
                                            {{--                                    <div class="text-center mt-2">--}}
                                            {{--                                        <p><span class="text-small-xs py-1 px-1 mr-1" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/y-star.png')}}">注目した! 01</span><span class="text-small-xs py-1 px-1 ml-0" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/y-light.png')}}">役に立った 01</span><span class="text-small-xs py-1 px-0 ml-1" style=""><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/gray-forbidden.png')}}">管理者に報告</span></p>--}}
                                            {{--                                    </div>--}}
                                        </div>
                                    @endif
                                @endif

                                <input type="hidden" name="review_id" value="{{$review->id}}">

                                <div class="divide-line d-none"></div>

                                <div class="d-none">
                                    <img src="{{asset('img/empty_user.png')}}" class="avatar">
                                    <div>
                                        <div class="d-flex">
                                            <p class="text-small">投稿ネーム</p>
                                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                                        </div>
                                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                            文字の大きさ､量､字間､行間等を...</p>
                                    </div>
                                </div>


                                <div class="divide-line d-none"></div>

                                <div class="d-none">
                                    <img src="{{asset('img/empty_user.png')}}" class="avatar">
                                    <div>
                                        <div class="d-flex">
                                            <p class="text-small">投稿ネーム</p>
                                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                                        </div>
                                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                            文字の大きさ､量､字間､行間等を...</p>
                                    </div>
                                </div>

                            </div>


                            {{--                <div class="d-flex">--}}
                            {{--                    <img src="{{asset('img/empty_user.png')}}" class="avatar">--}}
                            {{--                    <div>--}}
                            {{--                        <div class="d-flex">--}}
                            {{--                            <p class="text-small">投稿ネーム</p>--}}
                            {{--                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>--}}
                            {{--                        </div>--}}
                            {{--                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>--}}
                            {{--                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡--}}
                            {{--                            文字の大きさ､量､字間､行間等を...</p>--}}

                            {{--                        <p class="text-small">投稿日：2020/00/00</p>--}}
                            {{--                        <div class="d-flex text-medium">--}}
                            {{--                            <img class="news-border" src="{{asset('img/blog_last.png')}}"> 00--}}
                            {{--                        </div>--}}

                            {{--                    </div>--}}
                            {{--                </div>--}}

                            {{--                <div class="divide-line"></div>--}}

                            {{--                <div class="d-flex">--}}
                            {{--                    <img src="{{asset('img/empty_user.png')}}" class="avatar">--}}
                            {{--                    <div>--}}
                            {{--                        <div class="d-flex">--}}
                            {{--                            <p class="text-small">投稿ネーム</p>--}}
                            {{--                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>--}}
                            {{--                        </div>--}}
                            {{--                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>--}}
                            {{--                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡--}}
                            {{--                            文字の大きさ､量､字間､行間等を...</p>--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                        </div>
                    @endif
                @endforeach

            </div> -->



            <div class="blog-answer rounded top-menu d-none">
                <div class="mb-1" style="position: relative">
                    <img src="{{asset('img/news_2.jpg')}}">
                    <span class="text-small-xs text-white" style="position: absolute; bottom: 1rem; right: 1rem;"><i
                            class="fas fa-camera"></i> 公式サイトより</span>
                </div>
                <div class="d-flex">
                    <img src="{{asset('img/empty_user.png')}}" class="avatar">
                    <div>
                        <div class="d-flex">
                            <p class="text-small">投稿ネーム</p>
                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                        </div>
                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                            文字の大きさ､量､字間､行間等を...</p>
                        <p class="text-small">投稿日：2020/00/00</p>
                        <div class="d-flex text-medium">
                            <img class="news-border" src="{{asset('img/blog_last.png')}}"> 00
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-answer rounded d-none">
                <div class="d-flex">
                    <img src="{{asset('img/empty_user.png')}}" class="avatar">
                    <div>
                        <div class="d-flex">
                            <p class="text-small">投稿ネーム</p>
                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                        </div>
                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                            文字の大きさ､量､字間､行間等を...</p>

                        <p class="text-small">投稿日：2020/00/00</p>
                        <div class="d-flex text-medium">
                            <img class="news-border" src="{{asset('img/blog_last.png')}}"> 00
                        </div>

                    </div>
                </div>

                <div class="divide-line"></div>

                <div class="d-flex">
                    <img src="{{asset('img/empty_user.png')}}" class="avatar">
                    <div>
                        <div class="d-flex">
                            <p class="text-small">投稿ネーム</p>
                            <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                        </div>
                        <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                        <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                            文字の大きさ､量､字間､行間等を...</p>
                    </div>
                </div>
            </div>
            <p class="float-right text-normal text-decoration d-none">その他のレビュー一覧へ</p>
        </div>

        <!-- <div class="card-body mt-3" style="border-radius: 10px; background-color: #D6F2F4" id="message_from">
            <div class=" text-medium-title ">
                <span class="menu-icon">◆</span><?=$garden->garden_name;?>のメッセージはまだありません
            </div>
            <div class="mt-2 mx-3 px-2 py-1 z-depth-1" style="border-radius: 10px; background-color: #31BCC7">
                <a>
                    <p class="text-medium-title text-white mb-0">当園･学校･スクール会員からの</p>
                    <img class="height-1 img-icon mb-1" src="{{asset('img/white-message.png')}}">
                    <img class="height-1 img-icon mb-1" src="{{asset('img/message-post.png')}}">
                    <span class="text-title text-white">メッセージを投稿する</span></a>
            </div>
        </div> -->

        <div id="photoList">

        </div>
        <div class=" d-flex card-body py-1 ">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}" name="school-detail">
        </div>




        @if(!empty($faqList))
            <div class="card-body mt-3 py-2 sub-menu text-small d-none" id="faq">
                <div class=" text-medium-title">
                    <span class="menu-icon">◆</span><?=$garden->garden_name;?>のよくある質問　FAQ
                </div>
            </div>
        @endif
        @if(!empty($faqList))
            <div class="card-body px-0 pt-0 d-none">
                <div class="card-header background-other-pink p-1 px-3" id="heading5">

                    <a class="collapsed" data-toggle="collapse" href="#collapse5"
                       aria-expanded="false" aria-controls="collapse5" id="collapsed-prefecture" name="collapsed"
                       relate-icon="collapsed-5-rotate">

                        <h6 class="mb-0 w-100 text-black text-medium-xs">
                            <?=$garden->garden_name;?> の保育内容について<img class="rotate-icon float-right height-1 img-icon"
                                                                     src="{{asset('img/red-drop.png')}}"
                                                                     id="collapsed-5-rotate">
                        </h6>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse5" class="collapse" aria-labelledby="heading5">

                    @foreach($faqList as $faq)
                        @if($faq->type === 1)
                            <div id="faq_{{$faq->id}}">
                                <div class="d-flex my-1 p-1">
                                    <img src="{{asset('img/question.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <h6 class="text-medium">{{$faq->question}}</h6>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 p-1">
                                    <img src="{{asset('img/answer.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <p class="text-small line-clamp">{{$faq->answer}}</p>
                                    </div>
                                </div>

                                <div class="card-header pt-0" id="heading-answer-1">

                                    <a class="collapsed " data-toggle="collapse" href="#collapse-answer-1"
                                       aria-expanded="false" aria-controls="collapse-answer-1" id="collapsed-prefecture"
                                       name="collapsed" relate-icon="collapsed-answer-1-rotate">

                                        <div class="d-flex justify-content-center"><img
                                                class="rotate-icon height-1 img-icon whole_text_show"
                                                src="{{asset('img/red-drop-1.png')}}"
                                                id="collapsed-2-rotate"></div>
                                    </a>
                                </div>

                                <!-- Card body -->
                                {{--                                    <div id="collapse-answer-1" class="collapse" aria-labelledby="heading-answer-1">--}}
                                {{--                                        <div class="text-break">...</div>--}}
                                {{--                                    </div>--}}
                            </div>
                        @endif
                    @endforeach

                </div>

                <!-- Card body -->
                {{--                    <div id="collapse5" class="collapse" aria-labelledby="heading5">--}}
                {{--                        <div class="text-break">...</div>--}}

                {{--                    </div>--}}

            </div>
            <div class="card-body px-0 pt-0 d-none">
                <div class="card-header background-other-pink p-1 px-3" id="heading6">

                    <a class="collapsed" data-toggle="collapse" href="#collapse6"
                       aria-expanded="false" aria-controls="collapse6" id="collapsed-prefecture" name="collapsed"
                       relate-icon="collapsed-6-rotate">

                        <h6 class="mb-0 w-100 text-black text-medium-xs">
                            <?=$garden->garden_name;?> の給食･おやつについて<img class="rotate-icon float-right height-1 img-icon"
                                                                       src="{{asset('img/red-drop.png')}}"
                                                                       id="collapsed-6-rotate">
                        </h6>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse6" class="collapse" aria-labelledby="heading6">

                    @foreach($faqList as $faq)
                        @if($faq->type === 2)
                            <div id="faq_{{$faq->id}}">
                                <div class="d-flex my-1 p-1">
                                    <img src="{{asset('img/question.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <h6 class="text-medium">{{$faq->question}}</h6>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 p-1">
                                    <img src="{{asset('img/answer.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <p class="text-small line-clamp">{{$faq->answer}}</p>
                                    </div>
                                </div>

                                <div class="card-header pt-0" id="heading-answer-1">

                                    <a class="collapsed " data-toggle="collapse" href="#collapse-answer-1"
                                       aria-expanded="false" aria-controls="collapse-answer-1" id="collapsed-prefecture"
                                       name="collapsed" relate-icon="collapsed-answer-1-rotate">

                                        <div class="d-flex justify-content-center"><img
                                                class="rotate-icon height-1 img-icon whole_text_show"
                                                src="{{asset('img/red-drop-1.png')}}"
                                                id="collapsed-2-rotate"></div>
                                    </a>
                                </div>

                                <!-- Card body -->
                                {{--                                    <div id="collapse-answer-1" class="collapse" aria-labelledby="heading-answer-1">--}}
                                {{--                                        <div class="text-break">...</div>--}}
                                {{--                                    </div>--}}
                            </div>
                        @endif
                    @endforeach

                </div>
                <!-- Card body -->
            </div>
            <div class="card-body px-0 pt-0 d-none">
                <div class="card-header background-other-pink p-1 px-3" id="heading7">

                    <a class="collapsed" data-toggle="collapse" href="#collapse7"
                       aria-expanded="false" aria-controls="collapse7" id="collapsed-prefecture" name="collapsed"
                       relate-icon="collapsed-7-rotate">

                        <h6 class="mb-0 w-100 text-black text-medium-xs">
                            <?=$garden->garden_name;?> の給食･おやつについて<img class="rotate-icon float-right height-1 img-icon"
                                                                       src="{{asset('img/red-drop.png')}}"
                                                                       id="collapsed-7-rotate">
                        </h6>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse7" class="collapse" aria-labelledby="heading7">

                    @foreach($faqList as $faq)
                        @if($faq->type === 3)
                            <div id="faq_{{$faq->id}}">
                                <div class="d-flex my-1 p-1">
                                    <img src="{{asset('img/question.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <h6 class="text-medium">{{$faq->question}}</h6>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 p-1">
                                    <img src="{{asset('img/answer.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <p class="text-small line-clamp">{{$faq->answer}}</p>
                                    </div>
                                </div>

                                <div class="card-header pt-0" id="heading-answer-1">

                                    <a class="collapsed " data-toggle="collapse" href="#collapse-answer-1"
                                       aria-expanded="false" aria-controls="collapse-answer-1" id="collapsed-prefecture"
                                       name="collapsed" relate-icon="collapsed-answer-1-rotate">

                                        <div class="d-flex justify-content-center"><img
                                                class="rotate-icon height-1 img-icon whole_text_show"
                                                src="{{asset('img/red-drop-1.png')}}"
                                                id="collapsed-2-rotate"></div>
                                    </a>
                                </div>

                                <!-- Card body -->
                                {{--                                    <div id="collapse-answer-1" class="collapse" aria-labelledby="heading-answer-1">--}}
                                {{--                                        <div class="text-break">...</div>--}}
                                {{--                                    </div>--}}
                            </div>
                        @endif
                    @endforeach

                </div>

                <!-- Card body -->


            </div>
            <div class="card-body px-0 pt-0 d-none">
                <div class="card-header background-other-pink p-1 px-3" id="heading8">

                    <a class="collapsed" data-toggle="collapse" href="#collapse8"
                       aria-expanded="false" aria-controls="collapse8" id="collapsed-prefecture" name="collapsed"
                       relate-icon="collapsed-8-rotate">

                        <h6 class="mb-0 w-100 text-black text-medium-xs">
                            <?=$garden->garden_name;?> の給食･おやつについて<img class="rotate-icon float-right height-1 img-icon"
                                                                       src="{{asset('img/red-drop.png')}}"
                                                                       id="collapsed-8-rotate">
                        </h6>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse8" class="collapse" aria-labelledby="heading8">

                    @foreach($faqList as $faq)
                        @if($faq->type === 2)
                            <div id="faq_{{$faq->id}}">
                                <div class="d-flex my-1 p-1">
                                    <img src="{{asset('img/question.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <h6 class="text-medium">{{$faq->question}}</h6>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 p-1">
                                    <img src="{{asset('img/answer.png')}}" class="avatar">
                                    <div class="ml-1">
                                        <p class="text-small line-clamp">{{$faq->answer}}</p>
                                    </div>
                                </div>

                                <div class="card-header pt-0" id="heading-answer-1">

                                    <a class="collapsed " data-toggle="collapse" href="#collapse-answer-1"
                                       aria-expanded="false" aria-controls="collapse-answer-1" id="collapsed-prefecture"
                                       name="collapsed" relate-icon="collapsed-answer-1-rotate">

                                        <div class="d-flex justify-content-center"><img
                                                class="rotate-icon height-1 img-icon whole_text_show"
                                                src="{{asset('img/red-drop-1.png')}}"
                                                id="collapsed-2-rotate"></div>
                                    </a>
                                </div>

                                <!-- Card body -->
                                {{--                                    <div id="collapse-answer-1" class="collapse" aria-labelledby="heading-answer-1">--}}
                                {{--                                        <div class="text-break">...</div>--}}
                                {{--                                    </div>--}}
                            </div>
                        @endif
                    @endforeach

                </div>

                <!-- Card body -->


            </div>
        @endif


@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 0rem !important;  margin-top: -40px">

        <div class="card-body background-opacity">

            <img src="{{asset('img/top.png')}}" class="img-top" id="move_garden" style="bottom: 2rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: 2rem">
        </div>
        <div class="card-body p-0 modal-call-body">
            <div class=" d-flex modal-call justify-content-center" style="cursor: pointer;" data-toggle="modal" data-target="#modalCall">
                <img src="{{asset('img/call.png')}}">
                <p class="text-title-large">電話をかける</p>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
                <div class="modal-body py-0">
                    <div class="text-center modal-call-title pt-3 px-3">
                        ｢咲楽(さくら)コドモアを見た｣と<br>
                        お伝えください
                    </div>
                    <div class="row border py-3 modal-call-number">
                        <p class="text-center w-100">{{$garden -> mobile}}</p>
                    </div>
                    <div class="row  modal-call-text">
                        <div class="col-6 py-2 text-center border-right" style="cursor: pointer;" data-dismiss="modal">
                            キャンセル
                        </div>
                        <a href="tel:{{$garden -> mobile}}" class="col-6 py-2 text-center modal-call-text">
                            発信
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalChild" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content modal-children">
                <div class="modal-body">
                    <div class="modal-children-title">
                        <p>2020/00/00</p>
                        <p>00:00~</p>
                        <p class="children-title">イベント名が入ります〇〇...</p>
                    </div>

                    <div class="d-flex mt-3">
                        <select class="custom-select custom-select-sm form-control form-control-sm ml-3 w-25">
                            <option selected>00月00日</option>

                        </select>
                        <select class="custom-select custom-select-sm form-control form-control-sm ml-3 w-25">
                            <option selected>11:00〜</option>
                        </select>
                    </div>

                    <div class="top-menu row mt-3">お申し込み情報</div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="保護者お名前(例：山田 太郎)">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="保護者ふりがな(例：やまだ たろう)">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="入園希望のお子様のお名前(例：山田 花子)">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="入園希望のお子様のふりがな(例：やまだ はなこ)">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>


                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="都道府県市区町村">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="町名･番地･建物名">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="メールアドレス[半角英数字]">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center ml-3 mr-3">
                        <input class="form-control col-7 pl-0" placeholder="電話番号(携帯電話可)(例09012345678)">
                        <div class="col-5 pr-0 text-center">
                            <p class="require">必須</p>
                        </div>
                    </div>

                    <div class="flex ">

                        <button class="btn btn-outline-default btn-rounded waves-effect btn-full"
                                data-dismiss="modal">送信する
                        </button>
                        <i class="fas fa-angle-left ml-1"></i>

                    </div>
                    <div style="position: relative; margin-top: 2rem"><img src="{{asset('img/top.png')}}"
                                                                           class="img-top"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection
@section('js4event')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="{{ asset('js/hes-gallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <script language="javascript" type="text/javascript">
        var currentPage = 1;
        var home_path;
        var loop_title = ['正式名称', '住所', '電話', 'HP', '設立', '系列園･校', '定員', '保育対象年齢', '預かり時間', '休園日', '費用', '入園について', '進路']
        var loop_name = ['public_name', 'address_area', 'phone_area', 'url_area', 'time_area', 'rel_area', 'member_area', 'target_area', 'shift_area', 'noshift_area', 'price_area', 'enter_area', 'graduate_area']

        var option = {

            title: {
                text: ''
            },
            tooltip: {},
            legend: {
                data:''
            },
            color: '#31BCC7',
            radar: {
                // shape: 'circle',
                radius: '65%',
                name: {
                    textStyle: {
                        color: '#4D4D4D',
                    }
                },
                splitArea: {

            },
                indicator: [
                    { name: '部活や課外レッスンの充実度\n' +
                            $('#rate8').val(), max: 5},
                    { name: '生徒の\n進路満足度\n' +
                            $('#rate7').val(), max: 5},
                    { name: '校風\nの良さ\n' +
                            $('#rate6').val(), max: 5},
                    { name: 'いじめ対策\n' +
                            $('#rate5').val(), max: 5},
                    { name: '保護者との連携充実度\n' +
                            $('#rate4').val(), max: 5},
                    { name: '全体的な\n講師の質\n' +
                            $('#rate3').val(), max: 5},
                    { name: '授業の\n工夫度\n' +
                            $('#rate2').val(), max: 5},
                    { name: 'ICT導入度\n' +
                            $('#rate1').val(), max: 5},
                ],


            },
            series: [{
                name: '',
                type: 'radar',

                emphasis: {
                    lineStyle: {
                        width: 0
                    }
                },
                // areaStyle: {normal: {}},
                data: [
                    {
                        value: [$('#rate8').val(), $('#rate7').val(), $('#rate6').val(), $('#rate5').val(), $('#rate4').val(), $('#rate3').val(), $('#rate2').val(), $('#rate1').val()],
                        name: '',
                        symbol: '',
                        symbolSize: 5,
                        areaStyle: {

                            color: 'rgba(49, 188, 199, 0.2)'
                        }
                    },

                ]
            }]
        };

        function getPhotoList(is_move) {
            console.log(is_move);

           var token = $("meta[name='_csrf']").attr("content");

            var garden_id = $("#garden_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            $(document).on('click', '#photo_detail', function () {
                $(this).next().removeClass('d-none');
                $(this).addClass('d-none');
            })

            home_path = $("#home_path").val();


            var url = home_path + '/ajax/photo-list';
            console.log(url);
            $.ajax({
                url:url,
                type:'post',
                data: {
                    garden_id : garden_id,
                    currentPage: currentPage,
                },
                success: function (response) {
                    $("#photoList").html(response);
                    if(is_move == true) {

                        $('html, body').animate({
                            scrollTop: $("#btn_search").offset().top - $("#top_header").height() - 20
                        });
                    }

                },
                error: function () {
                }
            });
        }
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
        $(document).ready(function () {

            $(document).on('click', '.rotate-icon', function () {
                if ($(this).prev().hasClass('line-clamp1')) {
                    $(this).prev().removeClass('line-clamp1')
                } else {
                    $(this).prev().addClass('line-clamp1')
                }
                // if ($(this).hasClass('rotate')) {
                //     $(this).removeClass('rotate');
                // } else {
                //     $(this).addClass('rotate');
                // }
            });


            // var page = $('#loop_slide');
            // var last_pane = page.find('.articles-info')
            // last_pane = last_pane[last_pane.length-1];
            // $('#loop_slide').on('onscroll', function () {
            //     var y = document.body.getBoundingClientRect().width;

            //     console.log(y)

                // // Looping Scroll.
                // var diff = window.scrollY - dummy_x;
                // if (diff > 0) {
                //     window.scrollTo(0, diff);
                // }
                // else if (window.scrollY == 0) {
                //     window.scrollTo(0, dummy_x);
                // }
            //})
            var page = document.getElementById('loop_slide');
            var last_pane = page.getElementsByClassName('articles-info');
            last_pane = last_pane[last_pane.length-1];
            var dummy_x = null;
            var win_width = page.getBoundingClientRect().width;
            var win_fix = win_width;
            var scroll_width = page.scrollWidth
            var timer = null;
            page.onscroll = function () {
                var y = page.scrollLeft;
                if(timer !== null) {
                    clearTimeout(timer);
                }
                timer = setTimeout(function() {
                    console.log("stop");
                    var al = false
                    $('.articles-info').each(function(index){

                        var el_left = $(this)[0].offsetLeft;
                        console.log(el_left);
                        if(el_left>=y+win_width/2-100){

                            if(al == false){
                                console.log(y+win_width/2-50);
                                $(this).trigger('click');
                            }

                            al = true;

                        }
                    })
                }, 150);


                // Horizontal Scroll.



                if(y+win_width == scroll_width){
                    console.log(y);
                    for(var i = 0; i < loop_title.length; i++){
                        var content = '<div class="card articles-info mr-3 background-transparent"><a class="text-white" name="'+ loop_name[i] + '" href="#'+loop_name[i]+'">'+ loop_title[i] + '</a></div>';

                        $(this).append(content);
                    }
                    scroll_width = page.scrollWidth;
                }
                if(y==0){
                    console.log(y);
                    for(var i = 0; i < loop_title.length; i++){
                        var content = '<div class="card articles-info mr-3 background-transparent"><a class="text-white" name="'+ loop_name[loop_title.length - i -1] + '" href="#' + loop_name[loop_title.length - i -1] + '">'+ loop_title[loop_title.length - i -1] + '</a></div>';

                        $('#loop_slide').prepend(content);
                    }
                    scroll_width = page.scrollWidth;
                    page.scrollLeft=win_fix;
                }
                // page.scrollLeft = -y;
                //
                // Looping Scroll.
                // var diff = page.scrollY - dummy_x;
                // if (diff > 0) {
                //     page.scrollTo(0, diff);
                // }
                // else if (page.scrollY == 0) {
                //     page.scrollTo(0, dummy_x);
                // }
            }
// //Adjust the body height if the window resizes.
//             page.onresize = resize;
// //Initial resize.
//             resize();
//
// //Reset window-based vars
//             function resize() {
//                 var w = page.scrollWidth-page.innerWidth;
//                 page.style.width = w + 'px';
//
//                 dummy_x = last_pane.getBoundingClientRect().left+page.scrollX;
//             }

            $(document).on('click', '.articles-info', function () {
                console.log($(this).find('a')[0].name);
                $(".articles-info").each(function( index ) {
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                window.location.href = '#' + $(this).find('a')[0].name
            })

            var map_set = $('#map_setting_val').val();
            if(map_set == 1){
                var map_iframe = $('#map_iframe_val').val()
                $('#map-container-google-2').append(map_iframe);
            }



            getPhotoList(true);

            //口コミレビューグラフ表示する時にコメントイン
            // var myChart = echarts.init(document.getElementById('webChart'));
            // myChart.setOption(option);
            //ここまで

            var home_path = $("#home_path").val();
            var default_img_path = $("#default_image_path").val();

            var today = new Date();
            var dd = today.getDate();

            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var date = yyyy + "/" + mm + "/" + dd;

            $('.more_detail').click(function () {
                $(this).next().removeClass('d-none')
                $(this).addClass('d-none');
            })

            $('#btn_more').click(function () {
                $('#all_review').removeClass('d-none')
                $(this).addClass('d-none');
            })

            $('span.star').click(function () {
                if(!$(this).hasClass('background-6')){
                    var review_id = $(this).parent().parent().next().val();
                console.log(review_id);
                var src = $(this).find('img')[0].src

                var src = $(this).find('img')[0].src
                    src = src.replace('circle', 'y-circle');
                    $(this).find('img')[0].src = src;
                var txt = $(this).find('label')[1].innerText;
                console.log($(this));
                var stars = parseInt(txt) + 1;
                $(this).find('label')[1].innerText = stars;
                $(this).removeClass('star');
                $(this).addClass('background-6');
                starAdd(review_id, 'attention');
                }


            })

            $('.help').click(function () {
                if(!$(this).hasClass('background-6')){

                    var review_id = $(this).parent().parent().next().val();
                var src = $(this).find('img')[0].src

                src = src.replace('light', 'y-light');
                console.log(src);
                $(this).find('img')[0].src = src;
                var txt = $(this).find('label')[1].innerText;
                console.log($(this));
                var stars = parseInt(txt) + 1;
                $(this).find('label')[1].innerText = stars;
                $(this).removeClass('help');
                $(this).addClass('background-6');
                starAdd(review_id, 'help');
                }


            })

            $('.forbidden').click(function () {

                var review_id = $(this).parent().parent().parent().next().val();
                var src = $(this).find('img')[0].src

                src = src.replace('forbidden', 'gray-forbidden');
                console.log(src);
                $(this).find('img')[0].src = src;
                $(this).removeClass('forbidden');
                $(this).addClass('text-gray')

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


            $("p[name='school-detail']").click(function (event) {
                event.preventDefault();
                var garden_id = $("#garden_id").val();
                var super_user = $('#super_user').val();

                if (garden_id > 0) {
                    if(super_user === 'true'){
                        $.ajaxSetup({
                            headers:
                                {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                        });

                        $.ajax({
                            url: home_path + '/ajax/save/garden',
                            method: 'post',
                            dataType: 'json',
                            data: {
                                'garden_id' : garden_id,
                            },
                            success: function (resp) {
                                window.location.href = home_path + '/admin/school/detail';
                            },
                            error: function (error) {

                            }
                        })
                    }
                    else{
                        window.location.href = home_path + '/school/modify_from/' + garden_id;
                    }

                }
            });
            $('.whole_text_show').on('click', function () {
                if ($(this).parent().parent().parent().prev().find('p').hasClass('line-clamp')) {
                    $(this).parent().parent().parent().prev().find('p').removeClass('line-clamp')
                } else {
                    $(this).parent().parent().parent().prev().find('p').addClass('line-clamp')
                }
                if ($(this).hasClass('rotate')) {
                    $(this).removeClass('rotate');
                } else {
                    $(this).addClass('rotate');
                }

            })
            $("#cur_date").text(date);
            $("#move_garden").click(function (event) {
                //window.history.back();
                window.location.href = home_path + '/garden';
            });

            $("#icon_move_home").click(function (event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });

            $("#hg-subtext").addClass("text-small");


            $("#hg-howmany").addClass("text-medium-xs");

            $(".category").click(function (event) {
                if (!$(this).hasClass("disable")) {
                    $(".category").each(function (index) {
                        $(this).removeClass('active');
                    })
                    $(this).addClass('active');
                }
            });

            $(document).on('click', '.favourite_img', function () {
                var status = $(this)[0].getAttribute('data-status');
                var img_url;
                var originalIndex = $(this)[0].getAttribute('data-id');
                var currentStatus;
                if (status == '1') {
                    img_url = default_img_path + "/unfavourite.png";
                    currentStatus = '0';
                } else {
                    img_url = default_img_path + "/favourite.png";
                    currentStatus = '1';
                }

                submitFormData(currentStatus, originalIndex);

                $(this).attr('src', img_url);
                $(this).attr('data-status', currentStatus);
            })

            $("#hg-top-image").click(function (event) {
                var index = HesGallery.currentImg;
                var originalIndex = HesGallery.galleries[HesGallery.currentGal].originalIndexs[index];
                var status = $("[data-index='" + originalIndex + "']").attr('data-status');
                var currentStatus;
                var img_url;
                if (status == '0') {
                    img_url = default_img_path + "/favourite.png";
                    currentStatus = '1';
                } else {
                    img_url = default_img_path + "/unfavourite.png";
                    currentStatus = '0';
                }

                submitFormData(currentStatus, originalIndex);

                $("[data-index='" + originalIndex + "']").attr('data-status', currentStatus);
                HesGallery.changeTopImage(index, img_url);
                $("#hg-top-image").attr('src', img_url);

            });

            function starAdd(review_id, type){
                $.ajaxSetup({
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    url: home_path + '/review/star',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        'type' : type,
                        'review_id': review_id,
                    },
                    success: function (resp) {

                    },
                    error: function (error) {
                        //alert(error);
                        alertify.error("更新失敗");

                        // window.location.reload();
                    }
                })

            }


            function submitFormData(favourite, image_id) {
                $.ajaxSetup({
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    url: home_path + '/school/favourite',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        'favourite': favourite,
                        'image_id': image_id,
                    },
                    success: function (resp) {
                        if (resp.status === 'login') {
                            alertify.success("ログインしてください｡");
                        } else {
                            //alertify.success("更新成功");
                        }


                    },
                    error: function (error) {
                        //alert(error);
                        //alertify.error("更新失敗");

                        // window.location.reload();
                    }


                })

            }

            $('#to_garden').click(function () {
                var url = home_path + '/garden';
                window.location.href = url;
            })


            $("#school_list").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var url = home_path + '/school/' + prefecture_id + '/list';
                window.location.href = url;
            });

            $('.to_type').click(function () {
                //window.location.href = home_path;
                var prefecture_id = $("#prefecture_id").val();

                var url = home_path + '/school/' + prefecture_id + '/list/' + $(this).text();
                console.log(url);
                window.location.href = url;
            })



            $("[name='school-detail']").click(function () {
                var garden_id = $("#garden_id").val();
                var url = home_path + '/admin/school/detail/' + garden_id;
                //window.location.href = url;
            });

            $("[name='type-detail']").click(function () {
                var id = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(id).offset().top - $("#top_header").height()
                });
            });


        });
    </script>
@endsection
