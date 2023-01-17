@extends('layouts.app')

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
        .main-image{
            width: 75px;
            height: 75px;
            background: #B5D4FA;
            border-radius: 50%;
        }
        .person-img{
            width: 45%;
            margin-top: 19px;
        }
        .camera-img{
            width: 25%;
            display: block;
            margin: auto;
            margin-top: -3px;
        }

        .setting-text{
            position: absolute;
            bottom: 0;
            width: fit-content;
            right: 0;
        }

        .border-line{
            width: 100%;
            height: 4px;
            background: #ACE4E9;
        }

        .icon-container{
            background: #E2F5F7;
            height: 100%;
        }

    </style>
@endsection

@section('content')
    <input type="hidden" id="user_id" value="{{$user->id}}">
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> > <span
                id="move_prefecture" class="top-title-tag">ログイン</span> > マイページ
        </div>
        <div class="card">
            <div class="card-body d-flex position-relative">
                <div class="main-image text-center" id="btn_add_img">
                    <img src="{{asset('img/person-my-page.png')}}" class="person-img">
                    <img src="{{asset('img/camera.png')}}" class="camera-img">
                </div>
                <input id="img_default" type="file" accept="image/*" name="file" style="display:none;" />
                <div class="ml-3 my-auto">
                    <p class="text-title">{{$user->first_name}}{{$user->second_name}}</p>
                    @if(isset($user->nickname))
                        <p class="text-title">{{$user->nickname}}</p>
                    @endif

                    <p class="text-title">さんのマイページ</p>
                </div>
                <label class="setting-text mr-3 mb-0">
                    <a class="text-medium-xs menu-icon text-decoration " href="{{url('/parent/setting')}}">会員情報･設定</a>
                </label>
            </div>
            <div class="border-line mt-2">
            </div>
            <div class="card-body pt-1">
                <div class="row">
                    <div class="col-4 px-1 my-1">
                        <div class=" text-center icon-container pt-4 pb-1 rounded">
                            <a class="" href="{{url('/parent/mail-list')}}">
                                <img class="height-1 img-icon" src="{{asset('img/mailbox.png')}}">
                                <span class="text-small" style="position: absolute; background: #FF00FF; color: white; border-radius: 12px;margin-left: -7px; padding: 0 5px; top: 17px">{{$message_cnt}}</span>
                                <p class="text-normal mt-2 text-blue-1 px-1">メッセージ一覧</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/question-list')}}">
                                <img class="height-1 img-icon mt-1 mb-1 style="height: 1.3rem" src="{{asset('img/faq-icon.png')}}">
                                <p class="text-normal mt-3 text-blue-1 px-1 pt-1" style="line-height: 1.1">園･学校･スクール
                                    お問合わせ履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-4 pb-1 rounded">
                            <a class="" href="{{url('/parent/event-list')}}">
                                <img class="height-1 img-icon mb-1" style="height: 1.5rem" src="{{asset('img/reservation.png')}}">
                                <p class="text-normal mt-2 text-blue-1 px-1">予約状況確認</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/search-list')}}">
                                <img class="height-1 img-icon mt-1" src="{{asset('img/search-history-icon.png')}}">
                                <p class="text-normal mt-3 text-blue-1 px-1">閲覧履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/blog-list')}}">
                                <img class="height-1 img-icon mt-1" style="height: 1.3rem" src="{{asset('img/review.png')}}">
                                <p class="text-normal mt-3 text-blue-1 px-1 pt-1" style="line-height: 1.1">クチコミレビュー<br>
                                    履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-4 pb-1 rounded">
                            <a class="" href="{{url('/parent/web-list')}}">
                                <img class="height-1 img-icon mb-1" style="height: 1.3rem" src="{{asset('img/web-export.png')}}">
                                <p class="text-normal mt-2 text-blue-1 px-1">WEB出願履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/favourite-list')}}">
                                <img class="height-1 img-icon mt-2" style="height: 1.3rem" src="{{asset('img/favourite-line.png')}}">
                                <p class="text-normal mt-3 text-blue-1 px-1">お気に入り</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/hot-line')}}">
                                <img class="height-1 img-icon mt-2" style="height: 1.7rem" src="{{asset('img/hot-line.png')}}">
                                <span class="text-small" style="position: absolute; background: #FF00FF; color: white; border-radius: 12px;margin-left: -7px; padding: 0 5px; top: 11px">1</span>
                                <p class="text-normal mt-2 text-blue-1 px-1" style="line-height: 1.1">スクール<br>
                                    ホットライン</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-4 pb-1 rounded">
                            <a class="" href="{{url('/parent/data-list')}}">
                                <img class="height-1 img-icon mb-1" style="height: 1.3rem" src="{{asset('img/data-require.png')}}">
                                <p class="text-normal mt-2 text-blue-1 px-1">資料請求履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-2 pb-1 rounded">
                            <a class="" href="{{url('/parent/child-list')}}">
                                <img class="height-1 img-icon mt-1" style="height: 1.5rem" src="{{asset('img/school-history-icon.png')}}">
                                <p class="text-normal mt-2 text-blue-1" style="line-height: 1.1">[入園･入学予定]
                                    [現在通っている]
                                    [卒園･卒業校]</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/personal-chat')}}">
                                <img class="height-1 img-icon my-1" style="height: 1.7rem" src="{{asset('img/personal-message.png')}}">
                                <span class="text-small" style="position: absolute; background: #FF00FF; color: white; border-radius: 12px;margin-left: -7px; padding: 0 5px; top: 11px">1</span>
                                <p class="text-normal mt-2 text-blue-1 px-1">個別相談</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1" >
                        <div class="text-center icon-container pt-3 pb-1 rounded" style="background-color: #E6E6E6 !important;">
                            <a class="" href="">
                                <img class="height-1 img-icon mb-1" style="height: 1.6rem" src="{{asset('img/gray-snap.png')}}">
                                <p class="text-normal mt-2 text-gray px-1" style="line-height: 1.1">KODOMORE<br>
                                    スナップ購入履歴</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-2 pb-1 rounded" style="background-color: #D3E1E7 !important;">
                            <a class="" href="">
                                <img class="height-1 img-icon" style="height: 2rem" src="{{asset('img/pro-ask.png')}}">
                                <p class="text-normal mt-1 text-blue-1" style="line-height: 1.1">生活･技能の資格<br>
                                    保有者の方<br>
                                    プロ会員申請する</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1" >
                        <div class="text-center icon-container pt-2 pb-1 rounded" style="background-color: #D3E1E7 !important;">
                            <a class="" href="">
                                <img class="height-1 img-icon mb-1" style="height: 2.2rem" src="{{asset('img/blog-write.png')}}">
                                <p class="text-normal mt-2 px-1 text-blue-1" style="line-height: 1.1">記事を書いて<br>
                                    投稿する</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 px-1 my-1">
                        <div class="text-center icon-container pt-3 pb-1 rounded">
                            <a class="" href="{{url('/parent/personal-chat')}}">
                                <img class="height-1 img-icon" style="height: 2.1rem" src="{{asset('img/follow.png')}}">
                                <span class="text-small" style="position: absolute; background: #FF00FF; color: white; border-radius: 12px;margin-left: -7px; padding: 0 5px; top: 11px">1</span>
                                <p class="text-normal mt-2 text-blue-1 px-1">フォロー</p>
                            </a>
                        </div>
                    </div>

                </div>

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
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $("#btn_add_img").click(function(event) {
                event.preventDefault();
                $("#img_default").click();
            });
        })

    </script>
@endsection
