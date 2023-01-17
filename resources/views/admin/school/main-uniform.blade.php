@extends('admin.layouts.app')

@section('nav')
    @include('admin.layouts.navbar')
@endsection

@section('css4page')
    <style>
        .tag-title {
            border-top: 1px solid #808080;
            background-color: #DAF6F6;
            padding-top: 0;
            padding-bottom: 0;
            color: white;
        }

        .card {
            background-color: transparent;
        }

        .card > .border-light-bottom:last-child {
            border-bottom: 0px !important;
        }

        .custom-control-label::before {
            top: .25rem;
            left: -1.25rem;
        }

        .img-source {
            border: 1px dashed #919191;
            cursor: grab;
            outline: none !important;
        }

        .h-100 {
            height: 100%;
        }

        .img-content {
            border-radius: .5rem;
            border: 1px solid #919191;
        }

        .custom-control-label {
            white-space: nowrap;
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

        .require {
            font-size: 14px;
            font-family: YugoMedium;
            color: #FF557E !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            width: fit-content;
            height: fit-content;
            flex: none;
        }

        [name=minus-notification] {
            z-index: 10;
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

        .text-title-large {
            font-size: 19px !important;
            color: white;
            font-family: YugoBold;
        }

        .text-title {
            font-size: 24px !important;
            font-family: YugoBold;
        }

        .text-menu-user {
            font-size: 20px !important;
            font-family: YugoBold;
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
            width: 600px;
            height: fit-content;
            margin: auto;
            cursor: grab;
        }

        .slider_mark {
            font-size: 30px;
            margin: 10px;
        }

        /*.grabbing {*/
        /*    cursor: grabbing !important;*/
        /*}*/
        /*.dragover{*/
        /*    cursor: grabbing !important;*/
        /*}*/


        .draggable {
            cursor: move; /* fallback: no `url()` support or images disabled */
            cursor: url(images/grab.cur); /* fallback: Internet Explorer */
            cursor: -webkit-grab; /* Chrome 1-21, Safari 4+ */
            cursor: -moz-grab; /* Firefox 1.5-26 */
            cursor: grab; /* W3C standards syntax, should come least */
        }

        .draggable:active {
            cursor: url(images/grabbing.cur);
            cursor: -webkit-grabbing;
            cursor: -moz-grabbing;
            cursor: grabbing;
        }


        #btn_back_text {
            text-align: center;
            width: 40%;
            border: 1px solid #919191;
            cursor: pointer
        }

        .add_image {
            position: absolute;
            bottom: 10px;
            right: -45px;
            width: fit-content;
            cursor: pointer;
        }

        /* drop target state */
        [data-draggable="delete"][aria-dropeffect="move"] {
            border-color: #68b;

            background: #fff;
        }

        [data-draggable="download"][aria-dropeffect="move"] {
            border-color: #68b;

            background: #fff;
        }

        /* items grabbed state */
        [data-draggable="item"][aria-grabbed="true"] {
            background: #999999;
        }

        .border-shadow {
            box-shadow: 0 0px 15px 20px rgba(0, 0, 0, 0.2), 0 8px 6px 10px rgba(0, 0, 0, 0.19)
        }

        .text-title-large-modal {
            font-size: 22px !important;
            color: white;
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
    <input type="hidden" id="garden_name" name="garden_name" value="{{$garden -> garden_name}}">

    <div class="position-sticky card-header z-depth-1">
        <div class="d-flex align-items-center py-2">
            <p class="flex-1 text-title">{{$garden -> garden_name}}</p>
            <div class="d-flex align-items-baseline">
                <p class="mr-2  text-menu-small">ID：{{session()->get(SESS_USER_ID)}}(自動生成)</p>
                <img class='title-kodomore img-icon height-1-half' src="<?=asset('img/kodomore.png');?>">
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">基本情報の登録･編集 > 制服･オリジナルアイテム </p>

            <a class="text-menu-small menu-icon text-decoration"
               href="{{url('/test/school/detail') . '/' . $garden -> garden_id}}" target="_blank">詳細ページ表示</a>
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form">
        <div class="card">
            <div class="tag-title d-flex">

                <p class="card-header top-menu text-menu-user py-1 px-4">
                    制服･オリジナルアイテム
                </p>

                <div class="flex-1"></div>
            </div>
            <div class="card-body" id="">
                <div class="d-flex mt-3 ml-3">
                    <p class="text-menu-small menu-icon text-decoration">画像選択</p>
                    <p class="text-menu p-0">で｢制服･オリジナルアイテム｣か｢一般投稿･クチコミ｣から画像を取り出して登録してください｡　</p>
                </div>

                <div class="ml-3 pl-3 text-menu">
                    <p>※<img class="img-icon height-half" src="{{asset('img/add.png')}}">で投稿画像の追加ができます｡
                    </p>
                    <p>※<img class="img-icon height-half" src="{{asset('img/up_line.png')}}">線枠ごとにドラック&ドロップで画像の並び替えができます｡
                    </p>
                    <p>※Ctrl＋クリックやShift＋クリック等で<img class="img-icon height-half" src="{{asset('img/up_line.png')}}">線枠の複数選択ができます｡
                    </p>
                    <p>※画像枠内をダブルクリックすると､拡大画像を確認できます｡</p>
                    <p class="text-pink">※削除するには<img class="img-icon height-half" src="{{asset('img/up_line.png')}}">線枠を削除マークまでドラック＆ドロップさせてください｡
                    </p>
                </div>

                <div class="row mt-4">
                    <div class="offset-1 col-9">
                        <div class="row" id="image_space">
                            <?php
                            $image_id = 0;?>
                            @if(!empty($garden_image))
                                @foreach($garden_image as $image)
                                    <div class="img-source col-12 mb-2 drag_item" id="uniform_image_{{$image_id}}"
                                         data-draggable="item"
                                         aria-grabbed="false" tabindex="0" draggable="true" aria-dropeffect="none">
                                        <input class="d-none" name="image_id" value="{{$image->id}}">
                                        <div class="row d-flex text-menu px-3 mt-3">
                                            <p>種類</p>
                                            <p class="require mx-2">該当必須</p>
                                            <input type="text" class="form-control" name="image_type"
                                                   style="width: calc(100% - 106px); margin-top: -0.5rem;" required value="{{$image->image_type}}"
                                                   placeholder="例)制服(冬･夏)">
                                            <p class="mt-4">提供元表記：登録された文字が出て来ます変更不可</p>
{{--                                            @if($image->caption == '公式サイトより')--}}
{{--                                                <p class="mt-4">提供元表記：{{$garden->garden_name.' 公式サイトより'}}</p>--}}
{{--                                            @elseif(empty($image->caption))--}}
{{--                                                <p class="mt-4">提供元表記：{{$garden->garden_name}}</p>--}}
{{--                                            @else--}}
{{--                                                <p class="mt-4">提供元表記：{{$image->caption}}</p>--}}
{{--                                            @endif--}}
                                        </div>
                                        <div class="row">
                                            <input id="image_content_add" name="uniform_image" type="file"
                                                   accept="image/*"
                                                   style="display:none;"/>
                                            <div class="col-5 d-flex flex-column h-100 p-2">
                                                <div class="p-2 flex-1">
                                                    <div class="h-100 position-relative" name="img_content_show">
                                                        <div class="radio-image radio-75-image">
                                                            <img class="img-responsive full-width img-content"
                                                                 name="img_body"
                                                                 src="{{asset('/storage/img/garden/'.$image->img)}}">
                                                        </div>
                                                        <div name="img_empty" class="d-none">
                                                            <div
                                                                class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                                style="left: 0; top: 0; background: white;">
                                                                <img src="{{asset('img/empty.png')}}"
                                                                     class="empty-image">
                                                            </div>
                                                            <div
                                                                class="position-absolute d-flex justify-content-center w-100"
                                                                style="left: 0; bottom: 0">
                                                                <p class="text-menu-small text-center px-1 text-gray">
                                                                    ドラッグ&ドロップ､またはファイルを選択</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-12 d-flex flex-column h-100 px-2">
                                                        <p class="text-center"><span class="text-decoration"
                                                                                     id="image_content_add_index_0"
                                                                                     name="image_content_add_button">画像選択</span><span
                                                                class="px-3">|</span><span class="text-decoration"
                                                                                           name="image_content_remove_button"
                                                                                           id="image_content_remove_index_0">画像解除</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex flex-column h-100 p-2">
                                                <div class="p-2 flex-1">
                                                    <div class="h-100 d-flex position-relative" name="img_content_show">
                                                        <p class="text-menu pl-0">画像の説明文(キャプション)</p>
                                                        <p class="require ml-2">該当必須</p>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p style="font-size: 14px">
                                                            下記テキストを利用して新しい文を作成してください｡<br>
                                                            ※同じ文は登録できません｡表現を変更してください｡(テキストの
                                                            重複はペナルティとなり､上位表示されませんので注意してください)
                                                        </p>
                                                    </div>

                                                    <div>
                                                <textarea class="form-control text-menu-small" placeholder=""
                                                          name="source" rows="4"
                                                          required="">{{$image->caption}}</textarea>
                                                    </div>
                                                    <div class="mt-2 d-flex">
                                                        @if($image->img_source == '公式サイトより')
                                                            <p class="text-menu pl-0 caption">{{$garden->garden_name.' 公式サイトより'}}</p>
                                                        @elseif(empty($image->img_source))
                                                            <p class="text-menu pl-0 caption">{{$garden->garden_name}}</p>
                                                        @else
                                                            <p class="text-menu pl-0 caption">{{$image->img_source}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $image_id++;?>
                                @endforeach
                            @else
                                <div class="img-source col-12 mb-2 drag_item" id="uniform_image_{{$image_id}}"
                                     data-draggable="item"
                                     aria-grabbed="false" tabindex="0" draggable="true" aria-dropeffect="none">
                                    <div class="row d-flex text-menu px-3 mt-3">
                                        <p>種類</p>
                                        <p class="require mx-2">該当必須</p>
                                        <input type="text" class="form-control"
                                               style="width: calc(100% - 106px); margin-top: -0.5rem;"
                                               placeholder="例)制服(冬･夏)">
                                        <p class="mt-4">提供元表記：登録された文字が出て来ます変更不可</p>
                                    </div>
                                    <div class="row">
                                        <input id="image_content_add" name="uniform_image" type="file" accept="image/*"
                                               style="display:none;"/>
                                        <div class="col-5 d-flex flex-column h-100 p-2">
                                            <div class="p-2 flex-1">
                                                <div class="h-100 position-relative" name="img_content_show">
                                                    <div class="radio-image radio-75-image">
                                                        <img class="img-responsive full-width img-content d-none"
                                                             name="img_body">
                                                    </div>
                                                    <div name="img_empty">
                                                        <div
                                                            class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                            style="left: 0; top: 0; background: white;">
                                                            <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                        </div>
                                                        <div
                                                            class="position-absolute d-flex justify-content-center w-100"
                                                            style="left: 0; bottom: 0">
                                                            <p class="text-menu-small text-center px-1 text-gray">
                                                                ドラッグ&ドロップ､またはファイルを選択</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-12 d-flex flex-column h-100 px-2">
                                                    <p class="text-center"><span class="text-decoration"
                                                                                 id="image_content_add_index_0"
                                                                                 name="image_content_add_button">画像選択</span><span
                                                            class="px-3">|</span><span class="text-decoration"
                                                                                       name="image_content_remove_button"
                                                                                       id="image_content_remove_index_0">画像解除</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex flex-column h-100 p-2">
                                            <div class="p-2 flex-1">
                                                <div class="h-100 d-flex position-relative" name="img_content_show">
                                                    <p class="text-menu pl-0">画像の説明文(キャプション)</p>
                                                    <p class="require ml-2">該当必須</p>
                                                </div>
                                                <div class="mt-2">
                                                    <p style="font-size: 14px">
                                                        下記テキストを利用して新しい文を作成してください｡<br>
                                                        ※同じ文は登録できません｡表現を変更してください｡(テキストの
                                                        重複はペナルティとなり､上位表示されませんので注意してください)
                                                    </p>
                                                </div>

                                                <div>
                                                <textarea class="form-control text-menu-small" placeholder=""
                                                          name="caption" rows="4"
                                                          required=""></textarea>
                                                </div>
                                                <div class="mt-2 d-flex">
                                                    <p class="text-menu pl-0">登録された文字が出て来ます</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="col-1 add_image">
                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                            </div>
                            <input type="number" style="display: none" value="{{$image_id}}" id="cnt_container">
                        </div>
                    </div>


                    <div class="offset-2 col-8 mt-4" style="z-index: 5">
                        <div class="d-flex">
                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                    id="btn_reload">
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


                    <div class="offset-2 col-8" id="button_area" style="z-index: 20">
                        {{--                        <label class="flex-1 py-1 rounded text-menu-small background-white btn-normal mb-0"--}}
                        {{--                               id="btn_back_text">--}}
                        {{--                            テキストを戻す--}}
                        {{--                        </label>--}}
                        {{--                        <button class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"--}}
                        {{--                                id="btn_detail">入力内容の確認--}}
                        {{--                        </button>--}}
                        {{--                        <button type="submit"--}}
                        {{--                                class="mx-4 flex-1 py-1 rounded text-white background-pink text-menu-small btn-normal"--}}
                        {{--                                style="width: 40%"--}}
                        {{--                                id="btn_submit">変更内容を更新する--}}
                        {{--                        </button>--}}
                    </div>
                </div>
            </div>

        </div>

        <div class="card position-sticky" style="bottom: 4rem; z-index: 1">
            <div class="row">
                <div class="offset-10 col-2">
                    <div class="mr-1">
                        <button class="rounded text-blue-1 background-white text-menu py-1 px-0 float-right"
                                style="width: 150px" id="del_btn" data-draggable="delete" aria-dropeffect="none">
                            <img class="img-icon height-half pb-1" id="del_img" src="{{asset('img/delete.png')}}">
                            削　除
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

    <form class="d-none" novalidate id="modify_garden" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="garden_id" id="form_garden_id">
        <input name="imageList" id="form_imageList">
    </form>

    <div class="card background-transparent position-sticky" style="bottom: 2rem; margin-top: -140px; z-index: 1">
        <div class="card-body background-opacity">
            <img src="{{asset('img/up_arrow.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>



@endsection

@section('modal')

    <div class="modal fade" id="confirm_delete" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <label><img class="img-icon height-half"
                                        src="{{asset('img/up_line.png')}}">線枠の内容を削除します｡</label>
                            <label class="text-menu-user">本当に削除してよろしいですか？</label>
                        </div>
                    </div>
                    <input style="display: none" id="del_media_id" type="number" value="0">
                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>キャンセル</span>
                        </button>
                        <button id="button_delete"
                                class="mx-4 flex-1 py-1 rounded text-white background-dark-blue text-menu-small btn-normal"
                                style="width: 30%; margin-bottom: 10px;"><span>削  除</span>
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

    <div class="modal fade" id="image_zoom_container" role="dialog" aria-hidden="true" style="z-index: 1050;">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="w-100">
                        <img id="img_modal_container" class="w-100" style="height: auto"
                             src="{{asset('img/up_line.png')}}">
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal_top_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog m-5"
             style="max-width: 100% !important; border: 1px solid #333333; border-radius: 10px; overflow: hidden">
            <div class="modal-content">
                <div class="modal-body px-0 py-0">
                    <div class="card" style="background: #F2F2F2;">

                        <div class="card-header py-2 text-title-large-modal d-flex" style="background: #86C400">
                            <p class="text-left">画像選択　※公開の画像はギャラリーに反映されます｡</p>
                            <div class="mr-3" style="position: absolute;right: 0;">
                                {{--                                <p class="text-medium px-1" data-dismiss="modal" id="x_icon">x</p>--}}
                                <img src="{{asset('img/close_modal.png')}}" class="img-icon" data-dismiss="modal"
                                     id="x_icon" style="height: 1.5rem;">
                            </div>
                        </div>


                        <div class="card-header text-left text-title-medium"
                             style="background: inherit; box-shadow: inset 0 5px 6px grey;">
                            <span class="p-1" id="modal_reception">
                               反映させる画像を選択してください
                            </span>
                        </div>

                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：外観･内観･園庭など
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === INFO_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                        <input class="d-none" name="source" value="{{$image->caption}}">
                                                        @if($image->img_source == '公式サイトより')
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name.' 公式サイトより'}}">
                                                        @elseif(empty($image->img_source))
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name}}">
                                                        @else
                                                            <input class="d-none" name="caption" value="{{$image->img_source}}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input keyword-detail text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：制服･オリジナルアイテム
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === UNIFORM_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                        <input class="d-none" name="source" value="{{$image->caption}}">
                                                        @if($image->img_source == '公式サイトより')
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name.' 公式サイトより'}}">
                                                        @elseif(empty($image->img_source))
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name}}">
                                                        @else
                                                            <input class="d-none" name="caption" value="{{$image->img_source}}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input keyword-detail text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1 mr-2">
                                    画像カテゴリー：園長･スタッフ
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === STAFF_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                        <input class="d-none" name="source" value="{{$image->caption}}">
                                                        @if($image->img_source == '公式サイトより')
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name.' 公式サイトより'}}">
                                                        @elseif(empty($image->img_source))
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name}}">
                                                        @else
                                                            <input class="d-none" name="caption" value="{{$image->img_source}}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input keyword-detail text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1 mr-2">
                                    画像カテゴリー：その他
                                </p>
                                <p class="mt-2 text-title-medium" style="color: black">
                                    ブログ･イベント･預かりの種類･特徴･年間行事･園での1日･献立･系列園･関連上位校などの画像</p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === OTHER_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                        <input class="d-none" name="source" value="{{$image->caption}}">
                                                        @if($image->img_source == '公式サイトより')
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name.' 公式サイトより'}}">
                                                        @elseif(empty($image->img_source))
                                                            <input class="d-none" name="caption" value="{{$garden->garden_name}}">
                                                        @else
                                                            <input class="d-none" name="caption" value="{{$image->img_source}}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input keyword-detail text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">

                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：メディアにて
                                </p>
                            </div>
                            <div class="row m-3">
                                <p class="text-large-medium">登録画像はありません</p>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：一般投稿･クチコミ
                                </p>
                            </div>
                            <div class="row m-3">

                            </div>
                        </div>

                        <div class="card-body px-0 py-0 border-shadow" style="border-top: 1px solid #808080;">
                            <div class="row mt-4 mb-4">
                                <div class="offset-4 col-4">
                                    <div class="d-flex">
                                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                                data-dismiss="modal" id="btn_select_back">戻る
                                        </button>
                                        <button
                                            class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"
                                            id="btn_select_top">反映する
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>


