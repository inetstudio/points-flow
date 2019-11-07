<?php

namespace InetStudio\PointsFlowPackage\Records\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return RecordModelContract
     */
    public function save(array $data, int $id): RecordModelContract;
}
