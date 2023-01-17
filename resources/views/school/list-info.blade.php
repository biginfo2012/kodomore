@extends('layouts.app')

@section('title')
    {{$prefecture -> prefecture_name}}の幼稚園･保育所 入園情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
        main {
            /*max-width: 100%;*/
            overflow-x: hidden;
        }
        .txt-area {
            color: #0099d9;
        }

        .fa-circle {
            color: white;
            font-size: .5rem;
        }

        .school-list {
            background-color: #FAFAD7;
            padding: .8rem;
        }

        .school-item {
            background-color: white;
            position: relative;
            margin-bottom: 1rem;
            border-radius: 5px !important;
            overflow: hidden;
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

        .fa-angle-left {
            position: absolute;
            left: 2em;
            color: #2bbbad;
        }

        .keyword-list > .col-6:nth-child(odd) {
            /*padding-left: 1.5rem !important;*/
        }

        .keyword-list > .col-6:nth-child(even) {
            /*padding-right: 1.5rem !important;*/
        }
        .keyword-list > .col-6:last-child {
            border-bottom: 0px !important;
        }

        .keyword-list > .col-6:nth-last-child(2):nth-child(odd) {
            border-bottom: 0px !important;
        }

        .keyword-list > .col-6:last-child {
            border-bottom: 0px !important;
        }

        .kind-detail {
            background-color: white;
        }

        .kind-detail > div {
            border-bottom: 4px solid transparent;
        }
        .kind-detail.active > div{
            border-bottom: 4px solid #31BCC7;
        }


        hr.border-top {
            border-top: 2px dashed #ABABAB !important;
            border-bottom: 0px !important;
        }

        .background-light-sky {
            background-color: #F5F9FA;
        }

        .card-img-top {
            cursor: pointer;
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

        .news-flower1 {
            position: absolute;
            top: 10px; right: 15px;
            z-index: 100
        }

        .articles-info{
            min-width: 85%;
        }
        .news-info{
            min-width: 40% !important;
        }

        .line-clamp1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .custom-control-label::before{
            left: -1.2rem !important;
            top: 1.5px;
        }
        .custom-control-label::after{
            left: -1.2rem !important;
            top: 1.5px;
        }


        @media (max-width: 375px) and (min-width: 321px){
            .height-1-half {
                height: 1.75rem !important;
                min-width: .1rem;
            }
        }

        .radio-75-image {
            padding-bottom: 65% !important;
        }

        .item-background {
            background-image: url("{{asset('img/item-background.png')}}");
            background-size: cover;
            color: white !important;
            border: none !important;
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




    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  {{$prefecture -> prefecture_name}}の幼稚園､保育所 > 園一覧
        </div>

        <form class=" d-none" novalidate id="search_form"  method="post">
            {{csrf_field()}}
            <input type="hidden" id="prefecture_id" value="{{$prefecture -> prefecture_id}}">

        </form>

        <div id="school_list_info">
            <div class="card-header text-large-demi subtitle-background">
                <i class="fas fa-map-marker-alt "></i>  {{$prefecture -> prefecture_name}}の幼稚園､保育所<span class="text-medium-demi">({{$totalCount}}件)</span>
            </div>

            <div class="mt-1 text-medium-xs  px-4 d-none">
                岐阜県の幼稚園､保育所の待機児童についてや園の数や広さ､指導内容､伝統の行事など､岐阜県子育てについての特徴を入れる
            </div>



            <div class="section-background mt-2 ">
                <div class="card-body px-2 pb-2">
                    <div class="row text-center justify-content-center mb-2">
                        <img class="width-1 mr-1" style="height: auto !important; margin-bottom: 2px;" src="{{asset('img/down-mosaic.png')}}">
                        <p class="text-medium" style="color: #0099D9">条件をお選びください</p>
                        <img class="width-1 ml-1" style="height: auto !important; margin-bottom: 2px;" src="{{asset('img/down-mosaic.png')}}">
                    </div>
                    <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded mb-0 py-1 background-white" style="border: 1px solid #333333; border-radius: 10px !important;">
                        <img class="width-1" src="{{asset('img/zoomer.png')}}">
                        <input class="form-control form-control-sm ml-3 w-75 text-small border-0 mb-0 py-1" type="text" placeholder="名称､特徴などフリー検索" style="width: 85% !important;"
                               aria-label="Search"  id="search" value="{{$search}}">
                        <input type="hidden" id="search_type" value="{{$type}}">
                        <input type="hidden" id="garden_type" value="{{isset($garden_type) ? $garden_type:''}}">
                    </div>

                </div>

                <div class="accordion md-accordion" aria-multiselectable="false">

                    <!-- Accordion card -->
                    <div class="card background-transparent">

                        <!-- Card header -->
                        <div class="card-header background-light-sky mx-2 mb-3 pb-0" id="heading0">

                            <a class="d-flex justify-content-center collapsed mb-2" data-toggle="collapse" href="#collapse0"
                               aria-expanded="false" aria-controls="collapse0" id="collapsed-city" name="collapsed" relate-icon="collapsed-city-rotate">

                                <h6 class="mb-0 text-normal-title text-black w-100">
                                    市区町村を選ぶ [複数選択可]
                                </h6>
                                <img class="width-1" src="{{asset('img/blue-down.png')}}" id="collapsed-city-rotate">
                            </a>
                            <div id="collapse0" class="collapse background-white mt-3" aria-labelledby="heading0" style="margin-right: -20px; margin-left: -20px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            @foreach($areaList[0] as $index_area => $area)
                                                <div class="pb-2">
                                                    <p class="txt-area text-medium-xs ml-2 mb-1"><i class="fas fa-square" style="margin-right: 3px !important; font-size: 14px !important;"></i><?=$area->area_name;?></p>
                                                    @foreach($area->city_list as $index_city => $city)
                                                        <div class="custom-control custom-checkbox" style="padding-bottom: 2px;">
                                                            <input type="checkbox" class="custom-control-input city-detail text-normal" id="city_<?=$city->city_id;?>">
                                                            <label class="custom-control-label text-normal" for="city_<?=$city->city_id;?>"><?=$city->city_name.'('.$city->cnt.')';?></label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            @foreach($areaList[1] as $index_area => $area)
                                                <div class="pb-2">
                                                    <p class="txt-area text-medium-xs ml-2 mb-1"><i class="fas fa-square" style="margin-right: 3px !important; font-size: 14px !important;"></i><?=$area->area_name;?></p>
                                                    @foreach($area->city_list as $index_city => $city)
                                                        <div class="custom-control custom-checkbox" style="padding-bottom: 2px;">
                                                            <input type="checkbox" class="custom-control-input city-detail text-normal" id="city_<?=$city->city_id;?>">
                                                            <label class="custom-control-label text-normal"  for="city_<?=$city->city_id;?>"><?=$city->city_name.'('.$city->cnt.')';?></label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card body -->

                    </div>
                </div>

                <div class="accordion md-accordion " aria-multiselectable="false">

                    <!-- Accordion card -->
                    <div class="card background-transparent">

                        <!-- Card header -->
                        <div class="card-header background-light-sky mx-2 mb-3 pb-0" id="heading4">

                            <a class="d-flex justify-content-center collapsed mb-2" data-toggle="collapse" href="#collapse4"
                               aria-expanded="false" aria-controls="collapse4" id="collapsed-city" name="collapsed" relate-icon="collapsed-keyword-rotate">

                                <h6 class="mb-0 text-normal-title text-black w-100" id="collapsed-search" >
                                    キーワードから“ざっくり”OR検索 [複数選択可]

                                </h6>
                                <img class="width-1" src="{{asset('img/blue-down.png')}}" id="collapsed-keyword-rotate">
                            </a>
                            <div id="collapse4" class="collapse section-background mt-3" aria-labelledby="heading4" style="margin-right: -20px; margin-left: -20px;">
                                <div class="background-white p-2 ">
                                    @foreach($tagList as $index_tag_type => $tagType)
                                        <div class="mt-2 mb-2 background-white ">
                                            <div class="">
                                                <p class="card-header sub-menu text-medium-xs px-4 py-1 text-break"><?=$tagType->type_title;?></p>
                                            </div>

                                            <div class="card-body px-0 py-0">
                                                <div class="row mx-0 border-top border-bottom keyword-list">
                                                    @foreach($tagType->tagList as $index_tag => $tag)
                                                        <div class="col-6 border-bottom pt-3 pb-1 pr-0">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input tag-detail text-normal" id="tag_<?=$tag->id;?>">
                                                                <label class="custom-control-label text-normal" for="tag_<?=$tag->id;?>"><?=$tag->tag_title;?></label>
                                                            </div>
                                                        </div>
                                                        @if($tagType->id === 5 && $index_tag === count($tagType->tagList) - 3)
                                                            <div class="col-12 border-bottom pt-3 pb-1 pr-0">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input text-normal" id="tag_all" checked>
                                                                    <label class="custom-control-label text-normal" for="tag_all">上部学校連携を選択せず全て見る</label>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @endforeach





                                                </div>
                                            </div>



                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Card body -->

                    </div>
                </div>

                <div class="accordion md-accordion " aria-multiselectable="false">

                    <!-- Accordion card -->
                    <div class="card background-transparent">

                        <!-- Card header -->
                        <div class="card-header background-light-sky mx-2 mb-2 pb-0" id="heading5">

                            <a class="d-flex justify-content-center collapsed mb-2" data-toggle="collapse" href="#collapse5"
                               aria-expanded="false" aria-controls="collapse5" id="collapsed-type" name="collapsed" relate-icon="collapsed-type-rotate">

                                <h6 class="mb-0 text-normal-title text-black w-100">
                                    園の種類 [複数選択可]

                                </h6>
                                <img class="width-1" src="{{asset('img/blue-down.png')}}" id="collapsed-type-rotate">
                            </a>
                            <div id="collapse5" class="collapse background-white mt-3" aria-labelledby="heading5" style="margin-right: -20px; margin-left: -20px;">


                                <div class="card-body pb-2 px-3">
                                    <div class="row">
                                        <div class="col-12">

                                            @foreach($typeCountList as $type)
                                                <div class="custom-control custom-checkbox mb-2" style="padding-bottom: 2px;">
                                                    <input type="checkbox" class="custom-control-input text-normal" name="type" id="type_<?=$type->type_id;?>">
                                                    <label class="custom-control-label text-normal" for="type_<?=$type->type_id;?>"><?=$type->type_name;?>(<?=$type->cnt;?>件)</label>
                                                </div>
                                            @endforeach

                                            <p class="pt-1 text-bold-menu text-center" id="txt_top_search">上記の園は基本的に無償化対象です</p>

                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Card body -->

                    </div>
                </div>



                <div class="card-body pt-2 px-4">

                    <div class="justify-content-center py-0 mt-0 text-center" style="margin-bottom: 0px" >
                        <img class="p-0" src="{{asset('img/condition-search-btn.png')}}" id="btn_search">
                    </div>
                </div>
            </div>
            <div class="pt-1">
                <div class="row top-menu m-0 " style="padding-bottom: 2px" id="kind_list">
                    <div class="col-3 px-0 position-relative">
                        <div class="kind-detail text-center d-flex text-medium-title px-2 pt-2 pb-0" id="kind_">
                            <p class="flex-1"></p>
                            <div class="px-2 pb-1">すべて</div>
                            <p class="flex-1">
                                <label style="position: absolute; right: 0; width: 1px; height: 21px; background: #31BCC7 !important;"></label>
                            </p>
                        </div>
                    </div>
                    @foreach($kindList as $index => $kind)
                        <div class="col-3 px-0 position-relative" >
                            <div class="kind-detail text-center d-flex text-medium-title px-2 pt-2 pb-0" id="kind_{{$kind->kind_id}}">
                                <p class="flex-1"></p>
                                <div class="px-2 pb-1">{{$kind -> kind_name}}</div>
                                <p class="flex-1">
                                    @if($index !== 2)
                                        <label style="position: absolute; right: 0; width: 1px; height: 21px; background: #31BCC7 !important;"></label>
                                    @endif

                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>



        </div>

        <div id="school_list">

        </div>
    </div>

    <div class="card ">
        <div class="section-background">
            <div class="mx-2 card-body mt-2 p-2 background-light-sky">
                <p class="text-bold-menu text-center"> 園の種類 [複数選択可]</p>
                <div class="row mx-n1">
                    @foreach($typeCountList as $type)
                        <div class="col-6 mt-2 px-1 " >
                            <div class="text-center border border-dark py-2 text-small-xs-bold z-depth-1 px-2 position-relative" style="border-radius: 8px; display: flow-root" name="news-type" id="news-type_<?=$type->type_id;?>">
                                <p class="float-left"><?=$type->type_name;?></p>
                                <p class="float-right"><?=$type->cnt;?>件</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="pt-1 text-small text-center" id="txt_top_search" style="font-family: YugoBold;">上記の園は基本的に無償化対象です</p>
            <div class="card-body pt-0" >

                <div class="justify-content-center pt-0 pb-0 mt-2 text-center" style="margin-bottom: 0px" >
                    <img class="p-0" src="{{asset('img/condition-search-btn.png')}}" id="btn_second_search">
{{--                    <p class="text-medium text-white"  style="margin-top: -30px">この条件で検索する</p>--}}
                </div>
{{--                <div class="d-flex justify-content-center py-1 mt-2" style="margin-bottom: 0px" >--}}
{{--                    <button type="button" class="btn-search text-medium" style="width: 100%" id="btn_second_search">この条件で検索する</button>--}}
{{--                </div>--}}
            </div>
        </div>


        <div class="card-body pb-0">
            <img src="{{asset('img/news-title2.png')}}">
        </div>

        <div class="background-white position-relative">
            <img src="{{asset('img/music.png')}}" class="news-flower1 height-2 img-icon" style="height: 1.8rem !important;">
            <div class="card-body pb-1">
                <p class="text-medium mb-0"><span class="menu-icon" style="font-size: 20px">★</span>{{$prefecture -> prefecture_name}}の子育て記事</p>
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
                                <p class="text-large-xs text-pink" style="color: #31BCC7 !important;">@if($article->is_new==true)<span class="px-1 text-pink border-pink text-small-xs-bold mr-2">新着</span>@endifニュース</p>
                                <p class="text-medium text-blue-1 line-clamp1" style="color: black !important;">{{$article->title}}
                                </p>
                                <p class="text-small line-clamp">{{$article->main_text}}</p>
                                <p class="text-small-xs text-gray">{{str_replace('-', '/', $article->post_date)}}</p>

                            </div>

                        </div>



                @endforeach
            </div>
            <div class="w-100 text-right mb-4"><a class="text-small text-blue-1 text-decoration"  id="move_articles">一覧を見る></a></div>
        </div>

        <div class="background-dark-pink position-relative">
            <hr class="pt-0 mt-0 border-top">
            <img src="{{asset('img/butterfly.png')}}" class="news-flower-right height-3 img-icon position-absolute" style="right: 0; top: -.75rem">
            <div class="card-body pb-2 pt-0">
                <p class="text-medium"><span class="menu-icon" style="font-size: 20px">★</span>子どもと読みたい最新ニュース</p>
            </div>
            <div class="card-body d-flex py-0" style="position:relative; overflow: auto">

                @foreach($newsList as $index => $news)
                    <div class="card news-info mr-3 background-transparent">

                        <!-- Card image -->
                        <div class="view overlay">
                            <div class="radio-image radio-75-image  {{$index > 3?'':'media-news'}}" id="news_{{$news->news_id}}">
                                <img class="card-img-top" style="border-radius: 0 !important;" src="{{asset('/storage/img/news/'.$news->img)}}">
                            </div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body text-normal px-0 py-1">
                            <p class="text-normal-title text-blue-1 line-clamp" style="color: black !important;">@if($news->is_new==true)<span class="px-1 text-pink border-pink text-small">新着</span>@endif {{$news->title}}
                            </p>
                            <p class="text-small-xs text-gray">{{str_replace('-', '/', $news->created_at)}}</p>

                        </div>

                        @if($index > 3)

                        <div class="position-absolute text-center text-medium-title px-2 py-1" style="z-index: 10; border: 2px solid #FF557E; color: #FF557E; border-radius: 0.5rem; top: 52%; left: calc(50% - 52px)">

                                    <p class="text-outline-add-thick">終了しました</p>
                                </div>
                                <div class="text-outline-area"></div>

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



@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
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
        var selectedCityList = [];
        var selectedTypeList = [];
        var selectedTagList = [];
        var selectedSecondTypeList = [];
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
        var selectTag;
        var prefecture_id;
        var selectKind = '';
        var default_img_path = $("#default_image_path").val();
        function getSchoolList(is_move) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/ajax/school-list';
            $.ajax({
                url:url,
                type:'post',
                data: {
                    cityList: selectCity,
                    typeList: selectType,
                    tagList: selectTag,
                    search: searchStr,
                    kind: selectKind,
                    prefecture_id: prefecture_id,
                    currentPage: currentPage,
                    perPage: perPage
                },
                success: function (response) {
                    $("#school_list").html(response);
                    changeEvent();
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

                getSchoolList(true);
            });

            $(".school-detail").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                var home_path = $("#home_path").val();
                window.location.href = home_path + "/school/detail/" + id;
            });

            $(".favourite_img").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];


                var enable = $(this).attr('data-enable');

                if(enable === 'disabled'){
                    var cnt;
                    cnt = sessionStorage.getItem('favourite_cnt');
                    if(cnt === 'NaN'){
                        cnt = 0;
                    }
                    cnt = parseInt(cnt) + 1;
                    sessionStorage.setItem('favourite_cnt', cnt);
                    console.log(cnt);
                    if(cnt > 2){
                        sessionStorage.clear('favourite_cnt');
                        var home_path = $("#home_path").val();
                        location.href = home_path + "/login";
                        return ;
                    }
                    var current = $(this).attr('data-favourite');
                    var updateStatus;
                    var img_url;
                    if(current == '0'){
                        img_url = default_img_path + "/favourite.png";
                        updateStatus = '1';
                    }else{
                        img_url = default_img_path + "/favourite-add.png";
                        updateStatus = '0';
                    }

                    $(this).attr('src', img_url);
                    $(this).attr('data-favourite', updateStatus);
                    return ;
                }
                var current = $(this).attr('data-favourite');
                var updateStatus;
                var img_url;
                if(current == '0'){
                    img_url = default_img_path + "/favourite.png";
                    updateStatus = '1';
                }else{
                    img_url = default_img_path + "/favourite-add.png";
                    updateStatus = '0';
                }

                $(this).attr('src', img_url);
                $(this).attr('data-favourite', updateStatus);

                var home_path = $("#home_path").val();
                submitFormData(updateStatus, id);
                //window.location.href = home_path + "/login";
            });
        }

        function submitFormData(favourite, garden_id) {
            $.ajaxSetup({
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                url: home_path + '/garden/favourite',
                method: 'post',
                dataType: 'json',
                data: {
                    'favourite': favourite,
                    'garden_id': garden_id,
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
                    alertify.error("更新失敗");

                }
            })

        }


        function getPrefecture() {
            searchStr = $("#search").val();
            var selectCity = selectedCityList.join(",");
            var selectType = selectedTypeList.join(",");
            var selectTag = selectedTagList.join(",");
            var token = $("meta[name='_csrf']").attr("content");
            var prefecture_id = $("#prefecture_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/ajax/prefecture-detail';
            $.ajax({
                url:url,
                type:'post',
                data: {
                    cityList: selectCity,
                    typeList: selectType,
                    search: searchStr,
                    prefecture_id: prefecture_id
                },

                success: function (response) {
                    var cityList = response['city'];
                    var typeList = response['type'];
                    cityList.forEach(city => {
                        var city_id = city['city_id'];
                        var city_name = city['city_name'];
                        var city_count = city['cnt'];
                        $("label[for='city_" + city_id).text(city_name + '(' + city_count + ')');
                    });

                    typeList.forEach(type => {
                        var type_id = type['type_id'];
                        var type_name = type['type_name'];
                        var type_count = type['cnt'];
                        $("#type_" + type_id).html(type_name + '(' + type_count + '件)');
                    });
                },
                error: function () {
                }
            });
        }


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
            getPrefecture();
            var search_type = $("#search_type").val();
            var garden_type = $('#garden_type').val()
            if(garden_type !== ''){
                console.log(garden_type);
                var index = '#news-type_' + garden_type;
                var ch_id = '#type_' + garden_type;
                $(ch_id)[0].checked = true;
                $(index).addClass('item-background');
                selectType = garden_type;
                if(search_type == 1) {
                    getSchoolList(true);
                } else {
                    getSchoolList(false);
                }
            }else{
                $('#kind_').addClass('active');
                if(search_type == 1) {
                    getSchoolList(true);
                } else {
                    getSchoolList(false);
                }
            }



            $('#btn_procedure').click(function () {
                window.location.href = home_path + '/procedure';

            })
            $('#choose_school').click(function () {
                window.location.href = home_path + '/choose';

            })





            $("[name='type']").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];

                if($(this).is(":checked")) {
                    selectedTypeList.push(id);
                } else {
                    var index = selectedTypeList.indexOf(id);
                    selectedTypeList.splice(index, 1);
                }

            });

            $("[name='news-type']").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                if($(this).hasClass('item-background')) {
                    $(this).removeClass('item-background');
                    var index = selectedSecondTypeList.indexOf(id);
                    selectedSecondTypeList.splice(index, 1);
                } else {
                    selectedSecondTypeList.push(id);
                    $(this).addClass('item-background');
                }
            });



            $(".city-detail").change(function() {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                if($(this).is(":checked")) {
                    selectedCityList.push(id);
                } else {
                    var index = selectedCityList.indexOf(id);
                    selectedCityList.splice(index, 1);
                }
                getPrefecture();
            });

            $(".kind-detail").click(function() {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];

                $(".kind-detail").each(function( index ) {
                    $(this).removeClass('active');
                });
                if(id == selectKind) {
                    selectKind = '';
                    currentPage = 1;
                    getSchoolList(true);
                    return ;
                }
                $(this).addClass('active');
                selectKind = id;
                currentPage = 1;
                getSchoolList(true);
            });

            $(".tag-detail").change(function() {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];

                $('#tag_all')[0].checked = false;

                if($(this).is(":checked")) {
                    selectedTagList.push(id);
                } else {
                    var index = selectedTagList.indexOf(id);
                    selectedTagList.splice(index, 1);
                }
            });



            $("#btn_search").click(function(event) {
                searchStr = $("#search").val();
                for(var i = 1; i<=10; i++){
                    var index = '#news-type_' + i;
                    $(index).removeClass('item-background');
                }
                for(var i = 0; i < selectedTypeList.length; i++){
                    var index = '#news-type_' + selectedTypeList[i];
                    $(index).addClass('item-background');
                }
                selectCity = selectedCityList.join(",");
                selectType = selectedTypeList.join(",");
                console.log(selectType);

                selectTag = selectedTagList.join(",");
                currentPage = 1;

                getSchoolList(true);
                //window.location.href = 'http://example.com';
            });

            $("#btn_second_search").click(function(event) {
                searchStr = '';
                selectCity = '';
                selectType = selectedSecondTypeList.join(",");
                selectTag = '';
                currentPage = 1;
                getSchoolList(true);
                //window.location.href = 'http://example.com';
            });


            $("#move_news").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var url = home_path + '/news/' + prefecture_id + '/1/list';

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
                var url = home_path + '/articles/' + prefecture_id + '/1/list';

                window.location.href = url;
            })

            $(".media-articles").click(function () {
                var prefecture_id = $("#prefecture_id").val();
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                window.location.href = home_path + "/articles/detail/" + id;
            })

        });


    </script>
@endsection
