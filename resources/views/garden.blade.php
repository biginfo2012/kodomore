@extends('layouts.app')

@section('title')
    岐阜･愛知の幼稚園･保育所 入園情報
@endsection



@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <link rel="stylesheet" href="{{ asset('css/garden.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <style>

        html {
            font-size: 100% !important;
        }
        /* .carousel {
  position: relative;
}

.carousel.pointer-event {
  -ms-touch-action: pan-y;
  touch-action: pan-y;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-inner::after {
  display: block;
  clear: both;
  content: "";
}

.carousel-item {
  position: relative;
  display: none;
  float: left;
  width: 100%;
  margin-right: -100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: -webkit-transform 0.6s ease-in-out;
  transition: transform 0.6s ease-in-out;
  transition: transform 0.6s ease-in-out, -webkit-transform 0.6s ease-in-out;
}

.carousel-item-next, .carousel-item-prev, .carousel-item.active {
    display: block;
    transition: -webkit-transform .6s ease !important;
    transition: transform .6s ease !important;
    transition: transform .6s ease,-webkit-transform .6s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-item {
    transition: none;
  }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

.carousel-item-next:not(.carousel-item-left),
.active.carousel-item-right {
    -webkit-transform: translate3d(0, 0, 0);
  -webkit-transform: translateX(100vw);
  transform: translateX(100vw);
}

.carousel-item-prev:not(.carousel-item-right),
.active.carousel-item-left {
    -webkit-transform: translate3d(0, 0, 0);
  -webkit-transform: translateX(-100vw);
  transform: translateX(-100vw);
}

.carousel-fade .carousel-item {
  opacity: 0;
  transition-property: opacity;
  -webkit-transform: none;
  transform: none;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
  z-index: 1;
  opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
  z-index: 0;
  opacity: 0;
  transition: opacity 0s 6s;
} */

@media (prefers-reduced-motion: reduce) {
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    transition: none;
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 1;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: 0.5;
  transition: opacity 0.15s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-control-prev,
  .carousel-control-next {
    transition: none;
  }
}

.carousel-control-prev:hover, .carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: 0.9;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: no-repeat 50% / 100% 100%;
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 15;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
  justify-content: center;
  padding-left: 0;
  margin-right: 20%;
  margin-left: 20%;
  list-style: none;
}

a:focus, a:hover{
    text-decoration: none !important;
}

.carousel-indicators li {
  box-sizing: content-box;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #fff;
  background-clip: padding-box;
  opacity: .5;
  transition: opacity 0.6s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-indicators li {
    transition: none;
  }
}

