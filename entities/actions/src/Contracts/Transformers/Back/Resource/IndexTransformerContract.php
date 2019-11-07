<?php

namespace InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource;

use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     */
    public function transform(ActionModelContract $item): array;
}
