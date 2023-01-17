@extends('layouts.app')

@section('title')
    {{$prefecture -> prefecture_name}}の幼稚園･保育所 入園情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
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
        }





        .favourite {
            position: absolute;
            top: 0;
            right: 0;
            width: 4rem;
        }




        #move_news {
            font-size: 0.7rem;
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
            padding-left: 1.5rem !important;
        }

        .keyword-list > .col-6:nth-child(even) {
            padding-right: 1.5rem !important;
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

        .news-flower {
            position: absolute;
            bottom: -.5rem; left: 0;
            z-index: 100
        }

        .news-flower-right {
            position: absolute;
            top: -.5rem; right: 0;
            z-index: 100
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  {{$prefecture -> prefecture_name}}の幼稚園､保育所 > 園一覧
        </div>

        <div id="school_list">
            <div class="card-header text-large-demi subtitle-background">
                <i class="fas fa-map-marker-alt "></i>  {{$prefecture -> prefecture_name}}の幼稚園､保育所<span class="text-medium-demi">({{$total}}園)</span>
            </div>

            <div class="mt-1 text-medium-xs  px-4 d-none">
                岐阜県の幼稚園､保育所の待機児童についてや園の数や広さ､指導内容､伝統の行事など､岐阜県子育てについての特徴を入れる
            </div>

            <div class="card-body">
                <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded border mb-0 py-1" >
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75 text-small border-0 mb-0 py-2" type="text" placeholder="名称､特徴などフリー検索"
                           aria-label="Search" id="search">
                </div>

            </div>

            <div class="accordion md-accordion" aria-multiselectable="false">

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header section-background" id="heading0">

                        <a class="d-flex justify-content-center collapsed" data-toggle="collapse" href="#collapse0"
                           aria-expanded="false" aria-controls="collapse0" id="collapsed-city" name="collapsed" relate-icon="collapsed-city-rotate">

                            <h6 class="mb-0 text-normal text-black w-100">
                                市区町村を選ぶ [複数選択可]
                            </h6>
                            <img class="width-1" src="{{asset('img/blue-down.png')}}" id="collapsed-city-rotate">
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapse0" class="collapse" aria-labelledby="heading0" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    @foreach($areaList[0] as $index_area => $area)
                                        <div class="">
                                            <p class="txt-area text-medium-xs"><i class="fas fa-square"></i><?=$area->area_name;?></p>
                                            @foreach($area->city_list as $index_city => $city)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input city-detail text-normal" id="city_<?=$city->city_id;?>">
                                                    <label class="custom-control-label text-normal" for="city_<?=$city->city_id;?>"><?=$city->city_name.'('.$city->cnt.')';?></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-6">
                                    @foreach($areaList[1] as $index_area => $area)
                                        <div class="">
                                            <p class="txt-area text-medium-xs"><i class="fas fa-square"></i><?=$area->area_name;?></p>
                                            @foreach($area->city_list as $index_city => $city)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input city-detail text-normal" id="city_<?=$city->city_id;?>">
                                                    <label class="custom-control-label text-normal" for="city_<?=$city->city_id;?>"><?=$city->city_name.'('.$city->cnt.')';?></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion md-accordion mt-3" aria-multiselectable="false">

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header section-background" id="heading4">

                        <a class="d-flex justify-content-center collapsed" data-toggle="collapse" href="#collapse4"
                           aria-expanded="false" aria-controls="collapse4" id="collapsed-city" name="collapsed" relate-icon="collapsed-keyword-rotate">

                            <h6 class="mb-0 text-normal text-black w-100">
                                キーワードから“ざっくり”OR検索 [複数選択可]

                            </h6>
                            <img class="width-1" src="{{asset('img/blue-down.png')}}" id="collapsed-keyword-rotate">
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapse4" class="collapse" aria-labelledby="heading4" >

                        @foreach($keywordTypeList as $index_keyword_type => $keywordType)
                            <div class="mt-3">
                                <div class="">
                                    <p class="card-header sub-menu text-medium-xs px-4 py-1 text-break"><?=$keywordType->type_title;?></p>
                                </div>

                                <div class="card-body px-0 py-0">
                                    <div class="row mx-0 border-top border-bottom keyword-list">
                                        @foreach($keywordType->keywordList as $index_keyword => $keyword)
                                            <div class="col-6 border-bottom pt-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input keyword-detail text-normal" id="keyword_<?=$keyword->id;?>">
                                                    <label class="custom-control-label text-normal" for="keyword_<?=$keyword->id;?>"><?=$keyword->keyword;?></label>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>



                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="card-body pt-1 pb-0">
                <div class="row mx-n1">
                    @foreach($typeList as $type)
                        <div class="col-6 mt-2 px-1 " >
                            <div class="rounded text-center border border-dark py-1 text-bold-menu" name="type" id="type_<?=$type->type_id;?>">
                                <?=$type->type_name;?>(<?=$type->cnt;?>園)
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-body pt-0"style="position: sticky; bottom: -1rem">
                <div class="d-flex justify-content-center py-1 mt-2" style="margin-bottom: 0px" >
                    <button type="button" class="btn-search text-medium" style="width: 100%" id="btn_search">この条件で検索する</button>
                </div>
            </div>

        </div>
    </div>

    <div class="card ">

        <div class="card-body">
            <img src="{{asset('img/news_title.png')}}">
        </div>

        <div class="background-dark-pink position-relative">
            <img src="{{asset('img/butterfly.png')}}" class="news-flower-right height-3 img-icon" >
            <div class="card-body">
                <p class="text-medium mb-1"><span class="menu-icon">★</span>子どもと読みたい最新ニュース</p>
            </div>
            <div class="card-body d-flex py-0" style="position:relative; overflow: auto">

                @foreach($newsList as $index => $news)
                    <div class="card news-info mr-3 background-transparent">

                        <!-- Card image -->
                        <div class="view overlay">
                            <div class="radio-image radio-75-image  media-news" id="news_{{$news->news_id}}">
                                <img src="{{asset('/storage/img/news/'.$news->img)}}">
                            </div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body text-normal px-0">
                            <p class="text-medium-xs text-blue-1 line-clamp"><span class="px-1 text-pink border-pink text-small">新着</span>{{$news->title}}
                            </p>
                            <p class="text-small-xs text-gray">{{$news->created_at}}</p>

                        </div>

                    </div>
                @endforeach





            </div>
            <div class="w-100 text-right "><a class="txt-news-title text-blue-1 text-decoration"  id="move_news">一覧を見る></a></div>
            <hr class="pb-0 mb-0">

            <img src="{{asset('img/flower.png')}}" class="news-flower height-1-half img-icon" >
        </div>






    </div>

    <div class="accordion md-accordion mt-4" id="accordionEx"  aria-multiselectable="false">

        <!-- Accordion card -->
        <div class="card">

            <!-- Card header -->
            <div class="card-header top-menu" id="heading1">

                <a class="flex collapsed" data-toggle="collapse" href="#collapse1"
                   aria-expanded="false" aria-controls="collapse1" id="collapsed-home" name="collapsed" relate-icon="collapsed-home-rotate">
                    <img class="img-icon height-1-half mr-2" src="{{asset('img/circle_home.png')}}">
                    <h6 class="mb-0 text-white w-100 text-large">
                        幼稚園•保育所•こども園どう選ぶ？
                    </h6>
                    <img class="width-1" src="{{asset('img/drop-down.png')}}" id="collapsed-home-rotate">
                </a>
            </div>

            <!-- Card body -->
            <div id="collapse1" class="collapse" aria-labelledby="heading1" >
                <div class="card-body text-normal">
                    <p>保育施設と一言で言っても<span class="text-pink">幼稚園</span>や<span class="text-pink">認可保育所､認定こども 園</span>などいくつかの種類があり､
                        <span class="text-pink">お子様の年齢</span>や<span class="text-pink">家庭における 保育環境</span>によっても入園できる施設は異なります｡
                        各施設の 特徴などを確認し､最適な施設を選びましょう｡</p>
                    <div class="flex mt-1 my-2 ">
                        <button id="choose_school" class="mx-0 text-medium btn-blue-1 btn rounded btn-full" id="move_school">詳しくはこちら </button>
                        <img class="height-1 img-icon ml-1 position-absolute" style="right: 1rem" src="{{asset('img/next.png')}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion card -->

        <!-- Accordion card -->
        <div class="card mt-2">

            <!-- Card header -->
            <div class="card-header top-menu" id="heading2">
                <a class="flex collapsed " data-toggle="collapse"  href="#collapse2"
                   aria-expanded="false" aria-controls="collapse2" id="collapsed-file" name="collapsed" relate-icon="collapsed-file-rotate">
                    <img class="img-icon height-1-half mr-2" src="{{asset('img/circle_file.png')}}">

                    <h6 class="mb-0 w-100 text-white text-large">
                        入園までの手続き
                    </h6>
                    <img class="width-1" src="{{asset('img/drop-down.png')}}" id="collapsed-file-rotate">
                </a>
            </div>

            <!-- Card body -->
            <div id="collapse2" class="collapse" aria-labelledby="heading2" >
                <div class="card-body text-normal">
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
    <form class=" d-none" novalidate id="search_form" action="<?=url('/test/school/').'/'.$prefecture -> prefecture_id.'/1/list';?>" method="post">
        {{csrf_field()}}
        <input type="hidden" id="prefecture_id" value="{{$prefecture -> prefecture_id}}">
        <input name="cityList">
        <input name="typeList">
        <input name="keywordList">
        <input name="search">
        <input name="perPage" value="10">
    </form>

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
        var selectedKeywordList = [];
        var searchStr = '';
        var currentPage = 1;
        var startPage;
        var endPage;
        var perShow;
        var perPage = 3;
        var totalPage;
        var home_path;

        var toggleCityStatus = false;
        var toggleKeywordStatus = false;

        function getPrefecture() {
            searchStr = $("#search").val();
            var selectCity = selectedCityList.join(",");
            var selectType = selectedTypeList.join(",");
            var selectKeyword = selectedKeywordList.join(",");
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
                    prefecture_id: prefecture_id,
                    keywordList: selectKeyword
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
                        $("#type_" + type_id).html(type_name + '(' + type_count + '園)');
                    });
                },
                error: function () {
                }
            });
        }

        $(document).ready(function() {
            home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });


            $("[name='type']").click(function(event) {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                var index = selectedTypeList.indexOf(id);
                if(index > -1) {
                    $(this).removeClass('active');
                    selectedTypeList.splice(index, 1);
                } else {
                    $(this).addClass('active');
                    selectedTypeList.push(id);
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

            $(".keyword-detail").change(function() {
                var id = $(this).attr('id');
                var split = id.split("_");
                id = split[1];
                if($(this).is(":checked")) {
                    selectedKeywordList.push(id);
                } else {
                    var index = selectedKeywordList.indexOf(id);
                    selectedKeywordList.splice(index, 1);
                }
            });

            $("#btn_search").click(function(event) {
                searchStr = $("#search").val();
                var selectCity = selectedCityList.join(",");
                var selectType = selectedTypeList.join(",");
                var selectKeyword = selectedKeywordList.join(",");
                $("[name='cityList']").val(selectCity);
                $("[name='typeList']").val(selectType);
                $("[name='keywordList']").val(selectKeyword);
                $("[name='search']").val(searchStr);

                var form = $("#search_form");
                form.submit();
                //getSchoolList();
                //window.location.href = 'http://example.com';
            });

            $('#btn_procedure').click(function () {
                window.location.href = home_path + '/procedure';

            })
            $('#choose_school').click(function () {
                window.location.href = home_path + '/choose';

            })

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

        });


    </script>
@endsection
