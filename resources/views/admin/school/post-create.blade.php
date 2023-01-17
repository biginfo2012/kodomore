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

        .sub_title {
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

        .require_fill {
            font-size: 14px;
            font-family: YugoMedium;
            background-color: #FF557E !important;
            color: white !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            padding: 4px;
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

        /*.grabbing {*/
        /*    cursor: grabbing !important;*/
        /*}*/

        .add_icon_position {
            position: absolute;
            bottom: 10px;
            right: -45px;
            width: fit-content;
            cursor: pointer;
        }

        .drag_item {
            border: none !important;
        }

        .dragover{
            cursor: grabbing !important;
        }

        .invalid{
            border-color: #dc3545;
            padding-right: calc(1.5em + .75rem);
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }

        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }


    </style>
@endsection

@section('content')
    <input type="hidden" id="garden_id" value="{{$garden -> garden_id}}">
    @if(isset($media_id))
        <input type="hidden" id="media_id" value="{{$media_id}}">
    @else
        <input type="hidden" id="media_id" value="">
    @endif
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
            <p class="flex-1 text-menu-user">園トップの登録･編集 > メディアにて紹介･掲載 </p>

            <p class="text-menu-small menu-icon text-decoration">詳細ページ表示</p>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form">
        <div class="card">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 px-4">
                    メディアにて紹介･掲載
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body">
                <div class="mt-3 ml-3">
                    <p class="text-menu p-0">紹介･掲載の日付順に並びますので何年何月に紹介･掲載されたのかご記入ください｡</p>
                    <p class="d-flex  text-menu p-0">点線BOX毎にドラック&ドロップで順番を並び替えることができます｡ ※紹介･掲載画像は<img
                            class="img-icon height-half" src="{{asset('img/add.png')}}">でBOXごと追加できます｡</p>
                </div>

                <div class="ml-3 pl-3 text-menu">
                    <p class="text-pink">※画像･動画エリアをダブルクリックすると､拡大して確認することができます｡ ※動画形式はmp4(日本語ファイル名不可)､サイズは16Mまでです｡</p>
                    <p class="text-pink">※画像サイズは500×500px以上を推奨いたします｡WEB用(RGB)で保存されたJPEG形式をご用意ください｡</p>
                    <p class="text-pink ml-3">
                        印刷用(CMYK)で保存された画像はアップロードできません｡※1画像最大500KBまで｡500KBを超えた画像は自動的に圧縮されてアップロードされます｡</p>
                    <p class="text-pink">※削除するには点線BOXを削除マークまでドラック＆ドロップさせてください｡</p>
                    <p class="text-pink">※画像 / 動画は削除しても画像の登録･編集に保存してある場合は完全に削除されません｡</p>
                </div>

                <div class="row ml-1 mt-4 sub">
                    <div class="col-2 pt-2">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    メディア種類
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require_fill">必須</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-8">
                        <div class="row">
                            @if(isset($media))
                                <div class="d-flex mr-4 mt-2 11">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_1"
                                               value="1"
                                               name="radio_public_index"
                                               {{$media->media_type === 1 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_1">情報誌</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_2"
                                               value="2"
                                               name="radio_public_index"
                                               {{$media->media_type === 2 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_2">新聞</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_3"
                                               value="3"
                                               name="radio_public_index"
                                               {{$media->media_type === 3 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_3">ラジオ</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_4"
                                               value="4"
                                               name="radio_public_index"
                                               {{$media->media_type === 4 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_4">地上波TV</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_5"
                                               value="5"
                                               name="radio_public_index"
                                               {{$media->media_type === 5 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_5">CS</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_6"
                                               value="6"
                                               name="radio_public_index"
                                               {{$media->media_type === 6 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_6">BS</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_7"
                                               value="7"
                                               name="radio_public_index"
                                               {{$media->media_type === 7 ? 'checked':''}} required>
                                        <label class="custom-control-label" for="radio_media_type_7">ネット</label>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex mr-4 mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_1"
                                               value="1"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_1">情報誌</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_2"
                                               value="2"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_2">新聞</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_3"
                                               value="3"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_3">ラジオ</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_4"
                                               value="4"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_4">地上波TV</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_5"
                                               value="5"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_5">CS</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_6"
                                               value="6"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_6">BS</label>
                                    </div>
                                    <div class="ml-4 mr-4 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_media_type_7"
                                               value="7"
                                               name="radio_public_index" required>
                                        <label class="custom-control-label" for="radio_media_type_7">ネット</label>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="row ml-1 mt-2">
                    <div class="col-2 pt-2">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    メディア名
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require_fill">必須</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-6">
                        @if(isset($media))
                            <input type="text" class="form-control text-menu-small" name="media_name" id="media_name"
                                   placeholder="例)岐阜市咲楽(さくら)キラキラキッズ" value="{{$media->media_name}}" required>
                        @else
                            <input type="text" class="form-control text-menu-small" name="media_name" id="media_name"
                                   placeholder="例)岐阜市咲楽(さくら)キラキラキッズ" required>
                        @endif


                    </div>
                    <div class="col-4"><p class="text-menu-small position-absolute left-bottom mt-1">で紹介された内容です｡</p>
                    </div>
                </div>

                <div class="row ml-1 mt-2">
                    <div class="col-2 pt-2">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    紹介日or月
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require_fill">必須</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        @if(isset($media))
                            <input type="text" class="form-control text-menu-small" name="public_date"
                                   id="public_date" placeholder="例)0000年00月号" value="{{$media->public_date}}" required>
                        @else
                            <input type="text" class="form-control text-menu-small" name="public_date"
                                   id="public_date" placeholder="例)0000年00月号" required>
                        @endif
                    </div>
                    <div class="col-4"></div>
                </div>

                <div class="row ml-1 mt-2">
                    <div class="col-2 pt-2">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    タイトル
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require">該当必須</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        @if(isset($media))
                            <textarea type="text" class="form-control text-menu-small" name="media_title"
                                      id="media_title"
                                      placeholder="※改行箇所があれば改行してください｡" maxlength="250" rows="3"
                                      required>{{$media->media_title}}</textarea>
                        @else
                            <textarea type="text" class="form-control text-menu-small" name="media_title"
                                      id="media_title"
                                      placeholder="※改行箇所があれば改行してください｡" maxlength="250" rows="3" required></textarea>
                        @endif

                    </div>
                    <div class="col-4"></div>
                </div>
                <?php $subtitle_id = 0;
                $content_id = 0;
                $image_id = 0;
                $youtube_id = 0;?>

                @if(isset($media))

                    @foreach($media -> childList as $child)
                        @if($child -> type == 'subtitle')
                            <div class="row ml-1 mt-2 drag_item" type="subtitle" id="sub_title_{{$subtitle_id}}"
                                 data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                                 draggable="true">
                                <div class="col-9">
                                    <div class="row" id="sub_titles">
                                        <div class="col-12 sub_title p-3 mb-2">
                                            <div class="row">
                                                <div class="col-3 pt-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="text-menu p-0 flex-1">
                                                                サブタイトル
                                                            </p>
                                                        </div>
                                                        <div class="col-4 text-right pl-0">
                                                            <span class="require">該当必須</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                <textarea type="text" class="form-control text-menu-small"
                                                          name="subtitle"
                                                          placeholder="※改行箇所があれば改行してください｡" maxlength="250"
                                                          rows="3" required>{{$child -> subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 add_sub_title add_icon_position">
                                            <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4"></div>
                            </div>
                            <?php $subtitle_id++;?>
                        @elseif($child -> type == 'content')
                            <div class="row ml-1 mt-2 drag_item" type="content" id="media_text_{{$content_id}}"
                                 data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                                 draggable="true">
                                <div class="col-9">
                                    <div class="row" id="texts">
                                        <div class="col-12 sub_title p-3 mb-2">
                                            <div class="row">
                                                <div class="col-3 pt-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="text-menu p-0 flex-1">
                                                                本文
                                                            </p>
                                                        </div>
                                                        <div class="col-4 text-right pl-0">
                                                            <span class="require">該当必須</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                        <textarea type="text" class="form-control text-menu-small" name="content"
                                                  placeholder="※改行箇所があれば改行してください｡" maxlength="250"
                                                  rows="3" required>{{$child -> content}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 add_text add_icon_position">
                                            <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4"></div>
                            </div>
                            <?php $content_id++;?>
                        @elseif($child -> type == 'image')
                            <div class="row ml-1 mt-2 drag_item" type="images" id="add_media_{{$image_id}}"
                                 data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                                 draggable="true">
                                <div class="col-9">
                                    <div class="row" id="images">
                                        <div class="col-12 sub_title p-3 mb-2 ">
                                            <div class="row">
                                                <div class="col-3 pt-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="text-menu p-0 flex-1">
                                                                画像 / 動画
                                                            </p>
                                                        </div>
                                                        <div class="col-4 text-right pl-0">
                                                            <span class="require_fill">必須</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col-5 d-flex flex-column h-100 p-2">
                                                            <div class="p-2 flex-1">
                                                                <div class="h-100 position-relative"
                                                                     name="img_content_show">
                                                                    <div class="radio-image radio-75-image align-middle">
                                                                        @if($child->type == 'image')
                                                                            <img class="img-responsive full-width img-content" src="{{asset('/storage/img/media/'.$child->img)}}"
                                                                                 name="img_body">
                                                                        @else
                                                                            <video class="w-100" name="video_body" src="{{asset('/storage/img/media/'.$child->img)}}"
                                                                                   controls></video>
                                                                        @endif
                                                                    </div>
                                                                    <div name="img_empty" class="d-none">
                                                                        <div
                                                                            class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                                            style="left: 0; top: 0; background: white;">
                                                                            <img src="{{asset('img/empty.png')}}"
                                                                                 class="empty-image mr-2">
                                                                            <img src="{{asset('img/video.png')}}"
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
                                                                <div class="col-6">
                                                                    <button type="button" name="add_media"
                                                                            class="btn_add_uniform_img rounded w-100 py-1 text-menu-small btn-add">
                                                                        ファイルを選択
                                                                    </button>
                                                                    <input type="file" name="add_media_content"
                                                                           style="display:none;"/>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="text-menu-small mt-1">ファイル未選択</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 d-flex flex-column h-100 p-2">
                                                            <div class="row" name="img_content_show">
                                                                <div class="col-12 d-flex">
                                                                    <div>
                                                                        <span class="require_fill mr-2">必須</span>
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-menu p-0 flex-1">
                                                                            画像 / 動画 提供元表記
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-12">
                                                                    <input type="text"
                                                                           class="form-control text-menu-small"
                                                                           name="img_source" value="{{$child -> caption}}"
                                                                           placeholder="例)情報誌 情報誌名" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-12 d-flex">
                                                                    <div>
                                                                        <span class="require_fill mr-2">必須</span>
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-menu p-0 flex-1">
                                                                            キャプション
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                        <textarea class="form-control text-menu-small"
                                                                  placeholder="画像に対しての説明文(キャプション)をお願いいたします｡"
                                                                  name="caption" rows="4" required="">{{$child->img_source}}</textarea>
                                                                </div>
                                                            </div>
                                                            <p class="text-menu-small text-right menu-icon text-decoration">
                                                                画像の登録･編集に保存する</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 add_media add_icon_position">
                                            <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4"></div>
                            </div>
                            <?php $image_id++;?>
                        @elseif($child -> type == 'youtube')
                            <div class="row ml-1 mt-2 drag_item" type="youtube" id="add_youtube_{{$youtube_id}}"
                                 data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                                 draggable="true">
                                <div class="col-9">
                                    <div class="row" id="texts">
                                        <div class="col-12 sub_title p-3 mb-2 ">
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <p class="text-menu p-0">
                                                        YouTube動画の埋め込み
                                                    </p>
                                                    <img class="img-icon height-half mt-1" style="height: fit-content"
                                                         src="{{asset('img/youtube.png')}}">
                                                    <p class="text-menu p-0 flex-1">
                                                        YouTube URL
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" class="form-control text-menu-small"
                                                           name="youtube" value="{{$child->youtube}}"
                                                           placeholder="URLを貼り付けてください" maxlength="250"
                                                           required>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" id="btn_add_uniform_img"
                                                            class="rounded w-100 py-1 text-menu-small btn-add">
                                                        埋め込み
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 add_youtube add_icon_position">
                                            <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">

                                </div>
                            </div>
                            <?php $youtube_id++;?>
                        @endif
                    @endforeach
                @endif

                <div class="row ml-1 mt-2 drag_item" type="subtitle" id="sub_title_{{$subtitle_id}}"
                     data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                     draggable="true">
                    <div class="col-9">
                        <div class="row" id="sub_titles">
                            <div class="col-12 sub_title p-3 mb-2">
                                <div class="row">
                                    <div class="col-3 pt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="text-menu p-0 flex-1">
                                                    サブタイトル
                                                </p>
                                            </div>
                                            <div class="col-4 text-right pl-0">
                                                <span class="require">該当必須</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <textarea type="text" class="form-control text-menu-small" name="subtitle"
                                                  placeholder="※改行箇所があれば改行してください｡" maxlength="250"
                                                  rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 add_sub_title add_icon_position">
                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-4"></div>
                </div>

                <div class="row ml-1 mt-2 drag_item" type="content" id="media_text_{{$content_id}}"
                     data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                     draggable="true">
                    <div class="col-9">
                        <div class="row" id="texts">
                            <div class="col-12 sub_title p-3 mb-2">
                                <div class="row">
                                    <div class="col-3 pt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="text-menu p-0 flex-1">
                                                    本文
                                                </p>
                                            </div>
                                            <div class="col-4 text-right pl-0">
                                                <span class="require">該当必須</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <textarea type="text" class="form-control text-menu-small" name="content"
                                                  placeholder="※改行箇所があれば改行してください｡" maxlength="250"
                                                  rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 add_text add_icon_position">
                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                            </div>

                        </div>
                    </div>

                    <div class="col-4"></div>
                </div>

                <div class="row ml-1 mt-2 drag_item" type="images" id="add_media_{{$image_id}}"
                     data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                     draggable="true">
                    <div class="col-9">
                        <div class="row" id="images">
                            <div class="col-12 sub_title p-3 mb-2 ">
                                <div class="row">
                                    <div class="col-3 pt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="text-menu p-0 flex-1">
                                                    画像 / 動画
                                                </p>
                                            </div>
                                            <div class="col-4 text-right pl-0">
                                                <span class="require_fill">必須</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-5 d-flex flex-column h-100 p-2">
                                                <div class="p-2 flex-1">
                                                    <div class="h-100 position-relative" name="img_content_show">
                                                        <div class="radio-image radio-75-image align-middle">
                                                            <img
                                                                class="img-responsive full-width img-content d-none"
                                                                name="img_body">
                                                            <video class="w-100 d-none" name="video_body"
                                                                   controls></video>
                                                        </div>
                                                        <div name="img_empty">
                                                            <div
                                                                class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                                style="left: 0; top: 0; background: white;">
                                                                <img src="{{asset('img/empty.png')}}"
                                                                     class="empty-image mr-2">
                                                                <img src="{{asset('img/video.png')}}"
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
                                                    <div class="col-6">
                                                        <button type="button" name="add_media"
                                                                class="btn_add_uniform_img rounded w-100 py-1 text-menu-small btn-add">
                                                            ファイルを選択
                                                        </button>
                                                        <input type="file" name="add_media_content"
                                                               style="display:none;"/>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-menu-small mt-1">ファイル未選択</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex flex-column h-100 p-2">
                                                <div class="row" name="img_content_show">
                                                    <div class="col-12 d-flex">
                                                        <div>
                                                            <span class="require_fill mr-2">必須</span>
                                                        </div>
                                                        <div>
                                                            <p class="text-menu p-0 flex-1">
                                                                画像 / 動画 提供元表記
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <input type="text" class="form-control text-menu-small"
                                                               name="img_source"
                                                               placeholder="例)情報誌 情報誌名" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12 d-flex">
                                                        <div>
                                                            <span class="require_fill mr-2">必須</span>
                                                        </div>
                                                        <div>
                                                            <p class="text-menu p-0 flex-1">
                                                                キャプション
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <textarea class="form-control text-menu-small"
                                                                  placeholder="画像に対しての説明文(キャプション)をお願いいたします｡"
                                                                  name="caption" rows="4" required=""></textarea>
                                                    </div>
                                                </div>
                                                <p class="text-menu-small text-right menu-icon text-decoration">
                                                    画像の登録･編集に保存する</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 add_media add_icon_position">
                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                            </div>

                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>

                <div class="row ml-1 mt-2 drag_item" type="youtube" id="add_youtube_{{$youtube_id}}"
                     data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0"
                     draggable="true">
                    <div class="col-9">
                        <div class="row" id="texts">
                            <div class="col-12 sub_title p-3 mb-2 ">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <p class="text-menu p-0">
                                            YouTube動画の埋め込み
                                        </p>
                                        <img class="img-icon height-half mt-1" style="height: fit-content"
                                             src="{{asset('img/youtube.png')}}">
                                        <p class="text-menu p-0 flex-1">
                                            YouTube URL
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-7">
                                        <input type="text" class="form-control text-menu-small" name="youtube"
                                               placeholder="URLを貼り付けてください" maxlength="250">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" id="btn_add_uniform_img"
                                                class="rounded w-100 py-1 text-menu-small btn-add">
                                            埋め込み
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 add_youtube add_icon_position">
                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">

                    </div>
                </div>


                <div class="row ml-1 mt-2">
                    <div class="col-2 pt-2">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    公開予約
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <p class="text-menu-small mt-1">例)2020/07/01/18：00</p>
                        @if(isset($media))
                            <input type="datetime-local" class="form-control text-menu-small" name="media_public_time" value="{{$media->public_time}}"
                                   id="media_post_number">
                        @else
                            <input type="datetime-local" class="form-control text-menu-small" name="media_public_time"
                                   id="media_post_number">
                            @endif


                    </div>
                    <div class="col-3 mt-4 d-flex">
                        <button type="submit" class="mx-3 rounded text-white text-menu-small btn-preview w-100 pl-4"
                                id="btn_reservation" style="text-align: center;">公開予約
                            <img class="img-icon" src="http://localhost/img/calendar.png" style="float: right;">
                            <img class="img-icon mr-1" src="http://localhost/img/time.png" style="float: right;">
                        </button>
                    </div>
                </div>
                <div class="row ml-1 mt-2">
                    <div class="offset-2 col-8">
                        <div class="d-flex">
                            <button type="submit"
                                    class="mx-2 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"
                                    id="btn_confirm">入力内容の確認
                            </button>
                            <button type="submit"
                                    class="mx-2  flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                    id="btn_private">非公開
                            </button>
                            <button type="submit"
                                    class="mx-2  flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal"
                                    id="btn_public">公 開
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card position-sticky" style="bottom: 30px;">
            <div class="row">
                <div class="offset-10 col-2 mr-4">
                    <div class="mr-1">
                        <button class="rounded text-blue-1 background-white text-menu py-1 px-0 float-right drag_item"
                                id="del_btn"
                                style="width: 150px; bottom: 30px" id="" data-draggable="delete" aria-dropeffect="move">
                            <img class="img-icon height-half pb-1" src="{{asset('img/delete.png')}}" id="del_img">
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
        <input name="media_type" id="form_media_type">
        <input name="media_name" id="form_media_name">
        <input name="media_title" id="form_media_title">
        <input name="public_type" id="form_public_type">
        <input name="public_date" id="form_public_date">
        <input name="subtitle" id="form_subtitle">
        <input name="content" id="form_content">
        <input name="youtube" id="form_youtube">
        <input name="image" id="form_image">
        <input name="public_time" id="form_public_time">
        <input name="media_id" id="form_media_id">

    </form>



@endsection

@section('modal')
    <div class="modal fade" id="confirm_delete" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <label>項目を削除します｡ 本当に削除してもよろしいですか？</label>
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

{{--    <div class="modal fade" id="confirm_exit" role="dialog" aria-hidden="true" style="z-index: 1050;"--}}
{{--         data-backdrop="static">--}}
{{--        <div class="modal-dialog modal-full image_modify_modal">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-body text-center pt-4 pb-0 px-4">--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="w-100">--}}
{{--                            <label>変更内容を保存しますか？</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer pt-0 pb-0" style="border:none;">--}}
{{--                    <div class="text-center w-100" style="height: fit-content">--}}
{{--                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
{{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
{{--                            <span>キャンセル</span>--}}
{{--                        </button>--}}
{{--                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
{{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
{{--                            <span>保存しない</span>--}}
{{--                        </button>--}}
{{--                        <button id="button_save"--}}
{{--                                class="flex-1 py-1 rounded text-white background-dark-blue text-menu-small btn-normal"--}}
{{--                                style="width: 30%; margin-bottom: 10px;"><span>保  存</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}

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
            }, 2000);

        })

        $(document).ready(function () {
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })
            var imageContent = [];
            var home_path = {!! json_encode(url('')) !!};

            // $(document).on("mousedown touchstart", ".img-source", function (e) {
            //     $(this).addClass('grabbing')
            // });
            // $(document).on("mouseup touchend", ".img-source", function (e) {
            //     $(this).removeClass('grabbing')
            // });

            var sub_count = 0;
            var targets = document.querySelectorAll('[data-draggable="delete"]')

            $(document).on('click', '.add_sub_title', function () {
                event.preventDefault();
                var prev_id = $(this).parent().parent().parent()[0].id;
                var index = sub_count + 1;
                sub_count = sub_count + 1;
                var new_id = 'sub_title_' + index;
                var prev_index = '#' + prev_id;
                var content = $(prev_index)[0].outerHTML;
                content = content.replace(prev_id, new_id);
                content = content.replace('aria-grabbed="true"', 'aria-grabbed="false"');
                $(prev_index).after(content);
            })

            var text_cnt = 0;
            $(document).on('click', '.add_text', function () {
                event.preventDefault();
                var prev_id = $(this).parent().parent().parent()[0].id;
                var index = text_cnt + 1;
                text_cnt = text_cnt + 1;
                var new_id = 'media_text_' + index;
                var prev_index = '#' + prev_id;
                var content = $(prev_index)[0].outerHTML;
                content = content.replace(prev_id, new_id);
                content = content.replace('aria-grabbed="true"', 'aria-grabbed="false"');
                $(prev_index).after(content);
            })

            var media_cnt = 0;
            $(document).on('click', '.add_media', function () {
                event.preventDefault();
                var prev_id = $(this).parent().parent().parent()[0].id;
                var index = media_cnt + 1;
                media_cnt = media_cnt + 1;
                var new_id = 'add_media_' + index;
                var prev_index = '#' + prev_id;
                //var content = $(prev_index)[0].outerHTML;
                //content = content.replace(prev_id, new_id);
                //content = content.replace('aria-grabbed="true"', 'aria-grabbed="false"');
                var content = '<div class="row ml-1 mt-2 drag_item" type="images" id="add_media_' + index + '"\n' +
                    '                     data-draggable="item" aria-dropeffect="move" aria-grabbed="false" tabindex="0" draggable="true">\n' +
                    '                    <div class="col-9">\n' +
                    '                        <div class="row" id="images">\n' +
                    '                            <div class="col-12 sub_title p-3 mb-2 ">\n' +
                    '                                <div class="row">\n' +
                    '                                    <div class="col-3 pt-2">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <div class="col-8">\n' +
                    '                                                <p class="text-menu p-0 flex-1">\n' +
                    '                                                    画像 / 動画\n' +
                    '                                                </p>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-4 text-right pl-0">\n' +
                    '                                                <span class="require_fill">必須</span>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-9">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <div class="col-5 d-flex flex-column h-100 p-2">\n' +
                    '                                                <div class="p-2 flex-1">\n' +
                    '                                                    <div class="h-100 position-relative" name="img_content_show">\n' +
                    '                                                        <div class="radio-image radio-75-image align-middle">\n' +
                    '                                                            <img class="img-responsive full-width img-content d-none"\n' +
                    '                                                                 name="img_body">\n' +
                    '                                                            <video class="w-100 d-none" name="video_body"\n' +
                    '                                                                   controls></video>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div name="img_empty">\n' +
                    '                                                            <div\n' +
                    '                                                                class="position-absolute img-content d-flex justify-content-center w-100 h-100"\n' +
                    '                                                                style="left: 0; top: 0; background: white;">\n' +
                    '                                                                <img src="{{asset('img/empty.png')}}"\n' +
                    '                                                                     class="empty-image mr-2">\n' +
                    '                                                                <img src="{{asset('img/video.png')}}"\n' +
                    '                                                                     class="empty-image">\n' +
                    '                                                            </div>\n' +
                    '                                                            <div\n' +
                    '                                                                class="position-absolute d-flex justify-content-center w-100"\n' +
                    '                                                                style="left: 0; bottom: 0">\n' +
                    '                                                                <p class="text-menu-small text-center px-1 text-gray">\n' +
                    '                                                                    ドラッグ&ドロップ､またはファイルを選択</p>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row p-2">\n' +
                    '                                                    <div class="col-6">\n' +
                    '                                                        <button type="button" name="add_media"\n' +
                    '                                                                class="btn_add_uniform_img rounded w-100 py-1 text-menu-small btn-add">\n' +
                    '                                                            ファイルを選択\n' +
                    '                                                        </button>\n' +
                    '                                                        <input type="file" name="add_media_content"\n' +
                    '                                                               style="display:none;"/>\n' +
                    '                                                    </div>\n' +
                    '                                                    <div class="col-6">\n' +
                    '                                                        <p class="text-menu-small mt-1">ファイル未選択</p>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-7 d-flex flex-column h-100 p-2">\n' +
                    '                                                <div class="row" name="img_content_show">\n' +
                    '                                                    <div class="col-12 d-flex">\n' +
                    '                                                        <div>\n' +
                    '                                                            <span class="require_fill mr-2">必須</span>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div>\n' +
                    '                                                            <p class="text-menu p-0 flex-1">\n' +
                    '                                                                画像 / 動画 提供元表記\n' +
                    '                                                            </p>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row mt-2">\n' +
                    '                                                    <div class="col-12">\n' +
                    '                                                        <input type="text" class="form-control text-menu-small"\n' +
                    '                                                               name="img_source"\n' +
                    '                                                               placeholder="例)情報誌 情報誌名" required>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row mt-2">\n' +
                    '                                                    <div class="col-12 d-flex">\n' +
                    '                                                        <div>\n' +
                    '                                                            <span class="require_fill mr-2">必須</span>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div>\n' +
                    '                                                            <p class="text-menu p-0 flex-1">\n' +
                    '                                                                キャプション\n' +
                    '                                                            </p>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row">\n' +
                    '                                                    <div class="col-12">\n' +
                    '                                                        <textarea class="form-control text-menu-small"\n' +
                    '                                                                  placeholder="画像に対しての説明文(キャプション)をお願いいたします｡"\n' +
                    '                                                                  name="caption" rows="4" required=""></textarea>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <p class="text-menu-small text-right menu-icon text-decoration">\n' +
                    '                                                    画像の登録･編集に保存する</p>\n' +
                    '\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-1 add_media add_icon_position">\n' +
                    '                                <img class="img-icon height-half" src="{{asset('img/add.png')}}">\n' +
                    '                            </div>\n' +
                    '\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <div class="col-4"></div>\n' +
                    '                </div>'
                $(prev_index).after(content);
            });

            var youtube_cnt = 0;
            $(document).on('click', '.add_youtube', function () {
                event.preventDefault();
                var prev_id = $(this).parent().parent().parent()[0].id;
                var index = youtube_cnt + 1;
                youtube_cnt = youtube_cnt + 1;
                var new_id = 'add_media_' + index;
                var prev_index = '#' + prev_id;
                var content = $(prev_index)[0].outerHTML;
                content = content.replace(prev_id, new_id);
                content = content.replace('aria-grabbed="true"', 'aria-grabbed="false"');
                $(prev_index).after(content);
            });

            //function for selecting an item
            function addSelection(item) {

                //set this item's grabbed state
                item.setAttribute('aria-grabbed', 'true');

            }

            //function for unselecting an item
            function removeSelection(item) {
                //reset this item's grabbed state
                item.setAttribute('aria-grabbed', 'false');
            }

            //function for applying dropeffect to the target containers
            function addDropeffects() {
                //apply aria-dropeffect and tabindex to all targets apart from the owner
                for (var len = targets.length, i = 0; i < len; i++) {
                    if (targets[i].getAttribute('aria-dropeffect') == 'none') {
                        targets[i].setAttribute('aria-dropeffect', 'move');
                        targets[i].setAttribute('tabindex', '0');
                    }
                }


                var items = document.querySelectorAll('[data-draggable="item"]');
                //remove aria-grabbed and tabindex from all items inside those containers
                for (var len = items.length, i = 0; i < len; i++) {
                    if (items[i].getAttribute('aria-grabbed')) {
                        items[i].removeAttribute('aria-grabbed');
                        items[i].removeAttribute('tabindex');
                    }
                }
            }

            //function for removing dropeffect from the target containers
            function clearDropeffects() {
                //if we have any selected items

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

            //shortcut function for identifying an event element's target container
            function getContainer(element) {
                do {
                    if (element.nodeType == 1 && element.getAttribute('aria-dropeffect')) {
                        return element;
                    }
                }
                while (element = element.parentNode);

                return null;
            }

            $(document).on("mousedown touchstart", ".drag_item", function (e) {
                $(this).addClass('grabbing');
                //if the element is a draggable item

                //clear dropeffect from the target containers
                clearDropeffects();

                //if the multiple selection modifier is not pressed
                //and the item's grabbed state is currently false
                if ($(this)[0].getAttribute('aria-grabbed') == 'false') {
                    //then add this new selection
                    addSelection($(this)[0]);
                }

            });


            //mouseup event to implement multiple selection
            //document.addEventListener('mouseup', function (e) {
            $(document).on("mouseup touchend", ".drag_item", function (e) {
                $(this).removeClass('grabbing')
                //if the element is a draggable item
                //and the multipler selection modifier is pressed
                //if the item's grabbed state is currently true
                if ($(this)[0].getAttribute('aria-grabbed') == 'true') {
                    //unselect this item
                    removeSelection($(this)[0]);

                    //if that was the only selected item
                    //then reset the owner container reference
                }
                //else [if the item's grabbed state is false]
                else {
                    //add this additional selection
                    addSelection($(this)[0]);
                }

            });

            //dragstart event to initiate mouse dragging

            var remain = true;
            //document.addEventListener('dragstart', function (e) {
            $(document).on("dragstart", ".drag_item", function (e) {
                var id = e.target.parentNode.id;
                var index = '#' + id;
                var rest = $(index).find('.drag_item').length;
                if (rest === 1) {
                    remain = false;
                }
                //if the element's parent is not the owner, then block this event


                //[else] if the multiple selection modifier is pressed
                //and the item's grabbed state is currently false
                if ($(this)[0].getAttribute('aria-grabbed') == 'false') {
                    //add this additional selection
                    addSelection($(this)[0]);
                }

                //we don't need the transfer data, but we have to define something
                //otherwise the drop action won't work at all in firefox
                //most browsers support the proper mime-type syntax, eg. "text/plain"
                //but we have to use this incorrect syntax for the benefit of IE10+
                // e.dataTransfer.setData('text', '');

                //apply dropeffect to the target containers
                addDropeffects();

            });


            //related variable is needed to maintain a reference to the
            //dragleave's relatedTarget, since it doesn't have e.relatedTarget
            var related = null;
            var dropTarget = null;

            //dragenter event to set that variable
            //document.addEventListener('dragenter', function (e) {
            $(document).on("dragenter", ".drag_item", function (e) {
                related = $(this)[0];
            });

            //dragleave event to maintain target highlighting using that variable
            document.addEventListener('dragleave', function (e) {
                //get a drop target reference from the relatedTarget
                dropTarget = getContainer(related);
                //if the target is the owner then it's not a valid drop target

                //if the drop target is different from the last stored reference
                //(or we have one of those references but not the other one)

            }, false);

            var is_del = false;
            //dragover event to allow the drag by preventing its default
            document.addEventListener('dragover', function (e) {
                var id = e.target.id;
                if (id == 'del_btn' || id == 'del_img') {
                    is_del = true;
                }
                //if we have any selected items, allow them to be dragged
                e.preventDefault();
            }, false);


            var delete_element = '';
            //dragend event to implement items being validly dropped into targets,
            //or invalidly dropped elsewhere, and to clean-up the interface either way
            document.addEventListener('dragend', function (e) {
                if (is_del) {
                    delete_element = e.target;
                    $('#confirm_delete').modal('show');
                    is_del = false;
                    return;
                }

                dropTarget.after(e.target);
                // var dropTargeParenttId = dropTarget.id;
                // var pindex = '#' + dropTargeParenttId;
                // var rest = $(pindex).find('.drag_item').length - 1;
                // var dropTargetId = dropTarget.id;
                // var split = dropTargetId.split('_');
                // var start_index = parseInt(split[2]);
                // if (rest === start_index) {
                //
                //     if (!remain) {
                //         dropTarget.after(e.target.parentNode);
                //         //dropTarget.afterNode.after(e.target);
                //     } else {
                //         dropTarget.after(e.target);
                //     }
                // } else {
                //     dropTarget.after(e.target);
                // }

                //dropTarget.appendChild(e.target);
                //if we have a valid drop target reference
                //(which implies that we have some selected items)

            }, false);

            $('#button_delete').on('click', function () {
                delete_element.remove();
                $('#confirm_delete').modal('hide');

            })

            $(document).on('click', '[name="add_media"]', function () {
                $(this).next().click();
            })
            // $('[name=add_media]').click(function () {
            //     $(this).next().click();
            // });

            $(document).on('drag dragstart dragend dragover dragenter dragleave drop', '[name="add_media_content"]', function () {
                e.preventDefault();
                e.stopPropagation();
            }).on('drop', function (e) {
                var file = e.originalEvent.dataTransfer.files;
                var img_empty = $(this).parent().parent().prev().find('div[name="img_empty"]');
                var img_body = $(this).parent().parent().prev().find('[name="img_body"]');
                var video_body = $(this).parent().parent().prev().find('[name="video_body"]');
                var media_container_id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()[0].id;
                var split = media_container_id.split("_media_");
                var index = split[1];
                var reader = new FileReader();
                reader.onload = function (e) {
                    img_empty.addClass('d-none');

                    var file_type = file.type.split('/');
                    if (file_type[0] == "image") {

                        img_body.attr('src', e.target.result);
                        img_body.removeClass('d-none');
                    } else {

                        video_body.attr('src', e.target.result);
                        video_body.removeClass('d-none');
                    }
                }
                reader.readAsDataURL(this.files[0]); // convert to base64 string

                var imageListItem = {};
                imageListItem['index'] = index;
                imageListItem['file'] = this.files[0];
                imageList.push(imageListItem);
            })
            // $("[name='add_media_content']").on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            //     e.preventDefault();
            //     e.stopPropagation();
            // }).on('drop', function(e) {
            //     var id = $(this).attr('id');
            //     droppedFiles = e.originalEvent.dataTransfer.files;
            //     var reader = new FileReader();
            //     reader.onload = function(e) {
            //         var img_body = $(this).parent().parent().prev().find('[name="img_body"]');
            //         var img_empty = $(this).parent().parent().prev().find('[name="img_empty"]');
            //         img_body.attr('src', e.target.result);
            //         img_body.removeClass('d-none');
            //         img_empty.addClass('d-none');
            //     }
            //
            //     reader.readAsDataURL(droppedFiles[0]);
            //         var imgHeightLogo = droppedFiles[0];
            //
            // });

            var imageList = [];

            $(document).on('change', '[name="add_media_content"]', function () {
                if (this.files && this.files[0]) {
                    var file = this.files[0];
                    var img_empty = $(this).parent().parent().prev().find('div[name="img_empty"]');
                    var img_body = $(this).parent().parent().prev().find('[name="img_body"]');
                    var video_body = $(this).parent().parent().prev().find('[name="video_body"]');
                    var media_container_id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()[0].id;
                    var split = media_container_id.split("_media_");
                    var index = split[1];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        img_empty.addClass('d-none');

                        var file_type = file.type.split('/');
                        if (file_type[0] == "image") {

                            img_body.attr('src', e.target.result);
                            img_body.removeClass('d-none');
                        } else {

                            video_body.attr('src', e.target.result);
                            video_body.removeClass('d-none');
                        }
                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string

                    var imageListItem = {};
                    imageListItem['index'] = index;
                    imageListItem['file'] = this.files[0];
                    imageList.push(imageListItem);

                }
            })

            var garden_id = $("#garden_id").val();
            var media_id = $('#media_id').val()
            var media_type = '';
            var media_name = '';
            var public_date = '';
            var media_title = '';
            var public_type = 0;
            var subtitle = [];
            var content = [];
            var youtube = [];
            var image = [];
            $("#btn_reservation").click(function (event) {
                event.preventDefault();
                submitFormData(3);
            });
            $("#btn_confirm").click(function (event) {
                event.preventDefault();
                submitFormData(2);
            });
            $("#btn_private").click(function (event) {
                event.preventDefault();
                submitFormData(1);
            });
            $("#btn_public").click(function (event) {
                event.preventDefault();
                submitFormData(0);
            });

            $('#del_btn').click(function (event) {
                event.preventDefault();

            })

            function submitFormData(public_type) {
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    $('input[type=radio]').each(function (index) {
                        if ($(this)[0].checked == true) {
                            media_type = $(this).val();
                        }
                    });
                    media_name = $('#media_name').val()
                    public_date = $('#public_date').val();
                    media_title = $('#media_title').val();

                    $('#form_garden_id').val(garden_id);
                    $('#form_media_type').val(media_type);
                    $('#form_media_name').val(media_name);
                    $('#form_media_title').val(media_title);
                    $('#form_public_date').val(public_date);
                    $('#form_public_type').val(public_type);

                    if (public_type === 3) {
                        var public_time = $('input[name="media_public_time"]').val()
                        if(public_time==''){
                            $('input[name="media_public_time"]')[0].addClass('active');
                            return;
                        }
                        $('#form_public_time').val(public_time);
                    }

                    $('#form_media_id').val(media_id);

                    var drag_items = $('.drag_item');
                    for (var i = 0; i < drag_items.length; i++) {
                        if (drag_items[i].getAttribute('type') === 'subtitle') {
                            var sub = {};
                            var item_id = drag_items[i].id;

                            var item_text = $('#' + item_id).find('textarea[name="subtitle"]').val();
                            sub['subtitle'] = item_text;
                            sub['order'] = i + 1;
                            subtitle.push(sub);
                        }
                        if (drag_items[i].getAttribute('type') === 'content') {
                            var sub = {};
                            var item_id = drag_items[i].id;
                            var item_text = $('#' + item_id).find('textarea[name="content"]').val();
                            sub['content'] = item_text;
                            sub['order'] = i + 1;
                            content.push(sub);
                        }
                        if (drag_items[i].getAttribute('type') === 'youtube') {
                            var sub = {};
                            var item_id = drag_items[i].id;
                            var item_text = $('#' + item_id).find('input[name="youtube"]').val();
                            sub['url'] = item_text;
                            sub['order'] = i + 1;
                            youtube.push(sub);
                        }
                        if (drag_items[i].getAttribute('type') === 'images') {
                            var sub = {};

                            sub['order'] = i + 1;

                            var item_id = drag_items[i].id;
                            var split = item_id.split("_media_");
                            var index = split[1];
                            if ($('#' + item_id).find('img').hasClass('d-none')) {
                                sub['type'] = 'video';
                                var imgFiles = $('#' + item_id).find('video[name="video_body"]')[0].src;
                            } else {
                                sub['type'] = 'image';
                                var imgFiles = $('#' + item_id).find('img[name="img_body"]')[0].src;
                            }

                            var caption = $('#' + item_id).find('textarea[name="caption"]').val();
                            sub['caption'] = caption;
                            var img_source = $('#' + item_id).find('input[name="img_source"]').val();
                            sub['img_source'] = img_source;

                            sub['id'] = index;

                            sub['img'] = imgFiles;

                            sub['url'] = item_text;
                            image.push(sub);
                        }
                    }

                    $('#form_subtitle').val(JSON.stringify(subtitle));
                    $('#form_content').val(JSON.stringify(content));
                    $('#form_youtube').val(JSON.stringify(youtube));
                    $('#form_image').val(JSON.stringify(image));

                    var form = $('form')[1];
                    // You need to use standard javascript object here
                    var formData = new FormData(form);

                    for (var i = 0; i < imageList.length; i++) {
                        var index = imageList[i].index;
                        var imgFile = imageList[i].file;
                        formData.append('file_' + index, imgFile);
                    }


                    // subtitle = {};
                    // content = {};
                    // youtube = {};
                    // image = {};

                    var url = home_path + '/ajax/admin/modify/media';
                    $.ajax({
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            alertify.success("更新成功");
                        }
                    });
                }

            }
        });
    </script>
@endsection
