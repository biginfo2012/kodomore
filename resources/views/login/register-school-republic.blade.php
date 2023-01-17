
    <div class="text-medium px-1 justify-content-center sub-menu mb-2 rounded">
        @if(count($gardenList) == 0)

        @elseif(count($gardenList) == 1)
            <p class="pt-2 text-center">下記の施設名でよろしいですか？よろしければ</p>
            <p class="pb-2 text-center">施設名をクリックしてチェックを入れてください</p>
        @else
            <p class="pt-2 text-center">似た様な名称が複数見つかりました</p>
            <p class="pb-2 text-center">正しい施設名を選択してください</p>
        @endif
    </div>

    @foreach($gardenList as $index => $garden)
        <div class="custom-control custom-radio mt-4 ">
            <input type="radio" class="custom-control-input"  id="radio_school_index_{{$garden -> garden_id}}" value="{{$garden -> garden_id}}" name="radio_school_index" data-user="{{$garden -> hasUser}}">
            <label class="text-normal custom-control-label" for="radio_school_index_{{$garden -> garden_id}}">
                <?=$garden->prefecture_name;?><?=$garden->city_name;?>@foreach($garden -> typeList as $type)｜{{$type->type_name}}
                @endforeach
            </label>
        </div>
        <p class="ml-4 text-title" style="margin-top: -10px;"><?=$garden->garden_name;?></p>
        @if($garden-> hasUser == true)
            <div class="ml-4 flex">
                <p class="background-light-pink text-medium-xs text-dark-pink">園･学校会員にて登録済み</p>
            </div>

        @endif
    @endforeach
    @if(count($gardenList) > 0)
        <div class="flex mt-2">
            <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white btn-public-register gray-btn-gradient" id="btn_modify">編集する</button><i class="text-white fas fa-angle-right ml-1"></i>
        </div>
    @endif

    <div class="mt-3 text-medium-title justify-content-center py-2 sub-menu mb-0 rounded">
        @if(count($gardenList) == 0)
            <p class="text-center">お探しの施設名はコドモアに登録されておりません</p>
            <p class="text-center">コドモア編集部に施設名称の登録申請を</p>
            <p class="text-center">依頼してください</p>
        @else
            <p class="text-center">お探しの施設名がない場合､コドモア編集部に</p>
            <p class="text-center">施設名称の登録申請を依頼してください</p>
        @endif
    </div>

    <div class="flex mt-0">
        <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white btn-public-register gray-btn-gradient" id="btn_create">新規フォームに入力する</button><i class="text-white fas fa-angle-right ml-1"></i>
    </div>



