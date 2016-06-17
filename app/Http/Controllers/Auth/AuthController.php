<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Request;
use Validator;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var ActivityLog
     */
    protected $log;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(ActivityLog $log)
    {
        $this->log = $log;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|min:3|max:16|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * @param Request $request
     */
    public function postLogin(Request $request)
    {
        // do something
    }

    /**
     * @param Request $request
     */
    public function postRegister(Request $request)
    {
        $this->log->make(trans('log.message.register'), 3, $request->id);
    }

    /**
     * @param Request $request
     */
    public function postEmail(Request $request)
    {
        $this->log->make(trans('log.message.password_reset_link'), 3, $request->id);
    }

    /**
     * @param Request $request
     */
    public function postReset(Request $request)
    {
        $this->log->make(trans('log.message.password_reset'), 3, $request->id);
    }
}
