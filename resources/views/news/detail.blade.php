@extends('layouts.app')

@section('title')
    {{$news -> prefecture_name}}の幼稚園･保育所 入園情報
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
            background-color: #FFF5F7;
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
            background-color: #FFF5F7;
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



    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <span id="move_prefecture" class="top-title-tag">岐阜県の幼稚園､保育所</span>
             > <span name="move_list" id="top_move_list" class="top-title-tag">子どもと読みたい最新ニュース</span>
        </div>

        <div class="background-light-pink">
            <div class="card-body position-relative mt-2 pt-4">
                <img src="{{asset('img/butterfly.png')}}" class="news-flower-right height-3 img-icon" >
                @if($news->is_new == true)<span class="text-medium text-pink border-pink px-1">新着</span>@endif

                <p class="text-medium-xs px-1 mt-2 mb-2" style="color: #333333">{{$news -> prefecture_name}}{{$news -> city_name}}</p>
                <pre class="text-title-large text-black mb-2" style="line-height: 1.1">{{$news -> title}}</pre>
                <div class="px-0 mt-2" style="color: #333333; width: fit-content">
                    @if($news->news_id == 8)
                        <p class="text-medium-title mx-0 my-0">11月8日(日)10時から17時
(講演会は10時から12時)</p>
                    @elseif($news->news_id == 9)
                        <p class="text-medium-title mx-0 my-0">11/3(火)~12/27(日)</p>
                        <div class="background-line" style="width: 55% !important"></div>
                        <p class="text-medium-title mx-0 my-0">※クリスマス特別水槽は11/14(土)から</p>
                    @else
                        <pre class="text-medium-title mx-0 my-0">{{$news -> peroid}}</pre>
                    @endif

                    <div class="background-line"></div>
                </div>

                <div class="px-0 my-2" style="color: #333333; width: fit-content">
                    @if($news->news_id == 8)
                        <p class="text-medium-title mx-0">参加費:{{$news -> fee}}</p>
                    @elseif($news->news_id == 9)
                        <p class="text-medium-title mx-0">料金:入館料のみ</p>
                    @else
                        <p class="text-medium-title mx-0">入館料:{{$news -> fee}}</p>
                    @endif
                    <div class="background-line"></div>
                </div>
                <p class="text-small-xs text-gray">{{str_replace('-', '/', $news -> created_at)}}</p>
            </div>
            <img src="{{asset('/storage/img/news/'.$news->img)}}">
            <div class="card-body">
                <pre class="text-normal mb-0" style="white-space: pre-line">{{$news -> description}}</pre>
                <img src="{{asset('img/flower.png')}}" class=" height-1-half img-icon my-3" >
                <div>
                    <pre class="text-normal mb-0">開催期間／{{$news -> peroid}}</pre>
                    <pre class="text-normal mb-0">開催場所／{{$news -> place}}</pre>
                    @if(!empty($news->time))
                        <pre class="text-normal mb-0">時　　間／{{$news -> time}}</pre>
                    @endif
                    @if($news->news_id === 8)
                        <pre class="text-normal mb-0">参  加  費／{{$news -> fee}}</pre>
                    @else
                        <pre class="text-normal mb-0">料　　金／{{$news -> fee}}</pre>
                    @endif

                    @if(!empty($news->member))
                        <p class="text-normal">定　　員／{{$news -> member}}</p>
                    @endif
                    @if($news->news_id == 8)
                        <pre class="text-normal mb-0 mr-n1">申込方法／＊講演会のみ参加希望の方は
