<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('SESS_UID',       'SESS_CMS_USER_UID');          //一般ユーザーがログインページでログイン成功したときのユーザーID
define('SESS_ADMIN_UID', 'SESS_ADMIN_USER_UID');        //予備
define('SESS_USER_ID',   'SESS_ACCOUNT_USER_UID');      //学園の管理者が塾管理者ログインページでログイン成功したときのユーザーID
define('SESS_GARDEN_ID', 'SESS_CMS_ADMIN_GARDEN_UID');  //学園の管理者が塾管理者ログインページでログイン成功したときの管理学院ID
define('SESS_USERNAME',  'SESS_CMS_ADMIN_USERNAME');    //学園の管理者が園管理者ログインページでログイン成功したときのユーザー名
define('SUPER_USER',     'SUPER_USER');                 //システム管理者フラグ true or false
define('MEDIA_IMAGE_TYPE',    5);
define('MEDIA_VIDEO_TYPE',    6);
define('INFO_IMAGE_TYPE',    10);
define('UNIFORM_IMAGE_TYPE', 11);
define('STAFF_IMAGE_TYPE',   12);
define('OTHER_IMAGE_TYPE',   13);

Route::get('/',                                         'HomeController@index');                                            //トップページ
Route::get('/procedure',                                'HomeController@procedure');                                        //入園までの手続き
Route::get('/choose',                                   'HomeController@choose');                                           //幼稚園･保育所どう選ぶ？
Route::get('/contact',                                  'HomeController@contact');                                          //KODOMORE概要
Route::get('/private',                                  'HomeController@private');                                          //プライバシボリシー
Route::get('/question',                                 'HomeController@question');                                         //お問い合わせ
Route::get('/guide',                                    'HomeController@guide');                                            //利用方法およびガイドライン
Route::get('/blog-guide',                               'HomeController@blogGuide');                                        //投稿ガイドライン
Route::get('/frequent',                                 'HomeController@frequentlyQuestion');                               //よくある質問
Route::post('/question/confirm',                        'HomeController@questionConfirm');                                  //お問い合わせフォーム確認
Route::get('/question/complete',                        'HomeController@questionComplete');                                 //お問い合わせ送信完了
Route::get('/school/{prefectureId}/list/{garden_type}', 'SchoolListController@showSchoolListWithType');                     //スクール検索結果
Route::get('/school/{prefectureId}/list',               'SchoolListController@showSchoolList');                             //県ごとの幼稚園・保育所リスト
Route::post('/garden/favourite',                        'SchoolListController@gardenFavourite')->middleware('auth');        
Route::get('/school/detail/{gardenId}',                 'SchoolListController@getSchoolDetail');                            //学園詳細
Route::post('/school/favourite',                        'SchoolListController@imgFavourite')->middleware('auth');
Route::get('/school/create',                            'SchoolListController@createSchool')->middleware('auth');           //公開情報を編集
Route::post('/school/add-data',                         'SchoolListController@addDataSchool')->middleware('auth');          //施設の登録申請
Route::post('/school/create/confirm',                   'SchoolListController@createSchoolConfirm')->middleware('auth');    //登録内容確認
Route::post('/school/create/complete',                  'SchoolListController@createSchoolComplete')->middleware('auth');   //登録完了
Route::get('/school/modify/{gardenId}',                 'SchoolListController@normalModify')->middleware('auth');           //保護者と生徒・スクールで公開情報を編集する
Route::get('/school/modify_from/{gardenId}',            'SchoolListController@normalFromModify')->middleware('auth');
Route::get('/school/complete/modify',                   'SchoolListController@normalModifyComplete')->middleware('auth');
Route::post('/ajax/school-list',                        'SchoolListController@getSchoolList');
Route::post('/ajax/photo-list',                         'SchoolListController@getPhotoList');
Route::post('/ajax/prefecture-detail',                  'SchoolListController@getPrefectureDetail');


