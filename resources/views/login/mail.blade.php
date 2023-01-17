
<h2>{{$name}}様</h2>
<br>
<br>
@if(str_contains($url, 'forget'))
    KODOMORE［コドモア］のご利用ありがとうございます｡
    パスワード再設定用のURLと仮パスワードを発行いたしました｡
    下記URLよりパスワード再設定画面にアクセスし､仮パスワードを入力し､新しいパスワードを再設定してください｡
@elseif($url === 'parent/my-page')
    KODOMORE［コドモア］のご利用ありがとうございます｡
    会員情報の変更手続きが完了しました｡
    マイページにて変更内容をご確認ください｡
@else
    KODOMORE［コドモア］一般会員へのお申込みありがとうございます｡
    本登録用URLと仮パスワードを発行いたしました｡
    下記URLより本登録画面にアクセスし､仮パスワードを入力して本登録を行ってください｡
    本登録が完了しましたら､口コミ､各種予約､WEB出願等の機能のご利用が可能となります｡
@endif
    <br>
<br>
@if($url !== 'parent/my-page')
【仮パスワード】
<br>
{{$token}}
@endif
<br>

@if(str_contains($url, 'forget'))
    【再設定用URL】
@elseif($url === 'parent/my-page')
    マイページURL
@else
    【本登録用URL】
@endif

<br>
{{url('')}}/{{$url}}
<br>
<br>
※メールソフトによってはURLがクリックできない場合があります｡その場合は記載されたURLをコピーし､お使いのブラウザに貼り付けてアクセスしてください｡
<br>
※本メールは送信専用です｡このメールに返信いただいても､ご対応することはできません｡ご了承ください｡
<br>
※上記URLの有効期限は発行より24時間です｡有効期限内にアクセスされなかった場合は､再度再設定申請を行ってください｡
<br>
※このメールにお心当たりのない場合は､恐れいりますが本メールを破棄してください｡
<br>
<br>
◆KODOMOREお問い合わせフォーム
<br>
https://kodomore-edu.com/question
<br>
<br>
◆KODOMOREサイト
<br>
https://kodomore-edu.com
