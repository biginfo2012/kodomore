@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園
@endsection



@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .top-badge {
            position: absolute;
            right: 0px;
            bottom: 0px;
            width: 8em;
        }



        .txt-small-date {
            font-size: 11px;
            color: #cdcdcd;
            font-family: "Times New Roman"
        }




        .img-height-24{
            height: 24px;
        }

        #move_news {
            font-size: 0.7rem;
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }

        #collapsed-prefecture-rotate {
            font-size: 2rem;
            color: #cdcdcd;
        }


        .drop-down {
            width: unset;
            height: 1.25rem;
        }

        .border-radius-none{
            border: none !important;
            border-radius: 0 !important;
        }
        .margin-top-4{
            margin-top: -4px;
        }
        .background_procedure_type{
            background-image: url('{{asset('img/procedure_type_background.png')}}');
            background-size: cover;
        }
        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }
        .img-height-18{
            height: 18px;
            margin-bottom: 2px;
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  幼稚園･保育所どう選ぶ？
        </div>
        <div class="card-header text-title">
            <img class="height-2 img-icon pb-2" src="{{asset('img/choose-icon.png')}}">
            <div style="display: inline">
                幼稚園･保育所どう選ぶ？
            </div>
        </div>

        <div class="card-body pt-0">

            <div class="accordion md-accordion" id="accordionEx"  aria-multiselectable="false">

                <!-- Accordion card -->
                <div class="card border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading1">

                        <div class="flex">
                            <h6 class="mb-0 text-white w-100 text-title">
                                施設の種別
                            </h6>
                        </div>
                    </div>
                    <div class="text-medium-light form-inline mt-2">
                        一般的な保育施設を種類別にまとめました｡それぞれがどのような施設なのかを簡単にご紹介します｡
                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1 collapsed" data-toggle="collapse" href="#collapse1"
                             aria-expanded="false" aria-controls="collapse1" name="collapsed" relate-icon="collapsed-garden-rotate" src="{{asset('img/omiss.png')}}" id="collapsed-garden-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse1" class="collapse" aria-labelledby="heading1" >
                        <div class="text-normal">
                            <div>
                                <img src="{{asset('img/choose_garden_image1.png')}}">
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        認定こども園
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    教育･保育を一体的に行う､幼稚園と保育所の両方のよさを併せ持つ施設です｡対象は0歳～小学校就学前までで､就学前の子どもに幼児教育･保育を提供する機能､地域における子育て支援を行う機能を備えています｡また､地域の実情や保護者のニーズに応じて選択できるよう､機能別に幼保連携型､幼稚園型､保育所型､地方裁量型の4種類が設けられています｡
                                </div>
                            </div>
                            <div class="w-100 my-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        認可保育所(園)
                                    </div>
                                </div>
                                <div class="w-100 text-medium-xs">
                                    保護者の就労や病気などのためにお子さんの保育を必要とする場合に､保護者にかわって保育する児童福祉施設が保育所(園)で､対象年齢は0歳～小学校就学前までです｡認可保育所は､施設の広さや保育士などの職員数､給食設備など､国が定めた認可基準をクリアし､都道府県知事に認可された施設です｡公立と私立とがあり､公立は自治体が､私立は社会福祉法人､株式会社などが運営しています｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        小規模認可保育所
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    0～2歳までを対象とした､少人数(19人以下)で預かる保育施設です｡小人数ならではの家庭的な雰囲気が特徴で､一人の保育スタッフが担当する子どもの数が少ないため､子ども一人ひとりの発達に応じた質の高い保育を行うことができます｡2015年度より､｢子ども･子育て支援法｣が施行され､その中で小規模保育施設は｢小規模認可保育所｣となり､国の認可事業として位置づけられました｡児童数と保育職員数の比率や､職員資格などの基準により｢A型｣｢B型｣｢C型｣の3種類に分かれ､A型は保育士が､C型は家庭的保育者(保育ママ)が保育を行い､B型はその中間になります｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        事業所内保育施設
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    大学や企業などの事業所が運営する施設です｡事業所で働く方を対象とした従業員枠と､地域の子を対象とした地域枠があります｡0～2歳までの子が対象です｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        認可外保育施設
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    国の定めた認可基準に当てはまらない､認可されていない保育所です｡24時間保育をしている園や､オプションで色々な習い事ができるなど､特徴的な施設もあります｡ベビーホテル､駅型保育所､駅前保育所等のいわゆる無認可保育所のほか､へき地保育所(市町村が山間部等に設置)､季節保育所､企業主導型保育事業などもこれに該当します｡認可外保育所の場合は､施設に直接申し込むのが一般的です｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        幼稚園
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    小学校就学前の準備をする教育施設です｡3歳～小学校就学前の子を対象としており､共働きなど､保育を必要とする事由の証明は必要ありません｡教育施設のため､利用料や手続きは保育施設とは異なります｡幼稚園によっては2歳児保育を行なっている園もありますので､詳しくは園にお問合わせください｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        企業主導型保育所
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    従業員が働きやすいよう､企業が保育サービスを提供する保育施設です｡運営企業の従業員だけでなく､地域の子どもが入園できる地域枠も設けられています｡事業所内保育施設と似ていますが､認可外保育施設のため､定員の2分の1まで地域枠を設定可能なほか､対象年齢の制限が無かったり､預ける日程を設定できたりと､柔軟な対応が可能です｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        インターナショナルスクール
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    英語をはじめ､外国語と国際的な文化で保育と指導を行う幼児の教育施設です｡インターナショナルのほか､プリスクールやインターナショナルプリスクールと呼ばれる施設もあります｡近年は海外から来た子どもたちだけが対象ではなく､日本人も対象とした施設が主流となっており､英語教育だけでなく､様々な要素の教育にも力を入れている園が多くなっています｡保育料無償化の対象外に思われがちですが､認可外保育施設の分類ですので､保育料無償化の補助金支給対象となります｡
                                    <br>※市町村認可外施設として正式に登録､行政が認可外として認める施設だけをKODOMOREでは紹介しています｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        障がい児通所支援施設
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    児童発達支援センターや児童発達支援事業施設､ことばの教室など､障がいを持つ子どもたちのための保育や指導を行う施設です｡知的障がいや発達障がいなどの子どもたちを支援する福祉型施設のほか､医療機関と連携して身体障がいのある子どもたちを支援する医療型施設があります｡これら児童発達支援施設は､2019年10月より利用者負担が無償化されることとなり､満3歳～5歳までの子どもたちが対象となっています｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        一時預かり
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    就労の有無に関わらず､一時的に子どもを預けることができる施設で､保育園や幼稚園等に通っていない子どもが対象の｢一般型｣､幼稚園の1号認定者を対象とし､幼稚園の保育時間後や長期休暇期間などに預けられる｢幼稚園型｣､定員に空きのある保育所を利用して行われる｢余裕活用型｣､休日も預けられ､1日9時間以上開所している｢基幹型｣などがあります｡｢託児所｣｢託児施設｣などの名称となっている場合が多く､企業が運営している施設の場合､24時間･365日開所しているところもあります｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        病児･病後児保育
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    多くの園では､他の児童への感染を防ぐため､発熱や感染症の症状のある子どもの預かりを受け付けていません｡そのような場合でも子どもを預けることができるのが､病児･病後児保育です｡発熱や嘔吐などの症状がある病児を対象とした｢病児対応型｣､病気の回復期である病後児を対象とした｢病後児対応型｣､保育中に体調不良となった体調不良児を対象とした｢体調不良児対応型｣､病児･病後児を対象とした｢非施設型(訪問型)｣があり､0歳～小学生までの子ども(市区町村によって対象年齢は異なります)を預けることができます｡厚生労働省からの要綱で看護師の配置が定められているほか､病院に併設している施設も多く､急な体調変化にも対応しやすくなっています｡市区町村や当該施設での事前登録が必要な場合もあるため､入園と同時に登録しておくと安心です｡
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accordion card -->
                <div class="card mt-2 border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading2">

                        <div class="flex">
                            <h6 class="mb-0 text-white w-100 text-title">
                                利用案内
                            </h6>
                        </div>
                    </div>
                    <div class="text-medium-light form-inline mt-2">
                        認可保育施設､幼稚園では､主に以下の区分に応じて利用手続きを行います｡
                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1 collapsed" src="{{asset('img/omiss.png')}}" data-toggle="collapse" href="#collapse2"
                             aria-expanded="false" aria-controls="collapse2" name="collapsed" relate-icon="collapsed-nursery-rotate" id="collapsed-nursery-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse2" class="collapse" aria-labelledby="heading2" >
                        <div class="text-normal">
                            <div>
                                <img src="{{asset('img/choose_garden_image2.png')}}">
                            </div>
                            <div class="w-100">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        認定区分
                                    </div>

                                </div>
                                <div class="w-100 mb-3">
                                    <div class="w-100 text-medium-xs py-1 pl-2" style="border: 1px solid #333333">
                                        1号認定
                                    </div>
                                    <div class="w-100 text-medium-xs mt-2">
                                        教育標準時間認定･満3歳以上
                                    </div>
                                    <div class="w-100 text-medium text-pink">
                                        認定こども園､幼稚園
                                    </div>
                                </div>
                                <div class="w-100 mb-3">
                                    <div class="w-100 text-medium-xs py-1 pl-2" style="border: 1px solid #333333">
                                        2号認定
                                    </div>
                                    <div class="w-100 text-medium-xs mt-2">
                                        保育認定(標準時間･短時間)･満3歳以上
                                    </div>
                                    <div class="w-100 text-medium text-pink">
                                        認定こども園､保育所(園)
                                    </div>
                                </div>
                                <div class="w-100 mb-3">
                                    <div class="w-100 text-medium-xs py-1 pl-2" style="border: 1px solid #333333">
                                        3号認定
                                    </div>
                                    <div class="w-100 text-medium-xs mt-2">
                                        保育認定(標準時間･短時間)･満3歳未満
                                    </div>
                                    <div class="w-100 text-medium text-pink">
                                        認定こども園､保育所(園)､地域型保育
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        利用手続きの流れ
                                    </div>

                                </div>
                                <div class="w-100 mb-3">
                                    <div class="w-100 text-medium-xs py-1 pl-2" style="border: 1px solid #333333">
                                        1号認定
                                    </div>
                                    <div class="w-100 text-medium-xs mt-2">
                                        ①園に直接申し込み→②園から入園内定→③園を通じて認定申請→④園を通じて認定証交付→⑤園と契約
                                    </div>
                                </div>
                                <div class="w-100 mb-3">
                                    <div class="w-100 text-medium-xs py-1 pl-2" style="border: 1px solid #333333">
                                        2号､3号認定
                                    </div>
                                    <div class="w-100 text-medium-xs mt-2">
                                        ①市町村に｢保育の必要性｣認定申請→②市町村から認定証交付→③園の利用希望者の申し込み→④市町村が利用調整→⑤利用先の決定後､園との契約
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion card -->
                <div class="card mt-2 border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading3">

                        <div class="flex">
                            <h6 class="mb-0 text-white w-100 text-title">
                                幼児教育･保育無償化について
                            </h6>
                        </div>
                    </div>
                    <div class="text-medium-light form-inline mt-2">
                        2019年10月1日より､幼稚園や保育所に通う3～5歳の全ての子どもと､住民税非課税世帯で保育所に通う0～2歳の子どもについて利用料が無償化されました｡<br>
                        ※通園送迎費､食材料費､行事費などの経費については保護者負担｡但し､全世帯の第３子以降や､年収360万円未満相当世帯については､副食(おかず･おやつ等)の費用が免除｡<br>
                        無償化となるための認定などについては､お住まいの市町村の担当窓口へお問合わせください｡

                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1 collapsed" src="{{asset('img/omiss.png')}}" data-toggle="collapse" href="#collapse3"
                             aria-expanded="false" aria-controls="collapse3" name="collapsed" relate-icon="collapsed-auth-rotate" id="collapsed-auth-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse3" class="collapse" aria-labelledby="heading3" >
                        <div class="text-normal">
                            <div>
                                <img src="{{asset('img/choose_garden_image3.png')}}">
                            </div>
                            <div class="w-100 mt-3 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        無償化(無料)
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    ･保育所､認定こども園､障害児通園施設<br>
                                    ※1号認定子ども､２号認定子どもに限る｡3号認定子どもは住民税非課税世帯が対象｡
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        一部補助(補助額との差額分を負担)
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    ･幼稚園(月額25,700円まで)<br>
                                    ･幼稚園の預かり保育(月額11,300円まで)<br>
                                    ･認定外保育施設[一時預かり事業､病児保育事業､ファミリー･サポートセンター事業含む]　(月額37,000円まで､0～2歳児クラスは月額42,000円まで)<br>
                                    ※但し､幼稚園の預かり保育と認定外保育施設は｢保育の必要性の認定｣を受けた家庭のみ
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <!--Accordion wrapper-->




    <!-- Accordion wrapper -->
@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem;  margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/top.png')}}" class="img-top" id="move_welcome" style="bottom: -.5rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {

            var home_path = $("#home_path").val();
            $("#move_welcome").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#icon_move_home").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });




            $(".prefecture").click(function(event) {
                var selectedId = $(this).attr('prefecture-id');
                window.location.href = home_path + '/school/' + selectedId;
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
