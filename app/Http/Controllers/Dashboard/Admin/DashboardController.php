<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
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
    public function __construct(User $user)
    {
        $this->user = $user;
//        $this->middleware('auth');
//        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->showAdminDashboard();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminDashboard()
    {
        return view('dashboard.admin.index');
    }

}
