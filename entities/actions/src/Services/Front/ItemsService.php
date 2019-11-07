<?php

namespace InetStudio\PointsFlowPackage\Actions\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  ActionModelContract  $model
     */
    public function __construct(ActionModelContract $model)
    {
        parent::__construct($model);
    }
}
