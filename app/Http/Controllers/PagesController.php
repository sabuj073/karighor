<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Flag;
use App\Models\Meta;
use App\Models\Team;
use App\Models\About;
use App\Models\Terms;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Client;
use App\Models\Policy;
use App\Models\Portal;
use App\Models\AboutUs;
use App\Models\Concern;
use App\Models\Partner;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\Category;
use App\Models\OurStory;
use App\Models\Packages;
use App\Models\SaleInfo;
use App\Models\Services;
use App\Models\Attribute;
use App\Models\ContactUs;
use App\Models\CoreValue;
use App\Models\FlashDeal;
use App\Models\Inventory;
use App\Models\Affiliation;
use App\Models\Testimonial;
use App\Models\HotelBooking;
use App\Models\PhotoGallery;
use App\Models\ReturnPolicy;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Models\CustomerReview;
use App\Models\SectionContent;
use App\Models\ShippingPolicy;
use App\Models\PackagesDetails;
use App\Models\RequirementType;
use App\Models\InventoryFlashDeal;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{

    public function all_blog()
    {
        $blogs = Blog::where('status', 'publish')->paginate(16);
        $metaData = Meta::where('page_name', 'all_blogs')->first();
        return view('frontend.pages.all_blog', compact('blogs', 'metaData'));
    }
    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlog = Blog::where('id', '!=', $blog->id)->orderBy('id', 'desc')->limit(6)->get();
        $related_blog = Blog::where('id', '!=', $blog->id)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->limit(3)->get();

        $metaData = Blog::where('slug', $slug)->first();
        return view('frontend.pages.blog_details', compact('blog', 'related_blog', 'recentBlog', 'metaData'));
    }
    public function all_product()
    {
        $all_products = Product::where('status', 'publish')->orderBy('order_number', 'desc')->paginate(24);
        $metaData = Meta::where('page_name', 'all_product')->first();
        $product_section = SectionContent::where('sec_name', 'header')->where('page_name', 'product')
            ->where('status', 1)
            ->first();
        return view('frontend.pages.all_product', compact('all_products', 'metaData', 'product_section'));
    }
    /*  public function category_product($slug)
    {
        $category_id = Category::where('status', 'publish')->where('slug',$slug)->pluck('id')->first();
        $all_products = Product::where('category_id', $category_id)->where('status', 'publish')->orderBy('created_at', 'desc')->paginate(24);
        $metaData = Meta::where('page_name', 'all_product')->first();
        return view('frontend.pages.all_product', compact('all_products', 'metaData'));
    } */

    public function categories()
    {
        return view('frontend.pages.all_category');
    }
    public function category()
    {
        return view('frontend.pages.category');
    }
    public function sub_category()
    {
        return view('frontend.pages.subcategory');
    }
    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function product_details($slug)
{
    $cacheKey = 'product_details_' . $slug;
    $metaData = [];
    $product = Cache::get($cacheKey);

    if (!$product) {
        
        $access_token = api_access_token(env('Client_ID'));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('Base_Url') . 'connector/api/product/' . $slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $access_token,
                'Cookie: XSRF-TOKEN=' . $access_token
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);

        $product = $response->data[0];

        Cache::put($cacheKey, $product, now()->addMinutes(60));
    }

    return view('frontend.pages.product_details', compact('product', 'metaData'));
}


    public function all_concern()
    {
        $concerns = Concern::where('status', 'publish')->orderBy('id', 'desc')->paginate(6);
        $metaData = Meta::where('page_name', 'all_concern')->first();
        return view('frontend.pages.all_concern', compact('concerns', 'metaData'));
    }
    public function concern_details($slug)
    {
        $concern = Concern::where('slug', $slug)->firstOrFail();
        $recentBlog = Concern::where('id', '!=', $concern->id)->orderBy('id', 'desc')->limit(6)->get();
        $related_concern = Concern::where('id', '!=', $concern->id)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->limit(3)->get();

        $metaData = Concern::where('slug', $slug)->first();
        return view('frontend.pages.concern_details', compact('concern', 'related_concern', 'recentBlog', 'metaData'));
    }
    public function all_service()
    {
        $services = Services::where('status', 'publish')->paginate(16);
        $metaData = Meta::where('page_name', 'all_service')->first();
        return view('frontend.pages.all_services', compact('services', 'metaData'));
    }
    public function all_packages()
    {
        $packages = Packages::where('status', 'publish')->paginate(16);

        return view('frontend.pages.all_packages', compact('packages'));
    }
    public function package_details($slug)
    {
        $package_details = Packages::where('package_slug', $slug)->first();
        return view('frontend.pages.package_details', compact('package_details'));
    }
    public function package_details_visa($slug)
    {
        $package_details = Packages::where('package_slug', $slug)->first();
        $package_details_data = PackagesDetails::where('package_id', $package_details->id)->first();
        $affiliation_flight = Affiliation::where('package_id',  $package_details->id)->where('type', 'flight')->get();
        $affiliation_hotel = Affiliation::where('package_id',  $package_details->id)->where('type', 'hotel')->get();
        $customerReview = CustomerReview::where('package_id',  $package_details->id)->get();
        $related_package = Packages::where('id', '!=', $package_details->id)
            ->where('service_id', $package_details->service_id)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->limit(3)->get();
        if ($package_details_data) {
            return view('frontend.pages.hajj_umrah_pac_detalis', compact('package_details', 'affiliation_flight', 'affiliation_hotel', 'related_package', 'customerReview', 'package_details_data'));
        } else {
            return view('frontend.partial.nothing_found');
        }
    }
    public function all_hotels()
    {
        $hotel_bookings = HotelBooking::where('status', 'publish')->paginate(16);
        return view('frontend.pages.all_hotel', compact('hotel_bookings'));
    }
    public function hotel_details($slug)
    {
        $hotel_booking = HotelBooking::where('slug', $slug)->first();
        return view('frontend.pages.hotelbooking_details', compact('hotel_booking'));
    }
    public function country_details($slug, $json_slug)
    {

        $service = Services::where('slug', $slug)->first();
        $final_data = Flag::where('service_id', $service->id)->where('slug', $json_slug)->first();
        // $dom_flag = Flag::where('service_id', $service->id)->where('type', 'domestic')->first();
        // $int_flag = Flag::where('service_id', $service->id)->where('type', 'international')->first();
        // $final_data = [];

        // $json_dom_data = json_decode($dom_flag->ticket_info);
        // $json_int_data = json_decode($int_flag->ticket_info);

        // foreach ($json_dom_data as $value) {
        //     $final_data[] = $value;
        // }
        // foreach ($json_int_data as $value) {
        //     $final_data[] = $value;
        // }

        // foreach ($final_data as $item) {
        //     if ($item->slug === $json_slug) {
        //         $final_data = $item;
        //         break;
        //     }
        // }
        return view('frontend.pages.country_details', compact('final_data'));
    }

    public function service_details($slug)
    {
        $service = Services::where('slug', $slug)->first();
        $packages = Packages::where('service_id', $service->id)->get();
        $hotel_bookings = HotelBooking::where('service_id', $service->id)->get();
        $flags = Flag::where('service_id', $service->id)->where('type', null)->get();
        $domestic_flag = Flag::where('service_id', $service->id)->where('type', 'domestic')->get();
        $international_flag = Flag::where('service_id', $service->id)->where('type', 'international')->get();
        $metaData = Services::where('slug', $slug)->first();

        $packageSecContent = SectionContent::where('sec_name', 'package')
            ->where('page_name', 'service')
            ->where('status', 1)
            ->first();
        $hotelSecContent = SectionContent::where('sec_name', 'hotel_booking')
            ->where('page_name', 'service')
            ->where('status', 1)
            ->first();
        return view('frontend.pages.service_details', compact('service', 'packages', 'metaData', 'domestic_flag', 'international_flag', 'packageSecContent', 'hotelSecContent', 'hotel_bookings', 'flags'));
    }
    public function about_us()
    {
        $banners = Banner::where('status', 'publish')->orderBy('id', 'desc')->get();
        $metaData = Meta::where('page_name', 'about')->first();
        $mission = MissionVision::where('status', 'publish')->first();
        $about = AboutUs::first();

        $companyStoreSecContent = SectionContent::where('sec_name', 'Company Funding Story')
            ->where('page_name', 'about_us')
            ->where('status', 1)
            ->first();
        $c_speechSecContent = SectionContent::where('sec_name', 'Chairman Speech')
            ->where('page_name', 'about_us')
            ->where('status', 1)
            ->first();
        $missionsection = SectionContent::where('sec_name', 'Our Mission')->where('page_name', 'about_us')
            ->where('status', 1)
            ->first();
        $team_types = RequirementType::where('status', 'publish')->get();
        return view('frontend.pages.about_us', compact('banners', 'metaData', 'about', 'companyStoreSecContent', 'c_speechSecContent', 'mission', 'missionsection', 'team_types'));
    }
    public function mission_vission()
    {
        $mission = MissionVision::where('status', 'publish')->first();
        $missionsection = SectionContent::where('sec_name', 'Our Mission')->where('page_name', 'about_us')
            ->where('status', 1)
            ->first();
        return view('frontend.pages.mission_vission', compact('mission', 'missionsection'));
    }


    public function contact_us()
    {
        $contact_us = ContactUs::where('status', 'publish')->where('id', '!=', 6)->get();
        $contactSlider = ContactUs::where('status', 'publish')->where('id', 6)->first();
        $metaData = Meta::where('page_name', 'contact_us')->first();
        return view('frontend.pages.contact_us', compact('metaData', 'contact_us', 'contactSlider'));
    }
    public function get_quote()
    {
        $metaData = Meta::where('page_name', 'get_quote')->first();
        return view('frontend.pages.get_quote', compact('metaData'));
    }
    public function faq()
    {
        $faqQuestion = Faq::get();

        $faqTitle = Faq::Where('parent_id', null)->get();
        $metaData = Meta::where('page_name', 'faq')->first();
        return view('frontend.pages.faq', compact('faqTitle', 'faqQuestion', 'metaData'));
    }
    public function privacy()
    {
        $privacy = Policy::first();
        $metaData = Meta::where('page_name', 'privacy_policy')->first();
        return view('frontend.pages.privacy_policy', compact('privacy', 'metaData'));
    }
    public function return_policy()
    {
        $privacy = Policy::first();
        $metaData = Meta::where('page_name', 'privacy_policy')->first();
        return view('frontend.pages.return_policy', compact('privacy', 'metaData'));
    }
    public function refund_policy()
    {
        $privacy = Policy::first();
        $metaData = Meta::where('page_name', 'privacy_policy')->first();
        return view('frontend.pages.refund_policy', compact('privacy', 'metaData'));
    }

    public function terms_condition()
    {
        $terms_condition = Policy::first();
        $metaData = Meta::where('page_name', 'terms_and_condition')->first();
        return view('frontend.pages.terms', compact('terms_condition', 'metaData'));
    }
    public function signUp()
    {
        return view('frontend.pages.signUp');
    }

    // public function search(Request $request)
    // {
    //     if ($request->search != null) {
    //         $searchTerm = '%' . $request->search . '%';

    //         $table1Query = Blog::where('title', 'LIKE', $searchTerm)->get();
    //         $table2Query = Product::where('title', 'LIKE', $searchTerm)->get();

    //         return view('frontend.pages.ajaxsearchitem', compact('table1Query', 'table2Query'));
    //     }
    // }



    public function ourStory()
    {
        $getData = OurStory::first();
        return view('frontend.pages.ourStory', compact('getData'));
    }
    public function portal()
    {
        $portal = Portal::where('id', 1)->first();
        return view('frontend.pages.ota_portal', compact('portal'));
    }



    public function all_photo_gallery()
    {
        $photoGallery = PhotoGallery::where('status', 'publish')->where('year', null)
            ->orderBy('id', 'desc')
            ->paginate(12);
        $photoGallery_year = PhotoGallery::where('status', 'publish')->where('parent_id', null)
            ->where('id', '!=', 8)
            ->paginate(18);
        $photoSlider = PhotoGallery::where('status', 'publish')->where('id', 8)->first();

        $achievmentSecContent = SectionContent::where('sec_name', 'Achivement')
            ->where('page_name', 'fund')
            ->where('status', 1)
            ->first();
        $metaData = Meta::where('page_name', 'photo_gallery')->first();
        return view('frontend.pages.gallery', compact('metaData', 'photoGallery', 'photoGallery_year', 'photoSlider', 'achievmentSecContent'));
        /* try {
            $parentGallery = PhotoGallery::where('slug', $slug)->first();

            if ($parentGallery) {
                $photoGallery = PhotoGallery::get();
                $metaData = Meta::where('page_name', 'photo_gallery')->first();
                return view('frontend.pages.gallery', compact('metaData', 'parentGallery', 'photoGallery'));
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            // Handle the exception here (e.g., log the error, display a generic error page, etc.)
            return abort(500); // You can customize this based on your error handling requirements
        } */
    }


    public function getPhotos(Request $request)
    {

        $parent_id = $request->parent_id;
        $year = $request->year;
        if ($parent_id == 'All') {
            $photoGallery = PhotoGallery::whereNotNull('parent_id')->get();
        } elseif ($parent_id) {
            $photoGallery = PhotoGallery::where('parent_id', $parent_id)->get();
        } elseif ($year != null) {
            $parent = PhotoGallery::where('year', $year)->first();
            if ($parent != null) {
                $photoGallery = PhotoGallery::where('parent_id', $parent->id)->get();
            } else {
                return '<h1 clas="text-center mt-5">No Photos Found</h1>';
            }
        } elseif ($year == null) {
            $photoGallery = PhotoGallery::whereNotNull('parent_id')->get();
        }

        if (count($photoGallery) > 0) {
            return view('frontend.pages.render.photos', compact('photoGallery'))->render();
        } else {
            return '<h1 clas="text-center mt-5">No Photos Found</h1>';
        }
    }
    public function search_flag(Request $request)
    {
        $service_id = $request->service_id;
        $service = Services::where('id', $service_id)->first();
        $name = $request->search_value;
        $flags = Flag::where('service_id', $service_id)->where('name', 'like', '%' . $name . '%')->get();

        if (count($flags) > 0) {
            return view('frontend.pages.render.search_flag', compact('flags', 'service'))->render();
        } else {
            return '<h1 clas="text-center mt-5">No Flag Found</h1>';
        }
    }

    public function all_client()
    {
        $partners = Partner::where('status', 'publish')->paginate(24);
        return view('frontend.pages.all_client', compact('partners'));
    }
    public function team()
    {
        return view('frontend.pages.team');
    }
    public function team_details($slug)
    {
        $team = Team::where('slug', $slug)->first();
        return view('frontend.pages.team_details', compact('team'));
    }

    public function video_gallery()
    {
        $videos = VideoGallery::where('status', 'publish')->get();
        $metaData = Meta::where('page_name', 'video_gallery')->first();
        return view('frontend.pages.video_gallery', compact('metaData', 'videos'));
    }
    public function career()
    {
        $careers = Career::get();
        return view('frontend.pages.career', compact('careers'));
    }
    public function career_details($slug)
    {
        $career = Career::where('slug', $slug)->first();
        return view('frontend.pages.career_details', compact('career'));
    }
    public function apply_now()
    {
        $metaData = Meta::where('page_name', 'apply_now')->first();
        return view('frontend.pages.apply_now', compact('metaData'));
    }
    public function track_order()
    {
        return view('frontend.pages.track_order');
    }
}
