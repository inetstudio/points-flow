<?php

namespace InetStudio\PointsFlowPackage\Records\Contracts\Listeners;

/**
 * Interface RecordActionListenerContract.
 */
interface RecordActionListenerContract
{
    /**
     * Handle the event.
     *
     * @param $event
     */
    public function handle($event): void;
}
