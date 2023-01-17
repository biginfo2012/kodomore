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

        form:invalid button{
            background-color: #C4C4C4 !important;
        }

        .form-control{
            border: 1px solid #808080 !important;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">   > お問合わせ
        </div>

        <div class="card-header  align-items-center d-flex">
            <img class="img-icon height-1-half" src="{{asset('img/question-icon.png')}}">
            <div class="ml-2 text-title" >
                お問合わせ
            </div>
        </div>



        <div class="card-body py-1">
            <p class="text-medium-xs">
                KODOMOREの[コドモア]ご利用ありがとうございます｡KODOMORE[コドモア]に関するご質問やご不明な点などございましたら､下記フォームより必要事項をご記入の上､お問合わせください｡ご返信までお時間をいただく場合がございますので､あらかじめご了承ください｡
            </p>
            <p class="text-medium-xs">
                お問合わせ前に<a class="menu-icon text-decoration" href="{{url('/frequent')}}">よくある質問(FAQ)</a>をご確認ください｡
            </p>
        </div>

        <form class="needs-validation" action="<?=url('/question/confirm');?>" method="post">
            {{csrf_field()}}
            <div class="card-body mt-3 py-2 sub-menu text-small ">
                <div class="d-flex justify-content-center">
                    <p class="text-medium-xs flex-1">
                        お問合わせ種類
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </div>
            <div class="card-body">
                <div class="px-2 ">
                    <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs" name="type">
                        <option value="0" selected>選択してください</option>
                        <option value="1">コドモアについて</option>
                        <option value="2" >会員情報について</option>
                        <option value="3" >ご利用方法について</option>
                        <option value="4" >その他</option>
                    </select>
                </div>

            </div>

            <div class="card-body mt-3 py-2 sub-menu text-small ">
                <div class="d-flex justify-content-center">
                    <p class="text-medium-xs flex-1">
                        お問合わせ内容
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <textarea class="form-control px-2 py-1 text-medium-xs" rows="6" name="content" placeholder="お問合わせ内容をできるだけ詳しくご記入ください(1,000文字以内)" required></textarea>
                </div>

            </div>

            <div class="card-body mt-3 py-2 sub-menu text-small ">
                <div class="d-flex justify-content-center">
                    <p class="text-medium-xs flex-1">
                        お名前
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <div class="d-flex">
                        <input  class="form-control text-small require mr-1"  placeholder="姓(例：山田)" name="parent_first" required>
                        <input  class="form-control text-small require mr-0"  placeholder="名(例：太郎)" name="parent_second" required>
                    </div>

                    <div class="d-flex mt-2">
                        <input  class="form-control text-small require mr-1"  placeholder="セイ(例：ヤマダ)" name="first_name" required>
                        <input  class="form-control text-small require mr-0"  placeholder="メイ(例： タロウ)" name="second_name" required>
                    </div>
                </div>

            </div>

            <div class="card-body mt-3 py-2 sub-menu text-small ">
                <div class="d-flex justify-content-center">
                    <p class="text-medium-xs flex-1">
                        メールアドレス
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <input  class="form-control text-medium-xs require mr-1"  placeholder="半角英数" name="email" required>
                </div>

            </div>

            <div class="card-body mt-3 py-2 sub-menu text-small ">
                <div class="d-flex justify-content-center">
                    <p class="text-medium-xs flex-1">
                        電話番号[携帯電話可]
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <input  class="form-control text-medium-xs require mr-1"  placeholder="半角数字(ハイフンなし)" name="mobile" required>
                    <p class="text-small">※連絡がつきやすい電話番号をご記入ください｡</p>
                </div>

            </div>

            <div class="card-body py-1">

                <div class="mt-3 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_register">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
                <div class="mt-3 text-medium text-center">
                    <p>メールを正しく受け取るために</p>
                    <p>【info@kodomore-edu.com】からの</p>
                    <p>メールの受信許可をしてください｡</p>
                </div>

            </div>
        </form>





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
            var home_path = $("#home_path").val();
            $("#btn_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_register").click(function(event) {
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    forms.submit();
                }
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
