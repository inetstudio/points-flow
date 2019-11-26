<?php

namespace InetStudio\PointsFlowPackage\Records\Events;

use Illuminate\Queue\SerializesModels;
use InetStudio\ACL\Users\Contracts\Models\UserModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Events\RecordActionEventContract;

/**
 * Class RecordActionEvent.
 */
class RecordActionEvent implements RecordActionEventContract
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
     */
    public function __construct(UserModelContract $user, int $points)
    {
        $this->user = $user;
        $this->points = $points;
    }
}
