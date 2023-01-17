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

        .person-img{
            width: 45%;
            margin-top: 19px;
        }
        .camera-img{
            width: 25%;
            display: block;
            margin: auto;
            margin-top: -21px;
        }

        .setting-text{
            position: absolute;
            bottom: 10px;
            width: fit-content;
            right: 0;
        }

        .btn-title1 {
            font-size: 19px !important;
            font-family: YugoBold;
            background-color: #FF9F00 !important;
        }
        .background-gray {
            background-color: #BFBFBF !important;
        }

        .main-image{
            width: 77px !important;
            height: 77px !important;
            border-radius: 50px;
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pt-1 pb-0">
        </div>

        <div id="list-area" class="card-body position-relative py-4" style="border-bottom: 1px solid #ABABAB; display: flex;">
            <div class="main-image text-center mt-n1" id="btn_add_img">
                @if(empty($user_profile)||empty($user_profile->profile_img))
                    <img src="{{asset('img/blue-user.png')}}" class="main-image">
                    <img src="{{asset('img/camera.png')}}" class="camera-img">
                @else
                    <img src="{{asset('/img/articles/' . $user_profile->profile_img)}}" class="main-image">
                @endif
            </div>
            <input id="img_default" type="file" accept="image/*" name="file" style="display:none;" />
            <div class="ml-3 my-auto">
                @if(empty($user_profile))
                    <p class="text-title">{{$user->first_name}}</p>
                    <p class="text-medium-xs" style="color: #B3B3B3">{{$user->second_name}}</p>
                @else
                    <p class="text-title">{{$user_profile->post_name}}</p>
                    @if($user_profile->second_name_setting === 1)
                        <p class="text-medium-xs" style="color: #B3B3B3">{{$user_profile->second_name}}</p>
                    @endif
                @endif

            </div>
            <label class="setting-text mr-3 mb-0">
                <p class="text-medium-xs menu-icon text-decoration " id="profile_setting"><img src="{{asset('img/comment_profile.png')}}" class="height-1 img-icon">プロフィール設定</p>
            </label>
        </div>

        <div id="post_area" class="position-relative d-none" style="background-color: #EBF9F9; border-bottom: 1px solid #ABABAB">
            <form id="register_form" class="needs-validation" novalidate>
                {{csrf_field()}}
                <div class="position-absolute" style="right: 0.5rem; top: 0.5rem; z-index: 5">
                    <img class="img-icon height-1-half" src="{{asset('img/close_post.png')}}" id="close_post">
                </div>
                <div class="px-3 mt-5 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントを投稿しよう" rows="8" name="limit-length" maxlength="1000" id="comment" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute" id="comment_length" style="right: 1.6rem; bottom: 0.4rem">
                        0 /1000</p>
                </div>
                <div class="mt-2 custom-control custom-checkbox mx-3">
                    <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢投稿ガイドライン｣</span>に同意して投稿</label>
                </div>
                <div class="mt-2 flex justify-content-center px-4">
                    <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title1 text-white w-75 my-3" id="btn_submit" disabled><img class="height-4 img-icon mr-2" src="{{asset('img/post-comment.png')}}" style="margin-top: -2px">投稿する</button>
                </div>
            </form>
        </div>
        <form id="submit_comment" name="comment" method="post">
            {{csrf_field()}}
            <input type="hidden" name="user_name" value="">
            <input type="hidden" value="" name="user_id">
            <input type="hidden" value="" name="article_id" id="article_id">
            <input type="hidden" value="" name="comment_id" id="modify_comment_id">
            <input type="hidden" name="content" id="form_content">
        </form>
        <div id="comment_list">
        </div>

        <div id="profile-area" class="card-body position-relative d-none">
            <form id="profile_form" class="needs-validation" novalidate enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="d-flex">
                    <div class="main-image text-center mt-1" id="btn_add_img">
                        @if(empty($user_profile)||empty($user_profile->profile_img))
                            <img src="{{asset('img/blue-user.png')}}" class="main-image" id="main_img">
                            <img src="{{asset('img/camera.png')}}" class="camera-img" id="camera_img">
                        @else
                            <img src="{{asset('/img/articles/' . $user_profile->profile_img)}}" class="main-image" id="main_img">
                            <img src="{{asset('img/camera.png')}}" class="camera-img d-none" id="camera_img">
                        @endif
                    </div>
                    <input id="img_default" type="file" accept="image/*" name="file" style="display:none;" />
                    <div class="ml-3 my-auto pt-2">
                        <p class="text-medium-xs">プロフィール画像</p>
                        <div class="text-center w-100" style="height: fit-content">
                            <button id="no_profile_del" class="gray-btn-gradient rounded text-medium-xs background-white py-2 px-3 mr-2"
                                   style="margin-bottom: 10px; border: 1px solid #969696 !important;">
                                <span>削除する</span>
                            </button>
                            <button id="modify_img"
                                    class="gray-btn-gradient rounded text-white btn-title py-2 px-3"
                                    style="margin-bottom: 10px; font-size: 14px !important;"><span class="text-medium-xs">変更する</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-3">
                    <p class="text-medium-xs w-100">ここで変更された内容はマイページに反映されます</p>
                </div>

                <div class="mt-2 d-flex justify-content-center mx-n3" style="background-color: #E6F7F8">
                    <p class="text-normal p-1 flex-1 pl-3" style="color: #666666 !important;">
                        投稿ネーム
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-3 ">必須</p>
                </div>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="post_user_name_type0" value="0" name="img_caption_index" {{empty($user_profile)||$user_profile->post_name_setting == '0'?'checked':''}} required>
                    <label class="custom-control-label text-medium-light" for="post_user_name_type0">本名を表示名に設定する</label>
                </div>

                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="post_user_name_type1" value="1" name="img_caption_index" {{!empty($user_profile)&&$user_profile->post_name_setting == '1'?'checked':''}} required>
                    <label class="custom-control-label text-medium-light" for="post_user_name_type1">ニックネームを表示名に設定する</label>
                </div>

                <input type="text" class="form-control text-small mt-2" id="post_nickname" name="post_nickname" placeholder="ニックネーム(15文字以内)(例： たろう)" maxlength="15" {{!empty($user_profile)&&$user_profile->post_name_setting == '1'?'required':'disabled'}} value="{{!empty($user_profile)&&$user_profile->post_name_setting == '1'?$user_profile->post_name:''}}" >

                <input type="hidden" id="profile_image_url" name="profile_img_url" value="{{!empty($user_profile)?$user_profile->profile_img:''}}">
                <div class="mt-2 d-flex justify-content-center mx-n3" style="background-color: #E6F7F8">
                    <p class="text-normal p-1 flex-1 pl-3" style="color: #666666 !important;">
                        肩書き
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-3 ">必須</p>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="user_name_type0" value="1" {{empty($user_profile)||$user_profile->second_name_setting == 1?'checked':''}} name="img_name_index"  required>
                            <label class="custom-control-label text-medium-light" for="user_name_type0">表示する</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="user_name_type1" value="0" name="img_name_index" {{!empty($user_profile)&&$user_profile->second_name_setting == 0?'checked':''}} required>
                            <label class="custom-control-label text-medium-light" for="user_name_type1">非表示にする</label>
                        </div>
                    </div>
                </div>

                <div class="text-center w-100 mt-3" style="height: fit-content">
                    <button id="no_save_setting" class="gray-btn-gradient flex-1 py-2 mr-3 rounded text-medium-xs background-white"
                            style="width: 40%; margin-bottom: 10px; border: 1px solid #969696 !important;">
                        <span>設定</span>
                    </button>
                    <button id="exit_setting"
                            class="gray-btn-gradient flex-1 py-2 rounded text-white background-dark-blue text-medium-xs"
                            style="width: 40%; margin-bottom: 10px;"><span>キャンセル</span>
                    </button>
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

@section('modal')
    <div class="modal fade" id="confirm_exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin: 1rem;">

            <div class="modal-content background-transparent" >
                <div class="modal-body pt-3 pb-2 background-white" style="border-radius: 1rem;">
                    <p class="text-medium-title text-center mb-2">このコメントを削除しますか？</p>
                    <div class="text-center w-100" style="height: fit-content">
                        <button id="no_save" class="gray-btn-gradient flex-1 py-2 mr-3 rounded text-medium-xs background-white"
                                data-dismiss="modal" style="width: 40%; margin-bottom: 10px; border: 1px solid #969696 !important;">
                            <span>削除する</span>
                        </button>
                        <button data-dismiss="modal" id="exit"
                                class="gray-btn-gradient flex-1 py-2 rounded text-white background-dark-blue text-medium-xs"
                                style="width: 40%; margin-bottom: 10px;"><span>キャンセル</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        var currentPage = 1;
        var startPage;
        var endPage;
        var perShow;
        var perPage = 5;
        var totalPage;
        var order = 'new'
        var home_path;
        var home_img_path;
        var del_id;
        var imgFile = '';
        $(document).ready(function() {
            home_path = $("#home_path").val();
            home_img_path = $('#default_image_path').val();
            imgFile = $('#profile_image_url').val();
            $('#modify_img').click(function () {
                event.preventDefault();
                $('#img_default').trigger('click');
            })
            $('#no_profile_del').click(function () {
                event.preventDefault();
                if(imgFile !== ''){
                    $('#main_img').attr('src', home_img_path + 'blue-user.png');
                    $('#camera_img').removeClass('d-none');
                    imgFile = '';
                }
            })
            $('#exit_setting').click(function () {
                event.preventDefault();
                $('#list-area').removeClass('d-none');
                $('#comment_list').removeClass('d-none');
                $('#profile-area').addClass('d-none');

            })

            $('#no_save_setting').click(function () {
                event.preventDefault();
                var forms = document.getElementById('profile_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var formData = new FormData(forms);

                    formData.append('profile_img', imgFile);
                    //forms.submit();
                    var url = home_path + "/articles/post/profile";
                    $.ajax({
                        url:url,
                        type:'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if(response['status'] == true) {
                                alertify.success("成功");

                            } else {
                                alertify.error("");
                            }
                        },
                        error: function () {
                        }
                    });
                }
            })

            $('#img_default').change(function () {
                readURL(this);
            })
            $('[name="img_caption_index"]').change(function () {

                if($(this).val() === '1'){
                    console.log($(this).val());
                    $('#post_nickname')[0].disabled = false;
                    $('#post_nickname')[0].required = true;
                }
                else{
                    $('#post_nickname')[0].disabled = true;
                    $('#post_nickname')[0].required = false;
                }
            })
            $('input[type=checkbox][name=radio_accept]').change(function() {
                if($(this)[0].checked){
                    $("#btn_submit").removeClass("background-gray");
                    $('#btn_submit')[0].disabled = false;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    $('#btn_submit')[0].disabled = true;
                }
            });

            $("[name='limit-length']").on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p').html(length + '/' + maxLength);
            })

            $("#btn_top").click(function(event) {
                window.location.href = home_path + '/login';
            });
            $('#close_post').click(function () {
                $('#post_area').addClass('d-none')
            })
            getCommentList();
            $('#profile_setting').click(function () {
                $('#list-area').addClass('d-none');
                $('#comment_list').addClass('d-none');
                $('#profile-area').removeClass('d-none');

            })
            $('#no_save').click(function () {
                var token = $("meta[name='_csrf']").attr("content");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                var url = home_path + '/articles/delete/comment';
                $.ajax({
                    url:url,
                    type:'post',
                    data: {
                        comment_id : del_id,
                    },
                    success: function (response) {
                        getCommentList(order);
                    },
                    error: function () {
                    }
                });
            })

            $("#btn_submit").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    $('#form_content').val($('#comment').val());
                    var form = $('form')[1]; // You need to use standard javascript object here
                    var formData = new FormData(form);
                    var url = home_path + "/articles/post/comment";
                    $.ajax({
                        url:url,
                        type:'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if(response['status'] == true) {
                                alertify.success("成功");
                                $('#form_content').val('');
                                $('#comment').val('');
                                $('#modify_comment_id').val('');
                                $('#post_area').addClass('d-none');
                                $('#comment_length').html('0/1000');
                                getCommentList();

                            } else {
                                alertify.error("");
                            }
                        },
                        error: function () {
                        }
                    });

                    //document.comment.submit();
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var file = input.files[0];
                var file_type = file.type.split('/');
                if (file.size > 10000000) {
                    alert('ファイル容量が10Mを超えています｡');
                    return;
                }
                console.log(file);
                if (file_type[0] !== "image") {

                    alert('画像を選択してください｡');

                    return;
                }

                var file_ex = file.name.split('.');
                if(file_type[0] == "image" && file_ex[1].toLowerCase() != 'gif' && file_ex[1].toLowerCase() != 'png' && file_ex[1].toLowerCase() != 'jpg')
                {
                    alert('ファイル形式が異なります｡');
                    // $('.find-remove-button').trigger('click');
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    $('#main_img').attr('src', e.target.result);
                    $('#camera_img').addClass('d-none');
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                imgFile = input.files[0];
            }
        }

        function getCommentList() {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/articles/get-by-user/comment-list';
            console.log(url);
            $.ajax({
                url:url,
                type:'post',
                data: {
                    currentPage: currentPage,
                    perPage: perPage
                },
                success: function (response) {
                    $("#comment_list").html(response);
                    changeEvent();
                },
                error: function () {
                }
            });
        }

        function changeEvent() {
            $("#back").click(function(event) {
                window.history.back();
                //window.location.href = 'http://example.com';
            });
            $(".page-item").click(function(event) {
                perShow = parseInt($("#perShow").val());
                startPage = parseInt($("#start").val());
                totalPage = parseInt($("#total").val());
                var id = $(this).attr('id');
                if(id == 'first') {
                    currentPage = 1;
                } else if(id == 'previous') {
                    currentPage = startPage - perShow;
                } else if(id == 'next') {
                    currentPage = startPage + perShow;
                } else if(id == 'last') {
                    currentPage = totalPage;
                } else {
                    var split = id.split("_");
                    currentPage = split[1];
                }
                getCommentList();
            });


            $('.modify').click(function () {
                var comment_id = $(this).parent().parent().parent().next().val();
                var content = $(this).parent().parent().parent().prev().find('p.text-normal').text();
                console.log(content);
                console.log(comment_id);

                $('#post_area').removeClass('d-none')

                $('#comment').val(content);
                var length = content.length;
                $('#comment_length').html(length + '/1000');
                $('#modify_comment_id').val(comment_id);

            })
            $('.delete').click(function () {
                var comment_id = $(this).parent().parent().parent().next().val();
                del_id = comment_id;
                console.log(del_id);
                $('#confirm_exit').modal('show');
            })
        }
    </script>
@endsection
