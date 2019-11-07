<?php

namespace InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;

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
     * @return ActionModelContract
     */
    public function save(array $data, int $id): ActionModelContract;
}
