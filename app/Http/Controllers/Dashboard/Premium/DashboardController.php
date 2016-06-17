<?php

namespace App\Http\Controllers\Dashboard\Premium;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @var User
     */
    public $user;

    /**
     * DashboardController constructor.
     * @param $user
     */
    public function __construct()
    {
        $this->user = Auth::user();
//        $this->middleware('auth');
//        $this->middleware('premium');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->showPremiumDashboard();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPremiumDashboard()
    {
        return view('dashboard.premium.index');
    }
}
