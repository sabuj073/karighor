<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\FlagController;
use App\Http\Controllers\Backend\LeafController;
use App\Http\Controllers\Backend\MetaController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DreamConreoller;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\PolicyController;
use App\Http\Controllers\Backend\PortalController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ConcernController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FeaturesController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\OurStoryController;
use App\Http\Controllers\Backend\PackagesController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\BradcrumbController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\OurClientController;
use App\Http\Controllers\Backend\WhyChooseController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\AffiliationController;
use App\Http\Controllers\Backend\GeneralInfoController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\HotelBookingController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Backend\WhyBaganbariController;
use App\Http\Controllers\Backend\MissionVisionController;
use App\Http\Controllers\Backend\SpecificationController;
use App\Http\Controllers\Backend\CustomerReviewController;
use App\Http\Controllers\Backend\LatestServicesController;
use App\Http\Controllers\Backend\RequestMessageController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\SectionContentController;
use App\Http\Controllers\Backend\BoardOfDirectorController;
use App\Http\Controllers\Backend\PackagesDetailsController;
use App\Http\Controllers\Backend\RequirementTypeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\LoginController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/search', 'search')->name('search');
    Route::get('/get-products-ajax', 'getproducts')->name('getproducts_ajax');
    Route::get('/quick-view/{id}', 'quick_view')->name('quick_view');
    Route::get('/listProducts', 'listProducts')->name('listProducts');
});

Route::controller(PagesController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/category', 'category')->name('category');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/sub-category', 'sub_category')->name('sub_category');
    Route::get('/compare', 'compare')->name('compare');
    Route::get('/products', 'all_product')->name('all_product');
    Route::get('/product/{slug}', 'product_details')->name('product_details');
    Route::get('/category/{slug}', 'category_product')->name('category_product');
    Route::get('/artist', 'artist')->name('artist');
    Route::get('/return-and-refund', 'return')->name('return-and-refund');
    Route::get('/news', 'all_blog')->name('all_blog');
    Route::get('/news/{slug}', 'blog_details')->name('blog_details');
    Route::get('/all-concern', 'all_concern')->name('all_concern');
    Route::get('/sister-concern', 'all_client')->name('all_client');
    Route::get('/concern/{slug}', 'concern_details')->name('concern_details');
    Route::get('/all-services', 'all_service')->name('all_service');
    Route::get('/service/{slug}', 'service_details')->name('service_details');
    Route::get('/about-us', 'about_us')->name('about_us');
    Route::get('/mission-vission', 'mission_vission')->name('mission_vission');
    Route::get('/contact-us', 'contact_us')->name('contact_us');
    Route::get('/get-quote', 'get_quote')->name('get_quote');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/privacy-policy', 'privacy')->name('privacy');
    Route::get('/return-policy', 'return_policy')->name('return_policy');
    Route::get('/refund-policy', 'refund_policy')->name('refund_policy');
    Route::get('/terms-condition', 'terms_condition')->name('terms_condition');
    Route::get('/track-order', 'track_order')->name('track_order');
    Route::get('/ota-portal', 'portal')->name('portal');
    Route::get('/sign-up', 'signUp')->name('signUp');
    Route::get('/apply-now',  'apply_now')->name('apply_now');
    Route::post('/shopAttribute', 'shopAttribute')->name('shopAttribute');
    Route::post('/shopSizeColor', 'shopSizeColor')->name('shopSizeColor');


    Route::any('/filter_properties', 'filter_properties')->name('filter_properties');
    Route::post('/getproducts', 'getproducts')->name('getproducts');
    Route::post('/filterProductData', 'filterProductData')->name('filterProductData');

    Route::get('/our-story', 'ourStory')->name('ourStory');
    Route::get('/team', 'team')->name('team');
    Route::get('/team-details/{slug}', 'team_details')->name('team-details');
    Route::get('/career', 'career')->name('career');
    Route::get('/career/{slug}', 'career_details')->name('career-details');
    Route::get('/shipping-policy', 'shippingPolicy')->name('shippingPolicy');
    Route::get('/wall-of-love', 'wall_of_love')->name('wall_of_love');
    Route::get('/gallery',  'all_photo_gallery')->name('all_photo_gallery');
    Route::get('/all-packages',  'all_packages')->name('all_packages');
    Route::get('/package/{slug}',  'package_details')->name('package-details');
    Route::get('/service/package/{slug}',  'package_details_visa')->name('package_details_visa');
    Route::get('/all-hotels',  'all_hotels')->name('all_hotels');
    Route::get('/hotel/{slug}',  'hotel_details')->name('hotel_details');
    Route::get('/service/{slug}/{json_slug}',  'country_details')->name('country-details');
    Route::get('/gallery/{slug}',  'photo_gallery')->name('photo_gallery');
    Route::post('/getPhotos',  'getPhotos')->name('getPhotos');
    Route::post('/search_flag',  'search_flag')->name('search_flag');
    Route::get('/videos',  'video_gallery')->name('video_gallery');
});
Route::controller(RatingController::class)->prefix('/user-rating')->name('user.rating.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/bookingstore', 'bookingstore')->name('bookingstore');
    Route::get('/edit/{rating}', 'edit')->name('edit');
    Route::post('/update/{rating}', 'update')->name('update');
    Route::get('/destroy/{rating}', 'destroy')->name('trash');
});
Route::controller(SubscriberController::class)->prefix('/admin/subscriber')->name('backend.subscriber.')->group(function () {
    Route::post('/store', 'store')->name('store');
});
Route::controller(PortalController::class)->prefix('/user/portal')->name('backend.portal.')->group(function () {
    Route::post('/store', 'store')->name('store');
});
Route::controller(LoginController::class)->prefix('/user')->name('user.')->group(function () {
    Route::get('/login', 'login')->name('login');
});

Route::controller(DashboardController::class)->prefix('/user')->name('user.')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
    Route::get('/orders', 'orders')->name('orders');
    Route::get('/profile', 'profile')->name('profile');
});
Route::resource('carts', CartController::class);

Auth::routes();


Route::controller(MailController::class)->group(function () {
    Route::get('sendbasicemail', 'basic_email');
    Route::post('sendhtmlemail', 'html_email')->name('html_email');
    Route::get('sendattachmentemail', 'attachment_email');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return response()->json(['message' => 'Application cache cleared successfully!']);
})->name('clear.cache');
