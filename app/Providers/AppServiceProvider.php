<?php

namespace App\Providers;

use App\Models\Leaf;
use App\Models\Concern;
use App\Models\Product;
use App\Models\Category;
use App\Models\Packages;
use App\Models\Services;
use App\Models\GeneralInfo;
use App\Models\SectionContent;
use App\Models\PackagesDetails;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        $access_token = api_access_token(env('Client_ID'));

        $cacheKeyINFOS = 'semaise_api_infos';
        $cacheKeyLocation = 'semaise_api_business_locations';
        $cacheKeyCategories = 'semaise_api_categoriesss';
        $cacheKeyBusiness = 'semaise_api_cms';
        // infos
        $generalInfo = Cache::remember($cacheKeyINFOS, 60 * 5, function () use ($access_token) {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('base_url') . 'connector/api/business-details',
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
            return $response->data;
        });

        // Cache the business-location
        $locationDetails = Cache::remember($cacheKeyLocation, 60 * 5, function () use ($access_token) {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('base_url') . 'connector/api/business-location/1',
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
            return $response->data[0]; 
        });

         // Cache the categories
         $categories = Cache::remember($cacheKeyCategories, 60 * 5, function () use ($access_token) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => env('base_url').'connector/api/taxonomy?type=product',
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
            return $response->data; // Return the categories here
        });



         $business_details = Cache::remember($cacheKeyBusiness, 60 * 5, function () use ($access_token) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => env('base_url').'connector/api/cms',
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



        


        view()->share(['access_token' => $access_token]);
        view()->share(['generalInfo' => $generalInfo]);
        view()->share(['contact_info' => $locationDetails]);
        view()->share(['categories' => $categories]);
        view()->share(['site_info' => $business_details]);

    }
}