.carousel-indicators .active {
  opacity: 1;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}

        .top-badge {
            position: absolute;
            right: 0px;
            bottom: 0px;
            width: 8em;
        }



        .txt-small-date {
            font-size: 11px;
            color: #cdcdcd;
            font-family: "Times New Roman"
        }





        #move_news {
            font-size: 0.7rem;
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }

        #collapsed-prefecture-rotate {
            font-size: 2rem;
            color: #cdcdcd;
        }

        .areabox{
            cursor:pointer !important;
        }
        .select-provin{
            cursor: pointer !important;
        }
        @media (min-width: 320px) {
            .drop-down {
                width: unset;
                height: 1.25rem;
                min-width: .1rem;
            }

            .areabox-title > img {
                width: unset;
                height: .6rem;
                min-width: .1rem;
            }

            .areabox {
                background-color: #EAEAEA;
                position: absolute;
                padding: .25rem .4rem;
                border: 2px solid #DEDEDE;
                border-radius: .25rem;
            }

            .area-dot-line.height {
                width: 2px;
            }

            .area-dot-line.width {
                background-image: url("{{asset('img/border_width.png')}}");
                height: 2px;
            }
        }

        @media (max-width: 375px) and (min-width: 321px){
            .drop-down {
                width: unset;
                height: 1.25rem;
                min-width: .1rem;
            }

            .areabox-title > img {
                width: unset;
                height: .8rem;
                min-width: .1rem;
            }

            .areabox {
                background-color: #EAEAEA;
                position: absolute;
                padding: .35rem .5rem;
                border: 2px solid #DEDEDE;
                border-radius: .35rem;
            }

            .area-dot-line.height {
                width: 3px;
            }

            .area-dot-line.width {
                background-image: url("{{asset('img/border_width.png')}}");
                height: 3px;
            }
        }

        @media (max-width: 505px) and (min-width: 436px) {
            .areabox-title {
                font-size: 20px !important;;
            }

            .areabox-list {
                font-size: 15px !important;
            }
        }

        @media (max-width: 575px) and (min-width: 506px) {
            .areabox-title {
                font-size: 22px !important;;
            }

            .areabox-list {
                font-size: 16px !important;
            }
        }



        @media (max-width: 575px) and (min-width: 376px) {
            .drop-down {
                width: unset;
                height: 1.25rem;
                min-width: .1rem;
            }

            .areabox-title > img {
                width: unset;
                height: .8rem;
                min-width: .1rem;
            }

            .areabox {
                background-color: #EAEAEA;
                position: absolute;
                padding: .5rem .75rem;
                border: 2px solid #DEDEDE;
                border-radius: .5rem;
            }

            .area-dot-line.height {
                width: 4px;
            }

            .area-dot-line.width {
                background-image: url("{{asset('img/border_width.png')}}");
                height: 4px;
            }


        }

        @media (max-width: 767px) and (min-width: 576px){
            .drop-down {
                width: unset;
                height: 1.875rem;
                min-width: .1rem;
            }

            .areabox-title > img {
                width: unset;
                height: 1.2rem;
                min-width: .1rem;
            }

            .areabox {
                background-color: #EAEAEA;
                position: absolute;
                padding: .75rem 1rem;
                border: 2px solid #DEDEDE;
                border-radius: .5rem;
            }

            .area-dot-line.height {
                width: 6px;
            }

            .area-dot-line.width {
                background-image: url("{{asset('img/border_width.png')}}");
                height: 6px;
            }
        }

        @media (min-width: 768px) {
            .drop-down {
                width: unset;
                height: 2.5rem;
                min-width: .1rem;
            }

            .areabox-title > img {
                width: unset;
                height: 1.6rem;
                min-width: .1rem;
            }

            .areabox {
                background-color: #EAEAEA;
                position: absolute;
                padding: 1rem 1rem;
                border: 2px solid #DEDEDE;
                border-radius: .5rem;
            }

            .area-dot-line.height {
                width: 8px;
            }

            .area-dot-line.width {
                background-image: url("{{asset('img/border_width.png')}}");
                height: 8px;
            }
        }

        .garden-top-image{
            position:relative;
            overflow:hidden;
            padding-bottom:75%;
        }
        .garden-top-image img{
            height: 100%;
            object-fit: cover;
            position:absolute;
        }


        .areamap_monthly_background.js-areamap_monthly_background--06 {

        }
        .areamap_monthly_background {
            position: relative;
        }

        .areabox.areabox--hokkaido {
            left: 50%;
            top: 8%;
        }

        .areabox.areabox--tohoku {
            right: 0;
            top: 33%;
        }

        .areabox.areabox--hokuriku {
            left: 33%;
            top: 30%;
        }

        .areabox.areabox--kanto {
            right: 0;
            top: 63%;
        }

        .areabox.areabox--tokai {
            background-color: #FFFCDB;
            border: 2px solid #CBE2A9;
            left: 62%;
            bottom: -8%;
        }

        .areabox.areabox--chugoku {
            top: 50%;
            left: 11%;
        }

        .areabox.areabox--kansai {
            bottom: -8%;
            left: 36%;
        }

        .areabox.areabox--sikoku {
            bottom: -8%;
            left: 12%;
        }

        .areabox.areabox--kyushu {
            top: 25%;
            left: 0;
        }


        .areabox .areabox-title {

            color: #C4C4C4;
            line-height: 1.5;
        }

        .areabox .areabox-list {
            color: #C4C4C4;

            line-height: 1.2;

        }

        .areabox.active {
            background-color: #ECF2B9 !important;
            border: 2px solid #CBE2A9;

        }



        .area-dot-line {
            position: absolute;

            background-size: cover;
            background-image: url("{{asset('img/border.png')}}");
        }

        .active .area-dot-line {

            {{--background-image: url("{{asset('img/border_active.png')}}");--}}
        }

        .active .area-dot-line.width {
            {{--background-image: url("{{asset('img/border_width_active.png')}}");--}}
        }



        .active .areabox-title {
            /*color: #323333;*/
            color: #C4C4C4;
        }

        .active .areabox-list {
            /*color: #666666;*/
            color: #C4C4C4;
        }

        .transform {
            transform: rotate(-45deg);
        }

        @media (max-width: 575px) {
            .py-sm-3.py-2 {
                padding-top: .75rem !important;
                padding-bottom: .75rem !important;
            }
        }

        .select-provin:active{
            background: #D6F2F4 !important;
        }


        .news-flower1 {
            position: absolute;
            top: 10px; right: 15px;
            z-index: 100
        }

        .articles-info{
            min-width: 85% !important;
        }
        .news-info{
            min-width: 40% !important;
        }

        #move_news {
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }
        #move_articles {
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }

        .text-outline-add-thick{
            text-shadow: 0.0px 2.5px 0.01px #fff, 2.5px 0.5px 0.01px #fff, 1.1px -2.2px 0.01px #fff, -2.0px -1.5px 0.01px #fff, -1.9px 1.6px 0.01px #fff, 1.2px 2.2px 0.01px #fff, 2.4px -0.7px 0.01px #fff, -0.1px -2.5px 0.01px #fff, -2.5px -0.75px 0.01px #fff, -0.85px 2.3px 0.01px #fff, 2.1px 1.3px 0.01px #fff, 1.7px -1.7px 0.01px #fff, -1.3px -2.1px 0.01px #fff, -2.3px 0.85px 0.01px #fff, 0.35px 2.5px 0.01px #fff, 2.5px 0.2px 0.01px #fff, 0.7px -2.4px 0.01px #fff, -2.1px -1.2px 0.01px #fff, -1.6px 1.8px 0.01px #fff, 1.4px 2.0px 0.01px #fff, 2.2px -1.0px 0.01px #fff, -0.6px -2.4px 0.01px #fff, -2.5px -0.02px 0.01px #fff, -0.6px 2.4px 0.01px #fff, 2.1px 1.1px 0.01px #fff, 1.5px -2.0px 0.01px #fff, -1.6px -1.9px 0.01px #fff, -2.2px 1.1px 0.01px #fff, 0.7px 2.4px 0.01px #fff, 2.5px -0.2px 0.01px #fff, 0.35px -2.4px 0.01px #fff, -2.3px -0.9px 0.01px #fff, -1.3px 2.2px 0.01px #fff, 1.6px 1.8px 0.01px #fff, 2.3px -1.6px 0.01px #fff, -0.8px -2.4px 0.01px #fff, -2.4px 0.3px 0.01px #fff, -0.2px 2.5px 0.01px #fff, 2.4px 0.75px 0.01px #fff, 1.2px -2.1px 0.01px #fff, -1.9px -1.6px 0.01px #fff, -2.1px 1.5px 0.01px #fff, 1.0px 2.3px 0.01px #fff, 2.4px -0.5px 0.01px #fff, 0.1px -2.5px 0.01px #fff, -2.4px -0.6px 0.01px #fff, -1.1px 2.3px 0.01px #fff, 1.9px 1.6px 0.01px #fff

        }

        .text-outline-area{
            position: absolute;
            z-index: 1;
            width: 100px;
            height: 30px;
            border-radius: 0.4rem;
            top: calc(50% + 4px);
            left: calc(50% - 50px);
            background: white;
            opacity: 0.7;
        }

        @media (max-width: 575px) and (min-width: 376px){
            .height-1 {
                height: 1.5rem;
                min-width: .1rem;
            }




        }


        .carousel-control.right{
            background-image: none !important;
        }
        .carousel-control.left{
            background-image: none !important;
        }

        .row::before, .row::after {
            display: flex !important;;
        }



    </style>
