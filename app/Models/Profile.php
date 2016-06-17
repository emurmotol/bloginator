<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App
 */
class Profile extends Model
{
//    protected $touches = ['user'];

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender',
    ];

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTimestamps();;
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function userHasProfile($user_id)
    {
        return $this->where('user_id', $user_id)->first();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUserAuthName($user_id)
    {
        if (!is_null($this->userHasProfile($user_id))) {
            if (!is_null($this->userHasProfile($user_id)->first_name)) {
                return $this->userHasProfile($user_id)->first_name;
            }
        }
        return User::find($user_id)->username;
    }
}
