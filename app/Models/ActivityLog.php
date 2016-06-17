<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class ActivityLog
 * @package App
 */
class ActivityLog extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'text', 'ip_address',
    ];

    /**
     * @param $text
     * @param $log_type
     * @param null $user_id
     * @return mixed
     */
    public function make($text, $log_type, $user_id = null)
    {
        $log = $this->create([
            'user_id' => (Auth::check() ? Auth::id() : $user_id),
            'type' => $log_type,
            'text' => $text,
            'ip_address' => request()->getClientIp(),
        ]);
        $log_entry = $this->find($log->id);
        $this->dumpLog([$log_entry->toArray()], $log_type);
        return $log_entry;
    }

    /**
     * @param array $data
     * @param $log_type
     * @return bool
     */
    public function dumpLog(array $data, $log_type)
    {
        switch ($log_type) {
            case 0:
                Log::info($data);
                return true;
            case 1:
                Log::error($data);
                return true;
            case 2:
                Log::warning($data);
                return true;
            case 3:
                Log::alert($data);
                return true;
            case 4:
                Log::emergency($data);
                return true;
            case 5:
                Log::notice($data);
                return true;
            case 6:
                Log::critical($data);
                return true;
            case 7:
                Log::debug($data);
                return true;
            default:
                return false;
        }
    }

    /**
     * @return bool
     */
    public function clear()
    {
        $logs = $this->all();
        foreach ($logs as $log) {
            $log->delete();
        }
        $this->dumpLog([trans('logs.message.clear')], 0);
        return $this->all()->isEmpty();
    }

    /**
     * @return mixed
     */
    public function appLog()
    {
        return Log::getMonolog();
    }
}
