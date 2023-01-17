<div class="card-body py-3 px-0">
    <p class="text-center text-normal mt-1 mb-4 pb-2">
        <span class="mx-3" id="new" style="{{$order !== 'new'? 'color:#31BCC7;':''}} cursor: pointer;">新着順</span>
        <span class="px-3" id="old" style="border-left: 1px solid #333333; border-right: 1px solid #333333;{{$order !== 'old'? 'color:#31BCC7;':''}}cursor: pointer;">古い順</span>
        <span class="ml-3" id="rank" style="{{$order !== 'rank' ? 'color:#ADE4E9;':''}}cursor: pointer;">ランキング順</span>
    </p>
    @foreach($commentList as $index=>$comment)
        <div class="blog-answer rounded position-relative mb-3 px-3" style="border-bottom: 1px solid #ABABAB">
            <div class="d-flex position-relative">
                @if(!empty($comment->profile_img))
                    <img src="{{asset('/storage/img/articles/' . $comment->profile_img)}}" class="avatar mr-2 mt-1">
                @else
                    <img src="{{asset('img/blue-user.png')}}" class="avatar mr-2 mt-1">
                @endif
                <div class="mt-0">
                    <p class="text-small" style="font-family: YugoBold !important;">{{$comment->post_name}}</p>
                    @if($comment->second_setting == 1)
                        <p class="text-small-xs" style="color: #B3B3B3">{{$comment->second_name}}</p>
                    @endif
                    <p class="text-small-xs" style="color: #B3B3B3">{{$comment->display_time}}</p>
                </div>
                @if(!empty(session()->get(SESS_UID)) && $comment->user_id !== session()->get(SESS_UID))
                    <img src="{{asset($comment->follow_id == session()->get(SESS_UID) ? 'img/comment-followed.png': 'img/comment-follow.png')}}" class="avatar mr-2 mt-1 p-1 {{$comment->follow_id == session()->get(SESS_UID) ? '':'follow'}} mr-n1" style="position: absolute; right: 0;">
                @endif
            </div>

            <div class="position-relative">
                <p class="text-normal line-clamp5 mt-2">{{$comment->content}}</p>
                <input type="hidden" value="{{strlen($comment->content)}}">
                @if(strlen($comment->content)>360)
                    <p class="text-normal more_detail" style="">...続きを読む</p>
                @endif
            </div>

            @if($comment->user_id !== session()->get(SESS_UID))
                <div class="d-flex position-relative my-3">
                     <div class="" style="left: 0;">
                        <span class="align-items-start text-small-xs py-1 px-1 mr-1 star" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" ><label class="mb-0 mr-3" style="cursor: pointer;">注目した!</label><label>{{$comment->attention}}</label></span>
                        <span class="text-small-xs py-1 px-1 ml-0 help" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.9rem !important;pointer; margin-top:2px" ><label class="mb-0 mr-3" style="cursor: pointer;">役に立った</label><label>{{$comment->help}} </label></span>
                    </div>  
                    <div class="position-absolute" style="right: 0">
                        <a class="text-small-xs py-1 px-0 ml-1 forbidden text-3" style="" href="{{url('/warn/admin/'. $comment->id)}}"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/forbidden.png')}}" style="height: 0.9rem !important;pointer; margin-top:2px" >管理者に報告</a></div>
                </div>
            @else
                <div class="post_user my-3">
                    <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" >{{$comment->attention}}人が注目した！</p>
                    <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.9rem !important;margin-left: 1px !important;" >{{$comment->help}}人が役に立った</p>
                    <div class="text-center mt-2">
                        <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #666666; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #666666; border-radius: 5rem;"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                    </div>
                </div>

            @endif

            <input type="hidden" class="comment_id" value="{{$comment->id}}">
        </div>


    @endforeach
        <input type="hidden" id="start" value="{{$start}}">
        <input type="hidden" id="end" value="{{$end}}">
        <input type="hidden" id="total" value="{{$total}}">
        <input type="hidden" id="perShow" value="{{$perShow}}">

        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="pagination pagination-circle pg-blue mb-1">
                @if($start > $perShow && $start < 2 * $perShow)
                    <li class="page-item " id="previous">
                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Previous">
                            <span aria-hidden="true">前へ</span>
                        </a>
                    </li>
                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>

                @endif

                @if($start > 2* $perShow)
                    <li class="page-item " id="first"><a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px">最初へ</a></li>
                    <li class="page-item " id="previous">
                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px;" aria-label="Previous">
                            <span aria-hidden="true">前へ</span>
                        </a>
                    </li>
                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>

                @endif

                @for ($i = $start; $i <= $end; $i++)
                    @if($i == $current)
                        <li class="page-item active text-medium-xs" id="page_{{$i}}"><a class="page-link text-medium-xs mx-1 px-2 py-1">{{$i}}</a></li>
                    @else
                        <li class="page-item text-medium-xs" id="page_{{$i}}"><a class="page-link text-medium-xs mx-1 px-2 py-1">{{$i}}</a></li>
                    @endif
                @endfor
                @if($end <= $total - 2* $perShow)
                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>
                    <li class="page-item" id="next">
                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                            <span aria-hidden="true">次へ</span>
                            {{--                        <span class="sr-only">次へ</span>--}}
                        </a>
                    </li>
                    <li class="page-item text-medium-xs" id="last"><a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" id="last">最後へ</a></li>
                @endif
                @if($end > $total - 2 * $perShow && $end < $total)
                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>
                    <li class="page-item" id="next">
                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                            <span aria-hidden="true">次へ</span>
                            {{--                        <span class="sr-only">次へ</span>--}}
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
</div>
