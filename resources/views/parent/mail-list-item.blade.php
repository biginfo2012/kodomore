
@if(!empty($messageList))
    <p class="text-normal py-1 px-3" style="color: #FF00FF;border-bottom: 1px solid #ABABAB">●未読のお知らせ：{{$un_cnt}}件</p>
    @foreach($messageList as $index => $message)
        @if($message->read_status == 0)
            <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB; background-color: #FFEBFF">

            <div class="row">
                <div class="col-2 flex-center my-auto">
                    <img class="height-4 img-icon" src="{{asset('img/pink-mail.png')}}" alt="">
                </div>
                <div class="col-10 pl-0" style="margin-left: -15px;">
                    @if($message->type === 'modify')
                        <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】会員情報変更確認</h6>
                        <p class="text-medium-xs ml-2 text-3 line-clamp1">KODOMORE［コドモア］のご利用ありがとうございます｡
                            会員情報の変更手続きが完了しました｡</p>
                    @elseif($message->type === 'forget')
                        <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】パスワード再設定について</h6>
                        <p class="text-medium-xs ml-2 text-3 line-clamp1">KODOMORE［コドモア］のご利用ありがとうございます｡
                            パスワード再設定用のURLと仮パスワードを発行いたしました｡</p>
                    @else
                        <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】会員登録のお申込み受付済</h6>
                        <p class="text-medium-xs ml-2 text-3 line-clamp1"> KODOMORE［コドモア］一般会員へのお申込みありがとうございます｡
                            本登録用URLと仮パスワードを発行いたしました｡</p>
                    @endif

                    <p class="text-normal ml-2 text-3" style="color: #8E8E8E">{{str_replace('-', '/', $message->created_at)}}</p>
                </div>
            </div>
        </div>
        @else
            <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB">

                <div class="row">
                    <div class="col-2 flex-center my-auto">
                        <img class="height-2 img-icon" src="{{asset('img/blue-open-mail.png')}}" alt="">
                    </div>
                    <div class="col-10 pl-0" style="margin-left: -15px;">
                        @if($message->type === 'modify')
                            <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】会員情報変更確認</h6>
                            <p class="text-medium-xs ml-2 text-3 line-clamp1">KODOMORE［コドモア］のご利用ありがとうございます｡
                                会員情報の変更手続きが完了しました｡</p>
                        @elseif($message->type === 'forget')
                            <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】パスワード再設定について</h6>
                            <p class="text-medium-xs ml-2 text-3 line-clamp1">KODOMORE［コドモア］のご利用ありがとうございます｡
                                パスワード再設定用のURLと仮パスワードを発行いたしました｡</p>
                        @else
                            <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】会員登録のお申込み受付済</h6>
                            <p class="text-medium-xs ml-2 text-3 line-clamp1"> KODOMORE［コドモア］一般会員へのお申込みありがとうございます｡
                                本登録用URLと仮パスワードを発行いたしました｡</p>
                        @endif

                        <p class="text-normal ml-2 text-3" style="color: #8E8E8E">{{str_replace('-', '/', $message->created_at)}}</p>
                    </div>
                </div>


            </div>
        @endif

    @endforeach
{{--    <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB">--}}

{{--        <div class="row">--}}
{{--            <div class="col-2 flex-center my-auto">--}}
{{--                <img class="height-2 img-icon" src="{{asset('img/blue-open-mail.png')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="col-10 pl-0" style="margin-left: -15px;">--}}
{{--                <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】パスワード変更</h6>--}}

{{--                <p class="text-medium-xs ml-2 text-3 line-clamp1">本文が入ります｡文章はダミーです｡文字の大き...</p>--}}
{{--                <p class="text-normal ml-2 text-3" style="color: #8E8E8E">2020/07/21　15：30</p>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--    <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB">--}}

{{--        <div class="row">--}}
{{--            <div class="col-2 flex-center my-auto">--}}
{{--                <img class="height-2 img-icon" src="{{asset('img/blue-open-mail.png')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="col-10 pl-0" style="margin-left: -15px;">--}}
{{--                <h6 class="text-truncate text-medium-title mb-1">【KODOMORE】新規施設登録済</h6>--}}

{{--                <p class="text-medium-xs ml-2 text-3 line-clamp1">本文が入ります｡文章はダミーです｡文字の大き...</p>--}}
{{--                <p class="text-normal ml-2 text-3" style="color: #8E8E8E">2020/07/21　12：00</p>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--    <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB">--}}

{{--        <div class="row">--}}
{{--            <div class="col-2 flex-center my-auto">--}}
{{--                <img class="height-2 img-icon" src="{{asset('img/blue-open-mail.png')}}" alt="">--}}
{{--            </div>--}}
{{--            <div class="col-10 pl-0" style="margin-left: -10px;">--}}
{{--                <h6 class="text-truncate text-medium-title mb-1 text-pink">重要！緊急メンテナンスのお知らせ</h6>--}}

{{--                <p class="text-medium-xs text-3 line-clamp1">本文が入ります｡文章はダミーです｡文字の大き...</p>--}}
{{--                <p class="text-normal text-3" style="color: #8E8E8E">2020/07/20　10：00</p>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}

    <input type="hidden" id="start" value="<?=$start;?>">
    <input type="hidden" id="end" value="<?=$end;?>">
    <input type="hidden" id="total" value="<?=$total;?>">
    <input type="hidden" id="perShow" value="<?=$perShow;?>">
 
    <nav aria-label="Page navigation example" class="mt-2">
                <ul class="pagination pagination-circle pg-blue mb-1">
                    @if($start > $perShow && $start < 2 * $perShow)
                        <li class="page-item " id="previous">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Previous">
                                <span aria-hidden="true">前へ</span>
                            </a>
                        </li>
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                    @endif

                    @if($start > 2* $perShow)
                        <li class="page-item " id="first"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px">最初へ</a></li>
                        <li class="page-item " id="previous">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px;" aria-label="Previous">
                                <span aria-hidden="true">前へ</span>
                            </a>
                        </li>
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if($i == $current)
                            <li class="page-item active text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                        @else
                            <li class="page-item text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                        @endif
                    @endfor
                    @if($end <= $total - 2* $perShow)
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                        <li class="page-item" id="next">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                <span aria-hidden="true">次へ</span>
                                {{--                        <span class="sr-only">次へ</span>--}}
                            </a>
                        </li>
                        <li class="page-item text-large-xs-medium" id="last"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" id="last">最後へ</a></li>
                    @endif
                    @if($end > $total - 2 * $perShow && $end < $total)
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                        <li class="page-item" id="next">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                <span aria-hidden="true">次へ</span>
                                {{--                        <span class="sr-only">次へ</span>--}}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
@endif
