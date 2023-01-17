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

        .grabbing {
            cursor: grabbing !important;
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

        /* drop target focus and dragover state */
        /*[data-draggable="delete"][aria-dropeffect="move"]:focus,*/
        /*[data-draggable="delete"][aria-dropeffect="move"].dragover {*/
        /*    outline: none;*/

        /*    box-shadow: 0 0 0 1px #fff, 0 0 0 3px #68b;*/
        /*}*/

        /*[data-draggable="download"][aria-dropeffect="move"]:focus,*/
        /*[data-draggable="download"][aria-dropeffect="move"].dragover {*/
        /*    outline: none;*/

        /*    box-shadow: 0 0 0 1px #fff, 0 0 0 3px #68b;*/
        /*}*/

        /* items focus state */
        /*[data-draggable="item"]:focus {*/
        /*    background: #999999;*/
        /*}*/

        /* items grabbed state */
        [data-draggable="item"][aria-grabbed="true"] {
            background: #999999;
        }

        th{
            font-size: 14px !important;
            background: #B3b3B3 !important;
            border-top: 1px solid !important;
            border-bottom: 1px solid !important;
        }
        td{
            border-bottom: 1px solid;
            background: white !important;
        }

        .height-1 {
            height: 1rem;
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

    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">園トップの登録･編集 > メディアにて紹介･掲載 </p>
            <p class="text-menu-small menu-icon text-decoration">詳細ページ表示</p>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>
    <div class="card">
        <div class="tag-title d-flex">
            <p class="card-header top-menu text-menu-user py-1 px-4">
                メディアにて紹介･掲載
            </p>
            <div class="flex-1"></div>
        </div>
        <div class="card-body" id="">
            <div class="row mt-3 ml-3 d-flex">
                <div class="col-8">
                    <p class="mb-2 text-center w-100 text-menu-small">全て({{$total}}) ｜  公開({{$public_cnt}}) ｜  公開予約({{$reserve_cnt}}) ｜  非公開({{$private_cnt}}) </p>
                </div>

                <div class="col-4 text-center">
                    <a class="rounded text-blue-1 text-white background-pink text-menu py-1 px-0 float-right" href="{{url('/admin/school/post-create')}}"
                            style="width: 150px">
                        <img class="img-icon height-half pb-1" src="{{asset('img/document.png')}}">
                        新規作成
                    </a>
                </div>
            </div>


            <div class="row ml-1 mt-4 sub">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="form">
                        <th width="10%" class="text-center text-menu-small" style="">公開状態</th>
                        <th width="20%" class="text-center text-menu-small" style="">イメージ</th>
                        <th width="40%" class="text-left text-menu-small" style="">メディア／詳細
                        </th>
                        <th width="30%" class="text-center text-menu-small" style="">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mediaList as $index => $media)
                        <tr>
                            @if($media->public_type == 0)
                                <td class="align-middle text-center text-menu-small">公開</td>
                                @elseif($media->public_type == 1)
                                <td class="align-middle text-center text-menu-small">非公開</td>
                                @elseif($media->public_type === 3)
                                <td class="align-middle text-center text-menu-small">公開予約<br>{{$media->public_time}}
                                    00：00</td>
                                @endif

                            <td class="align-middle"> <img class="img-content img-responsive full-width" src="{{asset('/storage/img/media/'.$media->img)}}">
                            </td>
                            <td class="align-middle text-menu-user text-left">{{$media -> media_name.$media -> public_date}}で紹介された内容です｡<br>{{$media->media_title}}
                            </td>
                            <td class="align-middle text-center">
                                <input name="media_id" value="{{$media->media_id}}" style="display: none">

                                <a class="rounded background-darkest-pink text-menu py-1 px-0 float-right" style="width: 40%; border: none" href="{{url('/ajax/admin/detail/' . $media->media_id)}}">
                                    <img class="img-icon height-half pb-1" src="{{asset('img/document-edit.png')}}">
                                    内容の編集
                                </a>
                                <a class="rounded text-menu title-background py-1 px-0 mb-1 mr-2 float-right" style="width: 40%; border: none" href="{{url('/media/detail/' . $media->media_id)}}">
                                    <img class="img-icon height-half pb-1" src="{{asset('img/document-search.png')}}">
                                    プレビュー
                                </a>

                                <a class="rounded text-menu background-darker-pink py-1 px-0 float-right" style="width: 40%; border: none" href="{{url('/ajax/admin/copy/' . $media->media_id)}}">
                                    <img class="img-icon height-half pb-1" src="{{asset('img/document-copy.png')}}">
                                    複製して編集
                                </a>
                                <button class="rounded text-menu background-light-gray py-1 px-0 mr-2 btn_delete float-right" style="width: 40%; border: none">
                                    <img class="img-icon height-half pb-1" src="{{asset('img/delete-black.png')}}">
                                    削　除
                                </button>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="row ml-1 mt-4">
                <div class="offset-8 col-4">
                    <form name="pageForm" action="{{url('/admin/school/media-list')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-4">
                                <select class="custom-select text-menu-small" name="per_page" id="per_page">
                                    <option value="10" {{$per_page == 10 ? 'selected' : ''}}>10</option>
                                    <option value="20" {{$per_page == 20 ? 'selected' : ''}}>20</option>
                                    <option value="30" {{$per_page == 30 ? 'selected' : ''}}>30</option>
                                    <option value="50" {{$per_page == 50 ? 'selected' : ''}}>50</option>
                                </select>
                            </div>
                            <div class="col-4 mt-1">
                                <label class="rounded background-white text-menu-small text-center align-middle pt-1" name="page_number" style="width: 30px; height: 30px; border: 1px solid">{{$cur_page}}</label>
                                <label>/{{$last_page}}</label>
                            </div>
                            <div class="col-4 text-center d-flex">
                                <div id="btn_prev" class="rounded text-center {{$cur_page == 1 ? 'background-gray' : 'background-darker-gray'}} mr-2" {{$cur_page == 1 ? 'disabled': ''}} style="width: 30px; height: 30px; border: none">
                                    <img class="img-icon height-half mt-1" src="{{asset('img/previous.png')}}">
                                </div>
                                <div id="btn_next" class="rounded text-center {{$cur_page >= $last_page ? 'background-gray' : 'background-darker-gray'}}" {{$cur_page >= $last_page ? 'disabled': ''}} style="width: 30px; height: 30px; border: none">
                                    <img class="img-icon height-half mt-1" src="{{asset('img/next_icon.png')}}">
                                </div>
                            </div>
                        </div>
                        <input id="cur_page"  style="display: none" name="cur_page" class="form-control form-control-sm mb-2" type="number"
                               value="{{$cur_page}}">
                    </form>
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
@endsection

@section('modal')

    <div class="modal fade" id="confirm_delete" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <label>削除します｡</label>
                            <label> 削除しても｢画像の登録･編集｣に保存されている画像や動画は消えません｡
                                本当に削除してもよろしいですか？</label>
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


@endsection

@section('js4event')
        <script language="javascript" type="text/javascript">
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
            $(document).ready(function () {
                $('input').on('change', function () {
                    change_status = true;
                })
                $('textarea').on('change', function () {
                    change_status = true;
                })
                var base_url = {!! json_encode(url('')) !!};
                $('#per_page').on('change', function () {
                    document.pageForm.submit();
                });

                $('#btn_prev').on('click', function () {
                    if($(this).hasClass('background-darker-gray')){
                        var cur_page = parseInt($('#cur_page').val()) - 1;
                        $('#cur_page').val(cur_page);
                        document.pageForm.submit();
                    }
                });

                $('#btn_next').on('click', function () {

                    if($(this).hasClass('background-darker-gray')){
                        var cur_page = parseInt($('#cur_page').val()) + 1;
                        $('#cur_page').val(cur_page);
                        document.pageForm.submit();
                    }
                });

                $('.btn_delete').on('click', function () {
                    var del_id = $(this).parent().find('input[name=media_id]').val();
                    $('#del_media_id').val(del_id);
                    $('#confirm_delete').modal('show');

                })
                $('#button_delete').on('click', function () {
                    $('#confirm_delete').modal('hide');
                    $.ajaxSetup({
                        headers:
                            {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                    $.ajax({
                        url: base_url + '/ajax/admin/delete/media',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            'media_id' :  $('#del_media_id').val()
                        },
                        success: function (resp) {

                            window.location.reload();

                        },
                        error: function (error) {
                            //alert(error);

                            //window.location.reload();
                        }
                    });

                })


            });
        </script>
@endsection