Route::get('/school',                                      'GardenController@index');
Route::get('/garden',                                      'GardenController@index');
Route::get('/ealer',                                       'EalerController@index');
Route::get('/high',                                        'HighSchoolController@index');
Route::get('/news/{prefectureId}/{currentPage}/list',      'SchoolListController@showNewsList');
Route::get('/news/detail/{newsId}',                        'SchoolListController@showNewsDetail');
Route::get('/news/profile',                                'SchoolListController@showNewsProfile')->middleware('auth');
Route::post('/news/post/comment',                          'SchoolListController@postNewsComment')->middleware('auth');
Route::post('/news/post/profile',                          'SchoolListController@postNewsProfile')->middleware('auth');
Route::post('/news/delete/comment',                        'SchoolListController@deleteNewsComment')->middleware('auth');
Route::post('/news/get/comment-list',                      'SchoolListController@getNewsCommentList');
Route::post('/news/get-by-user/comment-list',              'SchoolListController@getNewsUserCommentList');
Route::get('/articles/{prefectureId}/{currentPage}/list',  'SchoolListController@showArticlesList');
Route::get('/articles/detail/{newsId}',                    'SchoolListController@showArticlesDetail');
Route::get('/articles/profile',                            'SchoolListController@showArticlesProfile')->middleware('auth');
Route::post('/articles/post/comment',                      'SchoolListController@postArticlesComment')->middleware('auth');
Route::get('/articles/post/comment',                       'SchoolListController@postArticlesComment')->middleware('auth');
Route::post('/articles/post/profile',                      'SchoolListController@postArticlesProfile')->middleware('auth');
Route::post('/articles/delete/comment',                    'SchoolListController@deleteArticlesComment')->middleware('auth');
Route::post('/articles/get/comment-list',                  'SchoolListController@getArticlesCommentList');
Route::post('/articles/get-by-user/comment-list',          'SchoolListController@getArticlesUserCommentList');

Route::get('/login',                        'UserController@login');            //一般ユーザログイン
Route::get('/logout',                       'UserController@logout');           //一般ユーザログアウト
Route::get('/admin/logout',                 'UserController@adminLogout');      //園管理者ログアウト
Route::get('/forget',                       'UserController@forgetPassword');
Route::get('/forget-dismiss',               'UserController@forgetDismiss');
Route::post('/forget/complete',             'UserController@forgetComplete');
Route::post('/forget/modify',               'UserController@forgetModify');
Route::get('/forget/modify/{id}/{email}',   'UserController@forgetModifyMail');
Route::post('/ajax/check/user',             'UserController@checkUserExist');
Route::get('/forget/final',                 'UserController@forgetFinal');


Route::post('/ajax/login',                  'UserController@signIn');
Route::get('/parent/my-page',               'UserController@parentPage')->middleware('auth');
Route::get('/parent/setting',               'UserController@settingInfoPage')->middleware('auth');
Route::post('/parent/modify-info',          'UserController@modifyInfo')->middleware('auth');
Route::get('/parent/exit',                  'UserController@exitPage')->middleware('auth');
Route::post('/parent/exit/complete',        'UserController@exitCompletePage');
Route::get('/parent/question-list',         'UserController@showQListPage')->middleware('auth');
Route::get('/parent/favourite-list',        'UserController@showFListPage')->middleware('auth');
Route::post('/parent/favourite/get-list',   'UserController@getFListItem')->middleware('auth');
Route::get('/parent/child-list',            'UserController@showChildListPage')->middleware('auth');
Route::get('/parent/search-list',           'UserController@showSearchListPage')->middleware('auth');
Route::post('/parent/search/get-list',      'UserController@getSListItem')->middleware('auth');
Route::get('/parent/event-list',            'UserController@showEventListPage')->middleware('auth');
Route::post('/parent/event/get-list',       'UserController@getEventListItem')->middleware('auth');
Route::get('/parent/mail-list',             'UserController@showMailListPage')->middleware('auth');
Route::post('/parent/mail/get-list',        'UserController@getMailListItem')->middleware('auth');
Route::get('/parent/blog-list',             'UserController@showBlogListPage')->middleware('auth');
Route::post('/parent/blog/get-list',        'UserController@getBlogListItem')->middleware('auth');
Route::get('/parent/web-list',              'UserController@showWebListPage')->middleware('auth');
Route::post('/parent/web/get-list',         'UserController@getWebListItem')->middleware('auth');
Route::get('/parent/data-list',             'UserController@showDataListPage')->middleware('auth');
Route::post('/parent/data/get-list',        'UserController@getDataListItem')->middleware('auth');
Route::get('/parent/hot-line',              'UserController@showHotLinePage')->middleware('auth');
Route::get('/parent/personal-chat',         'UserController@showPersonalChatPage')->middleware('auth');
Route::get('/parent/cancel',                'UserController@cancelPage')->middleware('auth');
Route::get('/parent/cancel/complete',       'UserController@cancelCompletePage');

