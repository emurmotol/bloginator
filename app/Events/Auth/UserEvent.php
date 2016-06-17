<?php

namespace App\Events\Auth;

use App\Events\Event;
use App\Models\ActivityLog;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserEvent
 * @package App\Events
 */
class UserEvent extends Event
{
    use SerializesModels;

    /**
     * @var ActivityLog
     */
    public $log;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ActivityLog $log)
    {
        $this->log = $log;
    }

    /**
     *
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    /**
     * @param $event
     */
    public function onUserLogin($event)
    {
        $event->user->logged_in = Auth::check();
        $event->user->save();
        $this->log->make(trans('log.message.login'), 0);
    }

    /**
     * @param $event
     */
    public function onUserLogout($event)
    {
        $event->user->logged_in = 0;
        $event->user->save();
        $this->log->make(trans('log.message.logout'), 0);
    }
}
