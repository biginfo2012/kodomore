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

        /*.custom-checkbox .custom-control-label::before {*/
        /*    left: -1.5rem;*/
        /*    margin-top: -1px !important;*/
        /*}*/

        /*.custom-radio .custom-control-input:checked~.custom-control-label:before {*/
        /*    left: -1.5rem;*/
        /*    top: 4px;*/
        /*}*/

        /*.custom-control-input:checked{*/
        /*    top: 1px;*/
        /*}*/

        .custom-control-label::before {
            left: -1.2rem;
            top: 4px;
        }
        .custom-control-label::after {
            left: -1.2rem;
            top: 4px;
        }

        .custom-control{
            padding-left: 1.2rem;
        }

        /*.custom-control-label::before{*/
        /*    left: -1.5rem;*/
        /*    top: 4px;*/
        /*}*/



        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
        }

        .btn-public-register {
            background-color: #216887 !important;
        }

        @media (min-width: 768px) {
            .custom-checkbox .custom-control-label::before {
                left: -1.2rem;
                margin-top: -1px !important;
            }

            .custom-radio .custom-control-input:checked~.custom-control-label:before {
                left: -1.2rem !important;
            }

            .custom-control-input:checked{
                top: 7px !important;
            }

            .custom-control-label::after {
                top: 15px !important;
            }

            .custom-control-label::before{
                top: 15px !important;
            }
        }
        .background-light-gray {
            /*background-color: #C4C4C4 !important;*/
        }

        .modal-backdrop {
            z-index: 100000 !important;
        }

        .modal {
            z-index: 100001 !important;
        }


    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">   > 会員ログイン･新規会員登録
        </div>

        <div class="card-body pb-0 text-title">
            <img class="height-1 img-icon mr-1 mb-1" src="{{asset('img/login-icon.png')}}"> 会員ログイン･新規会員登録
        </div>

        <div class="card-body py-1">
            <div class="w-100">
                <div class="flex mt-1 my-2">
                    <div class="top-menu left_bar">
                    </div>
                    <div class="w-100 text-title sub-menu pl-3">
                        コドモア会員の方
                    </div>

                </div>

            </div>
            <form class="needs-validation" id="login_form" >
                {{csrf_field()}}
                <div class="mt-2 text-small">
                    <label for="username" class="disabled background-light-gray w-100 p-1">会員ID(メールアドレス)</label>
                    <input type="text" id="username" class="form-control rounded" required>
                </div>
                <div class="mt-2 text-small">
                    <label for="password" class="disabled background-light-gray w-100 p-1">パスワード</label>
                    <input type="password" id="password" class="form-control rounded" required>
                </div>

                <div class="" style="display: flow-root">
                    <div class="flex-1 pt-1">
                        <div class="custom-control custom-checkbox text-medium-light">
                            <input type="checkbox" class="custom-control-input" id="remember_password" >
                            <label class="custom-control-label" for="remember_password">次回から自動ログインする</label>
                        </div>
                    </div>
                    <a class="mt-1 float-right text-small menu-icon text-decoration" href="<?=url('/forget');?>" >パスワードをお忘れの場合はこちら</a>
                </div>

                <div class="flex mt-2">
                    <button type="submit" class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_login">ログインする </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
            </form>


            <hr class="mt-3" id="back">
        </div>

        @if(str_contains($redirect, 'post/review'))
            <div class="card-body mx-5 mt-2 p-0" style="background-color: #FFEBEF">
                <p class="text-center text-title" style="line-height: 1.4">クチコミレビューを投稿するには<br>
                    会員登録をしてください</p>
                <p class="text-center text-medium-title">(園･学校関係者の方は投稿出来ません)</p>
            </div>
        @elseif(str_contains($redirect, 'articles/post/comment'))
        <div class="card-body mx-5 mt-2 p-0" style="background-color: #FFEBEF">
            <p class="text-center text-title" style="line-height: 1.4">コメントを投稿するには<br>
                会員登録をしてください</p>
            <p class="text-center text-medium-title">(園･学校関係者の方は投稿出来ません)</p>
        </div>
        @endif

        <div class="card-body pt-0">
            <div class="w-100">
                <div class="flex mt-1 my-2">
                    <div class="top-menu left_bar">
                    </div>
                    <div class="w-100 text-title sub-menu pl-3">
                        <span class="text-title">新規会員登録の方(無料)</span><span class="text-normal">1つのみ選択</span>
                    </div>
                </div>
            </div>

            <p class="mt-2 text-large text-blue-1">一般会員</p>
            <div class="row py-1 text-large">
                <div class="col-12 mb-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="radio_user_garden" name="radio_user_type" value="1">
                        <label class="custom-control-label" for="radio_user_garden">保護者(マタニティママ･祖父母含む)</label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="radio_user_public" name="radio_user_type" value="2">
                        <label class="custom-control-label" for="radio_user_public">学生本人(12歳以上)</label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="radio_user_normal" name="radio_user_type" value="3">
                        <label class="custom-control-label" for="radio_user_normal">その他</label>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-medium-light" style="line-height: 1.1;">
                        さらに国家資格や教育に関わる資格をお持ちの方は､公開プロフィール上にて､プロ認定のアイコンが付きます｡<span class="text-decoration detail menu-icon">詳しくはこちら</span>
                    </p>
                </div>
            </div>