Route::post('/ajax/admin/login',            'UserController@adminSignIn');
Route::post('/ajax/save/garden',            'UserController@saveGarden');

Route::get('/register/normal',                  'UserController@registerNormal');
Route::post('/register/normal/confirm',         'UserController@registerNormalConfirm');
Route::get('/register/garden',                  'UserController@registerGarden');
Route::post('/register/garden/confirm',         'UserController@registerGardenConfirm');
Route::get('/register/public',                  'UserController@registerPublic');
Route::post('/register/public/confirm',         'UserController@registerPublicConfirm');
Route::get('/register/parent',                  'UserController@registerParent');
Route::post('/register/parent/confirm',         'UserController@registerParentConfirm');
Route::post('/ajax/register',                   'UserController@registerUser');
Route::post('/register/parent/child-confirm',   'UserController@registerChildConfirm');
Route::post('/register/parent/final',           'UserController@registerParentFinal');
Route::get('/register/final',                   'UserController@registerFinal');
Route::get('/register/republic',                'UserController@registerRepublic');
Route::get('/register/republic/search',         'UserController@registerRepublicSearch');
Route::get('/register/republic/modify',         'UserController@registerRepublicModify');
Route::post('/register/republic/modify/user',   'UserController@registerRepublicModifyUser');
Route::post('register/republic/confirm',        'UserController@registerRepublicConfirm');
Route::post('register/republic/complete',       'UserController@registerRepublicComplete');
Route::get('/ajax/get-city/{prefectureId}',     'HomeController@getCityList');
Route::post('/ajax/school-list-info',           'SchoolListController@getSchoolListInfo');
Route::post('/ajax/republic/school-list-info',  'SchoolListController@getRepublicSchoolList');

Route::get('/post/review/{garden_id}',             'SchoolListController@postReview')->middleware('auth');
Route::get('/modify/review/{review_id}',           'SchoolListController@modifyReview')->middleware('auth');
Route::get('/delete/review/{review_id}',           'SchoolListController@deleteReview')->middleware('auth');
Route::post('/delete/finish/review',               'SchoolListController@deleteFinishReview')->middleware('auth');
Route::post('/post/confirm',                       'SchoolListController@postToConfirm')->middleware('auth');
Route::post('/modify/confirm',                     'SchoolListController@modifyReviewConfirm')->middleware('auth');
Route::get('/post/confirm',                        'SchoolListController@postConfirm')->middleware('auth');
Route::get('/post/finish',                         'SchoolListController@postFinish')->middleware('auth');
Route::post('/post/finish',                        'SchoolListController@postToFinish')->middleware('auth');
Route::post('/modify/finish',                      'SchoolListController@modifyFinish')->middleware('auth');

