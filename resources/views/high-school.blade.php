@extends('layouts.app')

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>


        .flex {
            display: flex;
            position: relative;
            align-items: center;
        }

        .rounded-circle {
            background-color: white;
            width: 1.5em;
            height: 1.5em;
            margin-right: 0.5em;
            color: #ACE4E9;
        }

        h6 {
            color: white;
            flex: 1;
        }



        .collapsed > i {
            rotation: 180deg;
        }

        h6 > i {
            float: right;
        }

        .btn-full {
            width: 100%;
            font-size: 1rem;
            padding-top: 0.3rem !important;
            padding-bottom: 0.3rem !important;
        }

        .fa-angle-right {
            position: absolute;
            right: 2em;
            color: #2bbbad;
        }
        p {
            font-size: 0.8rem;
        }

        .card-body {
            padding: 1rem 1.25rem;
        }

        span {
            color: #ff557d;
        }

        .border {
            border-color: #ff557d;
        }



        .top-badge {
            position: absolute;
            right: 0px;
            bottom: 0px;
            width: 8em;
        }

        .top-tab {
            background-color: white;
        }


        .second-tab {
            background-color: #fafac8;
        }

        img {
            width: 100%;
        }

        p {
            margin-bottom: 8px;
        }

        strong {
            font-weight: 800;
        }

        .media-news {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 6rem;
            height: 6rem;
        }

        .media-body {
            font-size: 0.7rem;
        }

        .txt-small-date {
            font-size: 0.6rem;
            color: #cdcdcd;
        }

        .txt-news-title {
            color: #29628f;
        }

        hr {
            border:none;
            border-top:1px dashed #666;
            color:#fff;
            background-color:#fff;
            height:1px;
            width:100%;
            margin: 8px 0px;
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

        h6.prefecture {
            color: black;
            padding: 0 0.5rem;
        }
        .border-bottom > .col-6 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .txt-area {
            color: #0099d9;
        }

        #back {
            margin-top: 8px;
        }

        .btn {
             box-shadow: none;
         }

    </style>
@endsection

@section('content')
    <img src="{{asset('img/top_high.png')}}" class="img-fluid" alt="Responsive image" style="width: 100%;">

    <div class="card">
        <div class="card-header " style="font-weight: 800">
            <i class="fas fa-map-marker-alt "></i> 全国の中学校(00件)
        </div>

        <div class="card-body">
            <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 rounded" style="border: 1px solid #cdcdcd">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="中学校名､エリア､特徴などフリーワード検索"
                       aria-label="Search">
            </div>
            <img src="{{asset('img/map_high.jpg')}}">
        </div>

        <div class="card-body">
            <div class="grid">
                @foreach($areaList as $index_area => $area)
                    <div class="grid-item">
                        <p class="txt-area"><i class="fas fa-square"></i><?=$area->area_name;?></p>
                        @foreach($area->city_list as $index_city => $city)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="city<?=$city->city_id;?>">
                                <label class="custom-control-label" for="city<?=$city->city_id;?>"><?=$city->city_name;?></label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <button class="btn txt-area" id="back">もどる<i class="fas fa-undo-alt"></i></button>
        </div>


    </div>



    <!--Accordion wrapper-->
    <!-- Accordion wrapper -->
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {

            $("#back").click(function(event) {
                var home_path = $("#home_path").val();
                window.location.href = home_path;
                //window.location.href = 'http://example.com';
            });


        });
    </script>
@endsection
