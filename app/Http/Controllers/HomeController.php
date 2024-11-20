<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Meta;
use App\Models\Banner;
use App\Models\Client;
use App\Models\AboutUs;
use App\Models\Concern;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Services;
use App\Models\WhyChoose;
use App\Models\Achievement;
use App\Models\Testimonial;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Models\SectionContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $banners = Banner::where('status', 'publish')->orderBy('id', 'asc')->get();
        $partners = Partner::where('status', 'publish')->orderBy('id', 'desc')->get();
        $clients = Client::where('status', 'publish')->orderBy('id', 'desc')->get();
        $whychoose = WhyChoose::where('status', 'publish')->orderBy('id', 'asc')->limit(6)->get();
        $testimonials = Testimonial::where('status', 'publish')->orderBy('id', 'desc')->limit(12)->get();
        $services = Services::where('status', 'publish')->orderBy('order_level', 'desc')->limit(9)->get();
        $concerns = Concern::where('status', 'publish')->orderBy('id', 'desc')->limit(4)->get();

        $blogs = Blog::where('status', 'publish')->orderBy('created_at', 'desc')->limit(6)->get();
        $mission = MissionVision::where('status', 'publish')->first();
        $about = AboutUs::first();
        $achievement = Achievement::first();
        $videos = VideoGallery::where('status', 'publish')->limit(12)->get();

        $metaData = Meta::where('page_name', 'home')->first();
        $cacheKeyBanner = 'semaise_api_banner';


        $brandsection = SectionContent::where('sec_name', 'Brand')
            ->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $whychoosesection = SectionContent::where('sec_name', 'Why Choose')
            ->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $whatweoffersection = SectionContent::where('sec_name', 'What We Offer')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $missionsection = SectionContent::where('sec_name', 'Our Mission')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $concernsection = SectionContent::where('sec_name', 'Our Concern')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $testimonialsection = SectionContent::where('sec_name', 'Professional Excelence')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $newsletter_sec_content = SectionContent::where('sec_name', 'News Letter')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $affiliation_sec_content = SectionContent::where('sec_name', 'glance')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();
        $product_sec_content = SectionContent::where('sec_name', 'product')->where('page_name', 'home_page')
            ->where('status', 1)
            ->first();

        $products = [];


        $access_token = api_access_token(env('Client_ID'));
        // Banner
        $banner = Cache::remember($cacheKeyBanner, 60 * 5, function () use ($access_token) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => env('base_url').'connector/api/banners',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$access_token,
              'Cookie: XSRF-TOKEN='.$access_token
            ),
        ));

            $response = curl_exec($curl);
            $response = json_decode($response);
            curl_close($curl);
            return @$response; 
        });
        // Banner

        

        return view('frontend.index', compact('banners', 'partners', 'whychoose', 'concerns', 'mission', 'testimonials', 'services', 'metaData', 'brandsection', 'whychoosesection', 'whatweoffersection', 'missionsection', 'concernsection', 'testimonialsection', 'newsletter_sec_content', 'clients', 'about', 'achievement', 'products', 'blogs', 'videos', 'affiliation_sec_content', 'product_sec_content','banner'));
    }

    function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        Toastr::success('Cache cleared successfully');
        return back();
    }

    public function getproducts(Request $request)
{
    $page = $request->input('page', 1);
    $cacheKey = 'products_page_' . $page;
    $cacheDuration = 60;

    $products = Cache::get($cacheKey);

    if (!$products) {
        $access_token = api_access_token(env('Client_ID'));
        $curl = curl_init();
        $url = env('Base_Url') . 'connector/api/product/?per_page=20&page=' . $page;
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
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

        $products = $response->data;
        Cache::put($cacheKey, $products, $cacheDuration);
    }

    $html = view('frontend.partial.product_card', ['products' => $products])->render();
    return $html;
}

    public function search(Request $request)
    {

        if ($request->search != null) {
            $searchTerm = '%' . $request->search . '%';

            $table1Query = Product::where('name', 'LIKE', $searchTerm)->get();
            $table2Query = Blog::where('title', 'LIKE', $searchTerm)->get();

            return view('frontend.render.ajaxsearchitem', compact('table1Query', 'table2Query'));
        }
    }

    public function quick_view($id)
    {

        // $product = Product::find($id);
        $access_token = api_access_token(env('Client_ID'));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('Base_Url') . 'connector/api/product/' . $id,
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

        return view('frontend.partial.quick_view', compact('product'));
    }

    public function listProducts()
    {



        return view('product_details', compact('response'));
    }
}