Route::get('/warn/admin/{garden_id}/{review_id}', 'SchoolListController@warnToAdmin');
Route::post('/warn/finish',                       'SchoolListController@warnFinish');
Route::get('/require/delete/{review_id}',         'SchoolListController@requireDelete')->middleware('auth');
Route::post('/require/view',                      'SchoolListController@requireView')->middleware('auth');
Route::post('/require/confirm',                   'SchoolListController@requireConfirm')->middleware('auth');
Route::post('/require/finish',                    'SchoolListController@requireFinish')->middleware('auth');
Route::get('/replay/review/{review_id}',          'SchoolListController@replayReview')->middleware('auth');
Route::post('/replay/view',                       'SchoolListController@replayView')->middleware('auth');
Route::post('/replay/finish',                     'SchoolListController@replayFinish')->middleware('auth');
Route::get('/replay/school/{review_id}',          'SchoolListController@schoolReview')->middleware('auth');
Route::post('/replay/school/view',                'SchoolListController@schoolView')->middleware('auth');
Route::post('/replay/school/finish',              'SchoolListController@schoolFinish')->middleware('auth');
Route::get('/replay/post-user/{review_id}',       'SchoolListController@userReview')->middleware('auth');
Route::post('/replay/post-user/view',             'SchoolListController@userView')->middleware('auth');
Route::post('/replay/post-user/finish',           'SchoolListController@userFinish')->middleware('auth');

Route::post('/ajax/admin/delete/media',            'SchoolListController@adminRemoveMedia');
Route::post('/ajax/admin/modify/media',            'SchoolListController@adminModifyMedia');
Route::get('/ajax/admin/detail/{mediaId}',         'SchoolListController@adminMediaDetail');
Route::get('/ajax/admin/copy/{mediaId}',           'SchoolListController@adminMediaCopy');

Route::post('/review/star',                            'SchoolListController@changeStarReview');
Route::post('/comment/star',                           'SchoolListController@changeStarComment');
Route::post('/comment/follow',                         'SchoolListController@followComment');
Route::post('news/comment/star',                       'SchoolListController@changeStarNewsComment');
Route::post('news/comment/follow',                     'SchoolListController@followNewsComment');

Route::post('/register-confirm',                       'UserController@confirm');
Route::post('/register/complete',                      'UserController@completeRegister');
Route::post('/register/password',                      'UserController@password');
Route::get('/register/password/{id}/{type}/{email}',   'UserController@getPassword');
Route::post('/ajax/register/modify-password',          'UserController@modifyPassword');
Route::get('/register-child',                          'UserController@childRegister');

Route::get('/admin/school/detail',                     'SchoolListController@showAdminSchoolDetail')->middleware('auth');       //管理画面：スクール会員管理画面メイン情報
Route::get('/admin/school/detail/preview/{garden_id}', 'SchoolListController@showSchoolDetailPreview')->middleware('auth');
Route::get('/admin/school/tag',                        'SchoolListController@showAdminSchoolTag')->middleware('auth');          //管理画面：ざっくりOR検索
Route::get('/admin/school/tag/preview/{garden_id}',    'SchoolListController@showAdminSchoolTagPreview')->middleware('auth');
Route::get('/media/{gardenId}/{currentPage}/list',     'SchoolListController@showMediaList');
Route::get('/media/detail/{mediaId}',                  'SchoolListController@showMediaDetail');
Route::get('/admin/school/basic',                      'SchoolListController@showAdminSchoolBasic')->middleware('auth');
Route::post('/ajax/school/basic/modify',               'SchoolListController@modifyBasic')->middleware('auth');
Route::get('/admin/school/meta',                       'SchoolListController@showAdminMeta')->middleware('auth');               //管理画面：検索表示設定
Route::get('/admin/school/meta/preview/{garden_id}',   'SchoolListController@showAdminSchoolMetaPreview')->middleware('auth');
Route::post('/admin/school/modify/meta',               'SchoolListController@modifyAdminMeta')->middleware('auth');

