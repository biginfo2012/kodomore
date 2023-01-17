@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園､小学校･中学校･高校 入学と受験情報
@endsection

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

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }

        .sky-border {
            border: 2px solid #B6EEEC;
        }

        input{
            border: 1px solid #666666 !important;
        }
        .custom-control-label::before {
            top: 1px !important;
            left: -1.2rem !important;
        }
        .custom-control-label::after {
            top: 1px !important;
            left: -1.2rem !important;
        }
        .fa-icon-right {
            position: absolute;
            right: 1em;
        }

        .fa-icon-left {
            position: absolute;
            left: 0.2em;
        }

        .avatar {
            width: 2.5rem;
            height: 2.5rem;
        }
        .news-background {
            background-image: url("{{asset('img/news-border.png')}}");
            background-size: contain;
        }


    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン</span> > 投稿確認</p>

        </div>


        <div class="card-body py-1 px-2">



            <form class="needs-validation" novalidate id="validation_form" action="<?=url('/post/finish');?>" method="post">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="garden_id" value="{{$garden_id}}">
                <input type="hidden" name="post_name" value="{{$post_name}}">
                <input type="hidden" name="nick_name" value="{{$nick_name}}">
                <input type="hidden" name="profile_img_setting" value="{{$profile_img_setting}}">
                <input type="hidden" name="relation_type" value="{{$relation_type}}">
                <input type="hidden" name="relation_value" value="{{$relation_value}}">
                <input type="hidden" name="total_rate" value="{{$total_rate}}">
                <input type="hidden" name="total_text" value="{{$total_text}}">
                <input type="hidden" name="title" value="{{$title}}">
                <input type="hidden" name="rate" value="{{json_encode($rate)}}">
                <input type="hidden" name="image" value="{{json_encode($image)}}">
                <input type="hidden" name="post_user_name" value="{{$post_user_name}}">
                <input type="hidden" name="relation_text" value="{{$relation_text}}">
                <p class="text-title background-dark-blue text-white p-1 mt-3">投稿する園･学校</p>
                <div class="my-2 background-light-gray mt-3">
                    <p class="text-small p-1 ">
                        投稿する園･学校
                    </p>
                </div>
                <p class="mb-2 text-large-xs">{{$gardenDetail[0]->garden_name}}</p>

                <div class="card-body news-background" style="margin-left: -0.5rem; margin-right: -0.5rem; !important;">

                    <div class="blog-answer rounded px-3 pb-3 pt-0" style="background-color: white">
                        <div class="d-flex position-relative mb-1 pb-1" style="border-bottom: 1px solid #ABABAB">
                            <img src="{{asset('img/user2.png')}}" class="avatar mr-1 mt-n1">
                            <div>
{{--                                <h6 class="text-large-xs mb-0">子どもの生きる力を育てる幼稚園</h6>--}}
                                <div class="d-flex mt-3">
                                    <p class="text-normal-title">投稿ネーム{{$post_user_name}}</p>
                                    <p class="text-small blog-answer-user" style="position: absolute;right: 0;bottom: 0;">{{$relation_text}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 float-right mb-2 pb-1" style="border-bottom: 1px solid #ABABAB">
                            <div class="d-flex float-right" style="height: fit-content; ">
                                <p class="text-small float-right mt-2" style="color: #4D4D4D">総合評価{{$total_rate}}点</p>
                                <div class="pl-1">
                                    <div class="rateyo"
                                         data-rateyo-rating="{{$total_rate}}"
                                         data-rateyo-num-stars="5"
                                         data-rateyo-rated-fill="#31BCC7"
                                         data-rateyo-normal-fill="#CBF7F6"
                                         data-rateyo-score="4"></div>
                                    {{--                    <span class='score'>0</span>--}}
                                    {{--                    <span class='result'>0</span>--}}
                                </div>
                            </div>
                        </div>

                        <p class="text-small"><span style="color: #216887">●</span> ICT導入度 {{$rate[0]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[0]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 授業の工夫度 {{$rate[1]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[1]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 全体的な講師の質 {{$rate[2]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[2]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 保護者との連携充実度 {{$rate[3]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[3]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> いじめ対策 {{$rate[4]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[4]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 校風の良さ {{$rate[5]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[5]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 生徒の進路満足度 {{$rate[6]['rate']}}点</p>
                        <p class="text-small ml-3">{{$rate[6]['rate_text']}}</p>
                        <p class="text-small mt-2"><span style="color: #216887">●</span> 部活や課外レッスンの充実度 {{$rate[7]['rate']}}点</p>
                        <p class="text-small ml-3 mb-2">{{$rate[7]['rate_text']}}</p>


                        <p class="text-medium-title pt-2" style="border-top: 1px solid #ABABAB">{{$title}}</p>
                        <p class="text-small">{{$total_text}}</p>
                        @foreach($image as $item)
                            <img class="height-3 img-icon" src="{{asset('/storage/img/garden/'. $item['url'])}}">
                        @endforeach
{{--                        <img class="height-3 img-icon" src="{{asset('img/news_2.jpg')}}">--}}
{{--                        <img class="height-3 img-icon" src="{{asset('img/news_2.jpg')}}">--}}
                        <p class="text-small">投稿日：{{$time}}</p>
                        {{--        <div class="d-flex text-medium">--}}
                        {{--            <img class="news-border" src="{{asset('img/blog_last.png')}}">--}}
                        {{--        </div>--}}
                    </div>
                </div>

            </form>

        </div>
        <div class="card-body py-1">
            <div class="flex mt-2">
                <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-blue" id="btn_back" style="color: #216887; border-color: #216887 !important;">内容を修正する <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}"></button><i class="text-blue fas fa-angle-left ml-1"></i>
            </div>

            <div class="mt-2 custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                <label class="custom-control-label text-medium-xs" for="radio_accept"><a class="menu-icon text-decoration" id="privacy" href="{{url('/blog-guide')}}">｢投稿ガイドライン｣</a>に同意します｡</label>
            </div>

            <div class="mt-1 flex justify-content-center">
                <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_submit">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
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
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
    <script language="javascript" type="text/javascript">
        var count_old = 2;
        var count_cur = 2;
        var is_activity = false;
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
            });
        });
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            // $('input[type=checkbox][name=radio_accept]').change(function() {
            //     $("#btn_submit").removeClass("background-gray");
            //     is_activity = true;
            // });

            $('input[type=checkbox][name=radio_accept]').change(function() {
                if($(this)[0].checked){
                    $("#btn_submit").removeClass("background-gray");
                    is_activity = true;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    is_activity = false;
                }
            });

            $('#btn_submit').click(function () {
                if(is_activity){
                    var forms = document.getElementById('validation_form');
                    forms.submit();
                }

            });

            function init() {
                var selected = $("input[name='radio_accept']:checked").val();
                console.log(selected);
                if(selected > 0) {
                    $("#btn_submit").removeClass("background-gray");
                    is_activity = true;
                }
            }

            init();


            $(document).on('click', "[name='image-add']", function() {
                event.preventDefault();
                console.log(this)
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                $("#image_content_add_index_" + index).click();
            });

            $(document).on('change', "[name='image-content']", function() {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                readURL(this, index);
            });

            function readURL(input, index) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        $("#img_body_index_" + index).attr('src', e.target.result);
                        $("#img_body_content_index_" + index).removeClass('d-none');
                        $("#img_body_content_index_" + index).addClass('d-flex');
                        $("#img_empty_index_" + index).addClass('d-none');
                        $("#img_empty_index_" + index).removeClass('d-flex');
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $('#btn_register').click(function () {
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {

                }


            })


            $("#btn_register").click(function(event) {
                var old_gardens = [];
                for(var i = 1; i < count_old; i ++) {
                    var garden_id = $('input[name=radio_school_index_' + i + ']:checked').val();
                    if(garden_id > 0) {
                        var garden_detail = $("#garden_detail_index_" + i).val();
                        var garden_info = {};
                        garden_info['id'] = garden_id;
                        garden_info['detail'] = garden_detail;
                        old_gardens.push(garden_info);
                    }
                }

                var cur_gardens = [];
                for(var i = 1; i < count_cur; i ++) {
                    var garden_id = $('input[name=radio_cur_school_index_' + i + ']:checked').val();
                    if(garden_id > 0) {
                        var garden_detail = $("#garden_cur_detail_index_" + i).val();
                        var garden_info = {};
                        garden_info['id'] = garden_id;
                        garden_info['detail'] = garden_detail;
                        cur_gardens.push(garden_info);
                    }
                }
                var garden_detail = {};
                garden_detail['old'] = old_gardens;
                garden_detail['cur'] = cur_gardens;
                var garden_str = JSON.stringify(garden_detail);
                $("#garden_info").val(garden_str);
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {

                    var url = home_path + "/ajax/check/user";
                    var email = $("#email").val();
                    $.ajax({
                        url:url,
                        type:'post',
                        data: {
                            email: email
                        },
                        success: function (response) {
                            if(response['status'] == false) {
                                forms.submit();
                            } else {
                                alertify.error("ユーザーが存在します");
                            }
                        },
                        error: function () {
                        }
                    });
                }
                //window.location.href = 'http://example.com';
            });


            function getCityList(prefecture_id, index, type) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        if(type == 0) {
                            $(".old_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_city_index_" + index).append("<option class='old_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        } else {
                            $(".cur_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_cur_city_index_" + index).append("<option class='cur_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        }

                    }
                });
            }

            function changeEvent() {
                $(document).on('change', "[name=old_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 0);
                });

                $(document).on('change', "[name=cur_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 1);
                });

                $(document).on('click', "[name=btn_old_search]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_str_index_" + index).val();
                    var prefecture_id = $("#search_prefecture_index_" + index).val();
                    var city_id = $("#search_city_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';

                    if(city_id > 0) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_school_index_" + index);
                                $("#old_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });

                $(document).on('click', "[name=btn_cur_search]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_cur_str_index_" + index).val();
                    var prefecture_id = $("#search_cur_prefecture_index_" + index).val();
                    var city_id = $("#search_cur_city_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';

                    if(city_id > 0) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_cur_school_index_" + index);
                                $("#cur_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });
            }

            changeEvent();





            $("#btn_add_old").click(function(event) {
                var content = $("#add_old_school").html();

                content = content.replace(/_index/g, "_index_" + count_old);


                $("#old_school_list").append(content);
                $("#old_index_" + count_old).removeClass('d-none');
                count_old = count_old + 1;
            });

            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
                //window.location.href = 'http://example.com';
            });




            $("#btn_add_current").click(function(event) {
                var content = $("#add_current_school").html();
                content = content.replace(/_index/g, "_index_" + count_cur);


                $("#cur_school_list").append(content);
                $("#cur_index_" + count_old).removeClass('d-none');
                count_cur = count_cur + 1;
            });

        });
    </script>
@endsection
