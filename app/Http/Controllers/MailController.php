<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

   public function html_email(Request $request)
{
    $request->validate([
        'file' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
    ]);
    $filename = null;
    $location = 'storage/file/';
    $position = $request->position;

    if ($request->file('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Upload file to the 'storage/app/public/file' directory
        
        $file->move('storage/file', $filename);
    }

    $general_setting = GeneralInfo::first();
    $sitename = $general_setting->site_name;
    $to_email = $general_setting->email;
    $from_email = $request->email;

    $data = array(
        'name' => $request->name,  
        'contac_no' => $request->phone, 
        'company' => $request->company, 
        'designation' => $request->designation, 
        'email' => $request->email, 
        's_message' => $request->message, 
        'file' => $filename, 
        'position' => $position
    );

    Mail::send('mail', $data, function ($s_message) use ($to_email, $sitename, $from_email, $filename, $location) {
        $s_message->to($to_email, $sitename)->subject('Query from ' . $sitename);
        if ($filename) {
            $s_message->attach(public_path('storage/file/' . $filename));
        }
        $s_message->from($from_email, $sitename);
    });

    Toastr::success('Thank you for contacting us.Your message has been received.');
    return back();
}

}