@endsection

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="garden-top-image"><img class="d-block w-100" src="{{asset('img/C14_14855_1.jpg')}}"
            alt="First slide"></div>

        <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
            <div class="float-right  d-flex" style="margin-right: .5rem">
                <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> Clematis -クレマティス-</p>
            </div>
        </div>
        <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
            <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
        </div>
      </div>

      <div class="item">
        <div class="garden-top-image">
            <img class="d-block w-100" src="{{asset('img/こばとGL1506_318_1.jpg')}}"
                 alt="First slide">
        </div>

        <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
            <div class="float-right  d-flex" style="margin-right: .5rem">
                <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> こばと第３幼稚園 公式サイトより</p>
            </div>


        </div>
        <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
            <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
        </div>
      </div>

      <div class="item">
        <div class="garden-top-image">
            <img class="d-block w-100" src="{{asset('img/kirakiraGC1804_3908_1.jpg')}}"
                 alt="First slide">
        </div>

        <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
            <div class="float-right  d-flex" style="margin-right: .5rem">
                <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> まどか幼稚園(咲楽編集部キラキラキッズ)</p>
            </div>
        </div>
        <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
            <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="garden-top-image"><img class="d-block w-100" src="{{asset('img/C14_14855_1.jpg')}}"
                                                   alt="First slide"></div>

                <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
                    <div class="float-right  d-flex" style="margin-right: .5rem">
                        <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> Clematis -クレマティス-</p>
                    </div>
                </div>
                <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
                    <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="garden-top-image">
                    <img class="d-block w-100" src="{{asset('img/こばとGL1506_318_1.jpg')}}"
                         alt="First slide">
                </div>

                <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
                    <div class="float-right  d-flex" style="margin-right: .5rem">
                        <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> こばと第３幼稚園 公式サイトより</p>
                    </div>


                </div>
                <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
                    <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
                </div>
            </div>

            <div class="carousel-item ">
                <div class="garden-top-image">
                    <img class="d-block w-100" src="{{asset('img/kirakiraGC1804_3908_1.jpg')}}"
                         alt="First slide">
                </div>

                <div class="text-small-xs text-white w-100" style="position: absolute; bottom: .25rem; ">
                    <div class="float-right  d-flex" style="margin-right: .5rem">
                        <img class="img-icon height-1" src="{{asset('img/capture.png')}}"> <p class="hit-the-floor "> まどか幼稚園(咲楽編集部キラキラキッズ)</p>
                    </div>
                </div>
                <div class="text-small-xs text-white px-2 w-100 " style="position: absolute; top: .25rem; ">
                    <p class="hit-the-floor ">コドモアは咲楽(さくら)編集部が運営しています</p>
                </div>
            </div>



        </div>



    </div> --}}

    <div class="card">
        <div class="card-header text-title">
            <i class="fas fa-map-marker-alt "></i> 全国の幼稚園､保育所<span class="text-normal-title">({{$count}}件)</span>
        </div>

        <div class="card-body pt-0 pb-4">
            <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 py-1 px-3 rounded rounded-1 border " style="display: none !important;">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-2 flex-1 text-small border-0 mb-0 py-2" type="text" placeholder="幼稚園名･保育所名､エリア､特徴などフリーワード検索"
                       aria-label="Search" id="garden_name">
            </div>
            <div id="js-areamap_monthly_background" class="areamap_monthly_background js-areamap_monthly_background--06" style="margin-bottom: 8%">
                <img src="{{asset('img/map/map-initial.png')}}" id="map_img">
                <div class="areabox areabox--hokkaido" map-id="5">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img id="location_5" class="mr-1" src="{{asset('img/location-disable.png')}}">北海道</div>
                    <div class="areabox-list text-small">北海道</div>

                    <div class="area-dot-line width" style="top: 25%; width: 30%; right: -30%"></div>
                </div>
                <div class="areabox areabox--tohoku" map-id="8">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img id="location_8" class="mr-1" src="{{asset('img/location-disable.png')}}">東北</div>
                    <div class="areabox-list text-small">
                        青森|岩手|秋田<br>宮城|山形|福島
                    </div>

                    <div class="area-dot-line height" style="bottom: -25%; height: 25%; left: 10%"></div>
                </div>
                <div class="areabox areabox--hokuriku" map-id="9">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_9" class="mr-1" src="{{asset('img/location-disable.png')}}">甲信越･北陸</div>
                    <div class="areabox-list text-small">
                        山梨|長野|新潟<br>富山|石川|福井
                    </div>

                    <div class="area-dot-line height" style="bottom: -100%; height: 100%; left: 40%"></div>
                </div>
                <div class="areabox areabox--kanto" map-id="3">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_3" class="mr-1" src="{{asset('img/location-disable.png')}}">関東</div>
                    <div class="areabox-list text-small">
                        東京|神奈川<br>千葉|埼玉|茨城<br>栃木|群馬
                    </div>

                    <div class="area-dot-line width" style="top: 25%; width: 20%; left: -20%"></div>
                </div>
                <div class="areabox areabox--tokai" map-id="1">

                    <div class="areabox-title d-flex align-items-center text-large-xs" style="color:#323333"><img  id="location_1" class="mr-1" src="{{asset('img/location-enable.png')}}">東海</div>
                    <div class="areabox-list text-small" style="color: #666666">
                        愛知|岐阜<br><span class="text-gray">静岡|</span><span class="text-gray">三重</span>
                    </div>

                    <div class="area-dot-line height transform" style="top: -108%; height: 120%; left: 0; background-image:url('{{asset('img/border_active.png')}}');"></div>
                </div>
                <div class="areabox areabox--chugoku" map-id="4">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_4" class="mr-1" src="{{asset('img/location-disable.png')}}">中国</div>
                    <div class="areabox-list text-small">
                        岡山|広島|鳥取<br>島根|山口<br>
                    </div>

                    <div class="area-dot-line height" style="bottom: -25%; height: 25%; left: 40%"></div>
                </div>
                <div class="areabox areabox--kansai" map-id="2">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_2" class="mr-1" src="{{asset('img/location-disable.png')}}">関西</div>
                    <div class="areabox-list text-small">
                        大阪|兵庫<br>京都|滋賀<br>奈良|和歌山
                    </div>

                    <div class="area-dot-line height" style="top: -25%; height: 25%; left: 20%"></div>
                </div>
                <div class="areabox areabox--sikoku" map-id="6">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_6" class="mr-1" src="{{asset('img/location-disable.png')}}">四国</div>
                    <div class="areabox-list text-small">
                        愛媛|香川<br>高知|徳島
                    </div>

                    <div class="area-dot-line height" style="top: -30%; height: 30%; left: 80%"></div>
                </div>
                <div class="areabox areabox--kyushu" map-id="7">

                    <div class="areabox-title d-flex align-items-center text-large-xs"><img  id="location_7" class="mr-1" src="{{asset('img/location-disable.png')}}">九州･沖縄</div>
                    <div class="areabox-list text-small">
                        福岡|佐賀|長崎<br>熊本|大分|宮崎<br>鹿児島|沖縄
                    </div>

                    <div class="area-dot-line height" style="bottom: -200%; height: 200%; left: 30%"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="accordion md-accordion d-none" id="prefecture_list" aria-multiselectable="false">

        <!-- Accordion card -->
        <div class="card">

            <!-- Card header -->
            <div class="card-header d-none" id="heading0" style="background-color: white">

                <a class="d-flex justify-content-center collapsed " data-toggle="collapse" href="#collapse0"
                   aria-expanded="false" aria-controls="collapse0" id="collapsed-prefecture" name="collapsed" relate-icon="collapsed-prefecture-rotate">
                    <img src="{{asset('img/down.png')}}" class="drop-down rotate" id="collapsed-prefecture-rotate">

                </a>
            </div>

            <!-- Card body -->
            <div id="collapse0" class="collapse show mb-4 mt-1" aria-labelledby="heading0">
                <div class="row border-top  ">
                    <div class="col-6 border-light">
                        <div class="py-sm-3 py-2  px-4 d-flex prefecture" prefecture-id="23">
                            <h6 class="my-0   flex-1 text-medium-xs">
                                東海エリア情報
                            </h6>
                        </div>

                    </div>
                </div>
                <div class="row border-top  border-bottom border-light">
                    <div class="col-6 border-light border-right pr-0">
                        <div class="py-sm-3 py-2  px-4 d-flex prefecture select-provin align-items-center" prefecture-id="23">
                            <h6 class="my-0 px-4  flex-1 text-medium-xs">
                                愛知県
                            </h6>
                            <img class="img-icon height-1" src="{{asset('img/active-next.png')}}">
                        </div>

                    </div>

                    <div class="col-6 border-light border-right">
                        <div class="py-sm-3 py-2  px-4 d-flex  align-items-center">
                            <h6 class="my-0 px-4  flex-1 text-gray text-medium-xs ">
                                静岡県
                            </h6>
                            <img class="img-icon height-1" src="{{asset('img/disable-next.png')}}">
                        </div>

                    </div>

                </div>

                <div class="row  border-bottom border-light">

                    <div class="col-6 border-light border-right pr-0">
                        <div class="py-sm-3 py-2 px-4 d-flex prefecture select-provin  align-items-center" prefecture-id="21">
                            <h6 class="my-0 px-4  flex-1 text-medium-xs ">
                                岐阜県
                            </h6>
                            <img class="img-icon height-1" src="{{asset('img/active-next.png')}}">
                        </div>

                    </div>

                    <div class="col-6 border-light border-right">
                        <div class="py-sm-3 py-2 px-4 d-flex  align-items-center">
                            <h6 class="my-0 px-4  flex-1 text-gray text-medium-xs ">
                                三重県
                            </h6>
                            <img class="img-icon height-1" src="{{asset('img/disable-next.png')}}">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="accordion md-accordion d-none" id="prefecture_list_other" aria-multiselectable="false">

        <!-- Accordion card -->
        <div class="card">

            <!-- Card header -->
            <div class="card-header d-none" id="heading0" style="background-color: white">

                <a class="d-flex justify-content-center collapsed " data-toggle="collapse" href="#collapse0"
                   aria-expanded="false" aria-controls="collapse0" id="collapsed-prefecture" name="collapsed" relate-icon="collapsed-prefecture-rotate">
                    <img src="{{asset('img/down.png')}}" class="drop-down rotate" id="collapsed-prefecture-rotate">

                </a>
            </div>

            <!-- Card body -->
            <div id="collapse0" class="collapse show mb-4 mt-1" aria-labelledby="heading0" >
                <div class="row border-top border-bottom position-relative">
                    <div class="col-8 border-light">
                        <div class="py-sm-3 py-2 px-4 d-flex prefecture" prefecture-id="23">
                            <h6 class="mb-0   flex-1 text-medium-xs">
                                東海
                            </h6>
                        </div>

                    </div>
                    <img src="{{asset('img/coming-soon.png')}}" class="position-absolute" style="height: 52px; top: -4px; width: auto; right: 20px;">
                </div>
            </div>
        </div>
    </div>

    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="accordionEx"  aria-multiselectable="false">

        <!-- Accordion card -->
        <div class="card" style="border-radius: 0">

            <!-- Card header -->
            <div class="card-header top-menu py-1" id="heading1">

                <a class="flex collapsed" data-toggle="collapse" href="#collapse1"
                   aria-expanded="false" aria-controls="collapse1" id="collapsed-home" name="collapsed" relate-icon="collapsed-home-rotate">
                    <img class="mr-2" src="{{asset('img/circle_home.png')}}" style="height: 2rem; width: auto;">
                    <h6 class="my-3 text-white w-100 text-large">
                        幼稚園•保育所•こども園どう選ぶ？
                    </h6>
                    <img class="width-1" src="{{asset('img/drop-down.png')}}" id="collapsed-home-rotate">
                </a>
            </div>

            <!-- Card body -->
            <div id="collapse1" class="collapse" aria-labelledby="heading1" >
                <div class="card-body text-normal pb-0">
                    <p>保育施設と一言で言っても<span class="text-pink">幼稚園</span>や<span class="text-pink">認可保育所､認定こども 園</span>などいくつかの種類があり､
                        <span class="text-pink">お子様の年齢</span>や<span class="text-pink">家庭における 保育環境</span>によっても入園できる施設は異なります｡
                        各施設の 特徴などを確認し､最適な施設を選びましょう｡</p>
                    <div class="flex mt-1 my-2 ">
                        <button class="mx-0 text-medium btn-blue-1 btn rounded btn-full" id="choose_school">詳しくはこちら </button>
                        <img class="height-1 img-icon ml-1 position-absolute" style="right: 1rem" src="{{asset('img/next.png')}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion card -->

        <!-- Accordion card -->
        <div class="card mt-3" style="border-radius: 0">

            <!-- Card header -->
            <div class="card-header top-menu py-1" id="heading2">
                <a class="flex collapsed " data-toggle="collapse"  href="#collapse2"
                   aria-expanded="false" aria-controls="collapse2" id="collapsed-file" name="collapsed" relate-icon="collapsed-file-rotate">
                    <img class="mr-2" src="{{asset('img/circle_file.png')}}" style="height: 2rem; width: auto;">

                    <h6 class="my-3 w-100 text-white text-large">
                        入園までの手続き
                    </h6>
                    <img class="width-1" src="{{asset('img/drop-down.png')}}" id="collapsed-file-rotate">
                </a>
            </div>

            <!-- Card body -->
            <div id="collapse2" class="collapse" aria-labelledby="heading2" >
                <div class="card-body text-normal pb-0">
                    <p>幼稚園､保育所､認定こども園などの保育施設へ入園する際 には<span class="text-pink">どのような手続き</span>
                        が必要なのでしょうか｡見学会への参加 や書類の手配､申込みなど､<span class="text-pink">施設の種別ごとに入園までの流 れ</span>を紹介します｡</p>
                    <div class="flex mt-1 my-2">
                        <button id="btn_procedure" class="mx-0 text-medium btn-blue-1 btn rounded btn-full">詳しくはこちら </button>
                        <img class="height-1 img-icon position-absolute" style="right: 1rem" src="{{asset('img/next.png')}}">
                    </div>

                </div>
            </div>

        </div>


    </div>

    <div class="accordion md-accordion mt-3 d-none" id="news_area" aria-multiselectable="false">

        <!-- Accordion card -->
        <div class="card ">
            <div class="card-body pb-0" style="border-top: 1px solid #808080">
                <img src="{{asset('img/news-title2.png')}}">
            </div>

            <div class="background-white position-relative">
                <img src="{{asset('img/music.png')}}" class="news-flower1 height-2 img-icon" style="height: 1.8rem !important;">
                <div class="card-body pb-1">
                    <p class="text-medium mb-0"><span class="menu-icon" style="font-size: 20px">★</span>東海の子育て記事</p>
                </div>
                <div class="card-body d-flex py-0" style="position:relative; overflow: auto;">
                    @foreach($articleList as $index => $article)

                            <div class="card articles-info mr-3 background-transparent">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <div class="radio-image radio-75-image media-articles" style="padding-bottom: 59% !important;" id="news_{{$article->id}}">
                                        <img class="card-img-top" style="border-radius: 0 !important;" src="{{asset('/storage/img/articles/'.$article->main_img)}}">
                                    </div>

                                </div>

                                <!-- Card content -->
                                <div class="card-body text-normal px-0 py-0">
                                    <p class="text-large-xs text-pink" style="color: #31BCC7 !important;">@if($article->is_new == true)<span class="px-1 text-pink border-pink text-small-xs-bold mr-2">新着</span>@endifニュース</p>
                                    <p class="text-medium line-clamp1" style="color: black !important;">{{$article->title}}
                                    </p>
                                    <p class="text-small line-clamp">{{$article->main_text}}</p>
                                    <p class="text-small-xs text-gray">{{str_replace('-', '/', $article->post_date)}}</p>

                                </div>

                            </div>
                    @endforeach
                </div>
                <div class="w-100 text-right mb-4"><a class="text-small text-blue-1 text-decoration "  id="move_articles">一覧を見る></a></div>
                <hr class="pb-0 mb-0">
            </div>

            <div class="background-dark-pink position-relative">
                <hr class="pt-0 mt-0 border-top">
                <img src="{{asset('img/butterfly.png')}}" class="news-flower-right height-3 img-icon position-absolute" style="right: 0; top: -.75rem">
                <div class="card-body pt-0 pb-2">
                    <p class="text-medium"><span class="menu-icon" style="font-size: 20px">★</span>子どもと読みたい最新ニュース</p>
                </div>
                <div class="card-body d-flex py-0" style="position:relative; overflow: auto">

                    @foreach($newsList as $index => $news)
                        <div class="card news-info mr-3 background-transparent">

                            <!-- Card image -->
                            <div class="view overlay">
                                <div class="radio-image radio-75-image {{$index > 3?'':'media-news'}} " id="news_{{$news->news_id}}">
                                    <img class="card-img-top" style="border-radius: 0 !important;" src="{{asset('/storage/img/news/'.$news->img)}}">
                                </div>
                            </div>
                            <!-- Card content -->
                            <div class="card-body text-normal px-0 py-1">
                                <p class="text-normal-title line-clamp" style="color: black !important;">@if($news->is_new == true)<span class="px-1 text-pink border-pink text-small">新着</span>@endif {{$news->title}}
                                </p>
                                <p class="text-small-xs text-gray">{{str_replace('-', '/', $news->created_at)}}</p>
                            </div>
                            @if($index > 3)
                            <div class="position-absolute text-center text-medium-title px-2 py-1" style="z-index: 10; border: 2px solid #FF557E; color: #FF557E; border-radius: 0.5rem; top: 52%; left: calc(50% - 52px)">

                                    <p class="text-outline-add-thick">終了しました</p>


                                </div>
                                <div class="text-outline-area"></div>
                                <!-- <div class="position-absolute text-center background-white text-small-xs-bold px-4 py-1" style="z-index: 3; opacity: 0.8; border: 2px solid #FF557E; color: #FF557E; border-radius: 0.5rem; top: 52%; left: calc(50% - 62px)">
                                    <p class="" style="text-shadow: 0 0 5px blue;">終了しました</p>
                                </div> -->
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="w-100 text-right "><a class="text-small text-blue-1 text-decoration "  id="move_news">一覧を見る></a></div>
                <hr class="pb-0 mb-0">
            </div>
            <div class="position-relative ml-4 mb-2" style="margin-top: -1rem;">
                <img src="{{asset('img/flower.png')}}" class="news-flower height-1-half img-icon " >
            </div>







        </div>
    </div>

    <form class=" d-none" novalidate id="search_form" action="<?=url('/school/').'/';?>" method="post">
        {{csrf_field()}}
        <input name="cityList">
        <input name="typeList">
        <input name="keywordList">
        <input name="search">
        <input name="perPage" value="10">
    </form>
    <!-- Accordion wrapper -->
