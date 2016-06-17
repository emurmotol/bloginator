<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'type_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @param array $admin
     * @param $type_id
     * @return static
     */
    public function makeAdmin(array $admin, $type_id)
    {
        $collection = collect($admin);
        $merged = $collection->merge(compact('type_id'));
        return $this->make($merged->all());
    }

    /**
     * Create administrator account
     *
     */
    public function createAdmin()
    {
        $admin_user = trans('model.user.admin');
        $type_id = intval(trans('model.type.admin.id'));
        $admin_profile = trans('model.profile.admin');
        $hasAdmin = $this->where('type_id', $type_id)->first();
        $log = new ActivityLog();
        if (!$hasAdmin) {
            $admin = $this->makeAdmin($admin_user, $type_id);
            $admin->profile()->create($admin_profile);
            return $log->make(trans('log.message.admin_account_created'), 7, $admin->id)->text;
        }
        return $log->make(trans('log.message.admin_account_exists'), 7)->text;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->where('type_id', trans('model.type.admin.id'))->first();
    }

    /**
     * @return mixed
     */
    public function deleteAdmin()
    {
        $this->where('type_id', trans('model.type.admin.id'))->first()->delete();
        $log = new ActivityLog();
        return $log->make(trans('log.message.admin_account_deleted'), 7)->text;
    }

    /**
     * @param array $data
     * @return static
     */
    public function make(array $data)
    {
        return $this->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type_id' => $data['type_id'],
        ]);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getType($user_id)
    {
        return $this->find($user_id)->type_id;
    }

}
