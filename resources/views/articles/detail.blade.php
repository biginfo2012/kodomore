@extends('layouts.app')

@section('title')
    {{$article -> prefecture_name}}の幼稚園･保育所 入園情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .news--image{
            position:relative;
            overflow:hidden;
            padding-bottom:75%;
        }
        .news--image > img{
            height: 100%;
            object-fit: cover;
            position:absolute;
        }

        .news-list {
            /*background-color: #FFF5F7;*/
        }

        .news-flower {
            position: absolute;
            top: 0; left: 0;
            z-index: 100
        }

        .news-flower-right {
            position: absolute;
            top: 0; right: 0;
            z-index: 100
        }

        .background-blog {
            background-color: #FFE4EA;
        }

        .container {
            /*background-color: #FFF5F7;*/
        }


        .border-bold{
            border: 2px solid #ff557d;
        }

        @media (min-width: 768px) {
            .comment-img{
                margin-top: -15px;
            }
            .comment-text{
                background: #ACE4E9;
                width: 70px;
                height: 70px;
                border-radius: 35px;
            }
            .margin-img{
                margin: 21px;
            }
        }

        @media (max-width: 375px) and (min-width: 321px){
            .comment-text{
                background: #ACE4E9;
                width: 35px;
                height: 35px;
                border-radius: 35px;
            }

            .margin-img{
                margin: 11px;
            }
        }

        .line-clamp5 {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .avatar {
            width: 2.7rem;
            height: 2.7rem;
            border-radius: 1.5rem;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before{
            background-color: #ABDBE1 !important;
            border-color: #ABDBE1 !important;
        }

        .btn-title1 {
            font-size: 19px !important;
            font-family: YugoBold;
            background-color: #FF9F00 !important;
        }

        .background-gray {
            background-color: #BFBFBF !important;
        }

        .line-clamp5 {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .more_detail{
            position: absolute;
            right: 0;
            bottom: 0;
            color: #31BCC7;
            background-color: white;
            padding: 0 5px;
        }

        .background-e6{
            background-color: #E6E6E6 !important;
        }

        .image_modify_modal {
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }

        .gray-btn-gradient1 {
            border: none !important;
            box-shadow: inset 0px -14px 15px -5px rgb(183 106 33 / 60%);
        }

        @media (min-width: 768px){
            .height-29{
                height: 58px !important;
            }
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <span id="move_prefecture" class="top-title-tag">{{$article -> prefecture_name}}の幼稚園､保育所</span>
            > <p name="move_list" id="top_move_list">{{$article -> prefecture_name}}の子育て記事</p>
        </div>

        <div class="">
            <div class="card-body position-relative mt-2 p-3">
                <p class="text-large-xs menu-icon">@if($article->is_new == true)<span class="px-1 text-pink border-pink text-medium mr-2">新着</span>@endifニュース</p>
                <pre class="text-title-large text-black mb-1">{{$article -> title}}</pre>
                <p class="text-small-xs text-gray">KODOMORE編集部 {{str_replace('-', '/', $article -> post_date)}}</p>
            </div>
            <img src="{{asset('/storage/img/articles/'.$article->main_img)}}">
            <p class="text-normal m-3 line-clamp5" style="white-space: pre-line">{{$article -> main_text}}</p>

            <div class="card-body pt-0">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-small text-blue" id="btn_content" style="color: #216887 !important; border: 1px solid #216887 !important; border-radius: 50px !important;"><img class="height-4 img-icon mr-1" src="{{asset('img/article-view.png')}}" style="margin-top: -2px">続きを見る</button>
            </div>

            <div id="content" class="d-none">
                @foreach($contentLists as $content)
                    @if(!empty($content->img))
                        <img src="{{asset('/storage/img/articles/'.$content->img)}}" class="px-3">
                    @endif
                    @if(!empty($content->sub_title))
                        <div class="mt-4 mx-2 position-relative" >
                            <p class="text-large pl-1 pt-0 pb-1" style="white-space: pre-line; background-color: #E6F7F8; margin: 4px -4px -4px 4px;">{{$content -> sub_title}}</p>
                            <div class="position-absolute w-100 height-29" style="left:0; top: -4px;border: 1px solid #31bCC7; height: 29px;"></div>
                        </div>

                    @endif
                    <p class="text-normal m-3"  style="white-space: pre-line">{{$content -> sub_text}}</p>
                @endforeach
            </div>


            <div class="comment" style="border-top: 1px solid #ABABAB">
                <div class=" text-medium-title px-3 py-1" style="background-color: #E6E6E6">
                    <span class="menu-icon" style="color: #216887">◆</span>この記事へのコメント
                </div>

                <div class="comment_area p-4 mt-1" id="btn_post_area" style="border-bottom: 1px solid #ABABAB">
                    <p class="text-normal-title mb-1 {{$cnt>0?'d-none':''}}" id="no_comment" style="color: #ABABAB">まだコメントはありません｡</p>

                    <div class="text-center p-1" style="background-color: #31BCC7" id="post_comment">
                        <img class="height-1 img-icon mr-1 comment-img" src="{{asset('img/comment.png')}}">
                        <span class="text-title text-white">記事にコメントを投稿しよう</span>
                    </div>
                    <input type="hidden" value="{{session()->get(SESS_UID)}}" id="user_id">
                </div>

                <div id="post_area" class="position-relative d-none" style="background-color: #EBF9F9; border-bottom: 1px solid #ABABAB">
                    <form id="register_form" class="needs-validation" novalidate>
                        {{csrf_field()}}
                        <div class="position-absolute" style="right: 0.5rem; top: 0.5rem; z-index: 5">
                            <img class="img-icon height-1-half" src="{{asset('img/close_post.png')}}" id="close_post">
                        </div>
                        <div class="d-flex position-relative pt-3 px-3">
                            <img src="{{asset('img/blue-user.png')}}" id="profile_image" class="avatar mr-2">
                            <div class="mt-0">
                                <p class="text-small" style="font-family: YugoBold !important;">投稿ネーム</p>
                                <p class="text-small-xs" style="color: #B3B3B3">{{!empty($user) ? $user->first_name: ''}}</p>
                            </div>

                        </div>
                        <div class="px-3 mt-2 justify-content-center">
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

                <div id="comment_list">

                </div>
            </div>

            <form id="submit_comment" name="comment" method="post">
                {{csrf_field()}}
                <input type="hidden" name="user_name" value="{{!empty($user) ? $user->first_name: ''}}">
                <input type="hidden" value="{{session()->get(SESS_UID)}}" name="user_id">
                <input type="hidden" value="{{$article -> id}}" name="article_id" id="article_id">
                <input type="hidden" value="" name="comment_id" id="modify_comment_id">
                <input type="hidden" name="content" id="form_content">
            </form>

            <div class="card-body">

                <div class="row my-4">
                    <div class="col-4">
                        @if($previous != -1)
                            <p class="text-blue-1 text-normal" id="previous">◀前の記事</p>
                            <input type="hidden" id="previous_id" value="{{$previous}}">
                        @endif
                    </div>
                    <div class="col-4 text-center text-blue-1">
                        <p class="text-blue-1 text-normal" name="move_list">一覧へ</p>
                    </div>
                    <div class="col-4 float-right">
                        @if($next != -1)
                            <p class="text-blue-1 text-normal float-right" id="next">次の記事▶</p>
                            <input type="hidden" id="next_id" value="{{$next}}">
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <input type="hidden" value="21" id="prefecture_id">
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
                                style="width: 40%; margin-bottom: 10px;box-shadow: inset 0px -18px 34px -14px #161616; padding-top: 9px !important; padding-bottom: 9px !important;"><span>キャンセル</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        var searchStr = '';
        var currentPage = 1;
        var startPage;
        var endPage;
        var perShow;
        var perPage = 5;
        var totalPage;
        var order = 'new'
        var home_path;
        var selectCity;
        var selectType;
        var selectKeyword;
        var prefecture_id;
        var article_id;
        var home_img_path;

        var del_id;

        $(document).ready(function() {
            home_path = $("#home_path").val();
            home_img_path = $('#default_image_path').val();
            article_id = $('#article_id').val();
            prefecture_id = $("#prefecture_id").val();

            getCommentList(order);

            $("#move_garden").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });



            $('#profile_image').click(function () {
                window.location.href = home_path + '/articles/profile';
            })



            $('#post_comment').click(function () {
                var id = $('#user_id').val();
                if(id == ''){
                    localStorage.setItem('url', '/articles/detail/' + article_id + '#comment');
                    var url = home_path + "/articles/post/comment";
                    window.location.href = url;
                }
                else{
                    $('#btn_post_area').addClass('d-none')
                    $('#post_area').removeClass('d-none')
                }
            })

            function onHashChange() {
                var hash = window.location.hash;


                if (hash) {
                    console.log(hash);

                    window.location.href = '#btn_content';
                    $('#btn_post_area').addClass('d-none')
                    $('#post_area').removeClass('d-none')
                }
            }

            //window.addEventListener('hashchange', onHashChange, false);
            onHashChange();

            $('#btn_content').click(function () {
                $(this).parent().addClass('d-none');
                $('#content').removeClass('d-none');
                $(this).parent().prev().removeClass('line-clamp5');
                $('.comment').addClass('d-none');
            });
            $('#close_post').click(function () {
                $('#post_area').addClass('d-none')
                $('#btn_post_area').removeClass('d-none')
            })
            $("#privacy").click(function(event) {
                window.location.href = home_path + '/blog-guide';
            });
            $("#icon_move_home").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });
            //getSchoolList();

            $("[name=move_list]").click(function(event) {
                var prefecture_id = $("#prefecture_id").val();
                window.location.href = home_path + "/articles/" + prefecture_id + '/1/list';
            });

            $("#previous").click(function(event) {
                var previous_id = $("#previous_id").val();
                window.location.href = home_path + "/articles/detail/" + previous_id;
            });

            $("#next").click(function(event) {
                var next_id = $("#next_id").val();
                window.location.href = home_path + "/articles/detail/" + next_id;
            });

            $("#move_prefecture").click(function(event) {
                window.location.href = home_path + "/school/" + prefecture_id + '/list';
            });

            $('input[type=checkbox][name=radio_accept]').change(function() {
                if($(this)[0].checked){
                    $("#btn_submit").removeClass("background-gray");
                    $('#btn_submit').removeClass('gray-btn-gradient');
                    $('#btn_submit').addClass('gray-btn-gradient1');
                    $('#btn_submit')[0].disabled = false;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    $('#btn_submit').addClass('gray-btn-gradient');
                    $('#btn_submit').removeClass('gray-btn-gradient1');
                    $('#btn_submit')[0].disabled = true;
                }
            });

            $("[name='limit-length']").on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p').html(length + '/' + maxLength);
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
                                $('#btn_post_area').removeClass('d-none')
                                $('#post_area').addClass('d-none');

                                $('#comment_length').html('0/1000');
                                getCommentList(order);
                                $('#no_comment').addClass('d-none');

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

        function getCommentList(order) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/articles/get/comment-list';
            $.ajax({
                url:url,
                type:'post',
                data: {
                    order : order,
                    article_id : article_id,
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
                getCommentList(order);
            });

            $('#old').click(function () {
                getCommentList('old');
            })
            $('#new').click(function () {
                getCommentList('new');
            })

            $('.more_detail').click(function () {
                $(this).prev().removeClass('line-clamp5')
                $(this).addClass('d-none');
            })

            $('.follow').click(function () {
                if($(this).hasClass('follow')){
                    $(this).removeClass('follow');
                    $(this)[0].src = home_img_path + '/comment-followed.png';
                    var comment_id = $(this).parent().next().next().next().val();
                    commentFollow(comment_id);
                }

            })

            $('.star').click(function () {
                $(this).removeClass('star');
                if(!$(this).hasClass('background-e6')){
                    var comment_id = $(this).parent().parent().next().val();
                    var src = $(this).find('img')[0].src
                    src = src.replace('circle', 'y-circle');
                    $(this).find('img')[0].src = src;
                    var txt = $(this).find('label')[1].innerText;
                    var stars = parseInt(txt) + 1;
                    $(this).find('label')[1].innerText = stars;
                    $(this).addClass('background-e6');
                    starAdd(comment_id, 'attention');
                }

            })

            $('.help').click(function () {
                $(this).removeClass('help');
                if(!$(this).hasClass('background-e6')){
                    var comment_id = $(this).parent().parent().next().val();
                    var src = $(this).find('img')[0].src
                    src = src.replace('light', 'y-light');
                    $(this).find('img')[0].src = src;
                    var txt = $(this).find('label')[1].innerText;
                    var stars = parseInt(txt) + 1;
                    $(this).find('label')[1].innerText = stars;

                    $(this).addClass('background-e6');
                    starAdd(comment_id, 'help');
                }
            });

            $('.modify').click(function () {
                var comment_id = $(this).parent().parent().parent().next().val();
                var content = $(this).parent().parent().parent().prev().find('p.line-clamp5').text();
                console.log(content);
                console.log(comment_id);

                $('#btn_post_area').addClass('d-none')
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

        function starAdd(comment_id, type){
            $.ajaxSetup({
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                url: home_path + '/comment/star',
                method: 'post',
                dataType: 'json',
                data: {
                    'type' : type,
                    'comment_id': comment_id,
                },
                success: function (resp) {

                },
                error: function (error) {
                    //alert(error);
                    alertify.error("更新失敗");

                    // window.location.reload();
                }
            })

        }
        function commentFollow(comment_id){
            $.ajaxSetup({
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                url: home_path + '/comment/follow',
                method: 'post',
                dataType: 'json',
                data: {
                    'comment_id': comment_id,
                },
                success: function (resp) {

                },
                error: function (error) {
                    //alert(error);
                    alertify.error("更新失敗");

                    // window.location.reload();
                }
            })

        }


    </script>
@endsection