{{--            <p class="mt-2 text-large text-blue-1">園･学校関係者 会員</p>--}}
{{--            <div class="row py-1 text-medium">--}}
{{--                <div class="col-4">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_child" name="radio_user_type" value="4">--}}
{{--                        <label class="custom-control-label" for="radio_user_child">保育士</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-5">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_kinder" name="radio_user_type" value="5">--}}
{{--                        <label class="custom-control-label" for="radio_user_kinder">幼稚園教員</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-3">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_master" name="radio_user_type" value="6">--}}
{{--                        <label class="custom-control-label" for="radio_user_master">園長</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_owner" name="radio_user_type" value="7">--}}
{{--                        <label class="custom-control-label" for="radio_user_owner">オーナー</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_teacher" name="radio_user_type" value="8">--}}
{{--                        <label class="custom-control-label" for="radio_user_teacher">学校教員</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_operator" name="radio_user_type" value="9">--}}
{{--                        <label class="custom-control-label" for="radio_user_operator">学校運営者</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_relation" name="radio_user_type" value="10">--}}
{{--                        <label class="custom-control-label" for="radio_user_relation">学校広報</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_instructor" name="radio_user_type" value="11">--}}
{{--                        <label class="custom-control-label" for="radio_user_instructor">塾･スクール講師</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="custom-control custom-radio">--}}
{{--                        <input type="radio" class="custom-control-input" id="radio_user_school_operator" name="radio_user_type" value="12">--}}
{{--                        <label class="custom-control-label" for="radio_user_school_operator">塾･スクール運営者</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="flex mt-3">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white background-gray" id="btn_register">新規会員登録 </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>

            @if(!str_contains($redirect, 'post/review') && !str_contains($redirect, 'articles/post/comment'))
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-title-large text-white btn-public-register" id="btn_republic_register" style="line-height: 1.1;border: none !important; box-shadow: inset 0px -18px 34px -14px #161616;
">園･学校などスクール関係者の登録はこちら </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>
            @endif




        </div>

        <div class="mt-2 text-medium text-center">
            <p>以下をご確認のうえ登録を行ってください</p>
            <p class="text-small mt-1">※コドモアの利用規約</span>にはコドモアのご利用に</p>
            <p class="text-small">関する規定が定められています｡</p>
            <p class="menu-icon text-decoration mt-2" name="contact">コドモア利用規約はこちら</p>
        </div>

        <div class="mt-3 text-medium text-center">
            <p>完了メールを正しく受け取るために</p>
            <p>【info@kodomore-edu.com】からの</p>
            <p>メールの受信許可をしてください｡</p>
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

@section('modal')
    <div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin: 1rem;">

            <div class="modal-content background-transparent" >
                <div class="modal-body py-0 background-white" style="border-radius: 1rem;">
                    <div class="position-absolute" style="right: 0.5rem; top: 0.5rem;">
                        <img class="img-icon height-1-half" src="{{asset('img/child-delete.png')}}" data-dismiss="modal">
                    </div>
                    <div class="card-body px-0 pt-4">
                        <div class="d-flex justify-content-start text-large text-3">
                            <img class="mt-0 img-icon height-2" style="min-width: unset; z-index: 1" src="{{asset('img/pro-mark.png')}}">
                            <p class="py-1 pr-2" style="background: #D6F2F4; padding-left: 2rem; margin-left: -2rem;">KODOMOREプロ認定資格</p>
                        </div>

                        <p class="text-medium-xs mt-2">下記の資格を取得している会員様のプロフィールには､KODOMORE［コドモア］プロ認定資格取得者として､アイコンが掲載されます｡</p>
                        <p class="text-medium-xs mt-2">一般会員登録後にマイページの｢<span style="color: #FF557E">生活･技能の資格保有者の方プロ会員申請する</span>｣より申請ができます｡</p>
                        <p class="text-medium-xs mt-2">プロ会員とは園･学校･スクール(塾)について紹介コメントを投稿できたり､個人の主観やまとめ情報などを記事コンテンツ投稿できる会員様です｡</p>
                        <p class="text-medium-xs mt-2">KODOMORE［コドモア］編集部が不適切と判断した内容の記事コンテンツは反映されない場合がありますのでご了承ください｡</p>

                        <div class="mt-2" style="width: 100%; height: 2px; background-color: black; margin-bottom: 2px"></div>
                        <div class="" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>

                        <p class="text-large-xs" style="color: #216887">不動産･建築･建物(以下の国家資格)</p>
                        <div class="row mt-2">
                            <div class="col-12 text-medium-xs"><span class="text-small">●</span> 一級建築士　<span class="text-small">●</span> 二級建築士　<span class="text-small">●</span> 木造建築士</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 宅地建物取引士　<span class="text-small">●</span> マンション管理士</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 管理業務主任者　<span class="text-small">●</span> 賃貸不動産経営管理士</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 不動産鑑定士　<span class="text-small">●</span> 建築施工管理技士</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 電気主任技術者</div>
                        </div>

                        <div class="mt-2" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>
                        <p class="text-large-xs" style="color: #216887">金融と税(以下の国家資格)</p>
                        <div class="row mt-2">
                            <div class="col-12 text-medium-xs"><span class="text-small">●</span> 税理士　<span class="text-small">●</span> ファイナンシャルプランナー</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 会計士　<span class="text-small">●</span> 資金業務取扱主任者</div>
                        </div>
                        <div class="mt-2" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>
                        <p class="text-large-xs" style="color: #216887">教育･生活(以下の国家資格､他)</p>
                        <div class="row mt-2">
                            <div class="col-12 text-medium-xs"><span class="text-small">●</span> 医師　<span class="text-small">●</span> 看護師　<span class="text-small">●</span> 保育士　<span class="text-small">●</span> 幼稚園教諭</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 小学校教諭　<span class="text-small">●</span> 中学校教諭</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 高等学校教諭　<span class="text-small">●</span> 特別支援学校教諭</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 博士　<span class="text-small">●</span> 助教授　<span class="text-small">●</span> 大学講師　<span class="text-small">●</span> 准教授</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 教授　<span class="text-small">●</span> 社会福祉士　<span class="text-small">●</span> 介護支援専門員</div>
                            <div class="col-12 text-medium-xs mt-2"><span class="text-small">●</span> 弁護士　<span class="text-small">●</span> 行政書士　<span class="text-small">●</span> 管理栄養士</div>
                        </div>


                        <div class="mt-2" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>
                        <p class="text-large-xs" style="color: #216887">経営</p>
                        <div class="row mt-2">
                            <div class="col-12 text-medium-xs"><span class="text-small">●</span> 会社代表　<span class="text-small">●</span> 会社役員</div>

                        </div>
                        <div class="mt-2" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>
                        <p class="text-medium-xs mt-2">※資格･登録には審査があります｡上記以外の資格をお持ちの場合は､プロフィールの資格欄にご記入いただけます｡</p>

                        <div class="d-flex mt-3 justify-content-center">
                            <span class="text-decoration detail-back" style="color: #335BC1">まずは一般会員登録をする</span>
                        </div>
                        <div class="mt-3" style="width: 100%; height: 1px; background-color: black; margin-bottom: 2px"></div>
                        <div class="" style="width: 100%; height: 2px; background-color: black;"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var activity_status = 0;
            $('.detail').click(function () {
                $("#modal_alert").modal('show');
            })
            $('.detail-back').click(function () {
                $("#modal_alert").modal('hide');
                window.location.href = '#btn_login';
            })
            $("#move_garden").click(function(event) {
                //window.history.back();
                window.location.href = home_path + '';
            });

            $("[name=contact]").click(function(event) {
                window.location.href = home_path + '/contact#terms';
                //window.location.href = 'http://example.com';
            });

            $("[name=guide]").click(function(event) {
                window.location.href = home_path + '/guide';
                //window.location.href = 'http://example.com';
            });

            function init() {
                var selected = $("input[name='radio_user_type']:checked").val();
                if(selected > 0) {
                    $("#btn_register").removeClass("background-gray");
                }
            }

            init();

            $("#btn_register").click(function(event) {
                var selected = $("input[name='radio_user_type']:checked").val();

                if(selected == 3) {
                    window.location.href = home_path + '/register/normal';
                } else if(selected == 2) {
                    window.location.href = home_path + '/register/public';
                } else if(selected == 1){
                    window.location.href = home_path + '/register/parent';
                } else if(selected > 3) {
                    selected -= 3;
                    window.location.href = home_path + '/register/garden?type=' + selected;
                }


                //window.location.href = 'http://example.com';
            });
            $("#btn_republic_register").click(function(event) {
                window.location.href = home_path + '/register/republic';
            });



            $("#btn_login").click(function(event) {
                event.preventDefault();
                var forms = document.getElementById('login_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var url = home_path + '/ajax/login';
                    $.ajax({
                        url:url,
                        type:'post',
                        data: {
                            name: username,
                            password: password
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.status == false) {
                                alertify.error("ログインに失敗しました");
                            }
                            else if(response.status == 'parent') {
                                alertify.success("ログイン成功");
                                if(response.redirect_url !== undefined){
                                    if(response.redirect_url === 'article-comment'){
                                        var url = localStorage.getItem('url');
                                        console.log(url);
                                        window.location.href = home_path +url;
                                        return;
                                    }
                                    console.log(response.redirect_url);
                                    window.location.href = home_path +'/' + response.redirect_url;
                                    return ;
                                }
                                window.location.href = home_path + '/parent/my-page';
                            }else {

                                alertify.success("ログイン成功");
                                if(response.redirect_url !== undefined){
                                    if(response.redirect_url === 'article-comment'){
                                        var url = localStorage.getItem('url');
                                        console.log(url);
                                        window.location.href = home_path +url;
                                        return;
                                    }
                                    console.log(response.redirect_url);
                                    window.location.href = home_path + '/' +response.redirect_url;
                                    return ;
                                }
                                window.location.href = home_path;
                            }
                        },
                        error: function () {
                            alertify.error("ログインに失敗しました");
                        }
                    });

                }

                //window.location.href = 'http://example.com';
            });

            $('input[type=radio][name=radio_user_type]').change(function() {
                $("#btn_register").removeClass("background-gray");
                activity_status = 1;
            });



            $('input[type=radio][name=radio_garden_type]').change(function() {
                $("#btn_register").removeClass("background-gray");
                activity_status = 2;
            });
        });
    </script>
@endsection
