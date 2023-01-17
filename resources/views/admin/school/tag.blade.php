@extends('admin.layouts.app')

@section('nav')
    @include('admin.layouts.navbar')
@endsection

@section('css4page')
    <style>
        .main-content {
            background-color: #F2F2F2;
        }

        .tag-title {
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
        .image_modify_modal{
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }

        .custom-control-label::before {
            /*top: .25rem;*/
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

        .btn-save {
            font-size: 1rem;
            font-weight: 800;
            background-color: #2BAFFF;
            /* background-image: url("{{asset('img/top-search.png')}}"); */
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

        @media (min-width:768px) {
            .btn-save:hover {
                color: #2BAFFF;
                background-color: white;
            }
        }

        input[type=time] {
            width: auto;
        }

        /*.custom-checkbox .custom-control-label::before {*/
        /*    left: -1.5rem;*/
        /*}*/

        /*.custom-radio .custom-control-input:checked~.custom-control-label:before {*/
        /*    left: -1.5rem;*/
        /*}*/

        /*.custom-control-label::after {*/
        /*    top: .25rem;*/
        /*}*/

        .empty-image {
            width: 3rem;
            height: 3rem;
        }

        [name='image_content_add_button']:hover {
            cursor: default;
        }

        [name='image_content_remove_button']:hover {
            cursor: default;
        }


        .height-half {
            height: 1rem;

        }

        .require {
            font-size: 14px;
            font-family: YugoMedium;
            color: #FF557E !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            padding: 0 2px;
            width: fit-content;
        }

        .text-add-small {
            font-size: 14px;
            font-family: YugoMedium;
        }

        [name=minus-circle] {
            cursor: pointer;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .custom-radio .custom-control-input:checked~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }
        .img-up {
            position: absolute;
            right: 1rem;
            bottom: 1.25rem;
            width: 2.4rem;
        }

        .btn-add {
            background-image: linear-gradient(0deg, #CCCCCC, #F2F2F2);
        }

        .text-small-admin {
            font-size: 14px;
            font-family: YugoMedium;
        }
        .text-title {
            font-size: 24px !important;
            font-family: YugoBold;
        }
        .text-menu-user {
            font-size: 20px !important;
            font-family: YugoBold;
        }

        .tag-title {
            border-top: 1px solid #808080;
            background-color: #DAF6F6;
            padding-top: 0;
            padding-bottom: 0;
            color: white;
        }

        .custom-control-label::before {
            position: absolute;
            /*top: .25rem;*/
            left: -2rem;
            display: block;
            width: 1.5rem;
            height: 1.5rem;
            pointer-events: none;
            content: "";
            background-color: #fff;
            border: #adb5bd solid 1px;
        }

        .custom-control-label::after {
            position: absolute;
            /*top: .25rem;*/
            left: -2rem;
            display: block;
            width: 1.5rem !important;
            height: 1.5rem !important;
            content: "";
            background: no-repeat 50%/50% 50%;
        }

        .custom-control {
            padding-left: 2rem;
        }

        .height-1-half {
            height: 2rem;
            min-width: .1rem;
        }

        .w-20{
            width: 20% !important;
        }

        .under-tab{
            border-bottom: 6px solid #EAEAEA;
            background-color: #A7EBE8
        }
        .under-tab:active{
            border-bottom: 6px solid #216887 !important;
        }

        .height-2 {
            height: 2rem;
            min-width: .1rem;
        }



    </style>
@endsection

@section('content')
    <input type="hidden" id="garden_id" value="{{$garden -> garden_id}}">
    <div class="position-sticky card-header z-depth-1">
        <div class="d-flex align-items-center py-2">
            <p class="flex-1 text-title">{{$garden -> garden_name}}</p>
            <div class="d-flex align-items-baseline">
                <p class="mr-2  text-menu-small">ID：000000(自動生成)</p>
                <img class='title-kodomore img-icon height-1-half' src="<?=asset('img/kodomore.png');?>">
            </div>

        </div>

    </div>

    <div class="w-100 d-flex">
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex" style="border-bottom: 6px solid #216887 !important;">
                <a class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto text-3" href="{{url('/admin/school/detail')}}">
                    <img class="img-icon height-2 p-1" src="{{asset('img/detail-edit-blue.png')}}"><span style="padding-top: 5px;">詳細ページ編集</span>
                </a>
            </div>

        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/event-blue.png')}}"><span style="padding-top: 5px;">イベント情報</span>
                </p>
            </div>
        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/blog-blue.png')}}"><span style="padding-top: 5px;">ブログ</span>
                </p>
            </div>
        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/com-blue.png')}}"><span style="padding-top: 5px;">コミュニケーション</span>
                </p>
            </div>
        </div>

        <div class="w-20" style="">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/setting-blue.png')}}"><span style="padding-top: 5px;">設定</span>
                </p>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">園トップの登録･編集 > “ざっくり”OR検索 </p>

            <a class="text-menu-small menu-icon text-decoration" href="{{url('/school/detail') . '/' . $garden -> garden_id}}" target="_blank">詳細ページ表示</a>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-half" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>



    <div class="card mb-2">
        <div class="tag-title d-flex">
            <p class="card-header top-menu text-menu-user py-1">
                キーワードから“ざっくり” OR検索 [複数選択可]
            </p>
            <div class="flex-1"></div>
        </div>
        <div class="card-body">
            <p class="text-menu p-0 mb-3">タグを選んでください｡インデックスと詳細ページに表示されます｡</p>
            <p class="text-menu p-0">※下記に無いものは自由に入力で入れられます｡  ※自由に入力で追加された特徴は園の詳細ページのみの表記となります｡ご了承ください｡</p>
        </div>

        <div id="add_free_input" class="d-none text-menu">
            <div class="row align-items-center mt-3" id="free_input_index" name="free_input_header">
                <div class="col-12">
                    <input type="text" class="form-control text-menu-small" placeholder=""
                           maxlength="15" name="limit-length" relate-count-id="caption_count_index" id="caption_index">
                </div>
                <div class="position-absolute" style="right: -55px;">
                    <p class="text-menu-small ">
                        <span id="caption_count_index">0/15</span>
{{--                        <i class="ml-1 fa fa-minus-circle" name="minus-circle" id="remove_free_index"></i>--}}
                        <img class="ml-1 img-icon height-half"  name="minus-circle" id="remove_free_index"
                             src="{{asset('img/minus.png')}}">
                    </p>
                </div>
            </div>
        </div>



        @foreach($tagList as $index_tag_type => $tagType)
            <div class="card-body pt-1 pb-4 " id="garden_tag_{{$tagType -> id}}" name="garden-header">
                <div class="row py-2">
                    <div class="col-2">
                        <p class="text-menu-small mt-3"><?=$tagType->type_title;?> </p>
                        <p class="require">該当必須</p>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            @foreach($tagType->tagList as $index_tag => $tag)
                                <div class="col-3  pt-3">
                                    <div class="custom-control custom-checkbox">
                                        @if($tag -> isSelect == false)
                                            <input type="checkbox" class="custom-control-input tag-detail text-menu-small" id="tag_<?=$tag->id;?>">
                                        @else
                                            <input type="checkbox" class="custom-control-input tag-detail text-menu-small" id="tag_<?=$tag->id;?>" checked>
                                        @endif
                                        <label class="custom-control-label text-menu-small" for="tag_<?=$tag->id;?>"><?=$tag->tag_title;?></label>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p class="text-menu-small mt-4">自由に入力</p>
                    </div>
                    <div class="col-8">

                        <div id="free_input_{{$tagType -> id}}">
                            @foreach($tagType -> contents as $index => $content)
                                <div class="row align-items-center mt-3" id="free_input_index_{{$tagType -> id.'_'.$index}}" name="free_input_header_{{$tagType -> id}}">
                                    <div class="col-12">
                                        <input type="text" class="form-control text-menu-small" placeholder=""
                                               maxlength="15" name="limit-length" relate-count-id="caption_count_index_{{$tagType -> id.'_'.$index}}"
                                               id="caption_index_{{$tagType -> id.'_'.$index}}" value="{{$content -> content}}">
                                    </div>
                                    <div class="position-absolute" style="right: {{$index>0?'-55px':'-30px'}}">
                                        <p class="text-menu-small">
                                            <span id="caption_count_index_{{$tagType -> id.'_'.$index}}">{{mb_strlen($content -> content)}}/15</span>
                                            @if($index > 0)
{{--                                                <i class="ml-1 fa fa-minus-circle" name="minus-circle" id="remove_free_index_{{$tagType -> id.'_'.$index}}"></i>--}}
                                                <img class="ml-1 img-icon height-half"  name="minus-circle" id="remove_free_index_{{$tagType -> id.'_'.$index}}"
                                                     src="{{asset('img/minus.png')}}">
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                        <input type="hidden" id="count_free_{{$tagType -> id}}" value="{{count($tagType -> contents)}}">
                        <div class="row mt-2">
                            <div class="col-12 d-flex">
                                <div class="flex-1"></div>
                                <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" id="add_input_{{$tagType -> id}}" style="border: 1px solid #999999 !important;">＋自由に入力の追加
                                </button>
{{--                                <button class="text-add-small px-2 rounded" name="btn_add_input" id="add_input_{{$tagType -> id}}" style="border: 1px solid">＋自由に入力の追加</button>--}}
                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>

                </div>


            </div>

            @if($index_tag_type !== count($tagList)-1)
                <div class="border-light-bottom"></div>
            @endif


        @endforeach
        <div class="card position-sticky" style="bottom: 0rem; z-index: 1050">
            <div class="card-body">
                <div class="row my-4">
                    <div class="offset-4 col-6">
                        <div class="d-flex">
                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" style="border: 1px solid #C4C4C4; color: #919191;" id="btn_back">
                                変更を取り消す
                            </button>
                            <button class="mx-2 flex-1 py-1 rounded text-menu-small btn-normal btn-preview"  style="background-color: #6DDDD9 !important; border: none !important;"
                                    id="btn_preview"> <img class="mr-1 img-icon mb-1"
                                                           src="{{asset('img/preview-icon.png')}}">プレビュー
                            </button>
                            <button type="submit"
                                    class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal" style="border: none !important;"
                                    id="btn_save"><img class="mr-1 img-icon height-1 py-1" style="height: 32px;"
                                                       src="{{asset('img/update-icon.png')}}">変更内容を更新
                            </button>
                        </div>

                    </div>
                </div>
            </div>
{{--            <div class="card-body">--}}
{{--                <div class="row m-4">--}}
{{--                    <div class="offset-2 col-8">--}}
{{--                        <div class="d-flex">--}}
{{--                            --}}{{--                    <button class="flex-1 py-1 rounded text-menu-small" id="btn_back" style="border: 1px solid #C4C4C4; color: #919191;">もどる</button>--}}
{{--                            --}}{{--                    <button class="mx-4 flex-1 py-1 rounded  top-menu text-menu-small text-white" style="border: none">入力内容の確認</button>--}}
{{--                            --}}{{--                    <button class="flex-1 py-1 rounded background-pink text-menu-small text-white" id="btn_save" style="border: none">登録･編集する</button>--}}
{{--                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" style="border: 1px solid #C4C4C4; color: #919191;" id="btn_back">--}}
{{--                                変更を取り消す--}}
{{--                            </button>--}}
{{--                            <button class="mx-4 flex-1 py-1 rounded top-menu text-menu-small btn-normal" style="border: none !important;">--}}
{{--                                <img class="mr-1 img-icon height-half mb-1"--}}
{{--                                     src="{{asset('img/preview-icon.png')}}">プレビュー--}}
{{--                            </button>--}}
{{--                            <button class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal" style="border: none !important;"--}}
{{--                                    id="btn_save"><img class="mr-1 img-icon height-1 py-1"--}}
{{--                                                       src="{{asset('img/update-icon.png')}}">変更内容を更新--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>


        <div class="card">
            <p class="mb-2 text-center w-100 text-menu-small">｜ お問合せ ｜ FAQ(よくあるご質問) ｜ ヘルプ ｜ 利用規約 ｜ プライバシーポリシー ｜ </p>

            <div class="card-body text-menu-small background-white" style="border-top: 1px solid #CCCCCC">
                <p class="text-center">Copyright ©ad-kit.co,.ltd. All Rights Reserved. No reproduction without
                    permission.</p>
            </div>
        </div>
    </div>

    <div class="card background-transparent position-sticky" style="bottom: 2rem; margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/up_arrow.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>



    <form class=" d-none" novalidate id="modify_garden" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="tag_list" id="form_tag_list">
        <input name="id_list" id="form_id_list">
        <input name="garden_id" id="form_garden_id">
        <input name="comment_title" id="form_comment_title">
        <input name="comment_description" id="form_comment_description">

    </form>

@endsection

@section('modal')

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
        var tab_name = $('#tab_name').val();

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
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var count = $("#garden_img_size").val();
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })


            function changeEvent() {
                $(document).on('input', "[name='limit-length']", function() {
                    var val = $(this).val();
                    var length = val.length;
                    var id = $(this).attr('relate-count-id');
                    var maxLength = $(this).attr('maxlength');
                    $("#" + id).html(length + '/' + maxLength);
                });

                $(document).on('click', "[name='minus-circle']", function() {
                    var id = $(this).attr('id');

                    var split = id.split("index_");
                    var splitSub = split[1].split("_");
                    var index = splitSub[0];
                    var count = splitSub[1];
                    $("#free_input_index_" + index + "_" + count).remove();
                });


            }

            changeEvent();

            $("[name=btn_add_input]").click(function() {
                var id = $(this).attr('id');

                var split = id.split("input_");
                var index = split[1];
                var count = $("#count_free_" + index).val();

                var content = $("#add_free_input").html();

                content = content.replace(/_index/g, "_index_" + index + "_" + count);

                content = content.replace(/free_input_header/g, "free_input_header_" + index);


                $("#free_input_" + index).append(content);
                count = parseInt(count) + 1;
                $("#count_free_" + index).val(count);
            });


            $("#btn_back").click(function () {
               window.location.reload();
            });

            $('#btn_preview').click(function () {
                event.preventDefault();
                var selectTag = [];
                $(".tag-detail").each(function() {
                    if($(this).prop('checked')) {
                        var label = $(this)[0].labels[0].innerText;
                        selectTag.push(label);
                    }
                });
                localStorage.setItem('tag_garden', JSON.stringify(selectTag));
                var garden_id = $("#garden_id").val();
                var url = home_path + '/admin/school/tag/preview/' + garden_id
                window.open(url, 'School Detail', 'height=900,width=400');
            })

            $("#btn_save").click(function () {
                var indexes = [];
                var contents = [];
                $("[name=garden-header]").each(function() {
                    var id = $(this).attr('id');
                    var split = id.split("tag_");
                    var index = split[1];
                    indexes.push(index);
                    var contentsInfo = [];
                    $("[name=free_input_header_" + index + "]").each(function() {
                        var subId = $(this).attr('id');
                        var split = subId.split("index_");
                        var splitSub = split[1].split("_");
                        var count = splitSub[1];
                        var content = $("#caption_index_" + index + "_" + count).val();
                        if(content.length > 0) {
                            contentsInfo.push(content);
                        }
                    });
                    var contentDetail = {}
                    contentDetail['type_id'] = index;
                    contentDetail['content'] = contentsInfo;
                    contents.push(contentDetail);
                });
                var garden_id = $("#garden_id").val();
                var selectTag = [];
                $(".tag-detail").each(function() {
                    if($(this).prop('checked')) {
                        var id = $(this).attr('id');
                        var split = id.split('_');
                        var index = split[1];
                        selectTag.push(index);
                    }
                });
                var selectTagStr = selectTag.join(',');
                var url = home_path + '/ajax/school/modify/tag/' + garden_id;
                $.ajax({
                    url:url,
                    type:'post',
                    data: {
                        tags: selectTagStr,
                        contents: JSON.stringify(contents)
                    },
                    success: function (response) {
                        alertify.success("更新成功");
                    },
                    error: function () {
                    }
                });
            });






        });
    </script>
@endsection