Route::get('/admin/school/media-list',                  'SchoolListController@showAdminMediaList')->middleware('auth');         //管理画面：園トップの登録・編集/メディアにて紹介・掲載
Route::post('/admin/school/media-list',                 'SchoolListController@showAdminMediaList')->middleware('auth');         //管理画面：園トップの登録・編集/メディアにて紹介・掲載
Route::get('/admin/school/info',                        'SchoolListController@showAdminSchoolInfo')->middleware('auth');        //管理画面：画像の登録・編集/外観・内観・園庭など
Route::get('/admin/school/uniform',                     'SchoolListController@showAdminSchoolUniform')->middleware('auth');     //管理画面：画像の登録・編集/制服･オリジナルアイテム
Route::get('/admin/school/staff',                       'SchoolListController@showAdminSchoolStaff')->middleware('auth');       //管理画面：画像の登録・編集/園長・スタッフ
Route::get('/admin/school/other',                       'SchoolListController@showAdminSchoolOther')->middleware('auth');       //管理画面：画像の登録・編集/その他
Route::get('/admin/school/media',                       'SchoolListController@showAdminSchoolMedia')->middleware('auth');       //管理画面：画像の登録・編集/メディアにて
Route::post('/admin/school/media',                      'SchoolListController@showAdminSchoolMediaPost')->middleware('auth');   //管理画面：画像の登録・編集/メディアにて
Route::get('/admin/school/review',                      'SchoolListController@showAdminSchoolReview')->middleware('auth');      //管理画面：画像の登録・編集/一般投稿・クチコミ
Route::post('/admin/school/review',                     'SchoolListController@showAdminSchoolReviewPost')->middleware('auth');  //管理画面：画像の登録・編集/一般投稿・クチコミ
Route::get('/admin/school/photo-gallery',               'SchoolListController@showAdminSchoolPhoto')->middleware('auth');       //管理画面：画像の登録・編集/Photo Gallery
Route::post('/admin/school/photo-gallery',              'SchoolListController@showAdminSchoolPhotoPost')->middleware('auth');   //管理画面：画像の登録・編集/Photo Gallery
Route::post('/admin/school/add-media',                  'SchoolListController@adminAddMedia')->middleware('auth');              //管理画面：画像の登録・編集/Photo Gallery

Route::get('/admin/school/main-uniform',                'SchoolListController@showAdminSchoolMainUniform')->middleware('auth');  //管理画面：園トップの登録・編集/制服・オリジナルアイテム
Route::post('/admin/school/modify/main-uniform',        'SchoolListController@modifyAdminSchoolMainUniform')->middleware('auth');//管理画面：園トップの登録・編集/制服・オリジナルアイテム
Route::get('/admin/school/price',                       'SchoolListController@showAdminSchoolPrice')->middleware('auth');        //管理画面：基本情報の登録・編集/費用について
Route::get('/admin/school/price/preview/{garden_id}',   'SchoolListController@showAdminSchoolPricePreview')->middleware('auth'); //??
Route::post('/admin/school/modify/price',               'SchoolListController@modifyAdminSchoolPrice')->middleware('auth');      //??

Route::get('/admin/school/faq-childcare',               'SchoolListController@showAdminSchoolFaqChildCare')->middleware('auth');
Route::get('/admin/school/faq-food',                    'SchoolListController@showAdminSchoolFaqFood')->middleware('auth');
Route::get('/admin/school/faq-good',                    'SchoolListController@showAdminSchoolFaqGood')->middleware('auth');
Route::get('/admin/school/faq-enter',                   'SchoolListController@showAdminSchoolFaqEnter')->middleware('auth');
Route::post('/admin/school/faq-modify',                 'SchoolListController@showAdminSchoolFaqModify')->middleware('auth');


Route::get('/admin/school/post-list/{gardenId}',        'SchoolListController@showListMediaPost')->middleware('auth');
Route::get('/admin/school/post-create',                 'SchoolListController@createMediaPost')->middleware('auth');
Route::get('/admin/login',                              'SchoolListController@showAdminLogin');
Route::post('/school/modify/{gardenId}',                'SchoolListController@modify');
Route::post('/ajax/school/modify/tag/{gardenId}',       'SchoolListController@modifyTag');