@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem; margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/top.png')}}" class="img-top" id="move_welcome" style="bottom: -.5rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 3000
            })
            $('#carouselExampleControls').on('slide.bs.carousel', function () {
                console.log("slide")
                // do something…
            })
            $('#carouselExampleControls').on('slid.bs.carousel', function () {
                // do something…
                console.log("slid")
            })
            var selectedId;
            var img_path = $("#default_image_path").val();
            var home_path = $("#home_path").val();
            $("#move_welcome").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#move_news").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var url = home_path + '/news/21/1/list';

                window.location.href = url;
            })

            $(".media-news").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/news/detail/" + id;
            })

            $("#move_articles").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var url = home_path + '/articles/21/1/list';

                window.location.href = url;
            })

            $(".media-articles").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/articles/detail/" + id;
            })



            $(".prefecture").click(function(event) {
                var selectedId = $(this).attr('prefecture-id');
                var url = home_path + '/school/' + selectedId + '/list';
                $(this).addClass('select-focus')

                window.location.href = url;
            });

	        $('#btn_procedure').click(function () {
                window.location.href = home_path + '/procedure';

            })
            $('#choose_school').click(function () {
                window.location.href = home_path + '/choose';

            })

            $(".areabox").click(function (event) {
                var id = $(this).attr('map-id');
                if(id != selectedId) {
                    //$("#location_" + selectedId).attr('src', img_path + '/location-disable.png');
                    //$("#location_" + id).attr('src', img_path + '/location-enable.png');
                    $(".areabox").each(function( index ) {
                        $(this).removeClass('active');
                    });
                    $(this).addClass('active');
                    //$("#map_img").attr('src', img_path + '/map/map' + id + '.png');
                    selectedId = id;
                    if(selectedId != 1) {
                        $("#map_img").attr('src', img_path + '/map/map-initial.png');
                        $('#news_area').addClass('d-none');
                        $("#prefecture_list").addClass("d-none");
                        $("#prefecture_list_other").removeClass("d-none");
                        console.log($(this).find('.areabox-title').text())
                        $('#prefecture_list_other').find('h6').text($(this).find('.areabox-title').text() + 'エリア情報');
                    } else {
                        $("#map_img").attr('src', img_path + '/map/map' + id + '.png');
                        if($("#collapsed-prefecture-rotate").hasClass("rotate")) {
                        } else {
                            $("#collapse0").toggle();
                            $("#collapsed-prefecture-rotate").addClass("rotate");
                        }
                        $("#prefecture_list").removeClass("d-none");
                        $("#prefecture_list_other").addClass("d-none");
                        $('#news_area').removeClass('d-none');
                    }
                }
            })


        });
    </script>
@endsection