　　　　　HP、電話、第２カウンターで受付
　　　　　＊講演会･シンポジウム双方に参加希望の方は
　　　　　NPO多言語多読のHPから</pre>
                    @endif
                    <p class="text-normal">施設情報／<span class="text-normal text-pink">{{$news -> url}}</span></p>
                    @if($news->news_id == 8)
                        <p class="text-normal">問合わせ／岐阜県図書館 サービス課 調査相談係<br>　　　　　{{$news -> mobile}}</p>
                    @else
                        <p class="text-normal">問合わせ／{{$news -> mobile}}</p>
                    @endif
                    <p class="text-normal">{{$news -> note}}</p>
                </div>
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
                        @if($next != -1 && $next <12)
                            <p class="text-blue-1 text-normal float-right" id="next">次の記事▶</p>
                            <input type="hidden" id="next_id" value="{{$next}}">
                        @endif

                    </div>
                </div>
            </div>
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
                        <button class="gray-btn-gradient1 background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title1 text-white w-75 my-3" id="btn_submit" disabled><img class="height-4 img-icon mr-2" src="{{asset('img/post-comment.png')}}" style="margin-top: -2px">投稿する</button>
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
            <input type="hidden" value="{{$news -> news_id}}" name="news_id" id="news_id">
            <input type="hidden" value="" name="comment_id" id="modify_comment_id">
            <input type="hidden" name="content" id="form_content">
        </form>

        <div class="background-blog d-none">
            <div class="card-body">
                <p class="text-medium mb-1"><span class="menu-icon">◆</span>この記事へのレビュー</p>
                <div class="background-white rounded p-2">
                    <input class="text-medium border-0 my-1" type="text" placeholder="まだレビューはありません｡">
                    <div class="d-flex justify-content-center top-menu py-1 mb-2">
                        <img src="{{asset('img/message.png')}}" class="img-icon height-1"> <p class="ml-2 text-large text-white">記事にレビューを投稿しよう</p>
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
                                style="width: 40%; margin-bottom: 10px;box-shadow: inset 0px -18px 34px -14px #161616;"><span>キャンセル</span>
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
        var perPage = 10;
        var totalPage;
        var home_path;
        var selectCity;
        var selectType;
        var selectKeyword;
        var prefecture_id;
        var order = 'new'
        var news_id;
        var home_img_path;

        var del_id;



        $(document).ready(function() {
            home_path = $("#home_path").val();
            home_img_path = $('#default_image_path').val();
            news_id = $('#news_id').val();
            getCommentList(order);
            $('#post_comment').click(function () {
                var id = $('#user_id').val();
                if(id == ''){
                    window.location.href = home_path + '/login';
                }
                else{
                    $('#btn_post_area').addClass('d-none')
                    $('#post_area').removeClass('d-none')
                }
            })

            $("#privacy").click(function(event) {
                window.location.href = home_path + '/blog-guide';
            });

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

            $('#close_post').click(function () {
                $('#post_area').addClass('d-none')
                $('#btn_post_area').removeClass('d-none')
            })
            $('#no_save').click(function () {
                var token = $("meta[name='_csrf']").attr("content");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                var url = home_path + '/news/delete/comment';
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
                    var url = home_path + "/news/post/comment";
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

            $('#profile_image').click(function () {
                window.location.href = home_path + '/news/profile';
            })

            $("#move_garden").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });

            $("#icon_move_home").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });


            prefecture_id = $("#prefecture_id").val();
            //getSchoolList();



            $("[name=move_list]").click(function(event) {
                var prefecture_id = $("#prefecture_id").val();
                window.location.href = home_path + "/news/" + prefecture_id + '/1/list';
            });

            $("#previous").click(function(event) {
                var previous_id = $("#previous_id").val();
                window.location.href = home_path + "/news/detail/" + previous_id;
            });

            $("#next").click(function(event) {
                var next_id = $("#next_id").val();
                window.location.href = home_path + "/news/detail/" + next_id;
            });

            $("#move_prefecture").click(function(event) {
                window.location.href = home_path + "/school/" + prefecture_id + '/list';
            });

        });

        function getCommentList(order) {
            var token = $("meta[name='_csrf']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            var url = home_path + '/news/get/comment-list';
            $.ajax({
                url:url,
                type:'post',
                data: {
                    order : order,
                    news_id : news_id,
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
                    var txt = $(this).find('label')[0].innerText;
                    var stars = parseInt(txt.replace('注目した! ', '')) + 1;
                    $(this).find('label')[0].innerText = '注目した! ' + stars;
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
                    var txt = $(this).find('label')[0].innerText;
                    var stars = parseInt(txt.replace('役に立った ', '')) + 1;
                    $(this).find('label')[0].innerText = '役に立った ' + stars;

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
                url: home_path + '/news/comment/star',
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
                url: home_path + '/news/comment/follow',
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
