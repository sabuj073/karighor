<?php

use App\Models\Area;
use App\Models\Funds;
use App\Models\Packages;
use App\Models\Services;
use App\Models\MutualFund;
use Cloudinary\Cloudinary;
use App\Models\PhotoGallery;
use App\Models\RequirementType;
use Illuminate\Support\Facades\Session;


function cloudUpload($file, $folder, $old)
{
    // Extracting the filename without the extension
    $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

    if ($old) {
        $token = explode('/', $old);
        $token2 = explode('.', $token[sizeof($token) - 1]);
        cloudinary()->destroy('newFolder/' . $folder . '/' . $token2[0]);
    }

    $response = cloudinary()->upload($file->getRealPath(), [
        'folder' => 'newFolder/' . $folder,
        'resource_type' => $file->getMimeType() == 'video/mp4' ? 'video' : 'auto',
        'transformation' => [
            'quality' => 'auto',
        ]
    ]);

    // Extracting the original file extension
    $originalExtension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

    // Combining the original filename, public ID, and original extension
    if ($originalExtension == 'svg') {
        $fullUrl = env('CLOUIDINARY_BASE_URL') . $response->getPublicId() . '.' . 'svg';
    } elseif ($originalExtension == 'pdf') {
        $fullUrl = env('CLOUIDINARY_BASE_URL') . $response->getPublicId() . '.' . 'pdf';
    } elseif ($originalExtension == 'mp4') {
        $fullUrl = 'https://res.cloudinary.com/drrn3ijrn/video/upload/' . $response->getPublicId() . '.' . 'mp4';
    } else {
        $fullUrl = env('CLOUIDINARY_BASE_URL') . $response->getPublicId() . '.' . 'webp';
    }


    return $fullUrl;
}

if (!function_exists('mysql_escape')) {
    function mysql_escape($inp)
    {
        if (is_array($inp)) return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }
}


function getServicesName($id)
{
    $data = Services::find($id);
    if ($data) {
        return $data->title;
    }
}
function getPhotoname($id)
{
    $data = PhotoGallery::find($id);
    if ($data) {
        return $data->year;
    } else {
        return '--';
    }
}

function api_access_token($client_id)
{
    
    
    if (Session::has("api_access_token")) {
        return Session::get("api_access_token");
    } else {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('Base_Url') . 'oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "grant_type" : "password",
                "client_id" : "' . $client_id . '",
                "client_secret" : "' . 'XkLOP8MI1znsQq6DCxEU2pycVzRtBM2in2hXv2pu' . '",
                "username" : "' . 'admin' . '",
                "password" : "' . 'admin123' . '",
                "scope" : "*"
            }',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        Session::put('api_access_token', $response->access_token);
        return Session::get("api_access_token");
    }
}
