<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.user.dashboard');
    }
    public function wishlist()
    {
        return view('frontend.user.wishlist');
    }
    public function orders()
    {
        return view('frontend.user.orders');
    }
    public function profile()
    {
        return view('frontend.user.profile');
    }
}
