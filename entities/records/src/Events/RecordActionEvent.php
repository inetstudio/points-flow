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
     * @var bool
     */
    public $update;

    /**
     * @var int
     */
    public $pointsDifference;

    /**
     * RecordActionEvent constructor.
     *
     * @param  UserModelContract  $user
     * @param  int  $points
     * @param  bool  $update
     * @param  int  $pointsDifference
     */
    public function __construct(UserModelContract $user, int $points, bool $update = false, int $pointsDifference = 0)
    {
        $this->user = $user;
        $this->points = $points;
        $this->update = $update;
        $this->pointsDifference = $pointsDifference;
    }
}
