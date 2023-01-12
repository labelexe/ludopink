<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Faq\FaqController;
use App\Http\Controllers\Player\PlayerController;
use App\Http\Controllers\SpecialOffer\SpecialofferController;
use App\Http\Controllers\Shopcoin\ShopcoinController;
use App\Http\Controllers\Bidvalue\BidConteoller;
use App\Http\Controllers\Kyc\KycController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Websettings\WebSettingController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Tournament\TournamentController;
use App\Http\Controllers\Jackpot\JackpotController;
//use App\Http\Controllers\RestApi\PaymentGateway\Razorpay\RazorpayController;
use App\Http\Controllers\Notification\SingleNotificationController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Testimonial\TestimonialController;
use App\Http\Controllers\Cashfree\CashfreeController;
use App\Http\Controllers\Addcoin\AddCoinController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', [AdminController::class, 'index']);

Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/logout', function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error', 'Logout Successfully !');
            return view('admin.login.AdminLogin');
        });
        //admin coding
        Route::get('/dashboard', [HomeController::class, 'Index']);
        //logout route
        Route::get('/account', [AccountController::class, 'index']);
        Route::post('/account/profile/general', [AccountController::class, 'updateImage'])->name('update.profile.general');
        Route::post('/account/profile/password', [AccountController::class, 'updatePassword'])->name('update.password');
        Route::post('/account/profile/information', [AccountController::class, 'updateInfo'])->name('update.info');
        Route::post('/account/profile/socialmedia', [AccountController::class, 'updateSocialMedia'])->name('update.socialmedia');

        //now PlayerController routing

        Route::get('/player/all', [PlayerController::class, 'AllPlayer']);
        Route::get('/player/block', [PlayerController::class, 'BlockPlayer']);
        Route::get('/player/view/{id}', [PlayerController::class, 'ViewPlayerDetails']);
        Route::post('/player/add/coin', [PlayerController::class, 'AddCoin'])->name('add.user.coin');
        Route::post('/player/cut/coin', [PlayerController::class, 'CutUserCoin'])->name('cut.user.coin');
        Route::post('/player/details/update', [PlayerController::class, 'UpdateUserDetails'])->name('update.user.details');
        Route::post('/player/ban/update/{player}', [PlayerController::class, 'UserBan']);
        Route::post('/player/unban/update/{player}', [PlayerController::class, 'UserUnBan']);
        Route::get('/player/transction/{id}', [PlayerController::class, 'TransctionHistory']);
        Route::get('/player/withdraw/{id}', [PlayerController::class, 'WithdrawHistory']);
        Route::get('/player/gamehistory/{id}', [PlayerController::class, 'GameHistory']);
        Route::get('/player/referd/user/{id}', [PlayerController::class, 'ReferdUser']);
        Route::post('/update/user/data', [PlayerController::class, 'UpdateUserdata'])->name('update.user.update');
        Route::post('/player/update/withdraw/status', [PlayerController::class, 'UpdateWithdrawStatus'])->name('update.withdraw.status');
        Route::post('/player/delete/{id}', [PlayerController::class, 'DeletePlayer']);
        Route::get('/player/search/list', [PlayerController::class, 'SearchPlayer'])->name('search.player.list');

        //now special offer routing

        //now create special offer
        Route::get('/special/offer', [SpecialofferController::class, 'index'])->name('admin.SpecialOffer.SpecialOffer');
        Route::post('/special/offer/create', [SpecialofferController::class, 'create'])->name('create.product.brand');
        Route::post('/special/offer/delete/{id}', [SpecialofferController::class, 'delete']);
        Route::get('/special/offer/edit/{id}', [SpecialofferController::class, 'edit']);
        Route::post('/special/offer/update/{id}', [SpecialofferController::class, 'update']);

        //now create shop coin
        Route::get('/shop/coin', [ShopcoinController::class, 'index'])->name('admin.Shopcoin.Shopcoin');
        Route::post('/shop/coin/create', [ShopcoinController::class, 'create'])->name('create.shopcoin.new');
        Route::post('/shop/coin/delete/{id}', [ShopcoinController::class, 'delete']);
        Route::get('/shop/coin/edit/{id}', [ShopcoinController::class, 'edit']);
        Route::post('/shop/coin/update/{id}', [ShopcoinController::class, 'update']);

        //now create bid coin value
        Route::get('/bid/coin', [BidConteoller::class, 'index']);
        Route::post('/bid/coin/create', [BidConteoller::class, 'create'])->name('create.bidvalue.new');
        Route::post('/bid/coin/delete/{id}', [BidConteoller::class, 'delete']);
        Route::get('/bid/coin/edit/{id}', [BidConteoller::class, 'edit']);
        Route::post('/bid/coin/update/{id}', [BidConteoller::class, 'update']);

        Route::get('/leaderboard', [HomeController::class, 'GetLeaderboard']);

        //now faq routing
        Route::get('/faq/all', [FaqController::class, 'index']);
        Route::get('/faq/add', [FaqController::class, 'addFaqForm']);
        Route::post('faq/create', [FaqController::class, 'FAQCreate'])->name('create.faq.new');
        Route::get('/faq/edit/{id}', [FaqController::class, 'EditFaqForm']);
        Route::post('/faq/update/{id}', [FaqController::class, 'UpdateFaq'])->name('update.faq');
        Route::post('/faq/delete/{id}', [FaqController::class, 'DeleteFaq']);

        //now testimonial routing
        Route::get('/testimonial/all', [TestimonialController::class, 'index']);
        Route::get('/testimonial/add', [TestimonialController::class, 'AddTestimonialForm']);
        Route::post('testimonial/create', [TestimonialController::class, 'CreateTestimonial'])->name('create.testimonial.new');
        Route::post('/testimonial/delete/{id}', [TestimonialController::class, 'DeleteTestimonial']);

        //now add coin routing routing
        Route::get('/addcoin/pending', [AddCoinController::class, 'PendingStatus']);
        Route::get('/addcoin/approved', [AddCoinController::class, 'ApprovedStatus']);
        Route::get('/addcoin/reject', [AddCoinController::class, 'RejectStatus']);
        Route::post('/addcoin/approved/{id}', [AddCoinController::class, 'ApprovedRequest']);
        Route::post('/addcoin/reject/{id}', [AddCoinController::class, 'RejectdRequest']);

        //now create jackpoint
        Route::get('/jackpoint', [JackpotController::class, 'index']);
        Route::post('/jackpoint/create', [JackpotController::class, 'create'])->name('create.jackpoint.new');
        Route::post('/jackpoint/delete/{id}', [JackpotController::class, 'delete']);
        Route::get('/jackpoint/edit/{id}', [JackpotController::class, 'edit']);
        Route::post('/jackpoint/update/{id}', [JackpotController::class, 'update']);



        //web setting routing
        Route::get('/websettings', [WebSettingController::class, 'index'])->name('admin.Websettings.websettings');
        Route::post('/websettings/general/update', [WebSettingController::class, 'generalUpdate'])->name('update.general.setting');
        Route::post('/websettings/logo/update', [WebSettingController::class, 'logoUpdate'])->name('update.logo');
        Route::post('/websettings/notice/update', [WebSettingController::class, 'NoticeUpdate'])->name('update.general.notification');
        Route::post('/websettings/social/update', [WebSettingController::class, 'socialUpdate'])->name('update.social');
        Route::post('/websettings/contact/update', [WebSettingController::class, 'contactUpdate'])->name('update.contact');
        Route::post('/websettings/admin/about/update', [WebSettingController::class, 'AdminAboutUpdate'])->name('update.Adminabout');
        Route::post('/websettings/payment/policy/update', [WebSettingController::class, 'gameRule'])->name('update.GameRule');
        Route::post('/websettings/shipping/policy/update', [WebSettingController::class, 'GameConfig'])->name('update.gameConfig');

        Route::post('/websettings/tearms/policy/update', [WebSettingController::class, 'TermsPolicyUpdate'])->name('update.TermsPolicy');
        Route::post('/websettings/privacy/policy/update', [WebSettingController::class, 'PrivacyPolicyUpdate'])->name('update.PrivacyPolicy');
        Route::post('/websettings/refund/policy/update', [WebSettingController::class, 'RefundPolicyUpdate'])->name('update.RefundPolicy');
        //now kyc routing

        Route::get('/pending/kyc', [KycController::class, 'PendingKYC']);
        Route::get('/approved/kyc', [KycController::class, 'ApprovedKYC']);
        Route::get('/rejected/kyc', [KycController::class, 'RejectedKYC']);
        Route::get('/kyc/view/{id}', [KycController::class, 'ViewKycDetails']);
        Route::post('/kyc/user/verified', [KycController::class, 'VerifyKycStatus'])->name('verify.user.kyc');
        Route::post('/kyc/user/rejected', [KycController::class, 'RejectKycStatus'])->name('reject.user.kyc');
        Route::post('/kyc/user/pending', [KycController::class, 'PendingKycStatus'])->name('pending.user.kyc');

        //now withdraw routing

        Route::get('/new/withdraw/request', [KycController::class, 'NewWithdrawRequest']);
        Route::get('/approved/withdraw/request', [KycController::class, 'ApprovedWithdrawRequest']);
        Route::get('/rejected/withdraw/request', [KycController::class, 'RejectedWithdrawRequest']);


        //now transction controller

        Route::get('/transction/all', [KycController::class, 'AllTransaction']);
        Route::get('/transction/success', [KycController::class, 'AllSuccessTransaction']);
        Route::get('/transction/fail', [KycController::class, 'AllFailTransaction']);


        //Notification Routing

        Route::get('/notification', [NotificationController::class, 'Index']);
        Route::post('/notification/send', [NotificationController::class, 'send'])->name('send.all.notification');
        Route::post('/single/notification/send', [SingleNotificationController::class, 'send'])->name('send.single.notofication');
        Route::get('/notification/single/user', [NotificationController::class, 'notificationsingle']);
        Route::post('/notification/single/user/test', [NotificationController::class, 'notificationsingletest']);

        //now tournament routing
        Route::get('/tournament', [TournamentController::class, 'index']);
        Route::get('/tournament/add', [TournamentController::class, 'AddTournament']);
        Route::post('/tournament/create/new', [TournamentController::class, 'CreatteTournament'])->name('create.tournament.new');

        Route::get('/home/image-update', [FrontController::class, 'imageUpdate']);
        Route::post('/home/image-update/updated', [FrontController::class, 'UpdateBannerImage'])->name('update.banner.image');
        Route::post('/home/image-update/about-image/update', [FrontController::class, 'UpdateAboutImage'])->name('update.about.image');
        Route::post('/home/image-update/download-img/update', [FrontController::class, 'UpdateDownloadImage'])->name('update.download.image');
        Route::post('/home/image-update/contact-img/update', [FrontController::class, 'UpdateContactImage'])->name('update.contact.image');
        Route::post('/home/image-update/features-img/update', [FrontController::class, 'UpdateFeaturesImage'])->name('update.features.icon');
        Route::post('/home/image-update/features-img/uploadapk', [FrontController::class, 'UploadAPK'])->name('update.uploadapk.icon');

        Route::get('/home/text-update', [FrontController::class, 'TextUpdate']);
        Route::post('/home/heading/text-update', [FrontController::class, 'HeadingTextUpdate'])->name('update.heading.text');
        Route::post('/home/about/text-update', [FrontController::class, 'AboutTextUpdate'])->name('update.about.text');
        Route::post('/home/features/text-update', [FrontController::class, 'FeaturesTextUpdate'])->name('update.features.text');
        Route::post('/home/download/text-update', [FrontController::class, 'DownloadTextUpdate'])->name('update.download.text');
        Route::post('/home/screenshot/text-update', [FrontController::class, 'ScreenshotTextUpdate'])->name('update.screenshot.text');
        Route::post('/home/update/whychoose', [FrontController::class, 'UpdateWhyChoose'])->name('update.whychoose.us');
        Route::post('/home/contact/details/video', [FrontController::class, 'ContactTextUpdate'])->name('update.contactvideodetails.text');
        Route::post('/home/update/funfact', [FrontController::class, 'UpdateFunFact'])->name('update.funfact.data');
        Route::post('/home/testimonial/text', [FrontController::class, 'TestimonialText'])->name('update.testimonial.text');
        Route::post('/home/contact/desupdate', [FrontController::class, 'ContactDeTect'])->name('update.contactdetails.text');

        Route::get('/home/screenshot', [FrontController::class, 'Screenshot']);
        Route::post('/home/screenshot/upload/new', [FrontController::class, 'UploadScreenshot'])->name('create.screenshot.new');
        Route::post('/home/screenshot/delete/{id}', [FrontController::class, 'delete']);

        Route::get('/contact/list', [FrontController::class, 'contactlist']);
        Route::post('/contact/list/delete/{id}', [FrontController::class, 'DeleteContact']);

        Route::get('/clear', [FrontController::class, 'ClearCache']);
    });
});


//now doing front controller
Route::get('/', [FrontController::class, 'index']);

Route::get('/about-us', function () {
    return view("front.About");
});

Route::get('/privacy-policy', function () {
    return view("front.Privacy");
});

Route::get('/terms-condition', function () {
    return view("front.Terms");
});

Route::get('/refund-policy', function () {
    return view("front.Refund");
});

Route::get('/contact-us', function () {
    return view("front.Contact");
});


Route::get('/s', function () {
    Artisan::call('storage:link');
    // Do whatever you want either print a message or exit
});


Route::post('/contact/now', [FrontController::class, 'ContactNow'])->name('create.contact.new');
// Route::get('/a', function () {
//     return view("front.AddCoin");
// });
//Route::post('/submit/coin/request/now', [FrontController::class, 'AddCoinRequest'])->name('submit.coin.request.new');

//now front routing
Route::get('/cashfree/payment',[CashfreeController::class,'Cashfree']);
Route::post('/cashfree/payment/success',[CashfreeController::class,'PaymentSuccess']);

Route::get('payment/success', function () {
    return view("admin.Razorpay.PaymentSuccess");
});
Route::get('payment/failed', function () {
    return view("admin.Razorpay.PaymentFaield");
});


