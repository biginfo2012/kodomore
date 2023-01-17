<div class="card-body py-3 px-0">
    @if(!empty($commentList))
        @foreach($commentList as $index=>$comment)
        <div class="blog-answer rounded position-relative mb-3 px-3" style="border-bottom: 1px solid #ABABAB">
            <div class="d-flex position-relative">
                <div class="mt-0">
                    <p class="text-title-large" style="color: black;">{{$comment->news_title}}</p>
                    <p class="text-small-xs" style="color: #B3B3B3">KODOMORE編集部</p>
                </div>

            </div>

            <div class="position-relative">
                <p class="text-normal mt-2">{{$comment->content}}</p>
            </div>


                <div class="post_user my-3">
                    <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;" >{{$comment->attention}}人が注目した！</p>
                    <p class="text-small-xs mt-2"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/light.png')}}" style="height: 0.9rem !important;" >{{$comment->help}}人が役に立った</p>
                    <div class="text-center mt-2">
                        <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon mb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                    </div>
                </div>



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
    @else
    <p class="text-medium-title text-center py-3 mt-n3 mb-3" style="background-color: #E6E6E6">コメントはありません</p>
        <div class="text-center align-items-center align-content-center">
            <p class="w-75 pt-2 pb-1 text-medium-light text-center" id="back" style="border: 1px solid #226482; color: #226482; border-radius: 4px;margin-left: auto; margin-right: auto;">記事へもどる<img src="{{asset('img/research_icon.png')}}" class="height-1 img-icon ml-1 mb-1"></p>
        </div>
    @endif


</div>
