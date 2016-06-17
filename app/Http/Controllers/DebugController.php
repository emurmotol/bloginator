<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\ActivityLog;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class DebugController
 * @package App\Http\Controllers
 */
class DebugController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Profile
     */
    protected $profile;

    /**
     * @var ActivityLog
     */
    protected $log;

    /**
     * @param User $user
     * @param Profile $profile
     * @param ActivityLog $log
     */
    public function __construct(User $user, Profile $profile, ActivityLog $log)
    {
        $this->user = $user;
        $this->profile = $profile;
        $this->log = $log;
    }

    /**
     *  Debugging function
     *
     */
    public function dd($debug_id)
    {
        switch ($debug_id) {
            case 0: // Create admin
                return dd($this->user->createAdmin());
            case 1: // Retrieve admin
                if (!is_null($this->user->getAdmin())) {
                    return dd($this->user->getAdmin()->with('profile')->get()->toArray());
                }
                return dd($this->log->make(trans('log.message.admin_account_is_null'), 7)->text);
            case 2: // Delete admin
                if (!is_null($this->user->getAdmin())) {
                    return dd($this->user->deleteAdmin());
                }
                return dd($this->log->make(trans('log.message.admin_account_is_null'), 7)->text);
            case 3: // Login admin
                return dd(Auth::loginUsingId($this->user->getAdmin()->id)->toArray());
            case 4: // Retrieve all logs
                return dd($this->log->all()->toArray());
            case 5: // Retrieve app logs
                return dd($this->log->appLog());
            case 6: // Clear logs
                return dd($this->log->clear());
            case 7: // Test route
                return dd(route('admin.dashboard', 'epic'));
            default: // Parameter value
                return dd($debug_id);
        }
    }

}
