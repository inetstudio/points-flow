<?php

namespace InetStudio\PointsFlowPackage\Actions\Events;

use Illuminate\Queue\SerializesModels;
use InetStudio\PointsFlowPackage\Actions\Contracts\Events\ActionEndedEventContract;

/**
 * Class ActionEndedEvent.
 */
class ActionEndedEvent implements ActionEndedEventContract
{
    use SerializesModels;

    /**
     * @var int
     */
    public $userId;

    /**
     * @var string
     */
    public $actionAlias;


    /**
     * ActionEndedEvent constructor.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     */
    public function __construct(int $userId, string $actionAlias)
    {
        $this->userId = $userId;
        $this->actionAlias = $actionAlias;
    }
}
