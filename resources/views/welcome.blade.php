@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園､小学校･中学校･高校 入学と受験情報
@endsection

@section('nav')

    @include('layouts.navbar')

@endsection

@section('css4page')
    <style>
        .school-type:before {
            position: absolute;
            bottom: 0px;
            right: 15px;
            display: inline-block;
            border-top: 1rem solid #2B9ca4;
            border-left: 0px solid transparent;
            border-right: 1rem solid white;
            border-bottom: 0px solid transparent;
            content: " ";
        }

        .school-type {
            align-items: center;
            background-color: #31bcc7;
            height: 7rem;
            display: flex;
            justify-content: center;
        }

        p {
            margin-bottom: 0px;
        }

        .badge {
            box-shadow: none;
        }



        .edit-profile {
            margin-top: 1rem;
            text-align: center;
            width: 100%;
        }

        .search-body {
            background-color: #e5eecb;
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .search-body > .form-inline {
            background-color: white;
        }

        .location {

        }

        .custom-select {
            border: none;

        }

        .garden-title {
            font-size: 1.5rem;
        }

        .garden-comment {
            font-size: 0.8rem;
            margin-top: 4px;
        }



        .txt-detail {
            text-decoration: underline;
            color: black;
            /*font-size: 0.8rem*/
        }

        .col-4 {
            padding: 0 .25rem;
        }

        .md-form {
            margin-bottom: .5rem !important;
        }



    </style>
@endsection

@section('content')
    <div class="position-relative">
        <img src="{{asset('img/main_img.png')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">



    </div>
    <div class="card bg-transparent mt-n2 mb-3" style="z-index: 100">
        <div class="card-body pt-0 bg-transparent position-relative pb-1" style="padding-left: 2rem; padding-right: 2rem;">
            <img src="{{asset('img/board-school.png')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
            <!-- <p class="text-center text-medium-light position-absolute txt-family-kosugi text-white" style="left: 0;right: 0;top: 17%"><span class="text-size-42">園･学校･塾 情報<label class="txt-family-kosugi text-title-large" style="margin-bottom:0 !important;">と</label>受験対策</span><br><span class="text-medium-light txt-family-kosugi" style="">私立･公立･国公立</span></p> -->
            <p class="text-center text-medium-light position-absolute txt-family-kosugi text-white" style="left: 0;right: 0;top: 17%"><span class="text-size-42">園･学校･塾 情報<label class="txt-family-kosugi text-title-large" style="margin-bottom:0 !important;">と</label>受験対策</span><br><span class="text-medium-light txt-family-kosugi" style="">私立･国立･公立</span></p>
        </div>
    </div>


    <div class="card ">
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-4">
                    <div class="" id="move_garden" style="padding: 0 5%">
{{--                        <div class="badge text-wrap" >--}}
{{--                            <p class="garden-title">幼稚園 保育所</p>--}}
{{--                            <p class="garden-comment">入園準備</p>--}}
{{--                        </div>--}}
                        <img src="{{asset('img/enter_garden.png')}}" class="img-fluid cursor-pointer" alt="Responsive image" style="width: 100%;">
                    </div>
                </div>
                <div class="col-4">
                    <div class="" id="move_ealer">
{{--                        <div class="badge text-wrap" >--}}
{{--                            <p class="garden-title">小学校 入学</p>--}}
{{--                            <p class="garden-comment">準備と対策</p>--}}
{{--                        </div>--}}
                        <img src="{{asset('img/enter_primary.png')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">

                    </div>
                </div>
                <div class="col-4">
                    <div class="" id="move_high">
{{--                        <div class="badge text-wrap" >--}}
{{--                            <p class="garden-title">中学校 入学</p>--}}
{{--                            <p class="garden-comment">準備と対策</p>--}}
{{--                        </div>--}}
                        <img src="{{asset('img/enter_middle.png')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="" id="move_high">
                        <img src="{{asset('img/univ-grey1.jpg')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="" id="move_high">
                        <img src="{{asset('img/school-grey1.jpg')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="" id="move_high">
                        <img src="{{asset('img/grey-com1.jpg')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="edit-profile d-flex justify-content-center" id="edit_garden">

                <p class="txt-detail text-medium-xs height-1" >保護者と生徒､スクールで公開情報を<span class="text-red">編集</span>する</p>
                <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}">
            </div>

        </div>

        <div class="card-body " style="padding-top: 0">
            <div class="search-body  z-depth-1-half">
                <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded-pill py-1 px-2">
                    <img class="height-1 img-icon" src="{{asset('img/zoomer.png')}}">
                    <input class="text-small form-control form-control-sm ml-2 flex-1 mb-0 border-0" type="text" placeholder="名称､特徴などフリー検索"
                           aria-label="Search" id="garden_name">
                </div>

                <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded py-1 px-2">
                    <img class="height-1 img-icon" style="margin-left: 2px;" src="{{asset('img/location.png')}}">
                        <select class="custom-select custom-select-sm form-control form-control-sm ml-2 flex-1 mb-0 text-small" id="prefecture">

                            <option value="0" selected>都道府県などエリア検索</option>
                            @foreach($prefectureList as $index => $prefecture)
                                @if($prefecture -> is_active == 1)
                                    <option value="<?=$prefecture->prefecture_id;?>"><?=$prefecture->prefecture_name;?></option>
                                @else
                                    <option disabled value="<?=$prefecture->prefecture_id;?>"><?=$prefecture->prefecture_name;?></option>
                                @endif
                            @endforeach
                        </select>

                </div>

                <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded py-1 px-2" >
                    <img class="height-1 img-icon" src="{{asset('img/school-icon.png')}}">
                    <select class="custom-select custom-select-sm form-control form-control-sm ml-2 flex-1 mb-0 text-small" id="school_type">
                        <option value="0" selected>[幼､小､中､高､大､専､塾]スクール検索</option>
                        <option value="1">幼稚園 保育所</option>
                        <option value="2" disabled>小学校</option>
                        <option value="3" disabled>中学校</option>
                        <option value="4" disabled>高校</option>
                        <option value="5" disabled>大学</option>
                        <option value="6" disabled>専門学校</option>
                        <option value="7" disabled>塾･習い事･通信</option>
                    </select>

                </div>
                <div class="d-flex justify-content-center py-1" style="margin-bottom: 0px" id="search">
                    <img class=text-medium" src="{{asset('img/search-btn-img.png')}}">
{{--                    <button type="button" class="btn-search text-medium" style="width: 100%">検索する</button>--}}
                </div>

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


@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem;  margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_1.png') }}" style="width: 100%">
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#move_ealer").click(function(event) {
                //window.location.href = home_path + '/ealer';
                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                //window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });

            $("#edit_garden").click(function(event) {
                window.location.href = home_path + '/school/create';
            });

            $("#search").click(function(event) {
                var selectedPrefectureId = $("#prefecture").val();
                var selectSchoolTypeId = $("#school_type").val();
                var name = $("#garden_name").val();
                if(selectedPrefectureId > 0 && selectSchoolTypeId > 0) {
                    var url = home_path + '/school/' + selectedPrefectureId + '/list?search=' + name + '&type=1';
                    window.location.href = url;
                }
		
		console.log("Test");



                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
