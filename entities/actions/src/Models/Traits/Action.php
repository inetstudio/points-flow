<?php

namespace InetStudio\PointsFlowPackage\Actions\Models\Traits;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Trait Action.
 */
trait Action
{
    /**
     * Отношение "один к одному" с моделью действия.
     *
     * @return HasOne
     *
     * @throws BindingResolutionException
     */
    public function action(): HasOne
    {
        $actionModel = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract');

        return $this->hasOne(
            get_class($actionModel),
            'id',
            'action_id'
        );
    }
}
