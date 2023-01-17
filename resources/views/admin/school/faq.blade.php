@extends('admin.layouts.app')

@section('nav')
    @include('admin.layouts.navbar')
@endsection

@section('css4page')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <style>
        .main-content {
            background-color: #F2F2F2;
        }

        .tag-title {
            border-top: 1px solid #808080;
            background-color: #DAF6F6;
            padding-top: 0;
            padding-bottom: 0;
            color: white;
        }

        .border-weight {
            background-color: #4786A0;
            border: 3px solid #B3b3B3;
        }

        .border-bottom {
            border-bottom: 2px solid #808080 !important;
        }

        .border-right {
            border-right: 2px solid #808080 !important;
        }

        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }

        #garden_basic {
            width: 88%;
        }

        .card {
            background-color: transparent;
        }

        .card > .border-light-bottom:last-child {
            border-bottom: 0px !important;
        }

        .left-bottom {
            left: 0;
            bottom: 0;
        }

        .custom-control-label::before {
            top: .25rem;
            left: -1.25rem;
        }

        .img-source {
            border: 1px dashed #919191;
        }

        .h-100 {
            height: 100%;
        }

        .img-content {
            border-radius: .5rem;
            border: 1px solid #919191;
        }

        .icon-add {
            width: auto;
            height: 24px;
        }


        .custom-control-label {
            white-space: nowrap;
        }

        .nowrap {
            white-space: nowrap;
        }

        .border-crop {
            border: 1px solid;
        }

        .btn-save {
            font-weight: 800;
            background-color: #2BAFFF;
            {{--background-image: url("{{asset('img/top-search.png')}}");--}}
               border: 0px;
            background-repeat: round;
            color: white;
            border-radius: 5px;
        }

        .btn-save:focus {
            outline: 0px !important;
        }

        .btn-save:active {
            color: #2BAFFF;
            background-color: white;
        }

        @media (min-width: 768px) {
            .btn-save:hover {
                color: #2BAFFF;
                background-color: white;
            }
        }

        input[type=time] {
            width: auto;
        }

        .custom-checkbox .custom-control-label::before {
            left: -1.5rem;
        }

        .custom-radio .custom-control-label::before {
            left: -1.5rem;
        }


        .custom-control-label::after {
            top: .25rem;
        }

        .empty-image {
            width: 2.8rem;
            height: 2rem;
        }

        [name='image_content_add_button']:hover {
            cursor: default;
        }

        [name='image_content_remove_button']:hover {
            cursor: default;
        }

        .text-small-admin {
            font-size: 14px;
            font-family: YugoMedium;
        }

        .active-border {
            border-color: red;
        }

        .require {
            font-size: 14px;
            font-family: YugoMedium;
            background-color: #FF557E !important;
            color: white !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            padding: 4px;
        }

        .text-dark-blue {
            color: #216887 !important;
        }

        .radio-logo-width-img {
            padding-bottom: 40% !important;
        }

        .radio-logo-height-img {
            padding-bottom: 125% !important;
        }

        [name=minus-notification] {
            z-index: 10;
        }


        .btn-sky {

        }

        form:invalid button[type='submit'] {
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .map-overlay {
            background-color: #666666DD;
            left: -4rem;
            right: -4rem;
            bottom: 40px;
        }

        .map-overlay:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 0;
            height: 0;
            border-top: solid 20px #666666DD;
            border-left: solid 20px transparent;
            border-right: solid 20px transparent;
        }


        .text-small-xs {
            font-size: 11px !important;
            font-family: YugoMedium;
        }

        .text-small {
            font-size: 12px !important;
            font-family: YugoMedium;
        }

        .text-normal {
            font-size: 13px !important;
            font-family: YugoMedium;
        }

        .text-normal-title {
            font-size: 13px !important;
            font-family: YugoBold;
        }

        .text-medium-xs {
            font-size: 14px !important;
            font-family: YugoMedium;
        }


        .text-medium-title {
            font-size: 14px !important;
            font-family: YugoBold;
        }


        .text-large-xs {
            font-size: 16px !important;
            font-family: YugoBold;
        }

        .text-medium {
            font-size: 15px !important;
            font-family: YugoBold;
        }

        .text-medium-light {
            font-size: 15px !important;
            font-family: YugoMedium;
        }

        .text-large {
            font-size: 17px !important;
            font-family: YugoBold;
        }

        .text-large-medium {
            font-size: 17px !important;
            font-family: YugoMedium;
        }

        .text-title-large {
            font-size: 19px !important;
            color: white;
            font-family: YugoBold;
        }

        .text-title-large-modal {
            font-size: 22px !important;
            color: white;
            font-family: YugoBold;
        }

        .text-title {
            font-size: 24px !important;
            font-family: YugoBold;
        }

        .text-title-medium {
            font-size: 18px !important;
            font-family: YugoMedium;
        }

        .text-large-demi {
            font-size: 23px !important;
            font-family: "Franklin Gothic Demi";
        }

        .text-medium-demi {
            font-size: 15px !important;
            font-family: "Franklin Gothic Demi";
        }

        .footer-company {
            font-size: 9px !important;
            font-family: YugoMedium;
            color: white;
        }

        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }

        .height-2 {
            height: 2rem;
            min-width: .1rem;
        }

        .height-1-half {
            height: 2rem;
            min-width: .1rem;
        }

        .height-3 {
            height: 3rem;
            min-width: .1rem;
        }

        .width-1 {
            width: 1rem;
        }

        .text-bold-menu {
            font-size: 12px;
            font-family: YugoBold;
        }

        .img-up {
            position: absolute;
            right: 1rem;
            bottom: 1.25rem;
            width: 2.4rem;
        }

        .img-top {
            position: absolute;
            left: 1rem;
            bottom: 1.25rem;
            width: 3rem;
        }

        .carousel-icon {
            height: 30px;
            width: 30px;
            /* padding: .5rem; */
            border-radius: 50%;
            background-color: white;
            /* width: 20px; */
            /* height: 20px; */
        }

        .category.active {

            background-color: #EFFAFB;
        }

        .category {
            background-color: white;
            border: 1px solid #31BCC7;
            color: #1C3F54;
            font-size: 13px;
            font-family: YugoMedium;
        }

        .category.disable {
            background-color: #dedede;
            border: 1px solid #ABABAB;
            color: #ABABAB;
        }

        .logo {
            width: unset;
            height: 5rem;
        }

        .logo-big {
            width: unset;
            height: 10rem;
        }

        .show-event {
            /* background-color: #59B6E8; */
            background-color: #dedede;
        }

        .clock-time {
            width: 0.75rem
        }

        .btn-preview {
            background-color: #31BCC7;

        }

        .btn-blue-grey {
            background-color: #C4C4C4 !important;
            border: 0px !important;
            outline: none !important;
        }

        button {
            border-width: 1px;
            border-color: #999999;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .custom-radio .custom-control-input:checked ~ .custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked ~ .custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .btn-add {
            background-image: linear-gradient(0deg, #CCCCCC, #F2F2F2);
        }

        .btn-normal {
            position: relative;
        }

        .btn-normal::before {
            content: "";
            width: 100%;
            height: 50%;
            background: black;
            opacity: .1;
            position: absolute;
            top: 50%;
            left: 0%;

        }

        .img-toggle {
            background-color: #DCDCDC;
            border-radius: 50%;
            bottom: 0px;
            right: 20%;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .img-content {
            cursor: pointer;
        }

        .img-content:active {
            cursor: move;
            cursor: -webkit-grabbing;
        }

        .text-decoration {
            cursor: pointer;
        }

        .image_modify_modal {
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }

        #image_area {
            width: 502px;
            height: fit-content;
            margin: auto;
            cursor: grab;
        }

        .slider_mark {
            font-size: 30px;
            margin: 10px;
        }

        .grabbing {
            cursor: grabbing !important;
        }

        .text-menu-user {
            font-size: 20px !important;
            font-family: YugoBold;
        }
        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }


    </style>
