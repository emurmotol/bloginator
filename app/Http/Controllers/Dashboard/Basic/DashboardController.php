<?php

namespace App\Http\Controllers\Dashboard\Basic;

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
//        $this->middleware('basic');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->showBasicDashboard();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBasicDashboard()
    {
        return view('dashboard.basic.index');
    }
}