@endsection

@section('js4event')
    <script type="text/javascript">
        var imageList = [];
        var garden_id = $("#garden_id").val();
        var garden_name = $('#garden_name').val();
        var image_sum_cnt = $('#image_sum_cnt').val();
        var imageList = [];
        var home_path = {!! json_encode(url('')) !!};
        var cnt_img_container = $('#cnt_container').val();
        var cnt_click = cnt_img_container;
        var tab_name = $('#tab_name').val();
        var topImageList = [];
        var topImageUrl = [];
        var publicList = [];

        var uniformImgList = [];

        var publicTmpList = [];

        var cnt_uniform_img = 0;

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
            $("#btn_submit").trigger('click');
            setTimeout(() => {
                // script to download the picture here
                exitPage(next_name);
            }, 2000);

        })

        $('#btn_detail').on('click', function () {
            event.preventDefault()
            window.scrollTo(0, 0);
        })


        $(document).ready(function () {
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })

            $('input.public_image').each(function (index) {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var value = $(this).val();
                var index = split[1];
                if($(this).prop('checked')){
                    var tmp = {};
                    tmp['id'] = index;
                    tmp['value'] = value;
                    publicList.push(tmp);
                }
            })

            $('.img-source').each(function () {
                var id = $(this).find('input[name="image_id"]').val()
                var url = $(this).find('img')[0].src;

                if(url !== undefined){
                    var caption = $(this).find('p.caption').text();
                    var source = $(this).find('textarea[name="source"]').val();
                    var type = $(this).find('input[name="image_type"]').val();
                    var tmp = {};
                    tmp['type'] = type;
                    tmp['id'] = id;
                    tmp['url'] = url;
                    tmp['caption'] = caption;
                    tmp['source'] = source;
                    uniformImgList.push(tmp);
                    topImageList.push(id);
                    topImageUrl.push(url);
                    cnt_uniform_img++;
                }
            });

            $(document).on('change', '[name="image_type"]', function (){
                var type = $(this).val();
                var index = $(this).parent().parent().attr('id');
                index = '#' + index;

                var id = $(index).find('input[name="image_id"]').val();

                for(var i =0; i< uniformImgList.length; i++){
                    if(uniformImgList[i].id === id){
                        uniformImgList[i].type = type;
                        break;
                    }
                }
            });

            $(document).on('change', '[name="source"]', function (){
                var source = $(this).val();
                var index = $(this).parent().parent().parent().parent().parent().attr('id');
                index = '#' + index;

                var id = $(index).find('input[name="image_id"]').val();

                for(var i =0; i< uniformImgList.length; i++){
                    if(uniformImgList[i].id === id){
                        uniformImgList[i].source = source;
                        break;
                    }
                }
            });

            $(document).on("click", "[name='image_content_remove_button']", function () {
                var index = $(this).parent().parent().parent().parent().parent().parent().attr('id');
                index = '#' + index;
                var id = $(index).find('input[name="image_id"]').val();
                var url = $(index).find('img[name="img_body"]')[0].src;
                $(index).find('img[name="img_body"]')[0].src = '';
                $(index).find('img[name="img_body"]').addClass('d-none');
                $(index).find('[name="img_empty"]').removeClass('d-none');
                $(index).find('input[name="image_id"]').val('')
                $(index).find('input[name="image_type"]').val('')
                $(index).find('p.caption').text('');
                $(index).find('textarea[name="source"]').text('');
                uniformImgList = $.grep(uniformImgList, function (value) {
                    return value.id != id;
                });
                topImageList = $.grep(topImageList, function (value) {
                    return value != id;
                });
                topImageUrl = $.grep(topImageUrl, function (value) {
                    return value != url;
                });

            });

            $(document).on("click", "[name='image_content_add_button']", function () {

                for (var i = 0; i < topImageList.length; i++) {
                    var index = '#select_category_' + topImageList[i]
                    $(index).prop('checked', true);
                }

                publicTmpList = publicList;

                for(var i = 0; i < publicList.length; i++){
                    var id = publicList[i].id;
                    var value = publicList[i].value;
                    if(value==='0'){
                        value = 'false';
                    }
                    else{
                        value = 'true'
                    }
                    var index = '#radio_public_select_' + value + '_index_' + id;
                    $(index).prop('checked', true).trigger('change');
                    //$(index).trigger('click');
                }

                $('#modal_top_image').modal('show')

                //$("#image_content_url_index_" + index).click();
            });

            $('input.public_image').on('click', function () {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var value = $(this).val();
                var index = split[1];
                var is_already = false;
                for(var i = 0; i < publicList.length; i++){
                    if(publicList[i]['id'] === index){
                        is_already = true;
                        publicList[i]['value'] = value;
                    }
                }
                if(!is_already){
                    var tmp = {};
                    tmp['id'] = index;
                    tmp['value'] = value;
                    publicList.push(tmp);
                }
            })

            $('input[name="select_category"]').on('click', function () {
                var id = $(this).attr('id');
                var split = id.split('_category_');
                // var value = $(this).val();
                var index = split[1];
                var url = $(this).parent().parent().find('img')[0].src;
                var caption = $(this).parent().parent().find('input[name="caption"]').val();
                var source = $(this).parent().parent().find('input[name="source"]').val();
                if ($(this).prop('checked')) {
                    if(topImageList.length > cnt_img_container -1){
                        //alertify.error("Top画像は5つまで選択可能です｡");
                        $(this).prop('checked', false);
                        return
                    }
                    topImageList.push(index);
                    topImageUrl.push(url)
                    var tmp = {};
                    tmp['id'] = index;
                    tmp['url'] = url;
                    tmp['caption'] = caption;
                    tmp['source'] = source;
                    uniformImgList.push(tmp);


                } else {
                    topImageList = $.grep(topImageList, function (value) {
                        return value != index;
                    });
                    topImageUrl = $.grep(topImageUrl, function (value) {
                        return value != url;
                    });
                    uniformImgList = $.grep(uniformImgList, function (value) {
                        return value.id != index;
                    });
                }

            })

            $('#btn_select_top').on('click', function () {
                // for(var i = 0; i < topImageUrl.length; i++){
                //     var id = '#img_body_index_' + i;
                //     var empty_id = '#img_body_empty_' + i;
                //     $(id).removeClass('d-none');
                //     $(empty_id).addClass('d-none');
                //     $(empty_id).find('img').addClass('d-none');
                //     $(id)[0].src = topImageUrl[i];
                // }
                var drag_items = $('.drag_item');
                for(var i = 0; i < uniformImgList.length; i++){
                    var index = drag_items[i].id;
                    $('#' + index).find('input[name="image_id"]').val(uniformImgList[i].id)
                    if(uniformImgList[i].type !== undefined){
                        $('#' + index).find('input[name="image_type"]').val(uniformImgList[i].type)
                    }else{
                        $('#' + index).find('input[name="image_type"]').val('')
                    }

                    $('#' + index).find('img[name="img_body"]')[0].src = uniformImgList[i].url;
                    $('#' + index).find('img[name="img_body"]').removeClass('d-none');
                    $('#' + index).find('[name="img_empty"]').addClass('d-none');
                    $('#' + index).find('p.caption').text(uniformImgList[i].caption);
                    $('#' + index).find('textarea[name="source"]').val(uniformImgList[i].source);

                }
                $('#modal_top_image').modal('hide')
            })

            $('#btn_select_back').on('click', function () {
                topImageList = [];
                topImageUrl = [];
                uniformImgList=[];
                $('.img-source').each(function () {
                    var id = $(this).find('input[name="image_id"]').val()
                    var url = $(this).find('img')[0].src;

                    if(url !== undefined){
                        var caption = $(this).find('p.caption').text();
                        var source = $(this).find('textarea[name="source"]').val();
                        var type = $(this).find('input[name="image_type"]').val();
                        var tmp = {};
                        tmp['type'] = type;
                        tmp['id'] = id;
                        tmp['url'] = url;
                        tmp['caption'] = caption;
                        tmp['source'] = source;
                        uniformImgList.push(tmp);
                        topImageList.push(id);
                        topImageUrl.push(url)
                        //cnt_uniform_img++;

                    }
                });
            })

            $('#x_icon').on('click', function () {
                topImageList = [];
                topImageUrl = [];
                uniformImgList=[];
                $('.img-source').each(function () {
                    var id = $(this).find('input[name="image_id"]').val()
                    var url = $(this).find('img')[0].src;

                    if(url !== undefined){
                        var caption = $(this).find('p.caption').text();
                        var source = $(this).find('textarea[name="source"]').val();
                        var type = $(this).find('input[name="image_type"]').val();
                        var tmp = {};
                        tmp['type'] = type;
                        tmp['id'] = id;
                        tmp['url'] = url;
                        tmp['caption'] = caption;
                        tmp['source'] = source;
                        uniformImgList.push(tmp);
                        topImageList.push(id);
                        topImageUrl.push(url)

                    }
                });
            })

            $("#move_top").click(function () {
                window.scrollTo(0, 0);
            });


            $('#btn_back_text').click(function () {
                $('input[type=text]').each(function (index) {
                    $(this).val('');
                })
                $('textarea').each(function (id) {
                    $(this).val('');
                })
            });

            $("#btn_save").click(function (event) {
                event.preventDefault();
                submitFormData();
            });

            $(document).on('dblclick', 'img[name="img_body"]', function () {
                var src = $(this)[0].src;
                $('#img_modal_container')[0].src = src;
                $('#image_zoom_container').modal('show');
            })

            function submitFormData() {
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    $('#form_garden_id').val(garden_id);

                    var drag_items = $('.drag_item');
                    for (var i = 0; i < drag_items.length; i++) {
                        var sub = {};

                        sub['order'] = i + 1;

                        var item_index = drag_items[i].id;
                        item_index = '#' + item_index;
                        // var split = item_id.split("_image_");
                        // var index = split[1];

                        var id = $(item_index).find('input[name="image_id"]').val()
                        var source = '';
                        var caption = ''
                        var type = ''

                        for(var j = 0; j < uniformImgList.length; j++){
                            if(uniformImgList[j].id === id){
                                source = uniformImgList[j].source;
                                type = uniformImgList[j].type;
                                caption = uniformImgList[j].caption;
                                break;
                            }
                        }

                        sub['type'] = type;
                        sub['id'] = id;
                        sub['source'] = source;
                        imageList.push(sub);

                    }

                    $('#form_imageList').val(JSON.stringify(imageList));

                    var form = $('form')[1];
                    // You need to use standard javascript object here
                    var formData = new FormData(form);

                    var url = home_path + '/admin/school/modify/main-uniform';
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

            }


            $(document).on('click', '[name="btn_select_image"]', function () {
                $(this).parent().parent().parent().prev().click();

            });
            $(document).on('drag dragstart dragend dragover dragenter dragleave drop', '[name="add_media_content"]', function () {
                e.preventDefault();
                e.stopPropagation();
            }).on('drop', function (e) {
                var file = e.originalEvent.dataTransfer.files;
                var img_empty = $(this).next().find('div[name="img_empty"]');
                var img_body = $(this).next().find('[name="img_body"]');
                $(this).next().find('[name="no_file"]').addClass('d-none');
                var media_container_id = $(this).parent().parent()[0].id;
                var split = media_container_id.split("_image_");
                var index = split[1];
                var reader = new FileReader();
                reader.onload = function (e) {
                    img_empty.addClass('d-none');
                    var file_type = file.type.split('/');
                    if (file_type[0] == "image") {
                        img_body.attr('src', e.target.result);
                        img_body.removeClass('d-none');
                    }
                }
                reader.readAsDataURL(this.files[0]); // convert to base64 string

                var imageListItem = {};
                imageListItem['index'] = index;
                imageListItem['file'] = this.files[0];
                imageList.push(imageListItem);
            });
            $(document).on('change', '[name="uniform_image"]', function () {
                if (this.files && this.files[0]) {
                    var file = this.files[0];
                    var img_empty = $(this).next().find('div[name="img_empty"]');
                    var img_body = $(this).next().find('[name="img_body"]');
                    $(this).next().find('[name="no_file"]').addClass('d-none');
                    var media_container_id = $(this).parent().parent()[0].id;
                    var split = media_container_id.split("_image_");
                    var index = split[1];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        img_empty.addClass('d-none');

                        var file_type = file.type.split('/');
                        if (file_type[0] == "image") {

                            img_body.attr('src', e.target.result);
                            img_body.removeClass('d-none');
                        }
                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string

                    var imageListItem = {};
                    imageListItem['index'] = index;
                    imageListItem['file'] = this.files[0];
                    imageList.push(imageListItem);

                }
            });


            // $(document).on('click', '.add_image', function () {
            //
            // })

            $(document).on('click', '.add_image', function () {
                event.preventDefault();
                cnt_click++;
                cnt_uniform_img++;
                var prev_id = $(this).prev()[0].id;

                var index = cnt_click;
                cnt_img_container = cnt_img_container + 1;
                var new_id = 'uniform_image_' + cnt_click;
                var prev_index = '#' + prev_id;
                var content = $(prev_index)[0].outerHTML;
                content = content.replace(prev_id, new_id);

                var prev_radio_name = 'image_post_type_' + (index - 1);
                var replace_radio_name = 'image_post_type_' + index;
                content = content.replace(prev_radio_name, replace_radio_name);
                content = content.replace(prev_radio_name, replace_radio_name);
                content = content.replace(prev_radio_name, replace_radio_name);
                content = content.replace(prev_radio_name, replace_radio_name);

                for (var i = 1; i < 5; i++) {
                    var prev_radio_index = 'radio_post_index_' + ((index - 1) * 4 + i);
                    var replace_radio_index = 'radio_post_index_' + (index * 4 + i);
                    content = content.replace(prev_radio_index, replace_radio_index);
                    content = content.replace(prev_radio_index, replace_radio_index);
                }
                content = content.replace('aria-grabbed="true"', 'aria-grabbed="false"');
                $(this).before(content);

                var new_index = '#' + new_id;

                $(new_index).find('img[name="img_body"]')[0].src = '';
                $(new_index).find('img[name="img_body"]').addClass('d-none');
                $(new_index).find('[name="img_empty"]').removeClass('d-none');
                $(new_index).find('p.caption').text('');
                $(new_index).find('textarea[name="source"]').text('');
                $(new_index).find('input[name="image_type"]').val('');
                // $(new_index).find('[name="no_file"]').removeClass('d-none');
            });

            //dictionary for storing the selections data
            //comprising an array of the currently selected items
            //a reference to the selected items' owning container
            //and a refernce to the current drop target container
            var selections =
                {
                    items: [],
                    owner: null,
                    droptarget: null
                };

            var targets = document.querySelectorAll('[data-draggable="delete"]')
            //var download = document.querySelectorAll('[data-draggable="download"]')

            //function for selecting an item
            function addSelection(item) {
                //if the owner reference is still null, set it to this item's parent
                //so that further selection is only allowed within the same container
                if (!selections.owner) {
                    selections.owner = item.parentNode;
                }

                    //or if that's already happened then compare it with this item's parent
                //and if they're not the same container, return to prevent selection
                else if (selections.owner != item.parentNode) {
                    return;
                }

                //set this item's grabbed state
                item.setAttribute('aria-grabbed', 'true');

                //add it to the items array
                selections.items.push(item);
            }

            //function for unselecting an item
            function removeSelection(item) {
                //reset this item's grabbed state
                item.setAttribute('aria-grabbed', 'false');

                //then find and remove this item from the existing items array
                for (var len = selections.items.length, i = 0; i < len; i++) {
                    if (selections.items[i] == item) {
                        selections.items.splice(i, 1);
                        break;
                    }
                }
            }

            //function for resetting all selections
            function clearSelections() {
                //if we have any selected items
                if (selections.items.length) {
                    //reset the owner reference
                    selections.owner = null;

                    //reset the grabbed state on every selected item
                    for (var len = selections.items.length, i = 0; i < len; i++) {
                        selections.items[i].setAttribute('aria-grabbed', 'false');
                    }

                    //then reset the items array
                    selections.items = [];
                }
            }

            //shorctut function for testing whether a selection modifier is pressed
            function hasModifier(e) {
                return (e.ctrlKey || e.metaKey);
            }

            function hasShiftModifier(e) {
                return (e.shiftKey);
            }

            //function for applying dropeffect to the target containers
            function addDropeffects() {
                //apply aria-dropeffect and tabindex to all targets apart from the owner
                for (var len = targets.length, i = 0; i < len; i++) {
                    if
                    (
                        targets[i] != selections.owner
                        &&
                        targets[i].getAttribute('aria-dropeffect') == 'none'
                    ) {
                        targets[i].setAttribute('aria-dropeffect', 'move');
                        targets[i].setAttribute('tabindex', '0');
                    }
                }

                // for (var len = download.length, i = 0; i < len; i++) {
                //     if
                //     (
                //         download[i] != selections.owner
                //         &&
                //         download[i].getAttribute('aria-dropeffect') == 'none'
                //     ) {
                //         download[i].setAttribute('aria-dropeffect', 'move');
                //         download[i].setAttribute('tabindex', '0');
                //     }
                // }

                var items = document.querySelectorAll('[data-draggable="item"]');
                //remove aria-grabbed and tabindex from all items inside those containers
                for (var len = items.length, i = 0; i < len; i++) {
                    if
                    (
                        items[i].parentNode != selections.owner
                        &&
                        items[i].getAttribute('aria-grabbed')
                    ) {
                        items[i].removeAttribute('aria-grabbed');
                        items[i].removeAttribute('tabindex');
                    }
                }
            }

            //function for removing dropeffect from the target containers
            function clearDropeffects() {
                //if we have any selected items
                if (selections.items.length) {
                    var items = document.querySelectorAll('[data-draggable="item"]');
                    //restore aria-grabbed and tabindex to all selectable items
                    //without changing the grabbed value of any existing selected items
                    for (var len = items.length, i = 0; i < len; i++) {
                        if (!items[i].getAttribute('aria-grabbed')) {
                            items[i].setAttribute('aria-grabbed', 'false');
                            items[i].setAttribute('tabindex', '0');
                        } else if (items[i].getAttribute('aria-grabbed') == 'true') {
                            items[i].setAttribute('tabindex', '0');
                        }
                    }
                }
            }

            //shortcut function for identifying an event element's target container
            function getContainer(element) {
                do {
                    if (element.nodeType == 1 && element.getAttribute('data-draggable')) {
                        return element;
                    }
                }
                while (element = element.parentNode);

                return null;
            }

            $(document).on("mousedown touchstart", ".img-source", function (e) {
                $(this).addClass('grabbing');
                //if the element is a draggable item
                if ($(this)[0].getAttribute('draggable')) {
                    //clear dropeffect from the target containers
                    clearDropeffects();

                    //if the multiple selection modifier is not pressed
                    //and the item's grabbed state is currently false
                    if (!hasModifier(e) && !hasShiftModifier(e) && $(this)[0].getAttribute('aria-grabbed') == 'false') {

                        //clear all existing selections
                        clearSelections();

                        //then add this new selection
                        addSelection($(this)[0]);
                    }
                }
            });

            //mouseup event to implement multiple selection
            //document.addEventListener('mouseup', function (e) {
            $(document).on("mouseup touchend", ".img-source", function (e) {
                $(this).removeClass('grabbing')
                //if the element is a draggable item
                //and the multipler selection modifier is pressed
                if ($(this)[0].getAttribute('draggable') && hasModifier(e)) {
                    //if the item's grabbed state is currently true
                    if ($(this)[0].getAttribute('aria-grabbed') == 'true') {
                        //unselect this item
                        removeSelection($(this)[0]);

                        //if that was the only selected item
                        //then reset the owner container reference
                        if (!selections.items.length) {
                            selections.owner = null;
                        }
                    }
                    //else [if the item's grabbed state is false]
                    else {
                        //add this additional selection
                        addSelection($(this)[0]);
                    }
                }

                if ($(this)[0].getAttribute('draggable') && hasShiftModifier(e)) {
                    var grabbed = $('[aria-grabbed="true"]');
                    if (grabbed.length > 0) {

                        var start_id = grabbed[0].id;
                        var split = start_id.split('_image_');
                        var start_index = parseInt(split[1]);

                        var end_id = grabbed[grabbed.length - 1].id;
                        var split = end_id.split('_image_');
                        var end_index = parseInt(split[1]);

                        var cur_id = $(this)[0].id;
                        var split = cur_id.split('_image_');
                        var cur_index = parseInt(split[1]);

                        if (cur_index < start_index) {
                            start_index = cur_index;
                        }

                        if (end_index < cur_index) {
                            end_index = cur_index;
                        }
                        if (end_index - start_index > 1) {

                            for (var i = start_index; i <= end_index; i++) {
                                var target_id = '#uniform_image_' + i;
                                if (target_id.length !== 0) {
                                    addSelection($(target_id)[0]);
                                }

                            }

                        }
                    }

                }

            });

            window.addEventListener('click', function (e) {
                if (!document.getElementById('image_space').contains(e.target)) {
                    if (!document.getElementById('button_area').contains(e.target)) {
                        // Clicked in box //clear dropeffect from the target containers
                        clearDropeffects();

                        //clear all existing selections
                        clearSelections();
                    }


                }
            });
            //dragstart event to initiate mouse dragging

            //document.addEventListener('dragstart', function (e) {
            $(document).on("dragstart", ".img-source", function (e) {
                //if the element's parent is not the owner, then block this event
                if (selections.owner != $(this)[0].parentNode) {
                    e.preventDefault();
                    return;
                }

                //[else] if the multiple selection modifier is pressed
                //and the item's grabbed state is currently false
                if
                (
                    hasModifier(e)
                    &&
                    $(this)[0].getAttribute('aria-grabbed') == 'false'
                ) {
                    //add this additional selection
                    addSelection($(this)[0]);
                }

                //we don't need the transfer data, but we have to define something
                //otherwise the drop action won't work at all in firefox
                //most browsers support the proper mime-type syntax, eg. "text/plain"
                //but we have to use this incorrect syntax for the benefit of IE10+
                e.dataTransfer.setData('text', '');

                //apply dropeffect to the target containers
                addDropeffects();

            });

            //keydown event to implement selection and abort
            //document.addEventListener('keydown', function (e) {
            $(document).on("keydown", ".img-source", function (e) {
                //if the element is a grabbable item
                if ($(this)[0].getAttribute('aria-grabbed')) {
                }

                //Escape is the abort keystroke (for any target element)
                if (e.keyCode == 27) {
                    //if we have any selected items
                    if (selections.items.length) {
                        //clear dropeffect from the target containers
                        clearDropeffects();

                        //then set focus back on the last item that was selected, which is
                        //necessary because we've removed tabindex from the current focus
                        selections.items[selections.items.length - 1].focus();

                        //clear all existing selections
                        clearSelections();

                        //but don't prevent default so that native actions can still occur
                    }
                }

            });


            //related variable is needed to maintain a reference to the
            //dragleave's relatedTarget, since it doesn't have e.relatedTarget
            var related = null;
            var droptarget = null;

            //dragenter event to set that variable
            //document.addEventListener('dragenter', function (e) {
            $(document).on("dragenter", ".img-source", function (e) {
                related = $(this)[0];

            });

            //dragleave event to maintain target highlighting using that variable
            document.addEventListener('dragleave', function (e) {
                //get a drop target reference from the relatedTarget
                droptarget = getContainer(related);

                //if the target is the owner then it's not a valid drop target
                if (droptarget == selections.owner) {
                    droptarget = null;
                }

                //if the drop target is different from the last stored reference
                //(or we have one of those references but not the other one)
                if (droptarget != selections.droptarget) {
                    //if we have a saved reference, clear its existing dragover class
                    if (selections.droptarget) {
                        selections.droptarget.className =
                            selections.droptarget.className.replace(/ dragover/g, '');
                    }

                    //apply the dragover class to the new drop target reference
                    if (droptarget) {
                        droptarget.className += ' dragover';
                    }

                    //then save that reference for next time
                    selections.droptarget = droptarget;
                }

            }, false);

            var is_del = false;
            //var is_dl = false;
            //dragover event to allow the drag by preventing its default
            document.addEventListener('dragover', function (e) {
                //if we have any selected items, allow them to be dragged
                if (selections.items.length) {
                    var id = e.target.id;
                    if (id == 'del_btn' || id == 'del_img') {
                        is_del = true;
                    } else {
                        is_del = false;
                    }
                    // if (id == 'dl_btn' || id == 'dl_img') {
                    //     is_dl = true;
                    // } else {
                    //     is_dl = false;
                    // }
                    e.preventDefault();
                }

            }, false);


            //dragend event to implement items being validly dropped into targets,
            //or invalidly dropped elsewhere, and to clean-up the interface either way
            document.addEventListener('dragend', function (e) {
                //if we have a valid drop target reference
                //(which implies that we have some selected items)
                if (is_del) {
                    $('#confirm_delete').modal('show');
                    is_del = false;
                    return;
                }

                // if (is_dl) {
                //     for (var i = 0; i < selections.items.length; i++) {
                //         var index = '#' + selections.items[i].id;
                //         var src = $(index).find('img[name="img_body"]')[0].src;
                //         var default_image_path = $("#default_image_path").val();
                //         if (src) {
                //             var img = 'img.png';
                //             if (src.includes(default_image_path)) {
                //                 let urlSplit = src.toString().split("/");
                //                 let splitLength = urlSplit.length;
                //                 img = urlSplit[splitLength - 1];
                //             }
                //             let fileLink = document.createElement('a');
                //             fileLink.href = src;
                //
                //             fileLink.setAttribute('download', img);
                //             document.body.appendChild(fileLink);
                //             fileLink.click();
                //             fileLink.parentNode.removeChild(fileLink);
                //         }
                //     }
                //     is_dl = false;
                //     return;
                //     //selections.items
                // }

                if (selections.items.length == 1) {
                    if (e.target.parentNode.id === 'image_space')
                        droptarget.after(e.target);
                }

                //if we have any selected items
                // if (selections.items.length) {
                //     //clear dropeffect from the target containers
                //     clearDropeffects();
                //
                //     //if we have a valid drop target reference
                //     if (selections.droptarget) {
                //         //reset the selections array
                //         clearSelections();
                //
                //         //reset the target's dragover class
                //         selections.droptarget.className =
                //             selections.droptarget.className.replace(/ dragover/g, '');
                //
                //         //reset the target reference
                //         selections.droptarget = null;
                //     }
                // }
            }, false);

            $('#button_delete').on('click', function () {
                for (var i = 0; i < selections.items.length; i++) {

                    var index = selections.items[i].id
                    index = '#' + index;
                    var id = $(index).find('input[name="image_id"]').val()

                    var url = $(index).find('img[name="img_body"]')[0].src;
                    uniformImgList = $.grep(uniformImgList, function (value) {
                        return value.id != id;
                    });
                    topImageList = $.grep(topImageList, function (value) {
                        return value != id;
                    });
                    topImageUrl = $.grep(topImageUrl, function (value) {
                        return value != url;
                    });

                    selections.items[i].remove();
                }
                cnt_img_container = cnt_img_container - selections.items.length;

                if (cnt_img_container < 0) {
                    cnt_img_container = 0;
                    var content = ' <div class="img-source col-12 mb-2 drag_item" id="uniform_image_0" data-draggable="item"\n' +
                        '                                         aria-grabbed="false" tabindex="0" draggable="true" aria-dropeffect="none">\n' +
                        '                                        <div class="row d-flex text-menu px-3 mt-3">\n' +
                        '                                            <p>種類</p>\n' +
                        '                                            <p class="require mx-2">該当必須</p>\n' +
                        '                                            <input type="text" class="form-control" style="width: calc(100% - 106px); margin-top: -0.5rem;" placeholder="例)制服(冬･夏)">\n' +
                        '                                            <p class="mt-4">提供元表記：登録された文字が出て来ます変更不可</p>\n' +
                        '                                        </div>\n' +
                        '                                        <div class="row">\n' +
                        '                                            <input id="image_content_add" name="uniform_image" type="file" accept="image/*"\n' +
                        '                                                   style="display:none;"/>\n' +
                        '                                            <div class="col-5 d-flex flex-column h-100 p-2">\n' +
                        '                                                <div class="p-2 flex-1">\n' +
                        '                                                    <div class="h-100 position-relative" name="img_content_show">\n' +
                        '                                                        <div class="radio-image radio-75-image">\n' +
                        '                                                            <img class="img-responsive full-width img-content d-none"\n' +
                        '                                                                 name="img_body">\n' +
                        '                                                        </div>\n' +
                        '                                                        <div name="img_empty">\n' +
                        '                                                            <div\n' +
                        '                                                                class="position-absolute img-content d-flex justify-content-center w-100 h-100"\n' +
                        '                                                                style="left: 0; top: 0; background: white;">\n' +
                        '                                                                <img src="{{asset('img/empty.png')}}" class="empty-image">\n' +
                        '                                                            </div>\n' +
                        '                                                            <div class="position-absolute d-flex justify-content-center w-100"\n' +
                        '                                                                 style="left: 0; bottom: 0">\n' +
                        '                                                                <p class="text-menu-small text-center px-1 text-gray">\n' +
                        '                                                                    ドラッグ&ドロップ､またはファイルを選択</p>\n' +
                        '                                                            </div>\n' +
                        '                                                        </div>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                                <div class="row p-2">\n' +
                        '                                                    <div class="col-12 d-flex flex-column h-100 px-2">\n' +
                        '                                                        <p class="text-center"><span class="text-decoration" id="image_content_add_index_0" name="image_content_add_button">画像選択</span><span class="px-3">|</span><span class="text-decoration" name="image_content_remove_button" id="image_content_remove_index_0">画像解除</span></p>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                            <div class="col-7 d-flex flex-column h-100 p-2">\n' +
                        '                                                <div class="p-2 flex-1">\n' +
                        '                                                    <div class="h-100 d-flex position-relative" name="img_content_show">\n' +
                        '                                                        <p class="text-menu pl-0">画像の説明文(キャプション)</p>\n' +
                        '                                                        <p class="require ml-2">該当必須</p>\n' +
                        '                                                    </div>\n' +
                        '                                                    <div class="mt-2">\n' +
                        '                                                        <p style="font-size: 14px">\n' +
                        '                                                            下記テキストを利用して新しい文を作成してください｡<br>\n' +
                        '                                                            ※同じ文は登録できません｡表現を変更してください｡(テキストの\n' +
                        '                                                            重複はペナルティとなり､上位表示されませんので注意してください)\n' +
                        '                                                        </p>\n' +
                        '                                                    </div>\n' +
                        '\n' +
                        '                                                    <div>\n' +
                        '                                                <textarea class="form-control text-menu-small" placeholder=""\n' +
                        '                                                          name="caption" rows="4"\n' +
                        '                                                          required=""></textarea>\n' +
                        '                                                    </div>\n' +
                        '                                                    <div class="mt-2 d-flex">\n' +
                        '                                                        <p class="text-menu pl-0">登録された文字が出て来ます</p>\n' +
                        '                                                    </div>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>'
                    $('#image_space').append(content);
                }
                $('#confirm_delete').modal('hide');
            });
        });


    </script>
@endsection