@endsection

@section('content')
    <input type="hidden" id="garden_id" value="{{$garden -> garden_id}}">
    <input type="hidden" id="faq_type" value="{{$type}}">
    <div class="position-sticky card-header z-depth-1">
        <div class="d-flex align-items-center py-2">
            <p class="flex-1 text-title">{{$garden -> garden_name}}</p>
            <div class="d-flex align-items-baseline">
                <p class="mr-2  text-menu-small">ID：000000(自動生成)</p>
                <img class='title-kodomore img-icon height-1-half' src="<?=asset('img/kodomore.png');?>">
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="d-flex align-items-center">
            @if($type === 1)
                <p class="flex-1 text-menu-user">よくある質問FAQ > 保育内容について </p>
            @elseif($type === 2)
                <p class="flex-1 text-menu-user">よくある質問FAQ > 園の給食･おやつについて</p>
            @elseif($type === 3)
                <p class="flex-1 text-menu-user">よくある質問FAQ > 持ち物について </p>
            @elseif($type === 4)
                <p class="flex-1 text-menu-user">よくある質問FAQ > 入園について</p>
            @endif
            <a class="text-menu-small menu-icon text-decoration"
               href="{{url('/school/detail') . '/' . $garden -> garden_id}}" target="_blank">詳細ページ表示</a>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form">

        <div class="card">
            <div class="tag-title d-flex">
                @if($type === 1)
                    <p class="card-header top-menu text-menu-user py-1 px-4">
                        保育内容について
                    </p>
                @elseif($type === 2)
                    <p class="card-header top-menu text-menu-user py-1 px-4">
                        園の給食･おやつについて
                    </p>
                @elseif($type === 3)
                    <p class="card-header top-menu text-menu-user py-1 px-4">
                        持ち物について
                    </p>
                @elseif($type === 4)
                    <p class="card-header top-menu text-menu-user py-1 px-4">
                        入園について
                    </p>
                @endif
                <div class="flex-1"></div>
            </div>
            <div class="card-body">
                <div class="d-flex m-3 pb-3">
                    @if($type === 1)
                        <p class="text-menu p-0">保育内容について答えられる所だけご記入ください｡　※改行すると読みやすくなります｡</p>
                    @elseif($type === 2)
                        <p class="text-menu p-0">園の給食･おやつについて答えられる所だけご記入ください｡　※改行すると読みやすくなります｡</p>
                    @elseif($type === 3)
                        <p class="text-menu p-0">持ち物について答えられる所だけご記入ください｡　※改行すると読みやすくなります｡</p>
                    @elseif($type === 4)
                        <p class="text-menu p-0">入園について答えられる所だけご記入ください｡　※改行すると読みやすくなります｡</p>
                    @endif
                </div>

                <div class="row pt-2">
                    <div class="offset-1 col-10">
                        @if(isset($faq_list))
                            @foreach($faq_list as $faq)
                                <div class="origin_faq mt-3">
                                    <div class="row">
                                        <div class="col-12 pl-5">
                                            <p class="text-menu p-0">Q. {{$faq->question}}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="ml-5 pl-5">
                                            <p class="text-menu p-0">A.</p>
                                        </div>
                                        <div class="col-9">
                                    <textarea class="form-control text-menu-small origin_answer" name="limit-length"
                                              id="faq_answer_index_{{$faq->id}}"
                                              maxlength="150">{{$faq->answer}}</textarea>
                                        </div>
                                        <div class="col-1 position-relative">
                                            <p class="text-menu-small position-absolute left-bottom">{{mb_strlen($faq -> answer)}}
                                                /150</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                </div>

                <div class="d-flex m-3">
                    @if($type === 1)
                        <p class="text-menu p-0">オりジナルFAQの追加(保育内容について)</p>
                    @elseif($type === 2)
                        <p class="text-menu p-0">オりジナルFAQの追加(園の給食･おやつについて)</p>
                    @elseif($type === 3)
                        <p class="text-menu p-0">オりジナルFAQの追加(持ち物について)</p>
                    @elseif($type === 4)
                        <p class="text-menu p-0">オりジナルFAQの追加(入園について)</p>
                    @endif
                </div>

                <div class="row pt-2">
                    <div class="offset-1 col-10">
                        <div class="add_faq mt-3">
                            <div class="row">
                                <div class="pl-5">
                                    <p class="text-menu p-0">追加 Q.</p>
                                </div>
                                <div class="col-9 pl-4" style="padding-right: 5px !important;">
                                    <textarea class="form-control text-menu-small add_question" name="limit-length"
                                              maxlength="150"></textarea>
                                </div>
                                <div class="col-1 position-relative" style="margin-left: 11px !important;">
                                    <p class="text-menu-small position-absolute left-bottom">
                                        0 /150</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="ml-5 pl-5">
                                    <p class="text-menu p-0">A.</p>
                                </div>
                                <div class="col-9 pl-3">
                                    <textarea class="form-control text-menu-small add_answer" name="limit-length"
                                              maxlength="150"></textarea>
                                </div>
                                <div class="col-1 position-relative">
                                    <p class="text-menu-small position-absolute left-bottom">
                                        0 /150</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-10 text-right pr-0">
                                <button class="px-4 text-small-admin" id="btn_add_faq"
                                        style="border-radius: 5px !important;">
                                    ＋FAQの追加
                                </button>
                            </div>
                            <div class="col-1 minus_image">
                                <img class="img-icon height-half d-none" id="minus_faq"
                                     src="{{asset('img/minus.png')}}">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card" style="bottom: 0rem; ">

            <div class="row mt-4 mb-4">
                <div class="offset-2 col-8" style="z-index: 5">
                    <div class="d-flex">
                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" id="btn_reload">
                            変更しないで戻る
                        </button>
                        <button class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"
                                id="btn_detail">入力内容の確認
                        </button>
                        <button type="submit"
                                class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal"
                                id="btn_save">登録･編集する
                        </button>
                    </div>
                </div>
            </div>


        </div>
        <div class="card-body">
            <p class="mb-2 text-center w-100 text-menu-small">｜ お問合せ ｜ FAQ(よくあるご質問) ｜ ヘルプ ｜ 利用規約 ｜ プライバシーポリシー ｜ </p>

            <div class="card-body text-menu-small background-white">
                <p class="text-center">Copyright ©ad-kit.co,.ltd. All Rights Reserved. No reproduction without
                    permission.</p>
            </div>
        </div>
    </form>


    <form class=" d-none" novalidate id="modify_garden" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="garden_id" id="form_garden_id">
        <input name="origin_list" id="form_origin_list">
        <input name="add_list" id="form_add_list">
        <input name="faq_type" id="form_faq_type">
    </form>

    <div class="card background-transparent position-sticky" style="bottom: 2rem; margin-top: -140px; z-index: 1">
        <div class="card-body background-opacity">
            <img src="{{asset('img/up_arrow.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>



