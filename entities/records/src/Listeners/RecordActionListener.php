<?php

namespace InetStudio\PointsFlowPackage\Records\Listeners;

use InetStudio\PointsFlowPackage\Records\Contracts\Services\Front\ItemsServiceContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Listeners\RecordActionListenerContract;

/**
 * Class RecordActionListener.
 */
class RecordActionListener implements RecordActionListenerContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $itemsService;

    /**
     * SaveResponse constructor.
     *
     * @param  ItemsServiceContract  $itemsService
     */
    public function __construct(ItemsServiceContract $itemsService)
    {
        $this->itemsService = $itemsService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     */
    public function handle($event): void
    {
        $userId = $event->userId;
        $actionAlias = $event->actionAlias;

        $this->itemsService->recordAction($userId, $actionAlias);
    }
}
