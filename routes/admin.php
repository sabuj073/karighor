<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth','admin'])->group(
    function () {
        Route::get('/',  [BackendController::class, 'admin'])->name('admin');
        Route::get('/logout', [BackendController::class, 'authLogout'])->name('authLogout');
        Route::controller(HomeController::class)->prefix('/user-dashboard')->group(function () {
            Route::get('/cache-cache', 'clearCache')->name('cache.clear');
        });

        Route::controller(GeneralInfoController::class)->prefix('/general_info')->name('backend.general_info.')->group(function () {

            // Route::get('/create', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            Route::get('/edit/{generalInfo}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit general info']);
            Route::post('/update/{generalInfo}', 'update')->name('update')
                ->middleware(['role_or_permission:edit general info']);
        });
        Route::controller(SectionContentController::class)->prefix('/sectionContent')->name('backend.sectionContent.')->group(function () {
            Route::get('/index', 'index')->name('index')
                ->middleware(['role_or_permission:edit section content']);
            // Route::get('/create', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            Route::get('/edit/{sectionContent}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit section content']);
            Route::post('/update/{sectionContent}', 'update')->name('update')
                ->middleware(['role_or_permission:edit section content']);
        });

        Route::controller(UserController::class)->prefix('/user')->name('backend.user.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit user']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create role']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create role']);
            Route::get('/edit/{user}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit user']);
            Route::post('/update/{user}', 'update')->name('update')
                ->middleware(['role_or_permission:edit user']);
            Route::get('/destroy/{user}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit user']);
            Route::get('/status/{user}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit user']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete user']);
            Route::get('/profile', 'profile')->name('profile');
        });
        Route::controller(RolePermissionController::class)->prefix('/role')->name('backend.role.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit role']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create role']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create role']);
            Route::get('/edit/{id}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit role']);
            Route::post('/update/{id}', 'update')->name('update')
                ->middleware(['role_or_permission:edit role']);
            Route::get('/destroy', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit role']);
            Route::get('/status', 'status')->name('status')
                ->middleware(['role_or_permission:edit role']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit role']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete role']);

            Route::post('/permission/store', 'permissionStore')->name('permission.store')
                ->middleware(['role_or_permission:super-admin']);
        });
        Route::controller(BannerController::class)->prefix('/banner')->name('backend.banner.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit banner']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create banner']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create banner']);
            Route::get('/edit/{banner}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit banner']);
            Route::post('/update/{banner}', 'update')->name('update')
                ->middleware(['role_or_permission:edit banner']);
            Route::get('/destroy/{banner}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit banner']);
            Route::get('/status/{banner}', 'status')->name('status')
                ->middleware(['role_or_permission:edit banner']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit banner']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete banner']);
        });
        Route::controller(AboutUsController::class)->prefix('/aboutUs')->name('backend.aboutUs.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:super-admin']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/edit', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit about']);
            Route::post('/update/{aboutUs}', 'update')->name('update')
                ->middleware(['role_or_permission:edit about']);
            Route::get('/destroy/{aboutUs}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/status/{aboutUs}', 'status')->name('status')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:super-admin']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:super-admin']);
        });
        Route::controller(BlogController::class)->prefix('/blog')->name('backend.blog.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit blog']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create blog']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create blog']);
            Route::get('/edit/{blog}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit blog']);
            Route::post('/update/{blog}', 'update')->name('update')
                ->middleware(['role_or_permission:edit blog']);
            Route::get('/destroy/{blog}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit blog']);
            Route::get('/status/{blog}', 'status')->name('status')
                ->middleware(['role_or_permission:edit blog']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit blog']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete blog']);
        });
        Route::controller(FaqController::class)->prefix('/faq')->name('backend.faq.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit faq']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create faq']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create faq']);
            Route::get('/edit/{faq}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit faq']);
            Route::post('/update/{faq}', 'update')->name('update')
                ->middleware(['role_or_permission:edit faq']);
            Route::get('/destroy/{faq}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit faq']);
            Route::get('/status/{faq}', 'status')->name('status')
                ->middleware(['role_or_permission:edit faq']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit faq']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete faq']);
        });
        Route::controller(CareerController::class)->prefix('/career')->name('backend.career.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{career}', 'edit')->name('edit');
            Route::post('/update/{career}', 'update')->name('update');
            Route::get('/destroy/{career}', 'destroy')->name('trash');
            Route::get('/status/{career}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(MetaController::class)->prefix('/meta')->name('backend.meta.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit meta']);
            // Route::get('/create', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            Route::get('/edit/{meta}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit meta']);
            Route::post('/update/{meta}', 'update')->name('update')
                ->middleware(['role_or_permission:edit meta']);
            Route::delete('/destroy/{meta}', 'destroy')->name('delete')
                ->middleware(['role_or_permission:edit meta']);
        });
        Route::controller(DreamConreoller::class)->prefix('/dreamWithUs')->name('backend.dreamWithUs.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{dreamWithUs}', 'edit')->name('edit');
            Route::post('/update/{dreamWithUs}', 'update')->name('update');
            Route::get('/destroy/{dreamWithUs}', 'destroy')->name('trash');
            Route::get('/status/{dreamWithUs}', 'status')->name('status');
            Route::get('/reStore/{dreamWithUs}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{dreamWithUs}', 'permDelete')->name('delete');
        });

        Route::controller(WhyBaganbariController::class)->prefix('/whyBaganbari')->name('backend.whyBaganbari.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{whyBaganbari}', 'edit')->name('edit');
            Route::get('/editHead/{whyBaganbari}', 'editHead')->name('editHead');
            Route::post('/update/{whyBaganbari}', 'update')->name('update');
            Route::get('/destroy/{whyBaganbari}', 'destroy')->name('trash');
            Route::get('/status/{whyBaganbari}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });

        Route::controller(OurStoryController::class)->prefix('/our_story')->name('backend.our_story.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{our_story}', 'edit')->name('edit');
            Route::get('/editBanner/{our_story}', 'editBanner')->name('editBanner');
            Route::get('/editSection2/{our_story}', 'editSection2')->name('editSection2');
            Route::post('/update/{our_story}', 'update')->name('update');
            Route::post('/updateBanner/{our_story}', 'updateBanner')->name('updateBanner');
            Route::post('/updateSection2/{our_story}', 'updateSection2')->name('updateSection2');
            Route::get('/destroy/{our_story}', 'destroy')->name('trash');
            Route::get('/status/{our_story}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(MissionVisionController::class)->prefix('/mission')->name('backend.mission.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit mission']);
            Route::get('/edit/{missionVision}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit mission']);
            Route::post('/update/{missionVision}', 'update')->name('update')
                ->middleware(['role_or_permission:edit mission']);
        });
        Route::controller(OurClientController::class)->prefix('/ourClient')->name('backend.ourClient.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{ourClient}', 'edit')->name('edit');
            Route::post('/update/{ourClient}', 'update')->name('update');
        });

        Route::controller(CategoryController::class)->prefix('/category')->name('backend.category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::post('/update/{category}', 'update')->name('update');
            Route::get('/destroy/{category}', 'destroy')->name('trash');
            Route::get('/status/{category}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(RequirementTypeController::class)->prefix('/requirementType')->name('backend.requirementType.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{requirementType}', 'edit')->name('edit');
            Route::post('/update/{requirementType}', 'update')->name('update');
            Route::get('/destroy/{requirementType}', 'destroy')->name('trash');
            Route::get('/status/{requirementType}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(LocationController::class)->prefix('/location')->name('backend.location.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{location}', 'edit')->name('edit');
            Route::post('/update/{location}', 'update')->name('update');
            Route::get('/destroy/{location}', 'destroy')->name('trash');
            Route::get('/status/{location}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(SubscriberController::class)->prefix('/subscriber')->name('backend.subscriber.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:delete subscriber']);
            Route::delete('/destroy/{subscriber}', 'destroy')->name('delete')
                ->middleware(['role_or_permission:delete subscriber']);
        });
        Route::controller(PropertyController::class)->prefix('/property')->name('backend.property.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{property}', 'edit')->name('edit');
            Route::post('/update/{property}', 'update')->name('update');
            Route::get('/destroy/{property}', 'destroy')->name('trash');
            Route::get('/status/{property}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(FeaturesController::class)->prefix('/features')->name('backend.features.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{features}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{features}', 'destroy')->name('trash');
            Route::get('/status/{features}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(PackagesController::class)->prefix('/packages')->name('backend.packages.')->group(function () {
            Route::get('/', 'index')->name('index')->middleware(['role_or_permission:edit package']);
            Route::get('/create', 'create')->name('create')->middleware(['role_or_permission:create package']);
            Route::post('/store', 'store')->name('store')->middleware(['role_or_permission:create package']);
            Route::get('/edit/{packages}', 'edit')->name('edit')->middleware(['role_or_permission:edit package']);
            Route::post('/update/{packages}', 'update')->name('update')->middleware(['role_or_permission:edit package']);
            Route::get('/destroy/{packages}', 'destroy')->name('trash')->middleware(['role_or_permission:edit package']);
            Route::get('/status/{packages}', 'status')->name('status')->middleware(['role_or_permission:edit package']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')->middleware(['role_or_permission:edit package']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')->middleware(['role_or_permission:delete package']);
            Route::get('/review', 'review')->name('review')->middleware(['role_or_permission:edit package']);
            Route::get('/review-approve/{rating}', 'review_approve')->name('review_approve')->middleware(['role_or_permission:edit package']);
        });
        Route::controller(FlagController::class)->prefix('/flag')->name('backend.flag.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create flag']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create flag']);
            Route::get('/edit/{flag}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit flag']);
            Route::post('/update/{flag}', 'update')->name('update')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/destroy/{flag}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/status/{flag}', 'status')->name('status')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit flag']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:edit flag']);
        });
        Route::controller(FlagController::class)->prefix('/visa-flag')->name('backend.visa_flag.')->group(function () {
            Route::get('/', 'index_flag')->name('index_flag')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/create-flag', 'create_flag')->name('create_flag')
                ->middleware(['role_or_permission:create flag']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create flag']);
            Route::get('/edit-flag/{flag}', 'edit_flag')->name('edit_flag')
                ->middleware(['role_or_permission:edit flag']);
            Route::post('/update-flag/{flag}', 'update_flag')->name('update_flag')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/destroy/{flag}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/status/{flag}', 'status')->name('status')
                ->middleware(['role_or_permission:edit flag']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit flag']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:edit flag']);
        });
        Route::controller(HotelBookingController::class)->prefix('/hotelBooking')->name('backend.hotelBooking.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{hotelBooking}', 'edit')->name('edit');
            Route::post('/update/{hotelBooking}', 'update')->name('update');
            Route::get('/destroy/{hotelBooking}', 'destroy')->name('trash');
            Route::get('/status/{hotelBooking}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
            Route::get('/review', 'review')->name('review');
            Route::get('/review-approve/{rating}', 'review_approve')->name('review_approve');
        });
        Route::controller(RequestMessageController::class)->prefix('/message')->name('backend.message.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{message}', 'edit')->name('edit');
            Route::post('/update', 'message')->name('update');
            Route::get('/destroy/{requestMessage}', 'destroy')->name('trash');
            Route::get('/status/{requestMessage}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(BoardOfDirectorController::class)->prefix('/board_of_director')->name('backend.board_of_director.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{boardOfDirector}', 'edit')->name('edit');
            Route::post('/update/{boardOfDirector}', 'update')->name('update');
            Route::get('/destroy/{boardOfDirector}', 'destroy')->name('trash');
            Route::get('/status/{boardOfDirector}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(ServicesController::class)->prefix('/services')->name('backend.services.')->group(function () {
            Route::get('/', 'index')->name('index')->middleware(['role_or_permission:edit package']);
            Route::get('/create', 'create')->name('create')->middleware(['role_or_permission:create service']);
            Route::post('/store', 'store')->name('store')->middleware(['role_or_permission:create service']);
            Route::get('/edit/{services}', 'edit')->name('edit')->middleware(['role_or_permission:edit service']);
            Route::get('/editHead/{services}', 'editHead')->name('editHead')->middleware(['role_or_permission:edit service']);
            Route::post('/update/{services}', 'update')->name('update')->middleware(['role_or_permission:edit service']);
            Route::get('/destroy/{services}', 'destroy')->name('trash')->middleware(['role_or_permission:edit service']);
            Route::get('/status/{services}', 'status')->name('status')->middleware(['role_or_permission:edit service']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')->middleware(['role_or_permission:edit service']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')->middleware(['role_or_permission:delete service']);
        });
        Route::controller(PackagesDetailsController::class)->prefix('/package_details')->name('backend.package_details.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit package details']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create package details']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create package details']);
            Route::get('/edit/{packagesDetails}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit package details']);
            Route::get('/editHead/{packagesDetails}', 'editHead')->name('editHead');
            Route::post('/update/{packagesDetails}', 'update')->name('update')
                ->middleware(['role_or_permission:edit package details']);
            Route::get('/destroy/{packagesDetails}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit package details']);
            Route::get('/status/{packagesDetails}', 'status')->name('status')
                ->middleware(['role_or_permission:edit package details']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit package details']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete package details']);
        });
        Route::controller(PhotoGalleryController::class)->prefix('/photoGallery')->name('backend.photoGallery.')->group(function () {
            Route::get('/', 'index')->name('index')->middleware(['role_or_permission:edit photo']);
            Route::get('/create', 'create')->name('create')->middleware(['role_or_permission:create photo']);
            Route::post('/store', 'store')->name('store')->middleware(['role_or_permission:create photo']);
            Route::get('/edit/{photoGallery}', 'edit')->name('edit')->middleware(['role_or_permission:edit photo']);
            Route::get('/edit-slider/{photoGallery}', 'slider')->name('slider')->middleware(['role_or_permission:edit photo']);
            Route::post('/update/{photoGallery}', 'update')->name('update')->middleware(['role_or_permission:edit photo']);
            Route::get('/destroy/{photoGallery}', 'destroy')->name('trash')->middleware(['role_or_permission:edit photo']);
            Route::get('/status/{photoGallery}', 'status')->name('status')->middleware(['role_or_permission:edit photo']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit photo']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete photo']);
        });
        Route::controller(VideoGalleryController::class)->prefix('/videoGallery')->name('backend.videoGallery.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{videoGallery}', 'edit')->name('edit');
            Route::post('/update/{videoGallery}', 'update')->name('update');
            Route::get('/destroy/{videoGallery}', 'destroy')->name('trash');
            Route::get('/status/{videoGallery}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(TermsController::class)->prefix('/terms')->name('backend.terms.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:super-admin']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/edit/{terms}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit terms']);
            Route::post('/update/{terms}', 'update')->name('update')
                ->middleware(['role_or_permission:edit terms']);
            Route::get('/destroy/{terms}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/status/{terms}', 'status')->name('status')
                ->middleware(['role_or_permission:super-admin']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:super-admin']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:super-admin']);
        });
        Route::controller(PartnerController::class)->prefix('/partner')->name('backend.partner.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit partner']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create partner']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create partner']);
            Route::get('/edit/{partner}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit partner']);
            Route::post('/update/{partner}', 'update')->name('update')
                ->middleware(['role_or_permission:edit partner']);
            Route::get('/destroy/{partner}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit partner']);
            Route::get('/status/{partner}', 'status')->name('status')
                ->middleware(['role_or_permission:edit partner']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit partner']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete partner']);
        });
        Route::controller(LatestServicesController::class)->prefix('/LatestServices')->name('backend.LatestServices.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{latestServices}', 'edit')->name('edit');
            Route::post('/update/{latestServices}', 'update')->name('update');
            Route::get('/destroy/{latestServices}', 'destroy')->name('trash');
            Route::get('/status/{latestServices}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(ContactUsController::class)->prefix('/contactUs')->name('backend.contactUs.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit contact']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create contact']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create contact']);
            Route::get('/edit/{contactUs}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit contact']);
            Route::get('/edit-slider/{contactUs}', 'slider')->name('slider')
                ->middleware(['role_or_permission:edit contact']);
            Route::post('/update/{contactUs}', 'update')->name('update')
                ->middleware(['role_or_permission:edit contact']);
            Route::get('/destroy/{contactUs}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit contact']);
            Route::get('/status/{contactUs}', 'status')->name('status')
                ->middleware(['role_or_permission:edit contact']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit contact']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete contact']);
        });
        Route::controller(LeafController::class)->prefix('/leaf')->name('backend.leaf.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{leaf}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{leaf}', 'destroy')->name('trash');
            Route::get('/status/{contactUsleaf}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(TeamController::class)->prefix('/team')->name('backend.team.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{team}', 'edit')->name('edit');
            Route::post('/update/{team}', 'update')->name('update');
            Route::get('/destroy/{team}', 'destroy')->name('trash');
            Route::get('/status/{team}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(WhyChooseController::class)->prefix('/whyChoose')->name('backend.whyChoose.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit why choose']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create why choose']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create why choose']);
            Route::get('/edit/{whyChoose}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit why choose']);
            Route::post('/update/{whyChoose}', 'update')->name('update')
                ->middleware(['role_or_permission:edit why choose']);
            Route::get('/destroy/{whyChoose}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit why choose']);
            Route::get('/status/{whyChoose}', 'status')->name('status')
                ->middleware(['role_or_permission:edit why choose']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit why choose']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete why choose']);
        });
        Route::controller(TestimonialController::class)->prefix('/testimonial')->name('backend.testimonial.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create testimonial']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create testimonial']);
            Route::get('/edit/{testimonial}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::post('/update/{testimonial}', 'update')->name('update')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::get('/destroy/{testimonial}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::get('/status/{testimonial}', 'status')->name('status')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit testimonial']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete testimonial']);
        });
        Route::controller(ConcernController::class)->prefix('/concern')->name('backend.concern.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit concern']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create concern']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create concern']);
            Route::get('/edit/{concern}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit concern']);
            Route::post('/update/{concern}', 'update')->name('update')
                ->middleware(['role_or_permission:edit concern']);
            Route::get('/destroy/{concern}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit concern']);
            Route::get('/status/{concern}', 'status')->name('status')
                ->middleware(['role_or_permission:edit concern']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit concern']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete concern']);
        });

        Route::controller(PolicyController::class)->prefix('/policy')->name('backend.policy.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{policy}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit privacy policy']);
            Route::post('/update/{policy}', 'update')->name('update')
                ->middleware(['role_or_permission:edit privacy policy']);
            Route::get('/terms/{policy}', 'terms')->name('terms')
                ->middleware(['role_or_permission:edit terms']);
            Route::post('/termsupdate/{policy}', 'termsupdate')->name('termsupdate')
                ->middleware(['role_or_permission:edit terms']);
        });
        Route::controller(PortalController::class)->prefix('/portal')->name('backend.portal.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit ota portal']);
            // Route::get('/create', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            Route::get('/edit/{portal}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit ota portal']);
            Route::post('/update/{portal}', 'update')->name('update')
                ->middleware(['role_or_permission:edit ota portal']);
        });
        Route::controller(ClientController::class)->prefix('/client')->name('backend.client.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit client']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create client']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create client']);
            Route::get('/edit/{client}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit client']);
            Route::post('/update/{client}', 'update')->name('update')
                ->middleware(['role_or_permission:edit client']);
            Route::get('/destroy/{client}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit client']);
            Route::get('/status/{client}', 'status')->name('status')
                ->middleware(['role_or_permission:edit client']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit client']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete client']);
        });
        Route::controller(AffiliationController::class)->prefix('/affiliation')->name('backend.affiliation.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create affiliation']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create affiliation']);
            Route::get('/edit/{affiliation}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::post('/update/{affiliation}', 'update')->name('update')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/destroy/{affiliation}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/status/{affiliation}', 'status')->name('status')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete affiliation']);
        });
        Route::controller(CustomerReviewController::class)->prefix('/customerReview')->name('backend.customerReview.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create customer review']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create customer review']);
            Route::get('/edit/{customerReview}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit customer review']);
            Route::post('/update/{customerReview}', 'update')->name('update')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/destroy/{customerReview}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit customer review']);
        });
        Route::controller(AchievementController::class)->prefix('/achievement')->name('backend.achievement.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create customer review']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create customer review']);
            Route::get('/edit/{achievement}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit customer review']);
            Route::post('/update/{achievement}', 'update')->name('update')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/destroy/{achievement}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit customer review']);
        });
        Route::controller(BradcrumbController::class)->prefix('/bradcrumb')->name('backend.bradcrumb.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create customer review']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create customer review']);
            Route::get('/edit/{bradcrumb}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit customer review']);
            Route::post('/update/{bradcrumb}', 'update')->name('update')
                ->middleware(['role_or_permission:edit customer review']);
            Route::get('/destroy/{bradcrumb}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit customer review']);
        });

        Route::controller(ProductController::class)->prefix('/product')->name('backend.product.')->group(function () {
            Route::get('/', 'index')->name('index')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/create', 'create')->name('create')
                ->middleware(['role_or_permission:create affiliation']);
            Route::post('/store', 'store')->name('store')
                ->middleware(['role_or_permission:create affiliation']);
            Route::get('/edit/{product}', 'edit')->name('edit')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::post('/update/{product}', 'update')->name('update')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/destroy/{product}', 'destroy')->name('trash')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/status/{product}', 'status')->name('status')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::get('/reStore/{id}', 'reStore')->name('reStore')
                ->middleware(['role_or_permission:edit affiliation']);
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete')
                ->middleware(['role_or_permission:delete affiliation']);
        });
        Route::controller(TypeController::class)->prefix('/type')->name('backend.type.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{type}', 'edit')->name('edit');
            Route::post('/update/{type}', 'update')->name('update');
            Route::delete('/destroy/{type}', 'destroy')->name('delete');
        });
        Route::controller(SpecificationController::class)->prefix('/specification')->name('backend.specification.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{specification}', 'edit')->name('edit');
            Route::post('/update/{specification}', 'update')->name('update');
            Route::delete('/destroy/{specification}', 'destroy')->name('delete');
        });

        
    }
);