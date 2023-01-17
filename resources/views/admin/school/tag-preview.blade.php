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
            background-image: url("{{asset('img/detail-background2.png')}}");
            background-size: contain;
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
            background-color: #666666 !important;
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
        }

        .footer-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 27.5%;
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
            <p><span class="top-title-tag">{{$garden->prefecture_name}}の幼稚園､保育所</span> > <span
                    class="top-title-tag">園一覧</span>
                @foreach($garden -> typeList as $type)
                    > <span class="top-title-tag">{{$type->type_name}}</span>
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

        <div class="card-header text-left text-small mt-1">
            <span class="p-1" id="status" style="background-color: #FFFFC8">
                 @if($garden -> status == '応募受付中')
                    願書受付期間 {{$garden -> reception_date}}
                @else
                    {{$garden -> status}}
                @endif
            </span>
        </div>
        <div class="card-body py-0">
            <div class="d-flex flex-wrap mt-2" id="keywordList">
                @foreach($garden -> keywordList as $keyword)
                    @if($keyword->keyword_id == '10')
                        <div
                            class=" mr-3 mb-2 px-2 py-1 keyword-background-active text-small rounded rounded-small">
                            <?=$keyword->keyword_title;?>
                        </div>
                    @else
                        <div class=" mr-3 mb-2 px-2 py-1 keyword-background text-small rounded rounded-small">
                            <?=$keyword->keyword_title;?>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>

        <div class="card-body" id="notification">
            @foreach($noficationList as $nofi)
                @if(isset($nofi->type) && isset($nofi->content))
                    @if($nofi->type == '1')
                        <div class="justify-content-center text-center px-2 mb-2" style="border: 1px solid #ED1C24">
                            <p class="text-large text-left line-clamp1" style="color: #ED1C24">
                                {{$nofi->content}}
                            </p>
                            <img class="rotate-icon height-1 img-icon whole_text_show" src="{{asset('img/red-drop-1.png')}}">
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

        <div class="card-body py-1 text-center">
            <a class="mx-0 btn show-event py-1 text-medium text-white px-3" id="btn_login"
               href="">メディアにて紹介, 掲載された内容を見る </a>
        </div>

        <div class="card-body pt-0">
            <div class="row">
                <a class="col-4 mt-2 px-1" name="type-detail" href="#gallery">

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

                    <div class="rounded text-center category py-1 text-bold-menu" name="type">
                        先生のお話
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#review">

                    <div class="rounded text-center category background-gray py-1 text-bold-menu" name="type">
                        レビュー
                    </div>

                </a>
                <a class="col-4 mt-2 px-1" name="type-detail" href="#faq">

                    <div class="rounded text-center category py-1 text-bold-menu" name="type">
                        よくある質問FAQ
                    </div>

                </a>

            </div>
        </div>


        <div class="card-body py-1">
            <div class=" text-left text-medium-xs">
                <?=$garden->location;?>
            </div>
            <div class="d-flex flex-wrap mt-2" id="tag_preview">
            </div>
        </div>
        <div class=" d-flex card-body py-1 ">
            <div class="flex-1"></div>
            <p class="txt-detail text-medium-xs height-1 " name="school-detail">みんなで学校(園)情報を<span
                    class="text-pink">編集</span>する
            </p>
            <img class="height-1 img-icon" src="{{asset('img/gray_pencil.png')}}" name="school-detail">
        </div>

        <div class="card-body py-0">
            <hr class="dot-border">
            <div class=" text-medium-title p-1">
                <span class="menu-icon">◆</span><?=$garden->garden_name;?> のメインタイトル
            </div>
            <div class="text-title-large text-black"><?=$garden->comment_title;?></div>
            <hr class="dot-border">
            <div class="text-break text-medium-light "
                 style="text-align: justify"><?=$garden->comment_description;?></div>
        </div>

        <div class="card-body special-background">
            <div class="background-white p-2">
                <p class="text-medium" style="color: #FF557E">{{$garden->garden_name}}の特徴</p>
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-light"
                           id="check_original_1" checked>
                    <label class="custom-control-label text-medium-light text-black" for="check_original_1">この文章はダミーです｡文字の大きさ､量､行間等を確認するために入れています｡</label>
                </div>
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-light"
                           id="check_original_2" checked>
                    <label class="custom-control-label text-medium-light text-black" for="check_original_2">この文章はダミーです｡文字の大きさ､量､行間等を確認するために入れています｡</label>
                </div>
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-light"
                           id="check_original_3" checked>
                    <label class="custom-control-label text-medium-light text-black" for="check_original_3">この文章はダミーです｡文字の大きさ､量､行間等を確認するために入れています｡</label>
                </div>
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-light"
                           id="check_original_4" checked>
                    <label class="custom-control-label text-medium-light text-black" for="check_original_4">この文章はダミーです｡文字の大きさ､量､行間等を確認するために入れています｡</label>
                </div>
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-light"
                           id="check_original_5" checked>
                    <label class="custom-control-label text-medium-light text-black" for="check_original_5">この文章はダミーです｡文字の大きさ､量､行間等を確認するために入れています｡</label>
                </div>
            </div>
            <div class="p-2">
                <div class="text-medium-title mt-2">
                    目次
                </div>

                <div>
                    <a class="text-medium-title mt-1 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の制服やオリジナルアイテム</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の教育方針</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の預かり時間</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の入園などに関する費用</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> の入園について</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> のクチコミレビュー</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> からのメッセージ</span>
                    </a>
                </div>

                <div>
                    <a class="text-medium-title mt-2 text-3" href="#">
                        <span class="menu-icon">◆</span><span class="text-decoration"><?=$garden->garden_name;?> のPhoto Gallery</span>
                    </a>
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
            <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
            <script type="text/javascript" src="{{ asset('js/hes-gallery.js') }}"></script>
            <script language="javascript" type="text/javascript">
                var currentPage = 1;
                var home_path;

                $(document).ready(function () {
                    var garden_info = JSON.parse(localStorage.getItem("tag_garden"));


                    for(var i = 0; i < garden_info.length; i++){
                        var content = '<div class=" mr-3 mb-2 position-relative">\n' +
                            '                        <div class="title-background py-1 px-2">\n' +
                            '                            <div class=" tag-info text-small">'+ garden_info[i] + '</div>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        $('#tag_preview').append(content);
                    }
                    var home_path = $("#home_path").val();
                    var default_img_path = $("#default_image_path").val();

                    var today = new Date();
                    var dd = today.getDate();

                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();
                    var date = yyyy + "/" + mm + "/" + dd;

                    $("#cur_date").text(date);

                    $("#hg-subtext").addClass("text-small");


                    $("#hg-howmany").addClass("text-medium-xs");

                    $(document).on('click', '.rotate-icon', function () {
                        if ($(this).prev().hasClass('line-clamp1')) {
                            $(this).prev().removeClass('line-clamp1')
                        } else {
                            $(this).prev().addClass('line-clamp1')
                        }
                        if ($(this).hasClass('rotate')) {
                            $(this).removeClass('rotate');
                        } else {
                            $(this).addClass('rotate');
                        }
                    })


                });
            </script>
@endsection
