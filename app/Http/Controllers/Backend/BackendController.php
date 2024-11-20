<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Concern;
use App\Models\Packages;
use App\Models\Partner;
use App\Models\Property;
use App\Models\RequestMessage;
use App\Models\Services;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $services = Services::get();
        $concerns = Concern::get();
        $package = Packages::get();
        $client = Partner::get();
        $subscriber = Subscriber::get();
        $blog = Blog::get();
        return view('backend.index', compact('concerns', 'package', 'services', 'subscriber','blog','client'));
    }

    public function authLogout()
    {
        Session::flush();

        Auth::logout();
        Toastr::success('Logout Successful');

        return redirect(route('admin'));
    }
}
