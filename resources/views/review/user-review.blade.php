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

        .background-gray{
            background-color: #C4C4C4 !important;
        }

        .custom-radio .custom-control-label::before {
            border-radius: 38%;
            top: 0.25rem;
        }
        .custom-radio .custom-control-label::after {
            top: 0.25rem !important;
        }
        .avatar {
            width: 2.5rem !important;
            height:2.5rem !important;
        }
        .news-background {
            background-image: url("{{asset('img/news-border.png')}}");
            background-size: contain;
        }
        .blog-answer {
            background-color: white;
            padding: 1rem;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span id="move_my_page" class="top-title-tag">ログイン </span> > <span id="" class="top-title-tag">マイページ</span> > 返事をする(1回のみ)</p>

        </div>

        <div class="card-body text-title pb-2 pr-1">
            <img class="height-4 img-icon mb-1" src="{{asset('img/back-icon.png')}}">返事をする(1回のみ)
        </div>

        <div class="card-body py-1">
            <p class="text-title background-dark-blue text-white p-1 mt-0">返事内容確認</p>
        </div>
        <div class="card-body news-background mt-2">

            <div class="blog-answer rounded position-relative">
                <div class="d-flex position-relative mb-1 pb-2" style="border-bottom: 1px solid #ABABAB">
                    <img src="{{asset('img/blue-user.png')}}" class="avatar mr-2">
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

                <div class="detail">
                    <p class="text-small"><span style="color: #216887">●</span> 授業の工夫度 {{$review->eval2_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval2_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> 全体的な講師の質 {{$review->eval3_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval3_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> 保護者との連携充実度 {{$review->eval4_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval4_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> いじめ対策 {{$review->eval5_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval5_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> 校風の良さ {{$review->eval6_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval6_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> 生徒の進路満足度 {{$review->eval7_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval7_text}}</p>
                    <p class="text-small"><span style="color: #216887">●</span> 部活や課外レッスンの充実度 {{$review->eval8_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval8_text}}</p>


                    <p class="text-medium-title pt-2" style="border-top: 2px solid #ABABAB">{{$review->title}}</p>
                    <p class="text-small">{{$review->total_text}}</p>
                    @if(isset($review->image))
                        @foreach($review->image as $image)
                            <img class="height-3 img-icon" src="{{asset('/storage/img/garden/'. $image->img)}}">
                        @endforeach
                    @endif
                    <p class="text-small">投稿日：{{$review->up_date}}</p>

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

                </div>

            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" name="complete" novalidate id="validation_form" method="post" action="{{url('/replay/post-user/view')}}">
                {{csrf_field()}}

                <input type="hidden" name="post_user_id" value="{{$post_user_id}}">
                <input type="hidden" name="review_id" value="{{$review->id}}">
                <input type="hidden" name="post_order" value="2">

                <div class="d-flex justify-content-center background-light-gray">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        返事は1回となります
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-small" placeholder="" rows="5" name="limit-length" maxlength="1000" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute" style="right: 0">
                        0 /1000</p>
                </div>

                <div class="mt-4 flex justify-content-center">
                    <button type="submit" class="background-gray gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_submit" disabled>入力内容を確認する</button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
            </form>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
    <script language="javascript" type="text/javascript">
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
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });
            $("#move_setting").click(function(event) {
                window.location.href = home_path + '/parent/setting';
                //window.location.href = 'http://example.com';
            });

            $("#btn_submit").click(function (event) {
                event.preventDefault();
                document.complete.submit();
            });

            $("[name='limit-length']").on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p').html(length + '/' + maxLength);
                if(length>0){
                    $("#btn_submit").removeClass("background-gray");
                    $('#btn_submit')[0].disabled = false;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    $('#btn_submit')[0].disabled = true;
                }
            })

        });
    </script>
@endsection
