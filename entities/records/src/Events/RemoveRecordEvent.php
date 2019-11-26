<?php

namespace InetStudio\PointsFlowPackage\Records\Events;

use Illuminate\Queue\SerializesModels;
use InetStudio\ACL\Users\Contracts\Models\UserModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Events\RemoveRecordEventContract;

/**
 * Class RemoveRecordEvent.
 */
class RemoveRecordEvent implements RemoveRecordEventContract
{
    use SerializesModels;

    /**
     * @var UserModelContract
     */
    public $user;

    /**
     * @var int
     */
    public $points;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  UserModelContract  $user
     * @param  int  $points
     */
    public function __construct(UserModelContract $user, int $points)
    {
        $this->user = $user;
        $this->points = $points;
    }
}