@endsection

@section('modal')

    <div class="modal fade" id="none" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-2 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <label class="text-menu-user">未記入です</label><br>
                            <label class="text-menu-user">記入してから確認してください</label>
                        </div>
                    </div>
                    <div class="m-3" style="position: absolute;right: 0; top: 0;">
                        <img data-dismiss="modal" class="" src="{{asset('img/close_icon.png')}}">
                    </div>
                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>もどる</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="confirm_exit" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <p style="font-size: 16px !important;">編集中のデータがあります｡ページを移動すると編集中のデータが失くなります｡</p>
                            <p style="font-size: 18px !important;">それでもよろしいですか？</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        {{--                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
                        {{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
                        {{--                            <span>キャンセル</span>--}}
                        {{--                        </button>--}}
                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>移動する</span>
                        </button>
                        <button data-dismiss="modal" id="exit"
                                class="flex-1 py-1 rounded text-white background-dark-blue text-menu-small btn-normal"
                                style="width: 30%; margin-bottom: 10px;"><span>キャンセル</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection

@section('js4event')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script type="text/javascript">
        var next_name;


        var change_status = false;

        var is_Exit = function (name) {
            next_name = name;
            if(change_status){
                $('#confirm_exit').modal('show');
            }
            else{
                exitPage(next_name);
            }

        }

        $('#no_save').click(function () {
            exitPage(next_name);
        })
        $('#button_save').click(function () {
            $("#btn_save").trigger('click');
            setTimeout(() => {
                // script to download the picture here
                exitPage(next_name);
            }, 1000);

        })
        $(document).ready(function () {
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })
            $("#btn_save").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var garden_id = $("#garden_id").val();
                    var faq_type = $('#faq_type').val();

                    $("#form_garden_id").val(garden_id);
                    $("#form_faq_type").val(faq_type);

                    var origin_list = [];
                    $(".origin_answer").each(function () {
                        var id = $(this).attr('id');
                        var split = id.split("_index_");
                        var index = split[1];
                        var answer = $(this).val();

                        var tmp = {};
                        tmp['id'] = index;
                        tmp['answer'] = answer;
                        origin_list.push(tmp);

                    });

                    var add_list = []
                    $(".add_faq").each(function () {
                        var question = $(this).find('.add_question').val();
                        var answer = $(this).find('.add_answer').val();

                        var tmp = {};
                        tmp['question'] = question;
                        tmp['answer'] = answer;
                        add_list.push(tmp);

                    });


                    $('#form_origin_list').val(JSON.stringify(origin_list));
                    $('#form_add_list').val(JSON.stringify(add_list));

                    var form = $('form')[1]; // You need to use standard javascript object here
                    var formData = new FormData(form);

                    var url = home_path + '/admin/school/faq-modify'
                    $.ajax({
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            alertify.success("更新成功");
                            //window.location.reload();
                        }
                    });
                }

            });

            $("#btn_reload").click(function (event) {
                event.preventDefault();
                window.location.reload();
            });

            $("#btn_detail").click(function (event) {
                event.preventDefault();
                var is_none = true;
                $(".origin_answer").each(function () {
                    var answer = $(this).val();
                    if(answer){
                        is_none = false;
                    }

                });

                if(is_none){
                    $('#none').modal('show');
                }
                window.scrollTo(0, 0);
            });
            var home_path = $("#home_path").val();

            $("[name='limit-length']").on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p').html(length + '/' + maxLength);
            });


            $('#btn_add_faq').on('click', function () {
                event.preventDefault();
                var add_content = $(this).parent().parent().prev()[0].outerHTML;
                $(this).parent().parent().before(add_content);
                if ($('#minus_faq').hasClass('d-none')) {
                    $('#minus_faq').removeClass('d-none')
                }
            });

            $('#minus_faq').on('click', function () {

                $(this).parent().parent().prev().remove();
                if ($('.add_faq').length === 1) {
                    $(this).addClass('d-none');
                }
            });

            $("#move_top").click(function () {
                window.scrollTo(0, 0);
            });


        });
    </script>
@endsection
